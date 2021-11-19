<?php
$page = 'Portail administrateur';
include './back/gestion.php';
include './back/back.php';
session_start();
$session = $_SESSION['login_admin'];

//// CHECK MAIL ADMIN SESSION
$sql_check_admin = "SELECT * FROM `electrolux_adm` WHERE adm_id = '".$session."'";
$res_check_admin = $conn->query($sql_check_admin);

if (mysqli_num_rows($res_check_admin) !== 0) {
}else{
    header('location: ./login_adm.php?error=connection');
}
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
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <link type="image/x-icon" href="./assets/img/favicon.ico" rel="icon">
    <link type="image/x-icon" href="./assets/img/favicon.ico" rel="shortcut icon">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/style/inside.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title><?= $page ?> | Electrolux Inside</title>
</head>
<body>
<div class="main-content">
    <div class="container">
        <div class="row">
            <section class="chat">
                <h2>Messages reçus :</h2>
                <section class="chat-contain">
                    <ul id="chat-contain">
                    </ul>
                </section>
            </section>
            <section id="users" class="users">
                <h2>Participants présents :</h2>
                <section class="users-contain">
                    <ul id="users-contain">
                    </ul>
                </section>
            </section>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#chat-contain").load("./back/chat.php");
        var refreshchat = setInterval(function() {
            $("#chat-contain").load('./back/chat.php');
        }, 10000);
        $.ajaxSetup({ cache: false });

        $("#users-contain").load("./back/users.php");
        var refreshusers = setInterval(function() {
            $("#users-contain").load('./back/users.php');
        }, 10000);
        $.ajaxSetup({ cache: false });
    });
</script>
</body>
</html>