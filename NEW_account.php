<?php 
     session_start();

if (!isset($_SESSION["login"])){header("location:NEW_login.php");}
      ?>


<!DOCTYPE html>
<html>
    <head>
        
        <?php
$login = $_SESSION["login"];
include('config.php');
//$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");
$request_username = $bdd-> prepare("SELECT user_name FROM users WHERE user_login = ?");
$request_username->execute(array($login));
             $data = $request_username->fetch();
             $username = $data["user_name"];
            $_SESSION["USER_NAME"]=$data["user_name"];    


    ?>
    <meta charset="utf-8" />
    <link rel = "stylesheet" href = "NEW_style.css"/>
    <title>Welcome</title> 
    
    
    <body>
  
        <div id = "page"> 

            <header>
                <div class= "white">
                <h1>Domisep Gate<span class="point">.</span> </h1>
                </div>

                    <nav>   
                        <ul id="contener">
                    <li class="li_header"><a href="NEW_myhome"; class="nounderline">My Home</a></li>
                    <li class="li_header"><a href = "NEW_profile.php"; class="nounderline">Profile</a></li>
                    <li class="li_header"><a href = "logout.php"; class="nounderline">Logout</a></li>
                        </ul>
                    </nav> 

        </header>
         <section id="main-image">
                <div class="main">
                    <h2>Welcome to your home <br> <?php echo $username;?></h2>
                    <a href="My_Account_visitor.php" class="button2">My Home !</a>
                </div>
            </section></div>
        </body>


            
    
        
    <footer>
            <p>©Domisep - All right reserved</p>
    </footer>