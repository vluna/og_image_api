<?php

// Error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Try to create the og image, throw exception if it fails
try {
    getOgImage();
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

/**
 * Validates the parameters url
 *
 * @return json object containing statusCode and statusMessage
 *			statusCode
 * 				200 for success
 *				400 for bad requests
 *			statusMessage: 
 *				200: Url with the og image created
 *				400: Something went wrong
 */ 
function getOgImage() {
	if(checkMissingParameters()) {
		$path = "/usr/bin/wkhtmltoimage"; // Path to wkhtmltoimage in the server
		$url = $_GET['url']; // Url from the OG image
		$output_path = "images/".$_GET['image_name'].".jpg"; // Image name
		$result = shell_exec("$path $url $output_path 2>&1"); // Execute command for creating the image

		echo json_encode(['statusCode' => 200, 'statusMessage' => '[HOST]/images/'.$_GET['image_name'].".jpg"]);
	} else {
		echo json_encode(['statusCode' => 400, 'statusMessage' => "Something went wrong."]);
	}
}

/**
 * Validates the parameter url for vlid urls
 *
 * @param string $url the url parameter to be converted. 
 *
 * @return error If invalid url is pass as parameter throw exception.
 */ 
function validUrl($url) {
	// Use regex to check for different combinations of the url parameter
    if(!preg_match('/(http|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i', $url)){
    	throw new Exception("Inavlid URL [".$url."]");
    }
}

/**
 * Validates the parameters url
 *
 * @return error If image_name or url parameter is missing throw exception.
 */ 
function checkMissingParameters() {
	if(!isset($_GET['url'])) {
		throw new Exception("Missing parameter: [url]");
	} else {
		validUrl($_GET['url']);
	}

	if(!isset($_GET['image_name'])) {
		throw new Exception("Missing parameter: [image_name]");
	}

	return true;
}

?>