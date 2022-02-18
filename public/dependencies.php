<?php

class VABSShopDependencies
{
    protected $options;

    public function __construct()
    {
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue_admin') );
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue') );
    }

    public function enqueue_admin()
    {
        wp_enqueue_style('vabs_shop_plugin_admin_style', plugins_url( 'vabs-shop-plugin/dist/backend/index.css'));
        wp_enqueue_script('vabs_shop_plugin_admin_script', plugins_url( 'vabs-shop-plugin/dist/backend/index.js'), '', '', true);

    }

    public function enqueue()
    {
        wp_enqueue_style('vabs_shop_plugin_style', plugins_url( 'vabs-shop-plugin/dist/css/styles.css'));
        wp_enqueue_script('vabs_shop_plugin_script', plugins_url( 'vabs-shop-plugin/dist/js/index.js'), '', '', true);
    }
}