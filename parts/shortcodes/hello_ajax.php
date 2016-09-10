<?php
/*
Shortcode: ts_helloajax
*/

$atts = array (
	"id" =>         $id,
	"font_color" => $font_color,
	"class" =>      $class
);

$mod_helloajax = new TSMOD_HelloAjax;

echo $mod_helloajax->helloajax($atts, $content);