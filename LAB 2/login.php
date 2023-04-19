<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Titillium+Web:wght@700&display=swap');
</style>
</head>

<body>
<h1 align="center" style="margin-top: 5%;color:blue;">FACEBOOK</h1>
    <div class="container">
        <?php
        require_once "database.php";
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    var_dump($_POST);
                    $_SESSION["full_name"]=$_POST["full_name"];
                    
                    $_SESSION["email"]=$email;
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
            mysqli_close($conn);
        }
        ?>
        <div class="box box1">
            <div class="new">
                <h2 align="center" style="background-color:aliceblue;">Top Views</h2>
            </div>
           
            <?php 
            include "db_conn.php";
          $sql = "SELECT * FROM images ORDER BY likes DESC";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             <div class="alb" style="margin:2%;padding:10px;background-color: white;box-shadow:1px 3px 18px rgb(0,0,0,0.3);border-radius:10px;">
                <span><h4 align="left"><?php echo $images['full_name'];?>   </h4></span>
                <span><h4 align="right" style="margin-top:-10%;margin-left:-5%;"><?php echo "Likes:".$images['likes'];?></h4></span>
             	<img style="margin:2%;margin-top:-1%;margin-left:15%;" src="uploads/<?=$images['image_url']?>" width="300px" height="300px">
             </div>
          		
    <?php }}?>
        </div>
        <div class="box box2">
      <form action="login.php" method="post">
        <h2 align="center" style="color: blue;">LOGIN</h2>
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p align="center">Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
    </div>
</body>
</html>