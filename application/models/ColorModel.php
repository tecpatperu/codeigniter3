<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class ColorModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($color){
        $this->db->trans_start();
            $this->db->insert('AF_MA_COLOR',$color); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_COLOR'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 CO_ID FROM AF_MA_COLOR ORDER BY CO_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $color = $query->result();
          $next_id = $color[0]->CO_ID + 1;
        }
        return $next_id;
    }

    public function getColores(){
        $sql = $this->db->get('AF_MA_COLOR'); 
        return $sql->result();
    }
    public function getPaginateColor($limit,$offset){
        $sql = $this->db->get('AF_MA_COLOR',$limit,$offset);
        return $sql->result();
    }
    public function updatecolor($id,$data){
        $this->db->where('CO_ID',$id);
        $this->db->update('AF_MA_COLOR',$data);
    }
    public function getColor($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $color = $this->db->get_where('AF_MA_COLOR',array('AF_MA_COLOR.CO_ID' => $id),1);
        
        return $color->row_array();
    }
    public function deletecolor($id){
        $this->db->where('CO_ID',$id);
        $this->db->delete('AF_MA_COLOR');
    }
}