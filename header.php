<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SON 's login</title>
    <link rel = 'stylesheet' href='styles.css'>

</head>
<body>
        <div class='bar'>
        <nav>
            <div id='logo'>
            <a href="#">
                
                <img src="dunk.jpg" alt="images">
            </a>
</div>
            <ul id='nav'>
                <li><a href="#">HOME</a></li>
                <li><a href="#">PORFOLIO</a></li>
                <li><a href="#">ABOUT ME</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>
            <div>
            <form action="includes/login.inc.php" method='post'>
            <input type="text" name='mailuid'placeholder='username/email'>
            <input type="password" name='pwd'placeholder='password'>
            <button type='submit' name='login-submit'>LOGIN</button>   
            </form>
            <a href="signup.php">Signup</a>
            <form action="includes/logout.inc.php" method="post" >
                <button type='submit' name='logout-submit'>LOGOUT</button>
            </form> 
        </div>
        </nav>
</div>

</body>
</html>