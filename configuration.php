<?php
   define('DB_SERVER', 'localhost:3036');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'rootpassword');
   define('DB_DATABASE', 'database');
   $domisep = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>




echo $_POST["username"];
            echo $_POST["subpasswordb"];

            echo resultpw($_POST["username"],$_POST["subpassword"]);
            



            <!DOCTYPE html>
<html>
<?php 



function resultpw ($login,$password) {
                $login=$_POST["username"];
                $password = mysql_query("SELECT u_password FROM user WHERE u_name = $login ");
                $flag = 0;
                if ($_POST["submitpassword"] == $password ){
                        
                        $flag=1;
                }
                
                    return $flag;
             
};
?>


</html>
