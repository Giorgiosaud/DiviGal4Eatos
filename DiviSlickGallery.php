<?php
/**
 * @package DiviSlickGallery
 */
/*
Plugin Name: Divi Slick Gallery
Plugin URI: https://giorgiosaud.com/
Description: Plugin Realizado para añadir una galeria con slick en el tema Divi o un tema hijo del mismo
Version: 3.2
Author: Automattic
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: akismet
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
Big Devices 1405px
Normal Devices 1100px
Tablet 980px
Phone 768px
Copyright 2005-2015 Automattic, Inc.
*/
include_once 'diviSlickGalleryOptionPage.php';
function DiviLoadGallery(){
 include("divi-slick-gallery.php");
 
 include 'gp.php';

}
add_action('et_builder_framework_loaded','DiviLoadGallery');
add_action( 'wp_enqueue_scripts', 'divigalleryslickscripts' );
function divigalleryslickscripts(){
	wp_register_style('slick',plugins_url( '/Slick/slick.css', __FILE__ ));
	wp_register_style('slicktheme',plugins_url( '/Slick/slick-theme.css', __FILE__ ),array('slick'));
	wp_register_script('slick',plugins_url( '/Slick/slick.min.js', __FILE__ ),array('jquery'));
	wp_enqueue_style('slicktheme');
	wp_enqueue_script('slick');
}


function add_link_to_attachment_meta(){
   add_meta_box( 'link-to-attachment-meta-box', 
                 'Link To', 
                 'add_link_to_attachment_meta_callback',
                 'attachment',
                 'normal',
                 'low');
}
add_action( 'admin_init', 'add_link_to_attachment_meta' );
function add_link_to_attachment_meta_callback(){
     global $post; 
     $value = get_post_meta($post->ID, 'link_to', 1);
?>
<label class="setting" data-setting="alt">
	<span class="name">Link to:</span>
	<input type="text" name="link_to" value="<?=$value?>">
</label>
     <?php
}
function save_our_link_to_attachment_meta(){
     global $post; 
     if( isset( $_POST['link_to'] ) ){
           update_post_meta( $post->ID, 'link_to', $_POST['link_to'] );
     }
}

add_action('edit_attachment', 'save_our_link_to_attachment_meta');
?>