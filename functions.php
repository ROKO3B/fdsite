<?php

function add_files() {
  wp_enqueue_style('reset-style', get_theme_file_uri('/css/reset.css'));

  wp_enqueue_style('main-style', get_theme_file_uri('/css/style.css'));

  wp_enqueue_style('theme-style',get_theme_file_uri('/css/theme.css'));
}

add_action('wp_enqueue_scripts','add_files');

function st_enqueue_scripts() {
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', false);
  wp_enqueue_script('main', get_theme_file_uri('js/main.js'), array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'st_enqueue_scripts');

add_theme_support('post-thumbnails');