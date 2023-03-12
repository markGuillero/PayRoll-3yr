<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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


// <!-- Update Employee -->
if (isset($_POST['EmpEdit'])) {
  $EmployeeID = $_POST['EmpID'];
  $EmployeeName = $_POST['EmpName'];
  $HoursWork = $_POST['EmpHRW'];
  $Overtime = $_POST['EmpOver'];
  $Deduction = $_POST['EmpDec'];
  $BasicRate = $_POST['EmpBR'];

  $queryUpdate = "UPDATE payroll_db.employee_data SET Employee_Name = '$EmployeeName', Hours_Work='$HoursWork', Deduction = '$Deduction', Basic_Rate = '$BasicRate', Overtime = '$Overtime'  WHERE Employee_ID ='$EmployeeID'";
  mysqli_query($conn, $queryUpdate);

  // redirect back to the same page
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit();
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

// Submit to front // search to front

if (isset($_POST['searchSubmitfront'])) {
  $valueToSearch = $_POST['search'];
  $querySearchSelect = "select * from payroll_db.employee_data where concat_ws(' ',Employee_ID,Employee_Name,Hours_Work,Deduction,Basic_Rate,Overtime) like '%$valueToSearch%';";
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

function filterTable($query)
{
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn = mysqli_connect($servername, $username, $password);
  $filter_Result = mysqli_query($conn, $query);
  return $filter_Result;
}




?>

<body>
  <?php
  $num_records_per_page = 10;

  $servername = "localhost";
  $username = "root";
  $password = "";

  // establish a connection to the database
  $conn = mysqli_connect($servername, $username, $password);

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

  <div class="container">
    <div class="table-selector">
      <!-- search -->
      <form action="Admin-Search.php" method="post">
        <th> <input type="text" required value="" class="form-control" placeholder="Search data" name='searchVal'></th>
        <th> <input type="submit" class="searchbtn" name='searchSubmit'></th>
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
          <th>Salary</th>
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
              <td><?php echo $row['Salary'] ?></td>

              <td class="Operation">
                <a href="Admin-Edit.php?id=<?php echo $row['Employee_ID'] ?>" class="btn">EDIT</a>
                <a href="Admin-Delete.php?id=<?php echo $row['Employee_ID'] ?>" class="btn">DELETE</a>
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
            echo "<a class='active' href='Admin-Crud.php?page=$i'>$i</a>";
          } else {
            echo "<a href='Admin-Crud.php?page=$i'>$i</a>";
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