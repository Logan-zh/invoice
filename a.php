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
        $aw1=0;$aw2=0;$aw3=0;$aw4=0;$aw5=0;$aw6=0;$aw7=0;$aw8=0;$aw9=0;
        
        
        
        for($l=1;$l<=9;$l++){

            
            for($j=1;$j<=6;$j++){
                for($k=1;$k<=4;$k++){
                    $data = [
                        'year' => $year,
                        'period' => $j,
                        'type' =>$award_type[$l][1],
                    ];
                    
                    $award_numbers = all('award_number',$data);
                    $invoices = all('invoice',['year'=>$year,'period'=>$j]);



                        foreach($invoices as $in){
                            foreach($award_numbers as $an){
                                $len = $award_type[$l][2];
                                $start = 8-$len;
                                if(substr($in['number'],$start,$len) == substr($an['number'],$start,$len)){
                                    if(!in_array($in['number'],$ins)){
                                        echo '<p>'.$in['year'].'年第'.$in['period']."期發票".$in['code'].$in['number']."中了".$award_type[$l][0]."</p>";
                                        echo "<p>小計".$award_type[$l][3]."元</p>";
                                        $ins[] = $in['number'];
                                        $bonus = ($bonus + $award_type[$l][3]);
                                        $data = [
                                            'number'=>$in['number'],
                                            'period'=>$an['period'],
                                            'reward'=>$award_type[$l][3],
                                            'expend'=>$in['expend'],
                                            'year'=>$in['year'],
                                        ];
                                        $record=num('reward_record',$data);
                                        if($record==0){
                                            save('reward_record',$data);
                                        }
                                        switch($l){
                                            case 1:
                                                $aw1++;
                                            break;
                                            case 2:
                                                $aw2++;
                                            break;
                                            case 3:
                                                $aw3++;
                                            break;
                                            case 4:
                                                $aw4++;
                                            break;
                                            case 5:
                                                $aw5++;
                                            break;
                                            case 6:
                                                $aw6++;
                                            break;
                                            case 7:
                                                $aw7++;
                                            break;
                                            case 8:
                                                $aw8++;
                                            break;
                                            case 9:
                                                $aw9++;
                                            break;
                                        }
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
                if($aw1>0){echo '特獎'.$aw1.'張<br>';}
                if($aw2>0){echo '特獎'.$aw2.'張<br>';}
                if($aw3>0){echo '頭獎'.$aw3.'張<br>';}
                if($aw4>0){echo '二獎'.$aw4.'張<br>';}
                if($aw5>0){echo '三獎'.$aw5.'張<br>';}
                if($aw6>0){echo '四獎'.$aw6.'張<br>';}
                if($aw7>0){echo '五獎'.$aw7.'張<br>';}
                if($aw8>0){echo '六獎'.$aw8.'張<br>';}
                if($aw9>0){echo '增開六獎'.$aw9.'張';}
                echo "<p>合計：".$bonus."元</p>";
            }
            
?>
</div>
<script>
    function sub(){
        document.querySelector('form').submit();
    }
</script>