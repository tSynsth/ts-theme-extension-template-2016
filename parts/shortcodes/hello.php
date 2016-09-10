<?php
/*
Shortcode: ts_hello
*/
?>
<?php

$atts = array (
	"id" =>         $id,
	"font_color" => $font_color,
	"class" =>      $class
);

$mod_hello = new TSMOD_Hello;

echo $mod_hello->hello($atts, $content);