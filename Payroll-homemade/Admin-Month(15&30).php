<?php
$Servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($Servername, $username, $password) or die("Could Not Connect to Database");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Attendance report for the 1st to the 15th of the month
$sql = "SELECT * FROM payroll_db.attendance_sheet_emp WHERE DATE_FORMAT(Date, '%d') BETWEEN 1 AND 15";
$result = mysqli_query($conn, $sql);

echo "<h2>Attendance Report for the 1st to the 15th of the Month</h2>";
echo "<table>";
echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Time In</th><th>Time Out</th><th>Date</th></tr>";

// Output the attendance records for the 1st to the 15th of the month
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['Emp_Id'] . "</td>";
    echo "<td>" . $row['Emp_Name'] . "</td>";
    echo "<td>" . $row['Time In'] . "</td>";
    echo "<td>" . $row['Time Out'] . "</td>";
    echo "<td>" . $row['Date'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Attendance report for the 16th to the end of the month
$sql = "SELECT * FROM payroll_db.attendance_sheet_emp WHERE DATE_FORMAT(Date, '%d') BETWEEN 16 AND LAST_DAY(Date)";
$result = mysqli_query($conn, $sql);

echo "<h2>Attendance Report for the 16th to the End of the Month</h2>";
echo "<table>";
echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Time In</th><th>Time Out</th><th>Date</th></tr>";

// Output the attendance records for the 16th to the end of the month
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['Emp_Id'] . "</td>";
    echo "<td>" . $row['Emp_Name'] . "</td>";
    echo "<td>" . $row['Time In'] . "</td>";
    echo "<td>" . $row['Time Out'] . "</td>";
    echo "<td>" . $row['Date'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Close the database connection
mysqli_close($conn);
?>