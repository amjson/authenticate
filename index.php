<?php include ("inc/middleMan_verify.php"); ?>

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
    #form {
      border: 1px solid transparent;
      background-color: transparent;
      width: 90%;
      margin-top: -20px;
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
                <a class='dropdown-item locate' href='signup.php'>
                signup</a><br>
                <a class='dropdown-item locate' href='request.php'>
                forgot password</a>
              </div>
            </li>
          </ul>
        </nav>

        <form action="" method="POST" id="form" autocomplete="off">             
          <div class="job_body">
            <div class="title"><h4>signin</h4></div>

            <div class="boxOne">
              <div class="inputWithIcon inputIconBg">
                <input type="text" name="user_email" placeholder="Email">
                <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true" 
                style="margin-top:3px;"></i>
              </div>
            </div>

            <div class="boxTwo">
              <div class="inputWithIcon inputIconBg">
                <input type="password" name="user_pass" id="pwd" placeholder="Password">
                <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
              </div>

              <div class="encrypt dencrypt" onclick="myFunction()">
                <i class="fa fa-eye fa-lg fa-fw" id="hide1" aria-hidden="true"></i>
                <i class="fa fa-eye-slash fa-lg fa-fw" id="hide2" aria-hidden="true"></i>
              </div>
            </div>

            <div class="finalise">
              <input type="submit" class="form-control submit" name="signin" value="signin">
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