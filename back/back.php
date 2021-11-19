<?php
include 'gestion.php';

//INSERT DATA FROM CHAT
if(isset($_POST['submit'])){
    if (!empty($_POST['message_usr'])) {
        $user_chat = $_POST['user_session'];
        $text_chat = htmlspecialchars($_POST['message_usr']);
        date_default_timezone_set('Europe/Paris');
        $time_chat = date('Y/m/d H:i:s');

        $username_query = "SELECT username FROM electroluxinside WHERE email = '".$user_chat."' ";
        $res_username_query = $conn->query($username_query);

        while ($row_usernames = $res_username_query->fetch_row()) {
            $username = $row_usernames[0];
            $query = "INSERT INTO `chat` (`user_chat`, `text_chat`, `time_chat`, `username`) VALUES ('" . $user_chat . "', '" . $text_chat . "', '" . $time_chat . "', '" . $username . "');";
            $result = $conn->prepare($query);
            $result->execute();
            header('location: ../live.php');
        }
    }else{
        header('location: ../live.php?error=nomessage');
    }
}



//LOGIN ADMIN
if(isset($_POST['submit_adm'])){
    if (!empty($_POST['login_admin']) || !empty($_POST['password_an'])) {
        $id_adm = htmlspecialchars($_POST['login_admin']);
        $pass_adm = htmlspecialchars($_POST['password_an']);


        $sql_p_adm = "SELECT * FROM `electrolux_adm` WHERE `adm_id` = '".$id_adm."'";
        $res_p_adm = $conn->query($sql_p_adm);


        if (mysqli_num_rows($res_p_adm) !== 0) {

            while ($row_p_adm = $res_p_adm->fetch_array()) {

                $checkAdminPass = password_verify($pass_adm, $row_p_adm[2]);
                var_dump($checkAdminPass);

                if ($checkAdminPass === true) {
                    session_start();
                    $_SESSION['login_admin'] = $id_adm;
                    header('location: ../portail-admin.php');
                } else {
                    header('location: ../login_adm.php?error=wronglogin');
                }
            }
        }else {
            header('location: ../login_adm.php?error=wronglogin');
        }
    }else{
        header('location: ../login_adm.php?error=emptyinput');
    }
}
