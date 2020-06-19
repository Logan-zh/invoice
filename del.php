<?php
    include_once 'DBC.php';
    delete('invoice',['id'=>$_GET['id']]);
    header('location:list.php');
?>