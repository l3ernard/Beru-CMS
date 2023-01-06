<?php

class AdminControl
{
    private $conn;

    public function __construct(\PDO $pdo)
    {
        $this->conn = $pdo;
    }

    # Pages Functions Start
    public function ShowPages()
    {
        $pages = $this->conn->query("SELECT * FROM pages")->fetchAll();

        return $pages;
    }

    public function EditPage($pageid, $pagecontent, $pagetitle)
    {


    }


    public function RemovePage($pageid)
    {


    }


    public function AddPage($pageid)
    {


    }

    # Pages Functions End

    # Menu Functions Start
    public function ShowMenu()
    {

    }

    public function AddMenuItem()
    {

    }

    public function EditMenuItem($itemID)
    {

    }
    public function RemoveMenuItem($itemID)
    {

    }

    # Menu Functions End

    # Theme Functions Start
    public function ShowThemes()
    {

    }

    public function EditTheme()
    {

    }

    public function RemoveTheme($themeID)
    {

    }
    public function AddTheme($themeID)
    {

    }
    # Theme Functions End

    # User Functions

    public function ShowUsers()
    {

    }

    public function EditUser()
    {

    }

    public function RemoveUser()
    {

    }


    public function RegisterUser($username, $password, $email)
    {

    }

# End User Functions

}

?>