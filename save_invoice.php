<?php
    include 'DBConnection.php';
    $period = $_POST['period'];
    $year = $_POST['year'];
    $code = $_POST['code'];
    $expend = $_POST['expend'];
    $number = $_POST['number'];
    $sql = "insert into `invoice` (`period`,`year`,`code`,`number`,`expend`) value('$period','$year','$code','$number','$expend')";
    $result = $pdo->exec($sql);
    echo ($result)?'suscess':'fail';
    echo '<br>'.$sql;
    print_r($_POST)
?>