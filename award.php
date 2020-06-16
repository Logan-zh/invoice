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
            1 => ["特別獎",1,8,10000000],
            2 => ["特獎",2,8,2000000],
            3 => ["頭獎",3,8,200000],
            4 => ["二獎",3,7,40000],
            5 => ["三獎",3,6,10000],
            6 => ["四獎",3,5,4000],
            7 => ["五獎",3,4,1000],
            8 => ["六獎",3,3,200],
            9 => ["增開六獎",4,3,200],
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
                    $data = [
                        'number'=>$in['number'],
                        'period'=>$an['period'],
                        'reward'=>$award_type[$_GET['aw']][3],
                        'expend'=>$in['expend'],
                        'year'=>$in['year'],
                    ];
                    echo $record=num('reward_record',$data);
                    if($record==0){
                        echo "<tr><td>".$in['code'].$in['number']."</td><td>中獎了</td></tr>";
                        save('reward_record',$data);
                    }else{
                        $re = find('reward_record',$data);
                        echo "<tr><td>".$in['code'].$in['number']."</td><td>中過".$re['reward']."</td></tr>";
                    }
                }
            }
        }

    ?>
    </table>
</div>
</body>
</html>