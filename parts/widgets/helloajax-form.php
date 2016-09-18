<?php
/**--------------------------------------------------
 *
 *  Read parameters from TSTE modules for form creation
 *  Update the first and second lines with your module class name
 *
 * -------------------------------------------------- */
if (class_exists('TSMOD_HelloAjax')) {
	$tsmod = new TSMOD_HelloAjax;
	if(method_exists($tsmod, 'param_form')) {
		$param = $tsmod->param_form();
		foreach ($param as $p) piklist('field', $p);
	}
}