<?php

/**
 *  fires when file is loaded to add shortcode
 */
GW2embeddings_Shortcodes::add('items');

/**
 *  called by Wordpress, if shortcode is used
 */
function gw2emb_items_handler($atts = [], $content, $tag)
{
    // check dependencies
    GW2embeddings_Snip::require_sc_items();

    // open new shortcode-instance
    $shortcode = new GW2embeddings_ShortcodeItems($atts, $tag);

    // cache the automatically created embedding code
    $embedding = $shortcode->get_embedding();

    // check if armory-embed scripts are added
    GW2embeddings_Shortcodes::check_scripts();

    // hand over the embedding back to wordpress
    return $embedding;
}
