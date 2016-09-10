<?php
/*
Title: First Example
Setting: tste_settings
Order: 20
*/
$tabprefix = 'ex_first';
    /*
     * Get an option value as follows:
     * get_option('tste_settings', true)['ex_first_field1'];
     *
     * [List]
     * ex_first_field1
     * ...
     */
?>
<?php
piklist('field', array(
    'type' => 'textarea'
    , 'field' => $tabprefix . '_field1'
    , 'label' => __('Example Field 1', 'tste')
    , 'description' => __('Description for Example Field 1', 'tste')
    ,'attributes' => array(
        'rows' => 5
        ,'cols' => 50
        ,'class' => ''
    )
));
?>