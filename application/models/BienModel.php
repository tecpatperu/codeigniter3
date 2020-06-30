<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class BienModel extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
       public function save($bien){
        $this->db->trans_start();

            $this->db->insert('AF_MA_ACTIVO',$bien); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
    
        $query = $this->db->query('AF_SP_S_ULT_ACTIVO');
        if ($query->num_rows() > 0)
        {
          $bien = $query->result();
          $next_id = $bien[0]->CORRELATIVO ;
        }else{
            $next_id = 1;
        }
        return $next_id;
    }

    public function getBienes(){
        $sql = $this->db->query("SELECT a.AC_IDACTIVO [Id],a.AC_CODIGO [Codigo],isnull(a.AC_CODIGO_ALT,'') [Ficha],
isnull(a.AC_CODIGO_BARRA,'') [Codigo_Barra],a.AC_ACTIVO_DES [Descripcion],isnull(a.AC_COMPONENTE_DE,'0') [Componente_de],isnull(a.AC_CODIGO_PRINCIPAL,'') [Codigo_Principal],isnull(a.AC_MODELO,'') [Modelo],isnull(a.AC_NUMSERIE,'') [Serie],isnull(a.AC_ESTADO,0) [Estado]
FROM DBO.AF_MA_ACTIVO  a "); 
        return $sql->result();
    }
    public function getPaginateBien($limit,$offset){
        $sql = $this->db->query("SELECT a.AC_IDACTIVO [Id],a.AC_CODIGO [Codigo],isnull(a.AC_CODIGO_ALT,'') [Ficha],
isnull(a.AC_CODIGO_BARRA,'') [Codigo_Barra],a.AC_ACTIVO_DES [Descripcion],isnull(a.AC_COMPONENTE_DE,'0') [Componente_de],isnull(a.AC_CODIGO_PRINCIPAL,'') [Codigo_Principal],isnull(a.AC_MODELO,'') [Modelo],isnull(a.AC_NUMSERIE,'') [Serie],isnull(a.AC_ESTADO,0) [Estado]
FROM DBO.AF_MA_ACTIVO  a order by a.AC_IDACTIVO  OFFSET ".$offset. " ROWS FETCH NEXT ".$limit." ROWS ONLY ");
                        //where AC_IDACTIVO = '8639'
        return $sql->result();
    }

    public function getBienTemporal($buscar){
      $sql = $this->db->query("SELECT a.AC_IDACTIVO [Id],a.AC_CODIGO [Codigo],isnull(a.AC_CODIGO_ALT,'') [Ficha],
isnull(a.AC_CODIGO_BARRA,'') [Codigo_Barra],a.AC_ACTIVO_DES [Descripcion],isnull(a.AC_COMPONENTE_DE,'0') [Componente_de],isnull(a.AC_CODIGO_PRINCIPAL,'') [Codigo_Principal],isnull(a.AC_MODELO,'') [Modelo],isnull(a.AC_NUMSERIE,'') [Serie],isnull(a.AC_ESTADO,0) [Estado]
FROM DBO.AF_MA_ACTIVO  a where a.AC_ACTIVO_DES like '%". $buscar . "%' order by a.AC_IDACTIVO");
     
      return $sql->result_array();
  }
    public function updateBien($id,$data){
        $this->db->where('AC_IDACTIVO',$id);
        $this->db->update('AF_MA_ACTIVO',$data);

         
    }
    public function getBien($id){
  

$this->db->select('AC_IDACTIVO,AC_CODIGO,AC_CODIGO_ALT,AC_ACTIVO_DES,AC_IDFAMILIA,AC_FECHA_COMPRA,AC_FECHA_INI_OPE,AC_IDGRUPO,AC_IDSUB_GRUPO,AC_IDMARCA,AC_MODELO,AC_NUMSERIE,AC_NUMPLACA,AC_IDPROVE,AC_TDOC,AC_SDOC,AC_NDOC,AC_FDOC,AC_MDOC,AC_IDMONEDA,AC_TCAM,AC_IDTIPO_PAGO,AC_IDESTADO_FISICO,AC_IDCLASE,AC_IDUSO,AC_IDNIVEL_OBS,AC_CODIGO_BARRA,AC_IDUBICACION,AC_IDCENCOS,AC_IDAREA,AC_LEA_NUM_CONTRATO,AC_LEA_FECHA_CONTRA,AC_LEA_FECHA_ARRENDA,AC_LEA_NUM_COUTAS,AC_LEA_MONTO_TOTAL,AC_ANHOS,AC_MESES,AC_OBSERVACIONES,AC_MESESGARANTIA,AC_FEC_VENCE_GARAN,AC_NUM_CONTRATO,AC_PERIODICIDAD_DIAS,AC_FEC_VENCE_CON,AC_DEPRE_INICIAL,AC_ES_TASA_PARTICULAR,AC_USUARIO,AC_TERMINAL,AC_FECREG,AC_ESTADO,AC_USUARIO_MOD,AC_TERMINAL_MOD,AC_FECREG_MOD,AC_VALOR_RESIDUAL,AC_NUM_COTIZA,AC_NUM_ORD_COMPRA,AC_AUTORIZA_ADQ,AC_IDORIGEN_REQ,AC_IDRESPON_ACTI,AC_ADICIONALES,AC_IDCOLOR,AC_IDSEDE,AC_IDLOCAL,AC_IDOFICINA,AC_IDCONDIBIEN,AC_IDPROCEDENCIA,AC_TIPO_BIEN,AC_COMPONENTE_DE,AC_CODIGO_PRINCIPAL,AC_SUBFAMILIA,AC_TASA_DEPREC_FAMILIA,AC_GUIA_REMISION,AC_NUM_DUA,AC_IDCUENTA_CONTABLE,AC_TASA_DEPREC_CONTABLE,AC_MONEDACOMPRA,AC_NUM_VOUCHER,AC_TC_VOUCHER,AC_VH_SOLES,AC_VH_DOLARES,AC_DEPREC_EJERCICIO_CONTABLE,AC_DEPREC_ACUMULADA_CONTABLE,AC_VALOR_LIBRO_CONTABLE,AC_TIEMPO_VIDA,AC_DEPREC_INDIVIDUAL,AC_TASA_DEPREC_INDIVIDUAL,AC_REFERENCIA_FINANCIERA,AC_DEPREC_EJERCICIO_FINANCIERA,AC_DEPREC_ACUMULADA_FINANCIERA,AC_ANIO_OTROS,AC_CHASIS,AC_NUMMOTOR,AC_DIFCAMBIO_ACTIVO_OTROS,AC_DIFCAMBIO_DEPREC_OTROS,AC_REVALUACION_ACTIVO_OTROS,AC_REVALUACION_DEPREC_OTROS,AC_FOTO,AC_TC_CONTABLE,AC_CODPROYECTO,AC_MEJORAS,AC_AJUSTES_LIBRO_CARGO,AC_AJUSTES_LIBRO_ABONO,AC_AJUSTES_DEPREC_TRIBUTARIO_CARGO,AC_AJUSTES_DEPREC_TRIBUTARIO_ABONO,AC_AJUSTES_DEPREC_FINANCIERO_CARGO,AC_AJUSTES_DEPREC_FINANCIERO_ABONO,AC_REVALUACION_DEPREC_FINANCIERO_OTROS,AC_DIFCAMBIO_DEPREC_FINANCIERO_OTROS,AC_NUM_MESES_DEPREC,AC_NUM_MESES_DEPREC_FINANCIERO,AC_FLAG_ESTADO_INVENTARIO,AC_DEPREC_INICIAL_TRIBUTARIO,AC_DEPREC_INICIAL_FINANCIERO,AC_DIMENSION,AC_EDIFICIO,AC_PISO,AC_SUPERVISOR,AC_USUARIO_UBICACION,AC_FLAG_DEPRECIA,AC_FLAG_ACTIVO_INCORPORACION,AC_SERIE_GUIA_REMISION,PRO_DESCRIPCION as desc_familia,a.LO_DESCRIPCION as desc_subfamilia,d.SE_DESCRIPCION as desc_sede,b.LO_DESCRIPCION as desc_local,AR_DESCRIPCION as desc_area,OF_DESCRIPCION as desc_oficina,c.SE_DESCRIPCION as desc_edificio,e.SE_DESCRIPCION as desc_piso,f.RA_DESCRIPCION as des_respon_acti,g.RA_DESCRIPCION as des_supervisor,h.RA_DESCRIPCION as des_usuario');
$this->db->from('AF_MA_ACTIVO');
$this->db->join('AF_MA_FAMILIA_GP','AF_MA_ACTIVO.AC_IDFAMILIA = AF_MA_FAMILIA_GP.PRO_ID','left');
$this->db->join('AF_MA_SUB_FAMILIA as a','AF_MA_ACTIVO.AC_SUBFAMILIA = a.LO_ID','left');
$this->db->join('AF_MA_SEDE as d','AF_MA_ACTIVO.AC_IDSEDE = d.SE_ID','left');
$this->db->join('AF_MA_LOCAL as b','AF_MA_ACTIVO.AC_IDLOCAL = b.LO_ID','left');
$this->db->join('AF_MA_AREA ','AF_MA_ACTIVO.AC_IDAREA = AF_MA_AREA.AR_ID','left');


$this->db->join('AF_MA_OFICINA ','AF_MA_ACTIVO.AC_IDOFICINA = AF_MA_OFICINA.OF_ID','left');

$this->db->join('AF_MA_EDIFICIO as c ','AF_MA_ACTIVO.AC_EDIFICIO = c.SE_ID','left');
// aca


$this->db->join('AF_MA_PISO as e','AF_MA_ACTIVO.AC_PISO = e.SE_ID','left');

$this->db->join('AF_MA_RESPO_ACTI  as f','AF_MA_ACTIVO.AC_IDRESPON_ACTI = f.RA_ID','left');

$this->db->join('AF_MA_RESPO_ACTI as g ','AF_MA_ACTIVO.AC_IDRESPON_ACTI = g.RA_ID','left');

$this->db->join('AF_MA_RESPO_ACTI as h ','AF_MA_ACTIVO.AC_IDRESPON_ACTI = h.RA_ID','left');

$this->db->where('AC_IDACTIVO',$id);

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

    public function get_sede_data_model($texto)
    {
       $this->db->like('SE_DESCRIPCION', $texto, 'both'); 
     return   $this->db->get('AF_MA_SEDE')->result_array();
    
    }

    public function get_local_data_model($id)
    {
       $this->db->like('LO_IDSEDE', $id, 'both'); 
     return   $this->db->get('AF_MA_LOCAL')->result_array();
    
    }
    public function get_area_data_model($id)
    {
       $this->db->like('AR_DESCRIPCION', $id, 'both'); 
     return   $this->db->get('AF_MA_AREA')->result_array();
    
    }
    public function get_oficina_data_model($id)
    {
       $this->db->like('OF_DESCRIPCION', $id, 'both'); 
     return   $this->db->get('AF_MA_OFICINA')->result_array();
    
    }

    public function get_edificio_data_model($id)
    {
       $this->db->like('SE_DESCRIPCION', $id, 'both'); 
     return   $this->db->get('AF_MA_EDIFICIO')->result_array();
    
    }

    public function get_piso_data_model($id)
    {
       $this->db->like('SE_DESCRIPCION', $id, 'both'); 
     return   $this->db->get('AF_MA_PISO')->result_array();
    
    }
    public function get_responsable_data_model($id)
    {
       $this->db->like('RA_DESCRIPCION', $id, 'both'); 
     return   $this->db->get('AF_MA_RESPO_ACTI')->result_array();
    
    }
    public function get_proyecto_data_model($id)
    {
       $this->db->like('PY_DESCRIPCION', $id, 'both'); 
     return   $this->db->get('AF_MA_PROYECTO')->result_array();
    
    }
    public function get_contrato_data_model($id)
    {
       $this->db->like('CO_MODALIDAD', $id, 'both'); 
     return   $this->db->get('AF_MA_CONTRATO')->result_array();
    
    }
    public function get_tasa_depre_cuenta($id)
    {

        $query = $this->db->query('AF_SP_S_TASA_DEPRE_CUENTA '.$id);

        if ($query->num_rows() > 0)
        {
          $tasa = $query->result();
          $valor = $tasa[0]->AR_TASA;
        }else{
            $valor = 0;
        }
        return $valor;
    
    }
    public function get_bien_data_model($id)
    {
       $this->db->like('AC_ACTIVO_DES', $id, 'both'); 
    $this->db->select('AC_CODIGO, AC_ACTIVO_DES');
     return   $this->db->get('AF_MA_ACTIVO')->result_array();
    
    }
    public function get_mejoras_model($id)
    {
       
    

    $query = $this->db->query("SELECT B.PRO_DESCRIPCION [Tipo.Documento],A.AM_SDOC [Serie.Doc.],A.AM_NDOC [Numero.Documento],    CONVERT(VARCHAR,A.AM_FDOC,103) [Fecha.Mejora],    a.AM_IDMONEDA [Moneda.Mejora],a.AM_MDOC [Monto.Mejora],a.AM_TCAM [T.Cambio.Mejora],a.AM_OBS [Observaciones]     FROM dbo.AF_PR_ACTIVO_MEJORA A INNER JOIN DBO.AF_MA_TIPO_DOCUMENTO B ON A.AM_TDOC=B.PRO_ID  WHERE A.AM_IDACTIVO=".$id." ORDER BY A.AM_SEC");

     return   $query->result_array();
    
    }

    public function get_ajustes_model($id)
    {
      $query = $this->db->query("SELECT AM_SEC [ITEM], AM_IDACTIVO [CODIGO_INTERNO], AM_CODIGO_ACTIVO [CODIGO],B.AC_ACTIVO_DES [DESCRIPCION], AM_VALOR_LIBRO [VALOR_LIBRO], AM_TIPO_AJUSTE_VL [OPT_AJUSTE_LIBRO], AM_AJUSTE_VALOR_LIBRO [AJUSTE_LIBRO], AM_TIPO_AJUSTE_TRIBUTARIO [OPT_AJUSTE_TRIBUTARIO], AM_AJUSTE_VALOR_TRIBUTARIO [AJUSTE_TRIBUTARIO] , AM_TIPO_AJUSTE_FINANCIERO [OPT_AJUSTE_FINANCIERO], AM_AJUSTE_VALOR_FINANCIERO [AJUSTE_FINANCIERO], C.AR_ID [CUENTA_CONTABLE] FROM dbo.AF_PR_ACTIVO_AJUSTE A INNER JOIN dbo.AF_MA_ACTIVO B ON A.AM_IDACTIVO=B.AC_IDACTIVO  LEFT JOIN dbo.AF_MA_CUENTA_CONTABLE C ON B.AC_IDCUENTA_CONTABLE=C.AR_ID WHERE B.AC_IDACTIVO=".$id. " AND LEFT(A.AM_CONCEPTO_AJUSTE,31)<>'AJUSTE POR DIFERENCIA DE CAMBIO'");

     return   $query->result_array();
    
    }

}

    