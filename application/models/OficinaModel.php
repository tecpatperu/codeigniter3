<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class OficinaModel extends CI_Model {

	
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

    public function getOficinas(){
        $sql = $this->db->query("SELECT OF_IDSEDE [Codigo.Sede],B.SE_DESCRIPCION [Sede],OF_IDLOCAL [Codigo.Local],LO_DESCRIPCION [Local],OF_IDAREA [Codigo.Area],AR_DESCRIPCION[Area],OF_ID [Codigo.Oficina],OF_DESCRIPCION [Oficina],OF_ABREVI [Abreviatura.Oficina],(CASE WHEN OF_ESTADO = 1 THEN 'ACTIVO' ELSE 'INACTIVO' END) AS [Estado],CONVERT(VARCHAR,OF_FECREG,103) [Creado],CONVERT(VARCHAR,OF_FECMOD,103) [Modificado],ISNULL(A.OF_RESPONSABLE,'') [Codigo.Responsable],ISNULL(E.RA_DESCRIPCION,'') [Responsable],ISNULL(A.OF_SUPERVISOR,'') [Codigo.Supervisor],ISNULL(F.RA_DESCRIPCION,'') [Supervisor],ISNULL(A.OF_IDOFICINA,'') [Codigo.Edificio],ISNULL(G.SE_DESCRIPCION,'') [Edificio],ISNULL(A.OF_IDPISO,'') [Codigo.Piso],ISNULL(H.SE_DESCRIPCION,'') [Piso] FROM AF_MA_OFICINA A LEFT JOIN AF_MA_SEDE B ON A.OF_IDSEDE = B.SE_ID LEFT JOIN AF_MA_LOCAL C ON A.OF_IDLOCAL = C.LO_ID AND B.SE_ID=C.LO_IDSEDE LEFT JOIN AF_MA_AREA D ON A.OF_IDAREA = D.AR_ID LEFT JOIN dbo.AF_MA_RESPO_ACTI E ON A.OF_RESPONSABLE=E.RA_ID LEFT JOIN dbo.AF_MA_RESPO_ACTI F ON A.OF_SUPERVISOR=F.RA_ID LEFT JOIN dbo.AF_MA_EDIFICIO G ON A.OF_IDOFICINA=G.SE_ID LEFT JOIN dbo.AF_MA_PISO H ON A.OF_IDPISO=H.SE_ID ORDER BY convert(INT,OF_ID),convert(INT,OF_IDSEDE),convert(INT,OF_IDLOCAL),convert(INT,OF_IDAREA) "); 
        return $sql->result();
    }
    public function getPaginateOficina($limit,$offset){
        $sql = $this->db->query("SELECT OF_IDSEDE [Codigo.Sede],B.SE_DESCRIPCION [Sede],OF_IDLOCAL [Codigo.Local],LO_DESCRIPCION [Local],OF_IDAREA [Codigo.Area],AR_DESCRIPCION[Area],OF_ID [Codigo.Oficina],OF_DESCRIPCION [Oficina],OF_ABREVI [Abreviatura.Oficina],(CASE WHEN OF_ESTADO = 1 THEN 'ACTIVO' ELSE 'INACTIVO' END) AS [Estado],CONVERT(VARCHAR,OF_FECREG,103) [Creado],CONVERT(VARCHAR,OF_FECMOD,103) [Modificado],ISNULL(A.OF_RESPONSABLE,'') [Codigo.Responsable],ISNULL(E.RA_DESCRIPCION,'') [Responsable],ISNULL(A.OF_SUPERVISOR,'') [Codigo.Supervisor],ISNULL(F.RA_DESCRIPCION,'') [Supervisor],ISNULL(A.OF_IDOFICINA,'') [Codigo.Edificio],ISNULL(G.SE_DESCRIPCION,'') [Edificio],ISNULL(A.OF_IDPISO,'') [Codigo.Piso],ISNULL(H.SE_DESCRIPCION,'') [Piso] FROM AF_MA_OFICINA A LEFT JOIN AF_MA_SEDE B ON A.OF_IDSEDE = B.SE_ID LEFT JOIN AF_MA_LOCAL C ON A.OF_IDLOCAL = C.LO_ID AND B.SE_ID=C.LO_IDSEDE LEFT JOIN AF_MA_AREA D ON A.OF_IDAREA = D.AR_ID LEFT JOIN dbo.AF_MA_RESPO_ACTI E ON A.OF_RESPONSABLE=E.RA_ID LEFT JOIN dbo.AF_MA_RESPO_ACTI F ON A.OF_SUPERVISOR=F.RA_ID LEFT JOIN dbo.AF_MA_EDIFICIO G ON A.OF_IDOFICINA=G.SE_ID LEFT JOIN dbo.AF_MA_PISO H ON A.OF_IDPISO=H.SE_ID ORDER BY convert(INT,OF_ID),convert(INT,OF_IDSEDE),convert(INT,OF_IDLOCAL),convert(INT,OF_IDAREA)  OFFSET ".$offset. " ROWS FETCH NEXT ".$limit." ROWS ONLY");
        return $sql->result();
    }
    public function updateoficina($id,$data){
        $this->db->where('OF_ID',$id);
        $this->db->update('AF_MA_OFICINA',$data);
    }
    public function getOficina($id){
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
    

}