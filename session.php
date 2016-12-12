<?php
include('configuration.php');
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($db,"select admin_username from admin where admin_username = '$user_check'");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['admin_username'];

if(!isset($_SESSION['login_user'])){
    header("location:login.php");
}
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 12/12/16
 * Time: 16:37
 */
?>