

<?php

require_once __DIR__ .'/vendor/autoload.php';
require_once  'CpanelController.php';


$user = "support@soft.lieison.com";
$password = "linux90";


$cpanel = new CpanelController();
$class = $cpanel->ConectToCpanel($user, $password);


echo "<html>";
echo $cpanel->ChangePasswordCpanel($class, "linux80", "linux80");
echo "</html>";

