<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>NEWS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style_table.css">
</head>
<body>
<nav>
    <ul>
        <li>
            <a href="index.php" class="nav-button">Главная</a>
        </li>
        <li>
            <a href="news.php" class="nav-button">Свежие новости</a>
        </li>
        <li><a href="categories.php" class="nav-button">Категории:</a>
        <ul class="nav-button2">
            <li><a href="categories.php#first">Lorem ipsum</a></li><br>
            <li><a href="categories.php#second">Ipsum</a></li><br>
            <li><a href="categories.php#third">Lorem</a></li>
        </ul>
        </li>
        <li>
            <a href="register.php" class="nav-button">Регистрация</a>
        </li>
        <li>
            <a href="login.php" class="nav-button">Аунтификация</a>
        </li>
    </ul>
</nav>
</body>
</html>
