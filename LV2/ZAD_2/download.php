<?php
include_once 'encrypt.php';
$UPLOADS_DIR = './uploads';

$fileName = $_GET['fileName'];
$file = $UPLOADS_DIR.'/'.$fileName;

if(!file_exists($file))
{
    die('Err. File doesnt exist.');
}

$tmpOutput = tmpfile();
$tmpFile = stream_get_meta_data($tmpOutput)['uri'];
decryptFile($file, SECRET_KEY, $tmpFile);
sendFile($tmpFile, $fileName);
fclose($tmpFile);

//$encryptedFileContents = file_get_contents($file);
//$decryptedFileContents = decrypt($encryptedFileContents);

//$tmpFile = tmpfile();
//fwrite($tmpFile, $decryptedFileContents);
//$tmpFilePath = stream_get_meta_data($tmpFile)['uri'];
//sendFile($tmpFilePath, $fileName);
//fclose($tmpFile);

function sendFile($fileToSend, $fileName)
{
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.preg_replace('/(.enc)/', '', $fileName));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fileToSend));
    ob_clean();
    flush();
    readfile($fileToSend);
    exit;
}