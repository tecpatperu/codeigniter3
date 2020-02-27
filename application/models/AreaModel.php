<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class AreaModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($area){
        $this->db->trans_start();
            $this->db->insert('AF_MA_AREA',$area); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_AREA'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 AR_ID FROM AF_MA_AREA ORDER BY  CAST(AR_ID as BIGINT) DESC ');
        if ($query->num_rows() > 0)
        {
          $area = $query->result();
          $next_id = $area[0]->AR_ID + 1;
        }else{
            $next_id = 1;
        }
        return $next_id;
    }

    public function getAreas(){
        $sql = $this->db->query('AF_SP_S_AREA'); 
        return $sql->result();
    }
    public function getPaginateArea($limit,$offset){
        $sql = $this->db->query('AF_SP_S_AREA',$limit,$offset);
        return $sql->result();
    }
    public function updatearea($id,$data){
        $this->db->where('AR_ID',$id);
        $this->db->update('AF_MA_AREA',$data);
    }
    public function getArea($id){
         
        $this->db->select('AF_MA_AREA.AR_ID,AF_MA_AREA.AR_DESCRIPCION,AF_MA_AREA.AR_ESTADO,AF_MA_AREA.AR_IDSEDE,AF_MA_AREA.AR_IDLOCAL,AF_MA_AREA.AR_ABREVI,AF_MA_AREA.AR_USUARIO,AF_MA_AREA.AR_TERMINAL,AF_MA_AREA.AR_FECREG,AF_MA_AREA.AR_FECMOD,AF_MA_AREA.AR_IDEDIFICIO,AF_MA_EDIFICIO.SE_DESCRIPCION as DESC_EDIFICIO,AF_MA_AREA.AR_IDPISO,AF_MA_PISO.SE_DESCRIPCION AS DESC_PISO,AF_MA_AREA.AR_CODIGO');
        $this->db->from('AF_MA_AREA');
        $this->db->join('AF_MA_EDIFICIO','AF_MA_AREA.AR_IDEDIFICIO = AF_MA_EDIFICIO.SE_ID','left');
        $this->db->join('AF_MA_PISO','AF_MA_AREA.AR_IDPISO = AF_MA_PISO.SE_ID','left');
        $this->db->where('AR_ID',$id);
        $area=$this->db->get();

        return  $area->row_array();
    }
    public function deletearea($id){
        $this->db->where('AR_ID',$id);
        $this->db->delete('AF_MA_AREA');
    }
}
