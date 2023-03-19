<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="Admin_ALL.css">

</head>
<header>
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
    <button>Employee Dashboard</button>
    <button>Employee Status</button>
    <button>Employee Time keeping</button>
    <button id="LogBt" onclick="window.location.href='welcomepage.php'">Log Out</button>

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
          ?>
        </div>
        <a href="Admin-Month(15&30).php" class="add" name="add-emplo">Monthly Attendance</a>
        <a href="Admin-Leaves.php" class="add" name="add-emplo">Leaves Report</a>

      </div>
    </div>
</body>

</html>