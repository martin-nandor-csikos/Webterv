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
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#keresesform').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                type: 'GET',
                url: './php/searchUsers.php',
                data: formData,
                success: function(response) {
                    $('#searchResults').html(response);
                }
                });
            });
        });
    </script>
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
            <a style="padding-left: 60px; padding-right: 60px;" href="#" id="search" class="active">Felhasználók keresése</a>
            <a style="padding-left: 60px; padding-right: 60px;" href="changeUserInfoPage.php" id="changeinfo" class="notActive">Profil módosítása</a>
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
    <form id="keresesform" action="./php/searchUsers.php" method="GET">
        <label for="fhnev">Felhasználónév</label>
        <br>
        <input id="fhnev" type="text" name="fhnev" maxlength="255" minlength="2">

        <input id="keresesgomb" type="submit" value="Keresés">
    </form>
    <div id="searchResults"></div>
    
</body>
</html>