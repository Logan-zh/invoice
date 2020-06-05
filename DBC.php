<?php 
    $dbname = 'invoice';
    $dsn = "mysql:host=localhost;charset=utf8;dbname=$dbname";
    $pdo = new pdo($dsn,'root','');
    // session_start();

    function to($url){
        header("location:".$url);
    }

    //回傳全部
    // print_r(all('invoice'));
    function all($table,$arg=1){
        global $pdo;
        if(is_array($arg)){
            foreach($arg as $key => $value){
                $tmp[] = "`".$key."`='".$value."'";
            }
            $sql ="select * from `$table` where". implode('&&',$tmp);
        }else{
            $sql = "select * from `$table` where $arg";
        }
        $rows = $pdo->query($sql)->fetchALL();
        return $rows;
    }

    //搜尋資料
    // print_r(find('invoice',2));
    function find($table,$arg=1){
        global $pdo;
        $sql = "select * from `$table`";
        if(is_array($arg)){
            foreach($arg as $key => $value){
                $tmp[] = "`$key` = '$value'";
            }
                $tmp2 = implode('&&',$tmp);
                $sql = "select * from `$table` where $tmp2";
        }else{
            $sql = "select * from `$table` where `id` = '$arg'";
        }
            $rows = $pdo->query($sql)->fetch();
            return $rows;
    }

    //計算筆數
    // print_r(num('invoice',"`year`='2022'"));
    function num($table,$arg=1){
        global $pdo;
        if(is_array($arg)){
            foreach($arg as $key => $value){
                $tmp[] = "`$key` = '$value'";
            }
                $tmp2 = implode('&&',$tmp);
                $sql = "select count(*) from `$table` where $tmp2" ;
        }else{
            $sql = "select count(*) from `$table` where $arg" ;
        }
        $rows = $pdo->query($sql)->fetchColumn();
        return $rows;
    }

    //刪除資料
    // delete('invoice',['id'=>26]);
    function delete($table,$arg=1){
        global $pdo;
        $sql = "delete from `$table` ";
        if(is_array($arg)){
            foreach($arg as $key => $value){
                $tmp[] = sprintf("`%s` = '%s'",$key,$value);
            }
            $sql .= "where". implode("&&",$tmp);
        }
        $rows = $pdo->exec($sql);
        return $rows;
    }

    //新增資料
    // print_r(insert('invoice',['code'=>'KE','number'=>'17935469','period'=>'2','expend'=>'500','year'=>'2021']));
    function insert($table ,$arg){
        global $pdo;
        $key = array_keys($arg);
        $str1 = "(`".implode('`,`',$key)."`)";
        $str2 = "('".implode("','",$arg)."')";
        $sql = "insert into `$table`$str1 values $str2";
        $resoult = $pdo->exec($sql);
        return $resoult;
    }

    //修改指定ID資料
    // update('invoice',['id'=>'23','code'=>'KE','number'=>'17935469','period'=>'4','expend'=>'650','year'=>'2020']);
    function update($table ,$arg){
        global $pdo;
        if(is_array($arg)){
            $sql = "update `$table` set ";
            foreach($arg as $key => $value){
                if($key != 'id'){
                $tmp[] = "`" .$key. "`='" .$value."'";
                }
            }
            $sql .= implode(",",$tmp)."where `id` = '". $arg['id']."'";
            $resoult = $pdo->exec($sql);
            return $resoult;
        }
    }

    //有ID就修改，沒有就新增
    // save('invoice',['id'=>'29','code'=>'RL','number'=>'13297369','period'=>'3','expend'=>'199','year'=>'2022']);
    function save($table ,$arg=0){
        global $pdo;
        if(isset($arg['id'])){
            $sql = "update `$table` set ";
            foreach($arg as $key => $value){
                if($key != 'id'){
                $tmp[] = "`" .$key. "`='" .$value."'";
                }
            }
            $sql .= implode(",",$tmp)."where `id` = '". $arg['id']."'";
        }else{
            $key = array_keys($arg);
            $str1 = "(`".implode('`,`',$key)."`)";
            $str2 = "('".implode("' , '",$arg)."')";
            $sql = "insert into `$table`$str1 values $str2";
        }
        $resoult = $pdo->exec($sql);
        return $resoult;
    }

    //直接輸入SQL指令
    // print_r(query("select * from `invoice` where `year` = '2020'"));
    function query($query){
        global $pdo;
        return $rows = $pdo->query($query)->fetchAll();
    }

    //顯示資料
    function ls($per=1){
        global $pdo;
        if(is_array($per)){
            foreach($per as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
                $sql = "select * from `invoice` where".implode('&&',$tmp)." order by `year` desc ";
                $rows = $pdo->query($sql)->fetchAll();
            }else{
                $sql = "select * from `invoice` where ".$per." order by `year` desc ";
                $rows = $pdo->query($sql)->fetchAll();
            }
        echo "<div class='row justify-content-center m-2'><div class='col-1 border'>編號</div>";
        echo "<div class='col-2 border'>編碼</div>";
        echo "<div class='col-2 border'>號碼</div>";
        echo "<div class='col-2 border'>期別</div>";
        echo "<div class='col-2 border'>消費</div>";
        echo "<div class='col-2 border'>年份</div>";
        echo "<div class='col-1 border'>操作</div></div>";
        foreach($rows as $row){
        echo "<form action='in_edit.php' method='POST'>";
        echo "<div class='row justify-content-center mx-2'>";
        echo "<input class='col-1 form-control' name='id' type='text' value='".$row['id']."'>";
        echo "<input class='col-2 form-control' name='code' type='text' value='".$row['code']."'>";
        echo "<input class='col-2 form-control' name='number' type='text' value='".$row['number']."'>";
        echo "<input class='col-2 form-control' name='period' type='text' value='".$row['period']."'>";
        echo "<input class='col-2 form-control' name='expend' type='text' value='".$row['expend']."'>";
        echo "<input class='col-2 form-control' name='year' type='text' value='".$row['year']."'>";
        echo "<input class='col-1 form-control' type='submit' value='修改'>";
        echo "</div>";
        echo "</form>";
    }
        echo "</table>";
    }


    function TRUNCATE(){
        global $pdo;
        $sql = "TRUNCATE `invoice`.`invoice`";
        $resoult = $pdo->exec($sql);
        return $resoult;
    }
?>