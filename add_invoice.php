<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
</head>
<body>
    <?php include "layout/header.php"?>
    <div class="container">
        <form action="save_number.php" method="POST">
            <table class='table border mt-5'>
                <tr>
                    <td>年月份</td>
                    <td>
                        <input class="form-control" type="number" name="year">
                        <select class="form-control" name="period">
                            <option value="1">1.2月</option>
                            <option value="2">3.4月</option>
                            <option value="3">5.6月</option>
                            <option value="4">7.8月</option>
                            <option value="5">9.10月</option>
                            <option value="6">11.12月</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>特別獎</td>
                    <td>
                        <input class="form-control" type="number" name="num1">
                    </td>
                </tr>
                <tr>
                    <td>特獎</td>
                    <td>
                        <input class="form-control" type="number" name="num2">
                    </td>
                </tr>
                <tr>
                    <td>頭獎</td>
                    <td>
                        <input class="form-control" type="number" name="num3[]">
                        <input class="form-control" type="number" name="num3[]">
                        <input class="form-control" type="number" name="num3[]">
                        <p>同期統一發票收執聯8位數號碼與頭獎號碼相同者獎金20萬元</p>
                    </td>
                </tr>
                <tr>
                    <td>二獎</td>
                    <td>
                    同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元
                    </td>
                </tr>
                <tr>
                    <td>三獎</td>
                    <td>
                    同期統一發票收執聯末6 位數號碼與頭獎中獎號碼末6 位相同者各得獎金1萬元
                    </td>
                </tr>
                <tr>
                    <td>四獎</td>
                    <td>
                    同期統一發票收執聯末5 位數號碼與頭獎中獎號碼末5 位相同者各得獎金4千元
                    </td>
                </tr>
                <tr>
                    <td>五獎</td>
                    <td>
                    同期統一發票收執聯末4 位數號碼與頭獎中獎號碼末4 位相同者各得獎金1千元 
                    </td>
                </tr>
                <tr>
                    <td>六獎</td>
                    <td>
                    同期統一發票收執聯末3 位數號碼與 頭獎中獎號碼末3 位相同者各得獎金2百元
                    </td>
                </tr>
                <tr>
                    <td>增開六獎</td>
                    <td>
                        <input class="form-control" type="number" name="num4">
                        <p>同期統一發票收執聯末3位數號碼與增開六獎號碼相同者各得獎金2百元</p>
                    </td>
                </tr>
            </table>
            <div class="input-group">
                <input class="btn btn-primary ml-auto" type="submit" value="儲存">
            </div>
        </form>
    </div>
</body>
</html>