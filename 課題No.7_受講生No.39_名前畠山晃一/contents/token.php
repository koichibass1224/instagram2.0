<?php
header('Access-Control-Allow-Origin: ' . $_SERVER['SERVER_NAME']);

// Replace with your own subscription key and service region (e.g., "westus").
//$subscriptionKey = 'YourSubscriptionKey';
//$region = 'YourServiceRegion';
//キーはコメントで送付。
$subscriptionKey = 'xxxxxxxxxxxxxxxxxxxxxxxx';
$region = 'japaneast';

$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, 'https://' . $region . '.api.cognitive.microsoft.com/sts/v1.0/issueToken');
curl_setopt($ch, CURLOPT_URL, 'https://japaneast.stt.speech.microsoft.com/speech/recognition/conversation/cognitiveservices/v1' . $region . '.api.cognitive.microsoft.com/sts/v1.0/issueToken');
//読み上げ
//curl_setopt($ch, CURLOPT_URL, 'https://japaneast.tts.speech.microsoft.com/cognitiveservices/v1' . $region . '.api.cognitive.microsoft.com/sts/v1.0/issueToken');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{}');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Ocp-Apim-Subscription-Key: ' . $subscriptionKey));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
echo curl_exec($ch);
?>