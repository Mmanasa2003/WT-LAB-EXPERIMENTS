<?php

session_start();
if (isset($_SESSSION['user'])){
session_destroy();
header('location:login.html');
}
else{
    header("location:login.html");
}
?>