<?php include 'dbcon.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../links.php' ?>
        <?php include 'header.php' ?>
        <!-- <link rel="stylesheet" href="../css/style.css"> -->
    </head>
<body>
<div class="container" style="margin-top:30px">
  <div class="card">
    <form method="post" action="" enctype="multipart/form-data">
    <?php
        $id = $_GET['id'];
        $selectquery = " select * from user_info where id='$id' ";
        $query = mysqli_query($con, $selectquery);

        $result = mysqli_fetch_assoc($query);

        if (isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $email = mysqli_real_escape_string($con, $_POST['email']);

            if (isset($_FILES['profile_image']['name'])) {
                $file_name = $_FILES['profile_image']['name'];
                $file_tmp = $_FILES['profile_image']['tmp_name'];
                // $ext = explode(".", $file_name);
                move_uploaded_file($file_tmp,"../images/".$file_name);
        
                $updatequery = " update user_info set username='$name', email='$email' phone='$phone', 
                email='$email', profile='$file_name' where id='$id' ";
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
    <div class="card-header">
			<div class="row">
				<div class="col-md-9">User Profile</div>
				<div class="col-md-3" align="right">
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="form-group">
				<div class="row">
					<label class="col-md-4 text-right">User Name <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" name="name" id="contact-name" class="form-control" value="<?php echo $result['username']; ?>"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-4 text-right">Phone Number <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" name="phone" id="contact-phone" class="form-control" value="<?php echo $result['phone']; ?>" disabled/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-4 text-right">Email Address <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" name="email" id="contact-email" class="form-control" value="<?php echo $result['email']; ?>" disabled/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-4 text-right">Password </label>
					<div class="col-md-8">
						<input type="password" name="password" id="password" class="form-control" placeholder="Password can not be changed by admin" disabled/>
						<span class="text-danger"></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-4 text-right">Image <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="file" name="profile_image" value="<?php echo $result['profile']; ?>" />
						<span class="text-muted">Only .jpg and .png allowed</span><br />
						<span><img src="../images/<?php echo $result['profile']; ?>" width="100px" class='img-thumbnail' style="margin-top: 2%;"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer" align="center">
			<input type="hidden" name="id" id="id" />
			<input type="submit" name="btnUpdate" class="btn btn-success btn-sm" value="Save" />
		</div>     
    </form>
  </div>
</div>
<br />
<br />
</body>
</html>