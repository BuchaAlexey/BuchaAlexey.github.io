<?php

require "db.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="registration.css">
    <link rel="stylesheet" type="text/css" href="mainRegistration.css">
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


</body>
<?php
$data = $_POST;

if (isset($data['do_login']))
{
    $error = array();
    $user = R::findOne('users','login = ?',array($data['login']));
    if ($user)
    {

        // LOGIN SUCHESTVYET

        if  ($data['password']== $user->password
        ) {
            //loginim usera
            $_SESSION['logged_user'] = $user;
            echo    '<div style="color:green;">Поздравляю, вы авторизованы,можете перейти на главную страницу<a href="index.php"></a></div><hr>';



            echo 'test';
        }else {
            $error[] = 'Не верно введён пароль!!';
        }
    }else {
        $error[] = 'Пользователь не найден!';
    }
    if (    ! empty($error)) {
        echo    '<div style="color:red;">Пользователь с таким логином не найден</div><hr>';
    }
}
?>


<form action="/login.php" method="POST">

    <p>
    <p><strong>Логин:</strong></p>
    <input type="text" name="login" value="<?php echo $data['login'];?>">
    </p>
    <p><strong>Пароль:</strong></p>
    <input type="password" name="password" value="<?php echo $data['password'];?>">
    </p>

    <p>
        <button type="submit" name="do_login">Войти</button>
    </p>

</form>
