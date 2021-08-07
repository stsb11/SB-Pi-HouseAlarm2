<?php
// This page is requested by the JavaScript function.
// it updates the pin's status and then returns it so that the house map can be updated.

if (isset ( $_GET["room"] )) {
    $pic = strip_tags ($_GET["room"]);

    //test if value is a number
    if ( (is_numeric($pic)) && ($pic <= 16) && ($pic >= 1) ) {
        // Set the GPIO mode to input...
        system("gpio mode ".$pic." in");

        // Read the pin's status
        exec ("gpio read ".$pic, $status, $return );

        // IN CASE NEEDED IN FUTURE: system("gpio write " . $pin . " " . $status );

        /* NOT WORKING. PERMISSIONS MAYBE?
        // Update log file, then echo the result to the requesting page.
        if ($status[0] == "0") {
           if ($pic == "1") { $where="kitchen"; }
           else if ($pic == "4") { $where = "lounge"; }
           else if ($pic == "15") { $where = "hall"; }
           else if ($pic == "16") { $where = "landing"; }
           else { $where = "NONE"; }

           if ($where != "NONE") {
              $myfile = fopen($where . ".txt", "w");
              fwrite($myfile, date("d/m/Y @ h:i:sa"));
              fclose($myfile);
           }
        }
        */

        echo($status[0]);
    } else { echo ("fail"); }
} else { echo ("fail"); }
