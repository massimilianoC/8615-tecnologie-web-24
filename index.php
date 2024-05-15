<?php
require_once 'bootstrap.php';
require 'notifications.php';
require("utils/routing.php");
$template_data["js"] = array("https://unpkg.com/axios/dist/axios.min.js");
require 'template/base-layout.php';