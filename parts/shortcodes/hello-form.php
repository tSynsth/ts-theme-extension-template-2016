<?php
/*
Name: Hello
Description: Greeting module output anything added in the content field below.
Shortcode: ts_hello
Icon: dashicons-editor-quote
*/
/**--------------------------------------------------
 *
 *  Read parameters from TSTE modules for form creation
 *  Update the first and second lines with your module class name
 *
 * -------------------------------------------------- */
if (class_exists('TSMOD_Hello')) {
	$tsmod = new TSMOD_Hello;
	if(method_exists($tsmod, 'param_form')) {
		$param = $tsmod->param_form();
		foreach ($param as $p) piklist('field', $p);
	}
}