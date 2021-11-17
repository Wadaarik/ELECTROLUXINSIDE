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
    </div>
</div>
<script src="./public/index.js"></script>
</body>
</html>