<?php
//get all the theme settings & data
$sectiontitle = get_theme_mod('test-title');
$subTitle = get_theme_mod('test-title2');
$testimonials = get_theme_mod('testimonials');


if($sectiontitle): ?>

<div id="testimonial" class="">
    <div class="container">
        <div class="row">
        
        <?php 
                if($subTitle){
                    echo '<h3>'.esc_html($subTitle).'</h3>';
                }
                if($sectiontitle){
                    echo '<h2 class="section-title">'.esc_html($sectiontitle).'</h2>';
                }
          ?>
          </div>
          <div class="row">
          <?php
//var_dump($testimonials);
            foreach((array)$testimonials as $t ):
    
                echo '<div class="col-md-6 testimonial">';
                    echo '<p>' .esc_html($t["testimonial_content"]) .'</p>';
                    echo '<div class="test-meta"><span>' .esc_html($t["test_name"]) .'</span>';
                    //echo $t['test_title'];
                    echo '<img class="photo" src="'.esc_url(wp_get_attachment_image_src( $t['test_img'], 'medium' )[0]).'">';
                echo '</div></div>';
            endforeach;?>
         
            </div>
        </div>
    </div>
<?php endif; ?>