<?php
session_start();

require('context_path.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $FName = $_POST['UName'];
    $Addrs = $_POST['UAddrs'];
    $MNumber = $_POST['MNumber'];
    $Quantity = $_POST['QNumber'];
    
    $Oname = $_SESSION['oname'];
    $OPrice = $_SESSION['oprice'];

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "MyProject";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO orders (oname,oprice,fname,addrs,mno,quantity) VALUES (?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssssss", $Oname, $OPrice, $FName, $Addrs,$MNumber,$Quantity);


    if ($stmt->execute()) {

        $pcat = $_SESSION['pcat'];

        if($Quantity<2)
        $pcat = substr($pcat,0,strlen($pcat)-1);
        else
        $pcat = $Quantity." ".$pcat;

        $_SESSION['msg'] = "Your order Placed Successfully and your ".$pcat." Will be dilivered soon..!";
        header('Location: ' . $baseUrl  );
    } else {

        $_SESSION['error'] = $stmt->error;
        header('Location: ' . $baseUrl);
    }

    unset($_SESSION['pcat']);
    unset($_SESSION['oname']);
    unset($_SESSION['oprice']);



    $stmt->close();
    $conn->close();

    


}


?>