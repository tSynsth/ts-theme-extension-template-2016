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

			if(empty($target)) return;
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
		 *
		 *	Function sc_generate_id
		 *  @return Automation: Generate an id for the main class of the target shortcode
		 *	@since 	1.0.0
		 *
		 **/
		public function sc_generate_id ($prefix, $id) {
			if (!empty($id)) {
				$class_id = $prefix . $id;
						} else {
				$rand = rand(1000, 9999);
				$class_id = $prefix . $rand;
			}
			return $class_id;
		}
		/**
		 *
		 *	Function sc_custom_style_hook
		 *  @return Automation: load custom style necessary for shortcode through dummystyle.css
		 *	@since 	1.0.0
		 *
		 **/
		public function sc_custom_style_hook ($class_id, $style) {

			$styleblock = '.' . $class_id . '{' . $style . '}';

			if ($this->tste_settings['gn_theme_ajax'] === 'true') {
				echo '<style id="style-' . $class_id . '" type="text/css">'
					. $styleblock
					. '</style>';
			}else{
				wp_enqueue_style(__TSTE_TOKEN__ . '-dummystyle');
				wp_add_inline_style(__TSTE_TOKEN__ . '-dummystyle', $styleblock);
			}
		}

	} // end class

	new TSTE_Funcs;
}