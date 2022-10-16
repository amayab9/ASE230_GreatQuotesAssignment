<?php
session_start();
// if the user is alreay signed in, redirect them to the members_page.php page: reference https://code.tutsplus.com/tutorials/how-to-redirect-with-php--cms-34680
	if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) header('location: ../authors/index.php');
// use the following guidelines to create the function in auth.php

$errorMessage =''; //instead of using "die", return a message that can be printed in the HTML page

if(count($_POST)>0){
	// 1. check if email and password have been submitted
	if (empty($_POST['username']) || empty($_POST['password']) ||)) {
    	// 2. check if the email is well formatted
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			// 3. check if the password is well formatted
			if(!empty($_POST['password']) && $_POST['password'] != " "){
			// 4. check if the file containing banned users exists
			// 5. check if the email has been banned
			// 6. check if the file containing users exists
			if (file_exists('users.csv')){
			// 7. check if the email is registered
			$fh=fopen('users.csv', 'r');//read accounts stored in users.csv
			while($line=fgets($fh)){
				$line=trim($line);
				$line=explode(';', $line);
				if($line[0]==trim($_POST['email'])){
					// 8. check if the password is correct
					if(password_verify($_POST['password'], $line[1])){
						// 9. store session information
						$_SESSION['logged'] = true;
						$_SESSION['email'] = '';
						// 10. redirect the user to the members_page.php page
						header('location: ../authors/index.php');//redirects user to private.php
					} else {
						$errorMessage = 'incorrect password';
					}
				}
			}
			fclose($fh);
			}


			/*
			echo 'check email+password';
			if(true){
				$_SESSION['logged']=true;

			}else $_SESSION['logged']=false;
			*/
			} else{
				$errorMessage = 'Please enter your password';
			}
		}else{
			$errorMessage = 'Your email is invalid';
		}
	} else {
		$errorMessage = 'Please enter a username and password';
	}

}

// improve the form
?>
<form method="POST">
	<input type="email" name="email" />
	<input type="password" name="password" />
	<button type="submit">Log in</button>
</form>
