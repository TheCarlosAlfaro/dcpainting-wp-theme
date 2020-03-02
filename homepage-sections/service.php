<?php
//get all the theme settings & data
$sectiontitle = get_theme_mod('service-title');
$subTitle = get_theme_mod('service-title2');
$services = get_theme_mod('service-items');


if($sectiontitle): ?>
<div id="service" class="">
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

            foreach((array)$services as $service ):
                echo '<div class="col-md-4 service">';
                    echo '<div class="service-icon"><img class="" src="'.esc_url(wp_get_attachment_image_src( $service['service_image'], 'large' )[0]).'"></div>';
                    echo '<h3 class="service-title">'.esc_html($service['service_name']).'</h3>';
                    echo '<p>'. esc_html($service['service_content']) .'<p>';
                echo '</div>';
            endforeach;?>
         
            </div>
        </div>
    </div>
<?php endif;?>