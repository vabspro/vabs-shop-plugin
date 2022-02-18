<?php

class FileHandler 
{
    public $root;
    public $token;

    public $url;
    public $all_articles_endpoint = "article/";


    public function __construct($token, $url)
    {
        $this->token = $token;
        $this->url = $url;
        $this->filepath = VABS_SHOP_PLUGIN_ROOTPATH . 'public/api/articles.json';
    }

    public function hasFile()
    {
        return file_exists($this->filepath);
    }

    public function getFile()
    {
        return json_decode(file_get_contents($this->filepath), false);
    }

    public function updateFile()
    {
        $data = $this->fetchData();
        $file = fopen($this->filepath, 'w');
        fwrite($file, $data);
        fclose($file);

        return $this->getFile();
    }

    public function fetchData()
    {
        $header = ['Token:' . $this->token];
        $curl = curl_init($this->url . $this->all_articles_endpoint);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $curl_response = curl_exec($curl);
        curl_close($curl);
        return $curl_response;
    }
}