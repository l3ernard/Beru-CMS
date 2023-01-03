<?php

class User
{
    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $pdo)
    {
        $this->conn = $pdo;
    }

    /* List all users */
    public function getUsers()
    {
        return $this->conn->query("SELECT username FROM users")->fetchAll();
    }

    public function getLoggedInUser($sessionID)
    {

        return $this->conn->query("SELECT username FROM users WHERE id=$sessionID")->fetch();
    }

    public function UserLogin($user, $pass)
    {
        $sql = "SELECT id FROM users WHERE username=:user AND password=:pass";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['user' => $user, 'pass' => $pass]);
        $loginUser = $statement->fetch();

        if (!$loginUser) {
            return 'usernotfound';
        } else {
            return 'Login Success';
        }
    }
}
?>