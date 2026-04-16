<?php
/**
 * AD Cont Blue — functions.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ------------------------------------------------------------------ */
/* Theme setup                                                          */
/* ------------------------------------------------------------------ */
function adcont_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ] );
    add_theme_support( 'html5', [
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
    ] );
    add_theme_support( 'responsive-embeds' );

    register_nav_menus( [
        'primary' => __( 'Menú Principal', 'ad-cont-blue' ),
    ] );
}
add_action( 'after_setup_theme', 'adcont_setup' );

/* ------------------------------------------------------------------ */
/* Enqueue assets                                                       */
/* ------------------------------------------------------------------ */
function adcont_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'adcont-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap',
        [],
        null
    );

    // Main CSS
    wp_enqueue_style(
        'adcont-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'adcont-fonts' ],
        '1.0.0'
    );

    // Main JS (defer)
    wp_enqueue_script(
        'adcont-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'adcont_scripts' );

/* ------------------------------------------------------------------ */
/* Customizer options                                                   */
/* ------------------------------------------------------------------ */
function adcont_customizer( $wp_customize ) {

    // ---- Panel ----
    $wp_customize->add_panel( 'adcont_panel', [
        'title'    => __( 'AD Cont — Landing', 'ad-cont-blue' ),
        'priority' => 30,
    ] );

    // ===== HERO =====
    $wp_customize->add_section( 'adcont_hero', [
        'title' => __( 'Hero', 'ad-cont-blue' ),
        'panel' => 'adcont_panel',
    ] );

    $hero_fields = [
        'hero_badge'    => [ 'label' => 'Badge text',              'default' => 'Asesoría Tributaria & Contable' ],
        'hero_title'    => [ 'label' => 'Título (usa ** para gold)','default' => 'Optimiza legalmente tus **impuestos** y protege tu **crecimiento financiero**.' ],
        'hero_sub'      => [ 'label' => 'Subtítulo',               'default' => 'Transformamos la carga tributaria en una estrategia de crecimiento mediante planificación fiscal preventiva.' ],
        'hero_btn1'     => [ 'label' => 'Botón 1 texto',           'default' => 'Agenda tu asesoría' ],
        'hero_btn1_url' => [ 'label' => 'Botón 1 URL',             'default' => '#contacto' ],
        'hero_btn2'     => [ 'label' => 'Botón 2 texto',           'default' => 'Escríbenos por WhatsApp' ],
        'hero_btn2_url' => [ 'label' => 'Botón 2 URL',             'default' => 'https://wa.me/593991214567' ],
    ];
    foreach ( $hero_fields as $key => $args ) {
        $wp_customize->add_setting( $key, [ 'default' => $args['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ] );
        $wp_customize->add_control( $key, [ 'label' => $args['label'], 'section' => 'adcont_hero', 'type' => 'text' ] );
    }
    // Hero background image
    $wp_customize->add_setting( 'hero_bg_image', [ 'default' => '', 'sanitize_callback' => 'absint' ] );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_bg_image', [
        'label'     => 'Imagen de fondo Hero',
        'section'   => 'adcont_hero',
        'mime_type' => 'image',
    ] ) );

    // ===== ABOUT =====
    $wp_customize->add_section( 'adcont_about', [
        'title' => __( 'Sobre Nosotros', 'ad-cont-blue' ),
        'panel' => 'adcont_panel',
    ] );
    $about_fields = [
        'about_title'    => [ 'label' => 'Título',    'default' => 'Sobre Nosotros' ],
        'about_subtitle' => [ 'label' => 'Subtítulo', 'default' => 'Estrategia Contable y Tributaria' ],
        'about_text'     => [ 'label' => 'Texto',     'default' => "En AD Cont brindamos asesoría contable y tributaria con enfoque estratégico.\n\nNo solo cumplimos con las obligaciones fiscales, diseñamos planes personalizados que permiten <strong>optimizar la carga tributaria</strong> dentro del marco legal ecuatoriano.\n\nNuestra especialidad es la <strong>planificación tributaria preventiva</strong>, ayudando a empresas, profesionales independientes y personas naturales a anticiparse a sus impuestos y tomar decisiones inteligentes.\n\nTrabajamos con ética, <strong>confidencialidad y compromiso</strong>, convirtiéndonos en aliados estratégicos para el crecimiento financiero de nuestros clientes en Guayaquil y Ecuador." ],
    ];
    foreach ( $about_fields as $key => $args ) {
        $wp_customize->add_setting( $key, [ 'default' => $args['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ] );
        $wp_customize->add_control( $key, [
            'label'   => $args['label'],
            'section' => 'adcont_about',
            'type'    => $key === 'about_text' ? 'textarea' : 'text',
        ] );
    }
    $wp_customize->add_setting( 'about_image', [ 'default' => '', 'sanitize_callback' => 'absint' ] );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'about_image', [
        'label'     => 'Imagen',
        'section'   => 'adcont_about',
        'mime_type' => 'image',
    ] ) );

    // ===== SERVICES =====
    $wp_customize->add_section( 'adcont_services', [
        'title' => __( 'Servicios', 'ad-cont-blue' ),
        'panel' => 'adcont_panel',
    ] );
    $svc_fields = [
        'services_title'    => [ 'label' => 'Título',    'default' => 'Nuestros Servicios' ],
        'services_subtitle' => [ 'label' => 'Subtítulo', 'default' => 'Soluciones a tu medida' ],
    ];
    foreach ( $svc_fields as $key => $args ) {
        $wp_customize->add_setting( $key, [ 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ] );
        $wp_customize->add_control( $key, [ 'label' => $args['label'], 'section' => 'adcont_services', 'type' => 'text' ] );
    }

    // ===== MISSION =====
    $wp_customize->add_section( 'adcont_mission', [
        'title' => __( 'Nuestra Misión', 'ad-cont-blue' ),
        'panel' => 'adcont_panel',
    ] );
    $mission_fields = [
        'mission_title' => [ 'label' => 'Título',   'default' => 'Nuestra Misión' ],
        'mission_text'  => [ 'label' => 'Texto',    'default' => 'Brindar asesoría contable y tributaria estratégica, especializada en planificación fiscal preventiva para optimizar legalmente la carga tributaria y fortalecer el crecimiento financiero de nuestros clientes.' ],
        'mission_btn1'  => [ 'label' => 'Botón 1',  'default' => 'Agendar Asesoría' ],
        'mission_btn1_url' => [ 'label' => 'URL 1', 'default' => '#contacto' ],
        'mission_btn2'  => [ 'label' => 'Botón 2',  'default' => 'WhatsApp' ],
        'mission_btn2_url' => [ 'label' => 'URL 2', 'default' => 'https://wa.me/593991214567' ],
    ];
    foreach ( $mission_fields as $key => $args ) {
        $wp_customize->add_setting( $key, [ 'default' => $args['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ] );
        $wp_customize->add_control( $key, [
            'label'   => $args['label'],
            'section' => 'adcont_mission',
            'type'    => $key === 'mission_text' ? 'textarea' : 'text',
        ] );
    }
    $wp_customize->add_setting( 'mission_bg_image', [ 'default' => '', 'sanitize_callback' => 'absint' ] );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'mission_bg_image', [
        'label'     => 'Imagen de fondo Misión',
        'section'   => 'adcont_mission',
        'mime_type' => 'image',
    ] ) );

    // ===== CONTACT / FOOTER =====
    $wp_customize->add_section( 'adcont_contact', [
        'title' => __( 'Contacto & Footer', 'ad-cont-blue' ),
        'panel' => 'adcont_panel',
    ] );
    $contact_fields = [
        'contact_phone'    => [ 'label' => 'Teléfono',  'default' => '+593 99 121 4567' ],
        'contact_email'    => [ 'label' => 'Email',     'default' => 'info@adcont.com' ],
        'contact_location' => [ 'label' => 'Ubicación', 'default' => 'Guayaquil – Ecuador' ],
        'contact_wa'       => [ 'label' => 'WhatsApp (número sin +)', 'default' => '593991214567' ],
    ];
    foreach ( $contact_fields as $key => $args ) {
        $wp_customize->add_setting( $key, [ 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ] );
        $wp_customize->add_control( $key, [ 'label' => $args['label'], 'section' => 'adcont_contact', 'type' => 'text' ] );
    }
}
add_action( 'customize_register', 'adcont_customizer' );

/* ------------------------------------------------------------------ */
/* Helper: get customizer value                                         */
/* ------------------------------------------------------------------ */
function adcont_get( $key ) {
    return get_theme_mod( $key );
}

/* ------------------------------------------------------------------ */
/* Helper: render hero title with **gold** markers                     */
/* ------------------------------------------------------------------ */
function adcont_hero_title( $raw ) {
    return preg_replace( '/\*\*(.+?)\*\*/', '<em>$1</em>', esc_html( $raw ) );
}
