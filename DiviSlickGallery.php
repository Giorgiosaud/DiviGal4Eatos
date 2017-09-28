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
Text Domain: divi-slick
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
// die('soidcsd');
include_once 'diviSlickGalleryOptionPage.php';
function DiviLoadGallery(){
 include("divi-slick-gallery.php");
 include("divi-slick-gallery-item.php");
}
add_action('et_builder_framework_loaded','DiviLoadGallery');
add_action( 'wp_enqueue_scripts', 'divigalleryslickscripts' );
function divigalleryslickscripts(){
	wp_register_style('slick',plugins_url( '/Slick/slick.css', __FILE__ ));
	wp_register_style('slicktheme',plugins_url( '/Slick/slick-theme.css', __FILE__ ),array('slick'));
	wp_register_script('slick',plugins_url( '/Slick/slick.min.js', __FILE__ ),array('jquery'));
	
}
?>