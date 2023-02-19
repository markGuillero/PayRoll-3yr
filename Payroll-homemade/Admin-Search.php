<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body {
    font-family: "Poppins", sans-serif;
  }

  .light {
    --mainColor: #64bcf4;
    --hoverColor: #5bacdf;
    --backgroundColor: #f1f8fc;
    --darkOne: #312f3a;
    --darkTwo: #45424b;
    --lightOne: #919191;
    --lightTwo: #aaa;
  }

  .container {
    position: relative;
    max-width: 81rem;
    width: 100%;
    margin: 0 auto;
    padding: 0 3rem;
    z-index: 10;
  }

  header {
    position: relative;
    z-index: 70;
  }

  header .container {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
  }

  .overlay {
    display: none;
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
    color: black;
    font-size: 1.55rem;
    line-height: 1.2;
    font-weight: 700;
  }

  .links ul {
    display: flex;
    list-style: none;
    flex-direction: row;
    gap: 10px
  }

  .links a {
    color: black;
    display: inline-block;
    margin: 3%;
    transition: 0.3s;
  }

  .links a:hover {
    color: var(--hoverColor);
    transform: scale(1.05);
  }

  a.btn {
    display: inline-block;
    white-space: nowrap;
  }

  .btn {
    background-color: #64bcf4;
    color: white;
    padding: 12px 10px;
    border: none;
    border-radius: 16px;
    cursor: pointer;
    text-decoration: none;
  }

  .btn:hover {
    background-color: red;
    transform: scale(1) !important;
  }

  .hamburger-menu {
    position: relative;
    z-index: 99;
    width: 2rem;
    height: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    display: none;
  }

  .hamburger-menu .bar {
    position: relative;
    width: 100%;
    height: 3px;
    background-color: black;
    ;
    border-radius: 3px;
    transition: 0.5s;
  }

  .bar::before,
  .bar::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: black;
    ;
    border-radius: 3px;
    transition: 0.5s;
  }

  .container {
    display: flex;
    flex-direction: row;
    width: 100%;
  }

  .container .table-selector {
    width: 100%;
    margin: auto;
    margin-top: 3%;
    background-color: white;
  }

  .container .table-selector table {
    border: 3px solid lightblue;
    padding: 2%;
    width: 100%;
  }

  .container .table-selector table th {
    padding: 1%;

  }

  .container .table-selector table td {
    text-align: center;
  }

  .Operation {
    text-align: center;
  }

  .add {
    background-color: #64bcf4;
    color: white;
    padding: 12px 10px;
    border: none;
    border-radius: 16px;
    cursor: pointer;
    text-decoration: none;
  }

  .add:hover {
    background-color: red;
    transform: scale(1) !important;
  }

  input[type=text] {
    width: 100;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;

  }

  .searchbtn {
    background-color: #64bcf4;
    color: white;
    padding: 12px 10px;
    border: none;
    border-radius: 16px;
    cursor: pointer;
    text-decoration: none;
  }
</style>


<header>

  <div class="container">
    <div class="logo">
      <img src="https://i.ibb.co/BgWKjVy/1-removebg-preview.png" alt="1-removebg-preview" border="0">
      <h3>PAYROLL SYSTEM</h3>
    </div>

</header>

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//search Filter
if (isset($_POST['searchSubmit'])) {
  $valueToSearch = $_POST['searchVal'];
  $searchQuery = "select * from payroll_db.employee_data where concat_ws(' ',Employee_ID,Employee_Name,Hours_Work,Deduction,Basic_Rate,Overtime) like '%$valueToSearch%';";
  if (mysqli_num_rows(filterTable($searchQuery)) <= 0) {
    $querySearchSelect = "sELECT * FROM payroll_db.employee_data;";
    $search_result = filterTable($querySearchSelect);
  }
  $search_result = filterTable($searchQuery);
} else {
  $querySelect = "sELECT * FROM payroll_db.employee_data;";
  $search_result = filterTable($querySelect);
  // header("Location: Admin-Crud.php");
}


function filterTable($query)
{
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn = mysqli_connect($servername, $username, $password);
  $filter_Result = mysqli_query($conn, $query);
  return $filter_Result;
}


// <!-- Update Employee -->
if (isset($_POST['EmpEdit'])) {
  $EmployeeID = $_POST['EmpID'];
  $EmployeeName = $_POST['EmpName'];
  $HoursWork = $_POST['EmpHRW'];
  $Overtime = $_POST['EmpOver'];
  $Deduction = $_POST['EmpDec'];
  $BasicRate = $_POST['EmpBR'];

  $queryUpdate = "Update payroll_db.employee_data set Employee_Name = '$EmployeeName', Hours_Work='$HoursWork',Deduction = '$Deduction', Basic_Rate = '$BasicRate', Overtime = '$Overtime'  WHERE Employee_ID ='$EmployeeID'";
  mysqli_query($conn, $queryUpdate);
?>
  <script>
    window.location.href = "Admin-Crud.php";
  </script>
<?php
}

// <!-- Delete Employee -->
if (isset($_POST['dELETE'])) {
  $Del_id = $_POST['Empt_delID'];
  $queryDel = "sELECT * FROM payroll_db.employee_data";
  $resultDel = @mysqli_query($conn, $queryDel);
  $rowDel = mysqli_fetch_array($resultDel);
  if ($rowDel) {
    $queryDel = "Delete from payroll_db.employee_data WHERE Employee_ID='$Del_id'";
    mysqli_query($conn, $queryDel);
  }
?>
  <script>
    window.location.href = "Admin-Crud.php";
  </script>
<?php
}


// Add Employee
if (isset($_POST['Add_Employee'])) {
  $AEmployeeN = $_POST['AEmpName'];
  $AEmployeeHRW = $_POST['AEmpHRW'];
  $AEmployeeOT = $_POST['AEmpOT'];
  $AEmployeeDTN = $_POST['AEmpDTN'];
  $AEmployeeBSR = $_POST['AEmpBSR'];

  $queryAdd = "iNSERT INTO `payroll_db`.`employee_data` (`Employee_Name`, `Hours_Work`, `Deduction`, `Basic_Rate`, `Overtime`) VALUES ('$AEmployeeN','$AEmployeeHRW','$AEmployeeDTN','$AEmployeeBSR','$AEmployeeOT');";
  $resultadd = @mysqli_query($conn, $queryAdd);
?>
  <script>
    window.location.href = "Admin-Crud.php";
  </script>
<?php
}
?>

<body>
  <div class="container">
    <div class="table-selector">
      <!-- search -->
      <form action="Admin-Crud.php" method="POST">
        <th><input type="text" name="search" required value="" class="form-control" placeholder="Search data"></th>
        <th><button type="submit" class="searchbtn" name='searchSubmitfront'>Search</button></th>
      </form>
      <!-- add employee -->
      <a href="Admin-Add.php" class="add" name="add-emplo">+ Add New Employee</a>


      <table>
        <tr>
          <th>Employee ID</th>
          <th>Employee Name</th>
          <th>Hours Work</th>
          <th>Overtime</th>
          <th>Deduction</th>
          <th>Basic Rate</th>
          <th colspan="2">Operations</th>
        </tr>
        <?php
        if (mysqli_num_rows($search_result) == 0) {
          $TextNRF = "Records Empty Found";
        } else {
          while ($row = mysqli_fetch_array($search_result)) {
        ?>
            <tr>
              <td><?php echo $row['Employee_ID'] ?></td>
              <td><?php echo $row['Employee_Name'] ?></td>
              <td><?php echo $row['Hours_Work'] ?></td>
              <td><?php echo $row['Overtime'] ?></td>
              <td><?php echo $row['Deduction'] ?></td>
              <td><?php echo $row['Basic_Rate'] ?></td>
              <td class="Operation"><a href="Admin-Edit.php?id=<?php echo $row[0] ?>" class="btn">EDIT</a>
                <a href="Admin-Delete.php?id=<?php echo $row[0] ?>" class="btn">DELETE</a>
              </td>
            </tr>
        <?php

          }
        }
        ?>

      </table>
    </div>
  </div>


</body>

</html>