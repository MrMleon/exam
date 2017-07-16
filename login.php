<?php require_once("includes/connection.php"); ?>
<?php include("header.php"); ?>

<?php

$admin = 'Admin';
$pass = '12341234';

if(isset($_SESSION["session_username"]) && $_SESSION["session_username"] == "Admin"){
    header("Location: admin.php");
}elseif(isset($_SESSION["session_username"])){
// echo "Session is set"; // for testing purposes
header("Location: intropage.php");
}


if (isset($_POST["login"])){
if ($_POST['username'] == $admin && $_POST['password'] == $pass) {
    header("Location: admin.php");
    $_SESSION['session_username'] = $admin;
} elseif(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query = mysqli_query($con, "SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");

    $numrows = mysqli_num_rows($query);
    if($numrows!=0) {
        while ($row = mysqli_fetch_assoc($query)) {
          $dbusername = $row['username'];
          $dbpassword = $row['password'];
        }
      if($username == $dbusername && $password == $dbpassword) {
            $_SESSION['session_username']=$username;
            /* Redirect browser */
            header("Location: intropage.php");
        }
    } else {
        $message =  "Invalid username or password!";
    }

} else {
    $message = "All fields are required!";
}
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css">
</head>
<div>
    <div id="login">
    <form name="loginform" id="loginform" action="" method="POST" class='reg-form'>
    <p class='form-row'>
        <label for="user_login">Username:
        <input type="text" name="username" id="username" class="input" value="" size="20">
        </label>
    </p>
    <p class='form-row'>
        <label for="user_pass">Password:
        <input type="password" name="password" id="password" class="input" value="" size="20">
        </label>
    </p>
    <p class='form-row'>
        <input type="submit" name="login" class="button" value="Let me in">
    </p>
        <p>No account yet? <a href="register.php">Register Here</a> !</p>
</form>

    </div>

    </div>
</body>
</html>
<?php if (!empty($message)) {echo '<p class="error">' . 'MESSAGE: '. $message . '</p>';} ?>