<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="styles.css">

    <?php
        require "./php/session.php";
        startSession();
        checkIfLoggedIn();
    ?>
</head>
<body>
    <header id="indexHeader">
        <!--Small info bar-->
        <div id="infoBar">
            <div id="closingHours">
                <p>Nyitvatartás: Hétfő - Szombat, 8:00 - 20:00</p>
            </div>

            <div id="phoneNumber">
                <p>Tel.: +36-99-999-9999</p>
            </div>

            <div id="location">
                <p>6726 Szeged, X körút 7</p>
            </div>
        </div>

        <!--Name-->
        <div id="name">
            <h1>Szegedi Kutyamenhely Alapítvány</h1>
            <h2>SZKA</h2>
        </div>

        <!--Menu bar-->
        <nav id="menuBar">
            <a style="padding-left: 150px; padding-right: 150px;" href="index.html" id="backtoindex" class="notActive">Kilépés a fórumból</a>
            <a style="padding-left: 150px; padding-right: 150px;" href="#" id="registration" class="active">Regisztráció</a>
            <a style="padding-left: 150px; padding-right: 150px;" href="loginPage.php" id="login" class="notActive">Bejelentkezés</a>
        </nav>
    </header>
    <form id="registrationform" action="./php/registration.php" method="POST">
        <label class="labels" for="email">E-mail</label>
        <br>
        <input class="szoveges" type="email" name="email" maxlength="255">
        <br><br>

        <label class="labels" for="fhnev">Felhasználónév:</label>
        <br>
        <input class="szoveges" type="text" name="fhnev" maxlength="255" minlength="3">
        <br><br>

        <label class="labels" for="veznev">Vezetéknév</label>
        <br>
        <input class="szoveges" type="text" name="veznev" maxlength="255" minlength="2">
        <br><br>

        <label class="labels" for="kernev">Keresztnév</label>
        <br>
        <input class="szoveges" type="text" name="kernev" maxlength="255" minlength="2">
        <br><br>

        <label class="labels" for="jelszo">Jelszó</label>
        <br>
        <input class="szoveges" type="password" name="jelszo" maxlength="255" minlength="6">
        <br><br>

        <label class="labels" for="jelszoIsm">Jelszó ismét</label>
        <br>
        <input class="szoveges" type="password" name="jelszoIsm" maxlength="255" minlength="6">
        <br><br>

        <label class="labels" for="szuldatum">Szuletési dátum</label>
        <br>
        <input type="date" name="szuldatum">
        <br><br>

        <label class="labels" for="nem">Nem</label>
        <br>
        <ul style="list-style-type: none">
            <li>
                <input class="radio" type="radio" name="nem" value="ferfi">
                <label class="labels" for="nem">Férfi</label>
            </li>
            <li>
                <input class="radio" type="radio" name="nem" value="no">
                <label class="labels" for="nem">Nő</label>
            </li>
            <li>
                <input class="radio" type="radio" name="nem" value="egyeb">
                <label class="labels" for="nem">Egyéb</label>
            </li>
        </ul>

        <input type="submit" value="Elküldés">
    </form>
</body>
</html>