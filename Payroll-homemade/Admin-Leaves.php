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