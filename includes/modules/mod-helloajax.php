<?php
if (!class_exists("TSMOD_HelloAjax")) {
	class TSMOD_HelloAjax {

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
		public function __construct() {
			// Ajax Setup
			add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'), 16, 999);
			add_action('wp_ajax_nopriv_helloajax', array($this, 'ha_callback'));
			add_action('wp_ajax_helloajax', array($this, 'ha_callback'));
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
		public function helloajax ($atts, $content) {

			global $post;

			extract(shortcode_atts(array(
				"suffix" =>         "",
				"text_align" =>     "",
				"font_color" =>     "",
				"class" =>          ""
			), $atts));


			$style = $style = $op = '';

			/**
			 * Content , Class & Style
			 **/
			$name = 'ts-helloajax-';
			$style .= (isset($text_align))? 'text-align: ' . $text_align . ';': '';
			$style_p .= (isset($font_color))? 'color: ' . $font_color . ';': '';

			if (class_exists('TSTE_funcs')) {
				$tste_funcs = new TSTE_funcs;
				$name = $tste_funcs->sc_generate_name($name, $suffix);
				if (!empty($style)) $tste_funcs->sc_custom_style_hook($name, $style);
				if (!empty($style_p)) $tste_funcs->sc_custom_style_hook($name.' p', $style_p);
				//$content = $ts_funcs->removeautowrap($content);
			}
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