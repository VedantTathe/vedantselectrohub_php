<?php
session_start();
require('context_path.php');

include 'classes/user.php';

session_unset();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "localhost";
    $username = "root"; 
    $password = ""; 
    $database = "myproject"; 
    $conn = new mysqli($host, $username, $password, $database);

    
    $password = $_POST["Password"];
    $email = $_POST["Email"];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users where email = '".$email."'";

    $result = $conn->query($sql);

    

    if ($result->num_rows == 1) {
        echo("1");
       while($row = $result->fetch_assoc()) {
            $pswd = $row["pswd"];
            echo "2";

            if($pswd === $password)
            {
                echo "3";
                echo "login successfull";

                $user = new User($row["uname"],$row["sname"],$row["email"],$row["mno"],$row["pswd"],$row["addrs"],$row["utype"]);

                $_SESSION["user"] = serialize($user);
                $_SESSION["msg"] = "Login Successfull..!";

               
                $serializedUser = $_SESSION['user'];
                $myuser = unserialize($serializedUser);


                echo $myuser->getUname();

                header('Location: '.$baseUrl);
                

            }
            else
            {
               echo "4";
                $_SESSION["error"] = "Password is Wrong";
                header('Location: '.$baseUrl.'/login.php');
            }
        }
    } else {
        echo "5";
        echo "User Not Registered";
        $_SESSION["error"] = "Account Not Exist. Please First Register Here";
        header('Location: sign_up.php');
    }

    echo "6";
    $conn->close();


}


?>