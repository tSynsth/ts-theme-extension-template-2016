<?php
/*
Title: TSTE Example
Description: Example Field by TSTE
Post Type: post, page
Priority: high
Context: normal
Order: 2
Collapse: true
*/
$fieldprefix = 'ts_tsteexample';
$url_help = '#';
/*
 * Get any field value as follows:
 * get_post_meta($post->ID, 'ts_tsteexample_field1', true)
 *
 */
piklist('field', array(
    'type' => 'textarea'
    ,'field' => $fieldprefix . '_field1'
    ,'label' => __('Field 1', 'tste' )
   	,'help' => __('This is a help for Field 1.' )
    ,'description' => sprintf(__('This ia a description of Field 1. See its detail at <a href="%s">here.</a>', 'tste'), $url_help)
    ,'value' => __('This is a default test value for "ts_tsteexample_field1"', 'tste' )
    ,'attributes' => array(
      'rows' => 10
      ,'cols' => 50
      ,'class' => ''
    )
));