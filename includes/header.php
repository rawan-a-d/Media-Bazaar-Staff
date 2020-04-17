<!-- Common css links(navbar, footer) -->
<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script>
		function myFunction() {	
 		 	var x = document.getElementById("myLinks");
 	 		if (x.style.display === "block") {
    			x.style.display = "none";
 			 } else {
    			x.style.display = "block";
  			}
		}
	</script>

	</head>
	<body>
	<!-- Navbar -->

		<div class="navigation-bar">
			<div id="navigation-container">
			 <img class = "logo1" src="img/logo.png">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="info.php">Profile</a></li>
					<li><a href="monthly_calendar.php">Schedule</a></li>
					<li id="logout"><a href="logout.php">Log out</a></li>
				</ul>
			</div>
		</div>

	<div class="mobile-container">	
		<img class = "logo2" src="img/logo.png">
		<div class="topnav">
			<div id="myLinks">
					<a href="index.php">Home</a>
					<a href="info.php">Profile</a>
					<a href="monthly_calendar.php">Schedule</a>
					<a href="logout.php">Log out</a>
			</div>
		</div>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
   				 <i class="fa fa-bars"></i>
  			</a>
	</div>

	