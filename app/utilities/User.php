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
     * User constructor.
     * @param $username
     * @param $email
     */
    public function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
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
            return new self($user["username"], $user["email"]);
        }
        return null;
    }
}