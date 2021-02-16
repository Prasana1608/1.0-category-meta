=== Custom Category Metas ===
Contributors: PrasanaVasu
Donate link: https://www.paypal.me/prasanavasu
Tags: Category Image, Category Color, Custom Category Metas.
Requires at least: 3.7
Requires PHP: 5.6
Tested up to: 5.6
Stable tag: 1.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Custom Category Metas Plugin gives two extra meta options for categories in WordPress Posts. You can add custom color and image to your categories. And, call them in front end.

== Installation ==

1. Upload the `Custom Category Metas` folder to the `/wp-content/plugins` directory
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= How to proceed after activating the Plugin? =

Head to the category edit admin page after activating the plugin. You will get 2 inputs for color and image assigning.

= How to get the color and image of category? =

Paste the below code in category.php file and refreaf the category page.

<?php
//first get the current category ID
$cat_id = get_query_var('cat');

//then i get the data from the database
$cat_data = get_option("category_$cat_id");

//and then i just display my category image if it exists
if (isset($cat_data['img'])){
	echo '<div class="category_image"><img src="'.$cat_data['img'].'"></div>';
	echo '<div style="color:'.$cat_data['color'].'" class="category_color">Assets</div>';
}
.

== Changelog ==
= 1.0 =
* A New Plugin wihtout any updates.

== Screenshots ==

1. Category edit page.
2. Category page.

== Upgrade Notice ==

1. Will let you guys know.