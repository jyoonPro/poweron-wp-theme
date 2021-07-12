<?php

add_theme_support('post-thumbnails');



// Navigation bar
require_once('navwalker.php');
add_theme_support('menus');
register_nav_menus( 
    array(
        'navbar' => __('Navigation Bar', 'theme'),
    )
);



// Tags
function add_class_the_tags($html){
    $postid = get_the_ID();
    $html = str_replace('<a','<a class="tag is-rounded"',$html);
    return $html;
}
add_filter('the_tags','add_class_the_tags',10,1);



// wp-pagenavi
function pagenavi_bulma($html) {
    $out = '';
    $out = str_replace('<div','',$html);
    $out = str_replace('class=\'wp-pagenavi\' role=\'navigation\'>','',$out);
    $out = str_replace('<a','<li><a class="pagination-link"',$out);
    $out = str_replace('</a>','</a></li>',$out);
    $out = str_replace('<span aria-current=\'page\' class=\'current\'','<li><span class="pagination-link is-current" aria-current="page"',$out);
    $out = str_replace('<span class=\'pages\'','<li><span class="pagination-ellipsis"',$out);
    $out = str_replace('<span class=\'extend\'','<li><span class="pagination-ellipsis"',$out);  
    $out = str_replace('</span>','</span></li>',$out);
    $out = str_replace('</div>','',$out);
    return '<nav class="pagination is-small is-rounded is-centered" role="navigation" aria-label="pagination"><ul class="pagination-list">'
        .$out.'</ul></nav>';
}
add_filter( 'wp_pagenavi', 'pagenavi_bulma', 10, 2 );



// Stylesheets and scripts
function load_stylesheets()
{
    wp_register_style('p_bulma', get_template_directory_uri().'/css/main.css', array(), 2, 'all');
    wp_enqueue_style('p_bulma');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function load_js()
{
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/92ca359d33.js', array(), 1, false);
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), 1, true);
    wp_register_script('p_script', get_template_directory_uri().'/lib/main.js', array(), 2, true);
    wp_enqueue_script('p_script');
}
add_action('wp_enqueue_scripts', 'load_js')

?>