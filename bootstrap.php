<?php
session_start();
require_once("db/database-helper.php");
require_once("utils/constants.php");
require_once("utils/functions.php");
require_once("utils/routing.php");
$dbh = new DatabaseHelper(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

