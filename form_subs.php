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
                                </tr>
            
                                <tr>
                                    <td>Password</td>
                                    <td><input type = "password" name = "password"></td>
                                </tr>
                                <tr>
                                    <td>Confirm Password</td>
                                    <td><input type = "password" name = "confpw"></td>
                                </tr>
                                <tr>
                                    <td rowspan="2"><span class = "centretable"><input type ="submit" ></span></td>
                                    
                                </tr>
                            </table>
                            </form>
                
                
                        <?php } ?>