<!--[if 1t IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
<!-DOCTYPE html>
<html lang="en">
	<head><title>Invenio</title>
	<meta charset="utf-8">
	<meta name="description" content="Search for new skills.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="invenirese.css">
	<script type="text/javascript" src="invenirese.js"></script>
	</head>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "invenio";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
	?>
	<body>
		<div id="wrapper">	
			<header>
			<h1>Invenio.</h1>
			</header>
			<nav>
				<ul>
					<li><a href="index.php">Home</a> </li>
					<li><a href="insert.php">Contribute</a></li>
					<li><a href="careers.php">Discover</a></li>   
					<li class="sublist">
						<a href="careers.php">Careers</a></li>
					<li class="sublist">
						<a href="degrees.php">Degrees</a></li>
					<li class="sublist">
						<a href="hobbies.php">Hobbies</a></li>
					<li class="sublist">
						<a href="skills.php">Skills</a></li>
				</ul>
			</nav>

			<main>
				<h2>Search For New Skills!</h2>
				<h4>Select a combination of careers, degrees, and hobbies to find new skills.</h4>
				<form action="" method="post">
					<div style="float:left; margin-left: 0em;">
						<label for="slctCareer">Career</label>
						<select id="slctCareer" name="slctCareer" size="1">
							<?php
							if($result=mysqli_query($conn, "SELECT * FROM careers")){
							//put in array each row
		
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
								{
									$title = $row['title'];
									echo "<option value='$title'>".$title."</option>";
								}
							// Free result set
								mysqli_free_result($result);
							}
							?>
						</select>
					</div>
					
					<div style="float:left; margin-left: 1em;">
						<label for="slctDegree">Degree</label>
						<select id="slctDegree" name="slctDegree" size="1">
							<?php
							if($result=mysqli_query($conn, "SELECT * FROM degrees")){
							//put in array each row
		
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
								{
									$degree = $row['degree'];
									echo "<option value='$degree'>".$degree."</option>";
								}
							// Free result set
								mysqli_free_result($result);
							}
							?>
						</select>
					</div>
					
					<div style="float:left; margin-left: 1em;">
						<label for="slctHobby">Hobby</label>
						<select id="slctHobby" name="slctHobby" size="1">
							<?php
							if($result=mysqli_query($conn, "SELECT * FROM hobbies")){
							//put in array each row
		
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
								{
									$hobby = $row['hobby'];
									echo "<option value='$hobby'>".$hobby."</option>";
								}
							// Free result set
								mysqli_free_result($result);
							}
							?>
						</select>
					</div>
									
					<input type="submit" class="submitBtn"></input>
				</form>
				<br></br>
				<h4>Here Are Some Skills You Might Be Interested In Learning:</h4>
				
				<div id="suggestSkills">
					
				</div>
				<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
			</main>
		</div>
	</body>  
	
	<?php	
		$conn->close();
	?>
</html>