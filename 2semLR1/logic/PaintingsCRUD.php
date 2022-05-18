<?php
// класс для CRUD-действий, они все прописаны универсально в классе ORM
    class PaintingsCRUD extends ORM{
        public static function getTableName(){
            return 'paintings';
        }
        
        public static function getFields(){
            return [
                'image' => 'file',
                'name' => 'string',
                'description' => 'string',
                'dates' => 'date',
                'id_halls' => 'option', // специально указала, чтобы динамически создавалась выпадающее меню
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
            $query = DB::prepare('SELECT image FROM paintings WHERE id = :id');
            $query->bindValue(':id', $id);
            $query->execute();
            $result = $query->fetchAll();
            unlink("../images/" . $result[0]['image']);
            return parent::Delete($id);
        }
    
        
    }

?>