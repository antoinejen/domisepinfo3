<?php session_start();
<<<<<<< HEAD
include("info_query.php");
if (!isset($_SESSION["login"])){header("location:NEW_homepage.php");}?>
<!DOCTYPE html>
<html>
    <main>
    <head>
        <meta charset="utf-8" />
      <link rel = "stylesheet" href = "NEW_style.css"/>
        <title>Home - Bathrooms</title> 
    </head>
        <?php include("header.php"); ?>
    <div id = "page">

    <!--<header class="greybg">
=======
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
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
        
        <h1 class = "whitetxt" > DOMISEP</h1>
            <div id="conteneur"> 
                <h2 class = "whitetxt">Welcome to your home </h2>
                <ul id="conteneur",>
                    <li class="li_header"><a href="My_Account_visitor.php"; class="nounderline">Home</a></li>
                    <li class="li_header" ><a href = "NEW_profile.php"; class="nounderline">Profile</a></li>
<<<<<<< HEAD
                    <li class="li_header"><a href = "logout.php" class="nounderline"onclick="return confirm('See you soon');">Logout</a></li>
                    
                </ul>
            </div> 
    </header>-->
=======
                    <li class="li_header"><a href = "logout.php" class="nounderline"onclick="return confirm(`t'es sur frère?`);">Logout</a></li>
                    
                </ul>
            </div> 
    </header>
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24

    <body>
        
        <section>
            
            
            <div id = "conteneur">
            <nav>
<<<<<<< HEAD
                <?php
include('config.php');
//$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");


$user_login = $_SESSION["login"];
$user_id= $_SESSION["user_id"];
$user_privilege=$_SESSION["privilege"];

=======
                <?php 
$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");


$user_login = $_SESSION["login"];
$user_id= $_SESSION["id"];
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24


//With this command we get the user_id associated to the login the our users are connect with


$name_room=$_GET["type"];
<<<<<<< HEAD
                
$room_number=$_GET["number"];
                
$owner_index=$_SESSION["owner_index"];
                
$select_room= $bdd->query("SELECT room_id,room_surname FROM room WHERE room_name ='$name_room' AND room_nbr=$room_number AND owner_index=$owner_index");


while ($data_2 = $select_room->fetch()){
  $room_id=$data_2["room_id"];
  
  $room_surname=$data_2["room_surname"];
  
  }
                
                
if (isset ($_POST["new_room_name"])){
=======
$room_number=$_GET["number"];
                
 
                
$select_room= $bdd->query("SELECT room_id FROM room WHERE room_name ='$name_room' AND room_nbr=$room_number AND user_id=$user_id");


while ($data_2 = $select_room->fetch()){
  $room_id = $data_2["room_id"];
  $_SESSION["room_id"]=$room_id;
      
$user_priviledge=$_SESSION["priviledge"]; 
      
 
  
  }
               if (isset ($_POST["new_room_name"])){
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
            
            $new_room_name=$_POST["new_room_name"];
 
            $change_room_name = $bdd -> query("UPDATE `room` SET `room_surname` ='$new_room_name' WHERE `room`.`room_id` = $room_id;");}
        
                        
<<<<<<< HEAD
include "Menu_vertical_Myaccount.php"?>
                
                
                
                
            </nav>
            <article class="Bordure">
                
                
<?php 
    
    
    switch ($_GET["type"]){ 
                case 'bath' : 
                        
                        $room_number=$_GET["number"];
                        $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE owner_index=$owner_index AND room_name='bath' AND room_nbr=$room_number");
                        $data_surname= $get_room_surname->fetch();
                        $room_surname=$data_surname["room_surname"];
                            
                        if ($room_surname == NULL) { echo "<h1> Bathroom ".$_GET["number"]."</h1>" ;
                                echo $room_surname;
                                 
                        }else{echo "<h1>".$room_surname."</h1>";
                                }
=======

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
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
                        
                        
                break;
                        
                case 'living': 
                         $room_number=$_GET["number"];
<<<<<<< HEAD
          
                         $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE owner_index=$owner_index AND room_name='living' AND room_nbr=$room_number");
                         $data_surname= $get_room_surname->fetch();
                         $room_surname=$data_surname["room_surname"];

                         if ($room_surname == NULL) {echo "<h1> Living-Room ".$_GET["number"]."</h1>";}
                             
                         else{
                             echo "<h1>".$room_surname."</h1>";}
                            
=======
                         $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE user_id=$user_id AND room_name='living' AND room_nbr=$i");
                         $data_surname= $get_room_surname->fetch();
                         $room_surname=$data_surname["room_surname"];

                         if ($room_surname != NULL) {
                             echo "<h1>".$room_surname."</h1>";
                         }else{
                            echo "<h1> Living-Room ".$_GET["number"]."</h1>";}
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
                        
                        
                        
                break;
                        
                case 'bed': 
                         $room_number=$_GET["number"];
<<<<<<< HEAD
                         
                         $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE owner_index=$owner_index AND room_name='bed' AND room_nbr=$room_number");
                         $data_surname= $get_room_surname->fetch();
                         $room_surname=$data_surname["room_surname"];

                         if ($room_surname == NULL) { echo "<h1> Bedroom ".$_GET["number"]."</h1>";
                             
                         }else{echo "<h1>".$room_surname."</h1>";}
=======
                         $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE user_id=$user_id AND room_name='bed' AND room_nbr=$i");
                         $data_surname= $get_room_surname->fetch();
                         $room_surname=$data_surname["room_surname"];

                         if ($room_surname != NULL) {
                             echo "<h1>".$room_surname."</h1>";
                         }else{
                         echo "<h1> Bedroom ".$_GET["number"]."</h1>";}
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
                            
                break;
                        
                case 'kitchen': 
<<<<<<< HEAD
                         $room_number=$_GET["number"];
                         $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE owner_index=$owner_index AND room_name='kitchen' AND room_nbr=$room_number");
                         $data_surname= $get_room_surname->fetch();
                         $room_surname=$data_surname["room_surname"];

                         if ($room_surname == NULL) {echo "<h1> Kitchen ".$_GET["number"]."</h1>";
                            
                         }else{ echo "<h1>".$room_surname."</h1>";
                             }
=======
                         $room_number=$i;
                         $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE user_id=$user_id AND room_name='kitchen' AND room_nbr=$i");
                         $data_surname= $get_room_surname->fetch();
                         $room_surname=$data_surname["room_surname"];

                         if ($room_surname != NULL) {
                             echo "<h1>".$room_surname."</h1>";
                         }else{
                             echo "<h1> Kitchen ".$_GET["number"]."</h1>";}
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
                         
                break;
                case 'garden': echo "<h1> Garden ".$_GET["number"]."</h1>"; 
        
}
                ?>
               <?php          
                
                
if (isset ( $_POST["new_sensor_value"])&& isset( $_POST["type"])){
            
            $new_sensor_type=$_POST["type"];
            
        
    
            $new_sensor_value=$_POST["new_sensor_value"];
       
    
            
      
            
    
<<<<<<< HEAD
    
            $nbr_of_ids = $bdd -> query("SELECT COUNT(sensor_id) AS nbr_sensor_ids FROM sensors");
            $data_nbr_id = $nbr_of_ids->fetch();
            $nbr_of_ids=$data_nbr_id["nbr_sensor_ids"];
   
    
               
            $new_sensor_id= 1;
            $count=1;
            while ($count<=$nbr_of_ids){
                
                $test_id_exist = $bdd ->query("SELECT sensor_id FROM sensors WHERE sensor_id= $new_sensor_id");
                $data_test_id = $test_id_exist -> fetch();
                
                
                
                if ($data_test_id["sensor_id"]==NULL){
                 
                    $count=$nbr_of_ids+1000;
                    
                    
                }else { $count=$count+1;
                        $new_sensor_id=$new_sensor_id+1;
                        ;}
                
            }
    
 
    
    
=======
            $num_sensorID = $bdd -> query("SELECT COUNT(sensor_id) AS nbr_sensor_ids FROM sensors");
            $data1 = $num_sensorID->fetch();
            $nmb_ids=$data1["nbr_sensor_ids"];
            
            $new_sensor_id=$nmb_ids + 1;
            strval($new_sensor_id);
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
        
            
            
        
<<<<<<< HEAD
            $new_sensor = $bdd -> query("INSERT INTO sensors VALUES($new_sensor_id,$room_id,$new_sensor_value,'$new_sensor_type',NULL)");
            $_POST["new_sensor_value"]=$_POST["type"]=NULL;
    

           
                        
}
if (isset($_POST['rmv'])) {
    
   
            $delete_actuator= $bdd-> query("DELETE FROM actuators WHERE room_id=$room_id");
            $delete_sensor= $bdd -> query("DELETE FROM sensors WHERE room_id=$room_id");
            $delete_room = $bdd -> query("DELETE FROM room WHERE room_id=$room_id");
            header("location:My_Account_visitor.php");
    
    
        
}
                
if (isset($_POST["rmv_sensor"])){
    $sensor_id=$_POST["rmv_sensor"];
    $delete_sensor= $bdd -> query("DELETE FROM sensors WHERE room_id=$room_id AND sensor_id=$sensor_id");
    
    
}
 
//Then same process to get the home and room ids associated 
  
  $sensor_content= $bdd->query("SELECT sensor_id, sensor_value, sensor_name FROM sensors WHERE room_id = $room_id ");  
  
=======
            $new_sensor = $bdd -> query("INSERT INTO sensors(`sensor_id`,`room_id`,`sensor_value`,`sensor_name`) VALUES ($new_sensor_id,$room_id,$new_sensor_value,'$new_sensor_type')");
           
                        
}
 
//Then same process to get the home and room ids associated 
  
  $sensor_content= $bdd->prepare("SELECT sensor_id, sensor_value, sensor_name FROM sensors WHERE sensors.room_id = ? ");  
  $sensor_content -> execute (array($room_id));
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
  while ($data_3 = $sensor_content->fetch()){
  $sensor_id= $data_3["sensor_id"];
  $sensor_value= $data_3["sensor_value"];
  $sensor_name= $data_3["sensor_name"];
?>
<<<<<<< HEAD
                 <tr>
            <td> Sensor name : <?php echo $sensor_name ?></td><br/>
                
            <td> Sensor ID : <?php echo $sensor_id ?></td><br/>
            <td> Sensor value : <?php echo $sensor_value ?></td><br/>
             </tr><?php } ?>
=======
                 <td>
            <tr> Sensor name : <?php echo $sensor_name ?></tr><br/>
                
            <tr> Sensor number : <?php echo $sensor_id ?></tr><br/>
            <tr> Sensor value : <?php echo $sensor_value ?></tr><br/>
             </td><?php } ?>
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
            </article>
        
            
                </div>
<<<<<<< HEAD
            <p>If you want to change the values of this sensor please follow this <a href="Actuator.php?type=<?php echo $name_room; ?>&number=<?php echo $room_number;?>&room_id=<?php echo $room_id;?> ">link</a></p>
=======
            <p>If you want to change de values of this sensor please follow this <a href="Actuator.php?type=<?php echo $name_room; ?>&number=<?php echo $room_number;?> ">link</a></p>
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
            
            
            
         
            
            
<<<<<<< HEAD
            <?php if ($user_privilege == 1){ 
                echo "
                
             <table id = 'conteneur'>   
            <td>   
                  <tr>  <h4>Add a sensor</h4></tr>
                      
                <tr>  <form action = 'Sensors.php?type=".$name_room."&number=".$room_number."&room_id=".$room_id."' method='post' >
                 
                                <label>Sensor's type</label><br>
                                <label><input type= 'radio' name='type' value='Accelerometer'>Accelerometer</label><br>
                                <label><input type= 'radio' name='type' value='Thermometer'>Thermometer</label><br>
                                <label><input type= 'radio' name='type' value='Humidity'>Humidity</label><br>

                                <label> Sensor's value</label><br>
                                <input type='text' required name='new_sensor_value'><br>
                                <input type='submit' value = 'Add this sensor to my room'>
                        </form></tr>
 
            
            </td>
            
            <td>
            <tr><h4>Change room's name </h4></tr>
              <tr>  <form action = 'Sensors.php?type=".$name_room."&number=".$room_number."&room_id=".$room_id."' method='post' >
                    <label> New name</label><br>
                            <input type='text' required name='new_room_name'><br>
                            <input type='submit' value ='Change the name'>
                            </form></tr></td>
                            
                            
                            
            <td>
            
           <tr> <h4> Delete this room </4><tr>
               <tr> <form action ='Sensors.php?type=".$name_room."&number=".$room_number."' method='post' >
                 <p>
                 <input type='hidden' name='rmv' value='0' />
                 <input type='checkbox' name ='rmv' value='1'>I want to definitively remove this room</p>
                 <input type='submit' value ='Remove'onclick='return confirm('I want to delete this room');'><br>
                     </form></tr></td>
                     
           <td>
           <tr><h4> Delete this Sensor </4></tr>
                <tr><form action ='Sensors.php?type=".$name_room."&number=".$room_number."' method='post' >
                     
                     <select name='sensor_removed'>
                            <option>--SELECT A SENSOR--</option>";
                     
          $sensor_content= $bdd->prepare("SELECT sensor_id, sensor_name FROM sensors WHERE sensors.room_id = ? ");  
          $sensor_content -> execute (array($room_id));
                     while ($data_3 = $sensor_content->fetch()){
                $sensor_id= $data_3["sensor_id"];
                $sensor_name= $data_3["sensor_name"];   
                echo "<option value = '".$sensor_id."'>".$sensor_name." ".$sensor_id."</option><br>"; }
    
               echo   "</select><br> 
                <input type='hidden' name='rmv_sensor' value='0' />
                 <input type='checkbox' name ='rmv_sensor' value='1'>I want to definitively remove this sensor</p>
                 <input type='submit' value ='Remove' onclick='return confirm('I really want to delete this sensor');'>
                 </form></tr></td>";} ?>
                    
=======
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
            
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
            
                
        </section>
        
     
    </body>
            
            
        
     
   
            
<<<<<<< HEAD

       
    </div>
    
 
        
    
        </main>
    <?php include "footer.php";?>
=======
    <?php include "footer.php";?>
       
    </div>
    
         

    
        </main>
        
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
        
</html>