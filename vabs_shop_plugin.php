<?php

/**
 * Plugin Name: VABS - Shop Plugin
 * Description: VABS Plugin to enable shopping on Wordpress Site
 * Version: 1.1
 * Author: Uwe Horn
 * Author URI http://uwe-horn.net
 * License: GPLv2 or later
 * Text Domain: vabsshop
 */

defined('ABSPATH') or die('You can not access this file.');

define('VABS_SHOP_PLUGIN_ROOTPATH', plugin_dir_path( __FILE__ ));

include_once('public/dependencies.php');
include_once('public/adminpage.php');
include_once('public/api/index.php');
include_once('public/index.php');

function ini_vabs_shop_plugin()
{
    $plugin = new VABS_SHOP_PLUGIN();
    $plugin->createVirtualPages();
    $plugin->createShopPageTemplate();
}

ini_vabs_shop_plugin();


