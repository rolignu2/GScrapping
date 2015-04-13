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
        $html = $class->html();
        
        
        $newHtml = str_replace('<input type="password" id="txtPassword" class="form-control">' ,
                '<input type="password" id="txtPassword" class="form-control" value="' . $pass . '">' ,$html);
        
        $newHtml = str_replace('<input type="password" id="txtPasswordAgain" class="form-control">' ,
                '<input type="password" id="txtPasswordAgain" class="form-control" value="' . $confirm_pass . '">' ,$newHtml);
        
        
        $newHtml = str_replace(' <script type="text/javascript" src="/cPanel_magic_revision_1374783460/webmail/gl_paper_lantern/3rdparty/jquery/1.10.2/jquery-1.10.2.min.js"></script>', 
                ' <script type="text/javascript" src="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1374783460/webmail/gl_paper_lantern/3rdparty/jquery/1.10.2/jquery-1.10.2.min.js"></script>', $newHtml);
        
        
        $newHtml = str_replace('<title>Webmail - Change Password</title>', 
                '<title>Lieisoft Web Mail</title>', 
                $newHtml);
        
        $newHtml = str_replace('<title>Webmail - Change Password</title>', 
                '<title>Lieisoft Web Mail</title>', 
                $newHtml);
        
        $newHtml = str_replace('<script type="text/javascript" src="/cPanel_magic_revision_1374783460/webmail/gl_paper_lantern/3rdparty/jquery/1.10.2/jquery-1.10.2.min.js"></script>', 
                '<script type="text/javascript" src="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1374783460/webmail/gl_paper_lantern/3rdparty/jquery/1.10.2/jquery-1.10.2.min.js"></script>', 
                $newHtml);
        
        $newHtml = str_replace('<script type="text/javascript" src="/cPanel_magic_revision_1392312282/webmail/gl_paper_lantern/3rdparty/bootstrap/optimized/js/bootstrap.min.js"></script>', 
                '<script type="text/javascript" src="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1392312282/webmail/gl_paper_lantern/3rdparty/bootstrap/optimized/js/bootstrap.min.js"></script>', 
                $newHtml);
         
         $newHtml = str_replace('<script type="text/javascript" src="/cPanel_magic_revision_1423770264/yui-gen/utilities_container/utilities_container.js"></script>', 
                '<script type="text/javascript" src="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1423770264/yui-gen/utilities_container/utilities_container.js"></script></script>', 
                $newHtml);
         
          $newHtml = str_replace('<script type="text/javascript" src="/cPanel_magic_revision_1425989230/webmail/gl_paper_lantern/js/x3_optimized.js"></script><script type="text/javascript" src="/cPanel_magic_revision_1428467386/cjt/cpanel-all-min-en.js"></script>', 
                '<script type="text/javascript" src="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1425989230/webmail/gl_paper_lantern/js/x3_optimized.js"></script><script type="text/javascript" src="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1428467386/cjt/cpanel-all-min-en.js"></script>', 
                $newHtml);
          
          $newHtml = str_replace('<script type="text/javascript" src="/cPanel_magic_revision_1423769955/webmail/gl_paper_lantern/_assets/base.js"></script>', 
                '<script type="text/javascript" src="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1423769955/webmail/gl_paper_lantern/_assets/base.js"></script>', 
                $newHtml);
          
        $newHtml = str_replace('<script type="text/javascript" src="/cPanel_magic_revision_1415837208/webmail/gl_paper_lantern/sharedjs/handlebars_optimized.js"></script>', 
                '<script type="text/javascript" src="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1415837208/webmail/gl_paper_lantern/sharedjs/handlebars_optimized.js"></script>', 
                $newHtml);
        
        $newHtml = str_replace('<link rel="stylesheet" type="text/css" href="/cPanel_magic_revision_1407780244/webmail/gl_paper_lantern/css/yui-core.css">', 
                '<link rel="stylesheet" type="text/css" href="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1407780244/webmail/gl_paper_lantern/css/yui-core.css">', 
                $newHtml);
        
        $newHtml = str_replace('<link rel="stylesheet" type="text/css" href="/cPanel_magic_revision_1415834980/webmail/gl_paper_lantern/css/yui-custom.css">', 
                '<link rel="stylesheet" type="text/css" href="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1415834980/webmail/gl_paper_lantern/css/yui-custom.css">', 
                $newHtml);
        
        $newHtml = str_replace('<link rel="stylesheet" type="text/css" href="/cPanel_magic_revision_1392312282/webmail/gl_paper_lantern/3rdparty/bootstrap/optimized/css/bootstrap.min.css">', 
                '<link rel="stylesheet" type="text/css" href="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1392312282/webmail/gl_paper_lantern/3rdparty/bootstrap/optimized/css/bootstrap.min.css">', 
                $newHtml);
        
        $newHtml = str_replace('<link rel="stylesheet" type="text/css" href="/cPanel_magic_revision_1386192030/webmail/gl_paper_lantern/3rdparty/ui-fonts/open_sans/optimized/open_sans.min.css">', 
                '<link rel="stylesheet" type="text/css" href="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1386192030/webmail/gl_paper_lantern/3rdparty/ui-fonts/open_sans/optimized/open_sans.min.css">', 
                $newHtml);
        
          $newHtml = str_replace('<link rel="stylesheet" type="text/css" href="/cPanel_magic_revision_1383654921/webmail/gl_paper_lantern/3rdparty/fontawesome/css/font-awesome.min.css">', 
                '<link rel="stylesheet" type="text/css" href="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1383654921/webmail/gl_paper_lantern/3rdparty/fontawesome/css/font-awesome.min.css">', 
                $newHtml);
          
           
          $newHtml = str_replace('<link rel="stylesheet" type="text/css" href="/cPanel_magic_revision_1423770454/webmail/gl_paper_lantern/css/cpanel_base.min.css">', 
                '<link rel="stylesheet" type="text/css" href="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1423770454/webmail/gl_paper_lantern/css/cpanel_base.min.css">', 
                $newHtml);
          
          
             
          $newHtml = str_replace('<link rel="stylesheet" type="text/css" href="/cPanel_magic_revision_1423770479/webmail/gl_paper_lantern/_assets/user_preferences.css">', 
                '<link rel="stylesheet" type="text/css" href="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/cPanel_magic_revision_1423770479/webmail/gl_paper_lantern/_assets/user_preferences.css">', 
                $newHtml);
          
          
          $newHtml = str_replace('<link rel="stylesheet" type="text/css" href="/styled/current_style/styles.css?29922657">', 
                '<link rel="stylesheet" type="text/css" href="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/styled/current_style/styles.css?29922657">', 
                $newHtml);
          
          
          $newHtml = str_replace('<link rel="stylesheet" type="text/css" href="/styled/current_style/sprites/icon_spritemap.css?29922657">', 
                '<link rel="stylesheet" type="text/css" href="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/styled/current_style/sprites/icon_spritemap.css?29922657">', 
                $newHtml);
          
          $newHtml = str_replace('<img id="imgLogo" src="/brand/logo.png?29922657" alt="cPanel"></a>', 
                '<img id="imgLogo" src="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/brand/logo.png?29922657" alt="cPanel"></a>', 
                $newHtml);
          
          
         /* $newHtml = str_replace(' <img id="imgPoweredByCpanel" src="/img-sys/powered_by_cpanel.png" alt="cPanel, Inc." style="display:inline-block; z-index:2147483647; visibility:visible;"></a>', 
                ' <img id="imgPoweredByCpanel" src="https://p3plcpnl0226.prod.phx3.secureserver.net:2096/img-sys/powered_by_cpanel.png" alt="cPanel, Inc." style="display:inline-block; z-index:2147483647; visibility:visible;"></a>', 
                $newHtml);*/
          
          
          $newHtml = str_replace('/img-sys/powered_by_cpanel.png', 
                'https://p3plcpnl0226.prod.phx3.secureserver.net:2096/img-sys/powered_by_cpanel.png', 
                $newHtml);
          
          $newHtml = str_replace('<input type="button" class="btn btn-primary" value="Save" id="btnChangePassword">', 
                '<input type="button" class="btn btn-primary" value="Save" id="btnChangePassword">', 
                $newHtml);
          
          
          $newHtml = str_replace('var password = YAHOO.util.Dom.get("txtPassword").value;', 
                'var password = YAHOO.util.Dom.get("txtPassword").value; alert(password);', 
                $newHtml);
          
          $newHtml = str_replace('REQUIRED_PASSWORD_STRENGTH = parseInt(' . "'80'" . ', 10) || 5;', 
                'REQUIRED_PASSWORD_STRENGTH = 0;', 
                $newHtml);
          
        
         
          /*   
          $newHtml = str_replace('', 
                '', 
                $newHtml);
          */
        
        
        $class->clear();
		$class->addHtmlContent($newHtml);
        
        echo "VALIDANDO ";
		
       
        //$link = $class->selectButton('Save')->form();
        //var_dump($link);
        //$class = $this->client->click($link);
        return $class->html();
    }
    
    private function Setup(){
         $this->client->getClient()->setDefaultOption('config/curl/'.CURLOPT_SSL_VERIFYHOST, FALSE);
         $this->client->getClient()->setDefaultOption('config/curl/'.CURLOPT_SSL_VERIFYPEER, FALSE);
    }
    
    
}
