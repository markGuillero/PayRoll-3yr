<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<style>
  body {
    font-family: "Poppins", sans-serif;
    padding: 0;
    margin: 0;

  }

  #logoC {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    display: inline-block;
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

  .ActivePage {
    background-color: #64F4B9;
    color: #F49C64;
  }

  .ActivePage::after {
    background-color: #D3FAD6;
  }

  .ClsLogOut {
    position: absolute;
    bottom: 50px;
    width: 20%;
  }
</style>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Query the database to retrieve the data
$result = mysqli_query($conn, 'SELECT Emp_Name, Salary FROM payroll_db.employee_data order by Salary Desc');

// Create an array to hold the data for the chart
$data = array();

// Loop through the query results and add each row to the data array
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = array($row['Emp_Name'], (float)$row['Salary']);
}

// Encode the data array as JSON format
$jsonData = json_encode($data);

$resultPie = mysqli_query($conn, 'SELECT Present, Absent, Late FROM employee_data');

// Fetch the data and calculate the percentage of each category
$row = mysqli_fetch_assoc($resultPie);
$total = $row['Present'] + $row['Absent'] + $row['Late'];
$present_percentage = round($row['Present'] / $total * 100, 2);
$absent_percentage = round($row['Absent'] / $total * 100, 2);
$late_percentage = round($row['Late'] / $total * 100, 2);

// Close the database connection
mysqli_close($conn);
?>
<body>
  <div id="Page_Nav">
    <img src="https://cdn.pixabay.com/photo/2016/09/05/18/54/texture-1647380_960_720.jpg" alt="logo" id="logoC">
    <h6>Role:</h6>
    <h6>Name:</h6>
    <button class="button-19" onclick="window.location.href='Admin-Dashboard.php'">Employee Dashboard</button>
    <button class="button-19">Employee Status</button>
    <button class="button-19">Employee Time keeping</button>
    <button class="button-19 ActivePage" id="EmpDashAnalytics">Employee Analytics</button>
    <button class="button-19 ClsLogOut" onclick="window.location.href='welcomepage.php'">Log Out</button>
  </div>

  <div id="Page_Content">
  <div id="chart"></div>
  <div id="piechart"></div>

  </div>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
		// Load the Google Charts library
		google.charts.load('current', {'packages':['corechart']});

		// Set a callback function to draw the chart when the library is loaded
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			// Load the JSON data
			var jsonData = <?php echo $jsonData; ?>;

			// Create a DataTable object from the JSON data
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Employee Name');
			data.addColumn('number', 'Salary');
			data.addRows(jsonData);

			// Define the chart options
			var options = {
				title: 'Employee Salary Bar Chart',
				width: 600,
				height: 400,
				bar: {groupWidth: "95%"},
				legend: {position: 'none'}
			};

			// Create a BarChart object and draw the chart
			var chart = new google.visualization.BarChart(document.getElementById('chart'));
			chart.draw(data, options);
		}

    //Pie Chart
    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChartPie);

  function drawChartPie() {
    var dataPie = google.visualization.arrayToDataTable([
      ['Status', 'Percentage'],
      ['Present', <?php echo $present_percentage; ?>],
      ['Absent', <?php echo $absent_percentage; ?>],
      ['Late', <?php echo $late_percentage; ?>]
    ]);

    var optionsPie = {
      title: 'Employee Percentage',
          pieHole: 0.4,
    };

    var chartPie = new google.visualization.PieChart(document.getElementById('piechart'));
    chartPie.draw(dataPie, optionsPie);
      }
	</script>
</body>
</html>