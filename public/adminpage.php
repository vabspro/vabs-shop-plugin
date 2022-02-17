<?php

class VABSShopAdminPage
{
    public function __construct()
    {
        add_action( 'admin_menu', array($this, 'add_vabs_shop_admin_pages') );
    }

    public function add_vabs_shop_admin_pages()
    {
        add_menu_page('vabs shop plugin', 'VABS Shop', 'manage_options', 'wpvabs_shop_plugin', array($this, 'vabs_admin_shop_index'), '', 110);
    }


    public function vabs_admin_shop_index()
    {
        include(VABS_SHOP_PLUGIN_ROOTPATH . 'public/templates/index.php');
    }
}