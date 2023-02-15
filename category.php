<?php get_header(); ?>

<main>
  <div class="content wrapper">
    <?php
      $cat = get_the_category();
      $catname = $cat[0]->cat_name;
    ?>
    <h1 class="page-title"><?php echo $catname; ?></h1>
    <div class="grid">
      <?php if(have_posts()): ?>
        <?php while(have_posts()):the_post(); ?>
          <div class="item-list">
            <a href="<?php the_permalink(); ?>">
              <img decoding="async" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
              <p><?php the_title(); ?></p>
              <p>&yen;<?php echo esc_html(get_post_meta($post->ID, 'price', true)); ?> +tax</p>
            </a>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <?php
      if(function_exists("pagination")) {
        pagination($wp_query->max_num_pages);
      }
    ?>
  </div>
</main>

<?php get_footer(); ?>