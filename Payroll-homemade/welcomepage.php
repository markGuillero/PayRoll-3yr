<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="stylesheet" href="Admin_ALL.css">
<style>
    #UserNsign,
    #PassNsign {
    display: inline-block;
    margin: 9%;
    border-radius: 20px;
    width: 403px;
    height: 13px;
    size: 15px;
    background-color: white;
  }
  #UserNsign{
    outline: 2px solid black;
  }
  #PassNsign {
    margin-top: 1%;
    border-radius: 20px;
    width: 403px;
    height: 23px;
    size: 15px;
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
  <div id="card-whole">
    <div id="head">
      <img src="https://cdn.pixabay.com/photo/2016/09/05/18/54/texture-1647380_960_720.jpg" alt="logo" id="logoC">
      <div id="name">
        <h1>Company Name: PlaceHolder</h1>
        <br>
      </div>
      <form action="#" method="post">
      <div id="sign&pass">
        <input type="text" placeholder="Username" id = "UserNsign" name = "SignInTxtUsername" required>
        <input type="password" placeholder="Password" id = "PassNsign" name = "PassTxtUsername" required>
      </div>
      <input type ="submit" name = "LogginIn">
      <button onclick = "window.location.href='SignUp.html'">Sign Up</button>

      </form>
    </div>
  </div>
<?php
if(isset($_POST["LogginIn"])){
 $UserN = $_POST["SignInTxtUsername"];
 $Pass = $_POST["PassTxtUsername"];

  $sql1 = "Select * From payroll_db.emp_privdata where Username = '$UserN' and Password = '$Pass'";
  $rowCheckExist = mysqli_num_rows(filterTable($sql1));
  echo $rowCheckExist;

  if($rowCheckExist > 0){
  header("Location: Admin-Dashboard.php");
  }
}

?>





</body>

</html>