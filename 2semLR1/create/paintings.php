<?php
require_once "../logic/DB.php";
require_once '../logic/ORM.php';
require_once "../logic/PaintingsActions.php";
require_once "../logic/PaintingsCRUD.php";
require_once "../logic/HallsActions.php";
require_once "../logic/HallsCRUD.php";

$result = HallsCRUD::Read(); //необходимо для выпадающего меню
$res = PaintingsActions::getRecord(); // при update заполняет формы автоматически

require_once "../header.php";
?>

<main>
    <h2 class="text-center mb-2">
        Добавить картину
    </h2>
    
    <form action="<?=PaintingsCRUD::getTableName()?>.php?id_paintings=<?=$_GET['id_paintings']?>" method="post" class="w-50 mx-auto my-5" enctype="multipart/form-data">
    <?php
            $fields = PaintingsCRUD::getFields();
            $keys = array_keys($fields);
            foreach ($keys as $key){
                if($fields[$key] == 'option'){
                    echo "<select name='$key' class='form-control mb-4'>";
                    foreach($result as $item){
                        if($res['id_halls'] == $item['id']){
                            echo "<option selected value='" . $item['id'] . "'>" . $item['title'] . "</option>";
                        } else {
                            echo "<option value='" . $item['id'] . "'>" . $item['title'] . "</option>";
                        }
                    }
                    echo "</select>";
                } else {
                    echo "<input type='$fields[$key]' value='$res[$key]' placeholder='$key' name='$key' class='form-control mb-4'>";
                }                 
            }
            if($_GET['id_paintings'] != ''){
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
PaintingsActions::Create();
PaintingsActions::Update();
require_once "../footer.php";
?>