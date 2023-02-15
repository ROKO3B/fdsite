<?php get_header(); ?>

<main>
    <div class="content wrapper">
      <?php if(have_posts()): ?>
        <?php while(have_posts()):the_post(); ?>
          <h1 class="p-title"><?php the_title(); ?></h1>
          <div id="item">
            <div class="item-img">
                <img decoding="async" src="<?php the_post_thumbnail_url('full');?>" alt="">
            </div><!-----item-img-------->
              <div class="item-text">
                <?php the_content(); ?>
                <p>&yen;<?php echo esc_html(get_post_meta(get_the_ID(),'price',true)); ?>+tax</p>
                <dl>
                <dt>SIZE: </dt>
                <dd><?php echo esc_html(get_post_meta(get_the_ID(), 'size', true)); ?></dd>
                <dt>COLOR: </dt>
                <dd><?php echo esc_html(get_post_meta(get_the_ID(), 'color', true)); ?></dd>
                <dt>MATERIAL: </dt>
                <dd><?php echo esc_html(get_post_meta(get_the_ID(), 'material', true)); ?></dd>
              </dl>
            </div><!-------item-text----->
          </div><!------item-------->
        <?php endwhile; ?>
      <?php endif; ?>
        <a class="link-text" href="<?php echo esc_url(home_url('/category/products/')); ?>">Back To Products</a>  
    </div>
  </main>

  <?php get_footer(); ?>