<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

// Check if the query parameter is set
if (isset($_POST['query'])) {
    $search_query = $_POST['query'];

    $host = "localhost";
    $username = "root"; 
    $password = ""; 
    $database = "myproject"; 
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to search for products
    $sql = "SELECT * FROM products WHERE pname LIKE '%$search_query%' or pcat like '%$search_query%'";

    // Execute the query
    $result = $conn->query($sql);

    // Display search results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imgname = $row['imgname'];
            $path = "components/images/products" . "/" . $imgname;
            ?>
<div class="searched_products d-flex justify-content-center align-items-center card overflow-hidden" style="width:100%; height:min-content;">
                    <a onclick="call('<?=$imgname?>')" class="<?=$row['pcat']?> dynamic-product ALL "  style="text-decoration:  none; ">
                        <div class="btn product" style=" width:100%;" >

                            <div class="" style="border: none;">
                                <div class="card-body d-flex  align-items-center" style="width:100%;">
                                    <img src="<?=$path?>" alt="<?=$imgname?>" style="height:7rem">

                                    <p class="ellipsis p-1"><?=$row['pname']?></p>
                                   
                                    <div class="price pt-1">
                                        <strong>&#8377;<?=$row['price']?></strong>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </a>

                </div>


<?php
        }
    } else {
        echo "<p>No results found</p>";
    }

    // Close the database connection
    $conn->close();
}

}

?>
