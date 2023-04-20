<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>
<header>
  <style>
    /* Admin-Dashboard.php */
    #logoC {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      display: inline-block;
    }

    #head {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding-top: 6%;
    }

    button {
      background: #D9D9D9;
      border-radius: 20px;
      width: 166px;
      height: 53px
    }

    body {
      font-family: "Poppins", sans-serif;
      padding: 0;
      margin: 0;

    }

    .light {
      --mainColor: #64bcf4;
      --hoverColor: #5bacdf;
      --backgroundColor: #f1f8fc;
      --darkOne: #312f3a;
      --darkTwo: #45424b;
      --lightOne: #919191;
      --lightTwo: #aaa;
    }

    .container {
      position: relative;
      width: 100%;
      z-index: 10;
    }

    header {
      position: relative;
      z-index: 70;
    }

    header .container {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
    }

    .overlay {
      display: none;
    }

    .logo {
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    .logo img {
      width: 40px;
      margin-right: 0.6rem;
      margin-top: -0.6rem;
    }

    .logo h3 {
      color: black;
      font-size: 1.55rem;
      line-height: 1.2;
      font-weight: 700;
      margin-right: 2%;
    }

    .links ul {
      display: flex;
      list-style: none;
      flex-direction: row;
      gap: 10px
    }

    .links a {
      color: black;
      display: inline-block;
      margin: 3%;
      transition: 0.3s;
    }

    .links a:hover {
      color: var(--hoverColor);
      transform: scale(1.05);
    }

    a.btn {
      display: inline-block;
      white-space: nowrap;
    }

    .btn {
      background-color: #64bcf4;
      color: white;
      padding: 12px 10px;
      border: none;
      border-radius: 16px;
      cursor: pointer;
      text-decoration: none;
    }

    .btn:hover {
      background-color: red;
      transform: scale(1) !important;
    }

    .hamburger-menu {
      position: relative;
      z-index: 99;
      width: 2rem;
      height: 2rem;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      display: none;
    }

    .hamburger-menu .bar {
      position: relative;
      width: 100%;
      height: 3px;
      background-color: black;
      ;
      border-radius: 3px;
      transition: 0.5s;
    }

    .bar::before,
    .bar::after {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      background-color: black;
      ;
      border-radius: 3px;
      transition: 0.5s;
    }

    .container {
      display: inline-flex;
      flex-direction: column;
      width: 80%;
    }

    .container .table-selector {
      width: 100%;
      margin: auto;
      margin-top: 3%;
      background-color: white;

    }

    table {
      width: 100%;
    }

    .container .table-selector table {
      border: 3px solid lightblue;
      padding: 1%;
      width: 100%;
    }

    .container .table-selector table th {
      margin: 3%;
    }

    .container .table-selector table td {
      text-align: center;
    }

    .Operation {
      text-align: center;
    }

    .add {
      background-color: #64bcf4;
      color: white;
      padding: 12px 10px;
      border: none;
      border-radius: 16px;
      cursor: pointer;
      text-decoration: none;
    }

    .add:hover {
      background-color: red;
      transform: scale(1) !important;
    }

    input[type=text] {
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;

    }

    .searchbtn {
      background-color: #64bcf4;
      color: white;
      padding: 12px 10px;
      border: none;
      border-radius: 16px;
      cursor: pointer;
      text-decoration: none;
    }

    .custom-pagination {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .custom-pagination a {
      display: inline-block;
      margin: 0 5px;
      padding: 5px 10px;
      border: 1px solid #ccc;
      color: #64bcf4;
      text-decoration: none;
    }

    .custom-pagination a.active {
      background-color: #64bcf4;
      color: #64bcf4;
    }

    .pagination a {
      font-size: 20px;
      color: #64bcf4;
      text-decoration: none;
      padding: 5px 10px;
      border: 1px solid #64bcf4;
      border-radius: 5px;
      margin: 0 5px;
    }

    .pagination a.active {
      background-color: #64bcf4;
      color: white;
      border-color: #64bcf4;
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

    /* CSS */
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

    .ClsLogOut {
      position: absolute;
      bottom: 50px;
      width: 20%;
    }
    .ActivePage{
      background-color: #64F4B9;
     color:#F49C64;
    }
    .ActivePage::after{
      background-color: #D3FAD6;
    }
  </style>
</header>



<body>


  <div id="Page_Nav">
    <img src="https://cdn.pixabay.com/photo/2016/09/05/18/54/texture-1647380_960_720.jpg" alt="logo" id="logoC">
    <h6>Role:</h6>
    <h6>Name:</h6>
    <button class="button-19" onclick="window.location.href='Admin-Dashboard.php'">Employee Dashboard</button>
    <button class="button-19 ActivePage" onclick="window.location.href='Admin-empStats.php'">Employee Status</button>
    <button class="button-19" onclick="window.location.href='Admin-empTK.php'">Employee Time keeping</button>
    <button class="button-19 " onclick="window.location.href='Admin-Dashboard_Analytics.php'">Employee Analytics</button>
    <button class="button-19 ClsLogOut" onclick="window.location.href='welcomepage.php'">Log Out</button>

  </div>


  <div id="Page_Content">
    <div class="container">
      <!--PUT THE CONTENT HERE -->
	  
	  
	  
	  
	  
	  
	  
	  
	  
    </div>
</div>
    
</body>

</html>