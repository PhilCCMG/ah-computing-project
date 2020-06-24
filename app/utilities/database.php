<?php

class Database {
    public function __construct()
    {
        $this->database = mysqli_connect(
            "localhost",
            "root",
            "",
            "advancedhigher"
        );

        if (!$this->database) {
            die("A database error occured. The error is: "
                . mysqli_connect_error());
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
        $this->database->close();
    }

    private function hasTable($tableName)
    {
        $query = $this
            ->getDatabase()
            ->prepare("SELECT 1 FROM ? LIMIT 1")
            ->bind_param("s", $tableName)
            ->execute();
    }
}
