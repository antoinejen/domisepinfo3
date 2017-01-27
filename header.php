<<<<<<< HEAD
<?php $display = (!isset($_SESSION["login"])) ? "<a href = 'NEW_login.php' class='nounderline'>My Account</a>" : "<a href = \"logout.php\"; class=\"nounderline\"onclick=\"return confirm('See you soon');\">Logout</a>" ;?>
<header class = "greybg">
    <div class = "white">
        <h1>Domisep Gate<span class="point">.</span> </h1>
    </div>
    <nav>
        <ul id="contener">
            <?php if (isset($_SESSION["login"])) {echo "<h2 class = 'whitetxt'>Welcome to your home ".$username."</h2>";}; ?>
            <li class="li_header"><a href="My_Account_visitor.php" class="nounderline">Homepage</a></li>
            <li class="li_header"><a href = "NEW_homepage.php#description" class="nounderline">About Us</a></li>
            <li class="li_header"><?php echo $display ?></li>


        </ul>
    </nav>
</header>
=======
<header class="greybg" , class = "whitetxt">
        <h1 ><span class = "white";> DOMISEP</span></h1>
                
                <ul id = "conteneur">
                    <li class="li_header"><a href="Homepage_Domisep.php"; class="nounderline">Accueil</a></li>
                    <li class="li_header"><a href = "Description_Domisep.php"; class="nounderline">Description</a></li>
                    <li class="li_header" ><a href = "My_account_Domisep.php"; class="nounderline">My Account</a></li>
                    
                </ul>
                
    </header>
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
