<?php
require_once 'bootstrap.php';
if(isset($_POST["text"]) && isset($_POST["idUSER"]) && isset($_POST["isComment"]) && isset($_POST["fkParent"])){
    $text = $_POST['text'];
    $isComment = $_POST['isComment'];
    $idUSER = $_POST['idUSER'];
    $fkParent = $_POST['fkParent'];
    $fullPath = "";
    //UPLOAD IMAGE
    if(isset($_FILES['media']) && basename($_FILES['media']["name"])!="")
    {
        $media = $_FILES['media'];
        $imageName = basename($media["name"]);
        var_dump($imageName);
        $path = date("Y/m/d")."/".$idUSER."/";
        $fullPath = $path.$imageName;
        $result = uploadImage($path, $media);
        var_dump($result);
    } 
//SAVE to DB
    $_SESSION['dbh']->insertPost($fullPath,$text,$isComment,$fkParent,$idUSER);
}

header('Location: index.php');