<?php 
    include 'dbcon.php';
    // code for pagination
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1;
    }

    $records_per_page = 3;
    $start_from = ($page-1)*$records_per_page;

    $pquery = " select * from user_info limit $start_from, $records_per_page ";
    $presult = mysqli_query($con, $pquery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <?php include 'header.php' ?>
    <?php include '../links.php' ?>
    <style>
        td{ font-size: 1.2rem; }
        th{
            font-weight: 900;
        }
        .nav-buttons{
            position: relative;
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-top: 5%;
            margin-bottom: 2%;
            width: 100%;
        }
        .nav-buttons a{
            font-weight: bold;
            color: #383d41;
            padding: 8px 16px;
            text-decoration: none; 
        }
        .main-page{
            position: absolute;  
            margin-left: 0;          
        }
        .pagination {
            position: absolute;
            justify-content: center;
        } 
    </style>
</head>
<body>
    <div class="container" style="margin-top:30px">
        <div class="card">
            <div class="card-header text-center">
                <h4 style="font-weight: bold; font-size:1.8rem; letter-spacing: 0.1rem;">Registered Users List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        <?php
                        
                            while (($result = mysqli_fetch_assoc($presult))) {
                        ?>
                            <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><img src="../images/<?php echo $result['profile']; ?>" class='img-thumbnail' width="80px"></td>
                            <td><?php echo $result['username']; ?></td>
                            <td><?php echo $result['phone']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><a href="update_user.php?id=<?php echo $result['id']; ?>" data-toggle="tooltip" 
                                data-placement="left" title="Edit"><i class="fa fa-edit"></i></a></td>
                            <td><a href="delete_user.php?id=<?php echo $result['id']; ?>" data-toggle="tooltip" 
                                data-placement="left" title="Delete"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>                
                </div>
            </div>
        </div>
        <div class="nav-buttons">
            <div class="pagination">
                <?php
                    $pr_query = " select * from user_info ";
                    $pr_result = mysqli_query($con, $pr_query);
                    $total_records = mysqli_num_rows($pr_result);
                    // echo $total_records;
                    $total_pages = ceil($total_records/$records_per_page);
                    // echo $total_pages;
                    if ($page>1) {
                        echo " <a href='show_users.php?page=".($page-1)."' class='btnPage'>Previous</a> ";
                    }
                    for ($i=1; $i < $total_pages; $i++) { 
                        echo " <a href='show_users.php?page=".$i."' class='btnPage'>$i</a> ";
                    }
                    if ($page<$i) {
                        echo " <a href='show_users.php?page=".($page+1)."' class='btnPage'>Next</a> ";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</html>