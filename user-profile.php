<?php
require_once 'bootstrap.php';

    if(isset($_GET["iduser"])) {
        $idUser= $_GET["iduser"];
        $selectedUser = $dbh->getUserByUserId($idUser);

        $template_data["userProfile"] = $selectedUser;
        $template_data["posts"] = $dbh->getPostsByUserId($idUser);
        $template_data["following"] = $dbh->getActiveFollowedByUserId($selectedUser["idUSER"] );
        $template_data["followers"] = $dbh->getActiveFollowersByUserId($selectedUser["idUSER"] );
        $template_data["titolo"] = "Profilo ".$selectedUser["nome"].' '.$selectedUser["cognome"];
        $template_data["nome"] = "user-profile-page.php";
    }

    require 'template/base-layout.php';