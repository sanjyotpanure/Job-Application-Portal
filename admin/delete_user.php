<?php
    include 'dbcon.php';

    $id = $_GET['id'];

    $deletequery = " delete from user_info where id = $id ";
    $dquery = mysqli_query($con, $deletequery);

    if ($dquery){
        ?>
            <script>alert("Deleted Successfully!");</script>
        <?php
        header('location: show_users.php');
    }else{
        ?>
            <script>alert("Deletion Unsuccessful!!!");</script>
        <?php
        header('location: show_users.php');
    }
