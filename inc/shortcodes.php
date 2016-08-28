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
    <iframe src="{$a['url']}" frameborder="0" allowfullscreen></iframe>

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
function tinted_image_func( $atts, $content ) {
    $a = shortcode_atts( array(
        'img_url' => '',
        'color' => 'rgba(255, 255, 255, 0.3)',
        'img_position' => 'center center'
    ), $atts );

    $content = do_shortcode($content);

    $html = <<<EOB
<div style="background-image: url({$a['img_url']}); background-position: {$a['img_position']}" class="tinted_image">
    <div class="tinted_image-tint" style="background-color: {$a['color']}"></div>
    <div class="tinted_image-content">{$content}</div>
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

// One item in a carousel
function carousel_item_func( $atts ) {
    $a = shortcode_atts( array(
        'url' => '',
        'title' => '',
        'bar_content' => '',
        'active' => false,
        'title_class' => ''
    ), $atts );

    $activeClass = "";
    if ($a['active']) { $activeClass = "active"; }

    $bar = "";
    if (!empty($a['bar_content'])) {
        $bar = <<<BAR
<div class="carousel-bar">
    <h4>{$a['bar_content']}</h4>
</div>
BAR;
    }

    $title = $a['title'];

    $html = <<<EOB
<div class="item {$activeClass}">
    <video autoplay loop>
        <source src="{$a['url']}">
    </video>
    <div class="video_message {$a['title_class']}">
        {$title}
    </div>
    {$bar}
</div>
EOB;

    return $html;
}
add_shortcode( 'carousel_item', 'carousel_item_func' );

// Carousel
function carousel_func( $atts, $content ) {

    $a = shortcode_atts( array(
        'interval' => 3000,
    ), $atts );

    $num_items = substr_count($content, 'carousel_item');

    $carouselIndicators = "";
    $activeClass = 'class="active"';
    for ($i=0; $i < $num_items; $i++) {
        $carouselIndicators .= "<li data-target=\"#carousel\" data-slide-to=\"{$i}\" {$activeClass}></li>";
        $activeClass = '';
    }

    $content = do_shortcode($content);
    $html = <<<EOB
<div id="carousel" class="carousel slide" data-ride="carousel" data-interval={$a['interval']}>
    <!-- Indicators -->
    <ol class="carousel-indicators">
        {$carouselIndicators}
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        {$content}
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
EOB;

    return $html;
}
add_shortcode( 'carousel', 'carousel_func' );
