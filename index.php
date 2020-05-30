<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="container">
    <?php 
    include './layout/header.php';
    ?>
    <div class="container border">
    <form action="save_invoice.php" method="POST" class='col-12 form-row '>
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
            <label for="code">獎號：</label>
            <div class="form-row">
                <div class="col-3">
                    <input id='code' name='code' type="text" class='form-control'>
                </div>
                <div class="col-9">
                    <input id='number' name='number' type="number" class='form-control'>
                </div>
            </div>
        </div>
        <div class="form-group col-12">
            <label for="expend">花費：</label>
            <input id='expend' name='expend' type="text" class='form-control'>
        </div>
        <div class="col-8 text-danger">
        <?php
        if(isset($_GET['status'])){
        switch ($_GET['status']){
            case '0':
                echo '<p class="info">無效</p>';
            break;
            case '1':
                echo '<p class="info">建立中</p>';
            break;
            }
        }
        ?>
        </div>
        <div class="form-group col-4 text-right">
        <input type="submit" value="儲存" class='btn btn-primary'>
        </div>
    </form>
    </div>
        <script>
            setTimeout(() => {
                document.querySelector('.info').innerHTML = "";
            }, 3000);
        </script>
</body>
</html>