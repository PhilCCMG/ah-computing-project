<?php
require_once "app/utilities/page.php";
$page = new Page("Log Out");
session_destroy();
header('Location: /'); // redirect to homepage
$page->endPage(false);