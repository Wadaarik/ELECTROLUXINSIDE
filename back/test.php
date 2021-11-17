<?php

include './gestion.php';

//$pswd_name = "adm_pass";
//$pswd_adm = "MyPasswordTest2";
////$pswd_global = "MyPasswordTest";
////$pswd_help = "MyPasswordTest2";
//
//$sql = "INSERT INTO `pwd_g` (pwd_name, pwd_adm) VALUES (?, ?)";
//$stmt = mysqli_stmt_init($conn);
//if (!mysqli_stmt_prepare($stmt, $sql)){
//    var_dump($stmt);
//    exit();
//}
//
//$has_pwd = password_hash($pswd_adm, PASSWORD_DEFAULT);
//var_dump($has_pwd);
//
//mysqli_stmt_bind_param($stmt, "ss", $pswd_name, $has_pwd);
//mysqli_stmt_execute($stmt);
//mysqli_stmt_close($stmt);

$adm_id = "admID2";
$adm_password = "admPASSWORD2";

$sql = "INSERT INTO `electrolux_adm` (adm_id, adm_password) VALUES (?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)){
    var_dump($stmt);
    exit();
}
$has_pwd = password_hash($adm_password, PASSWORD_DEFAULT);

mysqli_stmt_bind_param($stmt, "ss", $adm_id, $has_pwd);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

//header('location: ./test.php?success');
exit();