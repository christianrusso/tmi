<?php
include_once("include/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '1600375700280688'; //Facebook App ID
$appSecret = 'bf6bc4465030945523bc2b381de46401'; // Facebook App Secret
$homeurl = 'http://remerasybuzosjazmin.com.ar';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
?>