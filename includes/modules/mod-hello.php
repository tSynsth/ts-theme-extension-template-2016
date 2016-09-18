<?php
if (!class_exists("TSMOD_Hello") && class_exists('TSTE_funcs')) {

	class TSMOD_Hello {
		/**--------------------------------------------------
		 *
		 *	Constructor
		 *
		 * -------------------------------------------------- */
		/*
		 *  Function: __construct, admin_init, init, param
		 * @return Constructor and setup
		 * @since  1.0.0
		 */
		public function __construct() {
			$this->tste_funcs = new TSTE_Funcs;
		}

		public function admin_init() { }

		public function init() { }

		public function param_form() {
			$param = array(
				array(
					'type' => 'text',
					'field' => 'title',
					'label' => __('Title', __TSTE_TOKEN__),
					'attributes' => array(
						'class' => 'regular-text'
					)
				),
				array(
					'type' => 'textarea',
					'field' => 'content',
					'label' => __('Content', __TSTE_TOKEN__),
					'attributes' => array(
						'rows' => 10,
						'class' => 'large-text'
					)
				), array(
					'type' => 'colorpicker',
					'field' => 'font_color',
					'label' => __('Color of your greeting text', __TSTE_TOKEN__),
				), array(
					'type' => 'text',
					'field' => 'suffix',
					'label' => __('Suffix', __TSTE_TOKEN__),
					'description' => __('Suffix is word endings. This will be used in CSS ID and class.', __TSTE_TOKEN__)
				), array(
					'type' => 'text',
					'field' => 'class',
					'label' => __('Custom class', __TSTE_TOKEN__),
					'attributes' => array(
						'class' => 'regular-text'
					)
				)
			);
			return $param;
		}
		/**--------------------------------------------------
		 *
		 *    Function
		 *
		 * -------------------------------------------------- */
		/**
		 *    Function hello
		 * @return A greeting of your choice of content
		 * @since    1.0.0
		 **/
		public function hello($atts, $content = null) {

			/**
			 * Extract atts
			 * Define backend default values which will not overwrite user input.
			 * When no value is passed by users, this default value will be used.
			 * See README.md
			 **/
			extract(shortcode_atts(array(
				'font_color' => '',
				'suffix' => 'demo-sufix',
				'class' => ''
			), $atts));
			if (empty($content)) $content = "Demo Content";

			$style = $op = '';

			/**
			 * Content & Class & Style
			 **/
			$name = 'ts-hello-';
			$style .= (!empty($font_color)) ? 'color: ' . $font_color . ';' : '';

			$name = $this->tste_funcs->sc_generate_name($name, $suffix);
			if (!empty($style)) $this->tste_funcs->sc_custom_style_hook($name, $style);

			do_shortcode($content);

			/**
			 * Output
			 **/
			$op = '<p id="' . $name . '" class="' . $name . ' ' . $class . '">'
				. $content
				. '</p>';

			return $op;
		}
	} // end class
	new TSMOD_Hello;
}