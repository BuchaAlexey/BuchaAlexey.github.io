<?php
require "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

</head>
<body>



</body>
<?php

$data = $_POST;
if (isset($data['do_signup']))
{

    // здесь регистрируем

    $error = array();
    if( trim($data['login'])== '')
    {
        $error[] = 'Введите логин!';
    }

    if( trim($data['email'])== '')
    {
        $error[] = 'Введите email!';
    }


    if( ($data['password'])== '')
    {
        $error[] = 'Введите пароль!';
    }
    if( ($data['password 2'])!= $data['password 2'])
    {
        $error[] = 'Повторный пароль введен не верно!';
    }

    if (R::count('users',"login = ? OR email = ?",array($data['login'], $data['email'])) > 0 )
    {
        $error[] = 'Пользователь с таким логином или email уже существует';
    }


    if (empty($error))
    {

        //vse harasho,registiryem
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        R::store($user);
        echo    '<div style="color:green;">Поздравляю, вы зарегитрированы!</div><hr>';
    }else
    {
        echo    '<div style="color:red;">'.array_shift($error).'</div><hr>';
    }



}

?>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap-grid.min.css">
<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

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

<div class="main">
<div class="container">


<div class="allRegistration enter formArea ">


<form action="/signup.php" method="POST">
<fieldset>
    <p>
    <p><strong>Ваш логин:</strong></p>
    <input type="text" name="login" value="<?php echo $data['login'];?>">
    </p>
    <p>
    <p><strong>Ваш E-mail:</strong></p>
    <input type="email" name="email" value="<?php echo $data['email'];?>">
    </p>
    <p>
    <p><strong>Ваш пароль:</strong></p>
    <input type="password" name="password" value="<?php echo $data['password'];?>">
    </p>
    <p><strong>Ваш пароль ещё раз:</strong></p>
    <input type="password" name="password 2" value="<?php echo $data['password 2'];?>">
    </p>

    <p>
        <button type="submit" name="do_signup">Зарегистрироваться</button>
    </p>
</fieldset>
</div>
</div>
</div>
</form>

