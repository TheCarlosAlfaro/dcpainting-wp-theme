<?php
/*custom query for slider */
$slides = array();
$category = get_theme_mod('slider_cat');
$slider_n = get_theme_mod('slider_number');

$args = array(
    'cat' => $category,
    'posts_per_page'=> $slider_n
);
$slider_query = new WP_Query( $args );
if ( $slider_query->have_posts() ) {
    while ( $slider_query->have_posts() ) {
        $slider_query->the_post();
        if(has_post_thumbnail()){
            $temp = array();
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
            $thumb_url = $thumb_url_array[0];
            $temp['title'] = get_the_title();
            $temp['excerpt'] = get_the_excerpt();
            $temp['image'] = $thumb_url;
            $slides[] = $temp;
        }
    }
}
wp_reset_postdata();
//check if slider is switched on
if ( true == get_theme_mod( 'slider-toggle', true ) ) : ?>

<?php if(count($slides) > 0) { ?>

<div id="main-slider" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
        <?php for($i=0;$i<count($slides);$i++) { ?>
        <li data-target="#main-slider" data-slide-to="<?php echo esc_attr($i); ?>" <?php if($i==0) { ?>class="active"<?php } ?>></li>
        <?php } ?>
    </ol>

    <div class="carousel-inner" role="listbox">
        <?php $i=0; foreach($slides as $slide) { extract($slide); ?>
        <div class="carousel-item <?php if($i == 0) { ?>active<?php } ?>" style="background-image:url('<?php echo esc_url($image); ?>');">

            <div class="carousel-caption">
                <h3><a href="<?php the_permalink();?>"><?php echo esc_html($title); ?></a></h3>
            </div>
        </div>
        <?php $i++; } ?>
    </div>

    <a href="#main-slider" class="carousel-control-prev" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a href="#main-slider" class="carousel-control-next" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php }
endif;?>