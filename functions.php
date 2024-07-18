<?php
function fashion_assets(){
    // wp_enqueue_style -> load your css assets 
    wp_enqueue_style('fashion-style', get_template_directory_uri() . "/css/style.css", microtime());
    wp_enqueue_style('fashion-icons', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css", 1.0);

}
// Hook that will run this function    
add_action('wp_enqueue_scripts', 'fashion_assets');


function fashion_theme_support() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'fashion_theme_support' );