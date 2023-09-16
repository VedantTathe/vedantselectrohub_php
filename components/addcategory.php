<?php
session_start();
require 'context_path.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        unset($_SESSION["msg"]);
        unset($_SESSION["error"]);

        $CName = trim(strtoupper($_POST["CName"]));
        $CDesc = trim(strtoupper($_POST["CDesc"]));
        $CImageName = $_FILES["CImage"]["name"];

        $targetDir = "images/category/";
        $targetPath = $targetDir . $CImageName;

        move_uploaded_file($_FILES["CImage"]["tmp_name"], $targetPath);

        $conn = new mysqli("localhost", "root", "", "MyProject");

        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO category(cname, cdesc, cimgname) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $CName, $CDesc, $CImageName);
        $stmt->execute();

      

        if ($stmt->affected_rows == 1) {
            $stmt->close();
            $conn->close();
            $_SESSION["msg"] = "Category Added Successfully..!";
            header("Location: ".$baseUrl."/admin.php");
           
        } else {
            throw new Exception("Category Not Added...!");
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
