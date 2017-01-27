<?php session_start();
     
     ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="NEW_style.css">
       
        <title>Home automation Website</title>
    </head>
    
    <body>
        <header>
            <div class = "white">
                <h1>Domisep Gate<span class="point">.</span> </h1>
            </div>
                <nav>
                    <ul id="contener">
                        <li background = "piece_salon.jpg"><a href="NEW_homepage.php">Homepage</a></li>
                        <li><a href="NEW_homepage.php">About Us</a></li>
                        <li class="new-user" ><a href = "NEW_register.php"; class="nounderline">New User</a></li>

                    </ul>
                </nav>
        </header>
        
    <section id="main-image">
        
<?php echo "<aside> "; include "mdp.php" ; echo "</aside>";?>
        
    </section>
    
<?php include('footer.php'); ?>
