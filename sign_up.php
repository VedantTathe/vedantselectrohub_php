<!-- <%@page contentType="text/html" pageEncoding="UTF-8"%> -->
<?php
session_start();
require('components/context_path.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <!-- <%@include file = "css/common_css_file.html" %> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <style>
        .mybtn {
            color: white;
            border: 1px solid white;
            transition: all ease 0.5s;
            background-color: #7600f7bf;
        }

        .mybtn:hover {
            background-color: white;
            color: black;
            border: 1px solid black;
            transform: translateY(-5px);
        }

        input {
            margin: 10px 0;

        }

        .alert h3 {
            font-size: 1.2rem;
            width: fit-content;
            margin: auto;
        }
    </style>
</head>

<body>
    <!-- <%
           Object err = session.getAttribute("error");
           if(err != null)
           {
       %> -->
    <?php

    if (isset($_SESSION['error'])) {

        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h3>
                <!-- <%=session.getAttribute("error")%>---->
                <?= $_SESSION['error'] ?>
            </h3>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- <%
           session.removeAttribute("error");
           session.setAttribute("error", null);
           }
       %> -->

        <?php
        unset($_SESSION['error']);
    }
    ?>
    <div class="d-flex align-items-center justify-content-center mt-5 mb-5" style="width: 100vw;">
        <div class="card container shadow p-0 col-10 col-md-6" style="background-color: #e5cdffbf;">
            <div class="rounded-top-2 text-center" style="background-color: #7600f7bf;">
                <h5 class="card-title p-2">Register Here</h5>

            </div>
            <div class="card-body text-center">


                <form action="<?= $baseUrl ?>/components/register.php" method="post" class="row d-flex
                          flex-column justify-content-center align-items-center">
                    <div class="container d-flex flex-column justify-content-center align-items-center col-md-8 col-12">
                        <div class="d-md-flex justify-content-center align-items-center gap-5 col-12">
                            <label class="form-label col-md-4 col-12 ">Name</label>
                            <input class="form-control col-md-8 col-12" type="text" name="Name" id="name"
                                placeholder="Your Name" required>

                        </div>

                        <div class="d-md-flex justify-content-center align-items-center gap-5 col-12">
                            <label class="form-label col-md-4 col-12">Surname</label>
                            <input class="form-control col-md-8 col-12" type="text" name="Sname" id="sname"
                                placeholder="Your Surname" required>

                        </div>
                        <div class="d-md-flex justify-content-center align-items-center gap-5 col-12">
                            <label class="form-label col-md-4 col-12">Email</label>
                            <input class="form-control col-md-8 col-12" type="email" name="Email" id="email"
                                placeholder="Your Email" required>

                        </div>



                        <div class="d-md-flex justify-content-center align-items-center gap-5 col-12">
                            <label class="form-label col-md-4 col-12">Mobile No.</label>
                            <input class="form-control col-md-8 col-12" type="number" name="MNumber" id="mnumber"
                                placeholder="Your Mobile Number" required>


                        </div>
                        <div class="d-md-flex justify-content-center align-items-center gap-5 col-12">
                            <label class="form-label col-md-4 col-12">Password</label>
                            <input class="form-control col-md-8 col-12" type="password" name="Password" id="password"
                                placeholder="Enter Password Here" required>

                        </div>
                        <div class="d-md-flex justify-content-center align-items-center gap-5 col-12">
                            <label class="form-label col-md-4 col-12">Address</label>
                            <textarea class="form-control col-md-8 col-12" name="Address" id="address" rows="4"
                                placeholder="Your Address" autocomplete="off" required></textarea>

                        </div>
                    </div>
                    <p class="card-text m-0 col-10 p-3"><a href="<?=$baseUrl?>/login.php" class="nav-link text-primary">If Account is
                            Already Created
                            Then Click Here</a></p>


                    <div class="col-12">
                        <button type="submit" id="registerbtn" class="mybtn btn"
                            style="color: black; border: 1px solid black;" disabled>Register</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <script>


        let btn = document.getElementById('registerbtn');
        btn.disabled = true;
        let num = document.getElementById('mnumber');
        //                btn.onmouseover = 'check()';


        function check() {
            if (num.value.length > 10) {
                num.value = num.value.slice(0, 10);
            } else if (num.value.length == 10) {
                btn.disabled = false;
            } else {
                btn.disabled = true;
            }
        }

        num.addEventListener("input", check);

    </script>
</body>

</html>