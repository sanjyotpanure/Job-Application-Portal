<?php 
    include 'admin/dbcon.php';
    include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <?php include './links.php' ?>
    <style>
        p{
            font-size: 1.2rem; 
        }        
        .btnApply{
            float: right;
            width: 40%;
            text-decoration: none;
            padding: 2%;
            margin: 5% 0;
            border: none;
            border-radius: 2.5rem;
            background: #f8f9fa;
            color: #383d41;
            font-size: 1.1rem;
            font-weight: 600;            
            cursor: pointer;
        }

        .applicationBtn .btnApply:hover:not(.active) {   
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.6);
        }
    </style>
</head>
<body>
    <div class="jumbotron-small text-center text-white" >
        <h1 class="mt-3" style="color: #fff; font-size: 3rem; font-weight: bolder; letter-spacing: 0.05rem;">Job Application Portal</h1>
    </div>
    <div class="container application">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <img src="./images/image.webp" alt="svg">
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center text-white" style="justify-content:center; align-items:center; margin-top:10%">
                <h3 style="font-size: 2rem; font-weight:bolder;">Welcome </h3>
                <p>We want to make the right decision quickly-That's why we only offer online applications. Applying online offers many benefits and speeds up the whole process considerably.</p>
                <p>Please fill all the details carefully. This application can change your life.</p>
                <div class="applicationBtn">
                    <a href="application.php" class="btnApply">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>