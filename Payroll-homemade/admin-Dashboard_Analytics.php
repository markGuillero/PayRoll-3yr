<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

 <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      
      th, td {
        text-align: left;
        padding: 8px;
        border: 1px solid black;
      }
      
      th {
        background-color: lightgrey;
      }
 </style>
	
<body>

	<div class="EmpAnalytics">
		<h2>For Employee Level, Analytics is for Working Hours, absence or late for the month</h2>
			<div class="container"><!--iisa lang ng class para di paulit ulit and edit sa css -->
				<div class="contentan">
				
					<table><!--Pwedeng edelete -->
						<?php
						  for ($i = 1; $i <= 10; $i++) {
							echo " <tr>
									<th><center><h2>etits<h2></center></th>
									<th><h2>etits<h2></th>
									<th><h2>etits<h2></th>
									<th><h2>etits<h2></th>
									<th><h2>etits<h2></th>
									<th><h2>etits<h2></th>
								  </tr>";
						  }
						?>
					 </table>
				</div>
			</div>
		<br><br><br>
	</div>

	<hr>
	
	<div class="Stf_Mngr_Analytics">
		<h2>For Staff and Manager Level, Analytics is for Working Hours, absence or late for all the employee for a month</h2>
			<div class="container"><!--iisa lang ng class para di paulit ulit and edit sa css -->
				<div class="contentan">

				</div>
			</div>
		<br><br><br>
	</div>
	
</body>
</html>
