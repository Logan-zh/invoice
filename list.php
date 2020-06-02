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

    <h3 class='text-center mt-2'>發票列表</h3>
    <form action="list.php">
    <select name="year" onchange="sub()" class="form-control my-2">
      <?php for($i=2018 ; $i<2025 ;$i++){?>
      <option value="<?=$i?>"
      <?php if(isset($_GET['year'])){
        if($i==$_GET['year']){
          echo "selected='selected'";
        }
      } ?> 
      ><?=$i?></option>
      <?php } ?>
    </select>
    </form>
<?php
  if(isset($_GET['year'])){
    ?>
            <div class="row">
            <div class="col-12">
              <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="period00" data-toggle="list" href="#periodAll">全部</a>
                <a class="list-group-item list-group-item-action" id="period01" data-toggle="list" href="#period1">第1期</a>
                <a class="list-group-item list-group-item-action" id="period02" data-toggle="list" href="#period2">第2期</a>
                <a class="list-group-item list-group-item-action" id="period03" data-toggle="list" href="#period3">第3期</a>
                <a class="list-group-item list-group-item-action" id="period04" data-toggle="list" href="#period4">第4期</a>
                <a class="list-group-item list-group-item-action" id="period05" data-toggle="list" href="#period5">第5期</a>
                <a class="list-group-item list-group-item-action" id="period06" data-toggle="list" href="#period6">第6期</a>
              </div>
            </div>
                    <div class="col-12">
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active shadow" id="periodAll">
                            <?php
                                ls(['year'=>$_GET['year']]);
                            ?>
                          </div>
                          <div class="tab-pane fade shadow" id="period1">
                            <?php
                                ls(['year'=>$_GET['year'],'period'=>1]);
                            ?>
                          </div>
                          <div class="tab-pane fade shadow" id="period2">
                            <?php
                                ls(['year'=>$_GET['year'],'period'=>2]);
                            ?>
                          </div>
                          <div class="tab-pane fade shadow" id="period3">
                            <?php
                                ls(['year'=>$_GET['year'],'period'=>3]);
                            ?>
                          </div>
                          <div class="tab-pane fade shadow" id="period4">
                            <?php
                                ls(['year'=>$_GET['year'],'period'=>4]);
                            ?>
                          </div>
                          <div class="tab-pane fade shadow" id="period5">
                            <?php
                                ls(['year'=>$_GET['year'],'period'=>5]);
                            ?>
                          </div>
                          <div class="tab-pane fade shadow" id="period6">
                            <?php
                                ls(['year'=>$_GET['year'],'period'=>6]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
  }else{?>
        <div class="row">
            <div class="col-12">
              <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="period00" data-toggle="list" href="#periodAll">全部</a>
                <a class="list-group-item list-group-item-action" id="period01" data-toggle="list" href="#period1">第1期</a>
                <a class="list-group-item list-group-item-action" id="period02" data-toggle="list" href="#period2">第2期</a>
                <a class="list-group-item list-group-item-action" id="period03" data-toggle="list" href="#period3">第3期</a>
                <a class="list-group-item list-group-item-action" id="period04" data-toggle="list" href="#period4">第4期</a>
                <a class="list-group-item list-group-item-action" id="period05" data-toggle="list" href="#period5">第5期</a>
                <a class="list-group-item list-group-item-action" id="period06" data-toggle="list" href="#period6">第6期</a>
              </div>
            </div>
                    <div class="col-12">
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active shadow" id="periodAll">
                            <?php
                                ls();
                            ?>
                          </div>
                          <div class="tab-pane fade shadow" id="period1">
                            <?php
                                ls("`period` = 1");
                            ?>
                          </div>
                          <div class="tab-pane fade shadow" id="period2">
                            <?php
                                ls("`period` = 2");
                            ?>
                          </div>
                          <div class="tab-pane fade shadow" id="period3">
                            <?php
                                ls("`period` = 3");
                            ?>
                          </div>
                          <div class="tab-pane fade shadow" id="period4">
                            <?php
                                ls("`period` = 4");
                            ?>
                          </div>
                          <div class="tab-pane fade shadow" id="period5">
                            <?php
                                ls("`period` = 5");
                            ?>
                          </div>
                          <div class="tab-pane fade shadow" id="period6">
                            <?php
                                ls("`period` = 6");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
  }
?>
    </div>
    <script>
      function sub(){
        document.querySelector('form').submit();
      }
    </script>
</body>
</html>