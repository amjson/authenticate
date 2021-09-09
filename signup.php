<?php include ("inc/middleMan_verify.php"); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Times New Roman</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--***** bootstrap & jquery plugins *****-->
    <link rel="stylesheet" href="MyCustom/bootstrap/css/bootstrap.min.css">
    <script src="MyCustom/js/jquery.js"></script>
    <script src="MyCustom/js/bootstrap.min.js"></script>
    
    <!--***** fontawesome css *****-->
    <link rel="stylesheet" href="MyCustom/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="MyCustom/fontawesome-free/css/v4-shims.min.css">
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
    .nameOne {
      border: 1px solid transparent;
      width: 48.6%;
      height: 40px;
      float: left;
      margin-top: -10px;
    }
    .nameTwo {
      border: 1px solid transparent;
      width: 48.6%;
      height: 40px;
      margin-top: -10px;
      float: right;
    }
    .middleFirst {
      border: 1px solid transparent;
      width: 100%;
      height: 40px;
      margin-top: 34px;
    }
    .middleSecondLeft {
      border: 1px solid transparent;
      width: 48.6%;
      height: 40px;
      float: left;
      margin-top: 4px;
    }
    .middleSecondRight {
      border: 1px solid transparent;
      width: 48.6%;
      height: 40px;
      float: right;
      margin-top: 4px;
    }
    .lastOne {
      border: 1px solid transparent;
      width: 48.6%;
      height: 40px;
      float: left;
      margin-top: 4px;
    }
    .lastTwo {
      border: 1px solid transparent;
      width: 48.6%;
      height: 40px;
      float: right;
      margin-top: 4px;
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
    .job_body select {
      border: 1px solid transparent;
      border-bottom: 1px solid #aaa;
      box-sizing: border-box;
      width: 100%;
      margin-top: 15px;
      padding-bottom: 3px;
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
    .job_body select:focus {
      transition: .3s;
      border-bottom-color: dodgerblue;
    }
    .inputWithIcon {
      position: relative;
    }
    .inputWithIcon input {
      padding-left: 30px;
    }
    .inputWithIcon select {
      padding-left: 25px;
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
    .inputWithIcon.inputIconBg select:focus + i {
      transition: .3s;
      color: rgba(0,0,0,.7);
    }
    .finalise {
      width: 100%;
      height: 46px;
      border: 1px solid transparent;
      background-color: transparent;
      padding-left: 170px;
      margin-top: 96px;
    }
    .finalise .submit {
      background: dodgerblue;
      border-color: transparent;
      border-radius: 3px;
      color: #fff;
      font-size: 22px;
      letter-spacing: 2px;
      height: 35px;
      width: 125px;
      margin-top: 6px;
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
        <nav class="navbar navbar-expand-lg pro_bar">
          <ul class="left_side_bar">
            <!-- <div class="forlogo">
              <a href="">
                <li><img src="MyImg/penetrator.png"></li>
              </a>
            </div> -->

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
                <a class='dropdown-item locate' href='index.php'>
                signin</a><br>
                <a class='dropdown-item locate' href='request.php'>
                forgot password</a>
              </div>
            </li>
          </ul>
        </nav>

        <form action="" method="POST" id="form" autocomplete="off">             
          <div class="job_body">
            <div class="title"><h4>probook</h4></div>

            <div class="nameOne">
              <div class="inputWithIcon inputIconBg"> 
                <input type="text" name="fullname" placeholder="Full name">
                <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
              </div>
            </div>

            <div class="nameTwo">
              <div class="inputWithIcon inputIconBg"> 
                <input type="text" name="username" placeholder="Username">
                <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
              </div>
            </div>

            <div class="middleFirst">
              <div class="inputWithIcon inputIconBg"> 
                <input type="email" name="email" placeholder="someone@email.com">
                <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true" 
                style="margin-top:3px;"></i>
              </div>
            </div>

            <div class="middleSecondLeft">
              <div class="inputWithIcon inputIconBg"> 
                <input type="text" name="phone" placeholder="Phonenumber">
                <i class="fa fa-phone fa-lg fa-fw" aria-hidden="true" 
                style="margin-top:2px;"></i>
              </div>
            </div>

            <div class="middleSecondRight">
              <div class="inputWithIcon inputIconBg"> 
                <select type="text" name="gender">
                  <option disabled="">select your gender</option>
                  <option style="color: #000;">Male</option>
                  <option style="color: #000;">Female</option>
                </select>
                <i class="fa fa-venus fa-lg fa-fw" aria-hidden="true" 
                style="margin-top:2px;margin-left:3px;"></i>
              </div>
            </div>

            <div class="lastOne">
              <div class="inputWithIcon inputIconBg"> 
                <input type="password" name="password" placeholder="password">
                <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
              </div>
            </div>

            <div class="lastTwo">
              <div class="inputWithIcon inputIconBg"> 
                <input type="password" name="confirm" placeholder="confirm password">
                <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
              </div>
            </div>

            <div class="finalise">
              <input type="submit" class="form-control submit" name="signup" value="signup">
            </div>
          </div>
        </form>
      </div>
    </section>
  </body>
</html>