<!-- <%@page import="java.util.Vector"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.io.File"%>
<%@page import="java.sql.*"%> -->
<?php
session_start();
require('components/context_path.php');
include 'components/classes/user.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            width: 100%;
        }

        .allproducts {
            height: auto;
            /*overflow-y: scroll;*/
            /*overflow-x: scroll;*/
        }

        .alert h3 {
            font-size: 1.2rem;
            width: fit-content;
            margin: auto;
        }

        .product {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            width: 16rem;
            
            /*width: min-content;*/
            position: relative;

        }

        .allproducts {
            display: flex;
            justify-content: start;
            align-items: center;
            flex-wrap: wrap;
            /*overflow-x: scroll;*/
        }

        .ellipsis {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            white-space: pre-wrap;
            margin: 5px;

            width: 85%;
            margin: auto;
        }

        .review {
            font-size: 1rem;
            background-color: #00ab00;
            width: fit-content;
            padding: 1px 5px;
            border-radius: 5px;
            margin: 0 5px 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap;

        }

        #products {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .product img {
            width: 100%;
        }

        .card {
            transition: 0.5s;
        }

        .card:hover {
            box-shadow: 14px 7px 25px -2px rgb(108, 108, 108);
        }

        .card:hover .ellipsis {
            color: rgb(0, 110, 236);
        }


        .card-body {
            /*padding: 0;*/

        }

        .search-box {
            width: 75%;
        }

        nav li {
            cursor: pointer;
        }

        nav a {
            text-decoration: none;
            color: #ffffff8c;
        }


        @media only screen and (max-width: 473px) {
            .card-body {}

            .product {
                padding: 0;

                width: 9.3rem;
            }


        }

        @media only screen and (max-width: 370px) {

            .product {

                width: 7.4rem;
            }

        }


        @media only screen and (max-width: 310px) {

            .product {

                width: 6.4rem;
            }


        }
    </style>
</head>

<body>
    <!---------------------------------------Navbar------------------------------------->
    <!-- <%@ include file = "components/navbar.jsp" %>

        <%            Vector<String> pimgname = new Vector<String>();
            Cookie[] cookies = request.getCookies();
            pimgname.clear();
            if (cookies != null) {
                for (Cookie cookie : cookies) {
//                    out.println(cookie.getName());
                    String x = cookie.getName().trim();
                    String name = x.substring(0, 6);
//                    out.println(name);
                    if (name.equals("mycart")) {
                        String imgname = cookie.getValue();
//                       out.println(imgname);
                        pimgname.add(imgname);
                    }
                }
            }


 String FName = "Your Full Name", Email = "Your Email", MNumber = "Your Mobile Number", Address = "Your Address";

                Object mynnuser = session.getAttribute("user");

                if (mynnuser != null) {
                    User contact_user = (User) mynnuser;

                    String Name = contact_user.getName();
                    String Sname = contact_user.getSname();
                    FName = Name + " " + Sname;
                    Email = contact_user.getEmail();
                    MNumber = contact_user.getMnumber();
                    Address = contact_user.getAddress();

                }
                
                String CartMsg = "Products";
                int z = 0;
        %>
         -->

    


    <?php
    include 'components/navbar.php';
    ?>
    <div id="mymodals">
        <!-- Modal for Add BuyProduct-->
        <div class="modal fade" id="buyproductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rebeccapurple; color:white;">
                        <h1 class="modal-title fs-5" id="buyproductModalLabel">Add Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <form action="<%=request.getContextPath() + "/BuyNowServlet"%>" method="get" enctype="multipart/form-data"> -->

                        <div>
                            <div class="mb-3">
                                <label class="form-label">Enter Your Full Name</label>
                                <input type="text" class="form-control" name="UName" id="user_name"
                                    placeholder="Your Full Name" value="<%=FName%>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Enter Your Address</label>
                                <textarea class="form-control" name="UAddrs" id="user_addrs" rows="3"
                                    placeholder="Your Address"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" placeholder="Your Email" name="UEmail"
                                    id="user_email" value="<%=Email%>" required>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mobile No.</label>
                                <input class="form-control" type="number" name="MNumber" id="mnumber"
                                    Placeholder="<%=MNumber%>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Enter Quantity</label>
                                <input class="form-control" type="number" name="QNumber" id="qnumber"
                                    Placeholder="Your Quantity" required>
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center align-items-center">
                            <button type="submit" id="registerbtn" class="btn mybtn">Submit</button>
                        </div>

                        </form>
                        <div>




                        </div>

                    </div>

                </div>
            </div>

        </div>



    </div>


    <div id="products" class="p-4 p-m-0">

        <h1 class="container m-auto pb-4 d-none" id="cart_msg" style="width: fit-content;">Products</h1>
        <h1 class="container m-auto pb-4 d-none" id="emptycart_msg" style="width: fit-content;">Your Cart is Empty</h1>
        <div class="container allproducts ">
            <!-- <% 
                   for (String img : pimgname) {

                        try {
                            DriverManager.registerDriver(new com.mysql.cj.jdbc.Driver());
                            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/MyProject", "root", "super");
                            String sql = "select * from products where imgname = ?";
                            PreparedStatement ps = con.prepareStatement(sql);
                            ps.setString(1, img);
                            ResultSet rs = ps.executeQuery();
                            

                %>



                <%                    if (rs.next()) {
                        String imgname = rs.getString("imgname");
                        String path = "components/images/products" + "/" + imgname;
                %>-->
                <?php
                $imgnames = [];
                
                if (isset($_COOKIE['pimgname'])) {      
            $imgnames = unserialize($_COOKIE['pimgname']);
            
           

        }
    $z = 0;
    $cartmsg = "Products";

    foreach ($imgnames as $imgname) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "MyProject";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM products where imgname = '".$imgname."'";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $path = "components/images/products" . "/" . $imgname;

    ?>
                
                
                
                
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <a onclick="call('<?=$imgname?>')" class="<?=$row['pcat']?> dynamic-product ALL"  style="text-decoration:  none;">
                        <div class="btn product">

                            <div class="card" style="border: none">
                                <div class="card-body">
                                    <img src="<?=$path?>" alt="<?=$imgname?>">

                                    <p class="ellipsis p-1"><?=$row['pname']?></p>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="review">
                                            <span><?=$row['rating']?></span>
                                            <i class="fa-solid fa-star"></i>
                                        </div>

                                        <span>(<?=$row['reviewsnum']?>)</span>
                                    </div>
                                    <div class="price pt-1">
                                        <strong>&#8377;<?=$row['price']?></strong>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </a>

                    <a >
                        <div>

                  <button  onclick="callrm('<?=$imgname?>')" class="btn mybtn" style="background-color:#fb641b;" id="rmbtn">
                                <i class="fa-sharp fa-solid fa-bag-shopping"  data-bs-toggle="modal" data-bs-target="#buyproductModal"></i> Remove</button>


                        </div>
                    </a>
                </div>
                <!--
                <%
                    z = 1;
                    }

                %>


                <%                    rs.close();
                            ps.close();
                            con.close();
                        } catch (Exception ex) {
                            System.out.println(ex);
                        }

                        

                    }

if(z==0)
CartMsg = "Your Cart is Empty";
                %>-->

                <?php
                $z=1;
            }
        }
        $conn->close();

    }
    if($z==0)
    $cartmsg = "Your Cart is Empty";
?>

            </div>

            <form action="<?=$baseUrl?>/product_details.php" method="get" id="hidden_form" class="d-none">
                <input type="text" id="clicked_elem" name="ClickedElem" value="" class="d-none"/>
            </form>
            <form action="<?=$baseUrl?>/components/removefromcart.php" method="get" id="hidden_form2" class="d-none">
                <input type="text" id="clicked_elem2" name="ClickedElem" value="" class="d-none"/>
            </form>
        </div>

        <!--<%@ include file = "components/js/javascript.html" %>-->

        <script>

            document.getElementById("home-link").classList.remove("active");
            document.getElementById("cart-link").classList.add("active");
            // <%
            // if(z==0){
            // %>
            <?php
            if($z==0){

            ?>
                
                
            document.querySelector("#emptycart_msg").classList.remove("d-none");
            
            // <%}
            // else
            // {
            //         %>
            <?php
            }
            else
            {
                

            ?>
            
            document.querySelector("#cart_msg").classList.remove("d-none");
            // <%}
            // %>
            <?php
            }

            ?>

            adjustHeight();

            function adjustHeight()
            {
                //get max width of product in cart

const productDivs = document.querySelectorAll('.card');

let maxHeight = 0;

productDivs.forEach(function (productDiv) {
  const Height = productDiv.offsetHeight;
  if (Height > maxHeight) {
    maxHeight = Height;
  }
});
productDivs.forEach(function (productDiv) {
  productDiv.style.height = maxHeight+'px';
  
});
            }
            

        </script> 

        <script src="components/js/index.js"></script>
</body>

</html>