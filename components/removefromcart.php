<?php
    session_start();
    require('context_path.php');
    if(isset($_COOKIE['pimgname']) && $_GET['ClickedElem']){
        $imgnames = unserialize($_COOKIE['pimgname']);
        $imgname = $_GET['ClickedElem'];
        print_r($imgnames);
        $key = array_search($imgname, $imgnames);
        echo "<br>".$key."<br>";
        unset($imgnames[$key]);

        print_r($imgnames);
        
        
        setcookie('pimgname', serialize($imgnames), time() + (86400*30),"/");

        $_SESSION['msg'] = "Product removed from cart ..!";
        header('Location: '.$baseUrl.'/mycart.php');

    }

?>