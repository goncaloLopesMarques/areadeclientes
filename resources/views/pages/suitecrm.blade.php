<?php

$ch = curl_init();
$header = array(
    'Content-type: application/vnd.api+json',
    'Accept: application/vnd.api+json',
 );
$postStr = json_encode(array(
    'grant_type' => 'password',
    'client_id' => '6cc55646-6679-e4a0-7d07-5ae6eeeae8bd',
    'client_secret' => 'cliente1',
    'username' => 'user',
    'password' => 'user DigitalInput1',
    'scope' => 'standard:create standard:read standard:update standard:delete standard:delete standard:relationship:create standard:relationship:read standard:relationship:update standard:relationship:delete'
));


$url = 'https://www.crmcheeruptravelgroup.com/api/oauth/access_token';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $postStr);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$output = curl_exec($ch);

var_dump($output);
?>