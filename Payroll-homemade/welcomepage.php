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
              </form>

              <?php
              if (isset($_POST["LogginIn"])) {
                $UserN = $_POST["SignInTxtUsername"];
                $Pass = $_POST["PassTxtUsername"];

                $sql1 = "Select * From payroll_db.emp_privdata where Username = '$UserN' and Password = '$Pass'";
                $rowCheckExist = mysqli_num_rows(filterTable($sql1));

                if ($rowCheckExist >= 1) {
                  header("Location: Employee-TimeKeeping.php?id=$UserN");
                }

                if ($UserN == "admin" and $Pass == "admin") {
                  header("Location: Admin-Dashboard.php");
                }
              }
              ?>

            </body>
          </div>
        </div>
      </div>
    </div>
  </main>


  </body>
   </html>