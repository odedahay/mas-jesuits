<?php 


// history image [image]
add_shortcode('image', function($atts, $content = null){
    $attributes = shortcode_atts([
        'tip' => 'default tip'
    ], $atts);

    return '<div class="history-flex-img">' .$content. '</div>';
});

// [content]
add_shortcode('content', function($atts, $content = null){
    $attributes = shortcode_atts([
        'tip' => 'default tip'
    ], $atts);

    return '<div class="history-flex-para">' .$content. '</div>';
});
