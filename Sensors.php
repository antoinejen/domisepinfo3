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
                    <li class="li_header" ><a href = "NEW_profile.php"; class="nounderline">Profile</a></li>
                    <li class="li_header"><a href = "logout.php" class="nounderline"onclick="return confirm(`t'es sur frère?`);">Logout</a></li>
                    
                </ul>
            </div> 
    </header>

    <body>
        
        <section>
            
            
            <div id = "conteneur">
            <nav>
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
  $_SESSION["room_id"]=$room_id;
      
$user_priviledge=$_SESSION["priviledge"]; 
      
 
  
  }
               if (isset ($_POST["new_room_name"])){
            
            $new_room_name=$_POST["new_room_name"];
 
            $change_room_name = $bdd -> query("UPDATE `room` SET `room_surname` ='$new_room_name' WHERE `room`.`room_id` = $room_id;");}
        
                        

                include "Menu_vertical_Myaccount.php"?>
            </nav>
            <article class="Bordure">
                 <?php switch ($_GET["type"]){ 
                case 'bath' : 
                        
                        $room_number=$_GET["number"];
                        $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE user_id=$user_id AND room_name='bath' AND room_nbr=$i");
                        $data_surname= $get_room_surname->fetch();
                        $room_surname=$data_surname["room_surname"];
                            
                        if ($room_surname != NULL) {
                                 echo "<h1>".$room_surname."</h1>";
                        }else{
                                 echo "<h1> Bathroom ".$_GET["number"]."</h1>" ;
                                echo $room_surname;}
                        
                        
                break;
                        
                case 'living': 
                         $room_number=$_GET["number"];
                         $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE user_id=$user_id AND room_name='living' AND room_nbr=$i");
                         $data_surname= $get_room_surname->fetch();
                         $room_surname=$data_surname["room_surname"];

                         if ($room_surname != NULL) {
                             echo "<h1>".$room_surname."</h1>";
                         }else{
                            echo "<h1> Living-Room ".$_GET["number"]."</h1>";}
                        
                        
                        
                break;
                        
                case 'bed': 
                         $room_number=$_GET["number"];
                         $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE user_id=$user_id AND room_name='bed' AND room_nbr=$i");
                         $data_surname= $get_room_surname->fetch();
                         $room_surname=$data_surname["room_surname"];

                         if ($room_surname != NULL) {
                             echo "<h1>".$room_surname."</h1>";
                         }else{
                         echo "<h1> Bedroom ".$_GET["number"]."</h1>";}
                            
                break;
                        
                case 'kitchen': 
                         $room_number=$i;
                         $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE user_id=$user_id AND room_name='kitchen' AND room_nbr=$i");
                         $data_surname= $get_room_surname->fetch();
                         $room_surname=$data_surname["room_surname"];

                         if ($room_surname != NULL) {
                             echo "<h1>".$room_surname."</h1>";
                         }else{
                             echo "<h1> Kitchen ".$_GET["number"]."</h1>";}
                         
                break;
                case 'garden': echo "<h1> Garden ".$_GET["number"]."</h1>"; 
        
}
                ?>
               <?php          
                
                
if (isset ( $_POST["new_sensor_value"])&& isset( $_POST["type"])){
            
            $new_sensor_type=$_POST["type"];
            
        
    
            $new_sensor_value=$_POST["new_sensor_value"];
       
    
            
      
            
    
            $num_sensorID = $bdd -> query("SELECT COUNT(sensor_id) AS nbr_sensor_ids FROM sensors");
            $data1 = $num_sensorID->fetch();
            $nmb_ids=$data1["nbr_sensor_ids"];
            
            $new_sensor_id=$nmb_ids + 1;
            strval($new_sensor_id);
        
            
            
        
            $new_sensor = $bdd -> query("INSERT INTO sensors(`sensor_id`,`room_id`,`sensor_value`,`sensor_name`) VALUES ($new_sensor_id,$room_id,$new_sensor_value,'$new_sensor_type')");
           
                        
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
            <p>If you want to change de values of this sensor please follow this <a href="Actuator.php?type=<?php echo $name_room; ?>&number=<?php echo $room_number;?> ">link</a></p>
            
            
            
         
            
            
            <?php if ($user_priviledge == 1){ 
                echo "
            <h4>Add a sensor</h4>
                <form action = 'Sensors.php?type=".$name_room."&number=".$room_number."' method='post' >
                        
                
                        <label>Sensor's type</label><br>
                        <label><input type= 'radio' name='type' value='Accelerometer'>Accelerometer</label><br>
                        <label><input type= 'radio' name='type' value='Thermometer'>Thermometer</label><br>
                        <label><input type= 'radio' name='type' value='Humidity'>Humidity</label><br>
                        
                        <label> Sensor's value</label><br>
                        <input type='text' required name='new_sensor_value'><br>
                        <input type='submit' value = 'Add this sensor to my room'>
                </form>
 
            
            
            <h4>Change room's name </h4>
                <form action = 'Sensors.php?type=".$name_room."&number=".$room_number."' method='post' >
                    <label> New name</label><br>
                            <input type='text' required name='new_room_name'><br>
                            <input type='submit' value ='Change the name'>
                            </form>";}?>
            
            
                
        </section>
        
     
    </body>
            
            
        
     
   
            
    <?php include "footer.php";?>
       
    </div>
    
         

    
        </main>
        
        
</html>