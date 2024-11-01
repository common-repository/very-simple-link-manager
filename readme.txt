=== VS Link Manager ===
Contributors: Guido07111975
Version: 2.5
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Requires PHP: 7.0
Requires at least: 5.0
Tested up to: 6.6
Stable tag: 2.5
Tags: simple, blogroll, links, link manager, link portal


With this lightweight plugin you can display a set of links from the Link Manager.


== Description ==
= About =
With this lightweight plugin you can display a set of links from the Link Manager.

The Link Manager is part of WordPress but disabled by default. This plugin will activate it again.

To display your link list you can use a block or a shortcode.

You can customize your link list by adding attributes to the block or the shortcode.

With this plugin you can also create a blogroll or link portal in the same way as a link list.

= How to use =
After installation go to menu item "Links". You can add your categories and links here. Links must be assigned to a category.

Add the VS Link Manager block or the shortcode `[links]` to a page to display your link list.

Default settings categories:

* 4 columns
* Order by name
* Ascending order (A-Z)
* Empty categories are hidden

Default settings links:

* Order by name
* Ascending order (A-Z)
* All links are displayed

= Attributes =
You can customize your link list by adding attributes to the block or the shortcode.

* Add custom CSS class to link list: `class="your-class-name"`
* Change the number of columns: `columns="3"`
* Disable the columns: `columns="0"`
* Include certain categories: `include="1,3,5"`
* Exclude certain categories: `exclude="8,10,12"`
* Display empty categories too: `hide_empty="0"`
* Display category description: `category_description="true"`
* Change the number of links per category: `links_per_category="5"`
* Reverse the order of links: `order="DESC"`
* Display links by ID: `orderby="ID"`
* Display links in random order: `orderby="rand"`
* Hide link title: `hide_link_title="true"`
* Hide link description: `hide_link_description="true"`
* Change the "no categories are found" text: `no_categories_text="your text"`

Example: `[links include="1,3,5" category_description="true" links_per_category="5"]`

When using the block, don't add the main shortcode tag or the brackets.

Example: `include="1,3,5" category_description="true" links_per_category="5"`

With the columns attribute you can set the number of columns between 1 and 4.

The link list becomes 2 columns in small screens (except when number of columns is set to 1).

You can also disable the columns. This can be handy if you only want to use your own styling.

The columns attribute will be ignored when using the block. Because you can set the columns via the block settings.

With the hide link title attribute you can hide the link title if the link has an image assigned to it. This way you can display the link image only, instead of both.

= Widget =
This plugin activates the Links widget again. Because this widget is part of WordPress, plugin has no control over it.

= Have a question? =
Please take a look at the FAQ section.

= Translation =
Translations are not included, but the plugin supports WordPress language packs.

More [translations](https://translate.wordpress.org/projects/wp-plugins/very-simple-link-manager) are very welcome!

The translation folder inside this plugin is redundant, but kept for reference.

= Credits =
Without help and support from the WordPress community I was not able to develop this plugin, so thank you!


== Frequently Asked Questions ==
= Where is the settings page? =
Plugin has no settings page. Use the block or shortcode with attributes to make it work.

= How can I change the layout or colors? =
You can set the number of columns between 1 and 4 or disable the columns. This can be done via the block settings or via an attribute.

If you disable the columns CSS class "vslm-custom" is added to the link list. This can be handy if you only want to use your own styling.

You can use page Additional CSS of the Customizer for your custom styling.

= Can I order links by date? =
No, this is not possible.

But with the orderby and order attribute you can order links by ID and in descending order. This way newly added links will be displayed first.

= Where to find the category ID? =
Every category URL contains an unique ID. You will find this ID when hovering the category title in your dashboard or when editing the category.

It's the number that comes after: `tag_ID=`

= Where to find the link ID? =
Every link URL contains an unique ID. You will find this ID when hovering the link title in your dashboard or when editing the link.

It's the number that comes after: `link_ID=`

= Why is there no semantic versioning? =
The version number won't give you info about the type of update (major, minor, patch). You should check the changelog to see whether or not the update is a major or minor one.

= How can I make a donation? =
You like my plugin and want to make a donation? There's a PayPal donate link at my website. Thank you!

= Other questions or comments? =
Please open a topic in the WordPress.org support forum for this plugin.


== Changelog ==
= Version 2.5 =
* New: set number of columns via the block settings, instead of using an attribute
* Changed attribute no_link_categories_text into no_categories_text

= Version 2.4 =
* Changed several attribute names, to make it more clear for users
* This means you might have to update your attributes
* Attribute limit becomes links_per_category
* Attribute hide_title becomes hide_link_title
* Attribute hide_description becomes hide_link_description
* Minor changes in code

= Version 2.3 =
* New: VS Link Manager block
* Block editor users can now replace their shortcode block with the VS Link Manager block

= Version 2.2 =
* Minor changes in code

= Version 2.1 =
* Added extra validation for link category query
* Minor changes in code

= Version 2.0 =
* Bumped the "requires PHP" version to 7.0
* Bumped the "requires at least" version to 5.0

= Version 1.9 =
* Minor changes in code

= Version 1.8 =
* Minor changes in code

= Version 1.7 =
* Minor changes in code

= Version 1.6 =
* Removed function load_plugin_textdomain() because redundant
* Plugin uses the WP language packs for its translation
* Kept translation folder for reference
* Because of this change plugin now requires at least WP 4.6

For all versions please check file changelog.


== Upgrade Notice ==
= 2.5 =
* Changed several attribute names in version 2.4 and 2.5, to make it more clear for users. For more info please check changelog at plugin page.

= 2.4 =
* Changed several attribute names in version 2.4 and 2.5, to make it more clear for users. For more info please check changelog at plugin page.


== Screenshots ==
1. Links page (GeneratePress theme)
2. Block (dashboard)
3. Links page (dashboard)