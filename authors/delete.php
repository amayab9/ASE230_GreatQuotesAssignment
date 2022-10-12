<?php
//checks if user should be able to view this page
//I will get this working soon
#session_start();
#if(!isset($_SESSION['logged']) || !isset($_SESSION['logged_user'])){
#	header('location:../auth/not_registered.php');
?>

<!DOCTYPE HTML>
<html lang="eng">
    <?php
		require("../util_csv.php");
	?>
	<head>
		<title>Great Authors - Delete Confirmation</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	</head>
	<body>
		<!--Body Container-->
		<div style="height: 100%;">
			<!--Top Bar-->
			<div class="" style="height: 60px;">
				<div class="divTwo" style="width: 300px; height: 60px; float: left;">
                    <a class="btnTwo" href="..\quotes\index.php">Switch to Quotes</a>
                </div>
				<!--Will display sign out button if user is logged in-->
				<?php if(isset($_SESSION['logged']) && isset($_SESSION['logged_user'])) { ?>
				    <div class="btnDivTwo" style="width: 300px; height: 60px; float: left; background-color: red;">
                        <a class="btnTwo" href="../auth/signout.php">Sign Out</a>
                    </div>
				<?php } ?>
				<?php if(!isset($_SESSION['logged']) || !isset($_SESSION['logged_user'])) { ?>
				<!--Will display sign in button if user isn't logged in-->
				    <div class="butDivThree" style="width: 300px; height: 60px; float: left;">
                        <a class="butTwo" href="../auth/signin.php">Sign In</a>
                    </div>
				<?php } ?>
			</div>
			<!--Small Top Bar-->
			<div class="lg" style="height: 5px;"></div>
			<!--Quote Column-->
			<div class="textColumn" style="min-height: 100%;">
				<p class="textlb" style="font-size: 100px;">Delete Author</p>
				    <form class="createForm" action="deleted.php?index=<?= $_GET['index'] ?>" method="POST">
					   <h1 style="margin-bottom: -20px;">Are you sure you want to delete this Author?</h1>
					<!--Buttons Row-->
					<div class="row" style="padding-top: 70px;">
						<div class="col-md-2 col-sm-5 col-xs-12">
                            <div class="butDiv">
                                <input class="but lb" style="border: 0px;" type="submit" value="Delete">
                            </div>
                        </div>
						<div class="col-md-2 col-sm-5 col-xs-12">
                            <div class="butDiv">
                                <a class="but" href="index.php">Cancel</a>
                            </div>
                        </div>
					</div>
				</form>
			</div>
			<!--Small Footer Bar-->
			<div class="lg" style="height: 5px;">
            </div>
			<!--Footer Bar-->
			<div class="lb" style="height: 30px;">
            </div>
	    </div>
    </body>
</html>
