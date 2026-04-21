<?php
/**
 * AD Cont Blue — Front Page (Landing)
 */
get_header();

$tdir = get_template_directory_uri();

// ---- Customizer values with defaults ----
$hero_title_raw = get_theme_mod( 'hero_title',     'Optimiza legalmente tus impuestos y protege tu crecimiento financiero.' );
$hero_sub       = get_theme_mod( 'hero_sub',       'Transformamos la carga tributaria en una estrategia de crecimiento<br>mediante planificación fiscal preventiva.' );
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
        'chart'  => '<svg width="44" height="44" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="gc1" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#f5c842"/><stop offset="100%" stop-color="#c8a234"/></linearGradient>
    <linearGradient id="gc2" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#3a6fd8"/><stop offset="100%" stop-color="#1b3a7a"/></linearGradient>
    <linearGradient id="gc3" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#5b8dee"/><stop offset="100%" stop-color="#1b3a7a"/></linearGradient>
  </defs>
  <rect x="4"  y="28" width="8" height="14" rx="2" fill="url(#gc2)"/>
  <rect x="16" y="18" width="8" height="24" rx="2" fill="url(#gc1)"/>
  <rect x="28" y="10" width="8" height="32" rx="2" fill="url(#gc3)"/>
  <rect x="40" y="22" width="4" height="20" rx="2" fill="url(#gc2)" opacity=".6"/>
  <line x1="2" y1="43" x2="46" y2="43" stroke="#1b3a7a" stroke-width="2.5" stroke-linecap="round"/>
  <polyline points="5,27 20,16 32,8 44,18" fill="none" stroke="#f5c842" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <circle cx="44" cy="18" r="2.5" fill="#f5c842"/>
</svg>',
        'book'   => '<svg width="44" height="44" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="gb1" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#3a6fd8"/><stop offset="100%" stop-color="#0d1b3e"/></linearGradient>
  </defs>
  <rect x="8" y="4" width="26" height="36" rx="3" fill="url(#gb1)"/>
  <rect x="10" y="4" width="4" height="36" rx="2" fill="#0d1b3e" opacity=".4"/>
  <rect x="16" y="12" width="14" height="2" rx="1" fill="white" opacity=".7"/>
  <rect x="16" y="17" width="14" height="2" rx="1" fill="white" opacity=".5"/>
  <rect x="16" y="22" width="10" height="2" rx="1" fill="white" opacity=".5"/>
  <rect x="16" y="27" width="12" height="2" rx="1" fill="white" opacity=".4"/>
  <path d="M8 38c0 0 0 4 6 4h22a4 4 0 0 0 4-4V8a4 4 0 0 0-4-4" stroke="#c8a234" stroke-width="1.5" fill="none"/>
  <rect x="32" y="4" width="6" height="38" rx="2" fill="#1b3a7a" opacity=".3"/>
</svg>',
        'gavel'  => '<svg width="44" height="44" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="gg1" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#5b8dee"/><stop offset="100%" stop-color="#1b3a7a"/></linearGradient>
    <linearGradient id="gg2" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#f5c842"/><stop offset="100%" stop-color="#c8a234"/></linearGradient>
  </defs>
  <rect x="10" y="6" width="22" height="10" rx="3" transform="rotate(45 10 6)" fill="url(#gg1)"/>
  <rect x="12" y="8" width="18" height="5" rx="2" transform="rotate(45 12 8)" fill="url(#gg2)" opacity=".6"/>
  <rect x="4" y="32" width="28" height="7" rx="3" fill="url(#gg1)"/>
  <line x1="20" y1="28" x2="20" y2="32" stroke="#1b3a7a" stroke-width="3" stroke-linecap="round"/>
  <line x1="6" y1="44" x2="42" y2="44" stroke="#c8a234" stroke-width="2.5" stroke-linecap="round"/>
</svg>',
        'car'    => '<svg width="44" height="44" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="gcar1" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#3a6fd8"/><stop offset="100%" stop-color="#0d1b3e"/></linearGradient>
    <linearGradient id="gcar2" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#5b8dee"/><stop offset="100%" stop-color="#3a6fd8"/></linearGradient>
  </defs>
  <path d="M6 30V22l6-10h20l6 10v8a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2z" fill="url(#gcar1)"/>
  <path d="M14 12l-4 10h28l-4-10z" fill="url(#gcar2)"/>
  <rect x="16" y="14" width="16" height="7" rx="2" fill="#a8c4f5" opacity=".7"/>
  <circle cx="13" cy="34" r="5" fill="#0d1b3e" stroke="#c8a234" stroke-width="2"/>
  <circle cx="13" cy="34" r="2" fill="#c8a234"/>
  <circle cx="35" cy="34" r="5" fill="#0d1b3e" stroke="#c8a234" stroke-width="2"/>
  <circle cx="35" cy="34" r="2" fill="#c8a234"/>
  <rect x="4"  y="24" width="4" height="5" rx="1" fill="#f5c842" opacity=".9"/>
  <rect x="40" y="24" width="4" height="5" rx="1" fill="#f5c842" opacity=".5"/>
</svg>',
        'refund' => '<svg width="44" height="44" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="gr1" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#f5c842"/><stop offset="100%" stop-color="#c8a234"/></linearGradient>
    <linearGradient id="gr2" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#3a6fd8"/><stop offset="100%" stop-color="#0d1b3e"/></linearGradient>
  </defs>
  <circle cx="24" cy="26" r="18" fill="url(#gr2)"/>
  <circle cx="24" cy="26" r="14" fill="#162d5e"/>
  <path d="M24 14v12l8 4" stroke="#f5c842" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M10 8a18 18 0 0 1 14-4" stroke="url(#gr1)" stroke-width="3" stroke-linecap="round"/>
  <path d="M10 4v8h8" fill="none" stroke="url(#gr1)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
  <circle cx="24" cy="26" r="2.5" fill="#f5c842"/>
</svg>',
    ];
    return $icons[ $key ] ?? $icons['book'];
}
?>

<!-- ===================================================
     HERO
     =================================================== -->
<section id="inicio" class="hero">
  <div class="hero-bg"></div>

  <div class="container">
    <div class="hero-content">
      <h1 class="hero-title" data-anim="fade-left" data-delay="100"><?php echo esc_html( $hero_title_raw ); ?></h1>
      <div class="hero-divider" data-anim="fade-left" data-delay="300"></div>
      <?php if ( $hero_sub ) : ?>
        <p class="hero-sub" data-anim="fade-up" data-delay="400"><?php echo wp_kses( $hero_sub, [ 'br' => [] ] ); ?></p>
      <?php endif; ?>
      <div class="hero-ctas" data-anim="fade-up" data-delay="550">
        <a href="<?php echo esc_url( $hero_btn1_url ); ?>" class="btn btn-gold">
          <?php echo esc_html( $hero_btn1 ); ?>
        </a>
        <a href="<?php echo esc_url( $hero_btn2_url ); ?>" class="btn btn-outline-white" target="_blank" rel="noopener">
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

    <div class="section-header" data-anim="fade-up">
      <h2 class="section-title"><?php echo esc_html( $about_title ); ?></h2>
      <p class="section-subtitle"><?php echo esc_html( $about_subtitle ); ?></p>
    </div>

    <div class="about-grid">

      <!-- Image (local file, no media library needed) -->
      <div class="about-image-wrap" data-anim="fade-left">
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
      <div class="about-body" data-anim="fade-right">
        <?php
        $default_text = "En AD Cont brindamos asesoría contable y tributaria con enfoque estratégico.\n\nNo solo cumplimos con las obligaciones fiscales, diseñamos planes personalizados que permiten optimizar la carga tributaria dentro del marco legal ecuatoriano.\n\nNuestra especialidad es la <strong>planificación tributaria preventiva</strong>, ayudando a empresarios, profesionales independientes y personas naturales a anticiparse a sus impuestos y tomar decisiones inteligentes.\n\nTrabajamos con ética, confidencialidad y compromiso, convirtiéndonos en aliados estratégicos para el crecimiento financiero de nuestros clientes en Gualaquiza y Ecuador.";
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

    <div class="section-header" data-anim="fade-up">
      <h2 class="section-title"><?php echo esc_html( $services_title ); ?></h2>
      <p class="section-subtitle"><?php echo esc_html( $services_subtitle ); ?></p>
    </div>

    <div class="services-grid">
      <?php $svc_delay = 0; foreach ( $services as $svc ) :
        $svc_delay += 100;
        if ( ! empty( $svc['featured'] ) ) : ?>
          <div class="svc-card svc-card--star" data-anim="scale-in" data-delay="<?php echo $svc_delay; ?>">
            <h3><?php echo esc_html( $svc['title'] ); ?></h3>
            <div class="svc-icon" aria-hidden="true">
              <?php echo adcont_svc_icon( $svc['icon'] ); ?>
            </div>
            <p><?php echo esc_html( $svc['desc'] ); ?></p>
          </div>
        <?php else : ?>
          <div class="svc-card" data-anim="scale-in" data-delay="<?php echo $svc_delay; ?>">
            <h3><?php echo esc_html( $svc['title'] ); ?></h3>
            <div class="svc-icon" aria-hidden="true">
              <?php echo adcont_svc_icon( $svc['icon'] ); ?>
            </div>
            <p><?php echo esc_html( $svc['desc'] ); ?></p>
          </div>
        <?php endif;
      endforeach; ?>
    </div>

  </div>
</section>

<!-- ===================================================
     INFÓRMATE
     =================================================== -->
<section id="informate" class="informate">
  <div class="container">

    <div class="section-header" data-anim="fade-up">
      <h2 class="section-title">Infórmate</h2>
      <p class="section-subtitle">Artículos y novedades tributarias</p>
    </div>

    <?php
    $informate_query = new WP_Query([
        'post_status'    => 'publish',
        'posts_per_page' => 6,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
    if ( $informate_query->have_posts() ) : ?>
    <div class="carousel-wrapper" data-anim="slide-up" data-delay="150">
      <div class="carousel-track-outer">
        <div class="carousel-track">
          <?php while ( $informate_query->have_posts() ) : $informate_query->the_post(); ?>
          <article class="post-card<?php echo has_post_thumbnail() ? '' : ' no-thumb'; ?>">
            <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" class="post-card-thumb" tabindex="-1" aria-hidden="true">
              <?php the_post_thumbnail( 'large', [ 'loading' => 'lazy' ] ); ?>
              <?php $cats = get_the_category(); if ( $cats ) : ?>
              <span class="post-card-category"><?php echo esc_html( $cats[0]->name ); ?></span>
              <?php endif; ?>
            </a>
            <?php endif; ?>
            <div class="post-card-body">
              <span class="post-card-date"><?php echo get_the_date( 'd M Y' ); ?></span>
              <h3 class="post-card-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
              <p class="post-card-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '…' ); ?></p>
              <a href="<?php the_permalink(); ?>" class="post-card-link">Leer más</a>
            </div>
          </article>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="carousel-controls">
        <button class="carousel-btn carousel-prev" aria-label="Anterior">&#8592;</button>
        <div class="carousel-dots" role="tablist" aria-label="Artículos"></div>
        <button class="carousel-btn carousel-next" aria-label="Siguiente">&#8594;</button>
      </div>
    </div>
    <?php else : ?>
    <p class="informate-empty">Próximamente publicaremos artículos de interés tributario.</p>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
