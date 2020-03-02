<?php
//get all the theme settings & data
$bg = get_theme_mod('hero-url');
$sectionTitle = get_theme_mod('business-title');
$intro = get_theme_mod('business-intro');
$sectionSub = get_theme_mod('business-sub-title');
$btnA = get_theme_mod('button-1');
$btnUrlA = get_theme_mod('button-link-1');
$btnB = get_theme_mod('button-2');
$btnUrlB = get_theme_mod('button-link-2');
$cf = get_theme_mod('business-form');
?>

<?php if ( is_front_page() || is_home() ) : ?>
            <?php get_template_part( 'loop-templates/slider' ); ?>
        <?php endif; ?>
<div id="hero" class="w-100" style="background-image: url('<?php echo esc_url( $bg ); ?>')">

    <div class="container">
        <div class="row">
        <div class="hero-inner col-md-6">
            <div class="title">
                <?php if($sectionSub){
                    echo '<h3>'.esc_html($sectionSub) .'</h3>';
                } if($sectionTitle){
                    echo '<h1>'.esc_html($sectionTitle) .'</h1>';
                } if($intro){
                    echo wp_kses_post($intro);
                }?>

            </div>
            <div class="links">
            <?php if($btnA){
                    echo '<a class="btn btn-primary" href="'.esc_url($btnUrlA).'">'.esc_html($btnA ).'</a>';
                }
            ?>
            <?php if($btnB){
                    echo '<a class="btn btn-light" href="'.esc_url($btnUrlB).'">'.esc_html($btnB).'</a>';
                }
            ?>
            </div>
        </div>
        <div class="business-contact-form col-md-6">
            <?php if($cf) {
                echo do_shortcode($cf);
            } ?>
        </div>
    </div>
</div>
</div>