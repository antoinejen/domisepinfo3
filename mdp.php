<?php 

$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");?>

<?php   
    
		if ( isset($_POST["userlogin"]) && isset($_POST["subpassword"])) {
			function fmdp ($login,$password) {
                $bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");
                
                $request_password = $bdd-> prepare("SELECT user_password FROM users WHERE user_login = ?");
                $request_password->execute(array($_POST["userlogin"]));
                $data = $request_password->fetch();
                $password = $data["user_password"];
                
              
            
                
                if ($_POST["subpassword"] == $password )
                    {
                    $_SESSION["login"]=$_POST["userlogin"];
                    header("location:NEW_account.php");
                    }
                
                else{
                     
                    $_POST["userlogin"]=NULL;
                     $_POST["subpassword"]=NULL;
                     include "mdp.php";
                     echo "<p>Wrong information</p>";}
                
               
                
                    return $login;
             
                }
           
             fmdp($_POST["userlogin"],$_POST["subpassword"]);
                
        }
		else { ?>
            <form action="" method="post">
            <h3> Connection </h3>
            
                <ul class="mdp1">
                    <li><label>Username</label>
                        <input type="text" name ="userlogin" required=""><br><br></li>
                    <li><label> Password</label>
                        <input type="password" name="subpassword" required="">
                    </li>
                    <li>
                    <div class="button3">
                        <input type="submit" value="Log-in"></div>
                    </li>
                </ul>
    </section>
        </form>  
		<?php } ?>

	