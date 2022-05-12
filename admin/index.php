<?php

session_start();

    if (!isset($_SESSION['admin_username'])) {
        ?><script>alert("You are logged out!");</script>
        <?php
        header('location: admin_login.php');
    }
?>
<head>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <?php include '../links.php' ?>
    <?php include 'showdata.php' ?>
    
</head>
<body>

</body>
</html>
