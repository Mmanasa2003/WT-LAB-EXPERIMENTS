<html>
    <head>
        <style>
            body{
                background-color: aliceblue ;
            }
            h2 {
                text-align:center;
            }
            a {
                text-decoration:none;
                background-color:gray;
                padding:10px;
                border-radius:5px;
                margin-left:45%;
            }
            
        input[type=submit] ,input[type=file]{
            border: none;
            border-radius: 5px;
            box-shadow: 0 3px 18px rgba(0,0,0,0.2);
            padding: 15px;
            background-color: rgb(46, 106, 106);
            color: white;
        }
        .full {
            padding-left:100px;
        }
        </style>
    </head>



<?php 
session_start();

?>
<body>
    

<h2><?php echo "Welcome ".$_SESSION['user']; ?> <br><br><br></h2>
<div class="full">

<form action="dashboard.php" method="post" enctype="multipart/form-data">
  <h3>choose Your image file here..<h3>
  <input type="file" name="file" id="file"><br>
  <h3>Upload Your file here...</h3>
  <input type="submit" value="Upload Image" name="submit"><br>
</form>

<?php
if(isset($_POST["submit"])){
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    echo "<br>";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    echo "<br>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  echo "<br>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 50000000) {
  echo "Sorry, your file is too large.";
  echo "<br>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  echo "<br>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  echo "<br>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";?>
    <br>
    <img src = "uploads/<?php echo $_FILES['file']['name'] ;?>" width="400px" height="200px">;
   <?php echo "<br>";
  } else {
    echo "Sorry, there was an error uploading your file.";
    echo "<br>";
  }
}}
?>

<h3>Do you want to logout</h3>
<form action="logout.php">
<input name = 'logo' type ='submit' id='sub' value ='logout'>
</form>

</div>
</body>
</html>