<?php
class PageSettings {
    public static function setTitle($title)
    {
        $_SERVER["page"]["title"] = $title;
    }
}
