<?php
if (!class_exists("TSMOD_HelloAjax") && class_exists('TSTE_funcs')) {
	class TSMOD_HelloAjax {

		/**--------------------------------------------------
		 *
		 *	Constructor
		 *
		 * -------------------------------------------------- */
		/*
		 * Function: __construct, admin_init, init, param
		 * @return Constructor and setup
		 * @since  1.0.0
		 */
		public function __construct(){
			$this->tste_funcs = new TSTE_Funcs;
			// Ajax Setup
			add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'), 16, 999);
			add_action('wp_ajax_nopriv_helloajax', array($this, 'ha_callback'));
			add_action('wp_ajax_helloajax', array($this, 'ha_callback'));
		}
		public function admin_init(){ }
		public function init(){ }

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
					'type' => 'select',
					'field' => 'text_align',
					'label' => __('Text Align', __TSTE_TOKEN__),
					'choices' => array(
						'center' => __('Center', __TSTE_TOKEN__),
						'right' => __('Right', __TSTE_TOKEN__),
						'left' => __('Left', __TSTE_TOKEN__)
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
		 *	Function
		 *
		 * -------------------------------------------------- */
		/**
		 *
		 *	Function helloajax
		 *  @return A greeting of your choice of content with use of Ajax
		 *	@since 	1.0.0
		 *
		 **/
		public function helloajax ($atts, $content = null) {


			global $post;

			/**
			 * Extract atts and define its default
			 **/
			extract(shortcode_atts(array(
				"text_align" =>     "center",
				"font_color" =>     "",
				"suffix" =>         "",
				"class" =>          ""
			), $atts));
			if(empty($content))  $content = "Demo Content";

			$style = $style_p = $op = '';

			/**
			 * Content , Class & Style
			 **/
			$name = 'ts-helloajax-';
			$style .= (!empty($text_align))? 'text-align: ' . $text_align . ';': '';
			$style_p .= (!empty($font_color))? 'color: ' . $font_color . ';': '';

			$name = $this->tste_funcs->sc_generate_name($name, $suffix);
			if (!empty($style)) $this->tste_funcs->sc_custom_style_hook($name, $style);
			if (!empty($style_p)) $this->tste_funcs->sc_custom_style_hook($name.' p', $style_p);
			//$content = $this->tste_funcs->removeautowrap($content);

			do_shortcode($content);

			/**
			 * Output
			 **/
			$op .= '<div id="'.$name.'" class="'.$name.' '.$class.'">';
			$op .=      '<button class="btn btn-lg" data-content="' . $content . '"><i class="glyphicon glyphicon-repeat"></i></button>';
			$op .=      '<p class="callback" style="min-height: 20px;">' . '' . '</p>';
			$op .= '</div>';

			return $op;
		}
		/**--------------------------------------------------
		 *
		 *	Helper
		 *
		 * -------------------------------------------------- */
		/**
		 * Function: enqueue_scripts.
		 * @return  void
		 * @since  1.0.0
		 */
		public function enqueue_scripts() {

			wp_localize_script( __TSTE_TOKEN__ . '-frontend', 'HA', array(
				'ajax_url' => admin_url('admin-ajax.php')
			));
		}
		/**
		 * Function: ha_callback.
		 * @return  ajax call back
		 * @since  1.0.0
		 */
		public function ha_callback() {

			$content = $_POST['content'];
			$post_id = $_POST['post_id'];
			$field = $_POST['field'];

			$op = get_post_meta($post_id, $field, true);

			if (defined('DOING_AJAX') && DOING_AJAX) {
				echo $content;
				die();
			} else {
				wp_redirect(get_permalink($post_id));
				exit();
			}
		}
	} // end class
	new TSMOD_HelloAjax;
}