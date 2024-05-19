<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: PhotoFolio - v1.1.1
  * Template URL: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <i class="bi bi-camera"></i>
        <h1>PhotoFolio</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li class="dropdown"><a href="gallery.php"><span>Gallery</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="gallery.php">Nature</a></li>
              <li><a href="gallery.php">People</a></li>
              <li><a href="gallery.php">Architecture</a></li>
              <li><a href="gallery.php">Animals</a></li>
              <li><a href="gallery.php">Sports</a></li>
              <li><a href="gallery.php">Travel</a></li>
              <!-- <li class="dropdown"><a href="#"><span>Sub Menu</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Sub Menu 1</a></li>
                  <li><a href="#">Sub Menu 2</a></li>
                  <li><a href="#">Sub Menu 3</a></li>
                </ul>
              </li> -->
            </ul>
          </li>
          <li><a href="services.php">Services</a></li>
          <li><a href="contact.php">Contact</a></li>

          <?php
          if(isset($_SESSION['userid'])) {
            // User is logged in, so show logout option
            echo '<li><a href="logoutuser.php">Logout</a></li>';
          } else {
            // User is logged out, so show login option
            echo '<li><a href=""  data-bs-toggle="modal" data-bs-target="#myModal1">Login</a></li>';
          }
          ?>
          <li ><a href="" data-bs-toggle="modal" data-bs-target="#myModal">Registration</a></li>
          
        </ul>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="https://twitter.com/login" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/accounts/login/?hl=en" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.google.com/aclk?sa=L&ai=DChcSEwjqp5qy_PaFAxX7Xg8CHa9CBCIYABAAGgJ0Yg&ase=2&gclid=CjwKCAjw3NyxBhBmEiwAyofDYc1XCGLwDlBqPI8RanAbJ5pSDK5UvaB1f7ksjaIjbvSb2vT4KYwrzRoCofQQAvD_BwE&sig=AOD64_369QCRbaS20qjtNtVf1s_vlWXwQQ&q&nis=4&adurl&ved=2ahUKEwjK7JOy_PaFAxUgj68BHd-QALQQ0Qx6BAgGEAE" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

 <!-- The Modal -->
<div class="modal" id="myModal" style="color: black">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> Registration Form </h4>
       
      </div>

  <div class="modal-body">
  <form method="post" action="register.php" name="reg">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
      <div class="invalid-feedback">Please enter your name.</div>
    </div>
    <div class="form-group">
      <label for="mobile">Mobile:</label>
      <input type="tel" class="form-control" id="mobile" placeholder="Enter mobile no" name="mobile" required pattern="[0-9]{10}">
      <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
    </div>
    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      <div class="invalid-feedback">Please enter a valid email address.</div>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
      <div class="invalid-feedback">Please enter a password.</div>
    </div><br>
    <input type="submit" name="submit" class="btn btn-info" value="Save">
  </form>
</div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal  2-->
<div class="modal" id="myModal1" style="color: black">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User Login</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="login.php" name="Sign in">
        E-mail: <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        Password:    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        <br>
        <input type="submit" name="submit" class="btn btn-info" value="login">
      </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
