<?php
    // класс действий над таблицей залов, здесь производятся действия над полученными данными и вызов CRUD-действий
    class HallsActions{
        public static function getRecord(){ //получение конкретной записи по id для вывода инфы в полях
            if($_GET['id_halls'] == ''){
                return [];
            }
            return HallsCRUD::getRecord(htmlspecialchars($_GET['id_halls']));
        }
        
        public static function Create(){
            if('POST' != $_SERVER['REQUEST_METHOD']){
                return [];
            }
            if($_POST['title'] == '' || !isset($_POST['create'])){ // в каждом CRUD-действии производится проверка какое именно действие вызвано
                return [];
            }
            $data = [];
            foreach($_POST as $item){
                array_push($data, htmlspecialchars($item));
            }
            HallsCRUD::Create($data);
            header('Location: ../read/halls.php');
        }

        public static function Read(){
            return HallsCRUD::Read();
        }

        public static function Update(){
            if('POST' != $_SERVER['REQUEST_METHOD']){
                return [];
            }
            if($_POST['title'] == '' || !isset($_POST['update'])){
                return [];
            }
            $data = [];
            foreach($_POST as $item){
                array_push($data, htmlspecialchars($item));
            }
            HallsCRUD::Update($data, htmlspecialchars($_GET['id_halls']));
            header('Location: ../read/halls.php');
        }

        // public static function Delete(){
        //     if('POST' != $_SERVER['REQUEST_METHOD']){
        //         return [];
        //     }
        //     if(!isset($_POST['delete'])){
        //         return [];
        //     }
        //     echo 
        //     "<script>
        //         const option = confirm(Удалить запись?);
        //         if(){

        //         }
        //     </script>";
        //     HallsCRUD::Delete(htmlspecialchars($_POST['delete']));
        //     echo "<script>window.location.href = '../read/halls.php'</script>"; 
        //     //header("Refresh:0");
        //     //header('Location: ../read/halls.php'); //почему-то не работает header именно в этом методе
        // }

        
    }

?>