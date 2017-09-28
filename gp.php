<?php
$path = dirname(__FILE__) . '/../../..';
//load wp
if (file_exists($path . '/wp-load.php')) {
	die('file exist');
	include_once $path . '/wp-load.php';
} elseif (file_exists($path . '/../wp-load.php')) {
	include_once $path . '/../wp-load.php';
}
die(var_dump(get_option('divi_slick_gallery')));
die('asdasda');
foreach ($options as $value) {
    if (get_option($value['id']) === FALSE) {
        $$value['id'] = $value['std'];
    }
    else {
        $$value['id'] = get_option( $value['id'] );
    }
}?>