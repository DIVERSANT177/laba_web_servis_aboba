<?php
class PaintingsActions{
    public static function getRecord(){
        if($_GET['id_paintings'] == ''){
            return [];
        }
        return PaintingsCRUD::getRecord(htmlspecialchars($_GET['id_paintings']));
    }

    public static function Create(){
        if('POST' != $_SERVER['REQUEST_METHOD']){
            return [];
        }
        
        if($_POST['name'] == '' || $_POST['description'] == '' || $_FILES['image']['name'] == '' || $_POST['dates'] == '' || !isset($_POST['create'])){
            return [];
        }
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $_FILES['image']['name']);
        $data = [];
        array_push($data, htmlspecialchars($_FILES['image']['name']));
        foreach($_POST as $item){
            array_push($data, htmlspecialchars($item));
        }
        PaintingsCRUD::Create($data);
        header('Location: ../read/paintings.php');
    }

    public static function Read(){
        return PaintingsCRUD::Read();
    }

    public static function Update(){
        if('POST' != $_SERVER['REQUEST_METHOD']){
            return [];
        }
        if($_GET['id_paintings'] == '' || $_POST['name'] == '' || $_POST['description'] == '' || $_FILES['image']['name'] == '' || $_POST['dates'] == '' || !isset($_POST['update'])){
            return [];
        }
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $_FILES['image']['name']);
        $data = [];
        array_push($data, htmlspecialchars($_FILES['image']['name']));
        foreach($_POST as $item){
            array_push($data, htmlspecialchars($item));
        }
        PaintingsCRUD::Update($data, htmlspecialchars($_GET['id_paintings']));
        header('Location: ../read/paintings.php');
    }

    // public static function Delete(){
    //     if('POST' != $_SERVER['REQUEST_METHOD']){
    //         return [];
    //     }

    //     if(!isset($_POST['delete'])){
    //         return [];
    //     }
        
    //     PaintingsCRUD::Delete(htmlspecialchars($_POST['delete']));
    //     echo "<script>window.location.href = '../read/paintings.php'</script>";
    //     //header('Location: ../read/paintings.php');
        
    // }
}
?>