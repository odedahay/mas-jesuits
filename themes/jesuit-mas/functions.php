<?php

function mas_jesuits_files(){
    wp_enqueue_script('boostrap-popper-js', '//cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js', NULL, '1.0', true);
    wp_enqueue_script('boostrap-js', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', NULL, '1.0', true);
    wp_enqueue_script('jesuit-mas-main-js', get_theme_file_uri('/js/app.js'), NULL, '1.0', true);
    wp_enqueue_style('boostrap-all', get_theme_file_uri('/css/bootstrap.min.css'));
    wp_enqueue_style('jesuit-mas-main-styles', get_stylesheet_uri());
    wp_enqueue_style('boostrap_icons', get_theme_file_uri('/bootstrap-icons/bootstrap-icons.css'));
}

add_action('wp_enqueue_scripts', 'mas_jesuits_files');

function mas_jesuits_features(){
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerMenuLocation', 'Footer Menu Location');
    add_theme_support('post-thumbnails');
    add_image_size('offeringLandscape', 640, 360, true);
    add_image_size('missionLandscape', 900, 330, true);
    add_image_size('aboutPortrait', 600, 480, true);
    add_image_size('missionThumbnail', 430, 220, true);
    add_image_size('pageBanner', 1500, 350, true);
    add_image_size('homepageBannerHalf', 625, 565, true);
    add_image_size('homepageAboutImage', 988, 328, true);
    add_image_size('homepageOurHistoryImage', 988, 612, true);
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'mas_jesuits_features');

// history div [div]
add_shortcode('break', function(){
    return '';
});

// history image [image]
add_shortcode('history_image', function($atts, $content = null){
    $attributes = shortcode_atts([
        'tip' => 'default tip'
    ], $atts);

    $output .= '<div class="history history-flex"><div class="history-flex-img">';
    remove_filter( 'the_content', 'wpautop' );
    $output .= do_shortcode( $content );
    add_filter( 'the_content', 'wpautop' , 99 );
    add_filter( 'the_content', 'shortcode_unautop', 100 );
    $output .= '</div>';

    return $output;
});

// [content]
add_shortcode('history_content', function($atts, $content = null){
    // $attributes = shortcode_atts([
    //     'tip' => 'default tip'
    // ], $atts);

    // return '<div class="history-flex-para">' .$content. '</div></div>';

    $output .= '<div class="history-flex-para">';
    remove_filter( 'the_content', 'wpautop' );
    $output .= do_shortcode( $content );
    add_filter( 'the_content', 'wpautop' , 99 );
    add_filter( 'the_content', 'shortcode_unautop', 100 );
    $output .= '</div></div>';

    return $output;
});

function custom_post_type_init() {
    register_post_type('your_custom_post_type', array(
        'label' => 'Custom Post Type',
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    ));
}
add_action('init', 'custom_post_type_init');

// Add ACF fields for sidebar
if(function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_rebuilding_kingsmead',
        'title' => 'Rebuilding Kingsmead Sidebar',
        'fields' => array(
            array(
                'key' => 'field_sidebar',
                'label' => 'Sidebar Content',
                'name' => 'sidebar',
                'type' => 'wysiwyg',
                'instructions' => 'Add content for the sidebar',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-rebuilding-kingsmead.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
    ));
    
endif;


