<?php
require "databaseConnection.php";
connect();

$fhnev = $_SESSION['fhnev'];

$users = "SELECT * FROM users u, userprofile p WHERE u.id = p.userId AND u.fhnev='$fhnev'";
//$users = "SELECT * FROM users WHERE fhnev='$fhnev'";
$eredmeny = $csatlakozas->query($users);

if ($eredmeny->num_rows > 0) {
    while ($adat = $eredmeny->fetch_assoc()) {
        echo "<p>Felhasználónév: " . $adat['fhnev'] . "</p>";
        echo "<p>Vezetéknév: " . $adat['veznev'] . "</p>";
        echo "<p>Keresztnév: " . $adat['kernev'] . "</p>";
        echo "<p>E-mail: " . $adat['email'] . "</p>";
        echo "<p>Születési dátum: " . $adat['szuldatum'] . "</p>";
        echo "<p>Nem: " . $adat['nem'] . "</p>";

        echo "<br><br>";

        echo "<p>Adataid láthatósága:</p>";
        if ($adat['kernev_publikus'] == 0) {
            echo "<p>Keresztnév: privát</p>"; 
        } else {
            echo "<p>Keresztnév: publikus</p>"; 
        }

        if ($adat['veznev_publikus'] == 0) {
            echo "<p>Vezetéknév: privát</p>"; 
        } else {
            echo "<p>Vezetéknév: publikus</p>"; 
        }

        if ($adat['szuldatum_publikus'] == 0) {
            echo "<p>Születési dátum: privát</p>"; 
        } else {
            echo "<p>Születési dátum: publikus</p>"; 
        }

        if ($adat['email_publikus'] == 0) {
            echo "<p>E-mail: privát</p>"; 
        } else {
            echo "<p>E-mail: publikus</p>"; 
        }

        if ($adat['nem_publikus'] == 0) {
            echo "<p>Nem: privát</p>"; 
        } else {
            echo "<p>Nem: publikus</p>"; 
        }

        echo "A láthatóságokat a 'Profil módosítása' fülön tudod megváltoztatni.";
    }
}

disconnect();
?>