<?php
include_once "app/utilities/User.php";
include_once "app/utilities/page.php";
$page = new Page("Debug");

die(print_r(User::get($_GET["username"])));