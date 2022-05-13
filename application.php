<?php 
    include 'admin/dbcon.php' 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Application Site</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php include 'header.php' ?>
    <style>
        .search_select_box{
            max-width: 250px;
        }
        .form-group span{
            font-size: 1rem;
            color: #495057!important;
        }
    </style>
</head>
<body>
    <div class="container register">
        <div class="row">
        <div class="col-lg-4 col-md-4 col-12 register-left">
                <img src="./images/image.webp" alt="svg">
                <h3 style="font-size: 2rem; font-weight:bolder;">Welcome</h3>
                <p style="font-size: 1.2rem;">Please fill all the details carefully. This form can change your life.</p>
            </div>
            <div class="col-lg-8 col-md-8 col-12 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h2 class="register-heading">Apply for Company Placement</h2>
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                            <?php
                                if (isset($_POST['submit'])) {

                                    $name = mysqli_real_escape_string($con, $_POST['name']);
                                    $phone = mysqli_real_escape_string($con, $_POST['phone']);
                                    $email = mysqli_real_escape_string($con, $_POST['email']);
                                    $degree = mysqli_real_escape_string($con, $_POST['degree']);
                                    $refer = mysqli_real_escape_string($con, $_POST['refer']);
                                    $plang = mysqli_real_escape_string($con, $_POST['plang']);

                                    $emailquery = " select * from jobregistration where email='$email' ";
                                    $query = mysqli_query($con, $emailquery);
                                    $emailcount = mysqli_num_rows($query);
                                    if ($emailcount>0) {
                                        ?>
                                            <div class="alert alert-danger alert-dismissible fade show text-center">
                                                <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> You Have Already Applied!</strong><a href="my_application.php">Click here to view your application</a>
                                            </div>
                                        <?php
                                    }else {
                                        if (isset($_FILES['pdf_file']['name'])) {
                                            $file_name = $_FILES['pdf_file']['name'];
                                            $file_tmp = $_FILES['pdf_file']['tmp_name'];

                                            move_uploaded_file($file_tmp,"./files/".$file_name);
                                    
                                            $insertquery = " INSERT INTO jobregistration (name, phone, email, degree, refer, planguage, cv_doc)  
                                                            VALUES('$name', '$phone', '$email', '$degree', '$refer', '$plang', '$file_name') ";
                                            $iquery = mysqli_query($con, $insertquery);

                                            if ($iquery){
                                                ?>
                                                    <div class="alert alert-success alert-dismissible fade show text-center">
                                                        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong>Success!</strong> You have applied successfully.<a href="my_application.php">Click here to view your application</a>
                                                    </div>
                                                <?php
                                            }else{
                                                ?>
                                                    <div class="alert alert-danger alert-dismissible fade show text-center">
                                                        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong>Failed!</strong> Seems something wrong while submitting your appication! Try Again!
                                                    </div>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                                <div class="alert alert-danger alert-dismissible fade show text-center">
                                                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Failed!</strong> CV must be uploaded in PDF format!
                                                </div>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-name" placeholder="Enter your name" name="name" value="<?php echo $_SESSION['username']; ?>" required onkeyup="validateName()">
                                        <span id="name-error"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" id="contact-phone" placeholder="Enter phone number" name="phone" value="<?php echo $_SESSION['uphone']; ?>" required onkeyup="validatePhone()">
                                        <span id="phone-error"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="contact-email" placeholder="Enter your email" name="email" value="<?php echo $_SESSION['email']; ?>" required onkeyup="validateEmail()">
                                        <span id="email-error"></span>
                                    </div>                                   
                                    <div class="form-group">
                                        <input type="file" name="pdf_file" class="form-control" accept=".pdf" title=" Upload CV" required/>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="Upload"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group search_select_box">
                                        <select data-live-search="true" data-size="5" class="form-control selectpicker show-tick" title="Select your qualification" name="degree" value="" required>
                                            <option>BE/BTech</option>
                                            <option>ME/MTech</option>
                                            <option>BBA</option>
                                            <option>MBA</option>
                                            <option>BSc</option>
                                            <option>MSc</option>
                                            <option>BCA</option>
                                            <option>BCS</option>
                                            <option>MCA</option>
                                            <option>MCS</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group search_select_box">
                                        <select data-live-search="true" data-size="5" data-dropup-auto="false" class="form-control selectpicker" multiple title="Programming Languages" name="plang" value="" required>
                                            <option>Python</option>
                                            <option>R</option>
                                            <option>Java</option>
                                            <option>JavaScript</option>
                                            <option>C</option>
                                            <option>C++</option>
                                            <option>C#</option>
                                            <option>SQL</option>
                                            <option>MySQl</option>
                                            <option>MongoDB</option>
                                            <option>PHP</option>
                                            <option>Ruby</option>
                                            <option>.NET</option>
                                            <option></option>
                                            <option>React JS</option>
                                            <option>Angular JS</option>
                                            <option>Vue JS</option>
                                            <option>Flutter</option>
                                            <option>React Native</option>
                                            <option>Kotlin</option>
                                            <option>Android</option>
                                            <option>HTML</option>
                                            <option>CSS</option>
                                        </select>                                     
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Any references" name="refer" value="" >
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btnRegister" name="submit" value="Submit" onclick="validateForm()">
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
    <script src="./js/script.js"></script>
    <script>
        $(document).ready(function () {
            $('.search_select_box select').selectpicker();
        });
    </script>
</body>
</html>

