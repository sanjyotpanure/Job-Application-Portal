<?php
    include 'admin/dbcon.php';
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <title>Log In</title>

    <?php include './links.php'; ?>
</head>

<body>
    <?php 

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $pass = $_POST['password'];

            $email_check = " select * from user_info where email='$email' ";

            $query = mysqli_query($con, $email_check);

            $email_count = mysqli_num_rows($query);

            if (($email_count>0)){
                $email_pass = mysqli_fetch_assoc($query);
                $dbpass = $email_pass['password'];
                
                session_start();
                $_SESSION['username'] = $email_pass['username'];
                $_SESSION['uphone'] = $email_pass['phone'];
                $_SESSION['email'] = $email_pass['email'];
                $_SESSION['id'] = $email_pass['id'];

                $passDecrypt = password_verify($pass, $dbpass);
                if ($passDecrypt) {
                    ?> <script>alert("Login Successful!");</script>
                    <?php
                    header('location: index.php');
                }else {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center">
                            <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> Incorrect Password! </strong>
                        </div>
                    <?php
                }
            }else {
                ?>
                    <!-- <script>alert("Invalid User Details!");</script> -->
                    <div class="alert alert-danger alert-dismissible fade show text-center">
                        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> User does not exist in our records! </strong>
                    </div>
                <?php
            }
        }
    ?>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Job Application Portal</h1>
    </div>

    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Login To Your Account</h4>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input name="email" type="email" placeholder="Enter User Email" class="form-control" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input name="password" type="password" placeholder="Enter Password" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success btn-block">Log In</button>
                </div>
                <p class="text-center">Don't have an account? <a href="registration.php">Register here</a></p>
            </form>
        </article>
    </div>

</body>
</html>