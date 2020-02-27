<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class ImportarmaestroModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
      
  

 public function insertsede($data)
 {
      
  $this->db->query('AF_SP_D_SEDE_IMPORTACION');
  $this->db->insert_batch('AF_MA_SEDE', $data);
 }
 public function insertlocal($data)
 {
      
  $this->db->query('AF_SP_D_LOCAL_IMPORTACION');
  $this->db->insert_batch('AF_MA_LOCAL', $data);
 }     
    
 public function insertarea($data)
 {
      
  $this->db->query('AF_SP_D_AREA_IMPORTACION');
  $this->db->insert_batch('AF_MA_AREA', $data);
 }  
  public function insertoficina($data)
 {
      
  $this->db->query('AF_SP_D_OFICINA_IMPORTACION');
  $this->db->insert_batch('AF_MA_OFICINA', $data);
 }  
  public function insertfamilia($data)
 {
      
  $this->db->query('AF_SP_D_FAMILIA_GP_IMPORTACION');
  $this->db->insert_batch('AF_MA_FAMILIA_GP', $data);
 }  
  public function insertsubfamilia($data)
 {
      
  $this->db->query('AF_SP_D_SUB_FAMILIA_IMPORTACION');
  $this->db->insert_batch('AF_MA_SUB_FAMILIA', $data);
 }  
  public function insertcuentacontable($data)
 {
      
  $this->db->query('AF_SP_D_CUENTA_CONTABLE_IMPORTACION');
  $this->db->insert_batch('AF_MA_CUENTA_CONTABLE', $data);
 }  
  public function insertcentrocosto($data)
 {
      
  $this->db->query('AF_SP_D_CENCOS_IMPORTACION');
  $this->db->insert_batch('AF_MA_CENCOS', $data);
 }  
  public function insertcontrato($data)
 {
      
  $this->db->query('AF_SP_D_CONTRATO_IMPORTACION');
  $this->db->insert_batch('AF_MA_CONTRATO', $data);
 }  
  public function insertresponsable($data)
 {
      
  $this->db->query('AF_SP_D_RESPO_ACTI_IMPORTACION');
  $this->db->insert_batch('AF_MA_RESPO_ACTI', $data);
 }  
  public function insertbien($data,$actualiza_inicio_operacion)
 {
      
 $lista=""; 
  $this->db->query('AF_SP_O_DEL_DEPRE');
 
foreach($data as $jugador){
      

    $this->db->query("AF_SP_I_ACTIVO '".$jugador['AC_CODIGO']."','".$jugador['AC_CODIGO_ALT']."','".$jugador['AC_CODIGO_BARRA']."','".$jugador['AC_ACTIVO_DES']."','".$jugador['AC_TIPO_BIEN']."','".$jugador['AC_IDORIGEN_REQ']."','".$jugador['AC_COMPONENTE_DE']."','".$jugador['AC_CODIGO_PRINCIPAL']."','".$jugador['AC_IDFAMILIA']."','".$jugador['AC_SUBFAMILIA']."','".$jugador['AC_TASA_DEPREC_FAMILIA']."','".$jugador['AC_IDSEDE']."','".$jugador['AC_IDLOCAL']."','".$jugador['AC_IDAREA']."','".$jugador['AC_IDOFICINA']."','".$jugador['AC_IDRESPON_ACTI']."','".$jugador['AC_IDMARCA']."','".$jugador['AC_MODELO']."','".$jugador['AC_NUMSERIE']."','".$jugador['AC_IDCOLOR']."','".$jugador['AC_IDESTADO_FISICO']."','".$jugador['AC_IDCONDIBIEN']."','".$jugador['AC_IDPROCEDENCIA']."','".$jugador['AC_OBSERVACIONES']."','".$jugador['AC_TDOC']."','".$jugador['AC_SDOC']."','".$jugador['AC_NDOC']."','".$jugador['AC_IDPROVE']."','".$jugador['AC_FECHA_COMPRA']."','".$jugador['AC_FECHA_INI_OPE']."','".$jugador['AC_GUIA_REMISION']."','".$jugador['AC_NUM_DUA']."','".$jugador['AC_IDCENCOS']."','".$jugador['AC_IDCUENTA_CONTABLE']."','".$jugador['AC_TASA_DEPREC_CONTABLE']."','".$jugador['AC_MONEDACOMPRA']."','".$jugador['AC_NUM_VOUCHER']."','".$jugador['AC_TC_VOUCHER']."','".$jugador['AC_VH_SOLES']."','".$jugador['AC_VH_DOLARES']."','".$jugador['AC_TC_CONTABLE']."','".$jugador['AC_DEPREC_EJERCICIO_CONTABLE']."','".$jugador['AC_DEPREC_ACUMULADA_CONTABLE']."','".$jugador['AC_VALOR_LIBRO_CONTABLE']."','".$jugador['AC_TIEMPO_VIDA']."','".$jugador['AC_DEPREC_INDIVIDUAL']."','".$jugador['AC_TASA_DEPREC_INDIVIDUAL']."','".$jugador['AC_REFERENCIA_FINANCIERA']."','".$jugador['AC_DEPREC_EJERCICIO_FINANCIERA']."','".$jugador['AC_DEPREC_ACUMULADA_FINANCIERA']."','".$jugador['AC_NUMPLACA']."','".$jugador['AC_ANIO_OTROS']."','".$jugador['AC_CHASIS']."','".$jugador['AC_NUMMOTOR ']."','".$jugador['AC_DIFCAMBIO_ACTIVO_OTROS']."','".$jugador['AC_DIFCAMBIO_DEPREC_OTROS']."','".$jugador['AC_REVALUACION_ACTIVO_OTROS']."','".$jugador['AC_REVALUACION_DEPREC_OTROS']."','".$jugador['AC_FOTO']."','".$jugador['AC_USUARIO']."','".$jugador['AC_TERMINAL']."','".$jugador['AC_ESTADO']."','".$jugador['AC_CODPROYECTO']."','".$jugador['AC_DIFCAMBIO_DEPREC_FINANCIERO_OTROS']."','".$jugador['AC_REVALUACION_DEPREC_FINANCIERO_OTROS']."','".$jugador['AC_FLAG_ESTADO_INVENTARIO']."','".$jugador['AC_DIMENSION']."','".$jugador['AC_EDIFICIO']."','".$jugador['AC_PISO']."','".$jugador['AC_SUPERVISOR']."','".$jugador['AC_USUARIO_UBICACION']."','".$jugador['AC_FLAG_DEPRECIA']."','".$jugador['AC_FLAG_ACTIVO_INCORPORACION'] ."',null,null");
   
   }
 foreach($actualiza_inicio_operacion as $actualiza){
       
 $this->db->query("AF_SP_U_CONFIGURACION_GENERAL_IMPORTACION '".$actualiza['prefijo']."','".date("Y-m-d",strtotime($actualiza['fecha_inicio_oper']))."','".$actualiza['terminal']."','".$actualiza['usuario']."'");
   
   }
 
    $this->db->query('AF_SP_U_ACTIVO_TASA_DEPREC_TRIBUTARIA');
    $array = $this->db->query("AF_SP_S_ACTIVO04 '".date("Y-m-d",strtotime($actualiza['fecha_inicio_oper']))."'");

  
    foreach ($array->result() as $valor) {
        if ($actualiza['actualiza_depreciacion']){

       
          $php_date  = date_create(  $actualiza['fecha_inicio_oper'] );
           $this->db->query("AF_SP_O_CAL_DEPRECI '".$valor->AC_IDACTIVO."','".$actualiza['usuario']."','".$actualiza['terminal']."','".date_format($php_date,"Y")."','".date_format($php_date,"m")."'");



        }
    }
    foreach ($array->result()  as $valor) {
   
           
  
          $php_date = date_create(  $actualiza['fecha_inicio_oper'] );
      
  
        
           $this->db->query("AF_SP_I_MOVIMIENTOS_ACTIVOS_INICIO '".$valor->AC_IDACTIVO."','".$actualiza['usuario']."','".$actualiza['terminal']."','". date_format($php_date,"Y")."','". date_format($php_date,"m")."'");
         
    }
   
 }  
  public function insertedificio($data)
 {
      
  $this->db->query('AF_SP_D_EDIFICIO_IMPORTACION');
  $this->db->insert_batch('AF_MA_EDIFICIO', $data);
 }  
  public function insertpiso($data)
 {
      
  $this->db->query('AF_SP_D_PISO_IMPORTACION');
  $this->db->insert_batch('AF_MA_PISO', $data);
 }  
  

}