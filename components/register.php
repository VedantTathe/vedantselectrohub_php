<?php
session_start();
require "context_path.php";
include "classes/user.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "MyProject";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (uname,sname,email,mno,pswd,addrs,utype) VALUES (?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);

    $Name = $_POST['Name'];
    $SName = $_POST['Sname'];
    $Email = $_POST['Email'];
    $MNumber = $_POST['MNumber'];
    $Password = $_POST['Password'];
    $Address = $_POST['Address'];
    $UType = "normal";

    $stmt->bind_param("sssssss", $Name, $SName, $Email, $MNumber, $Password, $Address, $UType);


    if ($stmt->execute()) {


        $user = new User($Name, $SName, $Email, $MNumber, $Password, $Address, $UType);
        
        $_SESSION["user"] = serialize($user);
        
        $_SESSION['msg'] = "Registration Successfull..!";
        header('Location: ' . $baseUrl);
    } else {

        $_SESSION['error'] = $stmt->error;
        header('Location: ' . $baseUrl . '/sign_up.php');
    }



    $stmt->close();
    $conn->close();

}


?>