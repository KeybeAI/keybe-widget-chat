<?php
/**
 * Keybe Settings Page
 */

defined('ABSPATH') || exit;

function add_keybe_plugin_chat_menu() {
	add_submenu_page('options-general.php', 'keybe Widget Chat', 'keybe Widget Chat', 'manage_options', 'keybe-plugin-chat', 'keybe_plugin_chat_function');
}
add_action('admin_menu', 'add_keybe_plugin_chat_menu');

function keybe_settings_chat_init() {
  register_setting( 'keybe-setting-chat', 'keybe_settings_chat' );
  add_settings_section('keybe-plugin-section-chat', __( 'keybe Widget Chat', 'keybe-plugin-chat' ), 'keybe_chat_settings_section_callback', 'keybe-setting-chat');
  add_settings_field('keybe_api_key_chat', __( 'Keybe Api Key:', 'keybe-plugin-chat' ), 'keybe_api_key_chat', 'keybe-setting-chat', 'keybe-plugin-section-chat');
}

add_action( 'admin_init', 'keybe_settings_chat_init' );

function keybe_chat_settings_section_callback(  ) {
  echo __( 'Keybe Widget Chat settings', 'keybe-plugin-chat' );
  echo '<br>';
  echo __( 'You can find your API keys in your Keybe account', 'keybe-plugin-chat' );
  echo '<br>';
  echo __( 'This plugin will add the chat widget in your site', 'keybe-plugin-chat' );
  echo '<br>';
  echo __( 'If you have trouble setting up the plugin watch our tutorial <a href="https://youtube.com" target="_blank">here!</a>', 'keybe-plugin-chat' );
}

function keybe_api_key_chat(){
  $options = get_option( 'keybe_settings_chat' ); ?>
  <input type='text' name='keybe_settings_chat[keybe_api_key_chat]' value='<?php echo $options["keybe_api_key_chat"]; ?>'> <?php
}

function keybe_plugin_chat_function(){ ?>
	<form action='options.php' method='post'> <?php
			settings_fields( 'keybe-setting-chat' );
			do_settings_sections( 'keybe-setting-chat' );
			submit_button(); ?>
	</form> <?php
}