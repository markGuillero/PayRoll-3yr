<?php

require __DIR__ . "/vendor/autoload.php";
date_default_timezone_set('UTC');


use Dompdf\Dompdf;
use Dompdf\Options;

$id = $_GET['id'];

$queryEmpD = "sELECT * FROM payroll_db.employee_data where Employee_ID = '$id';";
$queryAtt = "sELECT * FROM payroll_db.attendance_sheet_emp where Emp_Id = '$id'";
$Emp_Att = filterTable($queryAtt);
$Emp_result = filterTable($queryEmpD);

$time1 = "09:00:00";
$LateDecPrice = 72.125;
$PCounter = 0;
$LateCounter = 0;
$AbsentCounter = 0;
$SlipDate = date('m/d/Y');


$data = json_decode(file_get_contents("php://input"));

// // Access the data properties
$attendanceDeductions = isset($data->attendanceDeductions) ? $data->attendanceDeductions : 0;
$governmentDeductions = isset($data->governmentDeductions) ? $data->governmentDeductions : 0;
$employeeCashAdvances = isset($data->employeeCashAdvances) ? $data->employeeCashAdvances : 0;
$incentives = isset($data->incentives) ? $data->incentives : 0;
$midtermAnnualBonus = isset($data->midtermAnnualBonus) ? $data->midtermAnnualBonus : 0;
$grossSalary = isset($data->grossSalary) ? $data->grossSalary : 0;


function filterTable($query)
{
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn = mysqli_connect($servername, $username, $password);
  $filter_Result = mysqli_query($conn, $query);
  return $filter_Result;
}

while ($row = mysqli_fetch_array($Emp_result)) {
   $Emp_name = $row['Employee_Name'];
   $Emp_Hrw = $row['Hours_Work'];
   $Emp_decd = $row['Deduction'];
   $Emp_BSR = $row['Basic_Rate'];
   $Emp_OT = $row['Overtime'];
   $Emp_Salary = $row['Salary'];

}

while ($row = mysqli_fetch_array($Emp_Att)) {
    $time1_datetime = DateTime::createFromFormat('H:i:s', $time1);
    $time_in_datetime = DateTime::createFromFormat('H:i:s', $row['Time In']);

    if (!is_null($row['Time In']) && $time1_datetime < $time_in_datetime) {
        $LateCounter++;
    }

    // Check if the employee was absent
    if (is_null($row['Time In'])) {
        $AbsentCounter++;
    }

    // If the employee was not absent and not late, they were present
    if (!is_null($row['Time In']) && $time1_datetime >= $time_in_datetime) {
        $PCounter++;
    }
}

$ATTDEC = $LateDecPrice * $LateCounter;

/**
 * Set the Dompdf options
 */
$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$dompdf = new Dompdf($options);

/**
 * Set the paper size and orientation
 */

$dompdf->setPaper("A4", "landscape");

/**
 * Load the HTML and replace placeholders with values from the form
 */
$html = file_get_contents("Admin-PaySlip.html");

// $html = str_replace(["{{ id }}"], [$id], $html);
$html = str_replace(["{{ id }}", "[date]", "[name]", "[HRW]", "[BRR]", "[OT]", "[NETS]", "[ATTD]", "[INCENT]", "[BBN]", "[GOVD]", "[NETS]"], [$id, $SlipDate, $Emp_name, $Emp_Hrw, $Emp_BSR, $Emp_OT, $Emp_Salary, $ATTDEC, $incentives, $midtermAnnualBonus, $governmentDeductions, $Emp_Salary], $html);
$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("template.html");

/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Employee PaySlip", "PaySlip"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("PaySlip.pdf", ["Attachment" => 0]);

