<?php include 'cdn/CDN.php'; ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
          <a class="navbar-brand" href="index.php">統一發票管理系統</a>
            <div class="nav ml-auto">
              <a class="btn btn-primary" href="list.php">發票列表</a>
              <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" href="invoice.php">
                各期獎號
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="add_invoice.php">新增獎號</a>
                  <a class="dropdown-item" href="invoice.php?period=<?=ceil(date('n')/2)?>">單期兌獎</a>
                  <a class="dropdown-item" href="a.php">整年兌獎</a>
                </div>
              </div>
            </div>
      </div>
    </nav>