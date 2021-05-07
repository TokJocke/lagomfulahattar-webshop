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

add_filter('woocommerce_payment_gateways', 'add_your_gateway_class');


function init_your_gateway_class()
{
  class WC_Gateway_Your_Gateway extends WC_Payment_Gateway
  {
    public function __construct()
    {
      $this->id = 'abc123hej';
      $this->method_title = 'Lagom Fakura';
      $this->method_description = '14 dagar Faktura';
      $this->has_fields = true;

      $this->init_form_fields();
      $this->init_settings();

      $this->title = $this->get_option('title');
      $this->description = $this->get_option('description');
      $this->enabled = $this->get_option('enabled');


      add_action('wp_enqueue_scripts', array(&$this, 'load_my_scripts'));
      add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
    }

    public function load_my_scripts()
    {
      wp_enqueue_script('script',   plugins_url("faktura/myScript.js"), [], false, true);
    }

    public function validate_fields()
    {
      return true;
    }

    function payment_fields()
    {
      echo $this->description . '<br>';
      echo '<input value="9106281234" id="personnummer" type="number" placeholder="Personnummer"/> 
        <button id="validBtn">Validera</button>';
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
          'default' => __('Hejsan', 'woocommerce'),
          'desc_tip'      => true,
        ),
        'description' => array(
          'title' => __('Customer Message', 'woocommerce'),
          'type' => 'textarea',
          'default' => ''
        )
      );
      add_action('woocommerce_update_options_payment_gateways', array(&$this, 'process_admin_options'));
    }


    function process_payment($order_id)
    {
      global $woocommerce;
      $order = new WC_Order($order_id);

      // Mark as on-hold (we're awaiting the cheque)
      $order->update_status('on-hold', __('Awaiting cheque payment', 'woocommerce'));

      // Remove cart
      $woocommerce->cart->empty_cart();

      // Return thankyou redirect
      return array(
        'result' => 'success',
        'redirect' => $this->get_return_url($order)
      );
    }
  }
}




/* $this->id – Unique ID for your gateway, e.g., ‘your_gateway’
$this->icon – If you want to show an image next to the gateway’s name on the frontend, enter a URL to an image.
$this->has_fields – Bool. Can be set to true if you want payment fields to show on the checkout (if doing a direct integration).
$this->method_title – Title of the payment method shown on the admin page.
$this->method_description – Description for the payment method shown on the admin page.

 */
