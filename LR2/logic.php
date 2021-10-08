<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'web_lab2');

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql->connect_errno) exit("ошибка подключения к БД");
$mysql->set_charset("utf8");

$query = "SELECT restaraunts.title, dishs.id_restaraunt, dishs.name, dishs.img_path, dishs.recipe, dishs.cost FROM dishs INNER JOIN restaraunts ON dishs.id_restaraunt = restaraunts.id WHERE dishs.name = dishs.name";

if (isset($_GET['name'])) {
    $query .= " AND name LIKE '%" . mysqli_real_escape_string($mysql, $_GET["name"]) . "%'";
}
if ($_GET["id_restaraunt"] != "0") {
    $query .= " AND dishs.id_restaraunt = '" . mysqli_real_escape_string($mysql, $_GET["id_restaraunt"]) . "'";
}
if (isset($_GET['recipe'])) {
    $query .= " AND recipe LIKE '%" . mysqli_real_escape_string($mysql, $_GET["recipe"]) . "%'";
}
if (isset($_GET["costFrom"])) {
    if (filter_var($_GET["costFrom"], FILTER_VALIDATE_INT)) {
        $query .= " AND dishs.cost >= " . $_GET["costFrom"];
    } else {
        echo "Ошибка, переменная не число<br>";
    }
}
if (isset($_GET["costTo"])) {
    if (filter_var($_GET["costTo"], FILTER_VALIDATE_INT)) {
        $query .= " AND dishs.cost <= " . $_GET["costTo"];
    } else {
        echo "Ошибка, переменная не число<br>";
    }
}

$result = $mysql->query($query);
$i = 0;
while ($row = $result->fetch_assoc()) {
    $i++;
    echo "<tr><th scope='row'><img src='images/" . $row["img_path"] . "' width='200' alt=''></th>
                            <td>" . $row['name'] . "</td>
                            <td>". $row['title'] ."</td>
                            <td>" . $row['recipe'] . "</td>
                            <td>" . $row['cost'] . " руб.</td>
                        </tr>";
}
if ($i == 0) {
    echo "Ничего не найдено";
}
?>