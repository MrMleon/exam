<?php require_once("includes/connection.php"); ?>
<?php include_once("header.php"); ?>
<?php
if(isset($_POST["register"])){


if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
	$full_name=$_POST['full_name'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	

		
	$query = mysqli_query($con, "SELECT * FROM usertbl WHERE username='".$username."'");
	$numrows = mysqli_num_rows($query);
	
	if($numrows==0)
	{
	$sql="INSERT INTO usertbl
			(full_name, email, username,password) 
			VALUES('$full_name','$email', '$username', '$password')";

	$result = mysqli_query($con, $sql);


        if($result){
            $message = "Account Successfully Created";
        } else {
            $message = "Failed to insert data information!";
        }

    } else {
        $message = "That username already exists! Please try another one!";
    }

} else {
    $message = "All fields are required!";
}
}

if (!empty($message)) {
    echo '<p id="error">' . 'MESSAGE: '. $message . '</p>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/register_style.css">
</head>
<body>
<div>
	<div id="login">

        <h1>Регистрация пользователя</h1>
         <form name="registerform" class='reg-form' id="registerform" action="register.php" method="post">
	      <p class='form-row'>
	    	<label for="user_login">Full Name:
	    	<input type="text" name="full_name" id="full_name" class="input" size="32" value="">
            </label>
          </p>

	      <p class='form-row'>
		    <label for="user_pass">Email:
		    <input type="email" name="email" id="email" class="input" value="" size="50">
            </label>
          </p>

          <p class='form-row'>
		    <label for="user_pass">Username:
	    	<input type="text" name="username" id="username" class="input" value="" size="30">
            </label>
          </p>

          <p class='form-row'>
		    <label for="user_pass">Password:
		    <input type="password" name="password" id="password" class="input" value="" size="32" /></label>
          </p>

          <p class='form-row'>
	    	<input type="submit" name="register" id="register" class="button" value="Register me" />
          </p>

          <p>Already have an account?
              <a href="login.php">Login Here</a>!
          </p>
         </form>
	    </div>
	</div>
</body>
</html>

