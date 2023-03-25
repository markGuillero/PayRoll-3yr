<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<style>
.right-column input[type="text"] {
  width: 150px;
  padding: 10px;
  margin-right: 10px;
  font-size: 25px;
}

/* <!-- HTML !--> */

/* CSS */
button {
  align-items: center;
  appearance: button;
  background-color: #0276FF;
  border-radius: 8px;
  border-style: none;
  box-shadow: rgba(255, 255, 255, 0.26) 0 1px 2px inset;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: flex;
  flex-direction: row;
  flex-shrink: 0;
  font-family: "RM Neue",sans-serif;
  font-size: 100%;
  line-height: 1.15;
  margin: 0;
  padding: 10px 21px;
  text-align: center;
  text-transform: none;
  transition: color .13s ease-in-out,background .13s ease-in-out,opacity .13s ease-in-out,box-shadow .13s ease-in-out;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

button :active {
  background-color: #006AE8;
}

button :hover {
  background-color: #1C84FF;
}



.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 1000px;
  background-color: #f0f0f0;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
}

.right-column {
  background-color: #ccc;
  padding: 20px;
  flex-basis: 50%;
}

.navbar {
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 200px;
  background-color: #64bcf4;
  color: #fff;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

a {
  display: block;
  margin: 10px 0;
  font-size: 18px;
  text-decoration: none;
  color: #fff;
  text-align: center;
}

a:hover {
  background-color: #fff;
  color: #333;
}
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
 $UserN = $_GET['id'];
 $sql1 = "Select * From payroll_db.emp_privdata where Username = '$UserN'";
 $result = mysqli_query($conn,$sql1);
 $placeholder;
while($row = mysqli_fetch_array($result)){
  $placeholder = $row['Emp_Id'];
?>



<body>
<div class="container">
		<div class="navbar">
			<div class="user-info">
			  <h3>User Name <?php echo $UserN ?></h3>
			  <h4>User Id <?php echo $row['Emp_Id'] ?> </h4>
			<br><br><br><br><br><br><br><br><br><br><br><br>
			</div>
		  <a href="#">Employee Dashboard</a>
		  <a href="welcomepage.php">Logout</a>
		</div>


	<div class="right-column">
		<label for="time-in">Time In:</label>&nbsp &nbsp
		<input type="text" id="time-in" disabled>
		<button id="time-in-btn">Clock In</button>	
		<br><br><br>
		
		<label for="time-out">Time Out:</label>
		<input type="text" id="time-out" disabled>
		<button id="time-out-btn">Clock Out</button><br>
	</div>	
	
</div>	
<?php } ?>
<script>
	const timeInBtn = document.getElementById("time-in-btn");
	const timeOutBtn = document.getElementById("time-out-btn");
	const timeInTextbox = document.getElementById("time-in");
	const timeOutTextbox = document.getElementById("time-out");

	timeInBtn.addEventListener("click", function() {
	  let currentTime = new Date().toLocaleTimeString();
	  timeInTextbox.value = currentTime;
	});

	timeOutBtn.addEventListener("click", function() {
	  let currentTime = new Date().toLocaleTimeString();
	  timeOutTextbox.value = currentTime;
	});
</script>	
	
</body>
</html>

