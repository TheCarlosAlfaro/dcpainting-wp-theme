<?php
//get all the theme settings & data
$sectiontitle = get_theme_mod('address-title');
$subTitle = get_theme_mod('address-title2');
$tel = get_theme_mod('telephone');
$email = get_theme_mod('email');
$address = get_theme_mod('address');
$maps = get_theme_mod('address-maps');


if($sectiontitle): ?>
<div id="contact" class="">
    <div class="container">
        <div class="row">
        <div class="col-md-4" >
            <?php 
                    if($subTitle){
                        echo '<h3>'.esc_html($subTitle).'</h3>';
                    }
                    if($sectiontitle){
                        echo '<h2 class="section-title">'.esc_html($sectiontitle).'</h2>';
                    }
                    if($tel){
                        echo '<p><b>'.esc_html('Tel: ','understrap-business') .'</b>' .esc_html($tel).'</p>';
                    }
                    if($email){
                        echo '<p><b>'.esc_html("E-Mail: ","understrap-event") .'</b>' .esc_html($email).'</p>';
                    }
                    if($address){
                        echo '<h4>'.esc_html('Address:','understrap-business').'</h4>';
                        echo wp_kses_post($address);
                    }
            ?>
        </div>
        <div class="col-md-8 maps" >
            <?php if($maps){ echo $maps; } ?>
        </div>


            </div>
        </div>
    </div>
</div>
<?php endif; ?>