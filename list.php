<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>發票列表</title>
</head>
<body>
        <?php 
        include "layout/header.php"; 
        include "DBC.php";
        ?>
    <div class="container">
        <div class="invoice-list">    

    <h3>發票列表</h3>
        <div class="row">
            <div class="col-12">
              <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="period01"          data-toggle="list" href="#period1">第1期</a>
                <a class="list-group-item list-group-item-action" id="period02"     data-toggle="list"      href="#period2">第2期</a>
                <a class="list-group-item list-group-item-action" id="period03"     data-toggle="list"      href="#period3">第3期</a>
                <a class="list-group-item list-group-item-action" id="period04"     data-toggle="list"      href="#period4">第4期</a>
                <a class="list-group-item list-group-item-action" id="period05"     data-toggle="list"      href="#period5">第5期</a>
                <a class="list-group-item list-group-item-action" id="period06"     data-toggle="list"      href="#period6">第6期</a>
              </div>
            </div>
                    <div class="col-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="period1">
                            <?php
                                ls(1);
                            ?>
                          </div>
                          <div class="tab-pane fade" id="period2">
                            <?php
                                ls(2);
                            ?>
                          </div>
                          <div class="tab-pane fade" id="period3">
                            <?php
                                ls(3);
                            ?>
                          </div>
                          <div class="tab-pane fade" id="period4">
                            <?php
                                ls(4);
                            ?>
                          </div>
                          <div class="tab-pane fade" id="period5">
                            <?php
                                ls(5);
                            ?>
                          </div>
                          <div class="tab-pane fade" id="period6">
                            <?php
                                ls(6);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>