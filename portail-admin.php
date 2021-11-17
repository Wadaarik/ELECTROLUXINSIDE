<?php
$page = 'Portail administrateur';
include './back/gestion.php';
include './back/back.php';
session_start();
$session = $_SESSION['login_admin'];

if (empty($session)){
    header('location: ./login_adm.php?error=connection');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/x-icon" href="./assets/img/favicon.ico" rel="icon">
    <link type="image/x-icon" href="./assets/img/favicon.ico" rel="shortcut icon">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/style/inside.css">
    <title><?= $page ?> | Electrolux Inside</title>
</head>
<body>
<div class="main-content">
    <div class="container">
        <section class="chat">
            <h2>Messages reçus :</h2>
            <section class="chat-contain">
                <?php
                    while ($row_msg = $res_query->fetch_row()){
                        ?>
                            <ul>
                                <li>
                                    <div class="infos">
                                        <span class="usr_msg"><?= $row_msg[1] ?></span>
                                        <span class="usr_date"><?= $row_msg[3] ?></span>
                                    </div>
                                    &nbsp;<p><?= $row_msg[2] ?></p>
                                </li>
                                <hr />
                            </ul>
                        <?php
                    }
                ?>
            </section>
        </section>
        <section class="users">
            <h2>Utilisateurs présents :</h2>
            <section class="users-contain">
                <?php
                while ($row_users = $res_users->fetch_row()){
                    ?>
                    <ul>
                        <li>
                            <ul>
                                <li>Utilisateur :&nbsp;<span><?= $row_users[1] ?></span></li>
                                <li>IP :&nbsp;<span><?= $row_users[2] ?></span></li>
                                <li>Date de connection :&nbsp;<span><?= $row_users[3] ?></span></li>
                            </ul>
                        </li>
                        <hr />
                    </ul>
                    <?php
                }
                ?>
            </section>
        </section>
        <section class="form">
            <section class="admin-contain">
                <div class="form">
                    <div class="form_container">
                        <h2>Ajouter un administrateur :</h2>
                        <?php
                        if (isset($_GET["error"])){
                            if ($_GET["error"] == "emptyinput"){
                                echo "<p class='alert'>Merci de remplir tous les champs.</p>";
                            }else if ($_GET["error"] == "loginexist"){
                                echo "<p class='alert'>L'identifiant choisi existe déjà.</p>";
                            }else if ($_GET["error"] == "stmtfailed"){
                                echo "<p class='alert'>Quelque chose s'est mal passé, merci de réessayer dans un instant.</p>";
                            }
                        }
                        ?>
                        <form action="./back/back.php" method="post">
                            <div class="form-row">
                                <label for="add_login_admin">Identifiant</label>
                                <div class="input">
                                    <input type="text" name="add_login_admin" id="add_login_admin" placeholder="Identifiant" required>
                                    <div class="icons"><img src="./assets/img/user.png" alt="user icon Electrolux Inside"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="add_password_an">Mot de passe</label>
                                <div class="input">
                                    <input type="password" name="add_password_an" id="add_password_an" placeholder="••••••••" required>
                                    <div style="cursor: pointer" id="visible_pwd" class="icons"><img src="./assets/img/lock.png" alt="visibility icon Electrolux Inside"></div>
                                </div>
                            </div>
                            <button type="submit" id="submit" name="submit_add_adm">Me connecter&nbsp;<i class='bx bx-right-arrow-alt'></i></button>
                        </form>
                    </div>
                </div>
            </section>
        </section>
    </div>
</div>
<script src="./public/index.js"></script>
</body>
</html>