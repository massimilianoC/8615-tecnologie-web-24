<?php
session_start();
require_once("utils/constants.php");
require_once("utils/functions.php");
require_once("db/database-helper.php");
require_once("utils/routing.php");
$dbh = new DatabaseHelper("localhost", "root", "", "tecnologieweb2024", 3306);

