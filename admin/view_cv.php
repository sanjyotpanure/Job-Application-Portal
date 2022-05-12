<?php include 'dbcon.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0; padding: 0; box-sizing: border-box; font-family: 'Ubuntu', sans-serif;
        }
    </style>
</head>
<body>
    <?php        
        // The location of the PDF file on the server
        $id = $_GET['id'];
        $squery = "select * from jobregistration where id='$id'";
        $result = mysqli_query($con, $squery);

        while(($row= mysqli_fetch_assoc($result))){
    ?>
        <embed src="../files/<?php echo $row['cv_doc']; ?>" type="application/pdf"  width="100%" height="1000">
    <?php
        }
    ?>

</body>
</html>
