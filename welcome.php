<?php
include('session.php');
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 12/12/16
 * Time: 16:36
 */
?>
<html>

<head>
    <title>Welcome </title>
</head>

<body>
<h1>Welcome <?php echo $login_session; ?></h1>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>

</html>

