<?php
/**
 * Short codes for a variety of things that appear in the theme
 *
 * @package Union
 */

// [resource_video url="video url" title="title" text="description"]
function resource_video_func( $atts ) {
    $a = shortcode_atts( array(
        'url' => '',
        'title' => 'Video',
        'text' => 'Description'
    ), $atts );

    $html = <<<EOB
<div class="thumbnail">
  <video controls style="width:100%;">
    <source src="{$a['url']}">
  </video>
  <div class="caption">
    <h3>{$a['title']}</h3>
    <p>{$a['text']}</p>
  </div>
</div>
EOB;

    return $html;
}
add_shortcode( 'resource_video', 'resource_video_func' );

// [tinted_image img_url="image url" color="rgba(...)"]
function tinted_image_func( $atts ) {
    $a = shortcode_atts( array(
        'img_url' => '',
        'color' => 'rgba(255, 255, 255, 0.3)'
    ), $atts );

    $html = <<<EOB
<div style="background-image: url({$a['img_url']}); background-size: cover; background-repeat: no-repeat; background-position: left top;">

</div>
EOB;

    return $html;
}
add_shortcode( 'resource_video', 'resource_video_func' );
