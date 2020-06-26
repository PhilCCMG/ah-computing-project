<?php

/**
 * Class HTMLHelper
 * A collection of tools to make consistent HTML elements across the site.
 */
class HTMLHelper
{
    /**
     * @param $text string The text to be displayed
     * @return string The error
     */
    public static function inlineError($text)
    {
        return "<span class='inline-error'>$text</span>";
    }
}
