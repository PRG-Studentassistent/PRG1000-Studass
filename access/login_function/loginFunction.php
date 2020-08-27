<?php

function control($logInUserName, $logInPassword, $db)
{
    $result = true;


    if (!$logInUserName || !$logInPassword) {
        $result = false;
    } else {
        $sql = "SELECT * FROM users WHERE userId='$logInUserName';";
        $sqlQuery = mysqli_query($db, $sql) or die("Ikke mulig &aring; hente data fra databasen (#3000)" . mysqli_error($db));
        echo ($logInUserName);

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