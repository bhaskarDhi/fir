<?php
include "./connection/db.php";
if(isset($_POST['dis']) || isset($_POST['police']) || isset($_POST['fir_no']) || isset($_POST['fir_year'])){
    $dis=$_POST['dis'];
    $police=$_POST['police'];
    $fir_no=(int)$_POST['fir_no'];
    $fir_year=(int)$_POST['fir_year'];

    $sql="SELECT criminal_t.cino FROM criminal_t WHERE criminal_t.police_st_code='".$police."' AND criminal_t.fir_no='".$fir_no."' AND criminal_t.fir_year='".$fir_year."'";
    $data = pg_query($dbconn, $sql);
        $result = pg_fetch_all($data);
        if(empty($result)){
            $sql_a="SELECT criminal_t_a.cino FROM criminal_t_a WHERE criminal_t_a.police_st_code='".$police."' AND criminal_t_a.fir_no='".$fir_no."' AND criminal_t_a.fir_year='".$fir_year."'";
            $data_a = pg_query($dbconn, $sql_a);
            $result_a = pg_fetch_all($data_a);
            if(empty($result_a)){
                $msg['error']="not found";
                echo json_encode($msg);
            }else{
                for($i=0;$i<count($result);$i++){
                    $sql_case="SELECT case_type_t.type_name,civil_t_a.pet_name,civil_t_a.res_name,civil_t_a.dt_regis,civil_t_a.reg_no,civil_t_a.reg_year FROM civil_t_a JOIN case_type_t ON civil_t_a.regcase_type=case_type_t.case_type WHERE civil_t_a.cino='".$result[$i]['cino']."'";
                    $data_case= pg_query($dbconn, $sql_case);
                    $result_case[]=pg_fetch_object($data_case);
                }
                echo json_encode($result_case);
            }
        }else{
            
            for($i=0;$i<count($result);$i++){
                $sql_case="SELECT case_type_t.type_name,civil_t.pet_name,civil_t.res_name,civil_t.dt_regis,civil_t.reg_no,civil_t.reg_year FROM civil_t JOIN case_type_t ON civil_t.regcase_type=case_type_t.case_type WHERE civil_t.cino='".$result[$i]['cino']."'";
                $data_case= pg_query($dbconn, $sql_case);
                $result_case[]=pg_fetch_object($data_case);
            }

            echo json_encode($result_case);
          
        }

        

}

?>