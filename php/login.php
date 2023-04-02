<?php
require "databaseConnection.php";
connect();

//formon belül elküldött felhasználónév és jelszó, azok megtisztítása
$fhnev = trim($_POST['fhnev']);
$jelszo = trim($_POST['jelszo']);

//ha a 2 input ki lett töltve
if (isset($fhnev) && isset($jelszo)) {
    //SQL utasítás, ahol megnézzük
    $sqlQuery = "SELECT fhnev, jelszo FROM users";
    $eredmeny = $csatlakozas->query($sqlQuery);

    //Ha az utasítás miatt az eredmeny változóban van elérhető sor (= van olyan felhasználónév, ami megegyezik a formon belüli adattal)
    if ($eredmeny->num_rows > 0) {
        while($user = $eredmeny->fetch_assoc()) {
            if (password_verify($jelszo, $user['jelszo'])) {
                //Átirányítás a bejelentkezett oldalra
            }
        }
    } else {
        //Hibás felhasználónév
    }
}

disconnect();
?>