<?php 
    $dbname = 'invoice';
    $dsn = "mysql:host=localhost;charset=utf8;dbname=$dbname";
    $pdo = new pdo($dsn,'root','');
    session_start();
?>
