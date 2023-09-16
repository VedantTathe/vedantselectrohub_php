<!-- <%@page import="Bean.User"%> -->


<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
    <div class="container">
        <!--<a class="navbar-brand" href="#hero-page">Vedant's Store</a>-->
        <img style="width:10rem;" src="components/images/abcmy.png" alt="abcmy.png" />
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="color: white;" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-lg-2">
                <li class="nav-item">
                    <a class="nav-link active" id="home-link" aria-current="page" href="<?= $baseUrl ?>#hero-page">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseUrl ?>#category">Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseUrl ?>#contact-us">Contact Us</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseUrl ?>/search.php">Search</a>

                </li>
                <!--                <li class="nav-item">
                    <a class="nav-link" href="<%//=request.getContextPath()%>/search.jsp"><i class="fa-solid fa-magnifying-glass"></i> Search</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" id="cart-link" href="<?= $baseUrl ?>/mycart.php"> <i
                            class="fa-solid fa-cart-shopping"></i> Cart</a>

                </li>
                <!-- <%
                    Object mynewuser = session.getAttribute("user");
                    if (mynewuser == null) {
                %> -->
                <?php
                if (!(isset($_SESSION['user']))) {
                    ?>
                    <li class="nav-item">
                        <button class="mybtn-nav btn nav-link"><a class=""
                                href="<?= $baseUrl ?>/login.php">Login</a></button>
                    </li>
                    <li class="nav-item">

                        <button class="mybtn-nav btn nav-link"><a class=""
                                href="<?= $baseUrl ?>/sign_up.php">Sign Up</a></button>
                    </li>
                    <!-- <%}  -->



                    <!-- else {
                    User myuser = (User) session.getAttribute("user");
                %>-->
                    <?php
                } else {
                    $serializedUser = $_SESSION['user'];
                    $myuser = unserialize($serializedUser);

                ?>
                    <li class="nav-item">
                        <a class="navbar-brand nav-link" href="#">Welcome <?= $myuser->getUname() ?></a>
                    </li>
                    <li class="nav-item">

                        <button class="mybtn-nav btn nav-link"><a
                                href="<?= $baseUrl ?>/components/logout.php">Logout</a></button>
                    </li>
                    <!-- <%
                    if (myuser.getType().equals("admin")) {
                %> -->
                    <?php
                    if ($myuser->getUtype() === "admin") {
                        ?>
                        <li class="nav-item">

                            <button class="mybtn-nav btn nav-link"><a href="<?= $baseUrl ?>/admin.php">Admin</a></button>
                        </li>
                        <!-- <%
                            }

                        }%> -->
                        <?php
                    }
                }
                ?>


            </ul>
        </div>
    </div>
</nav>
<!-- <%
    Object pmsg = session.getAttribute("msg");
    if (pmsg != null) {
%>-->
<?php

if (isset($_SESSION['msg'])) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h3>
            <!-- <%=(String) session.getAttribute("msg")%> -->
            <?=$_SESSION['msg']?>
        </h3>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <!--<%
        session.removeAttribute("msg");
        session.setAttribute("msg", null);
    }
%>
<%
    Object perr = session.getAttribute("error");
    if (perr != null) {
%>--->

<?php
        unset($_SESSION['msg']);
}
if(isset($_SESSION['error'])){
?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h3>
        <!-- <%=session.getAttribute("error")%> -->
        <?=$_SESSION['error']?>
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