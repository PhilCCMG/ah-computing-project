<?php
/**
 * This is a pure-HTML template that is the beginning of each page on the social network.
 */
?>
<html>
<head>
    <title>
        <?php
        if(isset($_PAGE["title"])) {
            echo $_PAGE["title"] . " | ";
        }
        ?>
        Social Media Website
    </title>
    <?php
        include_once $_SERVER["DOCUMENT_ROOT"] . "/app/molecules/header/meta-links.php";
    ?>
</head>
<body>
