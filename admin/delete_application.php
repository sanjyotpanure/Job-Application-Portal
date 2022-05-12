<?php
    include 'dbcon.php';

    $id = $_GET['id'];

    $deletequery = " delete from jobregistration where id = $id ";
    $dquery = mysqli_query($con, $deletequery);

    if ($dquery){
        ?>
            <script>alert("Deleted Successfully!");</script>
        <?php
        header('location: showdata.php');
    }else{
        ?>
            <script>alert("Deletion Unsuccessful!!!");</script>
        <?php
        header('location: showdata.php');
    }
