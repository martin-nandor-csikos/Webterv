<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Webshop - SZKA</title>

    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="./img/icon.png">
</head>

<body>
    <!--Header-->
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
            <a style="padding-left: 60px; padding-right: 60px;" href="#" id="forumpage" class="active">Hírek</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="searchUsersPage.php" id="search" class="notActive">Felhasználók keresése</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="changeUserInfoPage.php" id="changeinfo" class="notActive">Profil módosítása</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="userProfile.php" id="" class="notActive">Adatlap</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="privateMessages.php" class="notActive">Üzenetek</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="logoutPage.php" id="logout" class="notActive">Kijelentkezés</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="index.html" id="backtoindex" class="notActive">Kilépés a fórumból</a>
            <?php
            require "./php/session.php";
            startSession();

            if ($_SESSION['fhnev'] == "admin") {
                echo "<a style='padding-left: 60px; padding-right: 60px;' href='adminPage.php' id='adminPage' class='notActive'>Admin felület</a>";
            }
            ?>
        </nav>
    </header>

    <?php
    echo "<h1 id='udvozlet'>Üdvözöljük, " . $_SESSION['fhnev'] . "!</h1>"; 
    ?>
    <h2 class="title">Hírek</h2>

    <?php include "./php/getNews.php" ?>

</body>
</html>