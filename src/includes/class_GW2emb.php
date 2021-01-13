<?php

class GW2emb
{
        // general info variables
    const PLUGIN_PREFIX = 'GW2embeddings_';
    const SC_PREFIX = 'gw2emb_';

    // Wrapper for Guild Wars 2 APi Requests
    public static $api;


    private static $pluginPath;
    private static $pluginUrl;


    public function __construct($pluginFile)
    {
        self::$pluginPath  =  plugin_dir_path($pluginFile);
        self::$pluginUrl   =  plugin_dir_url($pluginFile);
        self::$api = new \GW2Treasures\GW2Api\GW2Api();

        $this->loadIncludes();
        $this->defineHooks();
    }

    // include essential files and load shortcodes
    private function loadIncludes()
    {

        // load shortcode management class
        require_once self::$pluginPath . 'includes/class_GW2emb_Shortcodes.php';

        // load available shortcodes
        require_once self::$pluginPath . 'includes/shortcodes/0_include_shortcodes.php';
    }

    private function defineHooks()
    {
        // Call WP-Function to register available shortcodes.
        add_action('init', array( 'GW2emb_Shortcodes', 'register' ));
    }

    public static function getPluginPrefix($string = '')
    {
        return self::PLUGIN_PREFIX . $string;
    }

    public static function getScPrefix($string = '')
    {
        return self::SC_PREFIX . $string;
    }

    public static function getPluginPath($file = '')
    {
        return self::$pluginPath . $file;
    }

    public static function getPluginUrl($file = '')
    {
        return self::$pluginUrl . $file;
    }
}
