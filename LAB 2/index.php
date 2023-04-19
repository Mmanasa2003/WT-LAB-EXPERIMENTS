<?php
session_start();
include_once("db_conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
    <style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
    form{
      background-color: beige;
    }
	</style>
    
</head>
<body>
    <div class="container2">

  <?php 
    include_once("db_conn.php");
    $email=$_SESSION['email'];
    $sql=" select full_name from users where email='$email'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        $row=mysqli_fetch_assoc($res);
        $full_name=$row['full_name'];
        $_SESSION['full_name']=$full_name;
        echo "WELCOME TO  ".$row['full_name'];
    }
    ?>
     <?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
    
     <form action="upload.php"
           method="post"
           enctype="multipart/form-data" >
           <input type="file" 
                  name="my_image">

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>
</html>