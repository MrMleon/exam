<?php require("includes/connection.php"); ?>
<?php include_once("header.php"); ?>
<?php
if(!isset($_SESSION["session_username"])) {
    header("location:login.php");
} else {

}

?>
<?php

if ((isset($_POST['user'])) and ($_POST['user']=='on'))
{
    if (isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        mysqli_query($con, "DELETE * FROM usertbl WHERE id = '$user_id'");
        echo $user_id;
    }
}

$data = mysqli_query($con, "SELECT full_name, username, email, id FROM usertbl");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>
<div id="welcome">
    <h2>Welcome, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
    <p><a href="logout.php">Logout</a> Here!</p>
    <h3>Таблица пользователей</h3>
<table>
    <form action="" method="post">
<?php
while($row = mysqli_fetch_array($data)) {
?>

<tr><td>Full Name:</td><td> <?php echo $row["full_name"] ?></td></tr>
<tr><td>E-mail:</td><td> <?php echo $row["email"] ?></td></tr>
<tr><td>
        <input type="hidden" name="user_id" value="<?= $row["id"]?>">
        <input type="checkbox" name="user"> Username:</td><td> <?php echo $row["username"], $row['id'] ?></td></tr>
<?php
}
?>
        <input type="submit" name="del" value="Удалить" onclick="alert('Уверены?')">
    </form>
</table>
</div>
</body>
</html>