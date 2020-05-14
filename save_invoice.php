<?php
    if($_POST['period']&&$_POST['year']&&$_POST['code']&&$_POST['expend']&&$_POST['number']){
        include 'DBC.php';
        $period = $_POST['period'];
        $year = $_POST['year'];
        $code = $_POST['code'];
        $expend = $_POST['expend'];
        $number = $_POST['number'];
        $sql = "insert into `invoice` (`period`,`year`,`code`,`number`,`expend`) value('$period','$year','$code','$number','$expend')";
        $result = $pdo->exec($sql);
        echo ($result)?'suscess':'fail';
        echo '<br>'.$sql;
        header('location:index.php?status=1');
    }else{
        header('location:index.php?status=0');
    }
?>
