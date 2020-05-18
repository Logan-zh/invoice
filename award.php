<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
</head>
<body>

    <?php 
        include "layout/header.php";
        include "DBC.php";
    ?>
<div class="container p-2">
    <table class="table border">
    <?php
    // 獎名,獎別,長度
        $award_type = [
            1 => ["特別獎",1,8],
            2 => ["特獎",2,8],
            3 => ["頭獎",3,8],
            4 => ["二獎",3,7],
            5 => ["三獎",3,6],
            6 => ["四獎",3,5],
            7 => ["五獎",3,4],
            8 => ["六獎",3,3],
            9 => ["增開六獎",4,3],
        ];

        echo "<tr><td>獎別：</td><td>".$award_type[$_GET['aw']][0]."</td></tr>";
        echo "<tr><td>年份：</td><td>".$_GET['year']."</td></tr>";
        echo "<tr><td>期別：</td><td>".$_GET['period']."</td></tr>";

        $aw = $_GET['aw'];
        $data = [
            'year' => $_GET['year'],
            'period' => $_GET['period'],
            'type' => $award_type[$_GET['aw']][1],
        ];
        $award_nums = num('award_number',$data);
        echo "<tr><td>獎號數量：</td><td>". $award_nums."</td></tr>";

        $award_numbers = all('award_number',$data);
        $invoices = all('invoice',['year'=>$_GET['year'],'period'=>$_GET['period']]);
        
        foreach($invoices as $in){
            foreach($award_numbers as $an){
                $len = $award_type[$aw][2];
                $start = 8-$len;
                if(substr($in['number'],$start,$len) == substr($an['number'],$start,$len)){
                echo "<tr><td>".$in['number']."</td><td>中獎了</td></tr>";
                }
            }
        }

    ?>
    </table>
</div>
</body>
</html>