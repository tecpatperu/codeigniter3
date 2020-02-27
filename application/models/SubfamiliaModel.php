<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class SubfamiliaModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($subfamilia){
        $this->db->trans_start();
            $this->db->insert('AF_MA_SUB_FAMILIA',$subfamilia); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_SUB_FAMILIA'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 LO_ID FROM AF_MA_SUB_FAMILIA ORDER BY convert(INT,LO_ID)  DESC ');
        if ($query->num_rows() > 0)
        {
          $subfamilia = $query->result();
          $next_id = $subfamilia[0]->LO_ID + 1;
        }
        return $next_id;
    }

    public function getSubfamilias(){
        $sql = $this->db->query('AF_SP_S_SUB_FAMILIA'); 
        return $sql->result();
    }
    public function getPaginateSubfamilia($limit,$offset){
        $sql = $this->db->query("SELECT A.LO_IDFAMILIA [Codigo.Familia],b.PRO_DESCRIPCION [Familia],a.LO_ID [Codigo.Sub.Familia],a.LO_DESCRIPCION [Descripción],a.LO_ABRE [Descripción.Abreviada],(CASE WHEN a.LO_ESTADO = 1 THEN 'ACTIVO' ELSE 'INACTIVO' END) AS [Estado],convert(VARCHAR,a.LO_FECREG,103) [Creado],convert(VARCHAR,a.LO_FECMOD,103) [Modificado],a.LO_TIEMPO_VIDA,a.LO_TASA_ANUAL,a.LO_TASA_MENSUAL,a.LO_REFERENCIA FROM AF_MA_SUB_FAMILIA A LEFT JOIN AF_MA_FAMILIA_GP B ON A.LO_IDFAMILIA = B.PRO_ID ORDER  BY convert(INT,A.LO_ID) OFFSET ".$offset. " ROWS FETCH NEXT ".$limit." ROWS ONLY");
        return $sql->result();
    }
    public function updatesubfamilia($id,$data){
        $this->db->where('LO_ID',$id);
        $this->db->update('AF_MA_SUB_FAMILIA',$data);
    }
    public function getSubfamilia($id){

        $this->db->select('AF_MA_SUB_FAMILIA.LO_ID,AF_MA_SUB_FAMILIA.LO_DESCRIPCION,AF_MA_SUB_FAMILIA.LO_ABRE,AF_MA_SUB_FAMILIA.LO_IDFAMILIA,AF_MA_FAMILIA_GP.PRO_DESCRIPCION as DESC_FAMILIA, AF_MA_SUB_FAMILIA.LO_TERMINAL,AF_MA_SUB_FAMILIA.LO_USUARIO,AF_MA_SUB_FAMILIA.LO_FECREG,AF_MA_SUB_FAMILIA.LO_FECMOD,AF_MA_SUB_FAMILIA.LO_ESTADO');
        $this->db->from('AF_MA_SUB_FAMILIA');
        $this->db->join('AF_MA_FAMILIA_GP','AF_MA_SUB_FAMILIA.LO_IDFAMILIA = AF_MA_FAMILIA_GP.PRO_ID','left');
        $this->db->where('LO_ID',$id);
        $familia=$this->db->get();
        return  $familia->row_array();
    }
    public function deletesubfamilia($id){
        $this->db->where('LO_ID',$id);
        $this->db->delete('AF_MA_SUB_FAMILIA');
    }
}