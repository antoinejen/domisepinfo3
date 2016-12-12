<?php
include('session.php');
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
      <link rel = "stylesheet" href = "Domisep.css"/>
        <title>Home - Bathrooms</title> 
    <head>
  
    <div id = "page"> 
    
    <header class="greybg" , class = "whitetxt">
        <h1 class="whitetxt">DOMISEP</h1>
        <div id="conteneur">   
             
         <h2 class = "whitetxt">Welcome to your home <?php echo $login_session; ?>
            </h2> 
        <ul id="conteneur">
            <li class="li_header"><a href="Homepage_Domisep.php"; class="nounderline">Accueil</a></li>
            <li class="li_header"><a href = "Description_Domisep.php"; class="nounderline">Description</a></li>
            <li class="li_header"><a href = "My_account_Domisep.php"; class="nounderline">My Account</a></li>
            <li class="li_header"><a href = "logout.php"; class="nounderline">Sign Out</a></li>

        </ul>
        </div>

    </header>
    <body>

        <section>

        <div id = "conteneur">
            <nav>
                <?php include "Menu_vertical.php"?>
            </nav>
            <article class="Bordure">
                <h1> Form this webstie you basicaly have a total control over your dear House</h1>
                <p>You can visualize how the different spaces of your house are behaving and have access to the actuators we placed in it.</p>
            </article>


        </div>
        </section>


    </body>

    <?php include "footer.php";?>

    </div>




        </main>
        
        
</html>