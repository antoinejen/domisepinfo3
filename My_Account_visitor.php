<?php session_start();
// start a session where we will be able to store some data concerning the user the session end if he logs out

if (!isset($_SESSION["login"])){header("location:NEW_homepage.php");}
// this line is at the top of every user's pages to verify if the client is connected?>
<?php

include ("info_query.php");
//need to modify group by

$count_bath = $bdd->query("SELECT COUNT(room_name) AS bath FROM room WHERE owner_index=$owner_index AND room_name='bath'");
$data_cb = $count_bath->fetch();
$count_bath2 =$data_cb["bath"];



$count_living = $bdd->query("SELECT COUNT(room_name) AS living FROM room WHERE owner_index=$owner_index AND room_name='living'" );
$data_cl = $count_living->fetch();
$count_living2 = $data_cl["living"];

$count_bed = $bdd->query("SELECT COUNT(room_name) AS bed FROM room WHERE owner_index=$owner_index AND room_name='bed'");
$data_cb = $count_bed->fetch();
$count_bed2 =$data_cb["bed"];

$count_kitchen = $bdd->query("SELECT COUNT(room_name) AS kitchen FROM room WHERE owner_index=$owner_index AND room_name='kitchen'");
$data_ck = $count_kitchen->fetch();
$count_kitchen2= $data_ck["kitchen"];



// request sql to get the username associated to the login currently used
// add new room

if (isset($_POST["new_surname"]) && isset($_POST["type"])){


    $new_room_type=$_POST["type"];



    $new_room_surname=$_POST["new_surname"];


    $nbr_of_ids = $bdd -> query("SELECT COUNT(room_id) AS nbr_room_ids FROM room");
    $data_nb_id = $nbr_of_ids->fetch();
    $nbr_of_ids=$data_nb_id["nbr_room_ids"];


    $new_room_id= 1;
    $count=1;

    while ($count<=$nbr_of_ids){

        $test_id_exist = $bdd ->query("SELECT room_id FROM room WHERE room_id= $new_room_id");
        $data_test_id = $test_id_exist -> fetch();



        if ($data_test_id["room_id"]==NULL){

            $count=$nbr_of_ids+1000;


        }else { $count=$count+1;
            $new_room_id=$new_room_id+1;
            ;}

    }



    $count_nr = $bdd->query("SELECT COUNT(room_name) AS new_room FROM room WHERE owner_index=$owner_index AND room_name='$new_room_type'");
    $data_nr = $count_nr->fetch();
    $count_nr =$data_nr["new_room"];


    $new_room_number=$count_nr+1;


    $test_surname_exist = $bdd-> query("SELECT room_surname FROM room WHERE room_surname='$new_room_surname' ");
    $data_test = $test_surname_exist ->fetch();
    $test_surname_exist = $data_test["room_surname"];



    if ($test_surname_exist==null ){


        $new_room = $bdd -> query("INSERT INTO room(`room_id`,`owner_index`,`room_name`,`room_nbr`,`room_surname`) Values($new_room_id,$owner_index,'$new_room_type',$new_room_number,'$new_room_surname')");


        if ($bdd -> query("INSERT INTO room(`room_id`,`owner_index`,`room_name`,`room_nbr`,`room_surname`) Values($new_room_id,$owner_index,'$new_room_type',$new_room_number,'$new_room_surname')")=== true){echo "swag";}}

}

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
      <link rel = "stylesheet" href = "NEW_style.css"/>
        <link rel="icon" type="image/jpg/png"/>
        <title>Home - My Account</title> 
    <head>
        <?php include("header.php"); ?>
    <div id = "page"> 

    <!--<header class="greybg" , class = "whitetxt">
        <h1 class="whitetxt">DOMISEP</h1>
        <div id="conteneur">
        <h2 class = "whitetxt">Welcome to your home <?php //echo $username;?></h2>
        <ul id="conteneur">
            <li class="li_header"><a href="My_Account_visitor.php"; class="nounderline">Home</a></li>
            <li class="li_header"><a href = "NEW_profile.php"; class="nounderline">Profil</a></li>
            <li class="li_header"><a href = "logout.php"; class="nounderline"onclick="return confirm('See you soon');">Logout</a></li>
        </ul>
        </div>
                
    </header>-->
    <body>
        
        <section>
            
        <div id = "conteneur">
           
               <?php echo"<nav>" ; include "Menu_vertical_Myaccount.php"; echo "</nav>";?>
           
            <article class="Bordure">
                <h1> From this website you basically have a total control over your dear House</h1>
                <p>You can visualize how the different spaces of your house are behaving and have access to the actuators we placed in it.</p>

                <td>
                        <tr> <td>Number of bathrooms : <?php echo $count_bath2 ; ?></td><br>
                        </tr>
                        <tr> <td>Number of living-Rooms : <?php echo $count_living2; ?> </td><br>
                        </tr>
                        <tr><td>Number of Bedroom : <?php echo $count_bed2; ?></td><br>
                        </tr>
                        <tr><td>Number of Kitchen : <?php echo $count_kitchen2;?></td><br>
                        </tr>

                 </td>
            </article>
            
            
             
            </div>
        
            
            
<?php  
            if ($user_privilege == 1){ 
              ?>
                <h4>Add a room</h4>
                <form action = '' method='post' >
                        <label> Room's name</label><br>
                        <input type='text' required name='new_surname'><br>
                
                        <label>Room's type</label><br>
                        <label><input type= 'radio' name='type' value='bath'>Bathroom</label><br>
                        <label><input type= 'radio' name='type' value='living'>Living-room</label><br>
                        <label><input type= 'radio' name='type' value='bed'>Bedroom</label><br>
                        <label><input type= 'radio' name='type' value='kitchen'>Kitchen</label><br>
                        <input type='submit' value = 'Add this room to my house'>
                </form> <?php ;}
             ?>
                
        </section>
        
     
    </body>








        </main>
    <?php include "footer.php";?>
        
</html>