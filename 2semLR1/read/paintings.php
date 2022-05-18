<?php
require_once "../logic/DB.php";
require_once '../logic/ORM.php';
require_once "../logic/HallsActions.php";
require_once "../logic/HallsCRUD.php";
require_once "../logic/PaintingsActions.php";
require_once "../logic/PaintingsCRUD.php";

$result = PaintingsActions::Read();
$res = HallsActions::Read();
require_once "../header.php";
?>

<main>
    <div class="d-flex bg-light">
        <div class="mx-5" style="font-size: 22px;">
            <a href="halls.php" style="color: black; text-decoration: none">
                Залы
            </a>
        </div>
        <div style="font-size: 22px;">
            <a href="#" style="color: black; text-decoration: none">
                Картины
            </a>
        </div>
    </div>

    <div>
        <h2 class="text-center">
            Картины
        </h2>
        <table class="table table-striped p-5">
            <thead>
                <tr>
                    
                    <th>Изображение</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Зал</th>
                    <th>Дата написания</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $item) { 
                if($_GET['id_halls'] == $item['id_halls']){
                ?>
                        <tr>
                            <td>
                                <img src="../images/<?=$item['image']?>" width="100" height="100" alt="">  
                            </td>
                            <td>
                                <?=$item['name']?>
                            </td>
                            <td>
                                <?=$item['description']?>
                            </td>
                            <td>
                                <?php
                                
                                foreach($res as $hall){ 
                                    if($hall['id'] == $item['id_halls']){
                                        echo "<a href='?id_halls=" . $item['id_halls'] . "'>" . $hall['title'] . "</a>";
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?=$item['dates']?>
                            </td>
                            <td>
                                <div class="btn btn-primary mb-4">
                                    <a href="../create/paintings.php?id_paintings=<?=$item['id']?>" class="text-white text-decoration-none">
                                        Изменить
                                    </a>
                                </div>
                                <form action="paintings.php" method="post">
                                    <button class="btn btn-danger delete" name="delete" value="<?=$item['id']?>" type="submit">
                                        Удалить
                                    </button> 
                                </form>
                            </td>
                        </tr>
                    <?php } } ?>

                    <?php foreach ($result as $item) {
                if($_GET['id_halls'] == ''){
                ?>
                        <tr>
                            <td>
                                <img src="../images/<?=$item['image']?>" width="100" height="100" alt="">
                            </td>
                            <td>
                                <?=$item['name']?>
                            </td>
                            <td>
                                <?=$item['description']?>
                            </td>
                            <td>
                                <?php

                                foreach($res as $hall){
                                    if($hall['id'] == $item['id_halls']){
                                        echo "<a href='?id_halls=" . $item['id_halls'] . "'>" . $hall['title'] . "</a>";
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?=$item['dates']?>
                            </td>
                            <td>
                                <div class="btn btn-primary mb-4">
                                    <a href="../create/paintings.php?id_paintings=<?=$item['id']?>" class="text-white text-decoration-none">
                                        Изменить
                                    </a>
                                </div>
                                <form action="paintings.php" method="post">
                                    <!-- <button class="btn btn-danger delete" name="delete" value="<?=$item['id']?>" type="submit">
                                        Удалить
                                    </button>  -->
                                    <a href="../logic/Delete.php?id_paintings=<?=$item['id']?>" onClick="return confirm('Удалить запись?');" class="btn btn-danger delete" name="delete" value="<?=$item['id']?>" type="submit">
                                        Удалить
                                    </a>
                                </form>
                            </td>
                        </tr>
                    <?php } } ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="../create/paintings.php" class="btn btn-success">
                Добавить
            </a>
        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="main.js"></script>
<?php
//PaintingsActions::Delete();
require_once "../footer.php";
?>