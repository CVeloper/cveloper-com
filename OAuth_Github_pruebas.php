<?php

session_start();

// $code = $_GET['code'];
// echo $code;

$code = '0a6acb212b8a9a2e2306';
$url = 'https://github.com/login/oauth/access_token';
$client_id = 'd1185af6f2a5f52efde1';
$client_secret = '6beb04ad0f3804b14d0b7a28896e6429c57ec18d';

$postdata = http_build_query(
    array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $code
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context = stream_context_create($opts);
$result = file_get_contents($url, false, $context);
echo $result;
$json_url = 'https://api.github.com/user?'.$result;
$options  = array('http' => array('user_agent'=> $_SERVER['HTTP_USER_AGENT']));
$context  = stream_context_create($options);
$response = file_get_contents($json_url, false, $context);
$response = json_decode($response);

print_r($response);
print_r($response->login);
print_r('<img border = "10px" src="'.$response->avatar_url.'"><br>');
echo "Hello<br>";
print_r($response->name);

$_SESSION['name'] = $response->name;
$_SESSION['imgURL'] = $response->avatar_url;
$_SESSION['username'] = $response->login;
$_SESSION['logged_in'] = '1';

//Enable the following to redirect to another page
// header('location:chat.php');

?>