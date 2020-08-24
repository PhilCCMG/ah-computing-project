<?php
require_once "Installer.php";
require_once "Config.php";

class Database {
    /**
     * @var Database The database instance.
     */
    public static $instance;

    public function __construct()
    {
        self::$instance = $this;

        $databaseConfig = Config::get()["database"];

        $this->database = new PDO(
            sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4", $databaseConfig["hostname"], $databaseConfig["database"]),
            $databaseConfig["username"],
            $databaseConfig["password"]
        );

        if ($this->database->connect_error) {
            die("A database error occured. The error is: "
                . $this->getDatabase()->connect_error);
        } else {
            $this->checkForInstallation();
        }
    }

    /**
     * Get the instance of the database.
     * @return Database The database instance
     */
    public static function getInstance()
    {
        return self::$instance;
    }

    /**
     * Check to see if the website is installed (is the database initialised)
     * @return void
     */
    private function checkForInstallation()
    {
        if(!$this->hasTable('users')) {
            // Install system
            new Installer($this->getDatabase());
        }
    }

    /**
     * Does a table in the database have a row in a column?
     * @param string $table The table name
     * @param string $column The column name
     * @param string $row The row value
     * @return bool If the row exists in the table/column.
     */
    public function hasValue(String $table, String $column, String $row) {

        $query = $this
            ->getDatabase()
            ->prepare("SELECT :column FROM :table WHERE `:column`=':row' LIMIT 1");
        $query->bindParam(":table", $table);
        $query->bindParam(":column", $column);
        $query->bindParam(":row", $row);
        $query->execute();

        // If there is one row (as the limit is defined as one), then there is a row in the database by the name.
        return
            $query->rowCount() == 1;
    }

    /**
     * Get the database object.
     * @return PDO
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * Close the database connection.
     * @return void
     */
    public function closeDatabase()
    {
        // Nullifying the database object will disconnect the PDO session.
        $this->database = null;
    }

    /**
     * Does a table exist on the database?
     * @param $tableName String The table name
     */
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
