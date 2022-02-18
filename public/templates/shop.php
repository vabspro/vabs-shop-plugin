<?php 

$file = VABS_SHOP_PLUGIN_ROOTPATH . 'public/api/articles.json';
$products = json_decode(file_get_contents($file), false);

get_header(); ?>

<div class="flex items-center"></div>

<?php get_footer(); ?>