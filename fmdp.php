<?php 
$bdd = new PDO("mysql:host=localhost;dbname=domisep","root","");
function fmdp ($login,$password) {
                $login=$_POST["username"];
                $password = $bdd–> query("SELECT u_password FROM users WHERE u_name = $login ");
                $flag = 0;
                if ($_POST["subpassword"] = = $password ){
                        echo "Welcome Home ",$login;
                        $flag=1;
                }
                else if($password == false){
                    echo "Inexistant username, or wrong combinaison password username";
                }
                else{ echo "NIQUÉ";}
                    return $flag;
             
                }
        ?>
                

      

