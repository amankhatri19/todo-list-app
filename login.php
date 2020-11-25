<?php
    $login = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'dbconnect.php';
                
        $email = $_POST['username'];
        $password = $_POST['passwrd'];

        $sql = "select * from users where username='$email' AND password='$password' ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            $login = true;
            header("location: welcome.php");
        }

        if($login){
            echo '<div class="alert alert-success" role="alert">
                    <strong>SUCCESS!</strong> You are Logged In
                  </div>';
        }
        else{
            echo '<div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> Invalid Credentials
                  </div>';
        }


    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div id="container">
        <img src="assets/images/loginimg.png" alt="login" width="250" height="250" style="border-radius: 150%;">
        <h2>User Login</h2>

        <form action="login.php" method="post">
            <div class="form-group col-md-8">
                
                <input type="email" name="username" class="form-control" placeholder="Enter your e-mail address" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-light">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group col-md-8">
                <input type="password" name="passwrd" placeholder="Enter your password" class="form-control" id="exampleInputPassword1">
            </div>
            
            <button type="submit" id="btn-sumbit" class="btn btn-warning">Log In</button>
        </form>
        <div class="sign-up">
            Not a User? <a href="signup.php">Sign Up</a>
        </div>
    </div>
    



   <script src="index.js"></script>
</body>
</html>