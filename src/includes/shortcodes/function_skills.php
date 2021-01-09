<?php

/**
 *  fires when file is loaded to add shortcode
 */
GW2emb_Shortcodes::add('skills');

/**
 *  called by Wordpress, if shortcode is used
 */
function gw2emb_skills_handler($atts = [], $content, $tag)
{
    // check dependencies
    GW2emb::require_sc_default();

    // open new shortcode-instance
    $shortcode = new GW2embeddings_ShortcodeDefault($atts, $tag);

    // cache the automatically created embedding code
    $embedding = $shortcode->get_embedding();

    // check if armory-embed scripts are added
    GW2embeddings_Shortcodes::check_scripts();

    // hand over the embedding back to wordpress
    return $embedding;
}
