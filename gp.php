<?php
$path = dirname(__FILE__) . '/../../..';
//load wp
if (file_exists($path . '/wp-load.php')) {
	include_once $path . '/wp-load.php';
} elseif (file_exists($path . '/../wp-load.php')) {
	include_once $path . '/../wp-load.php';
}
die(var_dump('test'));