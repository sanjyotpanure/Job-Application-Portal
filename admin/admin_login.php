<?php
    include 'dbcon.php';
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <title>Log In</title>

    <?php include '../links.php'; ?>
</head>

<body>
    <?php

        if (isset($_POST['submit'])) {
            $admin_username = $_POST['admin_username'];
            $pass = $_POST['password'];

            $admin_check = " select * from admin_login where admin_user_name='$admin_username' ";
            $query = mysqli_query($con, $admin_check);

            $admin_count = mysqli_num_rows($query);

            if ($admin_count>0) {
                $admin_check = mysqli_fetch_assoc($query);
                $dbpass = $admin_check['admin_password'];

                session_start();
                $_SESSION['admin_username'] = $admin_check['admin_user_name'];

                $passDecrypt = password_verify($pass, $dbpass);
                if ($passDecrypt) {
                    ?> <script>alert("Login Successful!");</script>
                    <?php
                    header('location: index.php');
                }else {
                    ?>
                        <script>alert("Incorrect Password!");</script>
                    <?php
                }
            }else {
                ?>
                    <script>alert("Invalid User Details!");</script>
                <?php
            }
        }
    ?>

    <div class="jumbotron text-center" style="margin-bottom:0">
    <h1>Job Application Portal</h1>
    </div>

    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h3 class="card-title mt-3 text-center">Login To Admin Panel</h3>

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input name="admin_username" type="text" placeholder="Enter User Name" class="form-control" required>
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
            </form>
        </article>
    </div>

</body>
</html>