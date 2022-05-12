<?php include 'dbcon.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <?php include '../links.php';
    include 'header.php'; ?>
</head>
<body>
    <div class="container register">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 register-left">
                <img src="image.webp" alt="svg">
                <h3 style="font-size: 2rem; font-weight:bolder;">Welcome Admin</h3>
                <p style="font-size: 1.2rem;">Please fill all the details carefully. This form can change your life.</p>
                <a href="index.php">Check List</a> <br>
            </div>
            <div class="col-lg-8 col-md-8 col-12 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Add Candidate Details</h3>
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-name" placeholder="Enter your name" name="name" value="" required onkeyup="validateName()">
                                        <span id="name-error"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" id="contact-phone" placeholder="Enter phone number" name="phone" value="" required onkeyup="validatePhone()">
                                        <span id="phone-error"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="contact-email" placeholder="Enter your email" name="email" value="" required onkeyup="validateEmail()">
                                        <span id="email-error"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="pdf_file" class="form-control" accept=".pdf" required/>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="Upload"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter your qualification" name="degree" value="" required>
                                    </div>                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Programming Language" name="plang" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Any references" name="refer" value="" >
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btnRegister" name="submit" value="Add Candidate" onclick="validateForm()">
                                        <span id="submit-error"></span>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/script.js"></script>  
</body>

<?php
    if (isset($_POST['submit'])) {
       $name = mysqli_real_escape_string($con, $_POST['name']);
       $phone = mysqli_real_escape_string($con, $_POST['phone']);
       $email = mysqli_real_escape_string($con, $_POST['email']);
       $degree = mysqli_real_escape_string($con, $_POST['degree']);
       $refer = mysqli_real_escape_string($con, $_POST['refer']);
       $plang = mysqli_real_escape_string($con, $_POST['plang']);
   
        if (isset($_FILES['pdf_file']['name'])) {
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        move_uploaded_file($file_tmp,"../files/".$file_name);

        $insertquery = " INSERT INTO jobregistration (name, phone, email, degree, refer, planguage, cv_doc)  
                        VALUES('$name', '$phone', '$email', '$degree', '$refer', '$plang', '$file_name') ";
        $iquery = mysqli_query($con, $insertquery);

        if ($iquery){
            ?>
                <div class="alert alert-success alert-dismissible fade show text-center">
                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Data Inserted Successfully.
                </div>
            <?php
        }else{
            ?>
                <div class="alert alert-danger alert-dismissible fade show text-center">
                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Failed!</strong> Data Insertion Unsuccessful!
                </div>
            <?php
        }
       }else{
        ?>
            <div class="alert alert-danger alert-dismissible fade show text-center">
                <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Failed!</strong> File uploading failed!.
            </div>
        <?php
       }
    }
   
?>

</html>