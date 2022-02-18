<?php

require VABS_SHOP_PLUGIN_ROOTPATH . 'vendor/autoload.php';
require VABS_SHOP_PLUGIN_ROOTPATH . 'public/api/filehandler.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class VABSShopEndpoints
{
    public $logger;
    public $config;
    public $fileHandler;
    public $token;
    public $client_id;
    public $url;
    public $object_code = 7;


    public function __construct()
    {

        include(VABS_SHOP_PLUGIN_ROOTPATH . '/public/config.php');
    
        $this->logger = new Logger('main');
        $this->fileHandler = new FileHandler($config['api_token'], $config['url']);
        $this->config = $config;
        $this->token = $config['api_token'];
        $this->client_id = $config['client_id'];
        $this->url = $config['url'];

        add_action('rest_api_init', function () {
            register_rest_route('app/v1', 'shopconfig', ['methods' => 'GET', 'callback' => array($this, 'get_shop_config_data')]);
            register_rest_route('app/v1', 'vabsarticle', ['methods' => 'GET', 'callback' => array($this, 'get_all_articles')]);
        });
    }

    public function send_error_message_to_admin($payload)
    {
        $this->logger->pushHandler(new StreamHandler(VABS_SHOP_PLUGIN_ROOTPATH . '/logs/' . date("Y-m-d_h:i:sa") . '.log', Logger::DEBUG));
        $this->logger->info('A warning message', ['request' => $payload, 'server' => $_SERVER]);

        mail('uwe@vabs.pro', $payload);
    }

    public function get_shop_config_data()
    {
        return ['ok' => true];
    }

    public function get_all_articles()
    {
        if(!$this->fileHandler->hasFile()){
            return $this->fileHandler->updateFile();
        }else{
            return $this->fileHandler->getFile();
        }
    
    }

}
