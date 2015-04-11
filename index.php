<?php

require_once __DIR__.'/vendor/autoload.php';
require_once  'CpanelController.php';

$user = "test@educativadistribuidora.com";
$password = "Support2015";

$cpanel = new CpanelController();
$class = $cpanel->ConectToCpanel($user, $password);
echo $cpanel->ChangePasswordCpanel($class, "", "");


//AREA DE PRUEBA ...
/*use Goutte\Client;
 
$client = new Client();

$client->getClient()->setDefaultOption('config/curl/'.CURLOPT_SSL_VERIFYHOST, FALSE);
$client->getClient()->setDefaultOption('config/curl/'.CURLOPT_SSL_VERIFYPEER, FALSE);

$crawler = $client->request('POST', 'https://p3plcpnl0226.prod.phx3.secureserver.net:2096/login/');
 

$form = $crawler->selectButton('Log In')->form();
 
$crawler = $client->submit($form, array(
     "user"=>"test@educativadistribuidora.com",
     "pass"=> "Support2015",
));
 
 $link =  $crawler->selectLink("Change Password")->link();
 var_dump($link);
 $crawler = $client->click($link);
 $crawler->html();*/
