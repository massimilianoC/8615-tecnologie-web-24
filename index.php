<?php
require_once 'bootstrap.php';

//Base Template
$sessionParams["titolo"] = "My Social Network";
$sessionParams["nome"] = "home.php";
$sessionParams["users"] = $dbh->getUsers();
$sessionParams["posts"] = $dbh->getPosts();

require 'template/layout.php';