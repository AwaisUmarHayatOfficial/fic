<?php
function getServerURL()
{
$serverName = $_SERVER['SERVER_NAME'];
$filePath = $_SERVER['REQUEST_URI'];
$withInstall = substr($filePath,0,strrpos($filePath,'/')+1);
$serverPath = $serverName.$withInstall;
$applicationPath = $serverPath;
if(strpos($applicationPath,'http://www.')===false)
{
if(strpos($applicationPath,'www.')===false)
$applicationPath = 'www.'.$applicationPath;
if(strpos($applicationPath,'http://')===false)
$applicationPath = 'http://'.$applicationPath;
}
return $applicationPath;
}
$allowedExts = array("gif", "jpeg", "jpg", "png","JPG","JPEG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/JPEG")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts)) {
// Generate new random name.
$name = sha1(microtime()) . "." . $extension;
// Save file in the uploads folder.
move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/images/" . $name);
$response = new StdClass;
//$response->link = "images/" . $name;
$ht = str_replace('http:','',getServerURL());
$ht = str_replace('www.','',$ht);
$response->link = $ht.'images/'. $name;
echo stripslashes(json_encode($response));
}
?>