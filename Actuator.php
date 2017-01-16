<?php session_start();
if (!isset($_SESSION["login"])){header("location:Homepage_Domisep2.php");}


      

$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");

$user_login = $_SESSION["login"];
$user_id = $_SESSION["id"];

$name_room=$_GET["type"];
$room_number=$_GET["number"];

//With this command we get the home_id associated to the login with wich our users are connect with
$select_room= $bdd->query("SELECT room_id FROM room WHERE room_name ='$name_room' AND room_nbr= $room_number AND user_id= $user_id");   
  
$room_id=$_SESSION["room_id"];

//Then same process to get the home and room ids associated 
  
$actuator_content = $bdd->prepare("SELECT actuator_id, actuator_name FROM actuators WHERE actuators.room_id = $room_id ");  
$actuator_content -> execute (array($room_id));
$num_rows = $bdd -> query("SELECT COUNT(actuator_id) AS Nbr_ids FROM actuators WHERE room_id= $room_id");
$data1 = $num_rows->fetch();
$nmb_ids=$data1["Nbr_ids"];

while ($data_3 = $actuator_content->fetch()){
    $actu_id=$data_3['actuator_id'];
    $tamp="actuator_".$data_3['actuator_id'];
    strval($tamp);
    if (isset($_POST[$tamp])){
            $actu_new= $bdd->query("UPDATE actuators SET actuator_state=$_POST[$tamp] WHERE actuator_id=$actu_id");
   }}

?>



<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
      <link rel = "stylesheet" href = "Domisep.css"/>
        <title>Home - <?php echo $name_room."room ".$room_number;?>actuators</title> 
    <head>
    <main>
  
    <div id = "page"> 
    <header class="greybg">
        
        <h1 class = "whitetxt" > DOMISEP</h1>
            <div id="conteneur"> 
                <h2 class = "whitetxt">Welcome to your home </h2>
                <ul id="conteneur",>
                    <li class="li_header"><a href="My_Account_visitor.php"; class="nounderline">Home</a></li>
                    <li class="li_header" ><a href = "NEW_profile.php"; class="nounderline">Profile</a></li>
                    <li class="li_header"><a href = "logout.php"; class="nounderline">Logout</a></li>
                    
                </ul>
            </div> 
    </header>

    <body>
        
        <section>
            
            
            <div id = "conteneur">
            <nav>
                <?php include "Menu_vertical_Myaccount.php";?>
            </nav>
            <article class="Bordure">
                
                <form action='' method='post'>
                
               <?php     
          
$actuator_content = $bdd->prepare("SELECT actuator_id, actuator_name FROM actuators WHERE actuators.room_id = $room_id ");  
$actuator_content -> execute (array($room_id));
                    
while ($data_3 = $actuator_content->fetch()){

        $actuator_id= $data_3["actuator_id"];
        $actuator_name= $data_3["actuator_name"];
        $tamp="actuator_".$data_3['actuator_id'];
        strval ($tamp);
        echo " 
        <tr> <td>Actuator name : </td>
            <td>" .$actuator_name . "</td>

        </tr><br>

        <tr> <td>Actuator number :</td>
            <td>" .$actuator_id."</td>
        </tr><br>
        <tr> <td>Actuator value </td>
            <td><input type='radio' name='".$tamp."'>
            </td><td><input type='radio' name='".$tamp."'><br>
            </td>
            </tr><br>";} ?>

        
        
                <tr> 
                    <td><input type='submit' value='submit'></td>
                </tr><br>
            </form>
                </article>
        
            
                </div>
            
            
            </section>
        
    
    </body>
            
   
       
    </div>
    
         

    
      </main>  
        
        
</html>