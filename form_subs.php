<<<<<<< HEAD
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="NEW_style.css">
        <link href='http://fonts.googleapis.com/css?familly=Crete+Round' rel="stylesheet">
        <title>Home automation Website</title>
    </head>
    <section id="main-image">
                
        <h4> Setting </h4>
                
        <ul class="mdp2">           
            <article class="Bordure">
                <p>Please, fill out the form to modify your personal information:</br></br></p>
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
=======
<?php if (isset ($_POST["u_id"]) && isset($_POST["email"]) && isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["confpw"])){
    $bdd = new PDO("mysql:host=localhost;dbname=domisep","root","");
                
                      $flag=0;
                      $flag2=0;
                      $request_id = $bdd-> prepare("SELECT u_id FROM users WHERE u_id = ?");
                      $request_id->execute(array($_POST["u_id"]));
                      $data_id = $request_id->fetch();
                
                      if ($data_id==FALSE){$flag=1;
                                            }
                
                      $request_un = $bdd-> prepare("SELECT u_name FROM users WHERE u_name = ?");
                      $request_un->execute(array($_POST["login"]));
                      $data_un = $request_un->fetch();
                 
                      if ($data_un!=FALSE){$flag2=1;
                                               }
                
                
                
                      $formpassword=$_POST["password"];
                      $formconfpw =$_POST["confpw"];
                if ($formpassword==$formconfpw && $flag==0 && $flag2==0){
             
                  $snd = $bdd->prepare("UPDATE users SET u_name = :newname, u_password= :newpassword, u_email= :newemail WHERE u_id= :subid ");
                  $snd -> execute(array("newname" => $_POST["login"],
                                        "newpassword"=> $_POST["password"],
                                        "newemail"=>$_POST["email"],
                                        "subid"=>$_POST["u_id"]));
                    echo "Just a last step";}
    else if($flag>0){include "form_subs.php";
                echo "This Id doesn't exists, please try again";}
    
    
                else if($flag2>0){
                    echo "This Username has already been chosen by someone please try another one"; 
                    
                }
                else {
                    echo "The submited passwords are differents, try again";
                      }
}else { ?> 
                 
            <article class="Bordure">
                <p>Not a Member ? Please take the information sent by mail (User ID) and suscribe </p>
                    <br/>
                        <form method = "post" action = "">
                            <table >
                                <tr>
                                    <td>User id</td> 
                                    <td><input type = "text" name = "u_id"></td>
                           
                                </tr>
                                
                                <tr>
                                    <td>E-mail adress</td> 
                                    <td><input type = "text" name = "email"></td>
                                </tr>
                                <tr>
                                    <td>Username</td> 
                                    <td><input type = "text" name = "login"></td>
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
                                </tr>
            
                                <tr>
                                    <td>Password</td>
<<<<<<< HEAD
                                    <td><input type = "password" name = "new_password" required></td>
                                </tr>
                                <tr>
                                    <td>Confirm Password</td>
                                    <td><input type = "password" name = "confpw" required></td>
=======
                                    <td><input type = "password" name = "password"></td>
                                </tr>
                                <tr>
                                    <td>Confirm Password</td>
                                    <td><input type = "password" name = "confpw"></td>
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
                                </tr>
                                <tr>
                                    <td rowspan="2"><span class = "centretable"><input type ="submit" ></span></td>
                                    
                                </tr>
                            </table>
<<<<<<< HEAD
                        </form> 
           
=======
                            </form>
                
                
                        <?php } ?>
>>>>>>> 1628a96961244f7bb2348e49a4b0114fd10efc24
