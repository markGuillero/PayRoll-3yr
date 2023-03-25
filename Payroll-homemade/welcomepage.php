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
 
/* CSS */
.button-27 {
  appearance: none;
  background-color: #000000;
  border: 2px solid #1A1A1A;
  border-radius: 15px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 16px;
  font-weight: 600;
  line-height: normal;
  margin: auto;
  min-height: 60px;
  min-width: 0;
  outline: none;
  padding: 16px 24px;
  text-align: center;
  text-decoration: none;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  will-change: transform;
}

.button-27:disabled {
  pointer-events: none;
}

.button-27:hover {
  background-color: white;
  color:black;
  box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
  transform: translateY(-2px);
}

.button-27:active {
  box-shadow: none;
  transform: translateY(0);
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
    <center>
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
      
      <input type ="submit" name = "LogginIn" class = "button-27">
      <input type ="reset" onclick = "window.location.href='SignUp.html'" value = "Sign Up" class = "button-27">
      </center>
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

  if($rowCheckExist >= 1){
  header("Location: Employee-TimeKeeping.php?id=$UserN");
  }

  if($UserN == "admin" and $Pass == "admin"){
    header("Location: Admin-Dashboard.php");
    }
}

?>





</body>

</html>