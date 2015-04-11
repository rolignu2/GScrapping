<?php

use Goutte\Client;

class CpanelController  {
    
    var $client;
    
    var $auth;
    
    var $crawler;
    
    var $form;
    
    var $url = "https://p3plcpnl0226.prod.phx3.secureserver.net:2096/login/";
 
    var $method = "POST";
    
    
    public function __construct() {
        $this->client = new Client();
    }


    public function ConectToCpanel($user , $password){
        
        $this->auth = array(
            "user" =>$user,
            "pass"=>"$password",
        );
        
        $this->Setup();
        $this->crawler = $this->client->request($this->method, $this->url);
        $this->form = $this->crawler->selectButton('Log In')->form();
        $this->crawler = $this->client->submit($this->form, $this->auth);
        
        return $this->crawler;
 
    }
    
    public function ChangePasswordCpanel($class , $pass , $confirm_pass ){
        $link =  $class->selectLink("Change Password")->link();
        $class = $this->client->click($link);
        return $class->html();
    }
    
    private function Setup(){
         $this->client->getClient()->setDefaultOption('config/curl/'.CURLOPT_SSL_VERIFYHOST, FALSE);
         $this->client->getClient()->setDefaultOption('config/curl/'.CURLOPT_SSL_VERIFYPEER, FALSE);
    }
    
    
}
