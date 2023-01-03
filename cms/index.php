<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Beru CMS Admin Panel</title>
  <meta name="description" content="A simple HTML5 Template for new projects.">
  <meta name="author" content="Bernard Stornebrink">
  <link rel="stylesheet" href="../style/default.css?v=1.0">

</head>

<body>
  
    <div id="page-wrapper">

        <div id="admin-panel">
            <div id="admin-panel-menu">
                <p class="admin-panel-user">Welcome <b>Admin</b></p> <!-- replace a with php get current user -->

                <ul>
                    <li><a href="?=userpanel">User Control</a></li>
                    
                    <li><a href="?p=pagepanel">Page Control</a></li>

                    <li><a href="?p=theme">Theme</a></li>

                    
                    <li><a href="?p=logout">Logout</a></li>
                </ul>
        
            </div>

            <div id="admin-panel-content">
                <!-- current control content -->

                <?php 
                $page;
                if(isset($_GET['p'])){
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
