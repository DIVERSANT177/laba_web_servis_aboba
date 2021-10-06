<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'web_lab2');

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql->connect_errno) exit("ошибка подключения к БД");
$mysql->set_charset("utf8");

$query = "SELECT  restaraunts.title, dishs.id_restaraunt, dishs.name, dishs.img_path, dishs.recipe, dishs.cost FROM dishs INNER JOIN restaraunts ON dishs.id_restaraunt = restaraunts.id";

if ((isset($_GET['name'])) || (isset($_GET['title'])) || (isset($_GET['costFrom'])) || (isset($_GET['costTo'])) || (isset($_GET['recipe']))){
    $check = false;
    if($_GET['name'] != ''){
        $query .= " WHERE name LIKE '%" . mysqli_real_escape_string($mysql,$_GET["name"]) . "%'";
        $check = true;
    }
//    if($_GET['title'] != ''){
//        $query .= " WHERE title LIKE '%" . mysqli_real_escape_string($mysql,$_GET["title"]) . "%'";
//        $check = true;
//    }
    if ($_GET["title"] != "0") {
        if ($check) {
            $query .= " AND dishs.id_restaraunt = '" . mysqli_real_escape_string($mysql,$_GET["title"]) . "'";
        } else {
            $query .= " WHERE dishs.id_restaraunt = '" . mysqli_real_escape_string($mysql,$_GET["title"]) . "'";
        }
        $check = true;
    }
    if($_GET['recipe'] != ''){
        $query .= " WHERE recipe LIKE '%" . mysqli_real_escape_string($mysql,$_GET["recipe"]) . "%'";
        $check = true;
    }
    if ($_GET["costFrom"] != "") {
        if(filter_var($_GET["costFrom"], FILTER_VALIDATE_INT)){
            if ($check) {
                $query .= " AND dishs.cost > " . $_GET["costFrom"];
            } else {
                $query .= " WHERE dishs.cost > " . $_GET["costFrom"];
            }
            $check = true;
        }else{
            echo "Ошибка, переменная не число<br>";
        }
    }
    if ($_GET["costTo"] != "") {
        if(filter_var($_GET["costTo"], FILTER_VALIDATE_INT)){
            if ($check) {
                $query .= " AND dishs.cost < " . $_GET["costTo"];
            } else {
                $query .= " WHERE dishs.cost < " . $_GET["costTo"];
            }
            $check = true;
        }else{
            echo "Ошибка, переменная не число<br>";
        }
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