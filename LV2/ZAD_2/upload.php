<?php
include_once 'encrypt.php';

$ALLOWED_FILE_TYPES = ['pdf', 'jpg', 'jpeg', 'png'];
$UPLOAD_DIR = './uploads';

$targetFile = $UPLOAD_DIR . '/' . basename($_FILES['txFile']['name']);

// Check request type
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    die('Err. Not POST request.');
}

// Check if file is sent
if(!isset($_FILES['txFile']))
{
    die('Err. No file.');
}

// Check file type
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if(!in_array($fileType, $ALLOWED_FILE_TYPES))
{
    die('File type '. $fileType .' not allowed.');
}

// Check file size
$fileSize = $_FILES['txFile']['size'];
if($fileSize < 1)
{
    die('Err. File size is 0.');
}

// Encrypt and save
encryptFile($_FILES['txFile']['tmp_name'], SECRET_KEY, $targetFile.'.enc');
?>

<html>
<body>
<p>File uploaded.</p>
</body>
</html>



