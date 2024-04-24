<?php
session_start();
define("UPLOAD_DIR", "./uploads/");
require_once("utils/functions.php");
require_once("db/database-helper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "tecnologieweb2024", 3306);
