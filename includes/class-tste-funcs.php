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
		public function array_convert($target, $del = ',') {

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
			} elseif (is_string($target)) { //
				$string = preg_replace('/\s+/', '', $target); // Remove any white space
				$array = array();
				if (strpos($target, $del)) {
					$array = explode($del, $string);
				}else{
					$array[] = $string;
				}
				return $array;
			} else {
				return __('No array nor string passed - an error on function "array_convert()"', 'tste');
			}
		}

		/* --------------------------------------------------
		 *
		 *  Function: removeautowrap
		 *  @return No <br> nor <p>
		 *  Recommended only for shortcodes
		 *
		 * -------------------------------------------------- */
		public function removeautowrap($content, $excl = '') {

			$content = str_replace(array('<br />', '<br/>', '<br>'), array('', '', ''), $content);
			if ($excl !== '<p>') {
				$content = str_replace('<p>', '', $content);
				$content = str_replace('</p>', '', $content);
			}

			$content = str_replace('&nbsp;', '', $content);

			$char_codes = array('&#8216;', '&#8217;', '&#8220;', '&#8221;', '&#8242;', '&#8243;');
			$replacements = array("'", "'", '"', '"', "'", '"');
			$content = str_replace($char_codes, $replacements, $content);
			return $content;
		}
		/* --------------------------------------------------
		 *
		 * Function minify_code
		 * @return: minified code
		 * @since    1.0.0
		 *
		 * -------------------------------------------------- */
		public function minify_code($code) {
			/* remove comments */
			//$code = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $code);
			/* remove tabs, spaces, newlines, etc. */
			$code = str_replace(array("\r\n", "\r", "\t", "\n", '  ', '    ', '     '), '', $code);
			/* remove other spaces before/after ) */
			$code = preg_replace(array('(( )+\))', '(\)( )+)'), ')', $code);
			return $code;
		}
		/* --------------------------------------------------
		 *
		 * Function sc_get_atts
		 * @return: Make an array '$atts' of Piklist passed separated arguments
		 * @since    1.0.0
		 *
		 * -------------------------------------------------- */
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
		/* --------------------------------------------------
		 *
		 * Function sc_generate_name
		 * @return Automation: Generate a name for the wrapper class of the target shortcode
		 * @since    1.0.0
		 *
		 * -------------------------------------------------- */
		public function sc_generate_name($name, $suffix) {
			if (isset($$suffix)) {
				$name = $name . $suffix;
			} else {
				$rand = rand(1000, 9999);
				$name = $name . $rand;
			}
			return $name;
		}
		/* --------------------------------------------------
		 *
		 * Function sc_custom_style_hook
		 * @return Automation: load custom style necessary for shortcode through dummystyle.css
		 * @since    1.0.0
		 *
		 * -------------------------------------------------- */
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

	} // end class

	new TSTE_Funcs;
}