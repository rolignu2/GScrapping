<?php

use Goutte\Client;

class CpanelController  {
    
    var $client;
    
    var $auth;
    
    var $crawler;
    
    var $form;
    
    var $url = "https://marmot.arvixe.com:2096/";
 
    var $method = "POST";
    
    var $email = NULL;
    
    public function __construct() {
		
        //$this->url = "https://marmot.arvixe.com:2096/webmail/x3/mail/passwdpop.html?redirectdomain=&email=support&domain=soft.lieison.com";
		
        $this->client = new Client();
    }


    public function ConectToCpanel($user , $password){
        
        $this->auth = array(
				"user" 	=>$user,
				"pass"	=>$password,
        );
        
        $this->email = $user;
        
        $this->Setup();
		
        $this->crawler = $this->client->request($this->method, $this->url);
        $this->form = $this->crawler->selectButton('Log in')->form();
        $this->crawler = $this->client->submit($this->form, $this->auth);
        
        return $this->crawler;
 
    }
    
    public function ChangePasswordCpanel($class , $pass , $confirm_pass ){

            $url = explode("/" , $class->baseHref);
            $url = $url[3];
            $data = explode("@", $this->email);
            $class = $this->client->request($this->method,
                    "https://marmot.arvixe.com:2096/$url/webmail/x3/mail/passwdpop.html?" .
                     "redirectdomain=&email=" . $data[0] . "&domain=" . $data[1]
            );
            $change = array(
                "password" => $pass,
                "password2" => $confirm_pass
            );
            $this->form = $class->selectButton('Change Password')->form();
            $class = $this->client->submit($this->form, $change);
            return $class;
    }
    
    private function Setup(){
	$this->client->getClient()->getConfig()->set('curl.options', array(CURLOPT_SSL_VERIFYHOST => FALSE));
	$this->client->getClient()->getConfig()->set('curl.options', array(CURLOPT_SSL_VERIFYPEER => FALSE));
    }
    
    
}
