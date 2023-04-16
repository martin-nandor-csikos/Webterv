<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adatok megváltoztatása</title>
    <link rel="stylesheet" href="styles.css">

    <?php
        require "./php/session.php";
        startSession();
        checkSession();
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
        <a style="padding-left: 60px; padding-right: 60px;" href="hirek.php" id="forumpage" class="notActive">Hírek</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="searchUsersPage.php" id="search" class="notActive">Felhasználók keresése</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="#" id="changeinfo" class="active">Profil módosítása</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="userProfile.php" class="notActive">Adatlap</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="privateMessages.php" class="notActive">Üzenetek</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="logoutPage.php" id="logout" class="notActive">Kijelentkezés</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="index.html" id="backtoindex" class="notActive">Kilépés a fórumból</a>
            <?php
            if ($_SESSION['fhnev'] == "admin") {
                echo "<a style='padding-left: 60px; padding-right: 60px;' href='adminPage.php' id='adminPage' class='notActive'>Admin felület</a>";
            }
            ?>
        </nav>
    </header>
    <form id="changeinfoform" action="./php/changeUserInfo.php" method="POST">
        <label class="labels" for="ujEmail">Új e-mail</label>
        <br>
        <input class="szoveges" id="ujEmail" type="email" name="ujEmail" maxlength="255">
        <br><br>

        <label class="labels" for="ujFhnev">Új felhasználónév:</label>
        <br>
        <input class="szoveges" id="ujFhnev" type="text" name="ujFhnev" maxlength="255" minlength="3">
        <br><br>

        <label class="labels" for="ujVeznev">Új vezetéknév</label>
        <br>
        <input class="szoveges" id="ujVeznev" type="text" name="ujVeznev" maxlength="255" minlength="2">
        <br><br>

        <label class="labels" for="ujKernev">Új keresztnév</label>
        <br>
        <input class="szoveges" id="ujKernev" type="text" name="ujKernev" maxlength="255" minlength="2">
        <br><br>

        <label class="labels" for="ujJelszo">Új jelszó</label>
        <br>
        <input class="szoveges" id="ujJelszo" type="password" name="ujJelszo" maxlength="255" minlength="6">
        <br><br>

        <label class="labels" for="ujJelszoIsm">Új jelszó ismét</label>
        <br>
        <input class="szoveges" id="ujJelszoIsm" type="password" name="ujJelszoIsm" maxlength="255" minlength="6">
        <br><br>

        <label class="labels" for="ujSzuldatum">Új szuletési dátum</label>
        <br>
        <input type="date" id="ujSzuldatum" name="ujSzuldatum">
        <br><br>

        <label class="labels">Új nem</label>
        <br>
        <ul class="hideListStyle">
            <li>
                <input class="radio" id="ferfi" type="radio" name="ujNem" value="ferfi">
                <label class="labels" for="ferfi">Férfi</label>
            </li>
            <li>
                <input class="radio" id="no" type="radio" name="ujNem" value="no">
                <label class="labels" for="no">Nő</label>
            </li>
            <li>
                <input class="radio" id="egyeb" type="radio" name="ujNem" value="egyeb">
                <label class="labels" for="egyeb">Egyéb</label>
            </li>
        </ul>

        <label class="labels" for="bio">Bio</label>
        <br>
        <textarea name="bio" id="bio" cols="60" rows="10"></textarea>
        <br><br>

        <label class="labels">Vezetéknév láthatóság</label>
        <br>
        <ul class="hideListStyle">
            <li>
                <input class="radio" type="radio" id="publikusVeznev" name="veznev_publikus" value="1">
                <label class="labels" for="publikusVeznev">Publikus</label>            
            </li>
            <li>
                <input class="radio" type="radio" id="privatVeznev" name="veznev_publikus" value="0">
                <label class="labels" for="privatVeznev">Privát</label>            
            </li>
        </ul>
        <br><br>

        <label class="labels">Keresztnév láthatóság</label>
        <br>
        <ul class="hideListStyle">
            <li>
                <input class="radio" type="radio" id="publikusKernev" name="kernev_publikus" value="1">
                <label class="labels" for="publikusKernev">Publikus</label>            
            </li>
            <li>
                <input class="radio" type="radio" id="privatKernev" name="kernev_publikus" value="0">
                <label class="labels" for="privatKernev">Privát</label>            
            </li>
        </ul>
        <br><br>

        <label class="labels">E-mail láthatóság</label>
        <br>
        <ul class="hideListStyle">
            <li>
                <input class="radio" type="radio" id="publikusEmail" name="email_publikus" value="1">
                <label class="labels" for="publikusEmail">Publikus</label>            
            </li>
            <li>
                <input class="radio" type="radio" id="privatEmail" name="email_publikus" value="0">
                <label class="labels" for="privatEmail">Privát</label>            
            </li>
        </ul>
        <br><br>

        <label class="labels">Születési dátum láthatóság</label>
        <br>
        <ul class="hideListStyle">
            <li>
                <input class="radio" type="radio" id="publikusSzuldatum" name="szuldatum_publikus" value="1">
                <label class="labels" for="publikusSzuldatum">Publikus</label>            
            </li>
            <li>
                <input class="radio" type="radio" id="privatSzuldatum" name="szuldatum_publikus" value="0">
                <label class="labels" for="privatSzuldatum">Privát</label>            
            </li>
        </ul>
        <br><br>

        <label class="labels">Nem láthatóság</label>
        <br>
        <ul class="hideListStyle">
            <li>
                <input class="radio" type="radio" id="publikusNem" name="nem_publikus" value="1">
                <label class="labels" for="publikusNem">Publikus</label>            
            </li>
            <li>
                <input class="radio" type="radio" id="privatNem" name="nem_publikus" value="0">
                <label class="labels" for="privatNem">Privát</label>            
            </li>
        </ul>
        <br><br>

        <input type="submit" value="Elküldés">
    </form>
</body>
</html>