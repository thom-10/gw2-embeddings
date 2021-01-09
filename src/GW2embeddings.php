<?php
/**
 * Plugin Name:       GW2 Embeddings
 * Description:       Implements a shortcode for simplyfied use of the GW2 Armory embeddings
 * Version:           2.0_dev1
 * Author:            thom-10 for guildnews.de
 * Author URI:        https://guildnews.de
 * License:           BSD-3 or later
 * License URI:       https://opensource.org/licenses/BSD-3-Clause
 */

if (! defined('WPINC'))
{
    die;
}


/*
 *  some checks during plugin activation
 */

function activate_GW2embeddings()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class_GW2emb_Activator.php';
    GW2emb_Activator::activate();
}

register_activation_hook(__FILE__, 'activate_GW2embeddings');


/*
 *  triggers the main plugin class
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
