<?php
if ($_SESSION['logged_in'] ?? true) {
    echo $users->UserLogout();
} else {
    echo 'User was not logged in';
}
?>