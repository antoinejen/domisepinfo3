<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href = "Menu_vertical.css">
    <title>menu</title>
   
</head>

<?php

include('config.php');
//$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");

// we need to get many information from different table in the data base 


$home_id =$_SESSION["home_id"];
$user_id=$_SESSION["user_id"];
$owner_index=$_SESSION["owner_index"];




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

?> 
<body> 
<ul id ="menu-vertical" class="greytxt">
  <?php if ($count_bath2>0){?>
  <li class="grey"><a href="">Bathrooms</a>
        <ul> <?php
    $i=1;
    while ($i<=$count_bath2){ ?>
       <li><a href="Sensors.php?type=bath&number=<?php echo $i;?>" action = "" methode =GET > <?php 
                             
                             $room_number=$i;
                             $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE owner_index=$owner_index AND room_name='bath' AND room_nbr=$i");
                             $data_surname= $get_room_surname->fetch();
                             $room_surname=$data_surname["room_surname"];
                            
                             if ($room_surname != NULL) {
                                 echo $room_surname;
                             }else{
                                 echo "Bathroom ".$i ;}
                             
                             $i++ ; }?>  </a></li>
            
            
       
        </ul>
  </li><?php }
    
   if ($count_living2>0){?>
    <li class="grey"><a href="">Living-rooms</a>
        <ul>
            <?php
    $i=1;
    while ($i<=$count_living2 ){ ?>
       <li><a href="Sensors.php?type=living&number=<?php echo $i;?>"><?php 
                                
                             $room_number=$i;
                             $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE owner_index=$owner_index AND room_name='living' AND room_nbr=$i");
                             $data_surname= $get_room_surname->fetch();
                             $room_surname=$data_surname["room_surname"];
                            
                             if ($room_surname != NULL) {
                                 echo $room_surname;
                             }else{
                                echo "Living-Room ".$i;}
                             $i++;}?>  </a></li>
             
            
        
        </ul>
    </li>
    <?php }
    
   if ($count_bed2>0){?>
    <li class="grey"><a href="">Bedrooms</a>
        <ul>
             <?php
    $i=1;
    while ($i<=$count_bed2 ){ ?>
       <li><a href="Sensors.php?type=bed&number=<?php echo $i;?>"> <?php 
                             $room_number=$i;
                             $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE owner_index=$owner_index AND room_name='bed' AND room_nbr=$i");
                             $data_surname= $get_room_surname->fetch();
                             $room_surname=$data_surname["room_surname"];
                            
                             if ($room_surname != NULL) {
                                 echo $room_surname;
                             }else{
                             echo "Bedroom ".$i;}
                             $i++;}?></a></li>
            
        
        </ul>
    </li>
    <?php }
    
   if ($count_kitchen2>0){?>
    <li class="grey"><a href="">Kitchen</a>
        <ul><?php
    $i=1;
    while ($i<=$count_kitchen2 ){ ?><li><a href="Sensors.php?type=kitchen&number=<?php echo $i;?>"> <?php 
                             $room_number=$i;
                             $get_room_surname = $bdd-> query("SELECT room_surname FROM room WHERE owner_index=$owner_index AND room_name='kitchen' AND room_nbr=$i");
                             $data_surname= $get_room_surname->fetch();
                             $room_surname=$data_surname["room_surname"];
                            
                             if ($room_surname != NULL) {
                                 echo $room_surname;
                             }else{
                                 echo "Kitchen ".$i;}
                             $i++;}?></a></li>
            
        </ul>
    </li>
    <?php }?>
    <li class="grey"><a href="Sensors.php?type=garden&number=<?php echo $i;?>">Garden</a>
    </li>
 
</ul>
</body>
</html>