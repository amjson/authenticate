<?php
  session_start();
  include("inc/server.php");

  if (!isset($_SESSION['email'])) {
    echo "<script>window.open('index.php', '_self')</script>";
    exit();
  }
  else { 
    if((time() - $_SESSION['initial_time']) > 300) { //time in sec when inactive
      $user     = $_SESSION['email'];
      $get_info = "SELECT * FROM users WHERE email='$user'";
      $run_info = mysqli_query($con, $get_info);
      $row      = mysqli_fetch_array($run_info);
      $myName   = $row['username'];
      
      $Offline = "UPDATE users SET log_in='Offline' WHERE username='".$myName."'";
      $sleep   = mysqli_query($con, $Offline);
      echo "<script>alert('Session expired after being inactive for 2 minutes')</script>";
      echo"<script>window.open('inc/logout.php', '_self')</script>";
      exit();
    }
    else {
      $_SESSION['initial_time'] = time();//calculate time in sec when active
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
      <title>Authentication System</title>

      <!-- Favicons -->
      <link rel="icon" href="my-images/joe.png" >

      <!--***** bootstrap & jquery plugins *****-->
      <link rel="stylesheet" href="MyCustom/bootstrap/css/bootstrap.min.css">
      <script src="MyCustom/js/jquery.js"></script>
      <script src="MyCustom/js/bootstrap.min.js"></script>

      <!--***** fontawesome css *****-->
      <link rel="stylesheet" type="text/css" href="MyCustom/fontawesome-free/css/all.css">
      <link rel="stylesheet" type="text/css" href="MyCustom/fontawesome-free/css/v4-shims.min.css">
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
        height: 350px;
        margin-top: 150px;
        margin-left: 400px;
      }
      .pro_bar {
        border-radius: 0px;
        border: 1px solid transparent;
        height: 80px !important;
        width: 90%;
        margin-left: 30px;
        background: #fff;
      }
      .left_side_bar {
        border: 1px solid transparent;
        margin-left: 0px;
        height: 58px;
        width: 180px;
        margin-top: 10px;
        float: left;
      }
      .left_side_bar .forname {
        width:120px;
        height: 49px;
        border:1px solid transparent;
        float:left;
        margin-top: 4px;
        margin-left: 2px;
      }
      .left_side_bar .forname .fname{
        font-family: Tempus Sans ITC;
        font-size: 17px;
        font-weight: bold;
        color: rgba(0,0,0,.8);
        margin-left: -6px;
        padding-top: 1px;
        line-height: 25px;
        letter-spacing: 2px;
      }
      .right_side_bar {
        border: 1px solid transparent;
        height: 44px;
        width: 42px;
        margin-top: 10px;
        float: right;
        padding-left: 0px;
      }
      .right_side_bar .caret {
        border:1px solid transparent;
        height: 42px;
        width: 40px;
        margin-top: 0px;
        margin-left: 0px;
        float: left;
        font-family: Bookman Old Style;
        font-size: 18px;
        padding-top: 16px;
        padding-left: 15px;
      }
      .right_side_bar .caret a {
        margin-left: -14px;
        color: rgba(0,0,0,.7);
        cursor: pointer;
      }
      .right_side_bar .caret .drop_me_down {
        margin-left: -130px;
        padding-left: 30px;
        width: 175px;
        box-shadow: 0px 0px 5px 1px rgba(0,0,0,.2);
      }
      .right_side_bar .caret .drop_me_down .locate {
        font-family: Bookman Old Style;
        font-size: 18px;
      }
      .form_exit {
        margin-left: -30px;
      }
      .form_exit input {
        font-family: Bookman Old Style;
        font-size: 17px;
        border: none;
        box-sizing: border-box;
        outline: none;
        background: transparent;
        cursor: pointer;
        color: rgba(0,0,0,.7);
        padding-left: 16px;
      }
      #form {
        border: 1px solid transparent;
        background-color: transparent;
        width: 90%;
        height: 255px;
        margin-top: -20px;
        margin-left: 30px;
        padding-top: 0px;
        padding-left: 10px;
        padding-right: 10px;
        overflow: hidden;
      }
      .job_body {
        border: 1px solid transparent;
        height: 100%;
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
      .profile{
        border: 1px solid transparent;
        width: 100%;
        height: 70px;
        margin-top: 0px;
      }
      .myphoto {
        width: 70px;
        height: 70px;
        border: 1px solid transparent;
        margin-top: -1px;
        margin-left: 195px;
      }
      .myphoto img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 1px solid #ccc;
      }
      .nameOne {
        border: 1px solid transparent;
        width: 48.6%;
        height: 40px;
        float: left;
        margin-top: -3px;
      }
      .nameTwo {
        border: 1px solid transparent;
        width: 48.6%;
        height: 40px;
        margin-top: -3px;
        float: right;
      }
      .middleFirst {
        border: 1px solid transparent;
        width: 100%;
        height: 40px;
        margin-top: 45px;
      }
      .middleSecondLeft {
        border: 1px solid transparent;
        width: 48.6%;
        height: 40px;
        float: left;
        margin-top: 8px;
      }
      .middleSecondRight {
        border: 1px solid transparent;
        width: 48.6%;
        height: 40px;
        float: right;
        margin-top: 8px;
      }
      .job_body input {
        border: none;
        border-bottom: 1px solid #aaa;
        box-sizing: border-box;
        width: 100%;
        margin-top: 14px;
        padding-bottom: 1px;
        outline: none;
        color: rgba(0,0,0,.7);
        background: transparent;
        font-family: Bahnschrift;
        font-size: 16px;
      }
      .job_body input:focus {
        transition: .3s;
        border-bottom-color: dodgerblue;
      }
      .inputWithIcon {
        position: relative;
      }
      .inputWithIcon input {
        padding-left: 30px;
      }
      .inputWithIcon i {
        position: absolute;
        top: 7px;
        left: 0;
        padding-top: 0px;
        padding-left: 8px;
        padding-bottom: 9px;
        padding-right: 8px;
      }
      .inputWithIcon.inputIconBg i {
        background-color: transparent;
        color: rgba(0,0,0,.7);
        padding-top: 10px;
        padding-left: 3px;
        padding-bottom: 10px;
        padding-right: 25px;
        border-radius: 5px 0 0 5px;
      }
      .inputWithIcon.inputIconBg input:focus + i {
        transition: .3s;
        color: rgba(0,0,0,.7);
      }
    </style>
  
    <body>
      <section>
        <div class="notification_page">
          <nav class="navbar navbar-expand-lg pro_bar">
            <ul class="left_side_bar">
              <div class="forname">
                <a href="">
                  <li class="fname">&nbspTimes New<br>&nbsp&nbsp&nbspRoman</li>
                </a>
              </div>  
            </ul>

            <ul class="right_side_bar">
              <li class='nav-item dropdown caret'>
                <a class='nav-link' id='navbarDropdownProfile' data-toggle='dropdown'
                aria-haspopup='true' aria-expanded='false'>
                  <i class='fa fa-sign-in fa-lg fa-fw' aria-hidden='true'></i>
                </a>

                <div class='dropdown-menu dropdown-menu-right drop_me_down' 
                aria-labelledby='navbarDropdownProfile'>
                  <div class='dropdown-item locate form_exit'>
                    <form action='' method='post'>
                      <input type='submit' name='exit' value='Logout'>
                    </form>
                  </div>

                  <?php
                    if(isset($_POST['exit'])) {
                      $user     = $_SESSION['email'];
                      $get_info = "SELECT * FROM users WHERE email='$user'";
                      $run_info = mysqli_query($con, $get_info);
                      $row      = mysqli_fetch_array($run_info);
                      $myName   = $row['username'];
                      
                      $Offline    = "UPDATE users SET log_in='Offline' WHERE 
                      username='".$myName."' ";
                      $update_msg = mysqli_query($con, $Offline);
                      echo"<script>window.open('inc/logout.php', '_self')</script>";
                    }
                  ?>
                </div>
              </li>
            </ul>
          </nav>

          <form action="" method="POST" id="form" autocomplete="off">             
            <div class="job_body">
              <div class="title"><h4>probook</h4></div>

              <?php
                $user     = $_SESSION['email'];
                $get_info = "SELECT * FROM users WHERE email='$user'";
                $run_info = mysqli_query($con, $get_info);
                $row      = mysqli_fetch_array($run_info);

                $photo      = $row['profile'];
                $fullname   = $row['fullname'];
                $username   = $row['username'];
                $email      = $row['email'];
                $phone      = $row['phone'];
                $gender     = $row['gender'];
                $profile    = $row['profile'];
              ?>

              <div class="profile">
                <div class="myphoto"><img src="<?php echo $photo; ?>"></div>
              </div>

              <div class="nameOne">
                <div class="inputWithIcon inputIconBg"> 
                  <input value="<?php echo $fullname; ?>">
                  <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                </div>
              </div>

              <div class="nameTwo">
                <div class="inputWithIcon inputIconBg"> 
                  <input value="<?php echo $username; ?>">
                  <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                </div>
              </div>

              <div class="middleFirst">
                <div class="inputWithIcon inputIconBg"> 
                  <input value="<?php echo $email; ?>">
                  <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true" 
                  style="margin-top:3px;"></i>
                </div>
              </div>

              <div class="middleSecondLeft">
                <div class="inputWithIcon inputIconBg"> 
                  <input value="<?php echo '0'.$phone; ?>">
                  <i class="fa fa-phone fa-lg fa-fw" aria-hidden="true" 
                  style="margin-top:2px;"></i>
                </div>
              </div>

              <div class="middleSecondRight">
                <div class="inputWithIcon inputIconBg"> 
                  <input value="<?php echo $gender; ?>">
                  <i class="fa fa-venus fa-lg fa-fw" aria-hidden="true" 
                  style="margin-top:2px;margin-left:3px;"></i>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
    </body>
  </html>
<?php } ?>