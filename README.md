# GW2 Embeddings (for Wordpress)

This is a Wordpress-plugin to make it easier to use the [`GW2 armory embeds`](https://github.com/madou/armory-embeds).
It adds the shortcodes `[gw2emb_amulets] [gw2emb_items] [gw2emb_skills] [gw2emb_specs] [gw2emb_traits]` to wordpress.
You have to fill in the attributes very similar to the original. See [`Armory-embeds-Storybook`](https://madou.github.io/armory-embeds) for detailed information.

# v2 Todo

- Blocked until gw2-treasures-fork is ready to use
- Need to learn laravel

# Cheatsheet

You have to add the needed options similar to the original GW2 Armory Embeddings.
Supported parameters are:

| main attributes | value                                                 | original                |
| --------------- | ----------------------------------------------------- | ----------------------- |
| id              | ID(s) to be viewed (e.g. skill-IDs)                   | data-armory-ids         |
| text            | wiki (or gw2spidy)                                    | data-armory-inline-text |
| blank           | any text                                              | data-armory-blank-text  |
| size            | number (for custom icon size)                         | data-armory-size        |
| style           | inline (mods the embed to be viewed inline with text) | -none-                  |

| spec attributes | value                                    | original                  |
| --------------- | ---------------------------------------- | ------------------------- |
| traits          | trait IDs (read multi-view instructions) | data-armory-\\<id>-traits |

| item attributes | value                                                   | original                     |
| --------------- | ------------------------------------------------------- | ---------------------------- |
| skin            | skin ID                                                 | data-armory-\\<id>-skin      |
| stat            | stat ID                                                 | data-armory-\\<id>-stat      |
| upgrades        | upgrade IDs (for stacked runes add +count e.g. 24815+3) | data-armory-\\<id>-upgrades  |
| infusions       | infusion ID                                             | data-armory-\\<id>-infusions |

# Multi-view

To view multiple trait lines at once or multiple items with different upgrades you have to use a special syntax.
You can fill in the ids just as usual. But the selected traits or item-attributes have to be in the same string, separated with an semicolon ';'. In the same order as the ids.

## Example:

(wrapped lines only to clarify the structure)

Two trait-lines with chosen traits:

                            Traitline 1      Traitline 2
    [gw2emb_specs     id  = 56             , 55
                  traits  = 2177,2061,2090 ; 2071,2085,2143 ]

Three different items in row. First two with upgrades. The third with an infusion. (First two without infu):

                            Item 1    Item 2          Item 3
    [gw2emb_items     id  = 1379    , 1378          , 1377
                upgrades  = 24615   ; 24615,24815+4
               infusions  = 0       ; 0             ; 49426,49426 ]
