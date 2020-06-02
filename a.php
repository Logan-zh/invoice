<?php
        include "layout/header.php";
        include "DBC.php";
        if(isset($_GET['year'])){
            $year = $_GET['year'];
        }else{
            $year = date('Y');
        }
?>
<div class="container mt-3 shadow p-3">
<form action="a.php" method="get">
<select class="form-control" name="year" onchange="sub()">
<?php 
for($y=$year-5 ; $y<$year; $y++){?>
    <option value="<?=$y?>"><?=$y?></option>
<?php
}?>
<option value="<?=$year?>" selected="selected"><?=$year?></option>
<?php
for($y=$year+1 ; $y<$year+5; $y++){?>
    <option value="<?=$y?>"><?=$y?></option>
<?php
}
?>
</select>
</form>
<?php
        $award_type = [
            1 => ["特別獎",1,8,10000000],
            2 => ["特獎",2,8,2000000],
            3 => ["頭獎",3,8,200000],
            4 => ["二獎",3,7,40000],
            5 => ["三獎",3,6,10000],
            6 => ["四獎",3,5,4000],
            7 => ["五獎",3,4,1000],
            8 => ["六獎",3,3,200],
            9 => ["增開六獎",4,3,200],
        ];

        $bonus=0;
        $ins=[];
            for($j=1;$j<=6;$j++){
                for($k=1;$k<=4;$k++){
                    $data = [
                        'year' => $year,
                        'period' => $j,
                        'type' => $k,
                    ];
                    $award_numbers = all('award_number',$data);
                    $invoices = all('invoice',['year'=>$year,'period'=>$j]);
                    for($l=1;$l<=9;$l++){
                        foreach($invoices as $in){
                            foreach($award_numbers as $an){
                                $len = $award_type[$l][2];
                                $start = 8-$len;
                                if(substr($in['number'],$start,$len) == substr($an['number'],$start,$len)){
                                    if(!in_array($in['number'],$ins)){
                                        echo "<p>發票".$in['code'].$in['number']."中了".$l."獎</p>";
                                        echo "<p>獎金".$award_type[$l][3]."元</p>";
                                        $ins[] = $in['number'];
                                        $bonus = ($bonus + $award_type[$l][3]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            echo "<hr class='alert-primary'>";
            if($bonus == 0){
                echo '可憐吶!沒有中獎。';
            }else{
                echo "<p>總獎金：".$bonus."元</p>";
            }
            
?>
</div>
<script>
    function sub(){
        document.querySelector('form').submit();
    }
</script>