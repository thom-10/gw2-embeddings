<?php

namespace thom10\GW2emb\Includes;

/**
 *  Shortcode management class
 *
 *  collects available (implemented) shortcodes
 *  and triggrs WP register hook function.
 */

class Shortcodes
{

    private static $shortcodes = [];

    /**
     *  Shortcode-tag aggregator
     *
     *  triggered by the individual sc-files
     *  @param String $data shortcode-name/tag
     */
    public static function append($data)
    {
        self::$shortcodes[ $data ] = $data.'_handler';
    }

    /**
     *  Shortcode register function
     *
     *  triggers WP-Function to add each Shortcode to Wordpress
     */
    public static function register()
    {
        $prefix = GW2emb::getScPRefix();
        $shortcodes = self::$shortcodes;

        foreach ($shortcodes as $tag => $callback) {

            add_shortcode($prefix . $tag, $prefix . $callback);
        }
    }
}
