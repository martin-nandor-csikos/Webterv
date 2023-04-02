<?php
$csatlakozas = null;

//Az adatbázishoz való csatlakozás
function connect() {
    $sqlSzerver = "localhost";
    $sqlFhnev = "root";
    $sqlJelszo = "";
    $sqlAdatbazis = "kutyamenhely";

    //Globális változó elérése
    global $csatlakozas;
    
    //Létrehoz egy új MySQL objektumot, ami a csatlakozást biztosítja
    //Ehhez kell a szerver neve (ami lokális, tehát localhost lesz ebben az esetben)
    //A MySQL adatbázisok eléréséhez a felhasználónév (alapértelmezetten XAMPP-ban "root")
    //És a jelszó (alapértelmezetten az XAMPP-ban üres, tehát nincs jelszó)
    //Ezek után kiválasztjuk a megfelelő adatbázist is (kutyamenhely)
    $csatlakozas = new mysqli($sqlSzerver, $sqlFhnev, $sqlJelszo, $sqlAdatbazis);
    
    //Ha a csatlakozas egy hibához vezetett (nem tudott valamiért csatlakozni az adatbázishoz), akkor leáll a kód (die), és kiírja a hibát
    if ($csatlakozas->connect_error) {
        die("Adatbázis csatlakozási hiba: " . $csatlakozas->connect_error);
    }
}

//Az adatbázis csatlakozásának megszüntetése
function disconnect() {
    //Globális változó elérése
    global $csatlakozas;

    $csatlakozas->close();
}
?>