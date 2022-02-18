<?php 

$file = VABS_SHOP_PLUGIN_ROOTPATH . 'public/api/articles.json';
$products = json_decode(file_get_contents($file), false);

get_header(); ?>



<?php get_footer(); ?>