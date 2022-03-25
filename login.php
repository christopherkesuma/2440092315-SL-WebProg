<?php
session_start();
if (!isset($_SESSION['register-done'])) header('Location: register.php');
if (isset($_SESSION['login-done'])) header('Location: home.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .input-container {
            display: flex;
            padding-top: 30px;
        }
        .form-label {
            width: 30%;
            font-size: 15pt;
        }
        .form-input {
            width: 70%;
        }
        input {
            width: 90%;
        }
        .form-button {
            box-sizing: content-box;
            width: 100px;
            height: 40px;
            line-height: 40px;
            text-decoration: none;
            color: black;
            text-align: center;
            cursor: pointer;
            border: none;
        }
    </style>
</head>
<body style="margin: 0;">
    <div style="background-color: #fbfdac; height:100vh">
        <div style="padding:50px 25vw;width:50vw;">
            <div style="text-align: center;font-size:24pt">Login</div>
            <div style="background-color: #ace6fd;margin-top:10vh;">
                <form action="./loginProcess.php" method="POST" style="margin: 0 50px;">
                    <div class="input-container">
                        <div class="form-label">Username</div>
                        <div class="form-input">
                            <input type="text" name="username" id="" required>
                        </div>
                    </div>
                    <div class="input-container">
                        <div class="form-label">Password</div>
                        <div class="form-input">
                            <input type="password" name="password" id="" required>
                        </div>
                    </div>
                    <div class="input-container">
                        <div class="form-label"></div>
                        <div style="display: flex;justify-content:space-around;width:60%;margin-bottom:30px">
                            <input type="submit" value="Login" name="login" class="form-button" style="background-color: #adf59f;">
                            <a href="./welcome.php" class="form-button" style="background-color: #fdd7ac;">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
            <div style="text-align: center;color:red;margin-top:30px;font-size:15pt">
                <?= isset($_SESSION['msg-login']) ? $_SESSION['msg-login'] : ''; ?>
            </div>
        </div>
    </div>
</body>
</html>