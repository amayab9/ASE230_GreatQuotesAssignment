<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="eng">
/*
Requires the php logic for deleteing
*/
	<head>
		<title>Great Quotes - Quote Deleted</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	</head>
	<body>
		<!--Body Container-->
		<div style="height: 100%;">
			<!--Top Bar-->
			<div class="lb" style="height: 60px;">
				<div class="divTwo" style="width: 300px; height: 60px; float: left;">
                    <a class="btnTwo" href="..\quotes\index.php">Switch to Quotes</a>
            </div>
				<!--Will display sign out button if user is logged in-->
				<?php if(isset($_SESSION['logged']) && isset($_SESSION['logged_user'])) { ?>
				<div class="divTwo" style="width: 300px; height: 60px; float: left; background-color: red;">
                    <a class="btnTwo" href="../auth/signout.php">Sign Out</a>
                </div>
				<?php } ?>
				<?php if(!isset($_SESSION['logged']) || !isset($_SESSION['logged_user'])) { ?>
				<!--Will display sign in button if user isn't logged in-->
				<div class="divThree" style="width: 300px; height: 60px; float: left;">
                    <a class="btnTwo" href="../auth/signin.php">Sign In</a>
                </div>
				<?php } ?>
			</div>
			<!--Small Top Bar-->
			<div class="lg" style="height: 5px;">
            </div>
			<!--Quote Column-->
			<div class="textColumn" style="min-height: 100%;">
				<p class="textlb" style="font-size: 100px;">Author Deleted!</p>
				<!--Buttons Row-->
				<div class="row" style="padding-top: 30px;">
					<div class="col-md-2 col-sm-5 col-xs-12">
                        <div class="btnDiv">
                            <a class="btn" href="index.php">Home</a>
                        </div>
                    </div>
				</div>
			</div>
			<!--Small Footer Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Footer Bar-->
			<div class="lb" style="height: 30px;"></div>
		</div>
	</body>
</html>
