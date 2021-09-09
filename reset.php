<?php
  include("inc/server.php");

  if (!isset($_GET["token"])) {
    exit("Error! Page not found");
  }

  $token     = $_GET["token"];
  $user_email = "SELECT user_email FROM pwd_request WHERE user_token = '$token' ";
  $run_email  = mysqli_query($con, $user_email);


  if (mysqli_num_rows($run_email) == 0) {
    exit("Error! Page not found");
  }

  if (isset($_POST["update"])) {
    $user_pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass1']));
    $conf_pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass2']));

    if(empty($user_pass) || empty($conf_pass)) {
      echo "<script>alert('You have not completed filling the form')</script>";
      echo "<script>window.open('reset.php?token=$token', '_self')</script>";
      exit();
    }  
    else {
      if($user_pass === $conf_pass) {
        if(strlen($user_pass) < 9) {      
          echo "<script>alert('Please use more than 9 characters in your password')</script>";
          echo "<script>window.open('reset.php?token=$token', '_self')</script>";
          exit(); 
        }
        else {
          $hashedPwd = password_hash($user_pass, PASSWORD_BCRYPT);

          $row   = mysqli_fetch_array($run_email);
          $email = $row["user_email"];

          $query = "UPDATE users SET password='$hashedPwd' WHERE email='$email'";
          $run_query = mysqli_query($con, $query);


          if ($run_query) {
            $Del_request = "DELETE FROM pwd_request WHERE user_token = '$token' ";
            $run_Del     = mysqli_query($con, $Del_request);
            echo "<script>alert('You Updated Your Password Successfully')</script>";
            exit();
          }
          else {
            echo "<script>alert('An Error Occured')</script>";
            exit();
          }
        }
      }
      else {
        echo "<script>alert('The two password dont match')</script>";
        echo "<script>window.open('reset.php?token=$token', '_self')</script>";
        exit();
      }
    } 
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is a fully equipped authentication system">
    <meta name="author" content="Joeson Misiani">
    <meta name="keyword" content="Bootstrap, Fontawesome">
    <title>Authentication System - index</title>

    <!-- Favicons -->
    <link rel="icon" href="my-images/joe.png" >

    <!--***** bootstrap & jquery plugins *****-->
    <link rel="stylesheet" href="MyCustom/bootstrap/css/bootstrap.min.css">
    <script src="MyCustom/js/jquery.js"></script>
    <script src="MyCustom/js/bootstrap.min.js"></script>

    <!--***** fontawesome css *****-->
    <link rel="stylesheet" type="text/css" 
    href="MyCustom/fontawesome-free/css/all.css">
    <link rel="stylesheet" type="text/css" 
    href="MyCustom/fontawesome-free/css/v4-shims.min.css">
  </head>

  <style>
    a, a:hover{ 
      text-decoration: none; 
      -webkit-transition:color .3s linear;
      -o-transition:color .3s linear;
      transition:color .3s linear;
      outline:0; 
    }
    li {
      list-style: none;
    }
    body {
      margin:0;
      padding:0;
      border:0;
      outline:0;
      background-color: #ccc;
      overflow: hidden;
    }
    .notification_page {
      border: 1px solid transparent;
      box-shadow: 0px 0px 5px 1px rgba(0,0,0,.3);
      background-color: #fff;
      width: 40%;
      height: 300px;
      margin-top: 150px;
      margin-left: 400px;
    }
    #form {
      border: 1px solid transparent;
      background-color: transparent;
      width: 90%;
      margin-top: 30px;
      margin-left: 30px;
      padding-top: 0px;
      padding-left: 10px;
      padding-right: 10px;
    }
    .job_body {
      border: 1px solid transparent;
    }
    .title {
      width: 100%;
      height: 37px;
      border: 1px solid transparent;
      background-color: transparent;
      padding-left: 10px;
      text-align: center;
    }
    .title h4 {
      border: none;
      box-sizing: border-box;
      width: 95%;
      padding-bottom: 3px;
      outline: none;
      color: rgba(0,0,0,.8);
      background: transparent;
      font-family: Tempus Sans ITC;
      font-size: 25px;
      text-transform: uppercase;
      font-weight: bold;
      letter-spacing: 2px;
      margin-top: 5px;
    }
    .boxOne {
      width: 100%;
      height: 60px;
      margin-top: 5px;
      border: 1px solid transparent;
      background-color: transparent;
      padding-left: 10px;
    }
    .boxTwo {
      width: 100%;
      height: 60px;
      margin-top: 5px;
      border: 1px solid transparent;
      background-color: transparent;
      padding-left: 10px;
    }
    .job_body input {
      border: none;
      border-bottom: 1px solid #aaa;
      box-sizing: border-box;
      width: 95%;
      margin-top: 21px;
      padding-bottom: 0px;
      outline: none;
      color: rgba(0,0,0,.7);
      background: transparent;
      font-family: Bahnschrift;
      font-size: 18px;
    }
    .job_body input:focus {
      transition: .3s;
      border-bottom-color: dodgerblue;
    }
    .inputWithIcon {
      position: relative;
    }
    .inputWithIcon input {
      padding-left: 36px;
    }
    .inputWithIcon i {
      position: absolute;
      top: 8px;
      left: 0;
      padding-top: 0px;
      padding-left: 8px;
      padding-bottom: 9px;
      padding-right: 8px;
    }
    .inputWithIcon.inputIconBg i {
      background-color: transparent;
      color: rgba(0,0,0,.7);
      padding-top: 15px;
      padding-left: 3px;
      padding-bottom: 10px;
      padding-right: 25px;
      border-radius: 5px 0 0 5px;
    }
    .encrypt {
      position: relative;
      border: 1px solid transparent;
      width: 37px;
      height: 37px;
      margin-top: -37px;
      margin-left: 395px;
    }
    .encrypt i {
      position: absolute;
      top: 0;
      left: 0;
      border: 1px solid transparent;
      padding-top: 10px;
      padding-left: 10px;
      padding-bottom: 10px;
      padding-right: 23px;
      color: rgba(0,0,0,.6);
    }
    #hide1 {
      display: none;
    }
    .finalise {
      width: 100%;
      height: 60px;
      border: 1px solid transparent;
      background-color: transparent;
      padding-left: 160px;
    }
    .finalise .submit {
      background: dodgerblue;
      border-color: transparent;
      border-radius: 3px;
      color: #fff;
      font-size: 24px;
      letter-spacing: 2px;
      height: 35px;
      width: 125px;
      margin-top: 20px;
      font-family: Tempus Sans ITC;
      padding-top: 0px;
    }
    .finalise .submit:hover {
      cursor: pointer;
      background: dodgerblue;
      opacity: .8;
    }
  </style>
  
  <body>
    <section>
      <div class="notification_page">
        <form action="" method="POST" id="form" autocomplete="off">             
          <div class="job_body">
            <div class="title"><h4>reset</h4></div>

            <div class="boxOne">
              <div class="inputWithIcon inputIconBg">
                <input type="password" name="pass1" id="pwd" placeholder="New Password">
                <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
              </div>

              <div class="encrypt dencrypt" onclick="myFunction()">
                <i class="fa fa-eye fa-lg fa-fw" id="hide1" aria-hidden="true"></i>
                <i class="fa fa-eye-slash fa-lg fa-fw" id="hide2" aria-hidden="true"></i>
              </div>
            </div>

            <div class="boxTwo">
              <div class="inputWithIcon inputIconBg">
                <input type="password" name="pass2" id="pwd" placeholder="Confirm Password">
                <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
              </div>
            </div>

            <div class="finalise">
              <input type="submit" class="form-control submit" name="update" value="update">
            </div>
          </div>
        </form>
      </div>
    </section>

    <script>
      function myFunction() {
        var x = document.getElementById("pwd");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");

        if (x.type === 'password') {
          x.type = "text";
          y.style.display = "block";
          z.style.display = "none";
        }
        else {
          x.type = "password";
          y.style.display = "none";
          z.style.display = "block";
        }
      }
    </script>
  </body>
</html>