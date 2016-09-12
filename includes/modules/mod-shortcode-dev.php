<?php
/*
 * Name: TS Shortcode for Developers
 * Function Name: Many
 * Shortcode Tag: Many
 * Deprecated Shortcode Tag: NA
 * Description: A Collection of shortcodes modules for developers
 * URI: http://tuningsynesthesia.com/
 */
if(!class_exists("TSMOD_ScsDev") &&  class_exists('TSTE_funcs')){
	class TSMOD_ScsDev{
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
			$this->TSTE_Funcs = new TSTE_Funcs;
			add_action("admin_init",array($this,"admin_init"));
			add_action("init",array($this,"init"));
			add_shortcode('cmt', array($this,'__comment'));
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
		 *	Function __comment
		 *  @return Make any text as comment
		 *	@since 	1.0.0
		 *
		 **/
		function __comment( $atts, $content = null ) {
			$content = str_replace( '&#8212;', '-', $content );
			return '<!-- ' . $this->TSTE_Funcs->removeautowrap ( $content ) . ' --!>';
		}

	} //end class
	new TSMOD_ScsDev;
}