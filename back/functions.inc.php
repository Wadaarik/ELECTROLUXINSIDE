<?php

include './gestion.php';

//CHECK EMPTY INPUTS
function emptyInputLogIn($email, $password)
{
    $result;
    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//CHECK EMAIL TYPE
function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//GET USER ID
function getUserIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //ip from share internet
        $ip_add = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //ip pass from proxy
        $ip_add = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_add = $_SERVER['REMOTE_ADDR'];
    }
    return $ip_add;
}


//ADD USER INFORMATION IN TABLE
function addUser($conn, $email, $ip_usr, $connect_time)
{


    $sql = "INSERT INTO `electroluxinside` (email, ip_usr, connect_time) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../login.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $email, $ip_usr, $connect_time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
    $_SESSION['email'] = $email;
    header('location: ../live.php');
    exit();

}
