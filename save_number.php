<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
</head>
<body>
    <?php 
    include "layout/header.php" ;
    include "DBC.php";

    $year = $_POST['year'];
    $period = $_POST['period'];
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];
    $num4 = $_POST['num4'];

    $table = 'award_number';

    for($i=1;$i<=4;$i++){
        if($i == 3){
            foreach($num3 as $num){
                $data = [
                    'year' =>$year,
                    'period' =>$period,
                    'number' =>$num,
                    'type' =>$i,
                ];
                echo save($table,$data);
            }
        }else{
            $a = 'num'.$i;
        $data = [
            'year' =>$year,
            'period' =>$period,
            'number' =>$$a,
            'type' =>$i,
        ];
        echo save($table,$data);
        }
    }
    ?>
</body>
</html>