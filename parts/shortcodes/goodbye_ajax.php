<?php
/*
Shortcode: ts_goodbyeajax
*/
if (!function_exists('ga_callback')){
	function ga_callback() {
		//echo $_POST['content'];
		$content = $_POST['content'];
		if (defined('DOING_AJAX') && DOING_AJAX) {
			echo $content;
			wp_die();
		} else {
			wp_redirect(home_url());
			exit();
		}
	}
}

/*IT DOESNT SEEM TO WORK!!!!*/
/*IT DOESNT SEEM TO WORK!!!!*/
/*IT DOESNT SEEM TO WORK!!!!*/
/*USE NORMAL SHORTCODE FOR AJAX!!!!*/
/*USE NORMAL SHORTCODE FOR AJAX!!!!*/
/*USE NORMAL SHORTCODE FOR AJAX!!!!*/

wp_localize_script(__TSTE_TOKEN__ . '-frontend', 'GA', array(
	'ajax_url_piklist' => admin_url('admin-ajax.php')
));
add_action('wp_ajax_goodbyeajax', 'ga_callback', 10, 999);
add_action('wp_ajax_nopriv_goodbyeajax', 'ga_callback', 10, 999);

global $post;
$op = '';
$op .= '<section class="ts-goodbyeajax">';
$op .= '<button class="btn btn-lg" data-content="' . $content . '"><i class="glyphicon glyphicon-repeat"></i></button>';
$op .= '<p class="callback" style="min-height: 28px;">' . '' . '</p>';
$op .= '</section>';
?>


	<em><?php echo $op; ?></em>


<?php
/**
 *
 * Function: ga_callback.
 * @return  ajax call back
 * @since  1.0.0
 *
 */
