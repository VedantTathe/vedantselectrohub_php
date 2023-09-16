<?php
session_start();
include 'context_path.php';
setcookie("pimgname", "", time() - 3600);


    if($_GET['imgname'])
    {
        $imgnames = [];
        $imgname = $_GET['imgname'];
        // echo "<br>";
        // print_r($imgnames);

        if (isset($_COOKIE['pimgname'])) {      
            $imgnames = unserialize($_COOKIE['pimgname']);
        }

        // print_r($imgnames);
        // echo "<br>";
        

        array_push($imgnames, $imgname);

        setcookie('pimgname', serialize($imgnames), time() + (86400*30),"/");

        
        // print_r($imgnames);

        // echo "cookies set";

        $_SESSION['msg']="Product Added to your cart ..!";
        header("Location: $baseUrl/product_details.php?ClickedElem=".$imgname);

    }

?>