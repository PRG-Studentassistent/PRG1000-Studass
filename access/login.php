<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Log in page</title>
    <link rel="stylesheet" href="../style/stylesheet.css">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen and (max-width:1250px)"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="loginBody">

<div class="logInContainer">
    <div class="loginForm">
        <form method="POST" action="" name="loginForm">
            <a>Brukernavn eller E-post:</a><br>
            <input type="text" name="userName-Email" id="userName-Email" required/><br><br>
            <a>Passord:</a><br>
            <input type="password" name="password" id="password" require/><br>
            <input type="submit" value="Logg inn!" name="logInButtom"/><br>

            <?php
            include("login_function/loginFunction.php");
			include("..\access\database.php");

            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                if ($msg == "mail") {
                    print("<br>Sjekk mail for å tilbakestille passord.");
                }

            }

            if (isset($_POST["logInButtom"])) {
                $logInUserName = $_POST["userName-Email"];
                $logInPassword = $_POST["password"];

                $logInControl = control($logInUserName, $logInPassword);

                if (!$logInControl) {
                    print("<br>Ingen treff på brukernavn eller passord!");
                } else {

                    $sql = "SELECT * FROM users WHERE userId='$logInUserName';";
                    $sqlQuery = mysqli_query($db, $sql) or die("Ikke mulig &aring; hente data fra databasen (#300)");
                    $xRows = mysqli_fetch_array($sqlQuery);
                    $userRole = $xRows["userRole"];

                    switch ($userRole) {
                        case "admin":

                            @$_SESSION["userName"] = $logInUserName;

                            print("<meta http-equiv='refresh' content='0;URL=../admin/dashboard.php'/>");
                            break;

                        case "student":

                            @$_SESSION["userName"] = $logInUserName;

                            print("<meta http-equiv='refresh' content='0;URL=../student/dashboard.php'/>");
                            break;
                    }
                }
            }

            ?>
    </div>
    <div class="login_footer">
    </div>
</div>
</body>
</html>