<?php
require "vendor/autoload.php";
$access_token = 'vdDDbMJrLQHhYxmAWhG9czicHhR1dbHi9mJlTrgoyy7LhWNnQEb6IjoM1RqSEh+qayZNJdHDcBmNuISJtEKFED6JZ6ERFiVWNttbTCRfDxoHbDzpprOQsXPbmk55fdofx0L2YcBBOhJ15KT1l5db1AdB04t89/1O/w1cDnyilFU=';
$channelSecret = '98dee475da16a4d11bc11ba9fe6003a3';
$idPush = 'U286e1ac3ff907f8d46ec4a746f768bf6';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($idPush, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
	
