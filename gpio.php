<?php
// This page is requested by the JavaScript function.
// it updates the pin's status and then returns it so that the house map can be updated.

if (isset ( $_GET["room"] )) {
    $pic = strip_tags ($_GET["room"]);

    //test if value is a number
    if ( (is_numeric($pic)) && ($pic <= 16) && ($pic >= 1) ) {
        //set the gpio's mode to input
        system("gpio mode ".$pic." in");

        // Read the pin's status
        exec ("gpio read ".$pic, $status, $return );

        //set the gpio to high/low
        // if ($status[0] == "0" ) { $status[0] = "1"; }
        // else if ($status[0] == "1" ) { $status[0] = "0"; }

        // IN CASE NEEDED IN FUTURE: system("gpio write " . $pin . " " . $status );

        // echo the result to the requesting page.
        echo($status[0]);
    } else { echo ("fail"); }
} else { echo ("fail"); }
