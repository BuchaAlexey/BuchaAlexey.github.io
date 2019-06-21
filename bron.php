<?php
$link = mysqli_connect('localhost', 'root', '', 'hiwdyhop');

?>


    <html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <meta charset="utf-8">
        <title>Тег INPUT</title>
    </head>
    <body>

    <header class=" navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="index.php">Главная</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Автопарк
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="gallery.php">Жёлтая Iveco Daily 35c13v(19 мест)</a>
                        <a class="dropdown-item" href="gallery.php">Белая Iveco Daily 35c13v(19 мест)</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="gallery.php">Синий Ford Transit (16 мест)</a>
                    </div>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pageAbout.php">О нас</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Услуги
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Перевозки по РБ</a>
                        <a class="dropdown-item" href="#">Микроавтобус на свадьбы</a>
                        <a class="dropdown-item" href="#">Доставка сотрудников</a>
                        <a class="dropdown-item" href="contacts.html">Экскурсии</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Поздки за границу</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacts.php">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="raspisanie.php">Расписание маршрута</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="team.php">Наша команда</a>
                <li class="nav-item">
                    <a class="nav-link" href="bron.php">Бронирование билета</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Регистрация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Вход</a>
                </li>
            </ul>
        </div>
    </header>

    <form name="test" method="post" action="bron.php">
        <p><b>Ваш номер телефона</b><br>
            <input type="text" size="40" name="number">

        <p><b>Ваше имя:</b><br>
            <input type="text" size="40" name="nameP">
        </p>
        <p><b>Выберите город</b><Br>
            <?php
            $sql = "select*from reisi";
            $result = mysqli_query($link, $sql);
            echo '<select name="Reis" >';
            while ($mas = mysqli_fetch_array($result)) {
                echo '<option value=' . $mas['reisi_id'] . '>' . $mas['marshryt'] . '  Дата: ' . $mas['bron_data'] . ' Время: ' . $mas['bron_time'] . '</option>';
            }
            echo '</select>'
            ?>
        </p>
        <p>Комментарий<Br>
            <textarea name="comment" cols="40" rows="3"></textarea></p>
        <p><input type="submit" value="Отправить" name="sendbron">
            <input type="reset" value="Очистить"></p>
    </form>

    </body>
    </html>

<?php
if (isset($_POST['sendbron'])) {

    $sql = "INSERT INTO `bronirovanie`(`bron_number`, `bron_name`,  `bron_reis`, `bron_comment`)
VALUES ('".$_POST['number']."','".$_POST['nameP']."',".$_POST['Reis'].",'".$_POST['comment']."')";
    $result = mysqli_query($link, $sql);
    unset($_POST);




}


?>