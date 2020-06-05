<?php
    include 'DBC.php';
    if(is_array($_POST['id'])){
        foreach($_POST['id'] as $key => $value){
            $data = [
                'id' => $value,
                'number' => $_POST['number'][$key],
            ];
            echo save('award_number',$data);
        }
    }else{
        $data = [
            'id'=>$_POST['id'],
            'number'=>$_POST['number'],
        ];
        print_r($data);
        echo save('award_number',$data);
    }
    to('invoice.php');
?>