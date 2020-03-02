<?php 
// show error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

$files = glob('images/*');
foreach($files as $file){
  if(is_file($file))
    unlink($file);
}
?>