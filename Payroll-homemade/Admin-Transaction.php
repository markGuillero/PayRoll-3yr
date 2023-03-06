<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  /* MODAL CONTENT TERM & CONDITION */
  body{
    padding: 0;
    margin: 0;

  }
  .modal {
    display: block;
    /* Hidden by default */
    position: relative;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 50px;
    /* Location of the box */
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

  /* Modal Content */
  .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s;
    text-align: left;
  }

  /* Add Animation */
  @-webkit-keyframes animatetop {
    from {
      top: -300px;
      opacity: 0
    }

    to {
      top: 0;
      opacity: 1
    }
  }

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
    color: black;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: red;
    text-decoration: none;
    cursor: pointer;
  }

  .modal-header {
    padding: 2px 10px;
    background-color: #64bcf4;
    color: black;
    text-align: center;
    font-size: 20px;
    padding-bottom: 3%;
  }



  .modal-body {
    padding: 2px 16px;
    text-align: center;
  }

  .modal-footer {
    padding: 2px 16px;
    background-color: #D3D3D3;
    color: white;
  }

  input[type=text] {
    width: 100;
    padding: 10px;
    margin: 5px 0 10px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    font-size: 16px;
  }

  input.btn {
    background-color: #64bcf4;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 16px;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }

  input.btn:hover {
    background-color: red;
    border: 1px solid black;
  }

  .Salary,
  .Deductions,
  .Adhoc-Pay {
    display: inline-block;
    width: 50%;
    margin-top: 1px;
    text-align: left;
    font-size: 25px;
  }
</style>

<body>
<?php
      $Servername = "localhost";
      $username = "root";
      $password = "";
      $TextNRF = "";
      $conn = new mysqli($Servername, $username, $password) or die("Could Not Connect to Database");
      $id = $_GET['id'];
      $query = "sELECT * FROM payroll_db.employee_data where Employee_ID = '$id'";
      $TrasactionData = mysqli_query($conn, $query);
      $TData = mysqli_fetch_array($TrasactionData);
      ?>
  <!-- EDIT MODAL -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Transaction Sheet</h2>
      </div>

      <div class="modal-body">

        <div class="Salary">
        <h5>Employee Name: <?php echo $TData['Employee_Name']?> </h5>
          <h5>Gross Salary:</h5>
          <ul>
              <li>Hours Work: <?php echo $TData['Hours_Work']?></li>
              <li>Overtime: <?php echo $TData['Overtime']?></li>
              <li>Basic Rate: <?php echo $TData['Basic_Rate']?></li>
            </ul>
        </div>

        <div class="Deductions">
          <h5>Deductions: </h5>
          <ul>
              <li>Attendance Deductions: <input type=text name = AttD></li>
              <li>Government Deductions: <input type=text name = GovD></li>
              <li>Employee Cash advances:<input type=text name = EmpCa> </li>
            </ul>
        </div>

        <div class="Adhoc-Pay">
          <h5>Adhoc-Pay:</h5>
          <ul>
              <li>Incentives (Honorarium and Commissions): <input type=text name = EmpCa> </li>
              <li>Midterm Year/ Annual Bonus: <input type=text name = EmpCa> </li>
              <li>Incentives (Honorarium and Commissions): <input type=text name = EmpCa> </li>
              <li>Midterm Year/ Annual Bonus: <input type=text name = EmpCa> </li>
            </ul>
        </div>
        <h5> Net Salary: </h5>
    
    </div>
    <div class="modal-footer">
      <h3>PAYROLL SYSTEM</h3>
    </div>
  </div>
  </div>
</body>

<script>
  var modal = document.getElementById("myModal");
  var span = document.getElementsByClassName("close")[0];


  span.onclick = function() {
    modal.style.display = "none";
    window.location.href = "Admin-Crud.php";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      window.location.href = "Admin-Crud.php";
    }
  }
</script>

</body>

</html>