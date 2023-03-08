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
    margin: 0;
    padding: 0;

  }

  /* MODAL CONTENT TERM & CONDITION */
  .modal {
    display: block;
    /* Hidden by default */
    position: relative;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
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
    text-align: center;
    overflow: auto;
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

  input.updatebtn {
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

  input.updatebtn:hover {
    background-color: red;
    border: 1px solid black;
  }

  /* CSS Button Attendance */
  .button-19 {
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

  .button-19:hover {
    background-color: red;
    border: 1px solid black;
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

  .add {
    text-decoration: none;
    color: black;
    word-break: break-word;
    white-space: normal;
    position: relative;
    left: 0%;
  }

  /* CSS */
  .button-37 {
    background-color: #13aa52;
    border: 1px solid #13aa52;
    border-radius: 4px;
    box-shadow: rgba(0, 0, 0, .1) 0 2px 4px 0;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    font-family: "Akzidenz Grotesk BQ Medium", -apple-system, BlinkMacSystemFont, sans-serif;
    font-size: 16px;
    font-weight: 400;
    outline: none;
    outline: 0;
    padding: 10px 25px;
    text-align: center;
    transform: translateY(0);
    transition: transform 150ms, box-shadow 150ms;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    position: absolute;
    z-index: 1;
    left: 85%;
    top: 15%;
    display: inline;
  }

  .button-37:hover {
    box-shadow: rgba(0, 0, 0, .15) 0 3px 9px 0;
    transform: translateY(-2px);
  }

  @media (min-width: 768px) {
    .button-37 {
      padding: 10px 30px;
    }
  }
</style>

<body>
  <!-- EDIT MODAL -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>RECORD UPDATE</h2>
      </div>

      <div class="modal-body-foot">
        <div class="modal-body">
          <a href="Admin-PaySlip.php?id=<?php echo $_GET['id'] ?>" name="add-emplo">
            <button class="button-37" role="button"><i class="bi bi-book-half"></i>GENERATE PAYSLIP</button>

          </a>
          <?php
          $Servername = "localhost";
          $username = "root";
          $password = "";
          $conn = new mysqli($Servername, $username, $password) or die("Could Not Connect to Database");

          if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "sELECT * FROM payroll_db.employee_data Where Employee_ID = '$id'";
            $updateData = mysqli_query($conn, $query);
            $rowdb = mysqli_fetch_array($updateData);
            if ($rowdb) {
              echo "<form action='Admin-Crud.php' method='post'>";
              echo "Employee ID: "  . "<input type=text name = Empid disabled value= $rowdb[Employee_ID]> <br>";
              echo "Employee Name: " . "<input type=text name = EmpName value=$rowdb[Employee_Name]> <br>";
              echo "Hours Work: " . "<input type=text name = EmpHRW value=$rowdb[Hours_Work]> <br>";
              echo "Overtime: " . "<input type=text name = EmpOver value=$rowdb[Overtime]> <br>";
              echo "Deduction: " . "<input type=text name = EmpDec value=$rowdb[Deduction]> <br>";
              echo "Basic Rate: " . "<input type=text name= EmpBR value=$rowdb[Basic_Rate]> <br>";

              echo "<input type=hidden name='EmpID' value='$id'><br>";
              echo "<p><input type='submit' name='EmpEdit' value='Update' class= 'updatebtn' /> </p></form>";
          ?>

              <a href="Admin-Attendance.php?id=<?php echo $_GET['id'] ?>" name="add-emplo">
                <button class="button-19 add" role="button">Attendance Sheets</button>
              </a>

              <a href="Admin-Transaction.php?id=<?php echo $_GET['id'] ?>" name="add-emplo">
                <button class="button-19 add" role="button">Transaction Sheet</button>
              </a>

          <?php
            } else
              echo "No record found...";
          }  ?>


        </div>
      </div>

      <div class="modal-footer">
        <h3>PAYROLL SYSTEM</h3>
      </div>
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