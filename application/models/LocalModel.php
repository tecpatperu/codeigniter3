<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class LocalModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($local){
        $this->db->trans_start();
            $this->db->insert('AF_MA_LOCAL',$local); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_LOCAL'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 LO_ID FROM AF_MA_LOCAL ORDER BY CAST(LO_ID as BIGINT) DESC ');
        if ($query->num_rows() > 0)
        {
          $tipodocumento = $query->result();
          $next_id = $tipodocumento[0]->LO_ID + 1;
        }else{
            $next_id = 1;
        }
    return $next_id;
    }

    public function getLocalesxsedes($idsede){
	 
    $sql = $this->db->query("SELECT LO_ID as 'Codigo.Local', LO_DESCRIPCION as 'Descripción' , LO_ESTADO as 'Estado' FROM AF_MA_LOCAL where LO_IDSEDE= ". $idsede." ORDER BY CAST(LO_ID as BIGINT) DESC ");
    //$sql = $this->db->query('AF_SP_S_LOCAL'); 
    return $sql->result();
    }
    public function getLocales(){
     
    $sql = $this->db->query("SELECT LO_ID as 'Codigo.Local', LO_DESCRIPCION as 'Descripción' , LO_ESTADO as 'Estado' FROM AF_MA_LOCAL  ORDER BY CAST(LO_ID as BIGINT) DESC ");
    //$sql = $this->db->query('AF_SP_S_LOCAL'); 
    return $sql->result();
    }
    public function getPaginateLocal($limit,$offset){
		$this->db->order_by( 'CAST(Codigo.Local as BIGINT)','DESC'); 
        $sql = $this->db->query('AF_SP_S_LOCAL',$limit,$offset);
        return $sql->result();
    }
    public function updatelocal($id,$data){
        $this->db->where('LO_ID',$id);
        $this->db->update('AF_MA_LOCAL',$data);
    }
    public function getLocal($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
    //    $local = $this->db->get_where('AF_MA_LOCAL',array('AF_MA_LOCAL.LO_ID' => $id),1);
        
$this->db->select('AF_MA_LOCAL.LO_ID,AF_MA_LOCAL.LO_DESCRIPCION,AF_MA_LOCAL.LO_ABRE,AF_MA_LOCAL.LO_IDSEDE,AF_MA_SEDE.SE_DESCRIPCION,
AF_MA_LOCAL.LO_TERMINAL,AF_MA_LOCAL.LO_USUARIO,AF_MA_LOCAL.LO_FECREG,AF_MA_LOCAL.LO_FECMOD,AF_MA_LOCAL.LO_ESTADO');
$this->db->from('AF_MA_LOCAL');
$this->db->join('AF_MA_SEDE','AF_MA_LOCAL.LO_IDSEDE = AF_MA_SEDE.SE_ID');
$this->db->where('LO_ID',$id);
$local=$this->db->get();
return  $local->row_array();

      //  return $local->row_array();
    }
    public function deletelocal($id){
        $this->db->where('LO_ID',$id);
        $this->db->delete('AF_SP_S_LOCAL');
    }
}