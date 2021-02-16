<?php
/*
Plugin Name: Category Meta
Plugin URI: 
Description: Demo plugin for custom category color and image.
Version: 1.0
Contributors: Prasana
Author: Prasana Vasu
Author URI: https://github.com/Prasana1608
License: 
License URI:  
Text Domain: wpplugin
Domain Path:  /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

define( 'WPPLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue Plugin CSS
include( plugin_dir_path( __FILE__ ) . 'includes/styles.php');

// Enqueue Plugin JavaScript
include( plugin_dir_path( __FILE__ ) . 'includes/scripts.php');

?>

<?php
//add extra fields to category edit form hook
add_action ( 'edit_category_form_fields', 'category_color_image_fields');

//add extra fields to category edit form callback function
function category_color_image_fields($tag) {//check for existing featured ID
    $cat_id = $tag->term_id;
    $cat_meta = get_option( "category_$cat_id");
?>
<tr class="category-row">
  <th scope="row" valign="top"><label for="cat_Image_url"><?php _e('Category Image'); ?></label></th>
  <td>
    <input type="text" name="Cat_meta[img]" id="Cat_meta[img]" class="test-input" size="3" style="width:60%;" value="<?php echo $cat_meta['img'] ? $cat_meta['img'] : ''; ?>"><br />
    <div class="d-flex">
      <img class="image-preview" style="width:10%;" src="<?php echo $cat_meta['img'] ? $cat_meta['img'] : ''; ?>"/>
      <?php 
      
      if( $image = wp_get_attachment_image_src( $image_id ) ) {
        echo '<a href="#" class="category-image-upload">Change Image</a>
              <a href="#" class="category-image-remove">Remove image</a>';
      } else {
        echo '<div class="d-flex"><a href="#" class="category-image-upload">Add New</a>
              <a href="#" class="category-image-remove" style="display:block">Remove image</a></div>';
      }
      ?>
    </div>
  </td>
</tr>
<tr class="color-row">
  <th scope="row" valign="top"><label for="cat_Color_url"><?php _e('Category Color'); ?></label></th>
  <td class="d-flex">
    <input type="color" name="Cat_meta[color]" class="input-color" id="Cat_meta[color]" size="25" value="<?php echo $cat_meta['color'] ? $cat_meta['color'] : ''; ?>">
  </td>
</tr>
<?php
}

// save extra category extra fields hook
add_action ( 'edited_category', 'save_category_meta_fields');
// save extra category extra fields callback function
function save_category_meta_fields( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
        $cat_id = $term_id;
        $cat_meta = get_option( "category_$cat_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['Cat_meta'][$key])){
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$cat_id", $cat_meta );
    }
}


add_action( 'admin_enqueue_scripts', 'misha_include_js' );
 
function misha_include_js() {
 
	// I recommend to add additional conditions just to not to load the scipts on each page
 
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
 
 	wp_enqueue_script( 'myuploadscript', get_stylesheet_directory_uri() . '/customscript.js', array( 'jquery' ) );
}


