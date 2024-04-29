<?php
require_once 'bootstrap.php';

if(isset($_POST["text"]) && isset($_POST["media"]) && isset($_POST["idUSER"]) && isset($_POST["isComment"]) && isset($_POST["fkParent"])){
    $text = $_POST['text'];
    $isComment = $_POST['isComment'];
    $media = $_POST['media'];
    $idUSER = $_POST['idUSER'];
    $fkParent = $_POST['fkParent'];
//UPLOAD IMAGE
    $imageName = basename($image["name"]);
    $path = UPLOAD_DIR ."/".date("y/m/d")."/".$idUSER."/";
    $fullPath = $path.$imageName;
    $result = uploadImage($path, $media);
    var_dump($result);
//SAVE to DB
    $dbh->insertPost($fullPath,$text,$isComment,$fkParent,$idUSER);
}

//header('Location: index.php');
//require 'template/layout.php';