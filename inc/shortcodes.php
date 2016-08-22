<?php
/**
 * Short codes for a variety of things that appear in the theme
 *
 * @package Union
 */

// [resource_video url="video url"]
function resource_video_func( $atts ) {
    $a = shortcode_atts( array(
        'url' => ''
    ), $atts );

    return '<div class="resource_video">' . "{$a['url']}" . '</div>';
}
add_shortcode( 'resource_video', 'resource_video_func' );
