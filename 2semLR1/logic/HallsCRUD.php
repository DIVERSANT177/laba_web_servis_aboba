<?php
// класс для CRUD-действий, они все прописаны универсально в классе ORM
class HallsCRUD extends ORM{
    
    public static function getTableName(){
        return 'halls'; // можно удобно подцепить название таблицы, а в случае изменения в БД - изменить название нужно только здесь
    }

    public static function getFields(){
        return [
            'title' => 'string', // тип данных применяется для динамического создания полей формы
        ];
    }

    public static function getRecord($id){
        return parent::getRecord($id);
    }

    public static function Create($data){
        return parent::Create($data);
    }

    public static function Read(){
        return parent::Read();
    }

    public static function Update($data, $id){
        return parent::Update($data, $id);
    }
   
    public static function Delete($id){
        $query = DB::prepare('SELECT name FROM paintings WHERE id_halls = :id');
        $query->bindValue(':id', $id);
        $query->execute();
        $result = $query->fetchAll();
        if(count($result) > 0){
            echo "<script>alert('Нельзя удалить зал, в котором есть картины');</script>";
            return ;
        } else {
            return parent::Delete($id);
        }
    }
}
?>