<?php
/*
Shortcode: ts_helloajax
*/
/**--------------------------------------------------
 *
 *  Setup
 *  Preparing $atts
 *  Do not change this unless you know what you are doing
 *
 * -------------------------------------------------- */
if (class_exists('TSTE_funcs')) {
	$vars = get_defined_vars()['arguments'];
	$tste_funcs = new TSTE_funcs;
	$atts = $tste_funcs->sc_get_atts($vars);
} else {
	echo __('NA: Please enable TSTE function.',__TSTE_TOKEN__);
}
/**--------------------------------------------------
 *
 *  Main
 *  Call a corresponding TSTE Module
 *
 * -------------------------------------------------- */
$mod_helloajax = new TSMOD_HelloAjax;

echo $mod_helloajax->helloajax($atts, $content);