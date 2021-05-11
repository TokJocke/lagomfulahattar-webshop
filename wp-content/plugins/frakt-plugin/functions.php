<?php
/*
Plugin Name: FRAKTTTTTTTTTTTTTTTTTTTTTT
Plugin URI: https://woocommerce.com/
Description: Your shipping method plugin
Version: 1.0.0
Author: WooThemes
Author URI: https://woocommerce.com/
*/

/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	function your_shipping_method_init() {
		if ( ! class_exists( 'WC_Your_Shipping_Method' ) ) {
			class WC_Your_Shipping_Method extends WC_Shipping_Method {
				/**
				 * Constructor for your shipping class
				 *
				 * @access public
				 * @return void
				 */
				public function __construct() {
					$this->id                 = 'your_shipping_method'; // Id for your shipping method. Should be uunique.
					$this->method_title       = __( 'CYKELBUD', 'your_shipping_method' );  // Title shown in admin
					$this->method_description = __( 'Description of your shipping method', 'your_shipping_method'); // Description shown in admin
					

					$this->init();
				

					$this->enabled = isset($this->settings['enabled']) ? $this->settings['enabled']: 'yes';
 					$this->title = isset($this->settings['title']) ? $this->settings['title'] : __('Cykelbud', 'your_shipping_method');
 					$this->toMuch = isset($this->settings['toMuch']) ? $this->settings['toMuch'] : __('Cykelbud', 'your_shipping_method');
 				

					
				}

				/**
				 * Init your settings
				 *
				 * @access public
				 * @return void
				 */
				function init() {
					// Load the settings API
					$this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
					$this->init_settings(); // This is part of the settings API. Loads settings you previously init.
				
 				add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
 				

					// Save settings in admin if you have any defined
					
				}
				
			
				
				function init_form_fields()
				{
					
					
					$shipping_classes=WC()->shipping->get_shipping_classes();

					foreach ( $shipping_classes as $shipping_class ) {
						
						
						$pris[$shipping_class->term_id] =  array(
								'title'             => sprintf( __( '"%s" cost', 'your_shipping_method' ), esc_html( $shipping_class->name ) ),
								'type'              => 'text',
								'placeholder'       =>  __( '10kr', 'your_shipping_method' ),
								'description'       => __( 'See "Cost" option description above for available options.', 'your_shipping_method' ),
								'default'           => $this->get_option( 'class_cost_' . $shipping_class->slug ),
								'desc_tip'          => true,
								
							
						);
						$vikt[$shipping_class->term_id] = array(
							'title'             => sprintf( __( '"%s" weight', 'your_shipping_method' ), esc_html( $shipping_class->name ) ),
							'type'              => 'number',
							'placeholder'       => __( '20kg', 'your_shipping_method' ),
							'description'       => __( 'See "Cost" option description above for available options.', 'your_shipping_method' ),
							'default'           => $this->get_option( 'class_cost_' . $shipping_class->slug ),
							'desc_tip'          => true,
								
							);
						$fleroptions = array(
							'enabled' => array(
								'title' => __('Enable', 'your_shipping_method'),
								'type' => 'checkbox',
								'default' => 'yes'
								),
							'toMuch' => array(
								'title' => __('Pris om för tungt (kr)', 'your_shipping_method'),
								'type' => 'number',
								'default' => '100'
								),
						
						
						
							);
						$this->form_fields = array_merge($fleroptions, $pris, $vikt );
						
						
					}
					
				}
				

				/**
				 * calculate_shipping function.
				 *
				 * @access public
				 * @param mixed $package
				 * @return void
				 */

				public function calculate_shipping( $package = array() ) {
					
					$productsweight = 0;
					$cost = 0;
					
				
					
					foreach ($package['contents'] as $item_id => $values) {
						$_product = $values['data'];
						$productsweight = $productsweight + $_product->get_weight() * $values['quantity'];	
						
					}

					$productsweight = wc_get_weight($productsweight, 'kg');
					/* var_dump($this->settings); */
					if ( $productsweight <= $this->settings[3]) {
						$cost = $this->settings[0];
					} elseif ($productsweight <= $this->settings[4]  ) {
						$cost = $this->settings[1];
					} elseif ($productsweight <= $this->settings[5] ) { 	
						$cost = $this->settings[2];
					} else {
						$cost = $this->toMuch;
					}
					
					$rate = array(
						'id' => $this->id,
                        'label' => 'Cykelbud',
                        'cost' => $cost,
                        'weight' => $productsweight,
						'calc_tax' => 'per_item'
					);
					
					// Register the rate
					$this->add_rate( $rate );
				}

				
				
			}
		}
		
	}

	add_action( 'woocommerce_shipping_init', 'your_shipping_method_init' );

	function add_your_shipping_method( $methods ) {
		$methods['your_shipping_method'] = 'WC_Your_Shipping_Method';
		return $methods;
	}

	add_filter( 'woocommerce_shipping_methods', 'add_your_shipping_method' );


	

}	