<<<<<<< HEAD
<?php 

include('config.php');
//$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","root");
    
    if ( isset($_POST["userlogin"]) && isset($_POST["subpassword"])) {
        function fmdp ($login,$password) {
            include('config.php');
            //$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");

            $request_password = $bdd-> prepare("SELECT user_password FROM users WHERE user_login = ?");
            $request_password->execute(array($_POST["userlogin"]));
            $data = $request_password->fetch();
            $password = $data["user_password"];




            if ($_POST["subpassword"] == $password )
                {
                $_SESSION["login"]=$_POST["userlogin"];
                header("location:My_Account_visitor.php");
                }

            else{

                $_POST["userlogin"]=NULL;
                 $_POST["subpassword"]=NULL;
                  echo "<form action='' method='post'>
        <h3> Connection </h3>
        
            <ul class='mdp1'>
                <li><label>Username</label>
                    <input type='text' name ='userlogin' required><br><br></li>
                <li><label> Password</label>
                    <input type='password' name='subpassword' required>
                </li>
                <li>
                <div class='button3'>
                    <input type='submit' value='Log-in'></div>
                </li>
                <li>Wrong information</li>
            </ul>
                
    </form>"
                ;}



                return $login;

            }

         fmdp($_POST["userlogin"],$_POST["subpassword"]);

    }
    else { ?>
        <form action="" method="post">
        <h3> Connection </h3>

            <ul class="mdp1">
                <li><label>Username</label>
                    <input type="text" name ="userlogin" required><br><br></li>
                <li><label> Password</label>
                    <input type="password" name="subpassword" required>
                </li>
                <li>
                <div class="button3">
                    <input type="submit" value="Log-in"></div>
                </li>
            </ul>

    </form>
    <?php } ?>

=======

<!DOCTYPE html>
<html>
<?php   
    
		if ( isset($_POST["username"]) && isset($_POST["subpassword"])) {
			function fmdp ($login,$password) {
                $bdd = new PDO("mysql:host=localhost;dbname=domisep","root","");
                $login=$_POST["username"];
                $request_password = $bdd-> prepare("SELECT u_name,u_password FROM users WHERE u_name = ?");
                $request_password->execute(array($_POST["username"]));
                $data = $request_password->fetch();
                $password=$data["u_password"];
                $flag=0;
                
                
                
                
                $request_un = $bdd-> prepare("SELECT u_name FROM users WHERE u_name = ?");
                      $request_un->execute(array($_POST["username"]));
                      $data_un = $request_un->fetch();
                 
                      if ($data_un==FALSE){
                          $_POST["username"]=NULL;
                     $_POST["subpassword"]=NULL;
                     include "mdp.php";
                    echo "<p>Wrong username</p>";
                      }
                else if ($_POST["subpassword"] == $password )
                    {
                    header("Location: My_Account_visitor.php");
                    $login=$_POST["username"];
                    }
                
                else if ($password==false){
                    $_POST["username"]=NULL;
                     $_POST["subpassword"]=NULL;
                     include "mdp.php";
                    echo "<p>Wrong username</p>";
                
                    
                }
                else{$_POST["username"]=NULL;
                     $_POST["subpassword"]=NULL;
                     include "mdp.php";
                     echo "<p>Wrong password</p>";}
                    
                
               
                
                    return $login;
             
                }
           
             fmdp($_POST["username"],$_POST["subpassword"]);
                
        }
		else {?>
    <form action="My_Account_visitor.php" method="POST">
                    <h1> Connect</h1>
                    <label>Username</label><br>
                    <input type="text" name ="username" required=""><br>
                    <label> Password</label><br>
                    <input type="password" name="subpassword" required=""><br>                 
                    <input type="submit">
    </form>
		<?php } ?>
</html>
	
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
