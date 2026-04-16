<?php
/**
 * AD Cont Blue — Front Page (Landing)
 */
get_header();

$tdir = get_template_directory_uri();

// ---- Customizer values with defaults ----
$hero_title_raw = get_theme_mod( 'hero_title',     'Optimiza legalmente tus impuestos y protege tu crecimiento financiero.' );
$hero_sub       = get_theme_mod( 'hero_sub',       'Transformamos la carga tributaria en una estrategia de crecimiento mediante planificación fiscal preventiva.' );
$hero_btn1      = get_theme_mod( 'hero_btn1',      'Agenda tu asesoría' );
$hero_btn1_url  = get_theme_mod( 'hero_btn1_url',  '#contacto' );
$hero_btn2      = get_theme_mod( 'hero_btn2',      'Escríbenos por WhatsApp' );
$hero_btn2_url  = get_theme_mod( 'hero_btn2_url',  'https://wa.me/593991214567' );

$about_title    = get_theme_mod( 'about_title',    'Sobre Nosotros' );
$about_subtitle = get_theme_mod( 'about_subtitle', 'Estrategia Contable y Tributaria' );
$about_text     = get_theme_mod( 'about_text',     '' );

$services_title    = get_theme_mod( 'services_title',    'Nuestros Servicios' );
$services_subtitle = get_theme_mod( 'services_subtitle', 'Soluciones a tu medida' );

$mission_title    = get_theme_mod( 'mission_title',    'Nuestra Misión' );
$mission_text     = get_theme_mod( 'mission_text',     'Brindar asesoría contable y tributaria estratégica, especializada en planificación fiscal preventiva para optimizar legalmente la carga tributaria y fortalecer el crecimiento financiero de nuestros clientes.' );
$mission_btn1     = get_theme_mod( 'mission_btn1',     'Agendar Asesoría' );
$mission_btn1_url = get_theme_mod( 'mission_btn1_url', '#contacto' );
$mission_btn2     = get_theme_mod( 'mission_btn2',     'WhatsApp' );
$mission_btn2_url = get_theme_mod( 'mission_btn2_url', 'https://wa.me/593991214567' );

$wa = get_theme_mod( 'contact_wa', '593991214567' );

// Services definition
$services = [
    [
        'featured' => true,
        'title'    => 'Planificación Tributaria Estratégica',
        'desc'     => 'Estrategias legales para optimizar tus impuestos y reducir riesgos fiscales.',
        'tag'      => 'Servicio Estrella',
        'icon'     => 'chart',
    ],
    [
        'title' => 'Contabilidad Persona Natural y Jurídica',
        'desc'  => 'Gestión contable organizada para individuos y empresas.',
        'icon'  => 'book',
    ],
    [
        'title' => 'Impugnación Glosas Tributarias',
        'desc'  => 'Defensa técnica ante procesos del SRI.',
        'icon'  => 'gavel',
    ],
    [
        'title' => 'Exoneración y Matrícula Vehicular',
        'desc'  => 'Gestión eficiente de trámites tributarios vehiculares.',
        'icon'  => 'car',
    ],
    [
        'title' => 'Devolución de Impuestos',
        'desc'  => 'Recuperación de valores pagados en exceso al fisco.',
        'icon'  => 'refund',
    ],
];

// SVG icons map
function adcont_svc_icon( $key ) {
    $icons = [
        'chart'  => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#c8a234" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6"  y1="20" x2="6"  y2="14"/><line x1="2"  y1="20" x2="22" y2="20"/></svg>',
        'book'   => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#1b3a7a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
        'gavel'  => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#1b3a7a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m14 13-8.5 8.5a2.12 2.12 0 0 1-3-3L11 10"/><path d="m16 16 6-6"/><path d="m8 8 6-6"/><path d="m9 7 8 8"/><path d="m21 11-8-8"/></svg>',
        'car'    => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#1b3a7a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17H3a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v9a2 2 0 0 1-2 2h-1"/><circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/><path d="M14 3v4h4"/></svg>',
        'refund' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#1b3a7a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/></svg>',
    ];
    return $icons[ $key ] ?? $icons['book'];
}
?>

<!-- ===================================================
     HERO
     =================================================== -->
<section id="inicio" class="hero">
  <div class="hero-bg"></div>

  <!-- Decorative city silhouette -->
  <svg class="hero-city" viewBox="0 0 1440 180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
    <path fill="rgba(255,255,255,1)" d="
      M0,180 L0,130
      L50,130 L50,90  L65,90  L65,65  L80,65  L80,50  L95,50  L95,65  L110,65 L110,90
      L130,90 L130,50 L145,50 L145,25 L160,25 L160,10 L175,10 L175,25 L190,25 L190,50
      L205,50 L205,70 L230,70 L230,40 L248,40 L248,55 L265,55 L265,40 L280,40 L280,70
      L310,70 L310,45 L328,45 L328,20 L345,20 L345,5  L360,5  L360,20 L375,20 L375,45
      L400,45 L400,65 L420,65 L420,45 L440,45 L440,35 L455,35 L455,45 L475,45 L475,65
      L510,65 L510,40 L528,40 L528,18 L545,18 L545,40 L565,40 L565,65
      L595,65 L595,45 L615,45 L615,30 L630,30 L630,45 L650,45 L650,65
      L680,65 L680,40 L698,40 L698,55 L715,55 L715,40 L732,40 L732,65
      L760,65 L760,45 L778,45 L778,28 L795,28 L795,45 L812,45 L812,65
      L840,65 L840,45 L858,45 L858,30 L875,30 L875,45 L892,45 L892,65
      L920,65 L920,85 L945,85 L945,55 L963,55 L963,38 L980,38 L980,55 L998,55 L998,85
      L1030,85 L1030,60 L1048,60 L1048,40 L1065,40 L1065,60 L1082,60 L1082,85
      L1110,85 L1110,65 L1128,65 L1128,45 L1145,45 L1145,65 L1162,65 L1162,85
      L1190,85 L1190,65 L1208,65 L1208,80 L1225,80 L1225,65 L1242,65 L1242,85
      L1270,85 L1270,65 L1290,65 L1290,50 L1308,50 L1308,65 L1325,65 L1325,85
      L1360,85 L1360,100 L1440,100 L1440,180 Z
    "/>
  </svg>

  <div class="container">
    <div class="hero-content">
      <h1 class="hero-title fade-in"><?php echo esc_html( $hero_title_raw ); ?></h1>
      <?php if ( $hero_sub ) : ?>
        <p class="hero-sub fade-in"><?php echo esc_html( $hero_sub ); ?></p>
      <?php endif; ?>
      <div class="hero-ctas fade-in">
        <a href="<?php echo esc_url( $hero_btn1_url ); ?>" class="btn btn-gold">
          <?php echo esc_html( $hero_btn1 ); ?>
        </a>
        <a href="<?php echo esc_url( $hero_btn2_url ); ?>" class="btn btn-outline-white" target="_blank" rel="noopener">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
          <?php echo esc_html( $hero_btn2 ); ?>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ===================================================
     SOBRE NOSOTROS
     =================================================== -->
<section id="nosotros" class="about">
  <div class="container">

    <div class="section-header fade-in">
      <h2 class="section-title"><?php echo esc_html( $about_title ); ?></h2>
      <p class="section-subtitle"><?php echo esc_html( $about_subtitle ); ?></p>
      <div class="section-divider"></div>
    </div>

    <div class="about-grid">

      <!-- Image (local file, no media library needed) -->
      <div class="about-image-wrap fade-in">
        <?php
        $about_img_id  = get_theme_mod( 'about_image', 0 );
        $about_img_url = $about_img_id
            ? wp_get_attachment_image_url( $about_img_id, 'large' )
            : $tdir . '/assets/images/nosotros.jpeg';
        ?>
        <img src="<?php echo esc_url( $about_img_url ); ?>"
             alt="<?php esc_attr_e( 'Asesor AD Cont', 'ad-cont-blue' ); ?>"
             width="560" height="460"
             loading="eager">
      </div>

      <!-- Text -->
      <div class="about-body fade-in">
        <?php
        $default_text = "En AD Cont brindamos asesoría contable y tributaria con enfoque estratégico.\n\nNo solo cumplimos con las obligaciones fiscales, diseñamos planes personalizados que permiten <strong>optimizar la carga tributaria</strong> dentro del marco legal ecuatoriano.\n\nNuestra especialidad es la <strong>planificación tributaria preventiva</strong>, ayudando a empresas, profesionales independientes y personas naturales a anticiparse a sus impuestos y tomar decisiones inteligentes.\n\nTrabajamos con ética, <strong>confidencialidad y compromiso</strong>, convirtiéndonos en aliados estratégicos para el crecimiento financiero de nuestros clientes en Guayaquil y Ecuador.";
        $body = $about_text ?: $default_text;
        $allowed = [ 'strong' => [], 'em' => [], 'a' => [ 'href' => [], 'target' => [], 'rel' => [] ] ];
        foreach ( array_filter( array_map( 'trim', explode( "\n\n", $body ) ) ) as $p ) {
            echo '<p>' . wp_kses( $p, $allowed ) . '</p>';
        }
        ?>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================
     NUESTROS SERVICIOS
     =================================================== -->
<section id="servicios" class="services">
  <div class="container">

    <div class="section-header fade-in">
      <h2 class="section-title"><?php echo esc_html( $services_title ); ?></h2>
      <p class="section-subtitle"><?php echo esc_html( $services_subtitle ); ?></p>
      <div class="section-divider"></div>
    </div>

    <div class="services-grid">
      <?php foreach ( $services as $svc ) :
        if ( ! empty( $svc['featured'] ) ) : ?>
          <div class="svc-featured fade-in">
            <div class="svc-featured-icon" aria-hidden="true">
              <?php echo adcont_svc_icon( $svc['icon'] ); ?>
            </div>
            <h3><?php echo esc_html( $svc['title'] ); ?></h3>
            <p><?php echo esc_html( $svc['desc'] ); ?></p>
            <span class="svc-featured-tag"><?php echo esc_html( $svc['tag'] ); ?></span>
          </div>
        <?php else : ?>
          <div class="svc-card fade-in">
            <div class="svc-icon" aria-hidden="true">
              <?php echo adcont_svc_icon( $svc['icon'] ); ?>
            </div>
            <h3><?php echo esc_html( $svc['title'] ); ?></h3>
            <p><?php echo esc_html( $svc['desc'] ); ?></p>
          </div>
        <?php endif;
      endforeach; ?>
    </div>

  </div>
</section>

<!-- ===================================================
     NUESTRA MISIÓN
     =================================================== -->
<section id="mision" class="mission">
  <div class="mission-bg"></div>
  <div class="container">
    <div class="mission-content fade-in">
      <h2 class="section-title"><?php echo esc_html( $mission_title ); ?></h2>
      <div class="section-divider"></div>
      <p class="mission-text"><?php echo esc_html( $mission_text ); ?></p>
      <div class="mission-ctas">
        <a href="<?php echo esc_url( $mission_btn1_url ); ?>" class="btn btn-blue">
          <?php echo esc_html( $mission_btn1 ); ?>
        </a>
        <a href="<?php echo esc_url( $mission_btn2_url ); ?>" class="btn btn-wa" target="_blank" rel="noopener">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
          <?php echo esc_html( $mission_btn2 ); ?>
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
