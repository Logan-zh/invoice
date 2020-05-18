<?php
    include_once "DBC.php";
    $num = 1000;
    $char = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    for($i=0;$i<$num;$i++){
        $code = $char[rand(0,25)].$char[rand(0,25)];
        $data = [
            'code' => $code,
            'number' => rand(10000000,99999999),
            'period' => rand(1,6),
            'expend' => rand(50,10000),
            'year' => rand(2020,2022),
        ];
        save('invoice',$data);
        echo '已新增'.$data['code'].$data['number']."<br>";
    }
?>