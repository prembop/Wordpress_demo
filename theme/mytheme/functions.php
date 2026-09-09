<?php

function demo_theme_style(){

wp_enqueue_style(
'demo-style',
get_stylesheet_uri()
);

}

add_action('wp_enqueue_scripts','demo_theme_style');
