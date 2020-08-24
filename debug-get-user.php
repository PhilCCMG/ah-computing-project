<?php
include_once "app/utilities/User.php";
die(print_r(User::get($_GET["username"])));