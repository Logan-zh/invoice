<?php 
include_once 'DBConnection.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
    <link rel="stylesheet" href="css/style.css">
    <?php include 'cdn/CDN.php'; ?>
</head>
<body>
    <?php 
    include './layout/header.php';
    ?>
    <div class="container mt-3">
    <form action="save_invoice.php" method="POST" class='col-12 border form-row'>
        <div class="form-group col-6">
            <label for="period">期別：</label> 
            <select name="period" class='form-control'>
                <option value="1">1,2月</option>
                <option value="2">3,4月</option>
                <option value="3">5,6月</option>
                <option value="4">7,8月</option>
                <option value="5">9,10月</option>
                <option value="6">11,12月</option>
            </select>
        </div>
        <div class="form-group col-6">
            <label for="year">年分：</label>
            <select name="year" class='form-control'>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>
        </div>
        <div class="form-group col-12">
            <label for="cost">獎號：</label>
            <div class="form-row">
                <div class="col-3">
                    <input id='cost' name='cost' type="text" class='form-control'>
                </div>
                <div class="col-9">
                    <input id='number' name='number' type="number" class='form-control'>
                </div>
            </div>
        </div>
        <div class="form-group col-12">
            <label for="cost">花費：</label>
            <input id='cost' name='code' type="text" class='form-control'>
        </div>
        <div class="form-group col-12 text-right">
        <input type="submit" value="儲存" class='btn btn-primary'>
        </div>
    </form>
    </div>
</body>
</html>