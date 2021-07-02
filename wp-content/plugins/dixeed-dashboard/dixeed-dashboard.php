<?php
/**
 * @package dixeed-dashboard
 * @version 1.0.0
 */
/*
Plugin Name: Dixeed Dashboard
Plugin URI: http://localhost/dixeedTest/
Description: Plugin pour afficher un texte dans le dashboard client
Author: Maxime Maida
Version: 1.0.0
Author URI: http://localhost/dixeedTest/
*/


if (!defined('ABSPATH')) exit;

/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

class DixeedGenerator {
	private $dixeed_generator_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'dixeed_generator_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'dixeed_generator_page_init' ) );
	}

	public function dixeed_generator_add_plugin_page() {
		add_menu_page(
			'Dixeed Generator', // page_title
			'Dixeed Generator', // menu_title
			'manage_options', // capability
			'dixeed-generator', // menu_slug
			array( $this, 'dixeed_generator_create_admin_page' ), // function
			'dashicons-admin-generic', // icon_url
			2 // position
		);
	}

	public function dixeed_generator_create_admin_page() {
		$this->dixeed_generator_options = get_option( 'dixeed_generator_option_name' ); ?>

		<div class="wrap">
			<h2>Dixeed Generator</h2>
			<p></p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'dixeed_generator_option_group' );
					do_settings_sections( 'dixeed-generator-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function dixeed_generator_page_init() {
		register_setting(
			'dixeed_generator_option_group', // option_group
			'dixeed_generator_option_name', // option_name
			array( $this, 'dixeed_generator_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'dixeed_generator_setting_section', // id
			'Settings', // title
			array( $this, 'dixeed_generator_section_info' ), // callback
			'dixeed-generator-admin' // page
		);

		add_settings_field(
			'message_0', // id
			'Message', // title
			array( $this, 'message_0_callback' ), // callback
			'dixeed-generator-admin', // page
			'dixeed_generator_setting_section' // section
		);

		add_settings_field(
			'afficher_le_message_1', // id
			'Afficher le message', // title
			array( $this, 'afficher_le_message_1_callback' ), // callback
			'dixeed-generator-admin', // page
			'dixeed_generator_setting_section' // section
		);
	}

	public function dixeed_generator_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['message_0'] ) ) {
			$sanitary_values['message_0'] = esc_textarea( $input['message_0'] );
		}

		if ( isset( $input['afficher_le_message_1'] ) ) {
			$sanitary_values['afficher_le_message_1'] = $input['afficher_le_message_1'];
		}

		return $sanitary_values;
	}

	public function dixeed_generator_section_info() {
		
	}

	public function message_0_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="dixeed_generator_option_name[message_0]" id="message_0">%s</textarea>',
			isset( $this->dixeed_generator_options['message_0'] ) ? esc_attr( $this->dixeed_generator_options['message_0']) : ''
		);
	}

	public function afficher_le_message_1_callback() {
		?> <fieldset><?php $checked = ( isset( $this->dixeed_generator_options['afficher_le_message_1'] ) && $this->dixeed_generator_options['afficher_le_message_1'] === 'Afficher' ) ? 'checked' : '' ; ?>
		<label for="afficher_le_message_1-0"><input type="radio" name="dixeed_generator_option_name[afficher_le_message_1]" id="afficher_le_message_1-0" value="Afficher" <?php echo $checked; ?>> Afficher</label><br>
		<?php $checked = ( isset( $this->dixeed_generator_options['afficher_le_message_1'] ) && $this->dixeed_generator_options['afficher_le_message_1'] === 'Masquer' ) ? 'checked' : '' ; ?>
		<label for="afficher_le_message_1-1"><input type="radio" name="dixeed_generator_option_name[afficher_le_message_1]" id="afficher_le_message_1-1" value="Masquer" <?php echo $checked; ?>> Masquer</label></fieldset> <?php
	}

}
if ( is_admin() )
	$dixeed_generator = new DixeedGenerator();

/* 
 * Retrieve this value with:
 * $dixeed_generator_options = get_option( 'dixeed_generator_option_name' ); // Array of All Options
 * $message_0 = $dixeed_generator_options['message_0']; // Message
 * $afficher_le_message_1 = $dixeed_generator_options['afficher_le_message_1']; // Afficher le message
 */

function getMessage()
{
	$dixeed_generator_options = get_option( 'dixeed_generator_option_name' );
	echo $dixeed_generator_options['message_0'];
}

function checkbox()
{
	$dixeed_generator_options = get_option( 'dixeed_generator_option_name' );
	return $dixeed_generator_options['afficher_le_message_1'];
}

function displayMessage()
{
	if (checkbox() == 'Afficher') {
		return getMessage();
	}
}

add_action('woocommerce_account_dashboard', 'displayMessage' );

