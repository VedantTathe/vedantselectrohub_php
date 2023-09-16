<!-- <%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="Bean.User"%>
<%@page import="java.sql.*"%> -->
<?php
session_start();
require 'components/context_path.php';
require 'components/classes/user.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- <%@ include file = "components/css/common_css_file.html" %>
        <%@ include file = "components/css/responsive_style.html" %> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="components/css/style.css">
    <link rel="stylesheet" href="components/css/responsive_css.css">

    <style>
        .alert h3 {
            font-size: 1.2rem;
            width: fit-content;
            margin: auto;
        }

        .mybtn-nav {

            color: white;
            border: 1px solid white;
            transition: all ease 0.5s;
            padding: 3.5px;
            margin: 4px 5px;

            width: 5rem;
        }

        .mybtn-nav a {

            color: #ffffffbf;
            text-decoration: none;
        }

        .mybtn:disabled {
            color: white;
            background-color: #777777;
            border: 1px solid white;
        }

        .mybtn {
            color: white;
            border: 1px solid white;
            transition: all ease 0.5s;
            /* background-color: #323232bf; */
            background-color: rebeccapurple;
        }

        .mybtn:hover {
            background-color: white;
            color: black;
            border: 1px solid black;
        }

        input {
            margin: 10px 0;

        }

        .mybtn:hover {
            transform: translateY(-5px);
        }

        /* menu-page */

        /* .menu {
                width: 40%;
                overflow: hidden;
            } */

        .menu img {
            padding: 15px;
        }

        .menu h4 {
            width: fit-content;
            margin: auto;
            padding: 5px;
        }

        .box {
            width: 50%;
        }

        .card:hover {
            box-shadow: 14px 7px 25px -2px rgb(108, 108, 108);
            background-color: #aaaaaa;
        }

        td,
        th {
            text-wrap: nowrap;
            padding: 1px 2px;
        }

        @media only screen and (max-width: 768px) {
            .box {
                width: 80%;
            }
        }

        @media only screen and (max-width: 996px) {
            .modal {
                height: 80vmax;
            }
        }
    </style>

</head>

<!-- <% Object mynewuser1=session.getAttribute("user"); if (mynewuser1==null) {
    response.sendRedirect(request.getContextPath()); } else { User myuser1=(User) session.getAttribute("user");
    if(!myuser1.getType().equals("admin")) { response.sendRedirect(request.getContextPath()); } } %> -->

<?php

if (isset($_SESSION['user'])) {
    $myuser = unserialize($_SESSION['user']);
    if ($myuser->getUtype() === "admin") {
    } else {
        header('Location: ' . $baseUrl);
    }
} else {
    header('Location: ' . $baseUrl);
}

?>

<body style="background-color: grey  ;">


    <div>

        <div id="navbar">
            <nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
                <div class="container">
                    <!--<a class="navbar-brand" href="#hero-page">Vedant's Store</a>-->
                    <img style="width:10rem;" src="components/images/abcmy.png" alt="abcmy.png" />
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" style="color: white;" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-lg-2">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="<?= $baseUrl ?>">Home</a>
                                <!--<a class="nav-link" aria-current="page" href="index.html">Home</a>-->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#userModal" href="">Users</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#productModal"
                                    href="">Add-Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#categoryModal"
                                    href="">Add-Category</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#msgModal"
                                    href="">Messages</a>
                            </li>
                            <!--<li class="nav-item  active">
                                    <button class="mybtn-nav btn nav-link "><a
                                    href="components/admin.jsp">Admin</a></button>
                                </li>-->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- <% Object msg=session.getAttribute("msg"); if (msg !=null) { %> -->
        <?php
        if (isset($_SESSION['msg'])) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h3>
                    <?= $_SESSION['msg'] ?>
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!-- <% session.removeAttribute("msg"); session.setAttribute("msg", null); } %>
                    <% Object err=session.getAttribute("error"); if (err !=null) { %> -->

            <?php
            unset($_SESSION['msg']);
        }
        if (isset($_SESSION['error'])) {
            ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h3>
                    <!-- <%=session.getAttribute("error")%> -->
                    <?= $_SESSION['error'] ?>
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!---
                                <%
                                        session.removeAttribute("error");
                                        session.setAttribute("error", null);
                                    }
                                %> -->

            <?php
            unset($_SESSION['error']);
        }
        ?>

        <div id="menu_page">
            <div id="mymodals">
                <div class="mymodal">

                    <!-- Modal for Users-->
                    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: rebeccapurple; color:white;">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Total Users
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class=" container border-1 border-black text-center ">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Moble No.</th>
                                            <th>Password</th>
                                            <th>Address</th>
                                            <th>Type</th>

                                        </tr>

                                        <!-- <% try { DriverManager.registerDriver(new
                                                                com.mysql.cj.jdbc.Driver()); Connection
                                                                con=DriverManager.getConnection("jdbc:mysql://localhost:3306/MyProject", "root"
                                                                , "super" ); String sql="select * from user" ;
                                                                PreparedStatement ps=con.prepareStatement(sql);
                                                                ResultSet rs=ps.executeQuery(); while (rs.next()) { %>

                                        <tr>
                                            <td>
                                                <%=rs.getString("id")%>
                                            </td>
                                            <td>
                                                <%=rs.getString("uname")%>
                                            </td>
                                            <td>
                                                <%=rs.getString("sname")%>
                                            </td>
                                            <td>
                                                <%=rs.getString("email")%>
                                            </td>
                                            <td>
                                                <%=rs.getString("mno")%>
                                            </td>
                                            <td>
                                                <%=rs.getString("pswd")%>
                                            </td>
                                            <td>
                                                <%=rs.getString("addrs")%>
                                            </td>
                                            <td>
                                                <%=rs.getString("utype")%>
                                            </td>
                                        </tr>
                                        <% } rs.close(); ps.close(); con.close(); } catch
                                                                    (Exception ex) { System.out.println(ex); } %> -->


                                        <?php
                                        try {
                                            $conn = new mysqli("localhost", "root", "", "MyProject");

                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            $sql = "SELECT * FROM users";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["id"] . "</td>";
                                                echo "<td>" . $row["uname"] . "</td>";
                                                echo "<td>" . $row["sname"] . "</td>";
                                                echo "<td>" . $row["email"] . "</td>";
                                                echo "<td>" . $row["mno"] . "</td>";
                                                echo "<td>" . $row["pswd"] . "</td>";
                                                echo "<td>" . $row["addrs"] . "</td>";
                                                echo "<td>" . $row["utype"] . "</td>";
                                                echo "</tr>";
                                            }

                                            $stmt->close();
                                            $conn->close();
                                        } catch (Exception $ex) {
                                            echo $ex;
                                        }
                                        ?>


                                    </table>
                                </div>
                                <div class="modal-footer d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn mybtn" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Add Product-->
                    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: rebeccapurple; color:white;">
                                    <h1 class="modal-title fs-5" id="productModalLabel">Add Product
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= $baseUrl ?>/components/addproduct.php" method="post"
                                        enctype="multipart/form-data">

                                        <div>
                                            <div class="mb-3">
                                                <label class="form-label">Product Name</label>
                                                <input type="text" class="form-control" name="PName" id="product_name"
                                                    placeholder="Your Product Name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Product
                                                    Description</label>
                                                <textarea class="form-control" name="PDesc" rows="3"
                                                    placeholder="Your Product Description (Feautures, Specification, etc)"></textarea>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label class="form-label">Product Category</label>
                                                <input type="text" class="form-control d-none" name="PCat" id="product_cat" placeholder="Your Product Category" required>
                                                <select id="select" name="PCat" class="form-control">
                                                    <option>
                                                        Select Category
                                                    </option>
                                                    <% try { DriverManager.registerDriver(new
                                                                            com.mysql.cj.jdbc.Driver()); Connection
                                                                            con=DriverManager.getConnection("jdbc:mysql://localhost:3306/MyProject", "root"
                                                                            , "super" ); String
                                                                            sql="select * from category" ;
                                                                            PreparedStatement
                                                                            ps=con.prepareStatement(sql); ResultSet
                                                                            rs=ps.executeQuery(); while (rs.next()) { %>
                                                    <option>
                                                        <%=rs.getString("cname")%>
                                                    </option>
                                                    <% } rs.close(); ps.close(); con.close(); }
                                                                                catch (Exception ex) {
                                                                                System.out.println(ex); } %>
                                                </select>
                                            </div> -->
                                            <div class="mb-3">
                                                <label class="form-label">Product Category</label>
                                                <select id="select" name="PCat" class="form-control">
                                                    <option>Select Category</option>
                                                    <?php
                                                    try {
                                                        $conn = new mysqli("localhost", "root", "", "MyProject");

                                                        if ($conn->connect_error) {
                                                            die("Connection failed: " . $conn->connect_error);
                                                        }

                                                        $sql = "SELECT * FROM category";
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->execute();
                                                        $result = $stmt->get_result();

                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<option>' . $row["cname"] . '</option>';
                                                        }

                                                        $stmt->close();
                                                        $conn->close();
                                                    } catch (Exception $ex) {
                                                        echo $ex;
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Product Price</label>
                                                <input type="number" class="form-control" name="PPrice"
                                                    id="product_price" placeholder="Your Product Price" required>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label class="form-label">Products Total Reviews
                                                    Number</label>
                                                <input type="number" class="form-control" name="PReviewsNum"
                                                    id="product_reviews_num"
                                                    placeholder="Your Product Reviews Total Number" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Product Rating</label>
                                                <input type="text" maxlength="3" class="form-control" name="PRating"
                                                    id="product_rating" placeholder="Your Product Rating Ex(4.6)"
                                                    required>
                                            </div> -->
                                            <div class="mb-3">
                                                <label class="form-label">Upload Product
                                                    Image</label>
                                                <input type="file" class="form-control" name="PImage" id="pimage"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center align-items-center">
                                            <button type="submit" id="pbtn" class="btn mybtn">Submit</button>
                                        </div>

                                    </form>
                                    <div>




                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- Modal for Add Category-->
                    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <form action="<?= $baseUrl ?>/components/addcategory.php" method="post"
                                    enctype="multipart/form-data">
                                    <div class="modal-header" style="background-color: rebeccapurple; color:white;">
                                        <h1 class="modal-title fs-5" id="categoryModalLabel">Add
                                            Category</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Category Name</label>
                                            <input type="text" class="form-control" name="CName" id="category_name"
                                                placeholder="Your Category Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Category Description</label>
                                            <textarea class="form-control" name="CDesc" rows="3"
                                                placeholder="Your Product Category Description" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Upload Category Image</label>
                                            <input type="file" class="form-control" name="CImage" id="cimage" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center align-items-center">
                                        <button type="submit" id="cbtn" class="btn mybtn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Modal for Messages-->
                    <div class="modal fade" id="msgModal" tabindex="-1" aria-labelledby="msgModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: rebeccapurple; color:white;">
                                    <h1 class="modal-title fs-5" id="msgModalLabel">Messages</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class=" container border-1 border-black text-center ">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Moble No.</th>
                                            <th>Message</th>
                                        </tr>
                                        <!-- <% try { DriverManager.registerDriver(new
                                                                com.mysql.cj.jdbc.Driver()); Connection
                                                                con=DriverManager.getConnection("jdbc:mysql://localhost:3306/MyProject", "root"
                                                                , "super" ); String sql="select * from messages" ;
                                                                PreparedStatement ps=con.prepareStatement(sql);
                                                                ResultSet rs=ps.executeQuery(); while (rs.next()) { %>
                                        <tr>
                                            <td>
                                                <%=rs.getString("id")%>
                                            </td>
                                            <td>
                                                <%=rs.getString("uname")%>
                                            </td>
                                            <td>
                                                <%=rs.getString("sname")%>
                                            </td>
                                            <td>
                                                <%=rs.getString("email")%>
                                            </td>
                                            <td>
                                                <%=rs.getString("mno")%>
                                            </td>
                                            <td>
                                                <%=rs.getString("msg")%>
                                            </td>
                                        </tr>
                                        <% } rs.close(); ps.close(); con.close(); } catch
                                                                    (Exception ex) { System.out.println(ex); } %> -->
                                        <?php
                                        try {
                                            $conn = new mysqli("localhost", "root", "", "MyProject");

                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            $sql = "SELECT * FROM messages";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["id"] . "</td>";
                                                echo "<td>" . $row["name"] . "</td>";
                                                echo "<td>" . $row["sname"] . "</td>";
                                                echo "<td>" . $row["email"] . "</td>";
                                                echo "<td>" . $row["mnumber"] . "</td>";
                                                echo "<td>" . $row["message"] . "</td>";
                                                echo "</tr>";
                                            }

                                            $stmt->close();
                                            $conn->close();
                                        } catch (Exception $ex) {
                                            echo $ex;
                                        }
                                        ?>



                                    </table>
                                </div>
                                <div class="modal-footer d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn mybtn" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>






                    <div>
                        <div style="background-color: grey;">
                            <div
                                class="box p-4 container d-flex flex-column justify-content-center gap-3  align-items-center  ">
                                <div class="row w-100 d-flex justify-content-center align-items-center gap-3 gap-md-5">
                                    <div class="card menu col-sm-5 btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#userModal">
                                        <img src="components/images/user.png" alt="">
                                        <h4>Users</h4>
                                    </div>
                                    <div class="card menu col-sm-5 btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#productModal">
                                        <img src="components/images/product.png" alt="">
                                        <h4>Product</h4>
                                    </div>
                                </div>

                                <div
                                    class="row w-100 d-flex justify-content-center  align-items-center  gap-3 gap-md-5">

                                    <div class="card menu col-sm-5 btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#categoryModal">
                                        <img src="components/images/category.png" alt="">
                                        <h4>Category</h4>
                                    </div>
                                    <div class="card menu col-sm-5 btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#msgModal">
                                        <img src="components/images/message.png" alt="">
                                        <h4>Message</h4>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>


                </div>

            </div>

</body>

</html>