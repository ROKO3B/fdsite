<?php get_header(); ?>

  <main>
    <div id="top" class="wrapper">
      <div class="grid">
          <?php
            $args = array(
              'posts_per_page' => 8
            );
          ?>
          <?php $posts = get_posts($args); ?>
          <?php foreach($posts as $post): ?>
            <?php setup_postdata($post); ?>
            <div class="item-list">
              <a href="<?php the_permalink(); ?>">
                <img decoding="async" src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                <p><?php the_title(); ?></p>
                <p>&yen;<?php echo esc_html(get_post_meta($post->ID, 'price', true)); ?> +tax</p>
              </a>
            </div>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>      
      </div><!-------grid-------->
    </div> 
    <a class="link-text wrapper" href="<?php echo esc_url(home_url('/category/products/')); ?>">View More</a>
  </main>

  <?php get_footer(); ?>