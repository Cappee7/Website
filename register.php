<?php 
	if(!isset($_SESSION))
	{	
		session_start();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, intial-scale=1">
<meta charset="UFT-8">
<title>RGC - Register</title>
	<?php
		
	if (isset($_COOKIE["selectedStyle"])) { // if style has been set
		$style = $_COOKIE["selectedStyle"];
	} else { // if style not yet set, default to 0
		$style = 0;
	}
	?>
	
   <!-- Remember to change the css to work with the selection <link rel="stylesheet" href="css/style<?= $style; ?>.css"> -->
	<link rel="stylesheet" href="css/style<?= $style; ?>.css">
	</head>
	<body>
	<div class="page-wrapper">
	<header class="top-header">
		<div class="top-banner">
			<div id="logo">
				<img src="media/gameboy.png" alt="" height="150">				
				<h1>Retro Games Catalogue</h1>
			</div> </div>
				
			<!-- Navigation Bar -->
			<nav class="nav-bar">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="catalogue.php">Catalogue</a></li>					
					<li><a href="login.php">Login</a></li>							
					<li><a href="editcata.php">Edit Catalogue</a></li>					
				</ul>
			</nav>	
						<div class="search-bar">
				<form action="searchform.php" method="POST">
						<input id="bar1" type="text" name="searchName" placeHolder="Search for a game..."/>
						<select id="genre" name="searchGenre">
							<option value="">Genre</option>
							<option value="Action">Action</option>
							<option value="Adventure">Adventure</option>
							<option value="Fighting">Fighting</option>
							<option value="Platform">Platform</option>
							<option value="Puzzle">Puzzle</option>
							<option value="Role-Playing">RPG</option>
							<option value="Sports">Sports</option>
							</select>
							
							<select id="genre" name="searchYear">
							<option value="">Year</option>
							<option value="1984">1984</option>
							<option value="1985">1985</option>
							<option value="1986">1986</option>
							<option value="1987">1987</option>
							<option value="1988">1988</option>
							<option value="1989">1989</option>
							<option value="1990">1990</option>
							<option value="1991">1991</option>
							<option value="1992">1992</option>
							<option value="1993">1993</option>
							<option value="1994">1994</option>
							<option value="1995">1995</option>
							<option value="1996">1996</option>
							<option value="1997">1997</option>
							<option value="1998">1998</option>
							<option value="1999">1999</option>
							</select>
						<input id="button" type="submit" name ="search" value="Search" onclick="DoSearch();"/>
						<div class="result" </div>
				</form>	
			</div>	
		</header>
		<main class="main clearfix">
			<form action = "" method = "post">
                <label>Enter a Username: </label><input type = "text" name = "username" class = "box"/><br /><br />
                <label>Enter a Password: </label><input type = "password" name = "password" class = "box" /><br/><br />
                <label>Confirm Password: </label><input type = "password" name = "confpass" class = "box" /><br/><br />
                <input type = "submit" value = "Register"/><br />
                <?php
		            include("config.php");
					if($_SERVER["REQUEST_METHOD"] == "POST") {
						// username and password sent from form 
						$myusername = mysqli_real_escape_string($mysqli,$_POST['username']);
						$mypassword = mysqli_real_escape_string($mysqli,$_POST['password']); 
						$conpassword = mysqli_real_escape_string($mysqli,$_POST['confpass']); 
						
						$sql = "SELECT username FROM userbase WHERE username = '$myusername'";
						$checkresult = mysqli_query($mysqli,$sql);
						
						if($myusername == $checkresult) 
						{
							echo "<p>User already in database.</p>";
						}
						else 
						{
							if($conpassword == $mypassword) 
							{							
								$sql = "INSERT INTO userbase (username, password)
								VALUES ('$myusername', '$mypassword')";
						
								if(mysqli_query($mysqli, $sql))
								{
									echo "<p>Added to the system.</p>";
								}
								else
								{
									echo "<p>User already in database.</p>";
								}
							}
							else 
							{
								echo "<p>Passwords do not match.</p>";
							}	
						}
    				}
                ?>
            </form>
		<footer class="footer">
			<h4>This website was designed with love by Ashley Davies.</h4>
			<p><a href="register.php">Register</a></p>
			<p><a href="changestyle.php">Change Style</a></p>
			<p><a href = "logout.php">Logout</p>
		</footer>
		</main>
		</div>
	</body>
	</html>
