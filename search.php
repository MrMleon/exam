<?php
require("includes/constants.php");
$con = mysqli_connect(DB_SERVER,DB_USER, DB_PASS) or die("Can't access database");
mysqli_select_db($con, DB_NAME) or die("Cannot select DB");


function search ($query)
{
    global $con;
    $query = trim($query);
    $query = mysqli_real_escape_string($con, $query);
    $query = htmlspecialchars($query);

    if (!empty($query))
    {
        if (strlen($query) < 3) {
            $text = '<p>Слишком короткий поисковый запрос.</p>';
        } else if (strlen($query) > 128) {
            $text = '<p>Слишком длинный поисковый запрос.</p>';
        } else {
            $q = "SELECT *
                  FROM `news_table` WHERE `tags` LIKE '%$query%'
                  OR `category` LIKE '%$query%'";

            $result = mysqli_query($con, $q);

            if (mysqli_affected_rows($con) > 0) {
                $row = mysqli_fetch_assoc($result);
                $num = mysqli_num_rows($result);

                $text = '<p>По запросу <b>'.$query.'</b> найдено совпадений: '.$num.'</p>';

                do {
                    // Делаем запрос, получающий ссылки на статьи
                    $q1 = "SELECT `link` FROM `news_table`";
                    $result1 = mysqli_query($con, $q1);

                    if (mysqli_affected_rows($con) > 0) {
                        $row1 = mysqli_fetch_assoc($result1);
                    }

                } while ($row = mysqli_fetch_assoc($result));
            } else {
                $text = '<p>По вашему запросу ничего не найдено.</p>';
            }
        }
    } else {
        $text = '<p>Задан пустой поисковый запрос.</p>';
    }

    return $text;
}

if (!empty($_POST['query'])) {
    $search_result = search ($_POST['query']);
    echo $search_result;
}
?>
<form name="search" method="post" action="search.php">
    <input type="search" name="query" placeholder="Поиск">
    <button type="submit">Найти</button>
</form>


