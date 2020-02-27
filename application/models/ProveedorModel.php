<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class ProveedorModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($Proveedor){
        $this->db->trans_start();
            $this->db->insert('AF_MA_PROVEEDOR',$Proveedor); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_PROVEEDOR'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 PRO_ID FROM AF_MA_PROVEEDOR ORDER BY PRO_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $Proveedor = $query->result();
          $next_id = $Proveedor[0]->PRO_ID + 1;
        }else
        {
            $next_id = 1;
        }
        return $next_id;
    }

    public function getProveedores(){
        $sql = $this->db->query('AF_SP_S_PROVEEDOR'); 
        return $sql->result();
    }
    public function getPaginateProveedor($limit,$offset){
        $sql = $this->db->query('AF_SP_S_PROVEEDOR',$limit,$offset);
        return $sql->result();
    }
    public function updateProveedor($id,$data){
       
        $this->db->where('PRO_ID',$id);
        $this->db->update('AF_MA_PROVEEDOR',$data);
    }
    public function getProveedor($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $Proveedor = $this->db->get_where('AF_MA_PROVEEDOR',array('AF_MA_PROVEEDOR.PRO_ID' => $id),1);
        
        return $Proveedor->row_array();
    }
    public function deleteProveedor($id){
        $this->db->where('PRO_ID',$id);
        $this->db->delete('AF_MA_PROVEEDOR');
    }
}