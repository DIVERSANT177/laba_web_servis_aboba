<?php
// универсальный класс, в котором описаны все методы из CRUD
abstract class ORM{
    abstract public static function getTableName(); // эти два метода будут для каждой таблицы свои
    abstract public static function getFields();

    public static function getRecord($id){ //получение записи по id
        $query = 'SELECT * FROM ' . static::getTableName() . ' WHERE id = :id';
        $query = DB::prepare($query);
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->fetch();
    }

    public static function Create($data){
        $query = 'INSERT INTO '. static::getTableName() . ' (';
        $fields = static::getFields();
        $keys = array_keys($fields);

        foreach($keys as $key){
            $query .= "$key, ";
        }
        $query = rtrim($query, ', ');
        $query .= ') VALUES (';
        foreach($keys as $key){
            $query .= ":$key, ";
        }
        $query = rtrim($query, ', ');
        $query .= ')';
        $query = DB::prepare($query);
        
        for($i=0;$i < count($keys); $i++){
            $query->bindValue(":$keys[$i]", $data[$i]);
        }

        if(!$query->execute()){
            throw new PDOException('При добавлении произошла ошибка!');
        }
    }

    public static function Read(){
        $query = 'SELECT * FROM ' . static::getTableName(); 
        $res = DB::prepare($query);
        $res->execute();
        return $res->fetchAll();
    }

    public static function Update($data, $id){
        $query = 'UPDATE ' . static::getTableName() . ' SET ';
        $fields = static::getFields();
        $keys = array_keys($fields);

        foreach($keys as $key){
            $query .= "$key = :$key, ";
        }
        $query = rtrim($query, ', ');
        $query .= ' WHERE id = ' . $id;

        $query = DB::prepare($query);
        
        for($i=0;$i < count($keys); $i++){
            $query->bindValue(":$keys[$i]", $data[$i]);
        }
        
        if(!$query->execute()){
            throw new PDOException('При изменении произошла ошибка!');
        }
    }

    public static function Delete($id){
        $query = 'DELETE FROM ' . static::getTableName() . ' WHERE id = :id';
        $query = DB::prepare($query);
        $query->bindValue(':id', $id);
        $query->execute();
    }
}
?>