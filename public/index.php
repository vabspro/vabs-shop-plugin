<?php

class VABS_SHOP_PLUGIN
{
    protected $dependencies;
    protected $adminpage;
    protected $endpoints;

    public function __construct()
    {
        $this->dependencies = new VABSShopDependencies();
        $this->adminpage = new VABSShopAdminPage();
        $this->endpoints = new VABSShopEndpoints();

        add_action('wp_loaded', array($this, 'createShopPage'));
    }

    public function createVirtualPages() 
    {
        add_filter( 'generate_rewrite_rules', function ( $wp_rewrite ){
            $wp_rewrite->rules = array_merge(
                ['product/(\d+)/?$' => 'index.php?slug=$matches[1]'],
                $wp_rewrite->rules
            );
        } );

        add_filter( 'query_vars', function( $query_vars ){
            $query_vars[] = 'slug';
            return $query_vars;
        } );

        add_action( 'template_redirect', function(){
            $slug = intval( get_query_var( 'slug' ) );
            if ( $slug ) {
                include VABS_SHOP_PLUGIN_ROOTPATH . 'public/templates/product.php';
                die;
            }
        } );
    }

    public function createShopPage()
    {
        try {
            $page = get_page_by_path( 'shop' , OBJECT );
            if(!$page){
                $page_id = wp_insert_post([
                    'post_title'    => 'Shop',
                    'post_content'  => '',
                    'post_status'   => 'publish',
                    'post_type'     => 'page'
                ]);
                return $page_id;
            }else{
                return $page->ID;
            }
    
        } catch (\Throwable $th) {
            var_dump($th);
            die;
            
        }
        
    }

    public function createShopPageTemplate()
    {
        add_filter( 'page_template', array($this, 'shop_page_template') );
        
    }

    public function shop_page_template( $page_template )
    {
        if ( is_page( 'shop' ) ) {
            $page_template = VABS_SHOP_PLUGIN_ROOTPATH . 'public/templates/shop.php';
        }
        return $page_template;
    }
}