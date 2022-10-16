<?php
session_start();
#require_once('auth.php');
#signup($_POST,'users.csv');
// if the user is alreay signed in, redirect them to the members_page.php page
// Single line if statement, no wrapping
if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) header('location: members_page.php');

// use the following guidelines to create the function in auth.php
// instead of using "die", return a message that can be printed in the HTML page
$errorMessage = '';
if(count($_POST)>0){
	// check if the fields are empty
	if(isset($_POST['email']) || isset($_POST['password'])){
			// check if the email is valid
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				// check if password length is between 8 and 16 characters
				if(strlen($_POST['password']) >= 8 && strlen($_POST['password']) < 16){
					// check if the password contains at least 2 special characters
					if(preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $_POST['password'])){
						//check if the file containing banned users exists
						if(file_exists('banned.csv')){
							// check if the email has not been banned
							
								// check if the file containing users exists
								if(file_exists('users.csv')){
									// check if the email is in the database already
									$fh = fopen('users.csv', 'r');
									while($line = fgets($fh)){
										$line = trim($line);
										$line = explode(';', $line);

										if($line[0]==trim($_POST['email'])){
											$errorMessage = " you already have an account, please sign in";
										} else {
											
										// encrypt password, save the user in the database, show them a success message and redirect them to the sign in page
										$fh=fopen('users.csv', 'a+');
										fputs($fh,$_POST['email'].';'.password_hash($_POST['password'],PASSWORD_DEFAULT).PHP_EOL);
										fclose($fh);
										header('location: signin.php');
										}
										
									}						
									
								} else {
									$errorMessage = 'Something is wrong!';
								}

						} else{
							$errorMessage = 'Something is not right.';
						}
					} else{
					$errorMessage = 'Please enter a special character';
					}
				} else {
					$errorMessage = 'Please enter a password >=8 characters';
				}
			} else {
				$errorMessage = 'Your email is invalid';
			}
	} else{
		$errorMessage = 'Please enter your email and password';
	}
}

// improve the form
?>

<!doctype HTML>
	<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Great Quotes - Index of Authors</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		</head>

		<body>
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
				<a href="../authors/index.php" class="navbar-brand">Great Quotes</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navmenu">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
					<a href="../auth/signup.php" class="nav-link">Sign Up</a>
					</li>
					<li class="nav-item">
					<a href="#" class="nav-link">Sign In</a>
					</li>
					<li class="nav-item">
					<a href="#" class="nav-link">Sign Out</a>
					</li>
				</ul>
				</div>
			</div>
			</nav>
			<div class="container" style ="padding-top: 100px">
				<form method="POST">
					Sign up with Great Quotes!<br />
					<input type="email" name="email" placeholder="email" id="email" /><br />
					<input type="password" name="password" placeholder="password" id="password" /><br /><br />
					<p>Note:
						<ul>
							<li>Password should have one special character</li>
							<li>Password should be 8 - 16 characters</li>
						</ul>
					</p>


					<button type="submit" class="btn btn-success">Sign up</button><br />
					<?php echo $errorMessage; ?>
				</form>
			</div>
				<!-- JavaScript Bundle with Popper -->
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
			</body>
	</html>
	<?php
/*
					/
							// check if the email has not been banned
							$fh=fopen('../data/banned.csv', 'r');
							while($line=fgets($fh)){
								$line=trim($line);
								$line=explode(';', $line);
								if($line[0]==trim($_POST['email'])){
									$errorMessage = 'You have been banned. Do not come back!';
								} else{
									// check if the file containing users exists
									if(file_exists('users.csv')){

										// check if the email is in the database already
										$fh=fopen('users.csv', 'r');
										while($line=fgets($fh)){
											$line=trim($line);
											$line=explode(';', $line);
											if($line[0]==trim($_POST['email'])){
												$errorMessage = 'You already have an account. Please Sign in';
											} else {
												$fh=fopen('users.csv', 'a+');
												// encrypt password
												// save the user in the database
    											fputs($fh,$_POST['email'].';'.password_hash($_POST['password'],PASSWORD_DEFAULT).PHP_EOL);
    											fclose($fh);
												header('location: signin.php');

												// show them a success message and redirect them to the sign in page
											}
										}
										fclose($fh);

									} else {
										$errorMessage = 'Having an issue. Refresh and try again';
									}
								}

							}
							fclose($fh);

						} else {
							$errorMessage = 'Having an issue. Refresh and try again';
						}
*/
?>