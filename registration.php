<!-- <?php
    // session_start();
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="registration.css">

    <?php include 'links.php'; ?>
</head>
<body>
    <?php 
        include 'admin/dbcon.php';

        if (isset($_POST['submit'])){
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

            $passEncrypt = password_hash($password, PASSWORD_BCRYPT);
            $cpassEncrypt = password_hash($password, PASSWORD_BCRYPT);

            $emailquery = " select * from user_info where email='$email' ";
            $query = mysqli_query($con, $emailquery);
            $emailcount = mysqli_num_rows($query);

            if ($emailcount>0) {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show text-center">
                        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> Email already exists! </strong>
                    </div>
                <?php
            }else {
                if ($password === $cpassword) {
                    
                    $insertquery = " insert into user_info(username, email, phone, password, cpassword) 
                    values('$username','$email','$phone','$passEncrypt','$cpassEncrypt') ";

                    $iquery = mysqli_query($con, $insertquery);

                    if ($iquery) {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show text-center">
                                <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> Account Created Successfully. <a href="login.php">Click here to login</a>
                            </div>
                        <?php
                    }else{
                        ?>
                            <script>
                                alert("Not Inserted");
                            </script>
                        <?php
                    }

                }else {
                    ?>
                        <script>
                            alert("Password not matching!");
                        </script>
                    <?php
                }
            }
        }
    ?>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Job Application Portal</h1>
        <p class="text-center">Register with us immediately and get your dream job.</p>
    </div>
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input name="username" type="text" maxlength="50" placeholder="Enter Full Name" class="form-control" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input name="email" type="email" placeholder="Enter Email" class="form-control" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input name="phone" type="text" maxlength="10" placeholder="Phone Number" class="form-control" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input name="password" type="password" placeholder="Create Password" value="" class="form-control" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input name="cpassword" type="password" placeholder="Confirm Password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
                </div>
                <p class="text-center">Already registered? <a href="login.php">Log In</a></p>
            </form>
        </article>
    </div>
    <script>
        $(document).ready(function() {
            $("#warning-alert").hide();
            // $("#myWish").click(function showAlert() {
            //     $("#warning-alert").delay(10000).slideUp(500, function() {
            //     $("#warning-alert").delay(10000).slideUp(500);
            //     });
            // });
        });
    </script>
</body>
</html>