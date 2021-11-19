<?php

include './gestion.php';
include './functions.inc.php';

if (isset($_POST["submit"])){

    //GET INPUTS RESULTS
    $email = htmlspecialchars($_POST["email_usr"]);
    $password = htmlspecialchars($_POST["password_usr"]);

    //CHECK VALID FORM
    if (emptyInputLogIn($email, $password) !== false){
        header('location: ../login.php?error=emptyinput');
        exit();
    }
    if (invalidEmail($email) !== false){
        header('location: ../login.php?error=invalidemail');
        exit();
    }

    //DATE & IP ADRESS FOR CONNECTED USER
    date_default_timezone_set('Europe/Paris');
    $connect_time = date('Y/m/d H:i:s');
    $ip_usr = getUserIpAddr();

    //CHECK MAIL
    $sql_check_user = "SELECT * FROM `users` WHERE `email` = '".$email."'";
    $res_check_user = $conn->query($sql_check_user);

    if (mysqli_num_rows($res_check_user) !== 0) {
        //        CHECK PASSWORD
        $sql = "SELECT * FROM `pwd_g`";
        $res = $conn->query($sql);

        while($row = $res->fetch_array()) {

            $checkPass = password_verify($password, $row[2]);

            if ((($row[0] === '1') && $checkPass === true)){

                //CHECK username
                $sql_sct_username = "SELECT usernames FROM `users` WHERE `email` = '".$email."'";
                $res_sct_username = $conn->query($sql_sct_username);

                while($usernames = $res_sct_username->fetch_row()){
                    $username = $usernames[0];
                    addUser($conn, $email, $ip_usr, $connect_time, $username);
                }

            }else{
                header('location: ../login.php?error=wronglogin');
            }
//            if ((($row[0] === '1') && $checkPass === true) || (($row[0] === '2') && $checkPass === true) ){
//                addUser($conn, $email, $ip_usr, $connect_time);
//            }else{
//                header('location: ../login.php?error=wronglogin');
//            }
        }
    }else{
        header('location: ../login.php?error=wronglogin');
    }

}else{
    header('location: ../login.php');
    exit();
}