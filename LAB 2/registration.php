<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box box3">
        <?php
        $sname = "localhost";
        $uname = "root";
        $password = "";
        
        $db_name = "tests_db";
        
        $conn = mysqli_connect($sname, $uname, $password, $db_name);
        
        if (!$conn) {
            echo "Connection failed!";
            exit();
        }
        if (isset($_POST["submit"])) {
           $full_name = $_POST["full_name"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($full_name) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           
            $sql = "INSERT INTO users (full_name, email, password) VALUES ('$full_name', '$email', '$passwordHash')";
            if(mysqli_query($conn,$sql))
            {
                echo "You are registered successfully.";

            }
            
           
            else{
                die("Something went wrong");
            }
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0)
            {
                $_SESSION['email']=$email;
                $_SESSION['password']=$password;
                
            }
           }
        
        ?>
        <form action="registration.php" method="post">
        <h2 align="center" style="color: blue;">SIGN UP</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="full_name" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="emamil" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
    </div>
</body>
</html>