<?php
session_start();
include_once 'Controller/db_stepup.php';

$dbObj = new DataBase();

if (isset($_GET['submit']))
{
    $email = $_GET['login']['email'];

    $sql = "SELECT * FROM user WHERE Email = "."'$email'";

    $con = $dbObj->getConnection();

    try
    {
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch (PDOException $exception)
    {
        echo 'User Data '.$exception;
    }

    if (!$userData)
    {
        echo "<script>alert('Please Register First')</script>";
    }
    elseif ($userData['Password'] != $_GET['login']['password'])
    {
        echo "<script>alert('Wrong Password')</script>";

    }
    elseif ($userData['Password'] == $_GET['login']['password'])
    {
        $_SESSION['UserID'] = $userData['ID'];
        $ref = "Home.php";
        echo '<script>window.location = "'.$ref.'"</script>';
        exit;
    }
}

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
                <form action="Login.php" method="get">
                    <div class="column ten wide form-holder">
                        <img class="ui tiny centered image" src="logo.png">
                        <div class="ui horizontal divider">

                            <h2 class="ui centered orange header">Log In</h2>
                        </div>
                        <div class="ui form">
                            <div class="field">
                                <input type="text" name="login[email]" placeholder="Email" required>
                            </div>
                            <div class="field">
                                <input type="password" name="login[password]" placeholder="Password" required>
                            </div>
                            <div class="field">
                                <input type="submit" name="submit" value="Login" class="ui button fluid teal">
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
