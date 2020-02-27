<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class MotivobajaModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($motivobaja){
        $this->db->trans_start();
            $this->db->insert('AF_MA_MOTIVO_BAJA',$motivobaja);  
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_MOTIVO_BAJA'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 MB_ID FROM AF_MA_MOTIVO_BAJA ORDER BY CAST(MB_ID as BIGINT) DESC ');
        if ($query->num_rows() > 0)
        {
          $motivobaja = $query->result();
          $next_id = $motivobaja[0]->MB_ID + 1;
        }else{
            $next_id = 1;
        }
        return $next_id;
    }

    public function getMotivobajas(){
	    $this->db->order_by( 'CAST(MB_ID as BIGINT)','DESC'); 
        $sql = $this->db->get('AF_MA_MOTIVO_BAJA'); 
        return $sql->result();
    }
    public function getPaginateMotivobaja($limit,$offset){
		$this->db->order_by( 'CAST(MB_ID as BIGINT)','DESC'); 
        $sql = $this->db->get('AF_MA_MOTIVO_BAJA',$limit,$offset);
        return $sql->result();
    }
    public function updatemotivobaja($id,$data){
        $this->db->where('MB_ID',$id);
        $this->db->update('AF_MA_MOTIVO_BAJA',$data);
    }
    public function getMotivobaja($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $motivobaja = $this->db->get_where('AF_MA_MOTIVO_BAJA',array('AF_MA_MOTIVO_BAJA.MB_ID' => $id),1);
        
        return $motivobaja->row_array();
    }
    public function deletemotivobaja($id){
        $this->db->where('MB_ID',$id);
        $this->db->delete('AF_MA_MOTIVO_BAJA');
    }
}