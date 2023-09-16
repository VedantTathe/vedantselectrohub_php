<?php
session_start();
require 'context_path.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        unset($_SESSION["msg"]);
        unset($_SESSION["error"]);

        $PName = $_POST["PName"];
        $PDesc = $_POST["PDesc"];
        $PCat = $_POST["PCat"];
        $price = $_POST["PPrice"];
        // $reviewsnum = $_POST["PReviewsNum"];
        // $rating = $_POST["PRating"];
        $PImageName = $_FILES["PImage"]["name"];

        echo $PName;
        echo $PDesc;
        echo $PCat;
        echo $price;
        // echo $reviewsnum;
        // echo $rating;
        echo $PImageName;

        $targetDir = "images/products/";
        $targetPath = $targetDir . $PImageName;

        move_uploaded_file($_FILES["PImage"]["tmp_name"], $targetPath);

        $conn = new mysqli("localhost", "root", "", "MyProject");

        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO products(pname, pdesc, pcat, price, imgname) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $PName, $PDesc, $PCat, $price, $PImageName);
        $stmt->execute();


        if ($stmt->affected_rows == 1) {
            
            $stmt->close();
            $conn->close();
            $_SESSION["msg"] = "Product Added Successfully..!";
            header("Location: ".$baseUrl."/admin.php");
            
        } else {
            throw new Exception("Something Went Wrong..!, Product Not Added...!");
        }

        
    } catch (Exception $ex) {
        echo $ex;
        $_SESSION["error"] = $ex;
        
        $stmt->close();
        $conn->close();
        header("Location: ".$baseUrl."/admin.php");
    }
}
?>
