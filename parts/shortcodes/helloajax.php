<?php
/*
Shortcode: ts_helloajax
*/
$atts = array (
	"id" =>         $id,
	"text_align" => $text_align,
	"font_color" => $font_color,
	"class" =>      $class
);

$mod_helloajax = new TSMOD_HelloAjax;

echo $mod_helloajax->helloajax($atts, $content);