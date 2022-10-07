<?php
session_start();
// if the user is alreay signed in, redirect them to the members_page.php page

// use the following guidelines to create the function in auth.php
//instead of using "die", return a message that can be printed in the HTML page
if(count($_POST)>0){
	// 1. check if email and password have been submitted
	// 2. check if the email is well formatted
	// 3. check if the password is well formatted
	// 4. check if the file containing banned users exists
	// 5. check if the email has been banned
	// 6. check if the file containing users exists
	// 7. check if the email is registered
	// 8. check if the password is correct
	// 9. store session information
	// 10. redirect the user to the members_page.php page
	
	/*
	echo 'check email+password';
	if(true){
		$_SESSION['logged']=true;
		
	}else $_SESSION['logged']=false;
	*/
}

// improve the form
?>
<form method="POST">
	<input type="email" name="email" />
	<input type="password" name="password" />
	
	<input type="submit" value="submit" />
</form>
