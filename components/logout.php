<?php
session_start();
require('context_path.php');
if(isset($_SESSION['user']))
{
    unset($_SESSION["user"]);
    $_SESSION['msg'] = "Logout Successfull..!";
}
header('Location: '.$baseUrl);  

?>