<?php
/**
 * This file serves to output all meta tags, and CSS external stylesheets on the page.
 * It is in a seperate file to avoid clutter and allow ease of addition.
 */

// Automatically scan the UI folder in the static content, inserting a <link> tag for each
// stylesheet.
$stylesheets = $_SERVER["DOCUMENT_ROOT"] . "/static/ui/*.css";
foreach (glob($stylesheets) as $stylesheet) {
    $stylesheet = substr($stylesheet, strlen(getcwd()));
    echo "<link rel='stylesheet' href='$stylesheet'>";
}
