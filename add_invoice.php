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
            <table class='table border m-5'>
                <tr>
                    <td>年月份</td>
                    <td>
                        <input type="number" name="year">
                        <select name="month">
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
                        <input type="number" name="num1">
                    </td>
                </tr>
                <tr>
                    <td>特獎</td>
                    <td>
                        <input type="number" name="num2">
                    </td>
                </tr>
                <tr>
                    <td>頭獎</td>
                    <td>
                        <input type="number" name="num3[]">
                        <input type="number" name="num3[]">
                        <input type="number" name="num3[]">
                    </td>
                </tr>
                <tr>
                    <td>二獎</td>
                    <td>
                        <input type="number" name="num4">
                    </td>
                </tr>
                <tr>
                    <td>三獎</td>
                    <td>
                        <input type="number" name="num5">
                    </td>
                </tr>
                <tr>
                    <td>四獎</td>
                    <td>
                        <input type="number" name="num6">
                    </td>
                </tr>
                <tr>
                    <td>五獎</td>
                    <td>
                        <input type="number" name="num7">
                    </td>
                </tr>
                <tr>
                    <td>六獎</td>
                    <td>
                        <input type="number" name="num8">
                    </td>
                </tr>
                <tr>
                    <td>增開六獎</td>
                    <td>
                        <input type="number" name="num9">
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