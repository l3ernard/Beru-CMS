<?php

session_start();

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
        $loggedinusername = $this->conn->query("SELECT username FROM users WHERE id=$sessionID")->fetch();
        return $loggedinusername['username'];
    }

    public function UserLogin($user, $pass)
    {
        $sql = "SELECT id FROM users WHERE username=:user AND password=:pass";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['user' => $user, 'pass' => $pass]);
        $loginUser = $statement->fetch();

        if (!$loginUser) {
            return 'Login Information Incorrect!';
        } else {
            session_regenerate_id(true);
            $_SESSION['logged_in'] = true;
            $_SESSION['uid'] = $loginUser['id'];
            return 'Login Success!';
        }
    }


    public function UserLogout()
    {
        $_SESSION = [];

        session_destroy();

        return 'User logged out.';
    }


    public function IsUserAdmin($uid)
    {
        $sql = "SELECT userlevel FROM users WHERE id=:uid";
        $statement = $this->conn->prepare($sql);
        $statement->execute(['uid' => $uid]);
        $userlevel = $statement->fetch();

        return $userlevel['userlevel'];
    }



}
?>