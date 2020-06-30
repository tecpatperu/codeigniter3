<?php
class Excel_export_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }







 public function Obtener_Datos_Empresa($año,$trib,$anual)
 {
   // $this->db->like('AC_ACTIVO_DES', $id, 'both'); 


   $abe=$this->db->query('AF_RPT_S_ACTIVOS_FIJOS_FORMATO_7_1',$año,$trib,$anual)->result_array();
  
   $r= $this->db->query("select * from dbo.TAB_SUNAT_AF ")->result_array();

    return $r;
 }

 public function Obtener_Nombre_Empresa()
 {
   // $this->db->like('AC_ACTIVO_DES', $id, 'both'); 


   $abe=$this->db->query('ADM_SP_S_COMPANY')->result_array();
  

    return $abe;
 }

 
 
}

