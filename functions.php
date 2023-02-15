<?php

function add_files() {
  wp_enqueue_style('reset-style', get_theme_file_uri('/css/reset.css'));

  wp_enqueue_style('main-style', get_theme_file_uri('/css/main-style.css'));

}

add_action('wp_enqueue_scripts','add_files');

function st_enqueue_scripts() {
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', false);
  wp_enqueue_script('main', get_theme_file_uri('js/main.js'), array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'st_enqueue_scripts');


add_theme_support('post-thumbnails');

function pagination($pages = '', $range = 2) {
  $showitems = ($range * 2) + 1;

  global $paged;
  if(empty($paged)) {
    $paged = 1;
  }

  if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages) {
      $pages = 1;
    }
  }

  if(1 != $pages) {
    echo '<ul class="pagination">';
    if($paged > 1) {
      echo '<li class="prev"><a href="' . esc_url(get_pagenum_link($paged - 1)) . '">PREV</a></li>';
    }

    for ($i=1; $i <= $pages; $i++) {
      if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
        if ($paged == $i) {
          echo '<li class="active">' .$i. '</li>';
        } else {
          echo '<li><a href="' . esc_url(get_pagenum_link($i)) . '">' .$i. '</a></li>';
        }
      }
    }

    if ($paged < $pages) {
      echo '<li class="next"><a href="' . esc_url(get_pagenum_link($paged + 1)) . '">NEXT</a></li>';
    }
    echo '</ul>';
  }
}