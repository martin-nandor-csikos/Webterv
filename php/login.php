<?php
require "databaseConnection.php";
require "session.php";
connect();

//formon belül elküldött felhasználónév és jelszó, azok megtisztítása
$fhnev = trim($_POST['fhnev']);
$jelszo = trim($_POST['jelszo']);

//ha a 2 input ki lett töltve
if (isset($fhnev) && isset($jelszo)) {
    //SQL utasítás, ahol megnézzük, van-e már olyan felhasználónév az adatbázisban, aminek a fhnev értéke megegyezik a megadottal
    $sqlQuery = "SELECT fhnev, jelszo FROM users WHERE fhnev='$fhnev'";
    $eredmeny = $csatlakozas->query($sqlQuery);

    //Ha az utasítás miatt az eredmeny változóban van elérhető sor (= van olyan felhasználónév, ami megegyezik a formon belüli adattal)
    if ($eredmeny->num_rows == 1) {
        //A $user változó egy tömb lesz, amiben eltároljuk a sor adatait (a $user['fhnev'] a regisztrált felhasználónév lesz)
        while($user = $eredmeny->fetch_assoc()) {
            if (password_verify($jelszo, $user['jelszo'])) {
                //Átirányítás a bejelentkezett oldalra
                header("Location: ./../loggedIn.php");
                startSession();
                setSessionData($fhnev);
            } else {
                echo "Hibás jelszó.";
            }
        }
    } else {
        echo "Hibás felhasználónév.";
    }
}

disconnect();
?>