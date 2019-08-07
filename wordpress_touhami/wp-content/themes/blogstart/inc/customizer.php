<?php
/**
 * Blogstart Theme Customizer
 *
 * @package blogstart
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blogstart_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'blogstart_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'blogstart_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'blogstart_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blogstart_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blogstart_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blogstart_customize_preview_js() {
	wp_enqueue_script( 'blogstart-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blogstart_customize_preview_js' );


// Customize function.
if ( ! function_exists( 'blogstart_customize_name_panel_section' ) ) {
	add_action( 'customize_register', 'blogstart_customize_name_panel_section' );
	/**
	 * Blogstart Theme Options
	 *
	 * @param args $wp_customize array of all theme options.
	 */
	function blogstart_customize_name_panel_section( $wp_customize ) {
		$wp_customize->add_panel(
			'general_settings',
			array(
				'priority'       => 50,
				'title'          => __( 'Blogstart Settings', 'blogstart' ),
				'description'    => __( 'Customize Website Topbar Area', 'blogstart' ),
				'capability'     => 'edit_theme_options',
			)
		);

		/*
		 * Topbar Options
		 */

		$wp_customize->add_section(
			'topbar_content',
			array(
				'priority'       => 1,
				'panel'          => 'general_settings',
				'title'          => __( 'Social Link', 'blogstart' ),
				'description'    => __( 'Type link of your social profile. if you would not like to show them. then keep input empty', 'blogstart' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'facebook',
			array(
				'default'              => '#',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'facebook',
			array(
				'label'       => __( 'Facebook Link', 'blogstart' ),
				'section'     => 'topbar_content',
				'type'        => 'url',
			)
		);

		$wp_customize->add_setting(
			'twitter',
			array(
				'default'              => '#',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'twitter',
			array(
				'label'       => __( 'twitter Link', 'blogstart' ),
				'section'     => 'topbar_content',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'pinterest',
			array(
				'default'              => '#',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'pinterest',
			array(
				'label'       => __( 'pinterest Link', 'blogstart' ),
				'section'     => 'topbar_content',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'googleplus',
			array(
				'default'              => '#',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'googleplus',
			array(
				'label'       => __( 'Google plus Link', 'blogstart' ),
				'section'     => 'topbar_content',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'youtube',
			array(
				'default'              => '#',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'youtube',
			array(
				'label'       => __( 'youtube Link', 'blogstart' ),
				'section'     => 'topbar_content',
				'type'        => 'url',
			)
		);

		/*
		 * Footer Options
		 */

		$wp_customize->add_section(
			'footer_content',
			array(
				'priority'       => 2,
				'panel'          => 'general_settings',
				'title'          => __( 'Copyright', 'blogstart' ),
				'description'    => __( 'Customize Copyright Text', 'blogstart' ),
				'capability'     => 'edit_theme_options',
			)
		);

		$wp_customize->add_setting(
			'copyright_content',
			array(
				'default'              => '',
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'wp_filter_nohtml_kses',
			)
		);

		$wp_customize->add_control(
			'copyright_content',
			array(
				'label'       => __( 'Label', 'blogstart' ),
				'description' => __( 'Description', 'blogstart' ),
				'section'     => 'footer_content',
				'type'        => 'textarea',
			)
		);

		/*
		 * Featured Section
		 */

		$wp_customize->add_section(
			'featured_settings',
			array(
				'priority'       => 2,
				'panel'          => 'general_settings',
				'title'          => __( 'Featured Section', 'blogstart' ),
				'description'    => __( 'Customize your home page featured layout', 'blogstart' ),
				'capability'     => 'edit_theme_options',
			)
		);

		/**
		 *
		 * Customizer radio button senitizetion
		 *
		 * @param bool $input checking input.
		 * @param bool $setting senitizing input value.
		 */
		function blogstart_sanitize_radio( $input, $setting ) {
			$input = sanitize_key( $input );
			$choices = $setting->manager->get_control( $setting->id )->choices;
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}

		$wp_customize->add_setting(
			'featured_settings',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'blogstart_sanitize_radio',
				'default'     => 'disable',
			)
		);

		$wp_customize->add_control(
			'featured_settings',
			array(
				'label'       => __( 'Featured Layout', 'blogstart' ),
				'description' => __( 'if you would like to enable featured layout select enable and for hide select Disable', 'blogstart' ),
				'section'     => 'featured_settings',
				'type'        => 'radio',
				'choices'  => array(
					'enable'  => 'Enable',
					'disable' => 'Disable',
				),
			)
		);
		$wp_customize->add_section(
			'featured_slider',
			array(
				'priority'       => 2,
				'panel'          => 'general_settings',
				'title'          => __( 'Featured Slider', 'blogstart' ),
				'description'    => __( 'Customize your home page featured slider', 'blogstart' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'featured_slider',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'blogstart_sanitize_radio',
				'default'     => 'disable',
			)
		);

		$wp_customize->add_control(
			'featured_slider',
			array(
				'label'       => __( 'Featured Slider', 'blogstart' ),
				'description' => __( 'if you would like to enable featured layout select enable and for hide select Disable', 'blogstart' ),
				'section'     => 'featured_slider',
				'type'        => 'radio',
				'choices'  => array(
					'enable'  => 'Enable',
					'disable' => 'Disable',
				),
			)
		);

	}
}



/*
 * Theme Base Color
 */

add_action( 'customize_register', 'blogstart_customize_register_for_color' );
/**
 *
 * Blogstart Customize register color function.
 *
 * @param args $wp_customize costomize field parameter.
 */
function blogstart_customize_register_for_color( $wp_customize ) {

	$wp_customize->add_setting(
		'base_color',
		array(
			'default'   => '#5cca8d',
			'transport' => 'refresh',
			'sanitize_callback'       => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'base_color',
			array(
				'section' => 'colors',
				'label'   => __( 'Base Color', 'blogstart' ),
			)
		)
	);

}

