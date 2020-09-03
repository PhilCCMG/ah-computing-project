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
                "SELECT * FROM users WHERE `username`=:user LIMIT 1"
            );
            $user->bindParam(":user", $username);
            $user->execute();
            $user = $user->fetch();
            return new self($user["username"], $user["email"], $user["id"]);
        }
        return null;
    }

    public static function byId(int $id)
    {
        $database = Database::getInstance();
        if ($database->hasValue(
            "users",
            "id",
            $id
        )) {
            $user = $database->getDatabase()->prepare(
                "SELECT * FROM users WHERE `id`=:id LIMIT 1"
            );
            $user->bindParam(":id", $id);
            $user->execute();
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

    /**
     * @return User|null Refresh the User object
     */
    public function refresh()
    {
        $user = User::byId($this->id);
        $_SERVER['page']['user'] = $user;
        return $user;
    }

    /**
     * Validate a password with the database
     * @param String $password the raw password
     * @return bool If the password is valid
     */
    public function validatePassword(String $password) : bool {
        $query = Database::getInstance()->getDatabase()->prepare('SELECT password FROM users WHERE id=:id');
        $id = $this->getId();
        $query->bindParam('id', $id);
        $query->execute();
        $data = $query->fetch();
        return password_verify($password, $data['password']);
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }
}