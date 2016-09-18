<?php
/*
Shortcode: ts_hello
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

$vars = get_defined_vars();
$args = (isset($vars['arguments']))? $vars['arguments']: '';
$content = (isset($vars['content']))? $vars['content']: '';

/**--------------------------------------------------
 *
 *  Main
 *  Call a corresponding TSTE Module with $vars
 *
 * -------------------------------------------------- */

$tsmod_hello = new TSMOD_Hello;

echo $tsmod_hello->hello($args, $content);