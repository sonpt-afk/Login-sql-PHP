<?php 
if(isset($_POST['signup-submit'])){
    require 'dbh.inc.php';  
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    if(empty($username)||empty($email)||empty($password)||empty($passwordRepeat)){
        header("Location:../signup.php?error=emptyfields&uid=".$username."&email=".$email);
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invalidmail&invaliduid");
        exit();

    }
     else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
     }   
     else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
         header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
        }
    else if($password !== $passwordRepeat){
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
        exit();
    }
    else{
        $sql = "SELECT uidUsers FROM new_users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt,$sql)){
         header("Location: ../signup.php?error=sqlerror");
         exit();

        }
    else{
        mysqli_stmt_bind_param($stmt,"s",  $usernames);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck>0){
            header("Location: ../signup.php?error=userTaken&mail=".$email);
            exit();
        }
        else{
        $sql = "INSERT INTO new_users(uidUsers,emailUsers,pwdUsers) VALUE(?,?,?)";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
   
           }
           else{
               $hashPwd = password_hash($password,PASSWORD_DEFAULT);
               mysqli_stmt_bind_param($stmt,"sss",$username,$email, $hashPwd );
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?signup=success");
                exit();
           }
        }
    }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
else{
    header("Location: ../signup.php");
    exit();
}
?>