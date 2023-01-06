<?php
include('../include/dbconn.php');
include('../include/users.php');

$users = new User($pdo);

if (!isset($_SESSION['logged_in'])) {
    header("Refresh:1; url=../?p=home", true, 303);
} else {
    include('../include/admincontrol.php');
    $admincontrol = new AdminControl($pdo);

    $getuserid = $_SESSION['uid'] ?? 0;


    $isadmin = $users->IsUserAdmin($getuserid);
    $adminname = $users->getLoggedInUser($getuserid);
    if ($isadmin != 10) {
        echo 'What are you doing here';
        header("Refresh:1; url=../?p=home", true, 303);
    } else {
        ?>



        <!doctype html>

        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Beru CMS Admin Panel</title>
            <meta name="description" content="">
            <meta name="author" content="Bernard">
            <link rel="stylesheet" href="../style/default.css?v=1.0">

        </head>

        <body>

            <div id="page-wrapper">

                <div id="admin-panel">
                    <div id="admin-panel-menu">
                        <p class="admin-panel-user">Welcome <b>
                                <?php echo $adminname; ?>
                            </b></p> <!-- replace a with php get current user -->

                        <ul>
                            <li><a href="?=userpanel">User Control</a></li>

                            <li><a href="?p=pagepanel">Page Control</a></li>

                            <li><a href="?p=theme">Theme</a></li>


                            <li><a href="../?p=home">Logout</a></li>
                        </ul>

                    </div>

                    <div id="admin-panel-content">
                        <!-- current control content -->

                        <?php
                        $page;
                        if (isset($_GET['p'])) {
                            $page = $_GET['p'];
                            include('pages//' . $page . '.php');
                        } else {
                            include('pages/userpanel.php');
                        }


                        ?>
                    </div>
                </div>

            </div>
            <script src="js/scripts.js"></script>
        </body>

        </html>

        <?php
    }
}
?>