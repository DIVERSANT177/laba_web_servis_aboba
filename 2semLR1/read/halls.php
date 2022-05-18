<?php
require_once "../logic/DB.php";
require_once '../logic/ORM.php';
require_once "../logic/HallsActions.php";
require_once "../logic/HallsCRUD.php";


$result = HallsActions::Read();
require_once "../header.php";
?>

<main>
    <div class="d-flex bg-light">
        <div class="mx-5" style="font-size: 22px;">
            <a href="#" style="color: black; text-decoration: none">
                Залы
            </a>
        </div>
            <div style="font-size: 22px;">
            <a href="paintings.php" style="color: black; text-decoration: none">
                Картины
            </a>
        </div>
    </div>
    <div>
        <h2 class="text-center">
            Залы
        </h2>
        <table class="table table-striped p-5">
            <thead>
                <tr>
                    
                    <th>Название</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $item) { ?>
                    <tr>
                        
                        <td>
                            <?=$item['title']?>
                        </td>
                        <td>
                            <div class="btn btn-primary mb-4">
                                <a href="../create/halls.php?id_halls=<?=$item['id']?>" class="text-white text-decoration-none">
                                    Изменить
                                </a>
                            </div>
                            <form action="halls.php" method="post">
                                <a href="../logic/Delete.php?id_halls=<?=$item['id']?>" onClick="return confirm('Удалить запись?');" class="btn btn-danger delete" name="delete" value="<?=$item['id']?>" type="submit">
                                    Удалить
                                </a> 
                            </form>
                            
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="../create/halls.php" class="btn btn-success">
                Добавить
            </a>
        </div>
    </div>
</main>
<?php
require_once "../footer.php";
?>