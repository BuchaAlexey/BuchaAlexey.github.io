<?php
SESSION_start();

require "libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=hiwdyhop',
    'root', '' ); //for both mysql or mariaDB