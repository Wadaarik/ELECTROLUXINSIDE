<?php
$page = 'Login Administrateur';
include './back/gestion.php';
include './back/back.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <link type="image/x-icon" href="./assets/img/favicon.ico" rel="icon">
    <link type="image/x-icon" href="./assets/img/favicon.ico" rel="shortcut icon">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/style/inside.css">
    <title><?= $page ?> | Electrolux Inside</title>
</head>
<body>
<div class="main-content">
    <div class="container form-adm-container">
        <div class="form">
            <div class="form_container">
                <h2>Portail administrateur</h2>
                <small>Si vous n'êtes pas administrateur, merci de vous <a href="./login.php">connecter ici.</a></small>
                <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "emptyinput"){
                        echo "<p class='alert'>Merci de remplir tous les champs.</p>";
                    }
                    else if ($_GET["error"] == "wronglogin"){
                        echo "<p class='alert'>Mauvais identifiant ou mot de passe.</p>";
                    }
                    else if ($_GET["error"] == "connection"){
                        echo "<p class='alert'>Connectez-vous pour accéder au portail.</p>";
                    }
                }
                ?>
                <form action="./back/back.php" method="post">
                    <div class="form-row">
                        <label for="login_admin">Identifiant</label>
                        <div class="input">
                            <input type="text" name="login_admin" id="login_admin" placeholder="Identifiant" required>
                            <div class="icons"><img src="./assets/img/user.png" alt="user icon Electrolux Inside"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="password_an">Mot de passe</label>
                        <div class="input">
                            <input type="password" name="password_an" id="password_an" placeholder="••••••••" required>
                            <div style="cursor: pointer" id="visible_pwd" class="icons"><img src="./assets/img/lock.png" alt="visibility icon Electrolux Inside"></div>
                        </div>
                    </div>
                    <button type="submit" id="submit" name="submit_adm">Me connecter&nbsp;<i class='bx bx-right-arrow-alt'></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="./public/index.js" type="text/javascript"></script>

<?php
include_once './back/footer.php';
?>
