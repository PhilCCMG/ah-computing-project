<?php
/**
 * This is the main page controller, which has all utilities for each page on it, along with
 * useful functions, controllers and classes.
 */
require_once "HTMLHelper.php";

class Page {
    /**
     * @var Database The database connection
     */
    private $database;

    public function __construct($title = null)
    {
        // Requirements
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/utilities/database.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/utilities/settings.php";

        // Instantiate Controllers
        $_PAGE = [];
        $this->database = new Database();

        // Set params
        if(!is_null($title)) {
            PageSettings::setTitle($title);
        }

        // Start the session
        session_start();
    }

    public function getDatabase()
    {
        return $this->database;
    }

    public function renderHeader()
    {
        // Include HTML templates
        include_once $_SERVER["DOCUMENT_ROOT"] . "/app/display/header.php";
    }

    public function endPage($showFooter)
    {
        if (!is_null($this->getDatabase()))
            $this->getDatabase()->closeDatabase();
        if($showFooter)
            include_once "app/display/footer.php";
    }
}
