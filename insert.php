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
	<meta name="description" content="Prompts user for a person's career, hobbies, and degree to create new entry.">
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
		
		if( isset($_POST['newEntrySubmit'])){

			if(isset($_POST['txtName']) AND isset($_POST['txtCareer']) AND isset($_POST['txtDegree']) AND isset($_POST['txtHobbies']))
			{
			$result = mysqli_query($conn, "SELECT MAX(id) as max FROM people");
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$id = $row['max'];
			$id = (int)$id;
			$id = $id+1;
			$name = $_POST['txtName'];
			$result = mysqli_query($conn, "INSERT INTO people VALUES ('{$id}','{$name}')");
			

			foreach($_POST['txtCareer'] as $title)
			{	$name = $_POST['txtName'];
				$result = mysqli_query($conn, "INSERT INTO peoplecareers VALUES ('{$name}', '{$title}')");
				
			}
					
			foreach($_POST['txtDegree'] as $degree)
			{	$name = $_POST['txtName'];					
				$result = mysqli_query($conn, "INSERT INTO peopledegrees VALUES ('{$name}', '{$degree}')");
				
			}
			foreach($_POST['txtHobbies'] as $hobby)
			{	$name = $_POST['txtName'];					
				$result = mysqli_query($conn, "INSERT INTO peoplehobbies VALUES ('{$name}', '{$hobby}')");
				
			}
			}

		}
		
		if(isset($_POST['submitCareer']))
		{
			if(isset($_POST['newCareer']) AND isset($_POST['salary']) AND isset($_POST['careerSkill']))
			{
				$newCareer = $_POST['newCareer'];
				$salary = (int)$_POST['salary'];
				$result = mysqli_query($conn, "INSERT INTO careers VALUES ('{$newCareer}','{$salary}')");
				
				foreach($_POST['careerSkill'] as $careerSkill)
				{				
					$result = mysqli_query($conn, "INSERT INTO careersskills VALUES ('{$newCareer}', '{$careerSkill}')");
				}
			}
		}		

		if(isset($_POST['submitDegree']))
		{
			if(isset($_POST['newDegree']) AND isset($_POST['years']) AND isset($_POST['degreeSkill']))
			{
				$newDegree = $_POST['newDegree'];
				$years = (int)$_POST['years'];
				$result = mysqli_query($conn, "INSERT INTO degrees VALUES ('{$newDegree}','{$years}')");
				
				foreach($_POST['degreeSkill'] as $degreeSkill)
				{				
					$result = mysqli_query($conn, "INSERT INTO degreesskills VALUES ('{$newDegree}', '{$degreeSkill}')");
				}
			}
		}	
		
		if(isset($_POST['submitDegree']))
		{
			if(isset($_POST['newDegree']) AND isset($_POST['years']) AND isset($_POST['degreeSkill']))
			{
				$newDegree = $_POST['newDegree'];
				$years = (int)$_POST['years'];
				$result = mysqli_query($conn, "INSERT INTO degrees VALUES ('{$newDegree}','{$years}')");
				
				foreach($_POST['degreeSkill'] as $degreeSkill)
				{				
					$result = mysqli_query($conn, "INSERT INTO degreesskills VALUES ('{$newDegree}', '{$degreeSkill}')");
				}
			}
		}	
		
		if(isset($_POST['submitHobby']))
		{
			
			if(isset($_POST['newHobby']) AND isset($_POST['difficulty']) AND isset($_POST['hobbySkill']))
			{
				
				$newHobby = $_POST['newHobby'];
				$difficulty = $_POST['difficulty'];
				$result = mysqli_query($conn, "INSERT INTO hobbies VALUES ('{$newHobby}','{$difficulty}')");
				
				foreach($_POST['hobbySkill'] as $hobbySkill)
				{				
					$result = mysqli_query($conn, "INSERT INTO hobbiesskills VALUES ('{$newHobby}', '{$hobbySkill}')");
					
				}
			}
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
			    <h2 style="margin-left:1.5em;">Create an Entry.</h2>
				<h4>Help our library grow! Adding your information to our collection helps provide more suggestions for all users.</h4>
				<h5>*Hold the Ctrl key (Windows) or Cmnd key (Mac) while clicking to make multiple selections.</h5>
				<form action="" method="post">
					<h4>Insert New Entry For Someone</h4>
					
					<!--Name field-->
					<div style="float:left; margin-left:2.5em;">
						<label for="txtName">Name</label>
						<input type="text" id="txtName" maxlength="20" name="txtName" rows = "1"cols = "10" ></input>
					</div>
					<!--SELECT careers-->
					<div style="float:left; margin-left: 1em;">
						<label for="txtCareer">Career*</label>
						<select id="txtCareer" name="txtCareer[]" size="3" multiple>
							
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
					<!--SELECT degrees-->
					<div style="float:left; margin-left: 1em;">
						<label for="txtDegree">Degree*</label>
						<select id="txtDegree" name="txtDegree[]" size="3" multiple>
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
					<!--SELECT hobbies-->
					<div style="float:left; margin-left: 1em;">
						<label for="txtHobbies">Hobbies*</label>
						<select id="txtHobbies" name="txtHobbies[]" size="3" multiple>
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
					
					<input name="newEntrySubmit" type="submit" class="submitBtn"></input>
				</form>
				
				
				<br><br><br><br>
				<h2 style="margin-left:1.5em;">Make a suggestion.</h2>
				<form action="" method="post">
				
					<h4>Can't Find Your Career?</h4>
					<div style="float:left; margin-left: 2.5em;">
						<label for="newCareer">New Career</label>
						<input type="text" id="newCareer" name="newCareer" maxlength="20" rows="1" cols="10">
						</input>
						
					</div>
					
					<div style="float:left; margin-left: 1em;">
						<label for="salary">Salary</label>
						<input type="text" id="salary" maxlength="20" name="salary" rows = "1"cols = "10" ></input>
					</div>
					
					<div style="float:left; margin-left: 1em;">
						<label for="careerSkill">Skills Required*</label>
						<select id="careerSkill" name="careerSkill[]" size="3" multiple>
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
					
					<input name="submitCareer" type="submit" class="submitBtn"></input>
				</form>
				
				<br><br><br><br>
				<form action="" method="post">
					<h4>Can't Find Your Degree?</h4>
					
					<div style="float:left; margin-left: 2.5em;">
						<label for="newDegree">New Degree</label>
						<input type="text" id="newDegree" name="newDegree" maxlength="20" rows="1" cols="10">
						</input>
					</div>
					
					<div style="float:left; margin-left: 1em;">
						<label for="years">Years Required</label>
						<input type="text" id="years" maxlength="20" name="years" rows = "1"cols = "10" ></input>
					</div>
					
					<div style="float:left; margin-left: 1em;">
						<label for="degreeSkill">Skills Acquired*</label>
						<select id="degreeSkill" name="degreeSkill[]" size="3" multiple>
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
					
					<input name="submitDegree"type="submit" class="submitBtn"></input>
				</form>
				
				
				<br><br><br><br>
				<form action="" method="post">
					<h4>Can't Find Your Hobby? </h4>
					<div style="float:left; margin-left: 2.5em;">
						<label for="newHobby">New Hobby</label>
						<input type="text" id="newHobby" name="newHobby" maxlength="20" rows="1" cols="10">
						</input>
					</div>
					
					<div style="float:left; margin-left: 1em;">
						<label for="difficulty">Difficulty (ex. Easy, Medium, Hard)</label>
						<input type="text" id="difficulty" maxlength="20" name="difficulty" rows = "1"cols = "10" ></input>
					</div>
					
					<div style="float:left; margin-left: 1em;">
						<label for="hobbySkill">Skills Required*</label>
						<select id="hobbySkill" name="hobbySkill[]" size="3" multiple>
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
					
					<input name="submitHobby"type="submit" class="submitBtn"></input>
				</form>
				
				<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
			</main>
		</div>
	</body>  
	
	<?php	
		$conn->close();
	?>
</html>