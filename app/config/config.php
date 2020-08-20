<?php
/**
 * This is the example configuration file. Before the application is functional, this file must be copied into
 * 'config.php', with any required values to change. The reason for this is to prevent any hard-coded passwords
 * being added to the Git source control, as that would ultimately pose a security risk if this application was
 * to be used in a production environment.
 *
 * Replace any string, integer or boolean values, however, changing a key name in the settings array may pose
 * a risk of breaking the application.
 */

$_SERVER["APPLICATION_CONFIG"] = [
    "database" => [
        "username" => "root",
        "password" => "",
        "port" => 3306,
        "database" => "social_network"
    ],
    "features_enabled" => [
        "account_creation" => true,
        "wall" => true,
        "login" => true
    ]
];
