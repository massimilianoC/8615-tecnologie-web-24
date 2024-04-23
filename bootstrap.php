<?php
session_start();
define("UPLOAD_DIR", "./upload/");
require_once("utils/functions.php");
require_once("db/repository.php");
$dbh = new DatabaseHelper("localhost", "root", "", "tecnologieweb2024", 3306);
