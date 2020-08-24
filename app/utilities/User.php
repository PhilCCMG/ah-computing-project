<?php
require_once 'Database.php';

class User
{
    /**
     * @var $username String The username of the account
     */
    private $username;

    /**
     * @var $email String The email address of the account
     */
    private $email;

    /**
     * @var $id Integer The ID of the user
     */
    private $id;

    /**
     * User constructor.
     * @param $username String
     * @param $email String
     * @param $id Integer
     */
    public function __construct($username, $email, $id) {
        $this->username = $username;
        $this->email = $email;
        $this->id = $id;
    }

    /**
     * Get a user by their username
     * @param $username String the username
     */
    public static function get($username) {
        $database = Database::getInstance();
        if ($database->hasValue(
            "users",
            "username",
            $username
        )) {
            $user = $database->getDatabase()->prepare(
                "SELECT * FROM users WHERE `username`=':user' LIMIT 1"
            );
            $user->bindParam(":user", $username);
            $user = $user->fetch();
            return new self($user["username"], $user["email"], $user["id"]);
        }
        return null;
    }

    /**
     * Getter for the User ID.
     * @return int The User ID
     */
    public function getId() {
        return $this->id;
    }
}