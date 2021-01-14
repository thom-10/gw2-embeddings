<?php

/**
 *  Shortcode management class
 *
 *  collects available (implemented) shortcodes
 *  and triggrs WP register hook function.
 */

class GW2emb_Shortcodes
{

    private static $shortcodes = [];


    // triggered by each shortcode file
    public static function add($data)
    {
        self::$shortcodes[ $data ] = $data.'_handler';
    }

    // init-function for wordpress
    public static function register()
    {
        $prefix = GW2emb::getScPRefix();
        $shortcodes = self::$shortcodes;

        foreach ($shortcodes as $tag => $callback) {

            add_shortcode($prefix . $tag, $prefix . $callback);
        }
    }

    public static function check_scripts(){
        // check if scripts are added
        //wp_enqueue_script('GW2arm-locale.js', GW2emb::getPluginUrl('languages/js/gw2arm_locale.js'), null, null, true);
        //wp_enqueue_script('armory-embeds.js', "https://unpkg.com/armory-embeds@^0.x.x/armory-embeds.js", null, null, true);


  }
}
