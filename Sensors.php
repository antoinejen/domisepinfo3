<?php session_start();
if (!isset($_SESSION["login"])){header("location:Homepage_Domisep2.php");}?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
      <link rel = "stylesheet" href = "Domisep.css"/>
        <title>Home - Bathrooms</title> 
    <head>
  
    <div id = "page"> 
    <header class="greybg">
        
        <h1 class = "whitetxt" > DOMISEP</h1>
            <div id="conteneur"> 
                <h2 class = "whitetxt">Welcome to your home </h2>
                <ul id="conteneur",>
                    <li class="li_header"><a href="My_Account_visitor.php"; class="nounderline">Home</a></li>
                    <li class="li_header" ><a href = "Profil.php"; class="nounderline">Profile</a></li>
                    <li class="li_header"><a href = "logout.php"; class="nounderline">Logout</a></li>
                    
                </ul>
            </div> 
    </header>

    <body>
        
        <section>
            
            
            <div id = "conteneur">
            <nav>
                <?php include "Menu_vertical_Myaccount.php"?>
            </nav>
            <article class="Bordure">
                 <?php switch ($_GET["type"]){ 
                case 'bath' : echo "<h1> Bathroom ".$_GET["number"]."</h1>";
                break;
                case 'living': echo "<h1> Living-Room ".$_GET["number"]."</h1>";
                break;
                case 'bed': echo "<h1> Bedroom ".$_GET["number"]."</h1>";    
                break;
                case 'kitchen': echo "<h1> Kitchen ".$_GET["number"]."</h1>"; 
                break;
                case 'garden': echo "<h1> Garden ".$_GET["number"]."</h1>"; 
        
}
                ?>
               <?php
$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");

  $user_login = $_SESSION["login"];
  $user_id= $_SESSION["id"];
  
      
//With this command we get the user_id associated to the login the our users are connect with
                
                
$name_room=$_GET["type"];
$room_number=$_GET["number"];

  
  
  $select_room= $bdd->query("SELECT room_id FROM room WHERE room_name ='$name_room' AND room_nbr=$room_number AND user_id=$user_id");
  while ($data_2 = $select_room->fetch()){
  $room_id = $data_2["room_id"];
  }
 
//Then same process to get the home and room ids associated 
  
  $sensor_content= $bdd->prepare("SELECT sensor_id, sensor_value, sensor_name FROM sensors WHERE sensors.room_id = ? ");  
  $sensor_content -> execute (array($room_id));
  while ($data_3 = $sensor_content->fetch()){
  $sensor_id= $data_3["sensor_id"];
  $sensor_value= $data_3["sensor_value"];
  $sensor_name= $data_3["sensor_name"];
?>
                 <td>
            <tr> Sensor name : <?php echo $sensor_name ?></tr><br/>
                
            <tr> Sensor number : <?php echo $sensor_id ?></tr><br/>
            <tr> Sensor value : <?php echo $sensor_value ?></tr><br/>
             </td><?php } ?>
            </article>
        
            
                </div>
            <p>If you want to change de values of this sensor please follow this <a href="Actuator.php">link</a></p>
            
            </section>
        
     
    </body>
            
    <?php include "footer.php";?>
       
    </div>
    
         

    
        </main>
        
        
</html>