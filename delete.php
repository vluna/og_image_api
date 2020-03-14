<?php 
// Error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Try to delete the image, throw exception if it fails
try {
    deleteImage();
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}

/**
 * Validates the parameter url for vlid urls
 *
 * @return error If image is not there throw exception.
 */ 
function deleteImage() {
	if(checkMissingParameters()) {
		$file = 'images/'.$_GET['image_name']; // Image name
	  if(is_file($file)) {
	    unlink($file);
	    echo json_encode(['statusCode' => 200, 'statusMessage' => "Image ".$_GET['image_name']." has been deleted."]);
	  } else {
	  	throw new Exception("Image has been removed or cannot be found in the server.");
	  }
	} else {
		echo json_encode(['statusCode' => 400, 'statusMessage' => "Something went wrong."]);
	}
}

/**
 * Validates the parameters url
 *
 * @return error If image_name or url parameter is missing throw exception.
 */ 
function checkMissingParameters() {
	if(!isset($_GET['image_name'])) {
		throw new Exception("Missing parameter: [image_name]");
	}

	return true;
}
?>