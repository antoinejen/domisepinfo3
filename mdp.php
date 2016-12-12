
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
	