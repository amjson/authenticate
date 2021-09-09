<?php
  // Registration without Email verification
  if(isset($_POST['signup']))
  {
    session_start();
    include("server.php");
  
    $fullname = htmlentities(mysqli_real_escape_string($con, $_POST['fullname']));
    $username = htmlentities(mysqli_real_escape_string($con, $_POST['username']));
    $email    = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
    $phone    = htmlentities(mysqli_real_escape_string($con, $_POST['phone']));
    $gender   = htmlentities(mysqli_real_escape_string($con, $_POST['gender']));
    $password = htmlentities(mysqli_real_escape_string($con, $_POST['password']));
    $confirm  = htmlentities(mysqli_real_escape_string($con, $_POST['confirm']));
    $rand     = rand(1, 2);

    if(empty($fullname) || empty($username) || empty($email) || empty($phone) || empty($password) || 
      empty($confirm)) {
      echo "<script>alert('You have not completed filling the form')</script>";
      echo "<script>window.open('signup.php', '_self')</script>";
      exit();
    }    
    else {
      if (!preg_match("/^[a-z A-Z]*$/", $fullname)) {
        echo "<script>alert('Form Error')</script>";
        echo "<script>window.open('signup.php', '_self')</script>";
        exit();  
      }
      else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo "<script>alert('Form Error')</script>";
          echo "<script>window.open('signup.php', '_self')</script>";
          exit(); 
        } 
        else {
          $sql = "SELECT * FROM users WHERE username='$username' OR email='$email' OR phone='$phone'";
          $result = mysqli_query($con, $sql);
          $resultCheck = mysqli_num_rows($result);

          if($resultCheck > 0) {
            echo "<script>alert('Your cridentials are in use in this App already. Please use new cridentials')</script>";
            echo "<script>window.open('signup.php', '_self')</script>";
            exit();     
          }
          else {
            if($rand == 1){
                $profile = "MyImg/default.jpeg";
            }else if($rand == 2){
                $profile = "MyImg/placeholder.jpg";
            }

            if($password === $confirm) {
              if(strlen($password) < 9) {
                echo "<script>alert('Please use more than 9 characters in your password')</script>";
                echo "<script>window.open('signup.php', '_self')</script>";
                exit(); 
              }
              else {
                $hashedPass = password_hash($password, PASSWORD_BCRYPT);
                $token = uniqid(True);

                $sqlquery = "INSERT INTO users(fullname,username,email,phone,gender,password,verified,
                token,profile)VALUES('$fullname','$username','$email','$phone','$gender','$hashedPass',
                '1','$token','$profile')";

                $verifyquery = mysqli_query($con, $sqlquery);

                if ($verifyquery) {
                  echo "<script>alert('Registration Success. Now you can login to your account.')</script>";
                  echo "<script>window.open('index.php', '_self')</script>";
                  exit();
                }
              }
            }
            else {
              echo "<script>alert('Registration Error.')</script>";
              echo "<script>window.open('signup.php', '_self')</script>";
              exit();
            }
          }
        }
      }
    }
  }

  // login without Email verification
  if(isset($_POST['signin'])) {
    session_start();
    include("server.php");

    $email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
    $pass  = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));

    if(empty($email) || empty($pass)) {
      echo "<script>alert('Error. Login Error.')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
      exit();
    }
    else {
      $my_user = "SELECT * FROM users WHERE email='".$email."' ";
      $query   = mysqli_query($con, $my_user);
       
      if(mysqli_num_rows($query) > 0) {
        $row           = mysqli_fetch_assoc($query);
        $password_hash = $row['password'];

        if(password_verify($pass, $password_hash)) {
          $email     = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
          $get_user  = "SELECT * FROM users WHERE email='".$email."' ";
          $run_user  = mysqli_query($con, $get_user);
          $row       = mysqli_fetch_array($run_user);
          $user_auth = $row['verified'];
        
          if ($user_auth == 0) { // we use 0 so that the system wont say account is not verified
            $_SESSION['email'] = $email;
            $online  = "UPDATE users SET log_in='Online' WHERE email='".$email."'";
            $update_msg = mysqli_query($con, $online);

            $_SESSION['initial_time'] = time(); //start time

            $user     = $_SESSION['email'];
            $get_user = "SELECT * FROM users WHERE email='$user'";
            $run_user = mysqli_query($con, $get_user);
            $row      = mysqli_fetch_array($run_user);

            $username = $row['username'];
            echo "<script>window.open('home.php?username=$username', '_self')</script>";
          }
          else {
            echo "<script>alert('Error. This account is not verified.')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
            exit();
          }
        }
        else
        {
          echo "<script>alert('Error. Login Error.')</script>";
          echo "<script>window.open('index.php', '_self')</script>";
          exit();
        }
      }
      else
      {
        echo "<script>alert('Error. Login Error.')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
        exit();
      }
    }
  }
?>