<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class EdificioModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($edificio){
        $this->db->trans_start();
            $this->db->insert('AF_MA_EDIFICIO',$edificio); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_EDIFICIO'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 SE_ID FROM AF_MA_EDIFICIO ORDER BY SE_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $edificio = $query->result();
          $next_id = $edificio[0]->SE_ID + 1;
        }
        return $next_id;
    }

    public function getEdificios(){
        $sql = $this->db->get('AF_MA_EDIFICIO'); 
        return $sql->result();
    }
    public function getPaginateEdificio($limit,$offset){
        $sql = $this->db->get('AF_MA_EDIFICIO',$limit,$offset);
        return $sql->result();
    }
    public function updateedificio($id,$data){
        $this->db->where('SE_ID',$id);
        $this->db->update('AF_MA_EDIFICIO',$data);
    }
    public function getEdificio($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $edificio = $this->db->get_where('AF_MA_EDIFICIO',array('AF_MA_EDIFICIO.SE_ID' => $id),1);
        
        return $edificio->row_array();
    }
    public function deleteedificio($id){
        $this->db->where('SE_ID',$id);
        $this->db->delete('AF_MA_EDIFICIO');
    }
}