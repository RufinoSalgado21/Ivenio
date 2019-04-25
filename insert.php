<!--[if 1t IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
<!-DOCTYPE html>
<html lang="en">
	<head><title>Invenio</title>
	<meta charset="utf-8">
	<meta name="description" content="Prompts user for a person's career, hobbies, and degree to create new entry.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="invenirese.css">
	<script type="text/javascript" src="invenirese.js"></script>
	</head>
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
			    <h2>Create an Entry.</h2>
				<h4>Help our library grow! Adding your information to our collection helps provide more suggestions for all users.</h2>
				<form action="" method="post">
					<p id="insertLbl">Name</p>
					<p id="insertLbl">Career</p>
					<p id="insertLbl">Degree</p>
					<p id="insertLbl">Hobbies</p>
					<input type="text" id="txtName" maxlength="20" name="txtName" rows = "1"cols = "20" ></input>
					<input type="text" id="txtCareer" maxlength="20" name="txtCareer" rows = "1"cols = "20" ></input>
					<input type="text" id="txtDegree" maxlength="20" name="txtDegree" rows = "1"cols = "20" ></input>
					<input type="text" id="txtHobbies" maxlength="20" name="txtHobbies" rows = "1"cols = "20" ></input>
				</form>
				<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
			</main>
		</div>
	</body>  
</html>