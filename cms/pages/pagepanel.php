<?php

$pages = $admincontrol->ShowPages();


?>


<table>
    <tr>
        <td>Page ID</td>
        <td>Page Title</td>
    </tr>

    <?php
    foreach ($pages as $page) {
        echo '<tr><td>' . $page['id'] . '</td><td>' . $page['title'] . '</td></tr>';
    }

    ?>
</table>