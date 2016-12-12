<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
      <link rel = "stylesheet" href = "Domisep.css"/>
        <title>Domisep - Inscr</title> 
    <head>
  
    <div id = "page"> 
    <?php include "header.php";?>

    <body>
        <div id = "conteneur">
        <?php 
        $login=$password=$confpw="";
        while ($password != $confpw){
            echo "<h2> Les deux mots de passe sont différents";
            $password = NULL;
            $confpw = NULL;
            
        if ($_SERVER["REQUEST_METHOD"]== "POST"){
            $login = test_input($_POST["login"]);
            $password = test_input($_POST["password"]);
            $confpw = test_input($_POST["confpw"]);}}
       

        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;}
        ?>
        <section>         
            <article class="Bordure">
                <p>Inscrivez-vous dès aujourd'hui pour profiter de ce site !</p>
                    <br/>
                        <form method = "post" action = "">
                            <table >
                                <tr>
                                    <td>User id</td> 
                                    <td><input type = "text" name = "u_id"></td>
                                </tr>
                                <tr>
                                    <td>Login</td> 
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
                                    
                                    <td><input type ="submit" ></td>
                                </tr>
                            </table>
                            </form>
                
                <?php 
                    echo "<h2>Your given details are as : <h2>";
                    echo $login;
                    echo "<br>";
                    echo $password
                ?>
            </article>
        
            
                
            </section>
        
     </div>
    </body>
            
    <?php include "footer.php";?>
       
    
    
         

    
        </main>
        
        
</html>
