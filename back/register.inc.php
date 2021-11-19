<?php
include './gestion.php';
include './functions.inc.php';

if (isset($_POST["submit"])){

    //GET INPUTS RESULTS
    $email = htmlspecialchars($_POST["email_usr_reg"]);
    $username = htmlspecialchars($_POST["username_user_reg"]);
    $password = htmlspecialchars($_POST["password_usr_reg"]);

    //CHECK VALID FORM
    if (emptyInputLogIn($email, $password) !== false){
        header('location: ../register.php?error=emptyinput');
        exit();
    }
    if (invalidEmail($email) !== false){
        header('location: ../register.php?error=invalidemail');
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
        header('location: ../login.php?error=wronglogin');
    }else{

        //        CHECK PASSWORD
        $sql = "SELECT pwd_adm FROM `pwd_g` WHERE id = '2'";
        $res = $conn->query($sql);

        while($row = $res->fetch_assoc()) {

            $checkPass = password_verify($password, $row['pwd_adm']);

            if ($checkPass === true){

                    addUser($conn, $email, $ip_usr, $connect_time, $username);

            }else{
                header('location: ../register.php?error=wronglogin');
            }
        }
    }

}else{
    header('location: ../register.php');
    exit();
}
