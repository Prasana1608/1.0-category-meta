# 1.0-category-meta
Demo plugin for custom category color and image.



```
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
```
Paste the above code in category.php to use custom images and colors for category in wordpress posts.
