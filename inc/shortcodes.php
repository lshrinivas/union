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
  <video style="width:100%;">
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
add_shortcode( 'tinted_image', 'tinted_image_func' );

function thumbnail_strip_func( $atts, $content ) {

    $content = do_shortcode($content);
    $html = <<<EOB
<div class="thumbnail_strip">
    <div class="thumbnail_content">
        {$content}
    </div>
    <a class="left carousel-control thumbnail_left" href="#" role="button">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control thumbnail_right" href="#" role="button">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
EOB;

    return $html;
}
add_shortcode( 'thumbnail_strip', 'thumbnail_strip_func' );

