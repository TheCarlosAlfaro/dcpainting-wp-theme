<?php
//get all the theme settings & data
$image = get_theme_mod('stats-image');
$subTitle = get_theme_mod('stats-sub-title');
$stats = get_theme_mod('event-stats');


if($stats): ?>
<div id="stats" class=""  style="background-image:url(<?php echo esc_url($image) ?>);">
    <div class="container">
        <div class="row">
            <?php 
            //var_dump($stats);
            foreach((array)$stats as $stat ):
                echo '<div class="col">';
                    echo '<h5>'.esc_html($stat['stats_number']).'</h5>';
                    echo '<span>'.esc_html($stat['stats_name']).'</span>';
                echo '</div>';
            endforeach;?>
         
            </div>
        </div>
    </div>
<?php endif; ?>