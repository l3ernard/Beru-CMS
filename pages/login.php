<?php

if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);


    echo $users->UserLogin($username, $password);

} else {



    ?>

    <form action="" method="POST">
        <input type="text" name="username" />
        <input type="password" name="password" />

        <input type="submit" name="submit" value="Login">
    </form>

    <?php
}
?>