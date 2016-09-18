<?php
/*
Title: Hello Ajax
Description: Greeting module output anything added in the content field below.
*/
?>
<?php
/**--------------------------------------------------
 *
 *  Setup
 *  Preparing parameters; globals from Piklist input fields
 *  Do not change this unless you know what you are doing
 *
 * -------------------------------------------------- */

$settings_content = (isset($settings['content']))? $settings['content']: '';

/**--------------------------------------------------
 *
 *  Main
 *  Call a corresponding TSTE Module with $vars
 *
 * -------------------------------------------------- */

$tsmod_helloajax = new TSMOD_HelloAjax;

$helloajax = $tsmod_helloajax->helloajax($settings, $settings_content);

echo $before_widget;

if(!empty($settings['title']))
	echo $before_title . $settings['title'] . $after_title;

echo $helloajax;

echo $after_widget;