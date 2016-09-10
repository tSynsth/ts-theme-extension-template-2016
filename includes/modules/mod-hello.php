<?php
if(!class_exists("TSMOD_Hello")){

	class TSMOD_Hello {

		/**--------------------------------------------------
		 *
		 *	Function
		 *
		 * -------------------------------------------------- */
		/**
		 *
		 *	Function hello
		 *  @return A greeting of your choice of content
		 *	@since 	1.0.0
		 *
		 **/
		public function hello($atts, $content){
			
			extract(shortcode_atts(array(
				"id" => "",
				"font_color" => "",
				"class" => ""
			), $atts));


			$class_id = $style = $op = '';

			/**
			 * Content & Class & Style
			 **/
			$class_id = 'ts-hello-';
			$style = 'color: ' . $font_color . ';';

			if (class_exists('TSTE_funcs')) {
				$tste_funcs = new TSTE_funcs;

				$class_id = $tste_funcs->sc_generate_id($class_id, $id);
				if (!empty($style)) $tste_funcs->sc_custom_style_hook ($class_id, $style);
				//$content = $ts_funcs->removeautowrap($content);
			}
			do_shortcode($content);
			
			/**
			 * Output
			 **/
			$op = '<p class="' . $class_id . ' ' . $class . '">'
					. $content
				. '</p>';

			return $op;
		}
	} // end class
	new TSMOD_Hello;
}