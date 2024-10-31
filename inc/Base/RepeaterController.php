<?php 


/**
 * Repeater field for Frontpage Slider section
 *
 * @since 1.0.0
 */
/**
 * Add Frontpage Settings Panel
 *
 * @since 1.0.0
 */
$radix_theme = wp_get_theme();
if(($radix_theme->get( 'TextDomain' ) == 'radix-multipurpose') || ($radix_theme->get( 'TextDomain' ) == 'radix-multipurpose-plus') ):

// Frontpage repeater
add_action( 'customize_register', 'radix_lite_frontpage_repeater_register' );

function radix_lite_frontpage_repeater_register( $wp_customize ) {
    $radix_theme = wp_get_theme();
    $wp_customize->add_panel(
        'radix_lite_frontpage_settings_panel',
        array(
            'priority'       => 15,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Frontpage Settings', 'radix-helper' ),
        )
    );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Front page slider section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'radix_lite_frontpage_slider_section',
    array(
        'priority'       => 1,
        'panel'          => 'radix_lite_frontpage_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Slider Section', 'radix-helper' ),
        'description'    => __( 'Managed the slider display at Frontpage section.', 'radix-helper' ),
    )
);

$wp_customize->add_setting( 
    'radix_lite_slider_items', 
    array(
        'capability'        => 'edit_theme_options',            
        'default'           => json_encode(array(
            array(
                'mt_dropdown_pages' => 'Select Page',
                'mt_item_text' => 'Our Portfolio',
                'mt_item_url' => '',
                'mt_item_text_1' =>'Play Now',
                'mt_item_url_1' => '',
                'mt_item_upload' => '',
                'mt_item_upload_1' => '',
            )
        )
    ),
        'sanitize_callback' => 'radix_lite_sanitize_repeater'
    )
);
$wp_customize->add_control( new Radix_Lite_Repeater_Controller(
    $wp_customize, 
    'radix_lite_slider_items', 
    array(
        'label'           => __( 'Slider Items', 'radix-helper' ),
        'section'         => 'radix_lite_frontpage_slider_section',
        'settings'        => 'radix_lite_slider_items',
        'priority'        => 60,
        'radix_lite_box_label'       => __( 'Slider Item','radix-helper' ),
        'radix_lite_box_add_control' => __( 'Add Slider','radix-helper' )
    ),
    array(
        'mt_dropdown_pages' => array(
           'type'        => 'dropdown-pages',
           'label'       => __('Select page for slider title and description with feature images','radix-lite'), 
       ),
        'mt_item_text' => array(
            'type'        => 'text',
            'label'       => __( 'Button Text', 'radix-helper' ),
            'description' => __( 'Type Button Text', 'radix-helper' )
        ),
        'mt_item_url' => array(
            'type'        => 'url',
            'label'       => __( 'Button url', 'radix-helper' ),
            'description' => __( 'Type Button Url', 'radix-helper' )
        ),
        'mt_item_text_1' => array(
            'type'        => 'text',
            'label'       => __( 'Vedio Text', 'radix-helper' ),
            'description' => __( 'Type Vedio Text', 'radix-helper' )
        ),
        'mt_item_url_1' => array(
            'type'        => 'url',
            'label'       => __( 'Vedio url', 'radix-helper' ),
            'description' => __( 'Use Link from youtube', 'radix-helper' ),
        ),
        'mt_item_upload' =>array(
            'type'        => 'upload',
            'label'       => __( 'Slider thumb 1', 'radix-helper' ),
            'description' => __( 'upload slider thumb 1', 'radix-helper' )
        ),
        'mt_item_upload_1' =>array(
            'type'        => 'upload',
            'label'       => __( 'Slider thumb 2', 'radix-helper' ),
            'description' => __( 'upload slider thumb 2', 'radix-helper' )
        ),
    )
) 
);


/**
 * Repeater field for Skill Section
 *
 * @since 1.0.0
 */
$wp_customize->add_setting( 
    'radix_lite_skill_items', 
    array(
        'capability'        => 'edit_theme_options',            
        'default'           => json_encode(array(
            array(
                'mt_item_text' => '',
                'mt_item_number'=> '0'
            )
        )
    ),
        'sanitize_callback' => 'radix_lite_sanitize_repeater'
    )
);
$wp_customize->add_control( new Radix_Lite_Repeater_Controller(
    $wp_customize, 
    'radix_lite_skill_items', 
    array(
        'label'           => __( 'Skill Item', 'radix-helper' ),
        'section'         => 'radix_lite_frontpage_skill_section',
        'settings'        => 'radix_lite_skill_items',
        'priority'        => 60,
        'radix_lite_box_label'       => __( 'Skill Item','radix-helper' ),
        'radix_lite_box_add_control' => __( 'Add Skill','radix-helper' )
    ),
    array(
        'mt_item_text' => array(
            'type'        => 'text',
            'label'       => __( 'Skill title', 'radix-helper' ),
            'description' => __( 'Enter Skill Title(Eg:- Design, Developer)', 'radix-helper' )
        ),
        'mt_item_number' => array(
            'type'        => 'number',
            'label'       => __( 'Skill Percentage(only integer number)', 'radix-helper' ),
            'description' => __( 'Enter Skill Percentage', 'radix-helper' )
        )
    )
) 
);

/**
 * Repeater field for Achievement Counter Section
 *
 * @since 1.0.0
 */
$wp_customize->add_setting( 
    'radix_lite_achievement_counter_items', 
    array(
        'capability'        => 'edit_theme_options',            
        'default'           => json_encode(array(
            array(
                'mt_item_icon' => 'fa fa-clock-o',
                'mt_item_number'=> '35',
                'mt_item_text' => 'Years of Success',
            )
        )
    ),
        'sanitize_callback' => 'radix_lite_sanitize_repeater'
    )
);
$wp_customize->add_control( new Radix_Lite_Repeater_Controller(
    $wp_customize, 
    'radix_lite_achievement_counter_items', 
    array(
        'label'           => __( 'Achievement Counter Items', 'radix-helper' ),
        'section'         => 'radix_lite_frontpage_achievements_section',
        'settings'        => 'radix_lite_achievement_counter_items',
        'priority'        => 60,
        'radix_lite_box_label'       => __( 'Achievement Counter Item','radix-helper' ),
        'radix_lite_box_add_control' => __( 'Add Achievement Counter','radix-helper' )
    ),
    array(
        'mt_item_icon' => array(
            'type'        => 'icon',
            'label'       => __( 'Counter Icon', 'radix-helper' ),
            'description' => __( 'Enter Counter Icon', 'radix-helper' )
        ),
        'mt_item_number' => array(
            'type'        => 'number',
            'label'       => __( 'Counter Number', 'radix-helper' ),
            'description' => __( 'only integer number', 'radix-helper' )
        ),
        'mt_item_text' => array(
            'type'        => 'text',
            'label'       => __( 'Counter Title', 'radix-helper' ),
            'description' => __( 'Eg:- Years of Success, Project Complete, Total Earning, Wining Awards', 'radix-helper' )
        ),
    )
) 
);

if($radix_theme->get( 'TextDomain' ) == 'radix-multipurpose'){
/**
 * Repeater field for Frontpage What we provide section
 *
 * @since 1.0.0
 */
$wp_customize->add_setting( 
    'radix_lite_what_we_provide_items', 
    array(
        'capability'        => 'edit_theme_options',            
        'default'           => json_encode(array(
            array(
                'mt_dropdown_pages' => '',
                'mt_item_icon' => '',
            )
        )
    ),
        'sanitize_callback' => 'radix_lite_sanitize_repeater'
    )
);
$wp_customize->add_control( new Radix_Lite_Repeater_Controller(
    $wp_customize, 
    'radix_lite_what_we_provide_items', 
    array(
        'label'           => __( 'What we provide Items', 'radix-helper' ),
        'section'         => 'radix_lite_frontpage_what_we_provide_section',
        'settings'        => 'radix_lite_what_we_provide_items',
        'priority'        => 60,
        'radix_lite_box_label'       => __( 'What we provide Item','radix-helper' ),
        'radix_lite_box_add_control' => __( 'Add What we provide','radix-helper' )
    ),
    array(
        'mt_dropdown_pages' => array(
         'type'        => 'dropdown-pages',
         'label'       => __('Select page for what we provide  title and description','radix-lite'), 
     ),
        'mt_item_icon' => array(
            'type'        => 'icon',
            'label'       => __( 'Select icon for what we provide', 'radix-helper' )
        )
    )
) 
);
}

/**
 * Repeater field for Frontpage Why Choose us section
 *
 * @since 1.0.0
 */
$wp_customize->add_setting( 
    'radix_lite_why_choose_us_items', 
    array(
        'capability'        => 'edit_theme_options',            
        'default'           => json_encode(array(
            array(
                'mt_item_number' => '',
                'mt_item_text' => '',
                'mt_item_text_1' => ''
            )
        )
    ),
        'sanitize_callback' => 'radix_lite_sanitize_repeater'
    )
);
$wp_customize->add_control( new Radix_Lite_Repeater_Controller(
    $wp_customize, 
    'radix_lite_why_choose_us_items', 
    array(
        'label'           => __( 'Why choose us Items', 'radix-helper' ),
        'section'         => 'radix_lite_frontpage_why_choose_us_section',
        'settings'        => 'radix_lite_why_choose_us_items',
        'priority'        => 60,
        'radix_lite_box_label'       => __( 'Why Choose us Item','radix-helper' ),
        'radix_lite_box_add_control' => __( 'Add Why Choose us','radix-helper' )
    ),
    array(
        'mt_item_number' => array(
         'type'        => 'number',
         'label'       => __('Type number','radix-lite'), 
     ),
        'mt_item_text' => array(
            'type'        => 'text',
            'label'       => __( 'Type why choose us title', 'radix-helper' )
        ),
        'mt_item_text_1' => array(
            'type'        => 'text',
            'label'       => __( 'Type why choose us Sub-title', 'radix-helper' )
        )
    )
) 
);

/**
 * Repeater field for Frontpage Consulting section
 *
 * @since 1.0.0
 */
$wp_customize->add_setting( 
    'radix_lite_consulting_items', 
    array(
        'capability'        => 'edit_theme_options',            
        'default'           => json_encode(array(
            array(
                'mt_item_icon' => 'fa fa-star',
                'mt_item_text' => ''
            )
        )
    ),
        'sanitize_callback' => 'radix_lite_sanitize_repeater'
    )
);

$wp_customize->add_control( new Radix_Lite_Repeater_Controller(
    $wp_customize, 
    'radix_lite_consulting_items', 
    array(
        'label'           => __( 'Consulting Items', 'radix-helper' ),
        'section'         => 'radix_lite_frontpage_consulting_section',
        'settings'        => 'radix_lite_consulting_items',
        'priority'        => 60,
        'radix_lite_box_label'       => __( 'Consulting Item','radix-helper' ),
        'radix_lite_box_add_control' => __( 'Add Consulting','radix-helper' )
    ),
    array(
        'mt_item_icon' => array(
         'type'        => 'icon',
         'label'       => __('Select Icon','radix-lite'), 
     ),
        'mt_item_text' => array(
            'type'        => 'text',
            'label'       => __( 'Consulting info', 'radix-helper' )
        ),
    )
) 
);

if($radix_theme->get( 'TextDomain' ) == 'radix-multipurpose'){
/**
 * Repeater field for Frontpage Testimonials section
 *
 * @since 1.0.0
 */
$wp_customize->add_setting( 
    'radix_lite_testimonials_items', 
    array(
        'capability'        => 'edit_theme_options',            
        'default'           => json_encode(array(
            array(
                'mt_dropdown_pages' => 'Select Page',
                'mt_item_number' => 0,
                'mt_item_text' => ''
            )
        )
    ),
        'sanitize_callback' => 'radix_lite_sanitize_repeater'
    )
);
$wp_customize->add_control( new Radix_Lite_Repeater_Controller(
    $wp_customize, 
    'radix_lite_testimonials_items', 
    array(
        'label'           => __( 'Testimonials Items', 'radix-helper' ),
        'section'         => 'radix_lite_frontpage_testimonials_section',
        'settings'        => 'radix_lite_testimonials_items',
        'priority'        => 60,
        'radix_lite_box_label'       => __( 'Testimonials Item','radix-helper' ),
        'radix_lite_box_add_control' => __( 'Add testimonial','radix-helper' )
    ),
    array(
        'mt_dropdown_pages' => array(
         'type'        => 'dropdown-pages',
         'label'       => __('Select page for Testimonials title and description with feature images','radix-lite'), 
     ),
        'mt_item_number' => array(
            'type'        => 'number',
            'label'       => __( 'Rating number', 'radix-helper' ),
            'description' => __( 'only integer(less or equal 5)', 'radix-helper' )
        ),
        'mt_item_text' => array(
            'type'        => 'text',
            'label'       => __( 'Designation', 'radix-helper' ),
            'description' => __( 'Eg:- Freelancher, Manager, CEO, Co-Founder', 'radix-helper' )
        )
    )
) 
);
}
if($radix_theme->get( 'TextDomain' ) == 'radix-multipurpose'){
/**
* Repeater field for Frontpage Team section
*
* @since 1.0.0
*/
$wp_customize->add_setting( 
    'radix_lite_team_items', 
    array(
        'capability'        => 'edit_theme_options',            
        'default'           => json_encode(array(
            array(
                'mt_dropdown_pages' => 'Select Page',
                'mt_item_text' => '',
                'mt_item_social_icon'=>'fa fa-facebook',
                'mt_item_social_icon_1'=>'fa fa-twitter',
                'mt_item_social_icon_2'=>'fa fa-linkedin',
                'mt_item_social_icon_3'=>'fa fa-behance',
                'mt_item_url' => '',
                'mt_item_url_1' => '',
                'mt_item_url_2' => '',
                'mt_item_url_3' => ''
            )
        )
    ),
        'sanitize_callback' => 'radix_lite_sanitize_repeater'
    )
);
$wp_customize->add_control( new Radix_Lite_Repeater_Controller(
    $wp_customize, 
    'radix_lite_team_items', 
    array(
        'label'           => __( 'Team Items', 'radix-helper' ),
        'section'         => 'radix_lite_frontpage_team_section',
        'settings'        => 'radix_lite_team_items',
        'priority'        => 60,
        'radix_lite_box_label'       => __( 'Team Item','radix-helper' ),
        'radix_lite_box_add_control' => __( 'Add Team','radix-helper' )
    ),
    array(
        'mt_dropdown_pages' => array(
         'type'        => 'dropdown-pages',
         'label'       => __('Select page for Team name and description with feature images','radix-lite'), 
     ),
        'mt_item_text' => array(
            'type'        => 'text',
            'label'       => __( 'Designation', 'radix-helper' ),
            'description' => __( 'Eg:-Founder, Co-Founder, Developer', 'radix-helper' )
        ),
        'mt_item_social_icon' => array(
            'type'        => 'social_icon',
            'label'       => __( 'Social Icon 1', 'radix-helper' ),
        ),
        'mt_item_url' =>  array(
            'type'        => 'url',
            'label'       => __( 'Social Icon Url 1', 'radix-helper' ),
        ),
        'mt_item_social_icon_1' => array(
            'type'        => 'social_icon',
            'label'       => __( 'Social Icon 2', 'radix-helper' ),
        ),
        'mt_item_url_1' =>  array(
            'type'        => 'url',
            'label'       => __( 'Social Icon Url 2', 'radix-helper' ),
        ),
        'mt_item_social_icon_2' => array(
            'type'        => 'social_icon',
            'label'       => __( 'Social Icon 3', 'radix-helper' ),
        ),
        'mt_item_url_2' =>  array(
            'type'        => 'url',
            'label'       => __( 'Social Icon Url 3', 'radix-helper' ),
        ),
        'mt_item_social_icon_3' => array(
            'type'        => 'social_icon',
            'label'       => __( 'Social Icon 4', 'radix-helper' ),
        ),
        'mt_item_url_3' =>  array(
            'type'        => 'url',
            'label'       => __( 'Social Icon Url 4', 'radix-helper' ),
        )
    )
) 
);
}


/**
 * Repeater field for Contact Address option
 *
 * @since 1.0.0
 */
$wp_customize->add_setting( 
    'radix_lite_contact_address_items', 
    array(
        'capability'        => 'edit_theme_options',            
        'default'           => json_encode(array(
            array(
                'mt_item_icon' => 'fa fa-paper-plane',
                'mt_item_text' => 'Address',
            )
        )
    ),
        'sanitize_callback' => 'radix_lite_sanitize_repeater'
    )
);
$wp_customize->add_control( new Radix_Lite_Repeater_Controller(
    $wp_customize, 
    'radix_lite_contact_address_items', 
    array(
        'label'           => __( 'Contact Address Items', 'radix-helper' ),
        'section'         => 'radix_lite_frontpage_contact_section',
        'settings'        => 'radix_lite_contact_address_items',
        'priority'        => 60,
        'radix_lite_box_label'       => __( 'Contact Address Item','radix-helper' ),
        'radix_lite_box_add_control' => __( 'Add Contact Address','radix-helper' )
    ),
    array(
        'mt_item_icon' => array(
            'type'        => 'icon',
            'label'       => __( 'Contact Address Icon', 'radix-helper' ),
            'description' => __( 'Enter Counter Icon', 'radix-helper' )
        ),
        'mt_item_text' => array(
            'type'        => 'text',
            'label'       => __( 'Contact Adress Info', 'radix-helper' )
        ),
    )
) 
);


/**
 * Repeater field for Contact Address Social Icons
 *
 * @since 1.0.0
 */
$wp_customize->add_setting( 
    'radix_lite_contact_address_social_items', 
    array(
        'capability'        => 'edit_theme_options',            
        'default'           => json_encode(array(
            array(
                'mt_item_social_icon' => 'fa fa-facebook',
                'mt_item_text' => '',
                'mt_item_url'=>''
            )
        )
    ),
        'sanitize_callback' => 'radix_lite_sanitize_repeater'
    )
);
$wp_customize->add_control( new Radix_Lite_Repeater_Controller(
    $wp_customize, 
    'radix_lite_contact_address_social_items', 
    array(
        'label'           => __( 'Contact Address Social Items', 'radix-helper' ),
        'section'         => 'radix_lite_frontpage_contact_section',
        'settings'        => 'radix_lite_contact_address_social_items',
        'priority'        => 60,
        'radix_lite_box_label'       => __( 'Contact Address Social Item','radix-helper' ),
        'radix_lite_box_add_control' => __( 'Add Social Item','radix-helper' )
    ),
    array(
        'mt_item_social_icon' => array(
            'type'        => 'social_icon',
            'label'       => __( 'Contact Address Social Icon', 'radix-helper' ),
            'description' => __( 'Enter Counter Icon', 'radix-helper' )
        ),
        'mt_item_text' => array(
            'type'        => 'text',
            'label'       => __( 'Contact Adress Social Text', 'radix-helper' )
        ),
        'mt_item_url' => array(
            'type'        => 'url',
            'label'       => __( 'Contact Adress Social Url', 'radix-helper' )
        )
    )
) 
);
}
add_action( 'customize_register', 'radix_lite_header_repeater_register' );
/**
 * Add Header Settings Panel
 *
 * @since 1.0.0
 */
function radix_lite_header_repeater_register( $wp_customize ) {
    $wp_customize->add_panel(
        'radix_lite_header_settings_panel',
        array(
            'priority'       => 60,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Header Settings', 'radix-helper' ),
        )
    );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Top Header section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'radix_lite_top_header_section',
        array(
            'priority'       => 5,
            'panel'          => 'radix_lite_header_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Top Header Section', 'radix-helper' ),
            'description'    => __( 'Managed the content display at top header section.', 'radix-helper' ),
        )
    );

/**
 * Repeater field for top header items
 *
 * @since 1.0.0
 */
$wp_customize->add_setting( 
    'radix_lite_top_header_items', 
    array(
        'capability'        => 'edit_theme_options',            
        'default'           => json_encode(array(
            array(
                'mt_item_icon' => 'fa fa-phone',
                'mt_item_text' => '',
            )
        )
    ),
        'sanitize_callback' => 'radix_lite_sanitize_repeater'
    )
);
$wp_customize->add_control( new Radix_Lite_Repeater_Controller(
    $wp_customize, 
    'radix_lite_top_header_items', 
    array(
        'label'           => __( 'Top Header Items', 'radix-helper' ),
        'section'         => 'radix_lite_top_header_section',
        'settings'        => 'radix_lite_top_header_items',
        'priority'        => 10,
        'radix_lite_box_label'       => __( 'Single Item','radix-helper' ),
        'radix_lite_box_add_control' => __( 'Add Item','radix-helper' )
    ),
    array(
        'mt_item_icon' => array(
            'type'        => 'icon',
            'label'       => __( 'Item Icon', 'radix-helper' ),
            'description' => __( 'Choose icon for single item from available lists.', 'radix-helper' )
        ),
        'mt_item_text' => array(
            'type'        => 'text',
            'label'       => __( 'Item Info', 'radix-helper' ),
            'description' => __( 'Enter short info for single item.', 'radix-helper' )
        )
    )
) 
);
}
add_action( 'customize_register', 'radix_lite_social_repeater_register' );
/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
     * Social Icons Section
     *
     * @since 1.0.0
     */
    function radix_lite_social_repeater_register( $wp_customize ) {
        $wp_customize->add_section(
            'radix_lite_social_icons_section',
            array(
                'title'     => esc_html__( 'Social Icons', 'radix-helper' ),
                'priority'  => 5,
            )
        );


     /**
     * Repeater field for social media icons
     *
     * @since 1.0.0
     */
     $wp_customize->add_setting( 
        'social_media_icons', 
        array(
            'sanitize_callback' => 'radix_lite_sanitize_repeater',
            'default' => json_encode(array(
                array(
                    'mt_item_social_icon' => 'fa fa-facebook-f',
                    'mt_item_url'         => '',
                )
            ))
        )
    );
     $wp_customize->add_control( new Radix_Lite_Repeater_Controller(
        $wp_customize, 
        'social_media_icons', 
        array(
            'label'             => __( 'Social Media Icons', 'radix-helper' ),
            'section'           => 'radix_lite_social_icons_section',
            'settings'          => 'social_media_icons',
            'priority'          => 60,
            'radix_lite_box_label'       => __( 'Social Media Icon','radix-helper' ),
            'radix_lite_box_add_control' => __( 'Add Icon','radix-helper' )
        ),
        array(
            'mt_item_social_icon' => array(
                'type'        => 'social_icon',
                'label'       => __( 'Social Media Logo', 'radix-helper' ),
                'description' => __( 'Choose social media icon.', 'radix-helper' )
            ),
            'mt_item_url' => array(
                'type'        => 'url',
                'label'       => __( 'Social Icon Url', 'radix-helper' ),
                'description' => __( 'Enter social media url.', 'radix-helper' )
            )
        )
    ) 
 );  
 }


 add_action( 'customize_register', 'radix_lite_faq_repeater_register' );
/**
 * Add Faq Settings Panel
 *
 * @since 1.0.0
 */
function radix_lite_faq_repeater_register( $wp_customize ) {
 $radix_theme = wp_get_theme();
 if($radix_theme->get( 'TextDomain' ) == 'radix-multipurpose-plus'){
     /**
     * Repeater field for FAQ Left items
     *
     * @since 1.0.0
     */

     $wp_customize->add_setting( 
        'radix_lite_faq_left_items', 
        array(
            'capability'        => 'edit_theme_options',            
            'default'           => json_encode(array(
                array(
                    'mt_item_textarea' => '',
                    'mt_item_text' => '',
                )
            )
        ),
            'sanitize_callback' => 'radix_lite_sanitize_repeater'
        )
    );
     $wp_customize->add_control( new Radix_Lite_Repeater_Controller(
        $wp_customize, 
        'radix_lite_faq_left_items', 
        array(
            'label'           => __( 'Faq Left Item', 'radix-helper' ),
            'section'         => 'radix_multipurpose_faq_settings_section',
            'settings'        => 'radix_lite_faq_left_items',
            'priority'        => 60,
            'radix_lite_box_label'       => __( 'Left Item','radix-helper' ),
            'radix_lite_box_add_control' => __( 'Add Left Item','radix-helper' )
        ),
        array(
            'mt_item_text' => array(
                'type'        => 'text',
                'label'       => __( 'FAQ Question?', 'radix-helper' ),
                'description' => __( 'Type Question For left section', 'radix-helper' )
            ),
            'mt_item_textarea' => array(
                'type'        => 'textarea',
                'label'       => __( 'Faq Answer', 'radix-helper' ),
                'description' => __( 'Type Answer of Question.', 'radix-helper' )
            ),
        )
    ) 
 );


    // Right Item
     $wp_customize->add_setting( 
        'radix_lite_faq_right_items', 
        array(
            'capability'        => 'edit_theme_options',            
            'default'           => json_encode(array(
                array(
                    'mt_item_textarea' => '',
                    'mt_item_text' => '',
                )
            )
        ),
            'sanitize_callback' => 'radix_lite_sanitize_repeater'
        )
    );
     $wp_customize->add_control( new Radix_Lite_Repeater_Controller(
        $wp_customize, 
        'radix_lite_faq_right_items', 
        array(
            'label'           => __( 'Faq Right Item', 'radix-helper' ),
            'section'         => 'radix_multipurpose_faq_settings_section',
            'settings'        => 'radix_lite_faq_right_items',
            'priority'        => 70,
            'radix_lite_box_label'       => __( 'Right Item','radix-helper' ),
            'radix_lite_box_add_control' => __( 'Add Right Item','radix-helper' )
        ),
        array(
            'mt_item_text' => array(
                'type'        => 'text',
                'label'       => __( 'FAQ Question?', 'radix-helper' ),
                'description' => __( 'Type Question For Right section', 'radix-helper' )
            ),
            'mt_item_textarea' => array(
                'type'        => 'textarea',
                'label'       => __( 'Faq Answer', 'radix-helper' ),
                'description' => __( 'Type Answer of Question.', 'radix-helper' )
            ),
        )
    ) 
 );
 }  
}
endif;