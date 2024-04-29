<?php
require_once 'bootstrap.php';
var_dump($_POST);

if(isset($_POST["text"]) && isset($_POST["idUSER"]) && isset($_POST["isComment"]) && isset($_POST["fkParent"])){
    $text = $_POST['text'];
    $isComment = $_POST['isComment'];
    $idUSER = $_POST['idUSER'];
    $fkParent = $_POST['fkParent'];
    $fullPath = "";
    //UPLOAD IMAGE
    if(isset($_FILES['media']))
    {
        $media = $_FILES['media'];
        $imageName = basename($media["name"]);
        $path = UPLOAD_DIR ."/".date("y/m/d")."/".$idUSER."/";
        $fullPath = $path.$imageName;
        $result = uploadImage($path, $media);
        var_dump($result);
    } 
//SAVE to DB
    $dbh->insertPost($fullPath,$text,$isComment,$fkParent,$idUSER);
}

//header('Location: index.php');
//require 'template/layout.php';