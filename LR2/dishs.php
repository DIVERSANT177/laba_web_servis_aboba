<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Организация дня рождения или юбилея в Волгограде</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header class="header container">
        <div class="row">
            <div class="col-3">
                <a href="#">
                    <img src="images/peppers.jpg" alt="">
                    <div class="logo">
                        Праздники <br>
                        и мероприятия
                    </div>
                </a>
            </div>
            <div class="col-9 ">
                <div class="contacts d-flex justify-content-end">
                    <div class="contacts-inner align-self-center">
                        <div class="phone text-end ">
                            <a href="tel:+7-902-098-35-55">+7 (902) 098 35 55 </a>
                        </div>
                        <div class="email text-end">
                            <a href="mailto:hello@pertsi.ru">hello@pertsi.ru</a>
                        </div>
                    </div>
                    <div class="contacts-img">
                        <img src="images/pepper-header.png" alt="">
                    </div>
                </div>
                <div class="nav justify-content-between">
                    <div class="dropdown nav-item">
                        <a href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Каталог
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Ведущие</a></li>
                            <li><a class="dropdown-item" href="#">Фотографы </a></li>
                            <li><a class="dropdown-item" href="#">Видеографы</a></li>
                            <li><a class="dropdown-item" href="#">Артисты</a></li>
                            <li><a class="dropdown-item" href="#">Банкетные залы и шатры</a></li>
                            <li><a class="dropdown-item" href="#">Офрмление</a></li>
                            <li><a class="dropdown-item" href="#">Кейтеринг</a></li>
                            <li><a class="dropdown-item" href="#">Регистраторы</a></li>
                            <li><a class="dropdown-item" href="#">Торты</a></li>
                        </ul>
                    </div>
                    <div class="nav-item">
                        <a href="#">
                            Услуги
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#">
                            Портфолио
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#">
                            Отзывы
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#">
                            О нас
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#">
                            Контакты
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <main class="main" >
            <div class="h2 text-center">
                Фильтрация
            </div>
            <div class="text-main w-100 mt-5">
                <div class="container-fluid">
<!--                <p>Организация дня рождения или юбилея — хороший повод устроить веселый праздник.</p>-->
<!--                <p>Каждый юбиляр хочет, чтобы событие стало ярким и запоминающимся.</p>-->
<!--                <p>Радость гостей и спокойствие виновника торжества стоит того, чтобы обратиться за помощью в-->
<!--                    event-агентство.</p>-->
<!--                <p>Event-агентство «Перцы» поможет вам организовать незабываемое торжество, которое подарит и-->
<!--                    имениннику, и гостям массу положительных эмоций.</p>-->
<!--                <p>Мы подготовим для вас сценарий проведения юбилея, вам не нужно будет тратить время и силы на поиск-->
<!--                    хорошего ресторана, ведущего или артистов на ваш праздник — все это мы возьмем на себя.</p>-->

                <div class="mt-5">
                    <form action="dishs.php" class="text-center" method="get">
                        <div>
                            Фильтрация результата поиска
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                По цене:
                            </div>
                            <input type="number" name="costFrom" placeholder="Цена от" class="form-control mb-3">
                            <input type="number" name="costTo" placeholder="Цена до" class="form-control">
                        </div>

                        <div class="mb-3">
                            <div class="mb-3">
                            Фильтрация по ресторану:
                            </div>
                            <select name="title" class="form-control">
                                <option value="0" selected>Выберите ресторан</option>
                                <option value="1">Макдональдс</option>
                                <option value="2">Денвер</option>
                                <option value="3">Шаурмечная</option>
                                <option value="4">Додо</option>
                                <option value="5">Майбокс</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="mb-3">
                                По цене:
                            </div>
                            <textarea name="recipe" placeholder="Введите рецептуру блюда" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <div class="mb-3">
                                По названию:
                            </div>
                            <input type="text" name="name" placeholder="Введите название блюда" class="form-control">
                        </div>

                        <input type="submit" value="Применить фильтр" name="filter" class="btn btn-primary">
                        <input type="submit" value="Очистить фильтр" name="clearFilter" class="btn btn-secondary">
                    </form>
                    <table class="table mt-5">
                        <thead>
                        <tr>
                            <th scope="col">Изображение</th>
                            <th scope="col">Наименование</th>
                            <th scope="col">Ресторан</th>
                            <th scope="col">Рецептура</th>
                            <th scope="col">Стоимость</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            require "logic.php";
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

<!--    <footer class="footer container">-->
<!--        <div class="footer-top d-flex justify-content-between">-->
<!--            <div class="footer-left">-->
<!--                Политика обработки персональных данных-->
<!--            </div>-->
<!--            <div class="btn btn-danger">Заказать обратный звонок</div>-->
<!--            <div class="footer-right">-->
<!--                <a href="https://vk.com/id261248208"><img src="images/vk.jpg" class="h-100" alt=""></a>-->
<!--            </div>-->
<!--        </div>-->
<!--        <hr>-->
<!--        <div class="footer-bot d-flex justify-content-between">-->
<!--            <div>-->
<!--                © 2010–2021 Event-агентство "Перцы".-->
<!--            </div>-->
<!--            <div>-->
<!--                Дизайн и фронтенд — Ya.Kunin.Ivan-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </footer>-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous">
    </script>
</body>

</html>