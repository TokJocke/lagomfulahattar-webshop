<?php

/**
 * Plugin Name: Lagom Faktura
 * Author: Lagom fula hattar 
 * */

add_action('plugins_loaded', 'init_your_gateway_class');

function add_your_gateway_class($methods)
{
  $methods[] = 'WC_Gateway_Your_Gateway';
  return $methods;
}

function clear_my_cart($order_id)
{
  global $woocommerce;
  $woocommerce->cart->empty_cart();
}
add_action('woocommerce_new_order', 'clear_my_cart', 1, 1);
add_filter('woocommerce_payment_gateways', 'add_your_gateway_class');


function my_custom_checkout_field($checkout)
{
  echo '<div id="my_custom_checkout_field">';

  woocommerce_form_field('my_field_name', array(
    'type'          => 'text',
    'class'         => array('my-field-class form-row-wide'),
    'label'         => __('Personnummer'),
    'placeholder'   => __('xxxxxx - xxxx'),
    'required'      => 'true',
  ), $checkout->get_value('my_field_name'));

  echo '</div>';
}

function isValid($personNumber)
{
  settype($personNumber, 'string');
  $sumTable = array(
    array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
    array(0, 2, 4, 6, 8, 1, 3, 5, 7, 9)
  );
  $sum = 0;
  $flip = 0;
  for ($i = strlen($personNumber) - 1; $i >= 0; $i--) {
    $sum += $sumTable[$flip++ & 0x1][$personNumber[$i]];
  }
  return $sum % 10 === 0;
}

add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');

function my_custom_checkout_field_update_order_meta($order_id)
{
  if (!empty($_POST['my_field_name'])) {
    update_post_meta($order_id, 'My Field', sanitize_text_field($_POST['my_field_name']));
  }
}



function init_your_gateway_class()
{
  class WC_Gateway_Your_Gateway extends WC_Payment_Gateway
  {
    public function __construct()
    {
      $this->id = 'faktura-plugin';
      $this->method_title = 'Lagom Fakura';
      $this->order_button_text = __('Betala med faktura', 'woocommerce');
      $this->method_description = '14 dagar Faktura';
      $this->has_fields = true;


      $this->init_form_fields();
      $this->init_settings();

      $this->title = $this->get_option('title');
      $this->description = $this->get_option('description');
      $this->enabled = $this->get_option('enabled');
      add_action('woocommerce_after_checkout_billing_form', 'my_custom_checkout_field');
      add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
    }


    public function init_form_fields()
    {
      $this->form_fields = array(
        'enabled' => array(
          'title' => __('Enable/Disable', 'woocommerce'),
          'type' => 'checkbox',
          'label' => __('Aktivera Betalning Med Faktura', 'woocommerce'),
          'default' => 'yes'
        ),
        'title' => array(
          'title' => __('Title', 'woocommerce'),
          'type' => 'text',
          'description' => __('This controls the title which the user sees during checkout.', 'woocommerce'),
          'default' => __('Betala med faktura', 'woocommerce'),
          'desc_tip'      => true,
        ),
        'description' => array(
          'title' => __('Customer Message', 'woocommerce'),
          'type' => 'textarea',
          'default' => ''
        )
      );
    }

    function validate_fields()
    {
      $personNumber = $_POST['my_field_name'];

      if (!isValid($personNumber)) {
        wc_add_notice(__('Payment error:', 'woothemes') . 'Ogiltligt personnummer', 'error');
        return;
      } else if ($personNumber == '') {
        wc_add_notice(__('Payment error:', 'woothemes') . 'Fyll i ditt personnummer', 'error');
        return;
      }
    }

    function process_payment($order_id)
    {
      global $woocommerce;
      $order = new WC_Order($order_id);

      // Mark as on-hold (we're awaiting the cheque)
      $order->update_status('on-hold', __('Awaiting cheque payment', 'woocommerce'));


      // Return thankyou redirect

      clear_my_cart($order_id);
      return array(
        'result' => 'success',
        'redirect' => $this->get_return_url($order)
      );
    }
  }
}
