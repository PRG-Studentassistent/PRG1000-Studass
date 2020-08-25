<?php 
session_start();
@$connectedUser=$_SESSION["userName"];

if(!$connectedUser ){
    /*print("<meta http-equiv='refresh' content='0;URL=http://prg1000.studentassistent.no/access/login.php'/>");*/
    print($connectedUser);
}
else{
include("..\access\database.php");

$sql = "SELECT * FROM users WHERE userName='$connectedUser';";
$sqlQuery = mysqli_query($db,$sql) or die ("Kan ikke hente data fra databasen (#100)");
$del = mysqli_fetch_array($sqlQuery);

	$userFirstName=$del["userFirstName"];
    $userLastName=$del["userLastName"];
    $userID = $del["userId"];
    $userPassword = $del["userPassword"];
    $userRole = $del["userRole"];
    


    $newURL = "<meta http-equiv='refresh' content='0;URL=http://prg1000.studentassistent.no/access/".$userRole."/dashboard.php'/>";
    

    if($userRole != "admin"){
        print($newURL);
    }
  }
    
?>
<html>
    <head>
        <title> <?php print("$userFirstName $userLastName"); ?> </title>
        <link rel="stylesheet" href="../style/stylesheet.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <meta charset="UTF-8">
</head>
<body class="dashboard">
      
    <div class="top_header">
        
        <div class="profileWLC">
            <button class="dropdownBTN"><?php print(" Velkommen $userLastName, $userFirstName !");?></button>
            <div class="profile-content">
            <a href="/www/sda/reko/users/commerce/profile/profile.php">Endre profil</a>
            <a href="/www/sda/reko/access/logout.php">Logg ut</a>
            </div>
        </div>
    </div>
<div class="sidenav">
  <a href="/www/sda/reko/index.php">Til forsiden</a>
  <a href="/www/sda/reko/users/commerce/dashboard.php">Info</a>
  <a href="/www/sda/reko/commerce/feed.php">Bestill nå</a>

  <button class="dropdown-btn">Annonse 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="/www/sda/reko/users/commerce/feed/editFeed.php">Rediger din annonse</a>
    <a href="/www/sda/reko/users/commerce/feed/showFeed.php">Se annonse</a>

  </div>

  <button class="dropdown-btn">Produkter 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="/www/sda/reko/users/commerce/products/addNewProduct.php">Legg til produkt</a>
    <a href="/www/sda/reko/users/commerce/products/productOverview.php">Dine produkter</a>
  </div>

  <button class="dropdown-btn">Ordre 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="/www/sda/reko/users/commerce/order/orderOverview.php">Mottatt bestillinger</a>
    <a href="/www/sda/reko/users/commerce/order/orders.php">Dine bestillinger</a>
    
  </div>

  <button class="dropdown-btn">Profil 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="/www/sda/reko/users/commerce/profile/profile.php">Din Profil</a>
    <a href="/www/sda/reko/access/logout.php">Logg ut</a>
    
  </div>
  <a href="/www/sda/reko/users/commerce/chat/chat_overview.php">Dine meldinger</a>
  <a href="/www/sda/reko/users/commerce/userguidance.php">Brukerveiledning</a>
</div>
<script src="/www/sda/reko/users/commerce/sidebarfunction.js"></script>

<div class="Footer_panel">
<a> COPYRIGHT © 2020</a>
</div>