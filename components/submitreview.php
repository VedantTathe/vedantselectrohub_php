<?php
session_start();
require 'context_path.php';
// Check if the POST request contains Rating, Message, and Imgname parameters
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the POST request
    $rating = $_POST['Rating'];
    $message = $_POST['Message'];
    $imgname = $_POST['Imgname'];

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "MyProject";

    $stmtSelect = null;
    $stmtUpdate = null;
    $conn = null;

    try {
        // Create a database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve the current reviewsnum for the given imgname
        $sqlSelect = "SELECT reviewsnum,sum FROM products WHERE imgname = ?";
        $stmtSelect = $conn->prepare($sqlSelect);
        $stmtSelect->bind_param("s", $imgname);
        $stmtSelect->execute();
        $resultSelect = $stmtSelect->get_result();

        if ($resultSelect->num_rows > 0) {
            $row = $resultSelect->fetch_assoc();
            $reviewsnum = $row['reviewsnum'];
            $sum = $row['sum'];
            $sum += $rating;
            $avg = $sum/$reviewsnum;
            round($avg,1);
            $rating = $avg;

            // Increment the reviewsnum by 1
            $reviewsnum++;

            // Update the rating and pfeedback in the database
            $sqlUpdate = "UPDATE products SET rating = ?, pfeedback = ?, reviewsnum = ?, sum = ? WHERE imgname = ?";
            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->bind_param("dsiis", $rating, $message, $reviewsnum, $sum, $imgname);

            if ($stmtUpdate->execute()) {
                $_SESSION['msg'] = "Review Submited Successfully";
                header("Location: ".$baseUrl."/product_details.php?ClickedElem=".$imgname);
                // echo var_dump($imgname);
                // echo var_dump($reviewsnum);
                // echo var_dump($rating);
                // echo var_dump($message);
                $stmtSelect->close();
                $stmtUpdate->close();
                $conn->close();
            } else {
                // Error: Data update failed
                throw new Exception("Error updating data: " . $stmtUpdate->error);
            }
        } else {
            // Error: No record found for the given imgname
            throw new Exception("No record found for imgname: " . $imgname);
        }

        // Close the database connection


    } catch (Exception $ex) {
        $_SESSION['error'] = $ex;
        header("Location: ".$baseUrl."/product_details.php?ClickedElem=".$imgname);
        echo $imgname;
    }

}
?>