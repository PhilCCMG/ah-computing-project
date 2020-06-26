<?php
/**
 * Class Installer
 * The installer of the system, creating the tables required for the project to operate.
 */
class Installer
{
    /**
     * @var PDO The database connection to install the system on
     */
    private $database;

    /**
     * Installer constructor.
     * @param $database PDO The database object
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;

        $this->createUsersTable();
    }

    /**
     * Get Database
     * A getter for the database object.
     * @return PDO The database object
     */
    protected function getDatabase() {
        return $this->database;
    }

    /**
     * Install the users table.
     * @return void
     */
    public function createUsersTable()
    {
        $this
            ->getDatabase()
            ->prepare("
                CREATE TABLE `users` (
                	`id` INT NOT NULL AUTO_INCREMENT,
                	`username` TEXT,
                	`email` TEXT,
                	`password` LONGTEXT,
                	PRIMARY KEY (`id`)
                );
            ")
            ->execute();
    }
}
