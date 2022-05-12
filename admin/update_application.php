<?php include 'dbcon.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../links.php' ?>
        <?php include 'header.php' ?>
        <link rel="stylesheet" href="../css/style.css">
        <style>
            .btnUpdate{
                /* float: right; */
                margin-top: 10%;
                border: none;
                border-radius: 2.5rem;
                padding: 3%;
                width: 60%;
                background: #0062cc;
                color: #fff;
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
            }
        </style>
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
                        <h3 class="register-heading">Update Candidate Details</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php
                                $id = $_GET['id'];
                                $selectquery = " select * from jobregistration where id='$id' ";
                                $query = mysqli_query($con, $selectquery);

                                $result = mysqli_fetch_assoc($query);

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
                                        // $ext = explode(".", $file_name);
                                        move_uploaded_file($file_tmp,"../files/".$file_name);
                                
                                        $updatequery = " update jobregistration set id=$id, name='$name', phone='$phone', 
                                        email='$email', degree='$degree', refer='$refer', planguage='$plang', cv_doc='$file_name' where id=$id ";
                                        $uquery = mysqli_query($con, $updatequery);


                                        if ($uquery){
                                            ?>
                                                <div class="alert alert-success alert-dismissible fade show text-center">
                                                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Success!</strong> Data Updated Successfully.
                                                </div>
                                            <?php
                                        }else{
                                            ?>
                                                <div class="alert alert-danger alert-dismissible fade show text-center">
                                                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Failed!</strong> Data Updatation Unsuccessful!
                                                </div>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-name" placeholder="Enter your name" name="name" value="<?php echo $result['name']; ?>" required onkeyup="validateName()">
                                        <span id="name-error"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" id="contact-phone" placeholder="Enter phone number" name="phone" value="<?php echo $result['phone']; ?>" required onkeyup="validatePhone()">
                                        <span id="phone-error"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Any references" name="refer" value="<?php echo $result['refer']; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="pdf_file" class="form-control" accept=".pdf" value="<?php echo $result['cv_doc']; ?>" required/>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter your qualification" name="degree" value="<?php echo $result['degree']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="contact-email" placeholder="Enter your email" name="email" value="<?php echo $result['email']; ?>" required onkeyup="validateEmail()">
                                        <span id="email-error"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Programming Language" name="plang" value="<?php echo $result['planguage']; ?>" required>
                                    </div>
                                    <input type="submit" class="btnUpdate" name="submit" value="Update Candidate" onclick="validateForm()">
                                    <span id="submit-error"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../script.js"></script> 
</body>
</html>
