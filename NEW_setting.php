
<?php session_start();
if (!isset($_SESSION["login"])){
    include "logout.php";
} ?>

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
            <li class="li_header"><a href=""; class="nounderline">My Home</a></li>
            <li class="li_header"><a href="My_Account_visitor.php"; class="nounderline">Welcome</a></li>
            <li class="li_header" ><a href = "logout.php"; class="nounderline">Logout</a></li>
                </ul>
            </nav>    
    </header>

    <body>
        
        <section>
            
            
            <div id = "conteneur">
        
<?php if (isset($_POST["new_email"]) && isset($_POST["new_login"]) && isset($_POST["new_password"]) && isset($_POST["confpw"])){
    
    
    
     //Function Isset will tell us if there are values inside the different post variable, so if the form has already been filled out
    
    
                $bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");


            // we link our page to the DB


                $request_login = $bdd-> prepare("SELECT user_login FROM users WHERE user_login=?");
                $request_login->execute(array($_POST["new_login"]));
                $data_cont = $request_login->fetch();
                $test_login=$data_cont["user_login"] ;
                $cur_login_exist=0;//0 :existe ,1 : n'existe pas 
    echo $_SESSION["home_id"];
    
                if ( $test_login==NULL )
                    {$cur_login_exist=1;}

                //We test if the 2 submitted passwords are the same
                
                $formpassword=$_POST["new_password"];
                $formconfpw =$_POST["confpw"];
    
                if ($formpassword==$formconfpw && $cur_login_exist==1)
                    {   $snd = $bdd->prepare("UPDATE users SET user_name = :newname, user_login = :newlogin, user_password= :newpassword, user_email= :newemail WHERE user_login= :login ");
                     
                        $snd -> execute(array("newname" => $_POST["new_name"],
                                        "newlogin" => $_POST["new_login"],
                                        "newpassword"=> $_POST["new_password"],
                                        "newemail"=>$_POST["new_email"],
                                        "login"=>$_SESSION["login"]));
                    
                        $home_id=$_SESSION["home_id"];
                        
                        $home_address= $bdd-> prepare("UPDATE home SET home_address = :newaddress WHERE home_id = :id");
                        $home_address ->execute(array("newaddress"=>$_POST["new_address"],"id"=>$home_id));
                                       
                        echo "<article class='Bordure'>";
                        $_SESSION["login"]=$_POST["new_login"]; $_POST["new_login"]=$_POST["new_password"]=$_POST["new_email"]=NULL;
                        header("location:New_profile.php");
                        echo "</article>";} 
    
    
                 
                 elseif($cur_login_exist==0){
                        echo "<article class='Bordure'>";
                        include "form_subs.php";
                        echo "This Username has already been chosen by someone please try another one";
                        $_POST["new_login"]=$_POST["new_password"]=$_POST["new_email"]=$_POST["new_login"]=NULL;
                        $cur_login_exist=0;
                        $no_email=0;
                        echo "</article>";} 
    
                else {      
                        echo "<article class='Bordure'>";
                        include "./form_subs.php";
                        echo "The submited passwords are differents, try again";
                        $_POST["new_login"]=$_POST["new_password"]=$_POST["new_email"]=$_POST["new_login"]=NULL;
                        $cur_login_exist=0;
                        $no_email=0;
                        echo "</article>";}}  
        else { ?> 
                
    <section id="main-image">
                
        <h4> Setting </h4>
                
        <ul class="mdp2">           
            <article class="Bordure">
                <p>Please, fill out the form to modify your personnal information:</p><br><br>
                        <form action = "NEW_setting.php" method = "post" >
                            <table >
                                
                                 <tr>
                                    <td>Name</td> 
                                    <td><input type = "text" name = "new_name" ></td>
                                </tr>
                                 <tr>
                                    <td>Login</td> 
                                    <td><input type = "text" name = "new_login" ></td>
                                </tr>
                                <tr>
                                    <td>E-mail address</td> 
                                    <td><input type = "text" name = "new_email" ></td>
                                </tr>
                                <tr>
                                    <td>Address</td> 
                                    <td><input type = "text" name = "new_address" ></td>
                                </tr>
            
                                <tr>
                                    <td>Password</td>
                                    <td><input type = "password" name = "new_password" required></td>
                                </tr>
                                <tr>
                                    <td>Confirm Password</td>
                                    <td><input type = "password" name = "confpw" required></td>
                                </tr>
                                <tr>
                                    <td rowspan="2"><span class = "centretable"><input type ="submit" ></span></td>
                                    
                                </tr>
                            </table>
                        </form> 
            </article>
                
    <?php } ?>
                
        
            
                </div>
            </section>
        
     
    </body>
            
    <footer>
            <p>©Domisep - All right reserved</p>
    </footer>

    
        </main>
        
        
</html>