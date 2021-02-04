<?php
/**
 * Plugin Name:       GW2 Embeddings
 * Description:       Implements a shortcode for simplyfied use of the GW2 Armory embeddings
 * Version:           2.0_dev30
 * Author:            thom-10 for guildnews.de
 * Author URI:        https://guildnews.de
 * License:           BSD-3 or later
 * License URI:       https://opensource.org/licenses/BSD-3-Clause
 */
namespace thom10\GW2emb;

if (! defined('WPINC'))
{
    die;
}

/**
 *  Composer Autoload
 */
require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

/**
 *  Function for the WP activation hook
 *
 *  requires the activator class which checks the environment
 *  for all neccasary things to run the plugin.
 */
function activate_GW2embeddings()
{
  use thom10\GW2emb\Shortcodes\Activator;
  use thom10\GW2emb\Shortcodes\GW2emb;

  if (\thom10\GW2emb\Activator::activate()) {
    $plugin = new GW2emb(__FILE__);
  }

}

$gw2emb_activate_callable = '\thom10\GW2emb\Shortcodes\Activator::fire';
register_activation_hook(__FILE__, $gw2emb_activate_callable);
