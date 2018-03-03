<?php 


use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require __DIR__.'/../vendor/autoload.php';
// api

$api =new ApiContext(

new OAuthTokenCredential('AWX72jsExe1TXdg-oP5PkVejPus9eBctsqqqcs0jjML49t_O8uGUC29sNoop0iUni6GcLReu6UX32Jyt',
	'EEMJQgwRHxpIRl3XvUjhMSnL9En1IIYPEXTXqMrdCz26EG_9Cyw9ZWb0yZKYDRJdEzEobCwrEoZrLb4x')


);


$api->setConfig([
	'mode'=>'sandbox',
	'http.ConnectionTimeOut'=>400,
	'log.LogEnable'=>false,
	'log.LogLavel'=>'FINE',
	'validation.level'=>'log'

]);




 ?>