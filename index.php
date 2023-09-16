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
    <title>Home</title>
    <!-- <%@ include file = "components/css/common_css_file.html" %>
        <%@ include file = "components/css/style.html" %>
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
    </style>

</head>

<body>
    <div>

        <div>
            <!-- <%
                    Object mypobj = session.getAttribute("direct_product");
                    if (mypobj != null) {
                        String str = (String) session.getAttribute("direct_product");
                        str = str.trim().toUpperCase();
                        if (str.equals("TRUE")) {
                            response.sendRedirect(request.getContextPath()+"/product_details.jsp");
                        }
                        session.removeAttribute("direct_product");
                        session.setAttribute("direct_product", null);
                    }
                    %> -->
            <div id="hero-page">
                <!---------------------------------------Navbar------------------------------------->
                <!-- <%@ include file = "components/navbar.jsp" %> -->
                <!---------------------------------------Hero Section------------------------------------->
                <!-- <%@ include file = "components/hero.jsp" %> -->
                <?php
                include 'components/navbar.php';
                include 'components/hero.php';
                include 'components/category.php';
                include 'components/products.php';
                include 'components/location.php';
                include 'components/contact.php';
                include 'components/footer.php';
                ?>
                
            </div>
            <!---------------------------------------Category Section------------------------------------->
            <!-- <%@ include file = "components/category.jsp" %> -->
            <!---------------------------------------Products Section------------------------------------->
            <!-- <%@ include file = "components/products.jsp" %> -->
            <!---------------------------------------Location Section------------------------------------->
            <!-- <%@ include file = "components/location.jsp" %> -->
            <!---------------------------------------Contact Section------------------------------------->
            <!-- <%@ include file = "components/contact.jsp" %> -->
            <!---------------------------------------Footer Section------------------------------------->
            <!-- <%@ include file = "components/footer.jsp" %> -->

        </div>
    </div>
    <!-- <%@ include file = "components/js/javascript.html" %> -->
    <script src="components/js/index.js"></script>
  
</body>

</html>