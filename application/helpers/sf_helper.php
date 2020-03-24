<?php


function get_combo($tbl,$id,$nm,$add_opt,$nm2=''){

$ci = &get_instance();
$data = $ci->db->get($tbl)->result_array();
$res = array();
$res = $add_opt;

foreach ($data as $v) {
if(empty($nm2)){
	$res[$v[$id]]  =  $v[$nm];
}else{
	$res[$v[$id]]  =  $v[$nm].'-'. $v[$nm2];
}


}


return $res;


}






 