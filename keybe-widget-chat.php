<?php

/**
 * Plugin Name: Keybe Widget Chat
 * Plugin URI: https://keybe.ai/
 * Description: Keybe widget chat. With keybe will boost your sales.
 * Version: 0.1
 * Author: Keybe.ai
 * Author URI: https://keybe.ai
 * Text Domain: keybe-widget-chat
 * Requires at least: 6.0
 * Requires PHP: 7.3
 *
 */

defined('ABSPATH') || exit;

include 'includes/settings-page.php';



function keybe_widget_chat_script()
{
  $options = get_option('keybe_settings_chat'); // Get settings from settings page settings from settings page
  if ($options['keybe_api_key_chat']) :
?>

    <script src="https://storage.kbe.ai/keybejs/latest/keybe.js"></script>
    <script>
      window.addEventListener('load', function() {
        var configChat = {
          apiKey: '<?php echo $options['keybe_api_key_chat']; ?>',
        }
        window.keybe.webchatConversationsUiLoad(configChat)
      })
    </script>
<?php
  endif;
}

add_action('wp_footer', 'keybe_widget_chat_script');
