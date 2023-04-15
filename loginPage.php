<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
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
            <a style="padding-left: 150px; padding-right: 150px;" href="registrationPage.php" id="registration" class="notActive">Regisztráció</a>
            <a style="padding-left: 150px; padding-right: 150px;" href="#" id="login" class="active">Bejelentkezés</a>
        </nav>
    </header>
    <form id="loginform" action="./php/login.php" method="POST">
        <label class="labels" for="fhnev">Felhasználónév:</label>
        <br>
        <input class="szoveges" type="text" name="fhnev" maxlength="255" minlength="2" required>
        <br><br>

        <label class="labels" for="jelszo">Jelszó:</label>
        <br>
        <input class="szoveges" type="password" name="jelszo" maxlength="255" minlength="6" required>
        <br>
        <input type="submit" name="bejelentkezes" value="Bejelentkezés">
    </form>
    
    <button id="reggomb"><a href="./registrationPage.php">Nincs még fiókod?</a></button>
</body>
</html>