<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

// get the document
try {
    $doc = $client->getDoc($id);
} catch (Exception $e) {
    echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
}
// permanently remove the document
try {
    $client->deleteDoc($doc);
} catch (Exception $e) {
    echo "ERROR: ".$e->getMessage()." (".$e->getCode().")<br>\n";
}
//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

