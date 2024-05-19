<?php
include "connection.php";
session_start();

// if ($_SERVER["REQUEST_METHOD"] == "submit") {
    if(isset($_POST['submit'])){
    // Check if email already exists in the database
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $check_query = "SELECT * FROM users WHERE email='$email'  AND password= '$password'";
    $check_result = mysqli_query($con, $check_query);
    $getdata = mysqli_fetch_array($check_result);
   // print_r($getdata); die;
    if  (!empty($getdata)) {
        $_SESSION['userid'] = $getdata['email'];
        $_SESSION['username'] = $getdata['user_name'];
        echo '<script>alert("login successfully");</script>';
       // echo '<script>window.location.href = "index.php";</script>';
    } else {
          echo '<script>alert("wrong Password");</script>';
     //   echo "Error: " . $check_query . "<br>" . mysqli_error($con);
    }
    echo '<script>window.location.href = "index.php";</script>';
}
?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Stacked form</h2>
  <form action="login.php" method="post">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>

</body>
</html> -->
