<?php session_start();
<<<<<<< HEAD
if (!isset($_SESSION["login"])){header("location:NEW_homepage.php");}


      
include('config.php');
//$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","root");

$user_login = $_SESSION["login"];
$user_id = $_SESSION["user_id"];

$name_room=$_GET["type"];
$room_number=$_GET["number"];
$room_id=$_GET["room_id"];


$user_privilege=$_SESSION["privilege"];
$user_login = $_SESSION["login"];
$user_id= $_SESSION["user_id"];
$owner_index=$_SESSION["owner_index"];

//With this command we get the home_id associated to the login with wich our users are connect with
$select_room= $bdd->query("SELECT room_id,room_surname FROM room WHERE room_name ='$name_room' AND room_nbr=$room_number AND owner_index=$owner_index");
$data_room = $select_room -> fetch();
    while ($data_room = $select_room -> fetch()) {
        $room_id = $data_room["room_id"];
        $room_surname=$data_room["room_surname"];
    } 






//Then same process to get the home and room ids associated 
  
$actuator_content = $bdd->query("SELECT actuator_id, actuator_name FROM actuators WHERE actuators.room_id = $room_id ");  
=======
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
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
$num_rows = $bdd -> query("SELECT COUNT(actuator_id) AS Nbr_ids FROM actuators WHERE room_id= $room_id");
$data1 = $num_rows->fetch();
$nmb_ids=$data1["Nbr_ids"];

while ($data_3 = $actuator_content->fetch()){
    $actu_id=$data_3['actuator_id'];
    $tamp="actuator_".$data_3['actuator_id'];
    strval($tamp);
<<<<<<< HEAD
    
    if (isset($_POST[$tamp])){
        
        
        $actu_new= $bdd->prepare("UPDATE actuators SET actuator_state= ? WHERE actuator_id=$actu_id");
            
        if ($_POST[$tamp]=='on'){
            $new_value=1;
            strval($new_value);
            $actu_new -> execute (array($new_value));}
        
        else if ($_POST[$tamp]=='off'){
            $new_value=0;
            strval($new_value);
            $actu_new -> execute (array($new_value));}
        else {
            $actu_new -> execute (array($_POST[$tamp]));}
        }}
=======
    if (isset($_POST[$tamp])){
            $actu_new= $bdd->query("UPDATE actuators SET actuator_state=$_POST[$tamp] WHERE actuator_id=$actu_id");
   }}
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24

?>



<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
<<<<<<< HEAD
      <link rel = "stylesheet" href = "NEW_style.css"/>
        <title>Home - <?php echo $name_room."room ".$room_number;?>actuators</title> 
    </head>
    <main>
  
    <div id = "page">
        <?php include("header.php"); ?>
    <!-- <header class="greybg">
=======
      <link rel = "stylesheet" href = "Domisep.css"/>
        <title>Home - <?php echo $name_room."room ".$room_number;?>actuators</title> 
    <head>
    <main>
  
    <div id = "page"> 
    <header class="greybg">
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
        
        <h1 class = "whitetxt" > DOMISEP</h1>
            <div id="conteneur"> 
                <h2 class = "whitetxt">Welcome to your home </h2>
                <ul id="conteneur",>
                    <li class="li_header"><a href="My_Account_visitor.php"; class="nounderline">Home</a></li>
<<<<<<< HEAD
                    <li class="li_header"><a href = "NEW_profile.php"; class="nounderline">Profile</a></li>
                    <li class="li_header"><a href = "logout.php"; class="nounderline"onclick="return confirm('See you soon');">Logout</a></li>
                    
                </ul>
            </div> 
    </header> -->
=======
                    <li class="li_header" ><a href = "NEW_profile.php"; class="nounderline">Profile</a></li>
                    <li class="li_header"><a href = "logout.php"; class="nounderline">Logout</a></li>
                    
                </ul>
            </div> 
    </header>
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24

    <body>
        
        <section>
            
            
            <div id = "conteneur">
            <nav>
                <?php include "Menu_vertical_Myaccount.php";?>
            </nav>
            <article class="Bordure">
<<<<<<< HEAD
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
                        
                        
                break;
                        
                case 'living': 
                         $room_number=$_GET["number"];
          
                         $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE owner_index=$owner_index AND room_name='living' AND room_nbr=$room_number");
                         $data_surname= $get_room_surname->fetch();
                         $room_surname=$data_surname["room_surname"];

                         if ($room_surname == NULL) {echo "<h1> Living-Room ".$_GET["number"]."</h1>";}
                             
                         else{
                             echo "<h1>".$room_surname."</h1>";}
                            
                        
                        
                        
                break;
                        
                case 'bed': 
                         $room_number=$_GET["number"];
                         
                         $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE user_id='$user_id' AND room_name='bed' AND room_nbr=$room_number");
                         $data_surname= $get_room_surname->fetch();
                         $room_surname=$data_surname["room_surname"];

                         if ($room_surname == NULL) { echo "<h1> Bedroom ".$_GET["number"]."</h1>";
                             
                         }else{echo "<h1>".$room_surname."</h1>";}
                            
                break;
                        
                case 'kitchen': 
                         $room_number=$_GET["number"];
                         $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE user_id='$user_id'AND room_name='kitchen' AND room_nbr=$room_number");
                         $data_surname= $get_room_surname->fetch();
                         $room_surname=$data_surname["room_surname"];

                         if ($room_surname == NULL) {echo "<h1> Kitchen ".$_GET["number"]."</h1>";
                            
                         }else{ echo "<h1>".$room_surname."</h1>";
                             }
                         
                break;
                case 'garden': echo "<h1> Garden ".$_GET["number"]."</h1>"; 
        
}
                ?>
                
                <form action='' method='post'>
                
<?php   
                    if (isset ( $_POST["new_actuator_value"])&& isset( $_POST["type"])){
            
            $new_actuator_type=$_POST["type"];
        
            $new_actuator_value=$_POST["new_actuator_value"];
    
    
            $nbr_of_ids = $bdd -> query("SELECT COUNT(actuator_id) AS nbr_actuator_ids FROM actuators");
            $data_nbr_id = $nbr_of_ids->fetch();
            $nbr_of_ids=$data_nbr_id["nbr_actuator_ids"];
   
    
               
            $new_actuator_id= 1;
            $count=1;
            while ($count<=$nbr_of_ids){
                
                $test_id_exist = $bdd ->query("SELECT actuator_id FROM actuators WHERE actuator_id= $new_actuator_id");
                $data_test_id = $test_id_exist -> fetch();
                
                
                
                if ($data_test_id["actuator_id"]==NULL){
                 
                    $count=$nbr_of_ids+1000;
                    
                    
                }else { $count=$count+1;
                        $new_actuator_id=$new_actuator_id+1;
                        ;}
                
            }
    
 
    
    
        
            
            
        
            $new_actuator = $bdd -> query("INSERT INTO actuators VALUES($new_actuator_id,$room_id,'$new_actuator_type',$new_actuator_value)");
            $_POST["new_actuator_value"]=$_POST["type"]=NULL;
    

           
                        
}
if (isset($_POST['rmv_actuator'])) {
            $actuator_id=$_POST["rmv_actuator"];
            $delete_actuator= $bdd-> query("DELETE FROM actuators WHERE room_id=$room_id && actuator_id= $actuator_id");      
}
    
    

                    
                    
                    
                    
                    
=======
                
                <form action='' method='post'>
                
               <?php     
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
          
$actuator_content = $bdd->prepare("SELECT actuator_id, actuator_name FROM actuators WHERE actuators.room_id = $room_id ");  
$actuator_content -> execute (array($room_id));
                    
while ($data_3 = $actuator_content->fetch()){

<<<<<<< HEAD
        $actuator_id = $data_3["actuator_id"];
        
  
=======
        $actuator_id= $data_3["actuator_id"];
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
        $actuator_name= $data_3["actuator_name"];
        $tamp="actuator_".$data_3['actuator_id'];
        strval ($tamp);
        echo " 
        <tr> <td>Actuator name : </td>
            <td>" .$actuator_name . "</td>

        </tr><br>

<<<<<<< HEAD

        <tr> <td>Actuator number :</td>
            <td>" .$actuator_id."</td>
        </tr><br>";
        if ($actuator_name=='heater'){
               
                $actuator_value = $bdd->query("SELECT actuator_state FROM actuators WHERE room_id = $room_id AND actuator_id= $actuator_id");
                $data_actu= $actuator_value->fetch();
                $actuator_value=$data_actu["actuator_state"];
            
                echo "<tr> <td>Actuator value : </td>
                            <td><input type='range' value='".$actuator_value."' max='40' min='0' step='2' name='".$tamp."'></td>
                            </tr><br><tr> <td>Temperature :</td>
            <td>" .$actuator_value."</td><br>
        </tr><br>"
                            ;
            
            
            }
        else{
            echo "<tr> <td>Actuator value </td>
            <td><label><input type='radio' name='".$tamp."' value='on'>On</label>
            </td><td><label><input type='radio' name='".$tamp."' value='off'>Off</label><br>
            </td>
            </tr><br>";}}
         ?>
=======
        <tr> <td>Actuator number :</td>
            <td>" .$actuator_id."</td>
        </tr><br>
        <tr> <td>Actuator value </td>
            <td><input type='radio' name='".$tamp."'>
            </td><td><input type='radio' name='".$tamp."'><br>
            </td>
            </tr><br>";} ?>
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24

        
        
                <tr> 
                    <td><input type='submit' value='submit'></td>
                </tr><br>
            </form>
                </article>
<<<<<<< HEAD
            </div>
                
                <?php if ($user_privilege== 1){ 
                echo "
            <h4>Add an actuator</h4>
                <form action = 'Actuator.php?type=".$name_room."&number=".$room_number."&room_id=".$room_id."' method='post' >
                        
                
                        <label>Actuator's type</label><br>
                        <label><input type= 'radio' name='type' value='fan'>Fan</label><br>
                        <label><input type= 'radio' name='type' value='heater'>Heater</label><br>
                        <label><input type= 'radio' name='type' value='window'>Window</label><br>
                        <label><input type= 'radio' name='type' value='shutter'>Shutter</label><br>
                        
                        
                        <label> Actuator's value</label><br>
                        <input type='text' required name='new_actuator_value'><br>
                        <input type='submit' value = 'Add this actuator to my room'>
                </form>
 
            
            
                     
            <h4> Delete this Actuator </h4><br>
                <form action ='Actuator.php?type=".$name_room."&number=".$room_number."&room_id=".$room_id."' method='post' >
                     
                     <select name='actuator_removed'>
                     
                            <option>--SELECT AN ACTUATOR--</option>";
                     echo $room_id;
                         
          $actuator_content= $bdd->query("SELECT actuator_id, actuator_name FROM actuators WHERE room_id = $room_id ");  
          
                     while ($data_3 = $actuator_content->fetch()){
                $actuator_id= $data_3["actuator_id"];
                $actuator_name= $data_3["actuator_name"];   
                echo "<option value = '".$actuator_id."'>".$actuator_name." ".$actuator_id."</option><br>"; }
    
               echo   "</select><br> 
                <input type='hidden' name='rmv_actuator' value='0' />
                 <input type='checkbox' name ='rmv_actuator' value='1'>I want to definitively remove this actuator</p>
                 <input type='submit' value ='Remove' onclick='return confirm('I really want to delete this actuator');'>";} ?>
        
            
                
            
            
            </section>
    </body>
            
   
       <?php include "footer.php";?>
=======
        
            
                </div>
            
            
            </section>
        
    
    </body>
            
   
       
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
    </div>
    
         

<<<<<<< HEAD
    </main>
=======
    
      </main>  
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
        
        
</html>