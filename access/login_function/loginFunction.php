<?php

function control($logInUserName, $logInPassword)
{
    ##TODO Make this in file
    $servername = "92.220.179.219:3306";
    $username = "Hans";
    $password = "23011998";
    $dbname = "prg1000";

    $db = mysqli_connect($servername, $username, $password, $dbname);
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = true;


    if (!$logInUserName || !$logInPassword) {
        $result = false;
    } else {
        $sql = "SELECT * FROM users WHERE userId='$logInUserName';";
        $sqlQuery = mysqli_query($db, $sql) or die("Ikke mulig &aring; hente data fra databasen (#300)");

        $xRows = mysqli_fetch_array($sqlQuery);
        $regUserName = $xRows["userId"];
        $regPassword = $xRows["userPassword"];

        ##TODO this needs fixing, redo the password hasing, db does not store hash.
        $checkPassword = true;
        if ($regUserName != $logInUserName && $checkPassword == false) {
            return false;
        } else {
            $result = true;
        }
    }
    return $result;
}
?>