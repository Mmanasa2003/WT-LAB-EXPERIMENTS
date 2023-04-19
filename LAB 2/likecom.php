<?php 
session_start();

$idsc=500;
$butid=2000;
$commid=3000;
$conn=mysqli_connect('localhost','root','','tests_db');
if(!$conn){
   die("Connection Unsuccesfull");
}
$uname=$_SESSION['full_name'];
$i=$_SESSION['imgno'];
$sql="select * from images";
$z=mysqli_query($conn,$sql);
$cnt=mysqli_num_rows($z);
for($i=1;$i<=$cnt;$i++){
    if(isset($_POST[strval($butid)])){
        $sql="select * from liky where  full_name='$uname' and imgno='$i'";
        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)==0){
            $sql="UPDATE images SET likes=likes+1 WHERE imgno='$i'";
            $x=mysqli_query($conn,$sql);
            $sql="INSERT INTO liky(full_name, imgno) VALUES ('$uname','$i')";
            $x=mysqli_query($conn,$sql);
        }else{
            $sql="UPDATE images SET likes=likes-1 WHERE imgno='$i'";
            $x=mysqli_query($conn,$sql);
            $sql="DELETE FROM liky WHERE imgno='$i'";
            $x=mysqli_query($conn,$sql);
        }
        header('location:view.php');
        break;
    }
    $butid+=1;
}

$temu=$_SESSION['full_name'];
for($i=1;$i<=$cnt;$i++){
    
    if(isset($_POST[strval($commid)])){
        $comis=$_POST[strval($idsc+$i-1)];
        $sql="UPDATE images SET com='$temu',comm= '$comis'  WHERE imgno='$i'";
        $x=mysqli_query($conn,$sql);
        header('location:view.php');
        break;
    }
    $commid+=1;
}

?>