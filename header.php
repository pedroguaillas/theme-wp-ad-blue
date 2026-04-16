<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" role="banner">
  <div class="container">
    <div class="header-inner">

      <!-- Logo -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="AD Cont — Inicio">
        <?php if ( has_custom_logo() ) :
          the_custom_logo();
        else : ?>
          <!-- AD Cont SVG Logo -->
          <svg class="logo-svg" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <!-- Outer green arc -->
            <path d="M40 8 C22.3 8 8 22.3 8 40 C8 54.2 16.8 66.4 29 71.5" stroke="#4caf50" stroke-width="5" stroke-linecap="round" fill="none"/>
            <path d="M40 8 C57.7 8 72 22.3 72 40 C72 54.2 63.2 66.4 51 71.5" stroke="#4caf50" stroke-width="5" stroke-linecap="round" fill="none"/>
            <!-- Gray circle background -->
            <circle cx="40" cy="40" r="22" fill="#b0bec5" opacity=".45"/>
            <!-- Bar chart bars -->
            <rect x="26" y="44" width="8" height="14" rx="2" fill="#4caf50"/>
            <rect x="36" y="36" width="8" height="22" rx="2" fill="#388e3c"/>
            <rect x="46" y="30" width="8" height="28" rx="2" fill="#4caf50"/>
            <!-- Base line -->
            <rect x="22" y="58" width="36" height="2.5" rx="1.2" fill="#4caf50"/>
          </svg>
          <span class="logo-text-block">
            <span class="logo-name">AD Cont</span>
            <span class="logo-sub">Asesoría Contable y Tributaria</span>
          </span>
        <?php endif; ?>
      </a>

      <!-- Hamburger -->
      <button class="nav-toggle" aria-label="Abrir menú" aria-expanded="false" aria-controls="main-nav">
        <span></span><span></span><span></span>
      </button>

      <!-- Nav -->
      <nav id="main-nav" class="main-nav" role="navigation" aria-label="Menú principal">
        <?php if ( has_nav_menu( 'primary' ) ) :
          wp_nav_menu( [
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'walker'         => new Adcont_Nav_Walker(),
          ] );
        else : ?>
          <a href="#inicio">Inicio</a>
          <a href="#nosotros">Nosotros</a>
          <a href="#servicios">Servicios</a>
          <a href="#contacto">Contacto</a>
        <?php endif; ?>
      </nav>

    </div>
  </div>
</header>

<?php
if ( ! class_exists( 'Adcont_Nav_Walker' ) ) :
class Adcont_Nav_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $url    = $item->url ?? '#';
        $title  = apply_filters( 'the_title', $item->title, $item->ID );
        $active = in_array( 'current-menu-item', (array) $item->classes ) ? ' active' : '';
        $output .= sprintf( '<a href="%s" class="%s">%s</a>', esc_url( $url ), trim( $active ), esc_html( $title ) );
    }
    public function end_el( &$output, $item, $depth = 0, $args = null ) {}
    public function start_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_lvl( &$output, $depth = 0, $args = null ) {}
}
endif;
