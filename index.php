<?php 
$dbname = "web";
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
    <div class="container">
    <div class="row my-5">
    <form action="save_invoice.php" method="POST" class='col-12'>
        <div class="form-group">
            <label for="period">期別:</label> 
            <select name="period">
                <option value="1">1,2月</option>
                <option value="2">3,4月</option>
                <option value="3">5,6月</option>
                <option value="4">7,8月</option>
                <option value="5">9,10月</option>
                <option value="6">11,12月</option>
            </select>
        </div>
        <div class="form-group">
            <label for="year">年分:</label>
            <select name="year">
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>
        </div>
        <div class="form-group">
            <label for="code">獎號</label>
            <input nane='code' type="text">
        </div>
        <div class="form-group">
            <label for="cost">花費</label>
            <input name='cost' type="text">
        </div>
        <input type="submit" value="儲存">
    </form>
    </div>
    </div>
</body>
</html>