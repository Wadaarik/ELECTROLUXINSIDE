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


//AJOUTE ADMIN
if(isset($_POST['submit_add_adm'])){
    if (!empty($_POST['add_login_admin']) || !empty($_POST['add_password_an'])) {

        $adm_id = htmlspecialchars($_POST['add_login_admin']);
        $adm_password = htmlspecialchars($_POST['add_password_an']);

        $sql_add_adm = "SELECT * FROM `electrolux_adm` WHERE `adm_id` = '".$adm_id."'";
        $res_add_adm = $conn->query($sql_add_adm);

        if (mysqli_num_rows($res_add_adm) !== 0) {
            header('location: ../portail-admin.php?error=loginexist');
        }else{
            $sql = "INSERT INTO `electrolux_adm` (adm_id, adm_password) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                var_dump($stmt);
                exit();
            }
            $has_pwd = password_hash($adm_password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "ss", $adm_id, $has_pwd);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header('location: ../portail-admin.php?error=addAdmin');
        }

    }else{
        header('location: ../portail-admin.php?error=emptyinput');
    }
}

