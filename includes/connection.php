<?php
require("constants.php");

$con = mysqli_connect(DB_SERVER,DB_USER, DB_PASS) or die("Can't access database");
	mysqli_select_db($con, DB_NAME) or die("Cannot select DB");
	
	?>