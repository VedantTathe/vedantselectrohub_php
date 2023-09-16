<?php

session_start();

require('context_path.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Name = $_POST['Name'];
    $Sname = $_POST['Sname'];
    $MNumber = $_POST['MNumber'];
    $Email = $_POST['Email'];
    $Message = $_POST['Message'];
    

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "MyProject";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO messages (name,sname,email,message,mnumber) VALUES (?,?,?,?,?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssss", $Name,$Sname,$Email,$Message,$MNumber);


    if ($stmt->execute()) {

       
        $_SESSION['msg'] = "Message Successfully Submited ..!";
        header('Location: ' . $baseUrl  );
    } else {

        $_SESSION['error'] = $stmt->error;
        header('Location: ' . $baseUrl);
    }



    $stmt->close();
    $conn->close();

    


}


?>

