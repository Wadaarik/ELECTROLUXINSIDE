<?php
include 'gestion.php';

//INSERT DATA FROM CHAT
if(isset($_POST['submit'])){
    if (!empty($_POST['message_usr'])) {
        $user_chat = $_POST['user_session'];
        $text_chat = htmlspecialchars($_POST['message_usr']);
        date_default_timezone_set('Europe/Paris');
        $time_chat = date('Y/m/d H:i:s');

        $query = "INSERT INTO `chat` (`user_chat`, `text_chat`, `time_chat`) VALUES ('".$user_chat."', '".$text_chat."', '".$time_chat."');";
        $result = $conn->prepare($query);
        $result->execute();
        header('location: ../live.php');
    }else{
        header('location: ../live.php?error=nomessage');
    }
}

//FETCH DATAS FROM CHAT
    $sql_msg = "SELECT * FROM `chat` ORDER BY id DESC LIMIT 20";
    $res_query = $conn->query($sql_msg);


//FETCH USERS
    $sql_users = "SELECT * FROM `electroluxinside` ORDER BY id DESC";
    $res_users = $conn->query($sql_users);