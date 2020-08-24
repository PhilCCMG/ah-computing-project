<?php
/**
 * This is the main page controller, which has all utilities for each page on it, along with
 * useful functions, controllers and classes.
 */
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/config/config.php";
require_once "HTMLHelper.php";

class Page {
    /**
     * @var Database The database connection
     */
    private $database;

    public function __construct($title = null)
    {
        // Requirements
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/utilities/Database.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/utilities/settings.php";

        // Instantiate Controllers
        $_SERVER["page"] = [];
        if($title !== null)
            $_SERVER["page"]["title"] = $title;
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

    public function renderNavbar()
    {
        include_once $_SERVER["DOCUMENT_ROOT"] . "/app/molecules/header/navbar.php";
    }

    public function endPage($showFooter)
    {
        if (!is_null($this->getDatabase()))
            $this->getDatabase()->closeDatabase();
        if($showFooter)
            include_once $_SERVER["DOCUMENT_ROOT"] . "/app/display/footer.php";
    }

    public function getConfig() {
        if(!isset($_SERVER["APPLICATION_CONFIG"]))
            die("Failed to load the application configuration (not generated on server)");
        return $_SERVER["APPLICATION_CONFIG"];
    }
}
