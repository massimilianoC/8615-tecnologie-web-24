<?php
require_once 'bootstrap.php';

$template_data["users"] = $dbh->getUsers();
$template_data["posts"] = $dbh->getPostsVisibleToUserId($_SESSION['user']['idUSER']);
$template_data["titolo"] = "Home";
$template_data["nome"] = "home-page.php";

