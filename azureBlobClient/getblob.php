<?php
require_once "vendor/autoload.php";

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;

$connectionString = "DefaultEndpointsProtocol=https;AccountName=moranpic;AccountKey=";

// Create blob REST proxy.
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);


try {
   // Get blob.
   $blob = $blobRestProxy->getBlob("img", "sample/9964138_治愈系小精灵.jpg");
   fpassthru($blob->getContentStream());
}
catch(ServiceException $e){
   // Handle exception based on error codes and messages.
   // Error codes and messages are here:
   // http://msdn.microsoft.com/library/azure/dd179439.aspx
   $code = $e->getCode();
   $error_message = $e->getMessage();
   echo $code.": ".$error_message."<br />";
}
?>
