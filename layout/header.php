<?php include 'cdn/CDN.php'; ?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
          <a class="navbar-brand" href="index.php">統一發票管理系統</a>
              <div class="nav ml-auto">
                <a class="btn btn-primary" href="list.php">發票列表</a>
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  各期獎號
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="add_invoice.php">新增獎號</a>
                    <a class="dropdown-item" href="invoice.php">當期獎號獎號</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
                <a class="btn btn-primary" href="award.php">對獎</a>
              </div>
          </div>
      </nav>