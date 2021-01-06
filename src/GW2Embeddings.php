<?php
/**
 * Plugin Name:       GW2 Embeddings
 * Description:       Implements a shortcode for simplyfied use of the GW2 Armory embeddings
 * Version:           1.0.1
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
    require_once plugin_dir_path(__FILE__) . 'includes/class_GW2embeddings_Activator.php';
    GW2embeddings_Activator::activate();
}

register_activation_hook(__FILE__, 'activate_GW2embeddings');


/*
 *  triggers the main plugin class
 */

function run_GW2embeddings()
{
    // helper-class with code fragments and some shortcuts
    require_once plugin_dir_path(__FILE__) . 'includes/class_GW2embeddings_Snip.php';
    // main plugin class
    require_once plugin_dir_path(__FILE__) . 'includes/class_GW2embeddings.php';

    $plugin = new GW2embeddings(__FILE__);
}

run_GW2embeddings();
