



<?php
require('context_path.php');
?>
<div id="products" class="p-4 p-m-0">
    <h1 class="product-heading container m-auto pb-4" style="width: fit-content;">Products</h1>
    <!-- <div> -->
    <!-- <%
                try {
                    DriverManager.registerDriver(new com.mysql.cj.jdbc.Driver());
                    Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/MyProject", "root", "super");
                    String sql = "select * from products";
                    PreparedStatement ps = con.prepareStatement(sql);
                    ResultSet rs = ps.executeQuery();
                    int count;
                    boolean flag = true;

                    while (flag) {

                        flag = false;
            %>
            <div class="container allproducts " >



                <%
                    count = 0;
                    while (rs.next()) {

                        String imgname = rs.getString("imgname");
                        String path = "components/images/products" + "/" + imgname;
                %>
                <a onclick="call('<%=imgname%>')" class="<%=rs.getString("pcat")%> dynamic-product ALL"  style="text-decoration:  none;">
                    <div class="btn product">

                        <div class="card" style="border: none">
                            <div class="card-body">
                                <img src="<%=path%>" alt="<%=imgname%>">

                                <p class="ellipsis p-1"><%=rs.getString("pname")%></p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="review">
                                        <span><%=rs.getString("rating")%></span>
                                        <i class="fa-solid fa-star"></i>
                                    </div>

                                    <span>(<%=rs.getString("reviewsnum")%>)</span>
                                </div>
                                <div class="price pt-1">
                                    <strong>&#8377;<%=rs.getString("price")%></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>


                <%
                        count = count + 1;
                        if (count >= 7) {
                            flag = true;
                            break;
                        }
                    }

                %>

            </div>

            <%        }

                    rs.close();
                    ps.close();
                    con.close();
                } catch (Exception ex) {
                    System.out.println(ex);
                }
            %> -->

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "MyProject";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $imgname = "";
    $path = "";

    if ($result->num_rows > 0) {
        $count;
        $flag = true;

        while ($flag) {

            $flag = false;

            echo "<div class='container allproducts' >";

            $count = 0;

            while ($row = $result->fetch_assoc()) {
                $imgname = $row["imgname"];
                $path = "components/images/products" . "/" . $imgname;

                echo '<a onclick=';
                echo '"call(';
                echo "'$imgname'";
                echo ')" ';
                
                echo "class='{$row['pcat']} dynamic-product ALL'  style='text-decoration: none;'>
                    <div class='btn product'>

                        <div class='card' style='border: none'>
                            <div class='card-body'>
                                <img src='{$path}' alt='{$imgname}'>

                                <p class='ellipsis p-1'>{$row['pname']}</p>
                                <div class='d-flex justify-content-center align-items-center'>
                                    <div class='review'>
                                        <span>{$row['rating']}</span>
                                        <i class='fa-solid fa-star'></i>
                                    </div>

                                    <span>({$row['reviewsnum']})</span>
                                </div>
                                <div class='price pt-1'>
                                    <strong>&#8377;{$row['price']}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

";

                $count = $count + 1;
                if ($count >= 7) {
                    $flag = true;
                    break;
                }
            }
echo "</div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
<!-- </div> -->
    <form action="<?=$baseUrl?>/product_details.php" method="get" id="hidden_form" class="d-none">
    <input type="text" id="clicked_elem" name="ClickedElem" value="" class="d-none" />
    </form>
</div>