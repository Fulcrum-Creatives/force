<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
  <header class="entry__header">
    <h1 class="entry__title" id="section-heading-<?php the_ID(); ?>">
      <?php the_title(); ?>
    </h1>
  </header>
  <div class="entry__content">
    <?php the_content(); ?>
  </div>
  <footer class="entry__footer">
  </footer>
</article>