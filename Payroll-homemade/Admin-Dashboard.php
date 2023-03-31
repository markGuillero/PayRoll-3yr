<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>
<header>
  <style>
    /* Admin-Dashboard.php */
    #logoC {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      display: inline-block;
    }

    #head {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding-top: 6%;
    }

    button {
      background: #D9D9D9;
      border-radius: 20px;
      width: 166px;
      height: 53px
    }

    body {
      font-family: "Poppins", sans-serif;
      padding: 0;
      margin: 0;

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
      width: 100%;
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
      margin-right: 2%;
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
      display: inline-flex;
      flex-direction: column;
      width: 80%;
    }

    .container .table-selector {
      width: 100%;
      margin: auto;
      margin-top: 3%;
      background-color: white;

    }

    table {
      width: 100%;
    }

    .container .table-selector table {
      border: 3px solid lightblue;
      padding: 1%;
      width: 100%;
    }

    .container .table-selector table th {
      margin: 3%;
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

    .custom-pagination {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .custom-pagination a {
      display: inline-block;
      margin: 0 5px;
      padding: 5px 10px;
      border: 1px solid #ccc;
      color: #64bcf4;
      text-decoration: none;
    }

    .custom-pagination a.active {
      background-color: #64bcf4;
      color: #64bcf4;
    }

    .pagination a {
      font-size: 20px;
      color: #64bcf4;
      text-decoration: none;
      padding: 5px 10px;
      border: 1px solid #64bcf4;
      border-radius: 5px;
      margin: 0 5px;
    }

    .pagination a.active {
      background-color: #64bcf4;
      color: white;
      border-color: #64bcf4;
    }

    #Page_Nav {
      background-color: #64bcf4;
      outline: 2px black solid;
      width: 20%;
      height: 100vh;
      float: left;
      display: flex;
      flex-direction: column;
      justify-content: start;
      align-items: center;
      padding-top: 2%;
      box-sizing: border-box;
    }

    #Page_Content {
      width: 75%;
      float: left;
      margin-top: 0%;
      margin-left: 2%;

    }

    /* CSS */
    .button-19 {
      appearance: button;
      background-color: #1899D6;
      border: solid transparent;
      border-radius: 16px;
      border-width: 0 0 4px;
      box-sizing: border-box;
      color: #FFFFFF;
      cursor: pointer;
      display: inline-block;
      font-family: din-round, sans-serif;
      font-size: 15px;
      font-weight: 700;
      letter-spacing: .8px;
      line-height: 20px;
      margin: 0;
      outline: none;
      overflow: visible;
      padding: 13px 16px;
      text-align: center;
      text-transform: uppercase;
      touch-action: manipulation;
      transform: translateZ(0);
      transition: filter .2s;
      user-select: none;
      -webkit-user-select: none;
      vertical-align: middle;
      white-space: nowrap;
      width: 100%;
    }

    .button-19:after {
      background-clip: padding-box;
      background-color: #1CB0F6;
      border: solid transparent;
      border-width: 0 0 4px;
      bottom: -4px;
      content: "";
      left: 0;
      position: absolute;
      right: 0;
      top: 0;
      z-index: -1;
    }

    .button-19:main,
    .button-19:focus {
      user-select: auto;
    }

    .button-19:hover:not(:disabled) {
      filter: brightness(1.1);
      -webkit-filter: brightness(1.1);
    }

    .button-19:disabled {
      cursor: auto;
    }

    .ClsLogOut {
      position: absolute;
      bottom: 50px;
      width: 20%;
    }
    .ActivePage{
      background-color: #64F4B9;
     color:#F49C64;
    }
    .ActivePage::after{
      background-color: #D3FAD6;
    }
  </style>
</header>

<?php
include("Connection.php");

// <!-- Update Employee -->
if (isset($_POST['EmpEdit'])) {
  $EmployeeID = $_POST['EmpID'];
  $EmployeeName = $_POST['EmpName'];
  $HoursWork = $_POST['EmpHRW'];
  $Overtime = $_POST['EmpOver'];
  $Deduction = $_POST['EmpDec'];
  $BasicRate = $_POST['EmpBR'];
  $queryUpdate = "UPDATE payroll_db.employee_data SET Emp_Name = '$EmployeeName', Hours_Work='$HoursWork', Deduction = '$Deduction', Basic_Rate = '$BasicRate', Overtime = '$Overtime'  WHERE Employee_ID ='$EmployeeID'";
  mysqli_query($conn, $queryUpdate);
}
?>

<?php
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
    window.location.href = "Admin-Dashboard.php";
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

  $queryAdd = "iNSERT INTO `payroll_db`.`employee_data` (`Emp_Name`, `Hours_Work`, `Deduction`, `Basic_Rate`, `Overtime`) VALUES ('$AEmployeeN','$AEmployeeHRW','$AEmployeeDTN','$AEmployeeBSR','$AEmployeeOT');";
  $resultadd = @mysqli_query($conn, $queryAdd);
?>
  <script>
    window.location.href = "Admin-Dashboard.php";
  </script>
<?php
}
// Submit to front // search to front
if (isset($_POST['searchSubmitfront'])) {
  $valueToSearch = $_POST['search'];
  $querySearchSelect = "select * from payroll_db.employee_data where concat_ws(' ',Employee_ID,Emp_Name,Hours_Work,Deduction,Basic_Rate,Overtime) like '%$valueToSearch%';";
  if (mysqli_num_rows(filterTable($querySearchSelect)) <= 0) {
    $querySearchSelect = "sELECT * FROM payroll_db.employee_data;";
    $search_result = filterTable($querySearchSelect);
  }
  $search_result = filterTable($querySearchSelect);
} else {
  $querySearchSelect = "sELECT * FROM payroll_db.employee_data;";
  $search_result = filterTable($querySearchSelect);
}

// Submit to Salary // from Admin Transaction
if (isset($_POST['NetSSub'])) {
  $netSalary = $_POST['NetSalary'];
  $EmpIDT = $_POST['EmpIdT'];
  $queryNetS = "uPDATE payroll_db.employee_data SET salary = $netSalary WHERE Employee_ID = $EmpIDT";
  filterTable($queryNetS);
}
?>

<body>
  <?php
  $num_records_per_page = 10;

  // get the current page number
  if (isset($_GET['page'])) {
    $page_num = $_GET['page'];
  } else {
    $page_num = 1;
  }
  $offset = ($page_num - 1) * $num_records_per_page;

  $search_query = "SELECT * FROM payroll_db.employee_data LIMIT $offset, $num_records_per_page";
  $search_result = mysqli_query($conn, $search_query);

  $results_per_page = 10;
  $total_results = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM payroll_db.employee_data"));
  $total_pages = ceil($total_results / $results_per_page);

  ?>

  <div id="Page_Nav">
    <img src="https://cdn.pixabay.com/photo/2016/09/05/18/54/texture-1647380_960_720.jpg" alt="logo" id="logoC">
    <h6>Role:</h6>
    <h6>Name:</h6>
    <button class="button-19 ActivePage">Employee Dashboard</button>
    <button class="button-19">Employee Status</button>
    <button class="button-19">Employee Time keeping</button>
    <button class="button-19" id = "EmpDashAnalytics" >Employee Analytics</button>
    <button class="button-19 ClsLogOut" onclick="window.location.href='welcomepage.php'">Log Out</button>

  </div>

  <div id="Page_Content">
    <div class="container">
      <div class="table-selector">

        <div class="logo">
          <img src="https://i.ibb.co/BgWKjVy/1-removebg-preview.png" alt="1-removebg-preview" border="0">
          <h3>PAYROLL SYSTEM</h3>

          <form action="Admin-Search.php" method="post">
            <th> <input type="text" required value="" class="form-control" placeholder="Search data" name='searchVal'></th>
            <th> <input type="submit" class="searchbtn" name='searchSubmit'></th>
          </form>
        </div>
        <!-- search -->


        <!-- add employee -->
        <a href="Admin-Add.php" class="add" name="add-emplo">+ Add New Employee</a>

        <table>
          <tr>
            <th>Employee ID</th>
            <th>Employee Name</th>

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
                <td><?php echo $row['Emp_Name'] ?></td>

                <td class="Operation">
                  <a href="Admin-Edit.php?id=<?php echo $row['Employee_ID'] ?>" class="btn">VIEWREPORT</a>
                  <a href="PDf-Payslip.php?id=<?php echo $row['Employee_ID'] ?>" name="add-emplo" target="_blank" class="btn">PAYSLIP</a>
                </td>
              </tr>
          <?php
            }
          }
          ?>
        </table>

        <!-- pagination links -->
        <div class="pagination custom-pagination">
          <?php
          $start_page = max(1, $page_num - floor($num_records_per_page / 2));
          $end_page = min($total_pages, $start_page + $num_records_per_page - 1);
          for ($i = $start_page; $i <= $end_page; $i++) {
            if ($i == $page_num) {
              echo "<a class='active' href='Admin-Dashboard.php?page=$i'>$i</a>";
            } else {
              echo "<a href='Admin-Dashboard.php?page=$i'>$i</a>";
            }
          }
          $conn->close();

          ?>
        </div>
        <a href="Admin-Month(15&30).php" class="add" name="add-emplo">Monthly Attendance</a>
        <a href="Admin-Leaves.php" class="add" name="add-emplo">Leaves Report</a>

      </div>
    </div>

    <script>
      var EmpDash = document.getElementById("EmpDashAnalytics").addEventListener("click",EmpDashPage);

      function EmpDashPage(){
        window.location.href='Admin-Dashboard_Analytics.php';
      }
      </script>
</body>

</html>