<?php
//Example API: http://localhost/discordwebhook.php?key=test&user=MultiTool&webhook={webhook}&name={webhookname}&message={webhookmsg}&numberofmessages={webhooknumber}
$APIKeys = array("3A3IFmilU6QWgom");
$usernames = array("Turlx", "MultiTool");
$msg = $_GET['message'];

$activekeys = array();
 
if (!isset($_GET["key"]) ||!isset($_GET["user"]) ||!isset($_GET["webhook"]))
 
        die("You are missing a parameter");
 
$key = $_GET['key'];
$username = $_GET['user'];
$messages = $_GET['numberofmessages'];
$webhookusername = $_GET['name'];
$CONTENT = $_GET['message'];
$AVATAR = $_GET['avatarurl'];


if (!in_array($key, $APIKeys)) die("Invalid API key");
if (!in_array($username, $usernames)) die("Invalid username");
else {
	$x = 1;

	while($x <= $messages) {
		$webhookurl = $_GET['webhook'];
	$url = $webhookurl;

		$ch = curl_init($url);
		//The JSON data.
		$jsonData = array("content"=>"$CONTENT","username"=>"$webhookusername");
		$jsonDataEncoded = json_encode($jsonData);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
		$result = curl_exec($ch);
  		$x++;
	} 
}


?>
