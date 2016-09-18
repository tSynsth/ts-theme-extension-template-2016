<?php
/*
Title: Hello
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

$tsmod_hello = new TSMOD_Hello;

$hello = $tsmod_hello->hello($settings, $settings_content);

echo $before_widget;

if(!empty($settings['title']))
echo $before_title . $settings['title'] . $after_title;

echo $hello;

echo $after_widget;