<form>
    <input type="user">
    <input type="Password">
    <input type="submit">
</form>
<?php
include_once("connectdb.php");
if(isset($_REQUEST["submit"]))
{
    $un=$_REQUEST["un"];
    $pw=$_REQUEST["pwd"];
    $sql="select * from users where un=$un and pw=$pwd";
    $res=mysqli_query($conn,$sql);
    if (mysqli_num_rows($res)>0)
    {
        $_SESSION["$users"]=$un;
        header("Location:dashboard.php");
    }
    else{
        header("Location:login.php");
    }

}

