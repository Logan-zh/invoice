<?php 
    $dbname = 'invoice';
    $dsn = "mysql:host=localhost;charset=utf8;dbname=$dbname";
    $pdo = new pdo($dsn,'root','');
    session_start();

    function all($table,...$arg){
        global $pdo;
        $sql = "select * from `$table`";
        if(isset($arg[0]) && is_array($arg[0])){
            $tmp = [];
            print_r($arg[0]);echo '<br>';
            foreach($arg[0] as $key => $value){
                $tmp[] = sprintf("`%s` = '%s'", $key ,$value);
            }
            $sql = $sql . "where" . implode("&&",$tmp);
            echo implode("&&",$tmp)."<br>";
        }
        echo $sql."<br>";
        $rows = $pdo->query($sql)->fetchALL();
        return $rows;
    }


    function find($table ,$id){
        global $pdo;
        $sql = "select * from `$table` where `id` = '$id'";
        $rows = $pdo->query($sql)->fetchAll();
        return $rows;
    }

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