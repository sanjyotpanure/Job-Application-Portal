<?php
session_start();
if (!isset($_SESSION['id'])) {
    ?><script>alert("You are logged out!");</script>
    <?php
    header('location: login.php');
}
include('admin/dbcon.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Job Application Portal</title>
  <?php include 'links.php' ?>
</head>
<style>
    body{
        background: linear-gradient(to right, #68ddfa 0%,  #55c0db 0%, #e43df3 100%);
    }
    nav {
        font-size: 1.2rem;
        align-items: center;
    }
    nav a{
      padding-left: 2%;
    }
</style>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="application.php">Apply</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="my_application.php">My Application</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <span class="navbar-text text-white my-2 my-lg-0">
            Welcome&nbsp; <strong> <?php echo $_SESSION['username']; ?> </strong>
        </span>
      <li class="nav-item px-3 py-1">
        <button class="btn btn-outline-danger" type="submit"><a style="color: #fff; text-decoration: none;" href="logout.php">Logout</a></button>
      </li>
    </ul>
  </div> 
</nav>