<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
class api {
    public $num;    
     function __construct($num){
        $this->num=$num; 
    }
    function fetch($link)
    {
        $client = new Client();
        $response = $client->request('GET', $link);
        $data = json_decode($response->getBody(), true);
        return $data;
    }
    function Image($num){
        $data=$this->fetch('https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services');
        $image=$data['data'][$num]['relationships']['field_image']['links']['related']['href'];
        $image1 =$this->fetch($image);
    
        $image2 = $image1['data']['attributes']['uri']['url'];
        return $image2;
    }
    function Title($num){
        $data=$this->fetch('https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services');
        $title=$data['data'][$num]['attributes']['title'];
        return $title;
    }
    function logo($num){
        $data=$this->fetch('https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services');
        $logo = $data['data'][$num]['relationships']['field_service_icon']['links']['related']['href'];
        $logo1 = $this->fetch($logo);
        $num_logo=[];
        for($i=0; $i<count($logo1['data']); $i++) {
            $logo2 = $logo1['data'][$i]['relationships']['field_media_image']['links']['related']['href'];
            $logo3 = $this->fetch($logo2);
            $num_logo[$i] = $logo3['data']['attributes']['uri']['url'];
        }
    
        $img_logo='';
        foreach($num_logo as $n_l){
            $img_logo.="<div class='icon-img'><img src='https://ir-dev-d9.innoraft-sites.com.$n_l'></div>";
        }
        return $img_logo;
    }
    function content($num){
        $data=$this->fetch('https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services');
        $content=$data['data'][$num]['attributes']['field_services']['processed'];
        return $content;
    }

    function LHS($num){
        $title=$this->Title($num);
        $image='https://ir-dev-d9.innoraft-sites.com'.$this->Image($num);
        $content=$this->content($num);
        $logo=$this->logo($num);
        echo "
            <div class='flexbox'>
                <div class='main-content'>
                    <div class='title'>
                        <h2>$title</h2>
                    </div>
                    <div class='flexbox logo'>
                        $logo
                    </div>
                    <div class='content'>
                        $content
                    </div>
                </div>
                <div class='mainimg'>
                    <img src=$image>
                </div>
            </div>
        ";
    }

    function RHS($num){
        $title=$this->Title($num);
        $image='https://ir-dev-d9.innoraft-sites.com'.$this->Image($num);
        $content=$this->content($num);
        $logo=$this->logo($num);
        echo "
            <div class='flexbox'>
                <div class='mainimg'>
                    <img src=$image>
                </div>
                <div class='main-content'>
                    <div class='title'>
                        <h2>$title</h2>
                    </div>
                    <div class='flexbox logo'> $logo
                    </div>
                    <div class='content'> $content
                    </div>
                </div>
            </div>
        ";
    
    }
    
    }
?>