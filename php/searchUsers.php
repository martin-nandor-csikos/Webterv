<?php
require "databaseConnection.php";
connect();

//Kereső input értéke
$fhnev = $_GET['fhnev'];

//Megkeressük azokat a felhasználóneveket, amik tartalmazzák a $kereses változót, és a jogosultsága nem admin
$sqlQuery = "SELECT * FROM users u, userprofile p WHERE u.id = p.userId AND u.fhnev LIKE '%$fhnev%' AND u.jogosultsag <> 'admin'";
$eredmeny = $csatlakozas->query($sqlQuery);

//Ha van eredmény
if ($eredmeny->num_rows > 0) {
    while ($adat = $eredmeny->fetch_assoc()) {
        echo "<p class=\"usernames\">" . $adat['fhnev'] . "</p>";
        
        if ($adat['bio'] != "") {
            echo "<p>Bio:<br>" . $adat['bio'] . "</p>";
        }

        if ($adat['kernev_publikus'] == 1) {
            echo "<p>Keresztnév: " . $adat['kernev'] . "</p>"; 
        }

        if ($adat['veznev_publikus'] == 1) {
            echo "<p>Vezetéknév: ". $adat['veznev'] . "</p>"; 
        }

        if ($adat['szuldatum_publikus'] == 1) {
            echo "<p>Születési dátum: " . $adat['szuldatum'] . "</p>"; 
        }

        if ($adat['email_publikus'] == 1) {
            echo "<p>E-mail: " . $adat['email'] . "</p>"; 
        }

        if ($adat['nem_publikus'] == 1) {
            echo "<p>Nem: " . $adat['nem'] . "</p>"; 
        }
    }
} else {
    echo "<p>Nincs találat.</p>";
}

disconnect();
?>