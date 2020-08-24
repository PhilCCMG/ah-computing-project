<?php
include_once "app/utilities/User.php";
include_once "app/utilities/page.php";
$page = new Page("Debug");

die('User: ' . $_SESSION['user']);