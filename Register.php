<?php
session_start();

?>
<html>
    <title>Form</title>
    <head>
        <script type="text/javascript" src="Semantic-UI-CSS-master/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.css">
        <script type="text/javascript" src="Semantic-UI-CSS-master/semantic.min.js"></script>
    <style>
        .form-holder {
            background: rgba(255,255,255,0.2);
            margin-top: 10%;
            border-radius: 3px;
          }

          .form-head {
            font-size: 30px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #fff;
            text-shadow: 0 0 30px #000;
            margin: 15px auto 30px auto;
          }
.gg{            margin-top: 100px;
                margin-left: 450px;
                margin-right: 450px;
                font-size: 1.25em;
            }
          .remember-me {
            text-align: left;
          }
          .ui.checkbox label {
            color: #ddd;
          }
        </style>
    </head>
       
    <body>
        <div class="gg">
        <div class="ui raised piled segment">
            <div class="container">
       <div class="ui one column center aligned grid">
           <form action="Controller/Register_Control.php" method="get">
          <div class="column ten wide form-holder">
              <img class="ui tiny centered image" src="logo.png">
              <div class="ui horizontal divider">
                  
            <h2 class="ui centered orange header">Sign up</h2>
              </div>
            <div class="ui form">
              <div class="field">
                <input type="text" name="register[name]" placeholder="Username">
              </div>
                <div class="field">
                <input type="text" name="register[email]" placeholder="Email">
              </div>
              <div class="field">
                <input type="password" name="register[password]" placeholder="Password">
              </div>
              <div class="field">
                <input type="submit" name="submit" value="sign up" class="ui button fluid teal">
              </div>

              <div class="inline field">
<!--                <div class="ui checkbox">-->
<!--                  <input type="checkbox">-->
<!--                  <label>Remember me</label>-->
<!--                </div>-->
                  <label>Already a user?<a href="Login.php">Sign in</a></label>
              </div>
              </div>
           </div>
           </form>
            </div>
            </div>
          </div>
        </div>
    </body>
</html>