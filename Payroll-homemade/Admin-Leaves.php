
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
 .modal {
  display: block; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s;
  text-align:left;
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
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
  text-align:center;
  font-size:20px;
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
    input[type=text]{
  width: 100;
  padding: 10px;
  margin: 5px 0 10px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  font-size: 16px;
}


   input.Buttons {
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

      input.Buttons:hover {
          background-color: red;
          border: 1px solid black;
      }


</style>

<body>
  <!-- EDIT MODAL -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Leaves Report</h2>
      </div>
      <div class="modal-body">
       <?php
				// Connect to the database
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "payroll_db";
				$conn = new mysqli($servername, $username, $password, $dbname) or die("Could not connect to database");

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				// Get the leaves taken by employees for the given month
				$month = 3; // March
				$year = 2023;
				$sql = "SELECT Emp_Id, Emp_Name, COUNT(*) as Total_Leaves FROM payroll_db.attendance_sheet_emp WHERE MONTH(Date) = {$month} AND YEAR(Date) = {$year} AND `Time In` IS NULL AND `Time Out` IS NULL GROUP BY Emp_Id ORDER BY Emp_Id ASC";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					echo "<h2>Leaves Report for " . date("F Y", mktime(0, 0, 0, $month, 1, $year)) . "</h2>";
					echo "<table>";
					echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Total Leaves Taken</th></tr>";

					// Output the leaves taken by employees for the given month
					while ($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row['Emp_Id'] . "</td>";
						echo "<td>" . $row['Emp_Name'] . "</td>";
						echo "<td>" . $row['Total_Leaves'] . "</td>";
						echo "</tr>";
					}

					echo "</table>";
				} else {
					echo "No leaves taken in " . date("F Y", mktime(0, 0, 0, $month, 1, $year));
				}

				// Close the database connection
				$conn->close();
				?>



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
