<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class BienModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($oficina){
        $this->db->trans_start();

            $this->db->insert('AF_MA_OFICINA',$oficina); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_OFICINA'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 OF_ID FROM AF_MA_OFICINA ORDER BY convert(int,OF_ID) DESC ');
        if ($query->num_rows() > 0)
        {
          $oficina = $query->result();
          $next_id = $oficina[0]->OF_ID + 1;
        }else{
            $next_id = 1;
        }
        return $next_id;
    }

    public function getBienes(){
        $sql = $this->db->query("SELECT a.AC_IDACTIVO [Id],a.AC_CODIGO [Codigo],isnull(a.AC_CODIGO_ALT,'') [Ficha],
isnull(a.AC_CODIGO_BARRA,'') [Codigo_Barra],a.AC_ACTIVO_DES [Descripcion],isnull(a.AC_COMPONENTE_DE,'0') [Componente_de],isnull(a.AC_CODIGO_PRINCIPAL,'') [Codigo_Principal],isnull(a.AC_MODELO,'') [Modelo],isnull(a.AC_NUMSERIE,'') [Serie],isnull(a.AC_ESTADO,0) [Estado]
FROM DBO.AF_MA_ACTIVO  a"); 
        return $sql->result();
    }
    public function getPaginateBien($limit,$offset){
        $sql = $this->db->query("SELECT a.AC_IDACTIVO [Id],a.AC_CODIGO [Codigo],isnull(a.AC_CODIGO_ALT,'') [Ficha],
isnull(a.AC_CODIGO_BARRA,'') [Codigo_Barra],a.AC_ACTIVO_DES [Descripcion],isnull(a.AC_COMPONENTE_DE,'0') [Componente_de],isnull(a.AC_CODIGO_PRINCIPAL,'') [Codigo_Principal],isnull(a.AC_MODELO,'') [Modelo],isnull(a.AC_NUMSERIE,'') [Serie],isnull(a.AC_ESTADO,0) [Estado]
FROM DBO.AF_MA_ACTIVO  a order by a.AC_CODIGO  OFFSET ".$offset. " ROWS FETCH NEXT ".$limit." ROWS ONLY");
        return $sql->result();
    }
    public function updateoficina($id,$data){
        $this->db->where('OF_ID',$id);
        $this->db->update('AF_MA_OFICINA',$data);
    }
    public function getBien($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
     //   $oficina = $this->db->get_where('AF_MA_OFICINA',array('AF_MA_OFICINA.OF_ID' => $id),1);
        
     //   return $oficina->row_array();

 

$this->db->select('OF_ID,OF_IDSEDE,SE_DESCRIPCION as DESC_SEDE, OF_IDLOCAL,LO_DESCRIPCION AS DESC_LOCAL, OF_IDAREA,AR_DESCRIPCION AS DESC_AREA, OF_DESCRIPCION,OF_ABREVI,OF_ESTADO,OF_USUARIO,OF_TERMINAL,OF_FECREG,OF_FECMOD,OF_IMAGEN,OF_RESPONSABLE,a.RA_DESCRIPCION,OF_SUPERVISOR,b.RA_DESCRIPCION,OF_IDOFICINA,OF_IDPISO,OF_CODIGO');
$this->db->from('AF_MA_OFICINA');
$this->db->join('AF_MA_SEDE','AF_MA_OFICINA.OF_IDSEDE = AF_MA_SEDE.SE_ID','left');
$this->db->join('AF_MA_LOCAL','AF_MA_OFICINA.OF_IDLOCAL = AF_MA_LOCAL.LO_ID','left');
$this->db->join('AF_MA_AREA','AF_MA_OFICINA.OF_IDAREA = AF_MA_AREA.AR_ID','left');
$this->db->join('AF_MA_RESPO_ACTI  as a ','AF_MA_OFICINA.OF_RESPONSABLE = a.RA_ID','left');
$this->db->join('AF_MA_RESPO_ACTI as b','AF_MA_OFICINA.OF_SUPERVISOR = b.RA_ID','left');
$this->db->where('OF_ID',$id);

$sql= $oficina=$this->db->get();
 
return  $oficina->row_array();














    }
    public function deleteoficina($id){
        $this->db->where('OF_ID',$id);
        $this->db->delete('AF_MA_OFICINA');
    }

 
    public function hexToStr($hex){
         $string='';
        for ($i=0; $i < strlen($hex)-1; $i+=2)
            $string .= chr(hexdec($hex[$i].$hex[$i+1]));
        return $string;
    }
    
    public function get_familia_data_model($texto)
    {
       $this->db->like('PRO_DESCRIPCION', $texto, 'both'); 
     return   $this->db->get('AF_MA_FAMILIA_GP')->result_array();
    
    }
    public function get_subfamilia_data_model($id)
    {

        $this->db->where('LO_IDFAMILIA',$id);
      return  $this->db->get('AF_MA_SUB_FAMILIA')->result_array();
    
   
    }
}