<!--[if 1t IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
<!--Rufino Salgado
	CS 415 Design of Data Base System-->
<!-DOCTYPE html>
<html lang="en">
	<head><title>Invenio</title>
	<meta charset="utf-8">
	<meta name="description" content="Search for new careers">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="invenirese.css">
	<script type="text/javascript" src="invenirese.js"></script>
	</head>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "invenio";
		$deg = "";
		$hob = "";
		$skl = "";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		if( isset($_POST['findCareers']))
		{
			
			if(isset($_POST['slctDegree']))
				$deg = $_POST['slctDegree'];
			if(isset($_POST['slctHobby']))
				$hob = $_POST['slctHobby'];
			if(isset($_POST['slctSkill']))
				$skl = $_POST['slctSkill'];
			
			
		}	
		
		if(strlen($deg) > 0)
		{
			$sql2 = "SELECT title FROM peoplecareers INNER JOIN peopledegrees on peoplecareers.name = peopledegrees.name AND peopledegrees.degree = '$deg'";
				
			$list = $conn -> query($sql2);
		}
						
		if(strlen($hob) > 0)
		{
			$sql2 = "SELECT title FROM peoplecareers INNER JOIN peoplehobbies on peoplecareers.name = peoplehobbies.name AND peoplehobbies.hobby = '$hob'";
				
			$list2 = $conn -> query($sql2);
						
		}
						
		if(strlen($skl) > 0)
		{
							
			$sql2 = "SELECT title FROM careersskills INNER JOIN skills on careersskills.skill = skills.skill AND skills.skill = '$skl'";
				
			$list3 = $conn -> query($sql2);
						
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
				<h2>Search For New Careers!</h2>
				<h4>Select a combination of degrees, hobbies, and skills to find new careers.</h4>
				<form action="" method="post">
					<div style="float:left; margin-left: 0em;">
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
					
					<div style="float:left; margin-left: 1em;">
						<label for="slctSkill">Skill</label>
						<select id="slctSkill" name="slctSkill" size="1">
							<?php
							if($result=mysqli_query($conn, "SELECT * FROM skills")){
							//put in array each row
		
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
								{
									$skill = $row['skill'];
									echo "<option value='$skill'>".$skill."</option>";
								}
							// Free result set
								mysqli_free_result($result);
							}
							?>
						</select>
					</div>
									
					<input name="findCareers" type="submit" class="submitBtn"></input>
				</form>
				<br></br>
				<h4>Here Are Some Careers You Might Be Interested In Pursuing:</h4>
				
				<div id="suggestCareer">
					<?php
						
						
						if(strlen($deg) >0 OR strlen($hob) >0 OR strlen($skl) >0)
						{
							$masterlist = array();
							if ($list->num_rows > 0) 
							{
								while($row = $list->fetch_assoc()) 
								{
									$masterlist[] = $row["title"];
								}
							} 
							
							if ($list2->num_rows > 0) 
							{
								while($row = $list2->fetch_assoc()) 
								{
									$masterlist[] = $row["title"];
								}
							} 
							
							if ($list3->num_rows > 0) 
							{
								while($row = $list3->fetch_assoc()) 
								{
									$masterlist[] = $row["title"];
								}
							} 
							
							$masterlist = array_unique($masterlist, SORT_STRING);
							
							if (sizeof($masterlist) > 0) 
							{
								echo "<table><tr><th>Careers</th></tr>";
								// output data of each row
								foreach($masterlist as $m) 
								{
									echo "<tr><td>" . $m. "</td></tr>";
								}
								echo "</table>";
							} 
							else {
								echo "0 results";
							}
						}
					?>
				</div>
				<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
			</main>
		</div>
	</body>  
	
	<?php	
		$conn->close();
	?>
</html>