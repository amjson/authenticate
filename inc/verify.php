<?php
  include("server.php");  

  if (!isset($_GET["token"])) {
    exit("Page not found");
  }

  $token      = $_GET["token"];
  $res_token  = "SELECT verified, token FROM users WHERE verified = 0 AND 
  token = '$token' LIMIT 1";
  $run_verify = mysqli_query($con, $res_token);

  if(mysqli_num_rows($run_verify) == 1) { 
    $query     = "UPDATE users SET verified = 1 WHERE token = '$token' LIMIT 1";
    $run_query = mysqli_query($con, $query);
    echo "<script>alert('Your Account has been verified you may now Login')</script>";
    exit();
  }
  else {
    exit("Page not found");
  }
?>