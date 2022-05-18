<?php
require_once "../logic/DB.php";
require_once '../logic/ORM.php';
require_once "../logic/HallsCRUD.php";
require_once "../logic/PaintingsCRUD.php";

if(isset($_GET['id_halls'])){
    HallsCRUD::Delete(htmlspecialchars($_GET['id_halls']));
    echo "<script>window.location.href = '../read/halls.php'</script>"; 
}

if(isset($_GET['id_paintings'])){
    PaintingsCRUD::Delete(htmlspecialchars($_GET['id_paintings']));
    echo "<script>window.location.href = '../read/paintings.php'</script>"; 
}

?>