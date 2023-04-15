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
            <a href="forum.html" id="forumpage" class="notActive">Fórum</a>
            <a href="#" id="search" class="active">Felhasználók keresése</a>
            <a href="index.html" id="backtoindex" class="notActive">Kilépés a fórumból</a>
            <a href="registrationPage.php" id="registration" class="notActive">Regisztráció</a>
            <a href="loginPage.php" id="login" class="notActive">Bejelentkezés</a>
            <a href="loggedIn.php" id="logout" class="notActive">Kijelentkezés</a>
            <a href="changeUserInfoPage.php" id="changeinfo" class="notActive">Profil módosítása</a>
        </nav>
    </header>
    <form id="keresesform" action="./php/searchUsers.php" method="GET">
        <label id="kereseslabel" for="fhnev">Felhasználónév</label>
        <br>
        <input id="keresesmezo" type="text" name="fhnev" maxlength="255" minlength="3">

        <input id="keresesgomb" type="submit" value="Keresés">
    </form>
    <div id="searchResults"></div>
    
</body>
</html>