<?php


class Config
{
    /**
     * Get the application configuration
     * @return array
     */
    public static function get() {
        if(!isset($_SERVER["APPLICATION_CONFIG"]))
            die("Failed to load application config (not found server)");

        return $_SERVER["APPLICATION_CONFIG"];
    }
}