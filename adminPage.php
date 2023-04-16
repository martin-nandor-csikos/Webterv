<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználó keresés</title>
    <link rel="stylesheet" href="styles.css">

    <?php
        require "./php/session.php";
        startSession();
        checkSession();

        if ($_SESSION['fhnev'] != "admin") {
            header("Location: hirek.php");
        }
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
            <a style="padding-left: 60px; padding-right: 60px;" href="changeUserInfoPage.php" id="changeinfo" class="notActive">Profil módosítása</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="logoutPage.php" id="logout" class="notActive">Kijelentkezés</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="index.html" id="backtoindex" class="notActive">Kilépés a fórumból</a>
            <?php
            if ($_SESSION['fhnev'] == "admin") {
                echo "<a style='padding-left: 60px; padding-right: 60px;' href='adminPage.php' id='adminPage' class='active'>Admin felület</a>";
            }
            ?>
        </nav>
    </header>

    <h1 class="title">Új hír létrehozása</h1>

    <form action="./php/addNews.php" method="POST">
        <label for="cim">Cikk címe:</label>
        <br>
        <input id="cim" type="text" name="cim" maxlength="255">

        <br>

        <label for="szoveg">Cikk szövege:</label>
        <br>
        <textarea name="szoveg" id="" cols="30" rows="10"></textarea>
        <br>

        <input type="submit" value="Cikk létrehozása">
    </form>

    <h2>Felhasználó törlése</h2>
    <form action="./php/deleteUser.php" method="POST">
        <label for="fhnev">Felhasználónév:</label>
        <br>
        <input type="text" name="fhnev" maxlength="255">
        <br>

        <input type="submit" value="Törlés">
    </form>
</body>
</html>