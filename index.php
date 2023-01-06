<?php
include('include/dbconn.php');
include('include/users.php');

$users = new User($pdo);

?>

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Augustinus Service</title>
  <meta name="description" content="">
  <meta name="author" content="Bernard">

  <meta property="og:title" content="Augustinus Service">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:description" content="">


  <link rel="stylesheet" href="style/default.css?v=1.0">

</head>

<body>

  <div id="page-wrapper">
    <header>
      <div id="brand">
        <h3>Augustinus Service</h3>
        <sub>IT Support & Solutions</sub>
      </div>
      <nav>
        <ul>
          <li><a href="?p=home">Home</a></li>
          <li><a href="?p=about">About</a></li>

          <li><a href="?p=contact">Contact</a></li>
          <?php if (isset($_SESSION['logged_in'])) {
            $isadmin = $users->IsUserAdmin($_SESSION['uid']);
            if ($isadmin == 10) {
              echo '<li><a href="cms/">Admin Control</a></li>';
            }

            echo '<li><a href="?p=logout">Logout</a></li>';

          } else {
            echo '<li><a href="?p=login">Login</a></li>';
          } ?>
        </ul>
      </nav>
    </header>

    <div id="page-content">
      <?php

      $page;
      if (isset($_GET['p'])) {
        $page = $_GET['p'];
        include('pages/' . $page . '.php');
      } else {
        include('pages/home.php');
      }


      ?>

    </div>
    <footer>
      <p>&copy; Augustinus Service 2023</p>
    </footer>
  </div>

  <script src="js/scripts.js"></script>
</body>

</html>