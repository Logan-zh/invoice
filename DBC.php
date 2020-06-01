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
        echo "<table class='table'>";
        echo "<tr>";
        echo "<td>編號</td>";
        echo "<td>編碼</td>";
        echo "<td>號碼</td>";
        echo "<td>期別</td>";
        echo "<td>消費</td>";
        echo "<td>年份</td>";
        echo "</tr>";
        foreach($rows as $row){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['code']."</td>";
        echo "<td>".$row['number']."</td>";
        echo "<td>".$row['period']."</td>";
        echo "<td>".$row['expend']."</td>";
        echo "<td>".$row['year']."</td>";
        echo "</tr>";
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