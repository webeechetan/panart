<?php
 
$data = array(
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'phone' => '1234567890'
);
 
$json = json_encode($data);
$url = 'https://www.tangence.in/panartglobal/post_api.php';
$ch = curl_init($url);
 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json)
));
 
$response = curl_exec($ch);
if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo $response;
}
curl_close($ch);
 
?>