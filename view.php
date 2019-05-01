<!--[if 1t IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
<!-DOCTYPE html>
<html lang="en">
	<head><title>Invenio</title>
	<meta charset="utf-8">
	<meta name="description" content="View entries in the database">
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
					<li class="sublist">
						<a href="insert.php">Insert</a></li>
				<!--	<li class="sublist">
						<a href="delete.php">Remove</a></li>-->
					<li class="sublist">
						<a href="view.php">View</a></li>
					<li><a href="careers.php">Discover</a></li>    
				</ul>
			</nav>

			<main>
				<h2>View All Entries</h2>
				
				<div id="vwCareers" style="float:left;margin-left: 1em;">
					
					<?php
						$sql = "SELECT title, salary FROM careers";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							echo "<table><tr><th>Title</th><th>Salary</th></tr>";
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo "<tr><td>" . $row["title"]. "</td><td>" . $row["salary"]. "</td></tr>";
							}
							echo "</table>";
						} 
						else {
							echo "0 results";
						}
					?>
				</div>
				
				
				
				<div id="vwSkills" style="float:left;margin-left: 1em;">
					
					<?php
						$sql = "SELECT skill FROM skills";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							echo "<table><tr><th>Skills</th></tr>";
							// output data of each row
							
							
							while($row = $result->fetch_assoc() ) 
							{
								echo "<tr><td>" . $row["skill"]. "</td></tr>";

							}
							
							echo "</table>";
						} 
						else {
							echo "0 results";
						}
					?>
				</div>
				
				<div id="vwDegrees" style="clear:left; float:left; margin-left: 1em; margin-top:1em;">
					
					<?php
						$sql = "SELECT degree, yearRequired FROM degrees";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							echo "<table><tr><th>Degree</th><th>Years Required</th></tr>";
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo "<tr><td>" . $row["degree"]. "</td><td>" . $row["yearRequired"]. "</td></tr>";
							}
							echo "</table>";
						} 
						else {
							echo "0 results";
						}
					?>
				</div>
				
				<div id="vwHobbies" style="float:left; margin-left: 1em;margin-top:1em;">
					
					<?php
						$sql = "SELECT hobby, difficulty FROM hobbies";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							echo "<table><tr><th>Hobby</th><th>Difficulty</th></tr>";
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								echo "<tr><td>" . $row["hobby"]. "</td><td>" . $row["difficulty"]. "</td></tr>";
							}
							echo "</table>";
						} 
						else {
							echo "0 results";
						}
					?>
				</div>
				
				
				
				<div id="vwEntries" style=" float:left; margin-left: 1em;margin-top:1em;">
					
				</div>
				
				<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
			</main>
		</div>
	</body>  

		
		
	<?php
		$conn->close();
	?>
</html>