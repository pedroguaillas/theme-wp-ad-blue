<?php
/**
 * AD Cont Blue — Fallback index template
 */
get_header();
?>
<main style="min-height:60vh;display:flex;align-items:center;justify-content:center;padding:120px 24px 80px;">
  <div style="text-align:center;max-width:520px;">
    <h1 style="font-size:1.8rem;font-weight:800;color:var(--navy);margin-bottom:1rem;"><?php bloginfo( 'name' ); ?></h1>
    <p style="color:var(--gray-600);"><?php bloginfo( 'description' ); ?></p>
    <?php if ( have_posts() ) : ?>
      <ul style="margin-top:2rem;text-align:left;list-style:disc;padding-left:1.5rem;">
        <?php while ( have_posts() ) : the_post(); ?>
          <li><a href="<?php the_permalink(); ?>" style="color:var(--blue);font-weight:600;"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>
