<?php
//get all the theme settings & data
$sectiontitle = get_theme_mod('about-title');
$subTitle = get_theme_mod('about-title-2');
$image = get_theme_mod('about-image');
$content = get_theme_mod('about-desc');
$btn = get_theme_mod('about-button');
$btnUrl = get_theme_mod('about-button-url');

if($sectiontitle): ?>

<div id="about" class="">
    <div class="container-fluid">
        <div class="row">
            <?php if($image){?>
            <div class="col w-100 imgr" style="background-image:url(<?php echo esc_url($image); ?>);"></div>
            <?php } ?>
            <div class="col content">
                <?php 
                if($subTitle){
                    echo '<h3>'.esc_html($subTitle).'</h3>';
                }
                if($sectiontitle){
                    echo '<h2 class="section-title">'.esc_html($sectiontitle).'</h2>';
                }
                if($content){
                    echo wp_kses_post($content);
                }
                if($btn){
                    echo '<a href="'.esc_url($btnUrl).'">'.esc_html($btn).'</a>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>