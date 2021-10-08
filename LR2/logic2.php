<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'web_lab2');

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql->connect_errno) exit("ошибка подключения к БД");
$mysql->set_charset("utf8");

$query = "SELECT restaraunts.id, restaraunts.title FROM restaraunts";
$result = $mysql->query($query);
while($row = $result->fetch_assoc()){
    echo "<option value='". $row["id"] . "'>
    ". $row["title"] ."
    </option>";
}

?>