<?php
    include_once 'DBC.php';
    $data = [
        'id' => $_POST['id'],
        'code'=>$_POST['code'],
        'number' => $_POST['number'],
        'period'=>$_POST['period'],
        'expend'=>$_POST['expend'],
        'year'=>$_POST['year'],
    ];
    save('invoice',$data);
    to('list.php');
?>