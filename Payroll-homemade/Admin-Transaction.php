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
  body {
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



  /* CSS */
  .button-42 {
    background-color: initial;
    background-image: linear-gradient(-180deg, #B4E9FF, #3896C7);
    border-radius: 6px;
    box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
    color: #FFFFFF;
    cursor: pointer;
    display: inline-block;
    font-family: Inter, -apple-system, system-ui, Roboto, "Helvetica Neue", Arial, sans-serif;
    height: 50px;
    line-height: 40px;
    outline: 0;
    overflow: hidden;
    padding: 0 20px;
    pointer-events: auto;
    position: relative;
    text-align: center;
    touch-action: manipulation;
    user-select: none;
    -webkit-user-select: none;
    vertical-align: top;
    white-space: nowrap;
    width: 40%;
    margin-top: -3%;
    margin-bottom: 3%;
    z-index: 9;
    border: 0;
    transition: box-shadow .2s;
    color: black;
  }

  .button-42:hover {
    box-shadow: rgba(253, 76, 0, 0.5) 0 3px 8px;
  }

  .NetS {
    display: block;
    margin-top: 0%;
    margin-right: 4%;

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

  $queryAtt = "sELECT * FROM payroll_db.attendance_sheet_emp Where Employee_ID = '$id'";
  $AttendanceData = mysqli_query($conn, $queryAtt);

  $LateCounter = 0;
  $AbsentCounter = 0;

  $time1 = "09:00:00";
  $LateDecPrice = 72.125;


  while ($rowAtt = mysqli_fetch_array($AttendanceData)) {
    $time1_datetime = DateTime::createFromFormat('H:i:s', $time1);
    $time_in_datetime = DateTime::createFromFormat('H:i:s', $rowAtt['Time In']);

    if (is_null($rowAtt['Time In'])) {
      $AbsentCounter++;
    }

    if ($time1_datetime < $time_in_datetime) {
      $LateCounter++;
      if ($LateCounter++ == 3) {
        $AbsentCounter++;
      }
    }
  }
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
          <h3>Employee Name: <?php echo $TData['Emp_Name'] ?> </h3>
          <h4>Gross Salary:</h4>
          <ul>
            <li>Hours Work: <?php echo $TData['Hours_Work'] ?></li>
            <li>Overtime: <?php echo $TData['Overtime'] ?></li>
            <li>Basic Rate: <?php echo $TData['Basic_Rate'] ?></li>
          </ul>
        </div>

        <div class="Deductions">
          <h4>Deductions: </h4>
          <ul>
            <li>Attendance Deductions: <input type=text name=AttD value="<?php echo $LateDecPrice * $LateCounter ?>"></li>
            <li>Government Deductions: <input type=text name=GovD value=0></li>
            <li>Employee Cash advances:<input type=text name=EmpCa value=0> </li>
          </ul>

        </div>

        <div class="Adhoc-Pay">
          <h4>Adhoc-Pay:</h4>
          <ul>
            <li>Incentives (Honorarium and Commissions): <input type=text name=Incent value=0> </li>
            <li>Midterm Year/ Annual Bonus: <input type=text name=MidAnB value=0> </li>
          </ul>

          <form action="Admin-Dashboard.php" method="POST" onsubmit="calculateNetSalary()">
            <input type="hidden" name="NetSalary" id="NetSalaryInput">
            <input type="hidden" name="EmpIdT" value="<?php echo $TData['Employee_ID'] ?>">

            <h1 class="NetS">Net Salary: <span id="NetSalaryDisplay"></span></h1>
            <h1 class="NetsS">Original Salary: <span id="NetSalaryDisplay"></span></h1>

            <input type="submit" class="button-42" role="button" name="NetSSub" value="Submit">
          </form>
        </div>


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
    window.location.href = "Admin-Dashboard.php";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      window.location.href = "Admin-Dashboard.php";
    }
  }

  function calculateNetSalary() {
    // Get the values of the inputs
    const attendanceDeductions = Number(document.getElementsByName('AttD')[0].value) || 0;
    const governmentDeductions = Number(document.getElementsByName('GovD')[0].value) || 0;
    const employeeCashAdvances = Number(document.getElementsByName('EmpCa')[0].value) || 0;
    const incentives = Number(document.getElementsByName('Incent')[0].value) || 0;
    const midtermAnnualBonus = Number(document.getElementsByName('MidAnB')[0].value) || 0;
    const grossSalary = Number('<?php echo $TData['Basic_Rate'] ?>');
    const netSalary = Number('<?php echo $TData['Salary'] ?>');

    // Calculate the net salary
    const totalDeductions = attendanceDeductions + governmentDeductions + employeeCashAdvances;
    const adhocPay = incentives + midtermAnnualBonus;
    const calculatedNetSalary = grossSalary - totalDeductions + adhocPay ;

    // Display the net salary on the page
    const netSalaryElement = document.querySelector('.NetS');
    netSalaryElement.textContent = `Net Salary: ${calculatedNetSalary}`;

    const netSalaryElements = document.querySelector('.NetsS');
    netSalaryElements.textContent = `Orginal Salary: ${netSalary}`

    document.getElementById("NetSalaryInput").value = calculatedNetSalary.toFixed(2);

    // Display the net salary to the user
    document.getElementById("NetSalaryDisplay").textContent = "Php " + calculatedNetSalary.toFixed(2);
  }

  // Set up event listeners to call the function whenever any of the input values change
  const inputs = document.querySelectorAll('input[type="text"]');
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('input', calculateNetSalary);
  }

  const data = {
    attendanceDeductions: Number(document.getElementsByName('AttD')[0].value),
    governmentDeductions: Number(document.getElementsByName('GovD')[0].value),
    employeeCashAdvances: Number(document.getElementsByName('EmpCa')[0].value),
    incentives: Number(document.getElementsByName('Incent')[0].value),
    midtermAnnualBonus: Number(document.getElementsByName('MidAnB')[0].value),
    grossSalary: Number('<?php echo $TData['Basic_Rate'] ?>')
  };

  fetch('PDf-Payslip.php', {
      method: 'POST',
      body: JSON.stringify(data)
    })
    .then(response => {
      // handle response from server
    })
    .catch(error => {
      // handle error
    });



  // Call the function initially to calculate the net salary based on the initial input values
  calculateNetSalary();
</script>

</body>

</html>