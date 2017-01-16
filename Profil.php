<?php session_start(); 
if (!isset($_SESSION["login"])){header("location:Homepage_Domisep2.php");}


$login=$_SESSION["login"];


$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");
$request_username = $bdd-> prepare("SELECT user_name,user_email,home_id FROM users WHERE user_login = ?");
$request_username->execute(array($login));
$data = $request_username->fetch();
    $user_name = $data["user_name"];
    $user_email= $data["user_email"];
    $home_id= $data["home_id"];
$_SESSION["home-id"]=$home_id;



$request_address= $bdd-> prepare("SELECT home_address FROM home WHERE home_id = ?");
$request_address->execute(array($home_id));
            $data2 = $request_address -> fetch();
            $home_address = $data2["home_address"];
$_SESSION["user_name"]=$user_name;


    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
      <link rel = "stylesheet" href = "Domisep.css"/>
        <title>Home - Profil</title> 
    <head>
  
    <div id = "page"> 
    
    <header class="greybg" , class = "whitetxt">
        <h1 class="whitetxt">DOMISEP</h1>
        <div id="conteneur">   
     
         <h2 class = "whitetxt">Welcome to your home <?php
             
             echo $user_name;?>
            </h2> 
        <ul id="conteneur">
            <li class="li_header"><a href="My_Account_visitor.php"; class="nounderline">Home</a></li>
            <li class="li_header"><a href = "Profil.php"; class="nounderline">Profil</a></li>
            <li class="li_header"><a href = "logout.php"; class="nounderline">Logout</a></li>
            
                    
        </ul>
        </div>
                
    </header>
    <body>
        
        <section>
            
        <div id = "conteneur">
            
            <article class="Bordure">
                <h1> Here are your basic informations </h1>
                <?php echo "<tr>
                    <td>Name : </td>
                    <td>" . $user_name . "</td><br><br>
                <tr>
                    <td>Login : </td>
                    <td>". $_SESSION["login"] . " </td><br><br>
                </tr>
                    
                <tr>
                    <td>Email : </td>
                    <td>" . $user_email . "</td><br><br>
                </tr>
                 <tr>
                    <td>Address : </td>
                    <td>" . $home_address." </td><br><br>
                    
                </tr>"; 
                ?>
                
               
            
                <p>You can modify them at your convenience by clicking on <a href= "Setting.php"> this link</a> </p>
            </article>
        
            
        </div>
        </section>
        
     
    </body>
            
    <?php include "footer.php";?>
       
    </div>
    
         

    
        </main>
        
        
</html>