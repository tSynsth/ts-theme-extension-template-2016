<?php
/*
Name: Hello
Description: A greeting of your choice of content
Shortcode: ts_hello
Icon: dashicons-editor-quote
*/

piklist('field', array(
	'type' => 'textarea'
	,'field' => 'content'
	,'label' => __('Greeting')
	,'attributes' => array(
		'class' => 'large-text'
		,'rows' => 5)
	,'required' => true
));