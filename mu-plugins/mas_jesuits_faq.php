<?php

function mas_jesuits_faq(){
    
    // FAQ Page
    register_post_type('vocation', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'page-attributes'),
        'public'  => true,
        'labels'  => array(
            'name'          =>  'Vocation FAQ',
            'add_new_item'  =>  'Add New FAQ',
            'edit_item'     =>  'Edit FAQ',
            'all_items'     =>  'All FAQs',
            'singular_name' =>  'FAQ'
        ),
        'menu_icon' => 'dashicons-admin-settings'
    ));
    
    // Homepage Banner
    register_post_type('banner', array(
        'show_in_rest' => false,
        'supports' => array('title', 'editor', 'page-attributes'),
        'public'  => true,
        'labels'  => array(
            'name'          =>  'Homepage Banner',
            'add_new_item'  =>  'Add New Banner',
            'edit_item'     =>  'Edit Home Banner',
            'all_items'     =>  'All Home Banner',
            'singular_name' =>  'Banner'
        ),
        'menu_icon' => 'dashicons-format-image'
    ));

}

add_action('init', 'mas_jesuits_faq');