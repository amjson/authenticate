<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  require 'PHPMailer/src/credential.php';

  if (isset($_POST["email"])) {  
    session_start();
    include("server.php");

    $mailTo  = $_POST["email"];

    $email_inquiry = "SELECT * FROM users WHERE email='".$mailTo."' ";
    $run_inquiry   = mysqli_query($con, $email_inquiry);

    if (mysqli_num_rows($run_inquiry) == 0) {
      echo "<script>alert('Your Email is invalid')</script>";
      echo "<script>window.open('request.php', '_self')</script>";
      exit();
    }
    else {
      $mailTo  = $_POST["email"];
      
      // create a one time token 
      $token = uniqid(True);
      $pwd_change = "INSERT INTO pwd_request(user_token,user_email)VALUES('$token','$mailTo')";
      $run_request  = mysqli_query($con, $pwd_change);

      if (!$run_request) {
        exit("Your Password request had an Error");
      }
    
      $mail   = new PHPMailer(true);

      try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';  
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = EMAIL;                     
        $mail->Password   = PASS;                             
        $mail->SMTPSecure = 'tls';                   
        $mail->Port       = 587;                                    

        //Recipients
        $mail->setFrom(EMAIL, 'JOENEST');
        $mail->addAddress($mailTo);                   
        $mail->addReplyTo('no-reply@gmail.com', 'No Reply');   

        // Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/reset.php?token=$token";

        $mail->isHTML(true);                                  
        $mail->Subject = 'JOENEST send you a password reset link';
        $mail->Body    = "<h3 align=center>
                            Request : You requested a password reset<br>
                            Link : clink <a href='$url'>Reset</a> to reset your password
                          </h3>";

        $mail->send();
        echo "<script>alert('Reset Password link has been sent to your email')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
        exit();
      } 
      catch (Exception $e)
      {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
        echo "<script>window.open('request.php', '_self')</script>";
        exit();
      }  
      exit();
    }
  }

?>