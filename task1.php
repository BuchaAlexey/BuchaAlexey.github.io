<?php
require "db.php"


?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" type="text/css" href="registration.css">
        <link rel="stylesheet" type="text/css" href="mainRegistration.css">
    </head>
    <body>



    </body>
<?php if (isset($_SESSION['logged_user'])) : ?>
    Авторизован! <br>
    Привет, <?php echo $_SESSION ['logged_user']->login; ?>
<?php else : ?>
    <hr>
    <a href="/logout.php">Выйти из аккаунта</a>



    <a href="/login.php">Авторизация</a>
    <a href="/signup.php">Регистрация</a>

<?php endif; ?>