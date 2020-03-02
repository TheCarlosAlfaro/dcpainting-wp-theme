<?php
/**
 * Add the theme configuration
 */
if (class_exists ('kirki')){
Kirki::add_config( 'understrap', array(
    'option_type' => 'theme_mod',
    'capability'  => 'edit_theme_options',
) );
}
function understrap_kirki_sections( $wp_customize ) {
	/**
	 * Add panels
	 */
	$wp_customize->add_panel( 'global', array(
		'priority'    => 10,
		'title'       => __( 'Global Settings', 'understrap-business' ),
	) );
	$wp_customize->add_panel( 'front', array(
		'priority'    => 10,
		'title'       => __( 'Front Page Sections', 'understrap-business' ),
	) );
	/**
	 * Add sections
	 */
     $wp_customize->add_section( 'fonts', array(
 		'title'       => __( 'Fonts', 'understrap-business' ),
 		'priority'    => 10,
 		'panel'       => 'global',
 	) );

     $wp_customize->add_section( 'slider', array(
 		'title'       => __( 'Main Slider', 'understrap-business' ),
 		'priority'    => 20,
 		'panel'       => 'global',
 	) );

     $wp_customize->add_section( 'colors', array(
 		'title'       => __( 'Theme Colors', 'understrap-business' ),
 		'priority'    => 30,
 		'panel'       => 'global',
     ) );
     
    // Add front page sections
    $wp_customize->add_section( 'hero', array(
        'title'       => __( 'Hero Section', 'understrap-business' ),
        'priority'    => 10,
        'panel'       => 'front',
    ) );
    $wp_customize->add_section( 'service', array(
        'title'       => __( 'Service', 'understrap-business' ),
        'priority'    => 10,
        'panel'       => 'front',
    ) );
    $wp_customize->add_section( 'about', array(
        'title'       => __( 'About Section', 'understrap-business' ),
        'priority'    => 10,
        'panel'       => 'front',
    ) );
    $wp_customize->add_section( 'stats', array(
        'title'       => __( 'Stats', 'understrap-business' ),
        'priority'    => 10,
        'panel'       => 'front',
    ) );
    $wp_customize->add_section( 'team', array(
        'title'       => __( 'Teams', 'understrap-business' ),
        'priority'    => 10,
        'panel'       => 'front',
    ) );
    $wp_customize->add_section( 'cta', array(
        'title'       => __( 'Call To Action', 'understrap-business' ),
        'priority'    => 10,
        'panel'       => 'front',
    ) );
    $wp_customize->add_section( 'testimonial', array(
        'title'       => __( 'Testimonial', 'understrap-business' ),
        'priority'    => 10,
        'panel'       => 'front',
    ) );
    $wp_customize->add_section( 'address', array(
        'title'       => __( 'Contact', 'understrap-business' ),
        'priority'    => 10,
        'panel'       => 'front',
    ) );
}
add_action( 'customize_register', 'understrap_kirki_sections' );

function blog_customize( $wp_customize ) {
    //Load Heading Fonts
    Kirki::add_field( 'understrap', [
        'type'        => 'typography',
        'settings'    => 'font_setting',
        'label'       => esc_html__( 'Heading Fonts', 'understrap-business' ),
        'section'     => 'fonts',
        'default'     => [
            'font-family'    => 'Poppins',
            'variant'        => 'Bold'
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6',
            ],
        ],
    ] );
    //Body fonts
    Kirki::add_field( 'understrap', [
        'type'        => 'typography',
        'settings'    => 'body_font_setting',
        'label'       => esc_html__( 'Body', 'understrap-business' ),
        'section'     => 'fonts',
        'default'     => [
            'font-family'    => 'Poppins',
            'variant'        => 'Regular'
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body, p',
            ],
        ],
    ] );
    //Toggle Slider on/off
    Kirki::add_field( 'understrap', [
        'type'        => 'switch',
        'settings'    => 'slider-toggle',
        'label'       => esc_html__( 'Toggle Slider', 'understrap-business' ),
        'section'     => 'slider',
        'default'     => '2',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'understrap-business' ),
            'off' => esc_html__( 'Disable', 'understrap-business' ),
        ],
    ] );
    Kirki::add_field( 'understrap', array(
        'type'        => 'select',
        'settings'    => 'slider_cat',
        'label'       => esc_html__( 'Categories to show', 'understrap-business' ),
        'section'     => 'slider',
        'default'     => 'option-1',
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'category') ),
    ));
    Kirki::add_field( 'understrap', [
        'type'        => 'number',
        'settings'    => 'slider_number',
        'label'       => esc_html__( 'Number of Posts in Slider', 'understrap-business' ),
        'section'     => 'slider',
        'default'     => 42,
        'choices'     => [
            'min'  => 0,
            'max'  => 12,
            'step' => 1,
        ],
    ] );

    //Color
    Kirki::add_field( 'understrap', [
        'type'        => 'color-palette',
        'settings'    => 'color_palette_setting_1',
        'label'       => esc_html__( 'Color-Palette', 'understrap-business' ),
        'description' => esc_html__( 'Theme Accents Colors, links, buttons, etc', 'understrap-business' ),
        'section'     => 'colors',
        'default'     => '#53f',
        'choices'     => [
            'colors' => Kirki_Helper::get_material_design_colors( 'primary' ),
            'size'   => 25,
        ],
        'output'    => array(
            array(
                'element'  => '.btn-primary, .comments-area input[type="submit"]',
                'property' => 'background-color'
            ),
            array(
                'element'  => 'a, a:hover, h2 a:hover, .blog a:hover',
                'property' => 'color'
            ),
            array(
                'element'  => '.btn-primary, .comments-area input[type="submit"]',
                'property' => 'border-color'
            ),

        ),
    ] );

    Kirki::add_field( 'understrap', [
        'type'        => 'color',
        'settings'    => 'color_1',
        'label'       => __( 'Gradient Settings', 'understrap-business' ),
        'description' => esc_html__( 'This will affect any element with the gradient overlaying images', 'understrap-business' ),
        'section'     => 'colors',
        'default'     => '#F70068',
        'choices'     => [
            'alpha' => true,
        ],
    ] );
    Kirki::add_field( 'understrap', [
        'type'        => 'color',
        'settings'    => 'color_2',
        'label'       => __( 'Gradient Settings', 'understrap-business' ),
        'description' => esc_html__( 'This will affect any element with the gradient overlaying images', 'understrap-business' ),
        'section'     => 'colors',
        'default'     => '#441066',
        'choices'     => [
            'alpha' => true,
        ],
    ] );
    //FRONT PAGE CONTROLS & SETTINGS
    /**
     * hero image (as url)
     */
    Kirki::add_field( 'understrap', [
        'type'        => 'image',
        'settings'    => 'hero-url',
        'label'       => esc_html__( 'Background Image', 'understrap-business' ),
        'section'     => 'hero',
        'default'     => '',
    ] );  
    /**
     * Event Title
     */
    Kirki::add_field( 'understrap', [
        'type'     => 'text',
        'settings' => 'business-title',
        'label'    => esc_html__( 'Hero Title', 'understrap-business' ),
        'section'  => 'hero',
        'priority' => 10,
    ] ); 
    /**
     * Event Title
     */
    Kirki::add_field( 'understrap', [
        'type'     => 'text',
        'settings' => 'business-sub-title',
        'label'    => esc_html__( 'Business Sub Title', 'understrap-business' ),
        'section'  => 'hero',
        'priority' => 10,
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'     => 'editor',
        'settings' => 'business-intro',
        'label'    => esc_html__( 'Business Intro', 'understrap-business' ),
        'section'  => 'hero',
        'priority' => 10,
    ] ); 
    /**
     * Button 1
     */
    Kirki::add_field( 'understrap', [
        'type'     => 'text',
        'settings' => 'button-1',
        'label'    => esc_html__( 'Button Text A', 'understrap-business' ),
        'section'  => 'hero',
        'priority' => 10,
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'     => 'text',
        'settings' => 'button-link-1',
        'label'    => esc_html__( 'Button link A', 'understrap-business' ),
        'section'  => 'hero',
        'priority' => 10,
    ] ); 
    /**
     * Button 2
     */
    Kirki::add_field( 'understrap', [
        'type'     => 'text',
        'settings' => 'button-2',
        'label'    => esc_html__( 'Button Text B', 'understrap-business' ),
        'section'  => 'hero',
        'priority' => 10,
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'     => 'text',
        'settings' => 'button-link-2',
        'label'    => esc_html__( 'Button link B', 'understrap-business' ),
        'section'  => 'hero',
        'priority' => 10,
    ] ); 

    //contact form 7 
    Kirki::add_field( 'understrap', [
        'type'     => 'code',
        'settings' => 'business-form',
        'label'    => esc_html__( 'Contact Form', 'understrap-business' ),
        'description' => esc_html__( 'install and activate contact form 7, Then copy the shortcode from contact form 7 menu', 'understrap-business' ),
        'section'  => 'hero',
        'priority' => 10,
        'choices'     => [
            'language' => 'html',
        ],
    ] ); 

    /**
     * SERVICES SECTION
     */
    //section title
    Kirki::add_field( 'understrap', [
        'type'        => 'text',
        'settings'    => 'service-title',
        'label'       => esc_html__( 'Section Title', 'understrap-business' ),
        'section'     => 'service',
        'default'     => '',
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'        => 'text',
        'settings'    => 'service-title2',
        'label'       => esc_html__( 'Section Sub Title', 'understrap-business' ),
        'section'     => 'service',
        'default'     => '',
    ] ); 
    //service repeater fields


    Kirki::add_field( 'understrap', [
        'type'        => 'repeater',
        'label'       => esc_html__( 'Services', 'understrap-business' ),
        'section'     => 'service',
        'priority'    => 10,
        'button_label' => esc_html__('Add New Service ', 'understrap-business' ),
        'settings'     => 'service-items',
        'row_label' => [
            'type'  => 'field',
            'value' => esc_html__( 'Service', 'understrap-business' ),
            'field' => 'service_name',
        ],
        'fields' => [
            'service_name' => [
                'type'        => 'text',
                'label'       => esc_html__( 'Title', 'understrap-business' ),
                //'description' => esc_html__( 'This will be the link URL', 'understrap-business' ),
                //'default'     => '',
            ],
            'service_content' => [
                'type'        => 'textarea',
                'label'       => esc_html__( 'Content', 'understrap-business' ),
                //'description' => esc_html__( 'This will be the label for your link', 'understrap-business' ),
                //'default'     => '',
            ],
            'service_image' => [
                'type'        => 'image',
                'label'       => esc_html__( 'Icon/Image', 'understrap-business' ),
                'description' => esc_html__( 'upload icons (64px) or images here', 'understrap-business' ),
                //'default'     => '',
            ]
        ],
    ] );
    /**
     * ABOUT SECTION
     */
    Kirki::add_field( 'understrap', [
        'type'     => 'text',
        'settings' => 'about-title',
        'label'    => esc_html__( 'Section Title', 'understrap-business' ),
        'section'  => 'about',
        'priority' => 10,
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'     => 'text',
        'settings' => 'about-title-2',
        'label'    => esc_html__( 'Section Sub Title', 'understrap-business' ),
        'section'  => 'about',
        'priority' => 10,
    ] ); 
    //about image
    Kirki::add_field( 'understrap', [
        'type'        => 'image',
        'settings'    => 'about-image',
        'label'       => esc_html__( 'Featured Image', 'understrap-business' ),
        'section'     => 'about',
        'default'     => '',
    ] ); 
    //editor
    Kirki::add_field( 'understrap', [
        'type'        => 'editor',
        'settings'    => 'about-desc',
        'label'       => esc_html__( 'Section Text', 'understrap-business' ),
        'section'     => 'about',
        'default'     => '',
    ] ); 
    /**
     * Button 1
     */
    Kirki::add_field( 'understrap', [
        'type'     => 'text',
        'settings' => 'about-button',
        'label'    => esc_html__( 'Button Text', 'understrap-business' ),
        'section'  => 'about',
        'priority' => 10,
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'     => 'text',
        'settings' => 'about-button-url',
        'label'    => esc_html__( 'Button link', 'understrap-business' ),
        'section'  => 'about',
        'priority' => 10,
    ] ); 
     /**
     * STATS SECTION
     */
    //about image
    Kirki::add_field( 'understrap', [
        'type'        => 'image',
        'settings'    => 'stats-image',
        'label'       => esc_html__( 'Background Image', 'understrap-business' ),
        'section'     => 'stats',
        'default'     => '',
    ] ); 
    //stats repeater fields


    Kirki::add_field( 'theme_config_id', [
        'type'        => 'repeater',
        'label'       => esc_html__( 'Stats', 'understrap-business' ),
        'section'     => 'stats',
        'priority'    => 10,
        'row_label' => [
            'type'  => 'field',
            'value' => esc_html__( 'Stat', 'understrap-business' ),
            'field' => 'stats_name',
        ],
        'button_label' => esc_html__('Add New Stat ', 'understrap-business' ),
        'settings'     => 'event-stats',
        'default'      => [
            [
                'stats_number' => esc_html__( '900', 'understrap-business' ),
                'stats_name'  => esc_html__( 'Attendees Last Year', 'understrap-business' ),
            ],
            [
                'stats_number' => '27',
                'stats_name'  => esc_html__( 'International Sponsors', 'understrap-business' ),
            ],
            [
                'stats_number' => '12',
                'stats_name'  => esc_html__( 'Workshops offered', 'understrap-business' ),
            ],
            [
                'stats_number' => '36',
                'stats_name'  => esc_html__( 'Speakers Booked', 'understrap-business' ),
            ],
            [
                'stats_number' => '1000',
                'stats_name'  => esc_html__( 'Seats booked already', 'understrap-business' ),
            ],
        ],
        'fields' => [
            'stats_name' => [
                'type'        => 'text',
                'label'       => esc_html__( 'Name', 'understrap-business' ),
                //'description' => esc_html__( 'This will be the link URL', 'understrap-business' ),
                //'default'     => '',
            ],
            'stats_number' => [
                'type'        => 'text',
                'label'       => esc_html__( 'Stats Number', 'understrap-business' ),
                //'description' => esc_html__( 'This will be the label for your link', 'understrap-business' ),
                //'default'     => '',
            ],
        ]
    ] );

     /**
     * TEAM SECTION
     */
    //section title
    Kirki::add_field( 'understrap', [
        'type'        => 'text',
        'settings'    => 'title',
        'label'       => esc_html__( 'Section Title', 'understrap-business' ),
        'section'     => 'team',
        'default'     => '',
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'        => 'text',
        'settings'    => 'title2',
        'label'       => esc_html__( 'Section Sub Title', 'understrap-business' ),
        'section'     => 'team',
        'default'     => '',
    ] ); 
    //Speakers repeater fields


    Kirki::add_field( 'theme_config_id', [
        'type'        => 'repeater',
        'label'       => esc_html__( 'Teams', 'understrap-business' ),
        'section'     => 'team',
        'priority'    => 10,
        'button_label' => esc_html__('Add New member ', 'understrap-business' ),
        'settings'     => 'team-members',
        'row_label' => [
            'type'  => 'field',
            'value' => esc_html__( 'Member', 'understrap-business' ),
            'field' => 'team_name',
        ],
        'fields' => [
            'team_name' => [
                'type'        => 'text',
                'label'       => esc_html__( 'Name', 'understrap-business' ),
                //'description' => esc_html__( 'This will be the link URL', 'understrap-business' ),
                //'default'     => '',
            ],
            'team_title' => [
                'type'        => 'text',
                'label'       => esc_html__( 'Position', 'understrap-business' ),
                //'description' => esc_html__( 'This will be the label for your link', 'understrap-business' ),
                //'default'     => '',
            ],
            'team_image' => [
                'type'        => 'image',
                'label'       => esc_html__( 'Photo', 'understrap-business' ),
                //'description' => esc_html__( 'This will be the label for your link', 'understrap-business' ),
                //'default'     => '',
            ]
        ],
    ] );

     /**
     * TESTIMONIALS SECTION
     */
    //section title
    Kirki::add_field( 'theme_config_id', [
        'type'        => 'text',
        'settings'    => 'test-title',
        'label'       => esc_html__( 'Section Title', 'understrap-business' ),
        'section'     => 'testimonial',
        'default'     => '',
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'        => 'text',
        'settings'    => 'test-title2',
        'label'       => esc_html__( 'Section Sub Title', 'understrap-business' ),
        'section'     => 'testimonial',
        'default'     => '',
    ] ); 
    //Speakers repeater fields


    Kirki::add_field( 'understrap', [
        'type'        => 'repeater',
        'label'       => esc_html__( 'Testimonial', 'understrap-business' ),
        'section'     => 'testimonial',
        'priority'    => 10,
        'button_label' => esc_html__('Add New Testimonial ', 'understrap-business' ),
        'settings'     => 'testimonials',
        'row_label' => [
            'type'  => 'field',
            'value' => esc_html__( 'Schedule', 'understrap-business' ),
            'field' => 'test_name',
        ],
        'fields' => [
            'testimonial_content' => [
                'type'        => 'textarea',
                'label'       => esc_html__( 'content', 'understrap-business' ),
                //'description' => esc_html__( 'This will be the label for your link', 'understrap-business' ),
                //'default'     => '',
            ],
            'test_name' => [
                'type'        => 'text',
                'label'       => esc_html__( 'Name', 'understrap-business' ),
                //'description' => esc_html__( 'This will be the label for your link', 'understrap-business' ),
                //'default'     => '',
            ],
            'test_title' => [
                'type'        => 'text',
                'label'       => esc_html__( 'Title', 'understrap-business' ),
                //'description' => esc_html__( 'This will be the label for your link', 'understrap-business' ),
                //'default'     => '',
            ],
            'test_img' => [
                'type'        => 'image',
                'label'       => esc_html__( 'Photo', 'understrap-business' ),
                //'description' => esc_html__( 'This will be the label for your link', 'understrap-business' ),
                //'default'     => '',
            ],


        ],
    ] );


     /**
     * ADDRESS SECTION
     */
    //section title
    Kirki::add_field( 'understrap', [
        'type'        => 'text',
        'settings'    => 'address-title',
        'label'       => esc_html__( 'Section Title', 'understrap-business' ),
        'section'     => 'address',
        'default'     => '',
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'        => 'text',
        'settings'    => 'address-title2',
        'label'       => esc_html__( 'Section Sub Title', 'understrap-business' ),
        'section'     => 'address',
        'default'     => '',
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'        => 'text',
        'settings'    => 'telephone',
        'label'       => esc_html__( 'Telephone', 'understrap-business' ),
        'section'     => 'address',
        'default'     => '',
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'        => 'text',
        'settings'    => 'email',
        'label'       => esc_html__( 'Email', 'understrap-business' ),
        'section'     => 'address',
        'default'     => '',
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'        => 'editor',
        'settings'    => 'address',
        'label'       => esc_html__( 'Venue Address', 'understrap-business' ),
        'section'     => 'address',
        'default'     => '',
    ] ); 
    Kirki::add_field( 'understrap', [
        'type'        => 'code',
        'settings'    => 'address-maps',
        'label'       => esc_html__( 'Google Maps Embed Code', 'understrap-business' ),
        'description' => esc_html__( 'Copy the google maps embed code here, set the width to 600px and 450px height', 'understrap-business' ),
        'section'     => 'address',
        'default'     => '',
        'choices'     => [
            'language' => 'html',
        ],
    ] ); 
}
add_filter( 'kirki/fields', 'blog_customize' );