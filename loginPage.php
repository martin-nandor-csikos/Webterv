<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="styles.css">
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
            <a href="searchUsersPage.php" id="search" class = "notActive">Felhasználók keresése</a>
            <a href="index.html" id="backtoindex" class="notActive">Kilépés a fórumból</a>
            <a href="registrationPage.php" id="registration" class="notActive">Regisztráció</a>
            <a href="#" id="login" class="active">Bejelentkezés</a>
            <a href="loggedIn.php" id="logout" class="notActive">Kijelentkezés</a>
            <a href="changeUserInfoPage.php" id="changeinfo" class="notActive">Profil módosítása</a>
        </nav>
    </header>
    <form action="./php/login.php" method="POST">
        <label for="fhnev">Felhasználónév:</label>
        <br>
        <input type="text" name="fhnev" maxlength="255" minlength="2" required>
        <br><br>

        <label for="jelszo">Jelszó:</label>
        <br>
        <input type="password" name="jelszo" maxlength="255" minlength="6" required>

        <input type="submit" name="bejelentkezes" value="Bejelentkezés">
    </form>
    
</body>
</html>