<?php

// session_start();

include 'admin/dbcon.php';
include('header.php');

?>

<style>
	.card .card-header{
		align-items: center;
		justify-content: center;
		font-weight: bold; 
		font-size:1.5rem;
		padding: 8px auto;
		color:#495057;
	}
</style>

<div class="container" style="margin-top:30px">
  <div class="card">
    <form method="post" action="" enctype="multipart/form-data">
        <?php
            $id = $_SESSION['id'];
            $selectquery = " select * from jobregistration where id='$id' ";
            $query = mysqli_query($con, $selectquery);
        
            $result = mysqli_fetch_assoc($query);
        
            if (isset($_POST['btnUpdate'])) {
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
                    move_uploaded_file($file_tmp,"./files/".$file_name);
            
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
		<div class="card-header">
			<div class="row">
				<div class="col-md-9">My Application</div>
				<div class="col-md-3" align="right">
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="form-group">
				<div class="row">
					<label class="col-md-4 text-right">User Name <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" name="name" id="contact-name" class="form-control" value="<?php echo $_SESSION['username']; ?>"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-4 text-right">Phone Number <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" name="phone" id="contact-phone" class="form-control" value="<?php echo $result['phone']; ?>"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-4 text-right">Email Address <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" name="email" class="form-control" value="<?php echo $result['email']; ?>"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-4 text-right">Degree <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" name="degree" class="form-control" value="<?php echo $result['degree']; ?>"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-4 text-right">Referer&nbsp;&nbsp;</label>
					<div class="col-md-8">
						<input type="text" name="refer" class="form-control" value="<?php echo $result['refer']; ?>"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-4 text-right">Programming Languages <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" name="plang" class="form-control" value="<?php echo $result['planguage']; ?>"/>						
					</div>					
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-4 text-right">Upload CV <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="file" name="pdf_file" value="<?php echo $result['cv_doc']; ?>" required/>                        
						<span class="text-muted">Only .pdf file allowed</span><br />
						<span class="text-muted">Uploaded CV:</span>
						<span><a href="./admin/view_cv.php?id=<?php echo $result['id']; ?>" name="viewCV"><?php echo $result['cv_doc']; ?></a></span>
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
