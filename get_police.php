<?php
    include "./connection/db.php";
    if(isset($_GET['id'])){
       $id=$_GET['id'];
       if(!empty($id)){
        $sql="select police_stn_t.police_st_code,police_stn_t.police_st_name from police_stn_t where police_stn_t.dist_code='".$id."'";
        $data = pg_query($dbconn, $sql);
        $result = pg_fetch_all($data);
        echo json_encode($result);
       }
    }



?>