<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 27/01/17
 * Time: 02:25
 */
$login = $_SESSION["login"];

// get the SESSION variable from the mdp.php and define it as login for this page

include('config.php');
//$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");
$request_info = $bdd-> prepare("SELECT user_name,home_id,user_privilege,user_id,owner_index FROM users WHERE user_login = ?");
$request_info->execute(array($login));

while ($data = $request_info->fetch()){

    $username = $data["user_name"];

    $_SESSION["username"]=$username;

    $home_id= $data["home_id"];

    $_SESSION["home_id"]=$home_id;

    $user_privilege=$data["user_privilege"];

    $_SESSION["privilege"]=$user_privilege;

    $user_id=$data["user_id"];
    $_SESSION["user_id"]=$data["user_id"];

    $owner_index=$data["owner_index"];

    $_SESSION["owner_index"]=$owner_index;}