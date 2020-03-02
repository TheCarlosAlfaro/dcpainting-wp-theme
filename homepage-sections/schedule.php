<?php
//get all the theme settings & data
$sTitle = get_theme_mod('schedule-title');
$subTitle = get_theme_mod('schedule-title2');
$schdeules = get_theme_mod('schedule');


if($sTitle): ?>
<div id="schedule" class="">
    <div class="container">
        <div class="row">
        
        <?php 
                if($subTitle){
                    echo '<h3>'.esc_html($subTitle).'</h3>';
                }
                if($sTitle){
                    echo '<h2 class="section-title">'.esc_html($sTitle).'</h2>';
                }
          ?>
          </div>
          <div class="row schedule-row">
          <?php

            foreach((array)$schdeules as $schedule ):
                echo '<div class="col-md-6 schedule"><div class="schedule-info">';
                    echo '<h3>'.esc_html($schedule['schedule_date']).'</h3>';
                    echo '<h5>'.esc_html($schedule['schedule_title']).'</h5>';
                    echo '<p>'.esc_html($schedule['schedule_content']).'</p>';
                echo '</div></div>';
            endforeach;?>
         
            </div>
        </div>
    </div>
<?php endif; ?>