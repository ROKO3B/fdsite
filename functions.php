<?php

function add_files() {
  wp_enqueue_style('reset-style', get_theme_file_uri('/css/reset.css'));

  wp_enqueue_style('main-style', get_theme_file_uri('/css/style.css'));

  wp_enqueue_style('theme-style',get_theme_file_uri('/css/theme.css'));
}

add_action('wp_enqueue_scripts','add_files');