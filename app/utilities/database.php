<?php

class Database {
    public function __construct()
    {
        $this->database = new PDO(
            "mysql:host=localhost;dbname=advancedhigher;charset=utf8mb4",
            "root",
            ""
        );

        if ($this->database->connect_error) {
            die("A database error occured. The error is: "
                . $this->getDatabase()->connect_error);
        } else {
            $this->checkForInstallation();
        }
    }

    private function checkForInstallation()
    {
        if(!$this->hasTable('users')) {

        }
    }

    /**
     * Get the database object.
     * @return false|mysqli
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * Close the database connection.
     */
    public function closeDatabase()
    {
        // Nullifying the database object will disconnect the PDO session.
        $this->database = null;
    }

    private function hasTable($tableName)
    {
        $query = $this
            ->getDatabase()
            ->prepare("SELECT 1 FROM :table LIMIT 1");
        if(!$query) {
            echo "An error occured trying to create a PDO query. The error(s) are: <ul>";
            foreach($this->getDatabase()->error_list as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            die;
        }
        $query
            ->bindParam(":table", $tableName);
        $query
            ->execute();
    }
}
