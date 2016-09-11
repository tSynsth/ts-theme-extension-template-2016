<?php
/*
 * Name: TSTE_Funcs TS Functions
 * Function Name: A Collection of Functions
 * Description: A Collection of functions
 * URI: http://tuningsynesthesia.com/
 */
if (!class_exists("TSTE_Funcs")) {
	class TSTE_Funcs {

		public $settings;
		public $post_data_curr;

		/* --------------------------------------------------
		 *
		 *  Function: array_convert
		 *  @return A string by flattening an array
		 *
		 * -------------------------------------------------- */

		public function array_convert($target, $del = ', ') {

			if (empty($target)) return;
			if (is_array($target)) {
				$array = $target;
				$string = '';
				$numItems = count($array);
				$i = 0;
				foreach ($array as $a) {
					$string .= $a;
					if (++$i !== $numItems) $string .= $del;
				}
				return $string;
			} elseif (is_string($target) && strpos($target, $del)) {
				$string = $target;
				$array = array();
				$array = explode(" ", $string);
				return $array;
			} else {
				return __('No array nor string passed - an error on function "array_convert()"', 'tste');
			}
		}
		/**
		 * Function sc_get_atts
		 * @return: Make an array '$atts' of Piklist passed separated arguments
		 * @since    1.0.0
		 **/
		public function sc_get_atts($vars) {

			if($vars) {
				foreach ($vars as $var_name => $value) {
					if ($var_name !== 'content')
						$atts[$var_name] = $value;
				}
				return $atts;
			} else {
				return false;
			}
		}
		/**
		 *    Function sc_generate_name
		 * @return Automation: Generate a name for the wrapper class of the target shortcode
		 * @since    1.0.0
		 **/
		public function sc_generate_name($name, $suffix) {
			if (isset($$suffix)) {
				$name = $name . $suffix;
			} else {
				$rand = rand(1000, 9999);
				$name = $name . $rand;
			}
			return $name;
		}
		/**
		 * Function sc_custom_style_hook
		 * @return Automation: load custom style necessary for shortcode through dummystyle.css
		 * @since    1.0.0
		 **/
		public function sc_custom_style_hook($classname, $style) {

			$styleblock = '.' . $classname . '{' . $style . '}';
			$styleblock = $this->minify_code($styleblock);

			if ($this->tste_settings['gn_theme_ajax'] === 'true') { // Incomplete
				echo '<style id="style-' . $classname . '" type="text/css">'
					. $styleblock
					. '</style>';
			} else {
				wp_enqueue_style(__TSTE_TOKEN__ . '-dummystyle');
				wp_add_inline_style(__TSTE_TOKEN__ . '-dummystyle', $styleblock);
			}
		}
		/**
		 * Function minify_code
		 * @return: minified code
		 * @since    1.0.0
		 **/
		public function minify_code($code) {
			/* remove comments */
			//$code = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $code);
			/* remove tabs, spaces, newlines, etc. */
			$code = str_replace(array("\r\n", "\r", "\t", "\n", '  ', '    ', '     '), '', $code);
			/* remove other spaces before/after ) */
			$code = preg_replace(array('(( )+\))', '(\)( )+)'), ')', $code);
			return $code;
		}
	} // end class

	new TSTE_Funcs;
}