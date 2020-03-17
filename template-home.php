<?php
/**
 * Template name: DCPAINTING Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();


?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">


			<main class="site-main" id="main">
                <?php
                get_template_part( 'loop-templates/slider' );
				// get_template_part( 'homepage-sections/about');
                // get_template_part( 'homepage-sections/service');
                // get_template_part( 'homepage-sections/hero');
                // get_template_part( 'homepage-sections/stats');
				// get_template_part( 'homepage-sections/teams');
				// get_template_part( 'homepage-sections/testimonial');
				// get_template_part( 'homepage-sections/contact');
                 ?>
                <?php while ( have_posts() ) : the_post();

                    //the_content();
                endwhile; // end of the loop. ?>

			</main><!-- #main -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer();
