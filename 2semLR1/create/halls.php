<?php
require_once "../logic/DB.php";
require_once '../logic/ORM.php';
require_once "../logic/HallsActions.php";
require_once "../logic/HallsCRUD.php";

$result = HallsActions::getRecord();

require_once "../header.php";
?>

<main>
    <h2 class="text-center mb-2">
        Зал
    </h2>
    <form action="<?=HallsCRUD::getTableName()?>.php?id_halls=<?=$_GET['id_halls']?>" method="post" class="w-50 mx-auto my-5">
        <?php
            $fields = HallsCRUD::getFields();
            $keys = array_keys($fields);
            foreach ($keys as $key){
                echo "<input type='$fields[$key]' value='$result[$key]' placeholder='$key' name='$key' class='form-control mb-4'>";
            }
            if(isset($_GET['id_halls'])){
                echo '<button class="btn btn-success mt-4" name="update" type="submit">
                        Сохранить
                    </button>';
                
            } else {
                echo '<button class="btn btn-success mt-4" name="create" type="submit">
                        Сохранить
                    </button>';
                
            }
        ?>
        
    </form>
</main>

<?php
HallsActions::Create();
HallsActions::Update();
require_once "../footer.php";
?>