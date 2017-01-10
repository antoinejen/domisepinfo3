<?php session_start(); 
if (!isset($_SESSION["login"])){header("location:NEW_homepage.php");}


$login=$_SESSION["login"];


$bdd = new PDO("mysql:host=localhost;dbname=domisep_new2","root","");
$request_username = $bdd-> prepare("SELECT user_name,user_email,home_id FROM users WHERE user_login = ?");
$request_username->execute(array($login));
$data = $request_username->fetch();
    $user_name = $data["user_name"];
    $user_email= $data["user_email"];
    $home_id= $data["home_id"];



$request_address= $bdd-> prepare("SELECT home_address FROM home WHERE home_id = ?");
$request_address->execute(array($home_id));
            $data2 = $request_address -> fetch();
            $home_address = $data2["home_address"];
$_SESSION["user_name"]=$user_name;
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
      <link rel = "stylesheet" href = "NEW_style.css"/>
        <title>Welcome</title> 
    <head>
    
    <body>
  
    <div id = "page"> 
    
    <header>
        <div class= "white">
        <h1>Domisep Gate<span class="point">.</span> </h1>
        </div>
            <nav>   
                <ul id="contener">
            <li class="li_header"><a href="NEW_myhome.php"; class="nounderline">My Home</a></li>
            <li class="li_header"><a href="NEW_account.php"; class="nounderline">Welcome</a></li>
            <li class="li_header" ><a href = "logout.php"; class="nounderline">Logout</a></li>
                </ul>
            </nav>            
    </header>
        
    <div class="overlay3">
        
        <section id="pic">
            
        </div>
            
    </div>
        
    <div class="overlay2">
        
                <section id="title"> Here are your basic informations <br>      You can modify them at your convenience</section>
                
                <section id="info">
                    
                <?php echo "<tr>
                    <td>Login : </td>
                    <td>". $_SESSION["login"] . " </td><br><br>
                </tr>
                
                    <td>Name : </td>
                    <td>" . $user_name . "</td><br><br>
                <tr>
                    
                <tr>
                    <td>Email : </td>
                    <td>" . $user_email . "</td><br><br>
                </tr>
                 <tr>
                    <td>Address : </td>
                    <td>" . $home_address." </td><br><br>
                    
                </tr>"; 
                ?>
                    
                </section>
                    
                     <a href="NEW_setting.php" class="button4">Setting</a>
    
        </div>
        
        
    </body>
               
        
    <footer>
            <p>©Domisep - All right reserved</p>
    </footer>

        
</html>