<?php
// This page is requested by the JavaScript lastUpdate(room) function in index.php.
// it accesses the 'last updated' file for us and sends it back to the main page, avoiding a page refresh.

if (isset ( $_GET["room"] )) {
    $rm = strip_tags ($_GET["room"]);

    $theFile = fopen ($rm . ".txt", "r");
    echo fgets($theFile);
    fclose($theFile);

} else { echo "Unknown"; }
