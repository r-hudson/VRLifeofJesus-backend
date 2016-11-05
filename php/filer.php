<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
define("UPLOAD_DIR", "/var/www/html/upload/");
 
if (!empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];
 
    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }
 
    // ensure a safe filename
    #$name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
	$name = "dat.csv";
    #// don't overwrite an existing file
    #$i = 0;
    #$parts = pathinfo($name);
    #while (file_exists(UPLOAD_DIR . $name)) {
     #   $i++;
     #   $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
   # }
 
    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) { 
        echo "<p>Unable to save file.</p>";
        exit;
    }
 
    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $name, 0644);
}
?>
<img src='spin.gif'/>
<script>
window.setInterval("myFunction()",1000);
function myFunction()
{
window.location.assign("importconf.php");
}
</script>
</body>
</html>
