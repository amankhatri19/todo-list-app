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

        <?php
            $empty_name = true;
            $empty_pass = true;
            $result = false;
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                include 'dbconnect.php';
                $exists = false;
                if(empty($_POST['username'])){
                    echo "Email is Required";
                }
                else{
                    $email = $_POST['username'];
                    $empty_name = false;
                }
                if(empty($_POST['pass'])){
                    echo "Password is Required";
                }
                else{
                    $password = $_POST['pass'];
                    $empty_pass = false;
                }
                
                $sql_getquery = "select * from users where username='$email'";
                $rslt = mysqli_query($conn, $sql_getquery);
                $num = mysqli_num_rows($rslt);
                if($num > 0){
                   $exists = true;
                   echo "Email alredy exists";
                }

                if(($exists == false) && (!$empty_name) && (!$empty_pass)){
                    $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$email', '$password', current_timestamp())";
                    $result = mysqli_query($conn, $sql);
                }
                if($result){
                    echo '<div class="alert alert-success" role="alert">
                    <strong>SUCCESS!</strong> You can now Log in
                  </div>';
                }
            }
        ?>


        <h2>Sign Up Page</h2>

        <form action="signup.php" method="post">
            <div class="form-group col-md-8">
                <input type="email" name="username" placeholder="Enter your e-mail address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-light">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group col-md-8">
                <input type="password" name="pass" placeholder="Enter your password" class="form-control" id="exampleInputPassword1">
            </div>
            
            <button type="submit" id="btn-sumbit" class="btn btn-warning">Sign Up</button>
        </form>
        <div class="login">
            Click here to <a href="login.php">Log In</a>
        </div>
    </div>
    



   <script src="index.js"></script>
</body>
</html>