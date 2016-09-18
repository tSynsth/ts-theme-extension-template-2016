<?php
/*
Shortcode: ts_helloajax
*/
/**--------------------------------------------------
 *
 *  Setup
 *  Preparing parameters; globals from Piklist input fields
 *  Do not change this unless you know what you are doing
 *
 * -------------------------------------------------- */

$vars = get_defined_vars();
$args = (isset($vars['arguments']))? $vars['arguments']: '';
$content = (isset($vars['content']))? $vars['content']: '';

/**--------------------------------------------------
 *
 *  Main
 *  Call a corresponding TSTE Module with $vars
 *
 * -------------------------------------------------- */

$tsmod_helloajax = new TSMOD_HelloAjax;

echo $tsmod_helloajax->helloajax($args, $content);