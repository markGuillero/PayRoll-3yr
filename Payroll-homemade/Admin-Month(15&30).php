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

  /* container table design */
  .container {
    position: relative;
    max-width: 81rem;
    width: 100%;
    margin: 0 auto;
    padding: 0 3rem;
    z-index: 10;
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
    border: 4px solid lightblue;
    padding: 2%;
    width: 100%;
    margin-bottom: 1%;
  }

  .container .table-selector table th {
    padding: 1%;

  }

  .container .table-selector table td {
    text-align: center;
  }
</style>

<body>
  <!-- EDIT MODAL -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">

        <span class="close">&times;</span>
        <h2>Monthly Attendance</h2>
      </div>
      <div class="modal-body">

        <div class="container">
          <div class="table-selector">



            <table>
              <h2>Attendance Report for the 1st to the 15th of the Month</h2>
              <tr>
                <th>Emp_Id</th>
                <th>Emp_Name</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Date</th>
              </tr>

              <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "payroll_db";
    $TextNRF = "";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Attendance report for the 1st to the 15th of the month
    $sql = "SELECT * FROM attendance_sheet_emp WHERE DATE_FORMAT(Date, '%d') BETWEEN 1 AND 15";
    $result = mysqli_query($conn, $sql);

    // Output the attendance records for the 1st to the 15th of the month
    echo "<table>";
    echo "<tr>";
    echo "<th>Emp_Id</th>";
    echo "<th>Emp_Name</th>";
    echo "<th>Time In</th>";
    echo "<th>Time Out</th>";
    echo "<th>Date</th>";
    echo "</tr>";
    if (mysqli_num_rows($result) == 0) {
        $TextNRF = "Attendance Not Found";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Employee_ID'] . "</td>";
            echo "<td>" . $row['Emp_Name'] . "</td>";
            echo "<td>" . $row['Time In'] . "</td>";
            echo "<td>" . $row['Time Out'] . "</td>";
            echo "<td>" . $row['Date'] . "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";

    // Attendance report for the 16th to the end of the month
    $sql = "SELECT * FROM attendance_sheet_emp WHERE DATE_FORMAT(Date, '%d') BETWEEN 16 AND LAST_DAY(Date)";
    $result = mysqli_query($conn, $sql);

    // Output the attendance records for the 16th to the end of the month
    echo "<h2>Attendance Report for the 16th to the End of the Month</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Emp_Id</th>";
    echo "<th>Emp_Name</th>";
    echo "<th>Time In</th>";
    echo "<th>Time Out</th>";
    echo "<th>Date</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Employee_ID'] . "</td>";
        echo "<td>" . $row['Emp_Name'] . "</td>";
        echo "<td>" . $row['Time In'] . "</td>";
        echo "<td>" . $row['Time Out'] . "</td>";
        echo "<td>" . $row['Date'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Close the database connection
    mysqli_close($conn);
    echo $TextNRF;
?>

          </div>
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
</script>

</body>

</html>