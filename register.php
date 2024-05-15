<?php
include "connection.php";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])){
    // Check if email already exists in the database
    $email = $_POST['email'];
    $check_query = "SELECT * FROM users WHERE email='$email'";
    $check_result = mysqli_query($con, $check_query);
    $num_rows = mysqli_num_rows($check_result);
    if ($num_rows > 0) {
        echo '<script>alert("Email already exists. Please use a different email.");</script>';
        echo '<script>window.location.href = "index.php";</script>';

    } else {
        // Retrieve form data
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];

        // Insert data into database
        $insert_query = "INSERT INTO users (user_name, email, mobile, password) VALUES ('$name', '$email', '$mobile', '$password')";
        $insert_result = mysqli_query($con, $insert_query);
        // print_r($insert_result);die;
        if ($insert_result) {
          session_start();
          unset($_SESSION['userid']);
          unset($_SESSION['username']);
          
          $_SESSION['userid'] = $_POST['email'];
          $_SESSION['username'] = $_POST['name'];

            echo '<script>alert("Thanks for Registration");</script>';
           echo '<script>window.location.href = "index.php";</script>'; // Redirect to login page using JavaScript
            exit(); // Make sure no further code execution happens after redirection
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
            echo '<script>window.location.href = "index.php";</script>';
        }
    }
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
  <h2>Registeration form</h2>
  <form action="register.php" method="post">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Mobile:</label>
      <input type="number" class="form-control" id="mobile" placeholder="Enter mobile no" name="mobile">
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
