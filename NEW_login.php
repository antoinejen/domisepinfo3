<?php session_start();
     
     ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="NEW_style.css">
        <link href='http://fonts.googleapis.com/css?familly=Crete+Round' rel="stylesheet">
        <title>Domotic Website</title>
    </head>
    
    <body>
        <header>
            <div class = "white">
                <h1>Domisep Gate<span class="point">.</span> </h1>
            </div>
                <nav>
                    <ul id="contener">
                        <li class="main-image"><a href="NEW_homepage.php">Homepage</a></li>
                        <li><a href="NEW_homepage.php">About Us</a></li>
                        <li class="new-user" ><a href = "NEW_register.php"; class="nounderline">New User</a></li>

                    </ul>
                </nav>
        </header>
        
    <section id="main-image">
        
<?php echo "<aside> "; include "mdp.php" ; echo "</aside>";?>
        
    </section>
    
    <footer>
            <p>©Domisep - All right reserved</p>
</footer>
