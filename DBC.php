<?php 
    $dbname = 'invoice';
    $dsn = "mysql:host=localhost;charset=utf8;dbname=$dbname";
    $pdo = new pdo($dsn,'root','');
    session_start();

    // print_r(all('invoice',['id'=>'22']));
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

    // print_r(find('invoice',['year'=>'2021']));
    function find($table,$arg=1){
        global $pdo;
        $sql = "select * from `$table`";
        if(is_array($arg)){
            $key = array_keys($arg);
            foreach($arg as $key => $value){
                $tmp[] = "`$key` = '$value'";
            }
                $tmp2 = implode('&&',$tmp);
                $sql = "select * from `$table` where $tmp2";
        }
            // echo $sql."<br>";
            $rows = $pdo->query($sql)->fetchAll();
            return $rows;
    }

    function num($table,...$arg){
        global $pdo;
        $sql = "select count(*) from `$table`" ;
        if(isset($arg[0])){
            $tmp = implode(' ',$arg);
            $sql .= $tmp;
        }
        $rows = $pdo->query($sql)->fetch();
        return $rows;
    }
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

    // insert('invoice','`code`,`number`,`period`,`expend`,`year`',"'KD','20015932','3','500','2020'");

    // insert('invoice',['code'=>'KE','number'=>'17935469','period'=>'2','expend'=>'500','year'=>'2021']);

    function insert($table ,$arg){
        global $pdo;
        // if(isset($arg[0])){
        //     $sql = "insert into `$table`($arg[0]) value($arg[1])";
        //     $resoult = $pdo->exec($sql);
        //     var_dump($resoult);
        // }
        $key = array_keys($arg);
        $str1 = "(`".implode('`,`',$key)."`)";
        $str2 = "('".implode(',',$arg)."')";
        $sql = "insert into `$table`$str1 values $str2";
        $resoult = $pdo->exec($sql);
        return $resoult;
    }

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

    // print_r(query("select * from `invoice` where `year` = '2020'"));

    function query($query){
        global $pdo;
        return $rows = $pdo->query($query)->fetchAll();
    }

    // test('a',['id'=>1,'year'=>2,'u'=>3]);

    // function test($a,$arg){
    //     foreach($arg as $key => $value){
    //     $tmp[] = sprintf("`%s` = '%s'",$key,$value);
    //     $t = implode("&&",$tmp);
        
    //     $tmp2[] = "`".$key."` = '".$value."'";
    //     $tt = implode("&&",$tmp2);

    //     }
    //     print_r( $t );echo "<br>";

    //     print_r($tt);echo "<br>";
    // }

    // $a = ['add'=>'2','bdd'=>'3','cdd'=>'4','ddd'=>'5'];

    // $k = array_keys($a);
    // print_r($k);echo "<br>";
    // $str = "(`".implode("`,`",$k)."`)";
    // $str2= "('".implode("','",$a)."')";
    // echo $str.$str2;

    function ls($per){
        global $pdo;
        $sql = "select * from `invoice` where `period` = $per order by `year` ";
        $rows = $pdo->query($sql)->fetchAll();
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
?>