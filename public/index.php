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
    }

}