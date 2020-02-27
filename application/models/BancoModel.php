<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class BancoModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($banco){
        $this->db->trans_start();
            $this->db->insert('AF_MA_BANCO',$banco); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_BANCO'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 BA_ID FROM AF_MA_BANCO ORDER BY BA_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $banco = $query->result();
          $next_id = $banco[0]->BA_ID + 1;
         }else{
            $next_id = 1;
        }
        return $next_id;
    }

    public function getBancos(){
        $sql = $this->db->get('AF_MA_BANCO'); 
        return $sql->result();
    }
    public function getPaginateBanco($limit,$offset){
        $sql = $this->db->get('AF_MA_BANCO',$limit,$offset);
        return $sql->result();
    }
    public function updatebanco($id,$data){
        $this->db->where('BA_ID',$id);
        $this->db->update('AF_MA_BANCO',$data);
    }
    public function getBanco($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $banco = $this->db->get_where('AF_MA_BANCO',array('AF_MA_BANCO.BA_ID' => $id),1);
        
        return $banco->row_array();
    }
    public function deletebanco($id){
        $this->db->where('BA_ID',$id);
        $this->db->delete('AF_MA_BANCO');
    }
}