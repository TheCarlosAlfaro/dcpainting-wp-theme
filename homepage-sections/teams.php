<?php
//get all the theme settings & data
$sectiontitle = get_theme_mod('title');
$subTitle = get_theme_mod('title2');
$teams = get_theme_mod('team-members');


if($sectiontitle): ?>
<div id="teams" class="">
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

            foreach((array)$teams as $team ):
                echo '<div class="col-md-3 team">';
                    echo '<div class="w-100 team-avatar"><img class="w-100" src="'.esc_url(wp_get_attachment_image_src( $team['team_image'], 'large' )[0]).'"></div>';
                    echo '<div class="team-info"><h3>'.esc_html($team['team_name']).'</h3>';
                    echo '<h5>'.esc_html($team['team_title']).'</h5></div>';
                echo '</div>';
            endforeach;?>
         
            </div>
        </div>
    </div>
<?php endif;?>