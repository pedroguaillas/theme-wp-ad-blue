<?php
$phone    = get_theme_mod( 'contact_phone',    '+593 99 121 4567' );
$email    = get_theme_mod( 'contact_email',    'info@adcont.com' );
$location = get_theme_mod( 'contact_location', 'Guayaquil – Ecuador' );
$wa       = get_theme_mod( 'contact_wa',       '593991214567' );
?>

<!-- ===== FOOTER ===== -->
<footer id="contacto" class="site-footer" role="contentinfo">
  <div class="container">
    <div class="footer-inner">

      <!-- Brand -->
      <div class="footer-brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="AD Cont — Inicio">
          <?php if ( has_custom_logo() ) :
            the_custom_logo();
          else : ?>
            <svg class="logo-svg" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M40 8 C22.3 8 8 22.3 8 40 C8 54.2 16.8 66.4 29 71.5" stroke="#4caf50" stroke-width="5" stroke-linecap="round" fill="none"/>
              <path d="M40 8 C57.7 8 72 22.3 72 40 C72 54.2 63.2 66.4 51 71.5" stroke="#4caf50" stroke-width="5" stroke-linecap="round" fill="none"/>
              <circle cx="40" cy="40" r="22" fill="#b0bec5" opacity=".45"/>
              <rect x="26" y="44" width="8"  height="14" rx="2" fill="#4caf50"/>
              <rect x="36" y="36" width="8"  height="22" rx="2" fill="#388e3c"/>
              <rect x="46" y="30" width="8"  height="28" rx="2" fill="#4caf50"/>
              <rect x="22" y="58" width="36" height="2.5" rx="1.2" fill="#4caf50"/>
            </svg>
            <span class="logo-text-block">
              <span class="logo-name" style="color:var(--navy);">AD Cont</span>
              <span class="logo-sub" style="color:var(--gold);">Asesoría Contable y Tributaria</span>
            </span>
          <?php endif; ?>
        </a>
        <p class="footer-tagline">Asesoría Contable y Planificación Tributaria</p>
        <?php if ( $location ) : ?>
          <p class="footer-location">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="var(--gray-600)" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            <?php echo esc_html( $location ); ?>
          </p>
        <?php endif; ?>
      </div>

      <!-- Contact -->
      <div class="footer-contact">
        <?php if ( $phone ) : ?>
          <a href="tel:<?php echo esc_attr( preg_replace( '/[^+\d]/', '', $phone ) ); ?>">
            <span class="fc-icon phone" aria-hidden="true">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
            </span>
            <?php echo esc_html( $phone ); ?>
          </a>
        <?php endif; ?>
        <?php if ( $email ) : ?>
          <a href="mailto:<?php echo esc_attr( $email ); ?>">
            <span class="fc-icon email" aria-hidden="true">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
            </span>
            <?php echo esc_html( $email ); ?>
          </a>
        <?php endif; ?>
      </div>

    </div>

    <div class="footer-bottom">
      <p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> AD Cont — Asesoría Contable y Planificación Tributaria. Todos los derechos reservados.</p>
    </div>
  </div>
</footer>

<!-- WhatsApp flotante -->
<?php if ( $wa ) : ?>
  <a href="https://wa.me/<?php echo esc_attr( $wa ); ?>" class="wa-float" target="_blank" rel="noopener" aria-label="Chatear por WhatsApp">
    <span class="wa-pulse" aria-hidden="true"></span>
    <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
  </a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
