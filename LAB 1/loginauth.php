

<?php
session_start();
if(isset($_POST["submit"]))
{
    $un = $_POST['username'];
    $pwd = $_POST['pwd'];
    $con = mysqli_connect('localhost','gayathri','gayathri','gayathri');

    $sql = "select * from users where name='$un' and password='$pwd'";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0) 
    {
        $_SESSION['user'] = $un;
        header('location:dashboard.php');
    }
    else
    {
        header('location:login.html');
    }
}