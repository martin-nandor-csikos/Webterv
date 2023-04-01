<?php
//databaseConnection.php importálása
require "databaseConnection.php";

//connect függvény meghívása
connect();

//új felhasználó hozzáadása
function addNewUser() {
    //A method=POST-os form inputjainak eltárolása egy változóban readability miatt
    $email = $_POST["email"];
    $fhnev = $_POST["fhnev"];
    $jelszo = $_POST["jelszo"];
    $veznev = $_POST["veznev"];
    $kernev = $_POST["kernev"];
    $szuldatum = $_POST["szuldatum"];
    $nem = $_POST["nem"];

    //Ha a formon belül minden inputba került adat
    if (isset($email) && isset($fhnev) && isset($jelszo) && isset($veznev) && isset($kernev) && isset($szuldatum) && isset($nem)) {
        //Jelszó hashelése --> biztonsági okok miatt
        //$jelszo a formon belül megadott jelszó, PASSWORD_DEFAULT a hashelés metódusa
        $hasheltJelszo = password_hash($jelszo, PASSWORD_DEFAULT);
    
        //SQL adatbázisba, a users táblába bekerülnek az adatok
        //Query = utasítás
        //(email, fhnev, jelszo...) --> az email, fhnev, jelszo...sorokba kerülnek az értékek
        //VALUES ($email, $fhnev...) --> a formban megadott adatok
        $sqlQuery = "INSERT INTO users (email, fhnev, jelszo, veznev, kernev, szuldatum, nem) VALUES ($email, $fhnev, $hasheltJelszo, $veznev, $kernev, $szuldatum, $nem)";
        
        //Ha sikerült elvégezni az utasítást (bekerültek az adatok a táblába)
        if ($csatlakozas->query($sqlQuery) === TRUE) {
            //Átirányítás a bejelentkezett oldalra
        } else {
            echo "Hiba: " . $sql . "<br>" . $csatlakozas->error;
        }
    }

    //Adatbázis csatlakozásának megszüntetése
    disconnect();
}

?>