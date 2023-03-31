<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <style>
    .light {
      --mainColor: #64bcf4;
      --hoverColor: #5bacdf;
      --backgroundColor: #f1f8fc;
      --darkOne: #312f3a;
      --darkTwo: #45424b;
      --lightOne: #919191;
      --lightTwo: #aaa;
    }

    body {
      font-family: "Poppins", sans-serif;
      background: #0000;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      margin-top: 5%;
    }

    a {
      text-decoration: none;
    }

    .container {
      position: relative;
      max-width: 81rem;
      width: 100%;
      margin: 0 auto;
      padding: 0 3rem;
      z-index: 10;
    }

    .logo {
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    .logo img {
      width: 40px;
      margin-right: 0.6rem;
      margin-top: -0.6rem;
    }

    .logo h3 {
      color: var(--darkTwo);
      font-size: 1.55rem;
      line-height: 1.2;
      font-weight: 700;
    }

    .showcase-area .container {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      align-items: center;
      justify-content: center;
    }

    input.login {
      background-color: #64bcf4;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 20px;
      cursor: pointer;
    }

    input.login:hover {
      background-color: red;
      border: 1px solid black;

    }

    form {
      width: 500px;
      border: 3px solid rgb(177, 142, 142);
      padding: 20px;
      background: gray;
      border-radius: 20px;
    }

    input {
      display: block;
      border: 2px solid #ccc;
      width: 95%;
      padding: 10px;
      margin: 10px auto;
      border-radius: 5px;
    }

    a {
      background-color: #64bcf4;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 20px;
      cursor: pointer;

    }

    a:hover {
      background-color: red;
      border: 1px solid black;
    }

    h4 {
      text-align: center;
      color: white;
    }

    /* CSS */
    .button-29 {
      align-items: center;
      appearance: none;
      background-image: radial-gradient(100% 100% at 100% 0, red 0, orange 100%);
      border: 0;
      border-radius: 6px;
      box-shadow: rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, rgba(58, 65, 111, .5) 0 -3px 0 inset;
      box-sizing: border-box;
      color: #fff;
      cursor: pointer;
      display: inline-flex;
      font-family: "JetBrains Mono", monospace;
      height: 48px;
      justify-content: center;
      line-height: 1;
      list-style: none;
      overflow: hidden;
      padding-left: 16px;
      padding-right: 16px;
      position: relative;
      text-align: left;
      text-decoration: none;
      transition: box-shadow .15s, transform .15s;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      white-space: nowrap;
      will-change: box-shadow, transform;
      font-size: 18px;
    }

    .button-29:focus {
      box-shadow: orange 0 0 0 1.5px inset, orange 0 2px 4px, red 0 7px 13px -3px, orange 0 -3px 0 inset;
    }

    .button-29:hover {
      box-shadow: orange 0 4px 8px, red 0 7px 13px -3px, orange 0 -3px 0 inset;
      transform: translateY(-2px);
    }

    .button-29:active {
      box-shadow: orange 0 3px 7px inset;
      transform: translateY(2px);
    }

    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      position: relative;
      margin: 10% auto;
      /* 15% from the top and centered */
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      /* Could be more or less, depending on screen size */
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      animation-name: animatetop;
      animation-duration: 0.4s
    }

    /* Add Animation */
    @keyframes animatetop {
      from {
        top: -300px;
        opacity: 0
      }

      to {
        top: 0;
        opacity: 1
      }
    }

    /* The Close Button */
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>

  <?php
  include("Connection.php");
  if (isset($_POST['SignUpEmp'])) {
    $Name = $_POST['NameEmp'];
    $Add = $_POST['Add'];
    $ContNo = $_POST['ContactNo'];
    $Email = $_POST['Email'];
    $UsrnN = $_POST['UserNameVTxt'];
    $Pass = $_POST['PassVTxt'];
    $sql = "INSERT INTO `payroll_db`.`emp_privdata`(
      `Name`,
      `Address`,
      `ContactNo:`,
      `Email`,
      `Username`,
      `Password`) VALUES('$Name','$Add','$ContNo','$Email','$UsrnN','$Pass')";
    filterTable($sql);
  }
  ?>

</head>


<body>
  <main>
    <div class="big-wrapper light">
      <img src="./img/shape.png" alt="" class="shape" />

      <header>
        <div class="container">
          <div class="logo">
            <img src="https://i.ibb.co/BgWKjVy/1-removebg-preview.png" alt="1-removebg-preview" border="0">
            <h3>PAYROLL SYSTEM</h3>
          </div>
        </div>
      </header>

      <div class="showcase-area">
        <div class="container">
          <div class="left">
            <div class="big-title">
              <h1>Payroll System</h1>
              <h1>Click Get Started to login</h1>
            </div>
            <p class="text">
              Payroll system that will make your life easier
            </p>
            <div class="links">
              <ul>
                <a href="SignUp.html" class="btn">Signup</a>
              </ul>
            </div>
          </div>

          <div class="right">

            <head>
              <title>LOGIN</title>
            </head>

            <body>

              <form action="#" method="post">

                <h2>LOGIN</h2>
                <div id="sign&pass">

                  <label>Username</label>

                  <input type="text" placeholder="Username" id="UserNsign" name="SignInTxtUsername" required><br>

                  <label>Password</label>

                  <input type="password" placeholder="Password" id="PassNsign" name="PassTxtUsername" required><br>
                </div>
                <div>
                  <input type="submit" name="LogginIn" value="Login" class="login"><br><br>
                </div>
                <h5 class="button-29" id="myBtn">Forgot Password</h5>
              </form>

              <!-- The Modal -->
              <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                  <span class="close">&times;</span>
                  <form action="#" method="post">
                    <h2>Forgot Password</h2>
                    <h5>Enter UserName:</h5>
                    <input type="text" placeholder="Username" id="ForgotUserName" name="ForgotUserName"><br>
                    <h5>Enter Email:</h5>
                    <input type="text" placeholder="Email" id="ForgotEmail" name="ForgotEmail"><br>
                    <input type="submit" name="ForgotData" value="Reset Password" class="login">
                  </form>
                </div>

              </div>

              <?php

              if (isset($_POST["LogginIn"])) {
                ob_start();

                $servername = "localhost";
                $username = "root";
                $password = "";
                $conn = new mysqli($servername, $username, $password) or die("Could Not Connect to Database");

                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
                }

                $UserN = $_POST["SignInTxtUsername"];
                $Pass = $_POST["PassTxtUsername"];

                $sql2 = "Select * From payroll_db.emp_privdata where Username = '$UserN' and Password = '$Pass'";
                $rowCheckExist = mysqli_num_rows(mysqli_query($conn, $sql2));

                if ($rowCheckExist >= 1) {
                  echo "<script> window.location='Employee-TimeKeeping.php?id=$UserN'; </script>";
                  exit; // must exit to prevent the rest of the script from executing
                }

                if ($UserN == "admin" and $Pass == "admin") {
                  echo "<script> window.location='Admin-Dashboard.php'; </script>";
                  exit; // must exit to prevent the rest of the script from executing
                }
              }

              use PHPMailer\PHPMailer\PHPMailer;
              use PHPMailer\PHPMailer\SMTP;

              if (isset($_POST["ForgotData"])) {
                // Load Composer's autoloader
                require 'vendor/autoload.php';

                $FUserN = $_POST["ForgotUserName"];
                $FEmail = $_POST["ForgotEmail"];
                $user;
                $pass;
                $sql1 = "SELECT * FROM payroll_db.emp_privdata WHERE Username = '$FUserN' AND Email = '$FEmail'";
                $querry = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($querry) > 0) {
                  while ($row = mysqli_fetch_array($querry)) {
                    $user = $row['Username'];
                    $pass = $row['Password'];
                  }
                } else {
                  echo ("Not Existing <br>");
                }
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                  //Server settings
                  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                  $mail->isSMTP();
                  $mail->Host       = 'smtp.gmail.com';
                  $mail->SMTPAuth   = true;
                  $mail->Username   = 'crossmode75@gmail.com';
                  $mail->Password   = 'cqinjghfkrlunbcl';
                  $mail->SMTPSecure = 'ssl';
                  $mail->Port       = 465;
              
                  //Recipients
                  $mail->setFrom('crossmode75@gmail.com', 'Sent From Php');
                  $mail->addAddress($FEmail, "test");
              
                  $mail->isHTML(true);
                  $mail->Subject = 'Forgot Password';
                  $mail->Body    = 'UserName:' . $user . "<br>" . "Password:" . $pass;
                  $mail->AltBody = 'Test';
                  $mail->SMTPDebug  = 0;
                  $mail->send();
              } catch (Exception $e) {
                  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                  // {$mail->ErrorInfo}
              }              
              }
              mysqli_close($conn);
              ?>

            </body>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
</body>

</html>