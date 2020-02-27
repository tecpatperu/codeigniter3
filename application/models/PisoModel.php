<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class PisoModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($piso){
        $this->db->trans_start();
            $this->db->insert('AF_MA_PISO',$piso); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_PISO'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 SE_ID FROM AF_MA_PISO ORDER BY SE_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $piso = $query->result();
          $next_id = $piso[0]->SE_ID + 1;
        }
        return $next_id;
    }

    public function getPisos(){
        $sql = $this->db->get('AF_MA_PISO'); 
        return $sql->result();
    }
    public function getPaginatePiso($limit,$offset){
        $sql = $this->db->get('AF_MA_PISO',$limit,$offset);
        return $sql->result();
    }
    public function updatePiso($id,$data){
        $this->db->where('SE_ID',$id);
        $this->db->update('AF_MA_PISO',$data);
    }
    public function getPiso($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $piso = $this->db->get_where('AF_MA_PISO',array('AF_MA_PISO.SE_ID' => $id),1);
        
        return $piso->row_array();
    }
    public function deletepiso($id){
        $this->db->where('SE_ID',$id);
        $this->db->delete('AF_MA_PISO');
    }
}