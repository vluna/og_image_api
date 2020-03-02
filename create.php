<?php

// show error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if(validParameters()) {
	$path = "/usr/bin/wkhtmltoimage"; //path to your executable
	$url = $_GET['url'];
	$output_path = "images/".$_GET['image_name'].".jpg";
	$result = shell_exec("$path $url $output_path 2>&1");

	echo json_encode(['statusCode' => 200, 'statusMessage' => '[HOST]/images/'.$_GET['image_name'].".jpg"]);
} else {
	echo json_encode(['statusCode' => 400, 'statusMessage' => "Missing parameters [".missingParameters()."]"]);
}

function validParameters() {
	return isset($_GET['url']) && isset($_GET['image_name']);
}

function missingParameters() {
	$params = [];
	if(!isset($_GET['url'])) {
		array_push($params, 'url');
	}

	if(!isset($_GET['image_name'])) {
		array_push($params, 'image_name');
	}

	return implode(", ", $params);
}

?>