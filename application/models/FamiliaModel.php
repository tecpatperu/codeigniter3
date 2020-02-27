<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class FamiliaModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($familia){
        $this->db->trans_start();
            $this->db->insert('AF_MA_FAMILIA_GP',$familia); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_FAMILIA_GP'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 PRO_ID FROM AF_MA_FAMILIA_GP ORDER BY convert(INT,PRO_ID)  desc  ');
        if ($query->num_rows() > 0)
        {
          $familia = $query->result();
          $next_id = $familia[0]->PRO_ID + 1;
        }
        return $next_id;
    }

    public function getFamilias(){
		
        $sql = $this->db->query('AF_SP_S_FAMILIA_GP'); 
        return $sql->result();
    }
    public function getPaginateFamilia($limit,$offset){
		
  $sql = $this->db->query("SELECT A.PRO_ID [Codigo],A.PRO_DESCRIPCION [Descripcion], A.PRO_ABREV [Descripcion.Abreviada],CASE WHEN A.PRO_ESTADO=1 THEN 'ACTIVO' ELSE 'INACTIVO' END [Estado], CONVERT(VARCHAR,A.PRO_CREADO,103) [Creado.el], CONVERT(VARCHAR,A.PRO_MODIFICADO,103) [Modificado.el],A.PRO_CUENTA [Cuenta],B.AR_DESCRIPCION [Descripcion.Cuenta] FROM DBO.AF_MA_FAMILIA_GP A LEFT JOIN dbo.AF_MA_CUENTA_CONTABLE B ON A.PRO_CUENTA=B.AR_ID ORDER BY convert(INT,a.PRO_ID)  OFFSET ".$offset. " ROWS FETCH NEXT ".$limit." ROWS ONLY");
  
        return $sql->result();
    }
    public function updatefamilia($id,$data){
        $this->db->where('PRO_ID',$id);
        $this->db->update('AF_MA_FAMILIA_GP',$data);
    }
    public function getFamilia($id){
 
        $this->db->select('AF_MA_FAMILIA_GP.PRO_ID,AF_MA_FAMILIA_GP.PRO_DESCRIPCION,AF_MA_FAMILIA_GP.PRO_ABREV,AF_MA_FAMILIA_GP.PRO_CUENTA,AF_MA_CUENTA_CONTABLE.AR_DESCRIPCION as DESC_CUENTA, AF_MA_FAMILIA_GP.PRO_TERMINAL,AF_MA_FAMILIA_GP.PRO_USUARIO,AF_MA_FAMILIA_GP.PRO_CREADO,AF_MA_FAMILIA_GP.PRO_MODIFICADO,AF_MA_FAMILIA_GP.PRO_ESTADO');
        $this->db->from('AF_MA_FAMILIA_GP');
        $this->db->join('AF_MA_CUENTA_CONTABLE','AF_MA_FAMILIA_GP.PRO_CUENTA = AF_MA_CUENTA_CONTABLE.AR_ID','left');
        $this->db->where('PRO_ID',$id);
        $familia=$this->db->get();
        return  $familia->row_array();
    }
    public function deletefamilia($id){
        $this->db->where('PRO_ID',$id);
        $this->db->delete('AF_MA_FAMILIA_GP');
    }
}