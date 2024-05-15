<?php
require_once 'bootstrap.php';

var_dump($_POST);

if(isset($_POST["fkFollower"]) && isset($_POST["fkFollowed"])){
    $doUpdate = 0;
    $followed = $dbh->getAllFollowed($_POST['fkFollower']);
    foreach ($followed as $user) {  
        if($user['idUSER']==intval($_POST['fkFollowed'])){
            $doUpdate = 1;
        }
    }
    if($doUpdate == 1){
        //UPDATE
        $dbh->updateFollower(intval($_POST["doFollow"]),$_POST['fkFollower'],$_POST['fkFollowed']);
    }else{
        //INSERT
        $iid = $dbh->insertFollower($_POST['fkFollower'],$_POST['fkFollowed']);
        if($_POST["doFollow"]==1){
            $dbh->insertNotification($_POST['fkFollowed'],0,$iid);
        }
    }
}

echo $_POST;

