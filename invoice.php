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
    $period = ceil(date('n')/2);
    $monthStr = [
        '1'=>'1,2月',
        '2'=>'3,4月',
        '3'=>'5,6月',
        '4'=>'7,8月',
        '5'=>'9,10月',
        '6'=>'11,12月',
    ];
    if(isset($_GET['period'])){
        $period = $_GET['period'];
    }else{
        $period = 1;
    }
    if(isset($_GET['year'])){
        $year = $_GET['year'];
    }else{
        $year = date('Y');
    }
    $num1 = find('award_number',['period'=>$period,'year'=>$year,'type'=>1]);
    $num2 = find('award_number',['period'=>$period,'year'=>$year,'type'=>2]);
    $num3 = all('award_number',['period'=>$period,'year'=>$year,'type'=>3]);
    $num4 = find('award_number',['period'=>$period,'year'=>$year,'type'=>4]);
    ?>
    <div class="container">
    <form action="invoice.php" method="GET" class="row p-2">
        <div class="form-group col-10">
            <select name="year" class="form-control">
                <?php
                    for($i = $year-5 ;$i< $year;$i++){ ?>
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php   }   ?>
                        <option value="<?=$year?>" selected="selected"><?=$year?></option>
                    <?php
                    for($i = $year+1 ;$i< $year+5;$i++){ ?>
                        <option value="<?=$i?>"><?=$i?></option>
                <?php   }   ?>
            </select>
            <select name="period" class="form-control">
                <option value="1">1,2月</option>
                <option value="2">3,4月</option>
                <option value="3">5,6月</option>
                <option value="4">7,8月</option>
                <option value="5">9,10月</option>
                <option value="6">11,12月</option>
            </select>
        </div>
        <div class="form-group col-2">
            <input type="submit" value="搜尋" class="btn btn-primary">
        </div>
    </form>
        <table class='table border'>
            <tr>
                <td>年月份</td>
                <td><?=$year?>年 <?=$monthStr[$period]?></td>
            </tr>
            <tr>
                <td>特別獎</td>
                <td><?php if(!empty($num1['number'])){echo sprintf("%08d",$num1['number']);}?><br>同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元</td>
                <td><a href="award.php?aw=1&&year=<?=$year?>&&period=<?=$period?>">兌獎</a></td>
            </tr>
            <tr>
                <td>特獎</td>
                <td><?php if(!empty($num2['number'])){echo sprintf("%08d",$num2['number']);}?><br>同期統一發票收執聯8位數號碼與特獎號碼相同者獎金200萬元</td>
                <td><a href="award.php?aw=2&&year=<?=$year?>&&period=<?=$period?>">兌獎</a></td>
            </tr>
            <tr>
                <td>頭獎</td>
                <td><?php foreach($num3 as $num){echo sprintf("%08d",$num['number']).'、';}?><br>同期統一發票收執聯8位數號碼與頭獎號碼相同者獎金20萬元</td>
                <td><a href="award.php?aw=3&&year=<?=$year?>&&period=<?=$period?>">兌獎</a></td>
            </tr>
            <tr>
                <td>二獎</td>
                <td>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元</td>
                <td><a href="award.php?aw=4&&year=<?=$year?>&&period=<?=$period?>">兌獎</a></td>
            </tr>
            <tr>
                <td>三獎</td>
                <td>同期統一發票收執聯末6 位數號碼與頭獎中獎號碼末6 位相同者各得獎金1萬元</td>
                <td><a href="award.php?aw=5&&year=<?=$year?>&&period=<?=$period?>">兌獎</a></td>
            </tr>
            <tr>
                <td>四獎</td>
                <td>同期統一發票收執聯末5 位數號碼與頭獎中獎號碼末5 位相同者各得獎金4千元</td>
                <td><a href="award.php?aw=6&&year=<?=$year?>&&period=<?=$period?>">兌獎</a></td>
            </tr>
            <tr>
                <td>五獎</td>
                <td>同期統一發票收執聯末4 位數號碼與頭獎中獎號碼末4 位相同者各得獎金1千元</td>
                <td><a href="award.php?aw=7&&year=<?=$year?>&&period=<?=$period?>">兌獎</a></td>
            </tr>
            <tr>
                <td>六獎</td>
                <td>同期統一發票收執聯末3 位數號碼與 頭獎中獎號碼末3 位相同者各得獎金2百元</td>
                <td><a href="award.php?aw=8&&year=<?=$year?>&&period=<?=$period?>">兌獎</a></td>
            </tr>
            <tr>
                <td>增開六獎</td>
                <td><?php if(!empty($num4['number'])){echo sprintf("%03d",$num4['number']);}?><br>同期統一發票收執聯末3位數號碼與增開六獎號碼相同者各得獎金2百元</td>
                <td><a href="award.php?aw=9&&year=<?=$year?>&&period=<?=$period?>">兌獎</a></td>
            </tr>
        </table>
    </div>
</body>
</html>