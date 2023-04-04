<?php
require "databaseConnection.php";
connect();

//Kereső input értéke
$kereses = $_GET['kereses'];

//Megkeressük azokat a felhasználóneveket, amik tartalmazzák a $kereses változót, és a jogosultsága nem admin
$sqlQuery = "SELECT fhnev FROM users WHERE fhnev LIKE '%$kereses%' AND jogosultsag <> 'admin'";
$eredmeny = $csatlakozas->query($sqlQuery);

//Ha van eredmény
if ($eredmeny->num_rows > 0) {
    //Kiiratjuk a user felhasználónevét
    while ($user = $eredmeny->fetch_assoc()) {
        echo $user['fhnev'] . "<br><br>";
    }
} else {
    echo "Nincs találat.";
}

disconnect();
?>