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
           