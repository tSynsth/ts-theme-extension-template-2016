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
				"suffix" => "",
				"font_color" => "",
				"class" => ""
			), $atts));

			$style = $op = '';

			/**
			 * Content & Class & Style
			 **/
			$name = 'ts-hello-';
			$style .= (isset($font_color))? 'color: ' . $font_color . ';': '';

			if (class_exists('TSTE_funcs')) {
				$tste_funcs = new TSTE_funcs;
				$name = $tste_funcs->sc_generate_name($name, $suffix);
				if (!empty($style)) $tste_funcs->sc_custom_style_hook($name, $style);
				//$content = $ts_funcs->removeautowrap($content);
			}
			do_shortcode($content);
			
			/**
			 * Output
			 **/
			$op = '<p id="'.$name.'" class="' . $name.' '.$class.'">'
					. $content
				. '</p>';

			return $op;
		}
	} // end class
	new TSMOD_Hello;
}