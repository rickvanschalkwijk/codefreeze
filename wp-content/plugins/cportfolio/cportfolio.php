<?php
/**
* Plugin Name: Cportefolio
* Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
* Description: A simple but powerfull portfolio plugin using mason js
* Version: 0.1
* Author: Rick van Schalkwijk
* Author URI: http://www.codefreeze.nl
* License: GPL2
* 
* 
*  This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of 
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
define ( 'CP_NAME', 'cportfolio' );
define('CP_POST_TYPE', 'portfolio');

$url = plugins_url () . '/' . CP_NAME;
define ( 'CP_URL', $url );

global $c_db_version;
$c_db_version = "1.0";

function CP_custom_scripts() {
	global $post;
	
	if (strstr ( $post->post_content, '[single-testimonial' ) || 
		strstr ( $post->post_content, '[random-testimonial' ) || 
		strstr ( $post->post_content, '[full-testimonials' ) || 
		strstr ( $post->post_content, '[testimonial-form' )) {
		//wp_enqueue_style ( 'cpstyles', plugins_url ( '/assets/css/cportfolio.css', __FILE__ ), false, '1.0', 'all' );
	}
		//wp_enqueue_script ( 'mason', plugins_url ( '/assets/js/mason.js', __FILE__ ), array (
		//'mason'
			//	), '1.0', true );
		
//		wp_enqueue_script ( 'masonry', plugins_url ( '/assets/js/masonry.js', __FILE__ ), array (
	//			'mansonry' 
	//	), '1.0', true );
	//}
}

add_action ( 'wp_enqueue_scripts', 'CP_custom_scripts' );

function cp_install() {
	global $wpdb;
	global $jal_db_version;
	
}
register_activation_hook( __FILE__, 'cp_install' );

function cp_install_data() {
	global $wpdb;
	$welcome_name = "Mr. CP";
	$welcome_text = "Congratulations, you just completed the installation!";
	
	$rows_affected = $wpdb->insert ( $table_name, array (
			'time' => current_time ( 'mysql' ),
			'name' => $welcome_name,
			'text' => $welcome_text 
	) );
}
register_activation_hook( __FILE__, 'cp_install_data' );

/**********************************************************
 * Register Post Type and Taxonomy
**********************************************************/

add_action('init', 'cp_register');

function cp_register() {
	$cp_labels = array(
			'name'                  => _x('CP', 'post type general name', CP_NAME),
			'singular_name'         => _x('Portfolio Item', 'post type singular name', CP_NAME),
			'add_new'               => __('Add New', CP_NAME),
			'add_new_item'          => __('Add New Portfolio Item', CP_NAME),
			'edit_item'             => __('Edit Item', CP_NAME),
			'new_item'              => __('New Item', CP_NAME),
			'all_items' 			=> __('All Items', CP_NAME),
			'view_item'             => __('View Item', CP_NAME),
			'search_items'          => __('Search Portfolio Items', CP_NAME),
			'not_found'             => __('Nothing Found', CP_NAME),
			'not_found_in_trash'    => __('Nothing found in Trash', CP_NAME),
			'parent_item_colon'     => ''
	);

	$cp_args = array(
			'labels'                => $cp_labels,
			'singular_label'        => __('portfolio', CP_NAME),
			'public'                => true,
			'show_ui'               => true,
			'capability_type'       => 'post',
			'hierarchical'          => false,
			'rewrite'               => true,
			'menu_icon'				=> CP_URL.'/assets/img/icon.png',
			'menu_position'			=> 20,
			'exclude_from_search' 	=> true,
			'supports'              => array('title', 'excerpt', 'editor', 'thumbnail')
	);

	register_post_type('portfolio',$cp_args);
}


/**********************************************************
 * Add Extra Custom Fields to the Post Type Add / Edit screen
* Plus Update Method
**********************************************************/

add_action("admin_init", "CP_admin_init");

function CP_admin_init() {
	add_meta_box("work_done", "Work Done", "CP_work_done_options", "portfolio", "side");
	add_meta_box("details", "Details", "CP_meta_options", "portfolio", "normal", "low");
}

function CP_work_done_options() {
	global $post;
	$custom = get_post_custom($post->ID);
	$logo = (isset($custom["logo"][0])) ? $custom["logo"][0] : '';
	$webDesign = (isset($custom["web_design"][0])) ? $custom["web_design"][0] : '';
	$htmlCss = (isset($custom["html"][0])) ? $custom["html"][0] : '';
	$php = (isset($custom["php"][0])) ? $custom["php"][0] : '';
	$mySql = (isset($custom["sql"][0])) ? $custom["sql"][0] : '';
	$java = (isset($custom["java"][0])) ? $custom["java"][0] : '';
	$playframework = (isset($custom["play"][0])) ? $custom["play"][0] : '';
	$zendframework = (isset($custom["zf"][0])) ? $custom["zf"][0] : '';
	$wordpress = (isset($custom["wp"][0])) ? $custom["wp"][0] : '';
	$hosting = (isset($custom["hosting"][0])) ? $custom["hosting"][0] : '';
	?>
	<table width="100%" border="0" class="options" cellspacing="5" cellpadding="5">
			<p><b>What did we do for the client?</b></p>
		<tr>
			<td><label for="logo">Logo</label></td>
			<td><input type="checkbox" name="logo" <?php if( $logo == true ) { ?>checked="checked"<?php } ?> /></td>
		</tr>
		<tr>
			<td><label for="web-design">Web Design</label></td>
			<td><input type="checkbox" name="web-design" <?php if( $webDesign == true ) { ?>checked="checked"<?php } ?> /></td>
		</tr>
		<tr>
			<td><label for="htmlCss">HTML + CSS</label></td>
			<td><input type="checkbox" name="htmlCss" <?php if( $htmlCss == true ) { ?>checked="checked"<?php } ?> /></td>
		</tr>
		<tr>
			<td><label for="php">PHP</label></td>
			<td><input type="checkbox" name="php" <?php if( $php == true ) { ?>checked="checked"<?php } ?> /></td>
		</tr>
		<tr>
			<td><label for="sql">Database</label></td>
			<td><input type="checkbox" name="sql" <?php if( $mySql == true ) { ?>checked="checked"<?php } ?> /></td>
		</tr>
		<tr>
			<td><label for="java">Java</label></td>
			<td><input type="checkbox" name="java" <?php if( $java == true ) { ?>checked="checked"<?php } ?> /></td>
		</tr>
		<tr>
			<td><label for="play">Playframework</label></td>
			<td><input type="checkbox" name="play" <?php if( $playframework == true ) { ?>checked="checked"<?php } ?> /></td>
		</tr>
		<tr>
			<td><label for="zf">Zendframework</label></td>
			<td><input type="checkbox" name="zf" <?php if( $zendframework == true ) { ?>checked="checked"<?php } ?> /></td>
		</tr>
		<tr>
			<td><label for="wp">Wordpress</label></td>
			<td><input type="checkbox" name="wp" <?php if( $wordpress == true ) { ?>checked="checked"<?php } ?> /></td>
		</tr>
		<tr>
			<td><label for="hosting">Hosting</label></td>
			<td><input type="checkbox" name="hosting" <?php if( $hosting == true ) { ?>checked="checked"<?php } ?> /></td>
		</tr>
	</table>
	<?php 
	
}

add_action('save_post', 'CP_save_workDone');
function CP_save_workDone() {
	global $post;
	$custom_meta_fields = array( 'logo','webdesign','html','php','sql', 'java', 'play', 'zf', 'wp', 'hosting');
	foreach( $custom_meta_fields as $custom_meta_field ):
		if(isset($_POST[$custom_meta_field]) && $_POST[$custom_meta_field] != ""):
			update_post_meta($post->ID, $custom_meta_field, $_POST[$custom_meta_field]);
		endif;
	endforeach;
}

function CP_meta_options() {
	global $post;
	if(isset($custom['client_name']) && isset($custom['client_photo']) && isset($custom['email']) 
		     && isset($custom['company_name']) 
		     && isset($custom['company_website'])){
		$custom = get_post_custom($post->ID);
		$client_name = $custom["client_name"][0];
		$client_photo = $custom["client_photo"][0];
		$email = $custom["email"][0];
		$company_website = $custom["company_website"][0];
		$company_name = $custom["company_name"][0];
	}else{
		$client_name = '';
		$client_photo = '';
		$email = '';
		$company_name = '';
		$company_website = '';
	}
	?>
	<table width="100%" border="0" class="options" cellspacing="5" cellpadding="5">
		<tr>
		<td width="10%"><label for="client_name">Client Name</label></td>
		<td width="10%"><input type="text" id="client_name" name="client_name" value="<?php echo $client_name; ?>" size="40"/></td>
		</tr>
		<tr>
		<td width="10%"><label for="email">Client Email:</label></td>
		<td width="10%"><input type="text" id="email" name="email" value="<?php echo $email; ?>" size="40"/></td>
		</tr>
		<tr>
		<td width="10%"><label for="company_website">Client Website(you just created!):</label></td>
		<td width="10%"><input type="text" id="company_website" name="company_website" value="<?php echo $company_website; ?>" size="40"/></td>
		</tr>
		<tr>
		<td width="10%"><label for="company_name">Company Name:</label></td>
		<td width="10%"><input type="text" id="company_name" name="company_name" value="<?php echo $company_name; ?>" size="40"/></td>
		</tr>
	</table>
	<?php
}
 
add_action('save_post', 'CP_save_details');   
function CP_save_details() {  
	global $post;  
	$custom_meta_fields = array( 'client_name','client_photo','email','company_website','company_name' );
	foreach( $custom_meta_fields as $custom_meta_field ):
		if(isset($_POST[$custom_meta_field]) && $_POST[$custom_meta_field] != ""):
			update_post_meta($post->ID, $custom_meta_field, $_POST[$custom_meta_field]);
		endif;
	endforeach;
}
