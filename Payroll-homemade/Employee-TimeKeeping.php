<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<style>
  /* CSS */
  .button-5 {
    align-items: center;
    background-clip: padding-box;
    background-color: #fa6400;
    border: 1px solid transparent;
    border-radius: .25rem;
    box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-flex;
    font-family: system-ui, -apple-system, system-ui, "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 16px;
    font-weight: 600;
    justify-content: center;
    line-height: 1.25;
    margin: 0;
    padding: calc(.875rem - 1px) calc(1.5rem - 1px);
    position: relative;
    text-decoration: none;
    transition: all 250ms;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    vertical-align: baseline;
    width: 100%;
    bottom: -20%;
  }

  .button-5:hover,
  .button-5:focus {
    background-color: #fb8332;
    box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
  }

  .button-5:hover {
    transform: translateY(-1px);
  }

  .button-5:active {
    background-color: #c85000;
    box-shadow: rgba(0, 0, 0, .06) 0 2px 4px;
    transform: translateY(0);
  }

  /* CSS */
  .button-7 {
    background-color: #0095ff;
    border: 1px solid transparent;
    border-radius: 3px;
    box-shadow: rgba(255, 255, 255, .4) 0 1px 0 0 inset;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-family: -apple-system, system-ui, "Segoe UI", "Liberation Sans", sans-serif;
    font-size: 13px;
    font-weight: 400;
    line-height: 1.15385;
    margin: 0;
    outline: none;
    padding: 8px .8em;
    position: relative;
    text-align: center;
    text-decoration: none;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    vertical-align: baseline;
    white-space: nowrap;
    width: 100%;
    padding: 15px;
  }

  .button-7:hover,
  .button-7:focus {
    background-color: lightblue;
  }

  .button-7:focus {
    box-shadow: 0 0 0 4px rgba(0, 149, 255, .15);
  }

  .button-7:active {
    background-color: #0064bd;
    box-shadow: none;
  }

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
    font-family: "RM Neue", sans-serif;
    font-size: 100%;
    line-height: 1.15;
    margin: 0;
    padding: 10px 21px;
    text-align: center;
    text-transform: none;
    transition: color .13s ease-in-out, background .13s ease-in-out, opacity .13s ease-in-out, box-shadow .13s ease-in-out;
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
    height: 98vh;
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
    justify-content: flex-start;
    align-items: center;
    padding: 20px;
    padding-top: 70px;
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

  /* The Modal (background) */
  .modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
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

  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    margin-left: 15%;
    /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    /* Could be more or less, depending on screen size */
  }

  /* The Close Button */
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
  #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
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
$result = mysqli_query($conn, $sql1);
$placeholder;
while ($row = mysqli_fetch_array($result)) {
  $placeholder = $row['Emp_Id'];
}
$conn->close();

?>

<body>
  <div class="container">
    <div class="navbar">
      <div class="user-info">
        <h3>User Name <?php echo $UserN ?></h3>
        <h4>User Id <?php echo $placeholder ?> </h4>
        <br><br><br><br>
      </div>
      <a href="#" class="button-7">Employee Dashboard</a>
      <a href="#" class="button-7" id="myBtn">View Schedule</a>

      <a href="welcomepage.php" class="button-5">Logout</a>
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

  <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <table id="customers">
      <tr>
        <th colspan = "2" style = "text-align:center;">Employee Sched</th>
      </tr>
  <tr>
    <th>Time In</th>
    <th>Time Out</th>
  </tr>
  <tr>
    <td>9:00</td>
    <td>5:00</td>
  </tr>
  
</table>
    </div>

  </div>


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

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

</body>

</html>