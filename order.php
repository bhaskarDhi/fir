<?php
 include "./connection/db.php";

 if(isset($_GET['cino'])){
    $cino=$_GET['cino'];

    if(!empty($cino)){
      


        $sql="SELECT order_details.court_no,order_details.judge_code,case_type_t.type_name,order_details.order_dt,civil_t.res_name,civil_t.reg_no,civil_t.reg_year from order_details join civil_t on civil_t.cino =order_details.cino join case_type_t on  civil_t.regcase_type=case_type_t.case_type   where order_details.cino='".$cino."' ORDER BY order_details.order_dt asc";
        $data= pg_query($dbconn, $sql);
        $result=pg_fetch_all($data);
       if(!empty($result)){
        $jdata[0] = [
            'court_no'=>'',
            'judge_code'=>'',
            'judge_name'=>'',
            "type_name"=>'',
            'order_dt'=>'',
            'res_name'=>'',
            'reg_no'=>'',
            'reg_year'=>''
        ];
        $j = 0;
        for($i=0;$i<count($result);$i++){
            $sql_judge="SELECT jn.judge_name FROM judge_name_t AS jn,judge_t AS j WHERE jn.judge_code='".$result[$i]['judge_code']."' AND j.court_no='".$result[$i]['court_no']."' ORDER BY j.judge_priority";
            //echo $sql_judge;

            $data_judge=pg_query($dbconn, $sql_judge);
            $result1=pg_fetch_all($data_judge);
            $judgeName = "";

            for($k=0;$k<count($result1);$k++){
                $judgeName = $result1[$k]['judge_name'];
            }
            $jdata[$j] = [
                'court_no'=>$result[$i]['court_no'],
                'judge_code'=>$result[$i]['judge_code'],
                "type_name"=>$result[$i]['type_name'],
                'order_dt'=>$result[$i]['order_dt'],
                'res_name'=>$result[$i]['res_name'],
                'reg_no'=>$result[$i]['reg_no'],
                'reg_year'=>$result[$i]['reg_year'],
                'judge_name'=>$judgeName
            ];
            $j++;
        }


        echo json_encode($jdata);

       }else{   
        $sql="SELECT order_details_a.court_no,order_details_a.judge_code,case_type_t.type_name,order_details_a.order_dt,civil_t_a.res_name,civil_t_a.reg_no,civil_t_a.reg_year from order_details_a join civil_t_a on civil_t_a.cino =order_details_a.cino join case_type_t on  civil_t_a.regcase_type=case_type_t.case_type   where order_details_a.cino='".$cino."' ORDER BY order_details_a.order_dt asc";
        $data= pg_query($dbconn, $sql);
        $result=pg_fetch_all($data);
       
        $jdata[0] = [
            'court_no'=>'',
            'judge_code'=>'',
            'judge_name'=>'',
            "type_name"=>'',
            'order_dt'=>'',
            'res_name'=>'',
            'reg_no'=>'',
            'reg_year'=>''
        ];
        $j = 0;
        for($i=0;$i<count($result);$i++){
            $sql_judge="SELECT jn.judge_name FROM judge_name_t AS jn,judge_t AS j WHERE jn.judge_code='".$result[$i]['judge_code']."' AND j.court_no='".$result[$i]['court_no']."' ORDER BY j.judge_priority";
            //echo $sql_judge;

            $data_judge=pg_query($dbconn, $sql_judge);
            $result1=pg_fetch_all($data_judge);
            $judgeName = "";

            for($k=0;$k<count($result1);$k++){
                $judgeName = $result1[$k]['judge_name'];
            }
            $jdata[$j] = [
                'court_no'=>$result[$i]['court_no'],
                'judge_code'=>$result[$i]['judge_code'],
                "type_name"=>$result[$i]['type_name'],
                'order_dt'=>$result[$i]['order_dt'],
                'res_name'=>$result[$i]['res_name'],
                'reg_no'=>$result[$i]['reg_no'],
                'reg_year'=>$result[$i]['reg_year'],
                'judge_name'=>$judgeName
            ];
            $j++;
        }


        echo json_encode($jdata);
       }
       
    }
 }

 ?>
