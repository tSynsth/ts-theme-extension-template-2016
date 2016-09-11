<?php
/*
Name: Hello
Description: A greeting of your choice of content
Shortcode: ts_hello
Icon: dashicons-editor-quote
*/
piklist('field', array(
	'type' => 'textarea',
	'field' => 'content',
	'label' => __('Demo Conent will be diplayed.', __TSTE_TOKEN__)
));
piklist('field', array(
	'type' => 'text',
	'field' => 'suffix',
	'label' => __('Suffix of Your Shorcode Name', __TSTE_TOKEN__),
));
piklist('field', array(
	'type' => 'colorpicker',
	'field' => 'font_color',
	'label' => __('Color of your greeting text', __TSTE_TOKEN__),
));
piklist('field', array(
	'type' => 'text',
	'field' => 'class',
	'label' => __('Custom class', __TSTE_TOKEN__),
));