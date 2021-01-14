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

if (! defined('WPINC'))
{
    die;
}


/**
 *  Function for the WP activation hook
 *
 *  requires the activator class which checks the environment
 *  for all neccasary things to run the plugin.
 */
function activate_GW2embeddings()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class_GW2emb_Activator.php';
    GW2emb_Activator::activate();
}

register_activation_hook(__FILE__, 'activate_GW2embeddings');


/*
 *  The actual plugin trigger
 *
 *  requires composer autoloader an the main plugin controler class,
 *  creates class instance and thats it.
 */
function run_GW2embeddings()
{
    // composer autoload file
    require_once plugin_dir_path(__FILE__) . 'includes/vendor/autoload.php';

    // main plugin class
    require_once plugin_dir_path(__FILE__) . 'includes/class_GW2emb.php';

    $plugin = new GW2emb(__FILE__);

}

run_GW2embeddings();
