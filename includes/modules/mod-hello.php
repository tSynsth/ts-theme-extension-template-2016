<?php
if(!class_exists("TSMOD_Hello") && class_exists('TSTE_funcs')){

	class TSMOD_Hello {
		/**--------------------------------------------------
		 *
		 *	Constructor
		 *
		 * -------------------------------------------------- */
		/**
		 *  Function: __construct
		 *  @return Constructor
		 *  @since  1.0.0
		 */
		function __construct(){
			$this->tste_funcs = new TSTE_Funcs;
		}
		function admin_init(){ }
		function init(){ }
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
		public function hello($atts, $content = null){

			/**
			 * Extract atts
			 * To define default values, use the following format:
			 *
			 * extract(shortcode_atts(array(
			 *      'suffix'        => 'demo-sufiix',
			 *		'font_color'    => 'demo-color',
			 *		'class'         => 'demo-sufiix'
			 *		), $atts));
			 *
			 * This will not overwrite user input.
			 * When no value is passed by users, this default value will be used.
			 *
			 **/
			if($atts) extract($atts);
			if(!isset($content))  $content = "Demo Content";

			$style = $op = '';

			/**
			 * Content & Class & Style
			 **/
			$name = 'ts-hello-';
			$style .= (isset($font_color))? 'color: ' . $font_color . ';': '';

			$name = $this->tste_funcs->sc_generate_name($name, $suffix);
			if (isset($style)) $this->tste_funcs->sc_custom_style_hook($name, $style);
			//$content = $this->tste_funcs->removeautowrap($content);
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