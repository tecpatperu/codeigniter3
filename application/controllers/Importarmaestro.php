 <?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Importarmaestro extends CI_Controller {

     public function __construct(){
        parent::__construct();
         $this->load->library('session');
        $this->load->library(array('form_validation','email','pagination'));
         
        $this->load->model('ImportarmaestroModel');
        $this->load->helper('date');
        $this->load->helper('form');
          $this->load->library('excel');

    }
    public function index($offset = 0){
       
           $dat = "";
        $this->getTemplate($this->load->view('importarmaestro',$dat,true))   ;
   }
        public function getTemplate($view){
         $data1['idscript'] = "show_sedes.js";   
        $data = array(
            'head' => $this->load->view('templates/header','',TRUE),
            'nav' => $this->load->view('templates/menu','',TRUE),
            'aside' => $this->load->view('templates/barra_sesion','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('templates/footer',$data1,TRUE),
        );
        $this->load->view('dashboard',$data);
    }

 public function import() {
$msg="";
set_time_limit(1800);
      if(isset($_FILES["file"]["name"]))  {
           $sede = $this->input->post('sede');
           $local = $this->input->post('local');
           $area = $this->input->post('area');
           $oficina = $this->input->post('oficina');
           $familia = $this->input->post('familia');
           $subfamilia = $this->input->post('subfamilia');
           $cuentacontable = $this->input->post('cuentacontable');
           $centrodecosto = $this->input->post('centrodecosto');
           $contrato = $this->input->post('contrato');
           $responsable = $this->input->post('responsable');
           $bien = $this->input->post('bien');
           $edificio = $this->input->post('edificio');
           $piso = $this->input->post('piso');
           $prefijo = $this->input->post('prefijo');
           $fec_inicio_ope = $this->input->post('FEC_INICIO_OPE');
           $fec_inicio_ope = date("d/m/Y", strtotime($fec_inicio_ope));
           $path = $_FILES["file"]["tmp_name"];
           $actualiza_depreciacion = $this->input->post('actualiza_depreciacion');
           $terminal = gethostname();
           $fecha_registro  =  date_create();
           $fecha_registro = date_format($fecha_registro,"Y-m-d H:i:s");   
 
         if (isset($this->session)){
            $usuariocrea = $this->session->userdata('CODUSUARIO');

         }else{
              $usuariocrea = NULL;  
         }
           $object = PHPExcel_IOFactory::load($path);
                foreach($object->getWorksheetIterator() as $worksheet){
                    $nombrehoja = $worksheet->getTitle();  

                    if ($sede == "1" && $nombrehoja == "sede") {

                    
                         $highestRow = $worksheet->getHighestRow();
                         $highestColumn = $worksheet->getHighestColumn();
                            for($row=2; $row<=$highestRow; $row++){
                                 $CODIGO = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 $DESCRIPCION = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                 $ABREVIATURA = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                 $datasede[] = array(
                                  'SE_ID'  => $CODIGO,
                                  'SE_DESCRIPCION'   => $DESCRIPCION,
                                  'SE_ABREVIATURA'    => $ABREVIATURA 
                                 );
                            }
                        $this->ImportarmaestroModel->insertsede($datasede); 
                        $msg = $msg . "Se importaron " . $highestRow . " sede(s)<br>";
                    }elseif ($local == "1" && $nombrehoja == "local") {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                            for($row=2; $row<=$highestRow; $row++){
                                 $CODIGOSEDE = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 $CODIGO = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                 $DESCRIPCION = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                 $ABREVIATURA = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                                 $datalocal[] = array(
                                   'LO_IDSEDE'  => $CODIGOSEDE, 
                                  'LO_ID'  => $CODIGO,
                                  'LO_DESCRIPCION'   => $DESCRIPCION,
                                  'LO_ABRE'    => $ABREVIATURA 
                                 );
                            }
                        $this->ImportarmaestroModel->insertlocal($datalocal); 
                        $msg = $msg . "Se importaron " . $highestRow . " local(es)<br>";
                    
                    }elseif ($area == "1" && $nombrehoja == "area") {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                            for($row=2; $row<=$highestRow; $row++){
                                 $AR_IDSEDE = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 $AR_IDLOCAL = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                 $AR_ID = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                 $AR_DESCRIPCION = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                                 $AR_ABREVI = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                                 $AR_IDEDIFICIO = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                                 $AR_IDPISO = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
 
                                 $dataarea[] = array(
                                   'AR_IDSEDE'  => $AR_IDSEDE, 
                                  'AR_IDLOCAL'  => $AR_IDLOCAL,
                                  'AR_ID'   => $AR_ID,
                                  'AR_DESCRIPCION'    => $AR_DESCRIPCION ,
                                  'AR_ABREVI'    => $AR_ABREVI ,
                                  'AR_IDEDIFICIO'    => $AR_IDEDIFICIO ,
                                  'AR_IDPISO'    => $AR_IDPISO 
                                 );
                            }
                        $this->ImportarmaestroModel->insertarea($dataarea); 
                        $msg = $msg . "Se importaron " . $highestRow . " area(s)<br>";
                    }elseif ($oficina == "1" && $nombrehoja == "oficina") {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                            for($row=2; $row<=$highestRow; $row++){
                                 $IDSEDE = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 $IDLOCAL = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                 $IDAREA = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                 $CODIGO_OFICINA = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                                 $DESCRIPCION = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                                 $ABREVIATURA = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                                 $RESPONSABLE = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                                 $SUPERVISOR = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                                 $CODIGO_EDIFICIO = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                                 $CODIGO_PISO = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
 

                                 $dataoficina[] = array(
                                   'OF_IDSEDE'  => $IDSEDE, 
                                  'OF_IDLOCAL'  => $IDLOCAL,
                                  'OF_IDAREA'   => $IDAREA,
                                  'OF_ID'    => $CODIGO_OFICINA ,
                                   'OF_DESCRIPCION'  => $DESCRIPCION, 
                                  'OF_ABREVI'  => $ABREVIATURA,
                                  'OF_RESPONSABLE'   => $RESPONSABLE,
                                  'OF_SUPERVISOR'    => $SUPERVISOR ,
                                   'OF_IDOFICINA'  => $CODIGO_EDIFICIO, 
                                  'OF_IDPISO'  => $CODIGO_PISO
                                 );
                            }
                        $this->ImportarmaestroModel->insertoficina($dataoficina); 
                        $msg = $msg . "Se importaron " . $highestRow . " oficina(s)<br>";
                     }elseif ($familia == "1" && $nombrehoja == "familia") {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                            for($row=2; $row<=$highestRow; $row++){
                                 $CODIGO = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 $DESCRIPCION = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                 $ABREVIATURA = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                 $datafamilia[] = array(
                                   'PRO_ID'  => $CODIGO, 
                                  'PRO_DESCRIPCION'   => $DESCRIPCION,
                                  'PRO_ABREV'    => $ABREVIATURA 
                                 );
                            }
                        $this->ImportarmaestroModel->insertfamilia($datafamilia); 
                        $msg = $msg . "Se importaron " . $highestRow . " familia(s)<br>";
                    }elseif ($subfamilia == "1" && $nombrehoja == "subfamilia") {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                            for($row=2; $row<=$highestRow; $row++){
                                 $IDFAMILIA = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 $CODIGO = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                 $DESCRIPCION = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                 $ABREVIATURA = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                                 $TIEMPO_VIDA = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                                 $TASA_ANUAL = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                                 $TASA_MENSUAL = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                                 $REFERENCIA = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                                 $datasubfamilia[] = array(
                                  'LO_IDFAMILIA'  => $IDFAMILIA, 
                                  'LO_ID'  => $CODIGO,
                                  'LO_DESCRIPCION'   => $DESCRIPCION,
                                  'LO_ABRE'    => $ABREVIATURA ,
                                  'LO_TIEMPO_VIDA'  => $TIEMPO_VIDA, 
                                  'LO_TASA_ANUAL'  => $TASA_ANUAL,
                                  'LO_TASA_MENSUAL'   => $TASA_MENSUAL,
                                  'LO_REFERENCIA'    => $REFERENCIA 
                                 );
                            }
                        $this->ImportarmaestroModel->insertsubfamilia($datasubfamilia); 
                        $msg = $msg . "Se importaron " . $highestRow . " subfamilia(s)<br>";
                    }elseif ($cuentacontable == "1" && $nombrehoja == "ctacontable") {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                            for($row=2; $row<=$highestRow; $row++){
                                  $CODIGO = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 $DESCRIPCION = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                 $TASA = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                  $CUENTA_CARGO = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                                 $DES_CUENTA_CARGO = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                                 $CUENTA_ABONO = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                                  $DES_CUENTA_ABONO = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                                 $CUENTA_CARGO_DC = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                                 $DES_CUENTA_CARGO_DC = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                                $CUENTA_ABONO_DC = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                                 $DES_CUENTA_ABONO_DC = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                                $CUENTA_CARGO_REV = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                                $DES_CUENTA_CARGO_REV = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                                $CUENTA_ABONO_REV = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                                $DES_CUENTA_ABONO_REV = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                                $TIEMPO_VIDA_FINANCIERO = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                                $TASA_ANUAL_FINANCIERO = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                                $TASA_MENSUAL_FINANCIERO = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
 
                                $datacuentacontable[] = array(
                                   'AR_ID'  => $CODIGO, 
                                  'AR_DESCRIPCION'   => $DESCRIPCION,
                                  'AR_TASA'  => $TASA, 
                                  'AR_CUENTA_CARGO'   => $CUENTA_CARGO,
                                  'AR_DES_CUENTA_CARGO'    => $DES_CUENTA_CARGO ,
                                  'AR_CUENTA_ABONO'  => $CUENTA_ABONO, 
                                  'AR_DES_CUENTA_ABONO'   => $DES_CUENTA_ABONO,
                                  'AR_CUENTA_CARGO_DC'    => $CUENTA_CARGO_DC ,
                                   'AR_DES_CUENTA_CARGO_DC'  => $DES_CUENTA_CARGO_DC, 
                                  'AR_CUENTA_ABONO_DC'   => $CUENTA_ABONO_DC,
                                  'AR_DES_CUENTA_ABONO_DC'    => $DES_CUENTA_ABONO_DC ,
                                   'AR_CUENTA_CARGO_R'  => $CUENTA_CARGO_REV, 
                                  'AR_DES_CUENTA_CARGO_R'   => $DES_CUENTA_CARGO_REV,
                                  'AR_CUENTA_ABONO_R'    => $CUENTA_ABONO_REV ,
                                  'AR_DES_CUENTA_ABONO_R'    => $DES_CUENTA_ABONO_REV ,
                                  'AR_TIEMPO_VIDA_FINANCIERO'  => $TIEMPO_VIDA_FINANCIERO, 
                                  'AR_TASA_ANUAL_FINANCIERO'   => $TASA_ANUAL_FINANCIERO,
                                  'AR_TASA_MENSUAL_FINANCIERO'    => $TASA_MENSUAL_FINANCIERO  

                                 );
                            }
                        $this->ImportarmaestroModel->insertcuentacontable($datacuentacontable); 
                        $msg = $msg . "Se importaron " . $highestRow . " cuenta(s) contable(s)<br>";
                    }elseif ($centrodecosto == "1" && $nombrehoja == "centrocosto") {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                            for($row=2; $row<=$highestRow; $row++){
                                  $CODIGO = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 $DESCRIPCION = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                 $ABREVIATURA = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                 $datacentrocosto[] = array(
                                   'CC_ID'  => $CODIGO, 
                                  'CC_DESCRIPCION'   => $DESCRIPCION,
                                  'CC_ABREV'    => $ABREVIATURA 
                                 );
                            }
                        $this->ImportarmaestroModel->insertcentrocosto($datacentrocosto); 
                        $msg = $msg . "Se importaron " . $highestRow . " centro(s) de costo(s)<br>";
                    }elseif ($contrato == "1" && $nombrehoja == "contratos") {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                            for($row=2; $row<=$highestRow; $row++){
                                 $CODIGOSEDE = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 $CODIGO = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                 $DESCRIPCION = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                 $ABREVIATURA = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                                 $datacontrato[] = array(
                                   'LO_IDSEDE'  => $CODIGOSEDE, 
                                  'LO_ID'  => $CODIGO,
                                  'LO_DESCRIPCION'   => $DESCRIPCION,
                                  'LO_ABRE'    => $ABREVIATURA 
                                 );

                            }
                            if (isset($datacontrato) ){
                                $this->ImportarmaestroModel->insertcontrato($datacontrato); 
                            }
                        $msg = $msg . "Se importaron " . $highestRow . " contrato(s)<br>";
                    }elseif ($responsable == "1" && $nombrehoja == "usuarios") {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                            for($row=2; $row<=$highestRow; $row++){
                                 $ID = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 $DESCRIPCION = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                 $TIPO_DOCUMENTO = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                 $NUMDOC = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                                 $dataresponsable[] = array(
                                  'RA_ID'  => $ID, 
                                  'RA_DESCRIPCION'  => $DESCRIPCION,
                                  'RA_IDDOC'   => $TIPO_DOCUMENTO,
                                  'RA_NUMDOC'    => $NUMDOC  

                                 );
                            }
                        $this->ImportarmaestroModel->insertresponsable($dataresponsable); 
                        $msg = $msg . "Se importaron " . $highestRow . " responsable(s)<br>";
                    }elseif ($bien == "1" && $nombrehoja == "bienes") {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
 
                                $actualiza_inicio_operacion[] = array(
                                'prefijo'  => $prefijo, 
                                'fecha_inicio_oper'  => $fec_inicio_ope, 
                                'terminal'  => $terminal, 
                                'usuario'  => $usuariocrea,
                                'actualiza_depreciacion' => $actualiza_depreciacion
                                );
                            for($row=2; $row<=$highestRow; $row++){
                                 $AC_IDACTIVO = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 if (empty($AC_IDACTIVO)) {
                                    $row++;
                                    continue;
                                 }
                                 $AC_CODIGO_BARRA = $AC_IDACTIVO;
                                 $AC_ACTIVO_DES = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                 $AC_IDTIPOBIEN = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                                 $AC_IDORIGEN_REQ = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                                 $AC_COMPONENTE = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                                 $AC_CODIGO_PRINCIPAL = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                                 $AC_IDFAMILIA = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                                 $AC_IDSUBFAMILIA = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                                 $AC_TASA_DEPRE_FAMILIA = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                                 $AC_IDSEDE = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                                 $AC_IDLOCAL = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                                 $AC_IDAREA = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                                 $AC_IDOFICINA = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                                 $AC_IDRESPON_ACTI = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                                 $AC_IDMARCA = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                                 $AC_MODELO = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                                 $AC_NUMSERIE = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                                 $AC_IDCOLOR = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                                 $AC_IDESTADO_FISICO = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                                 $AC_IDCONDIBIEN = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                                 $AC_IDPROCEDENCIA = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                                 $AC_OBSERVACIONES = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
                                 $AC_TDOC = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
                                 $AC_SDOC = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
                                 $AC_NDOC = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
                                 $AC_IDPROVE = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
                                 $AC_FECHA_COMPRA = $worksheet->getCellByColumnAndRow(28, $row)->getFormattedValue();
                                 $AC_FECHA_COMPRA = date("d/m/Y", strtotime($AC_FECHA_COMPRA));
                                 $AC_CODIGO_ALT = $prefijo . '-' . substr($AC_FECHA_COMPRA, -4) . '-'. str_pad(($row-1), 6, "0", STR_PAD_LEFT)  ;
                                 $AC_FECHA_INI_OPE = $worksheet->getCellByColumnAndRow(29, $row)->getFormattedValue();
                                 $AC_FECHA_INI_OPE = date("d/m/Y", strtotime($AC_FECHA_INI_OPE));
                                 $AC_GUIA_REMISION = $worksheet->getCellByColumnAndRow(30, $row)->getValue();
                                 $AC_DUA = $worksheet->getCellByColumnAndRow(31, $row)->getValue();
                                 $AC_IDCENCOS = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
                                 $AC_IDCUENTA_CONTABLE = $worksheet->getCellByColumnAndRow(33, $row)->getValue();
                                 $AC_TASA_DEPREC_CONTABLE = $worksheet->getCellByColumnAndRow(34, $row)->getValue();
                                 $AC_MONEDA_COMPRA = $worksheet->getCellByColumnAndRow(35, $row)->getValue();
                                 $AC_NUM_VOUCHER = $worksheet->getCellByColumnAndRow(36, $row)->getValue();
                                 $AC_TC_VOUCHER = $worksheet->getCellByColumnAndRow(37, $row)->getValue();
                                 $AC_TC_COMPRA_CONTABLE = 0;
                                 $AC_VALOR_LIBRO = $worksheet->getCellByColumnAndRow(38, $row)->getCalculatedValue();
                                 $AC_VH_SOLES = $AC_VALOR_LIBRO;
                                 $AC_VH_DOLARES = $worksheet->getCellByColumnAndRow(40, $row)->getValue();
                                 $AC_DEPRE_EJERCICIO_CONTABLE = $worksheet->getCellByColumnAndRow(41, $row)->getValue();
                                 $AC_DEPRE_ACUMULADA_CONTABLE = $worksheet->getCellByColumnAndRow(42, $row)->getValue();
                                 $AC_TV = $worksheet->getCellByColumnAndRow(43, $row)->getValue();
                                 $AC_DEPREC_INDIVIDUAL = $worksheet->getCellByColumnAndRow(44, $row)->getValue();
                                 $AC_TASA_ANUAL_FINANCIERA = $worksheet->getCellByColumnAndRow(45, $row)->getValue();
                                 $AC_REF_FINANCIERA = $worksheet->getCellByColumnAndRow(46, $row)->getValue();
                                 $AC_DEPRE_EJERCICIO_FINANCIERA = $worksheet->getCellByColumnAndRow(47, $row)->getValue();
                                 $AC_DEPRE_ACUMULADA_FINANCIERA = $worksheet->getCellByColumnAndRow(48, $row)->getValue();
                                 $AC_NUMPLACA = $worksheet->getCellByColumnAndRow(49, $row)->getValue();
                                 $AC_ANIO = $worksheet->getCellByColumnAndRow(50, $row)->getValue();
                                 $AC_CHASIS = $worksheet->getCellByColumnAndRow(51, $row)->getValue();
                                 $AC_MOTOR = $worksheet->getCellByColumnAndRow(52, $row)->getValue();
                                 $AC_DIF_CAMBIO_ACTIVO = 0;
                                 $AC_DIF_CAMBIO_DEPRE = 0;
                                 $AC_REVALUACION_ACTI = 0;
                                 $AC_REVALUACION_DEPRE = 0;
                                 $AC_FOTO = null;
                                 $AC_USUARIO = $usuariocrea;
                                 $AC_TERMINAL = $terminal;
                                 $AC_ESTADO = 1;
                                 $AC_CODPROYECTO = $worksheet->getCellByColumnAndRow(53, $row)->getValue();
                                 $AC_REVALUACION_DEPREC_FINANCIERO_OTROS = 0;
                                 $AC_DIFCAMBIO_DEPREC_FINANCIERO_OTROS = 0;
                                 $AC_FLAG_ESTADO_INVENTARIO = $worksheet->getCellByColumnAndRow(54, $row)->getValue();

                                 $AC_DIMENSION = $worksheet->getCellByColumnAndRow(55, $row)->getValue();
                                 $AC_EDIFICIO = $worksheet->getCellByColumnAndRow(56, $row)->getValue();
                                 $AC_PISO = $worksheet->getCellByColumnAndRow(57, $row)->getValue();
                                 $AC_SUPERVISOR = $worksheet->getCellByColumnAndRow(58, $row)->getValue();
                                 $AC_USUARIO_UBICACION = $worksheet->getCellByColumnAndRow(59, $row)->getValue();
                              


                                if (empty($AC_FECHA_INI_OPE))      {
                                    $AC_FLAG_DEPRECIA = "SI";
                                    $AC_FLAG_ACTIVO_INCORPORACION = "I";
                                 
                                }else{
                                    $AC_FLAG_DEPRECIA = "NO";
                                    $AC_FLAG_ACTIVO_INCORPORACION = "N";
                                }

                                 $databien[] = array(
                                'AC_CODIGO'  => $AC_IDACTIVO, 
                                'AC_CODIGO_ALT'  => $AC_CODIGO_ALT, 
                                'AC_CODIGO_BARRA'  => $AC_CODIGO_BARRA, 
                                'AC_ACTIVO_DES'  => $AC_ACTIVO_DES, 
                                'AC_TIPO_BIEN'  => $AC_IDTIPOBIEN, 
                                'AC_IDORIGEN_REQ'  => $AC_IDORIGEN_REQ, 
                                'AC_COMPONENTE_DE'  => $AC_COMPONENTE, 
                                'AC_CODIGO_PRINCIPAL'  => $AC_CODIGO_PRINCIPAL, 
                                'AC_IDFAMILIA'  => $AC_IDFAMILIA, 
                                'AC_SUBFAMILIA'  => $AC_IDSUBFAMILIA, 
                                'AC_TASA_DEPREC_FAMILIA'  => $AC_TASA_DEPRE_FAMILIA, 
                                'AC_IDSEDE'  => $AC_IDSEDE, 
                                'AC_IDLOCAL'  => $AC_IDLOCAL, 
                                'AC_IDAREA'  => $AC_IDAREA, 
                                'AC_IDOFICINA'  => $AC_IDOFICINA, 
                                'AC_IDRESPON_ACTI'  => $AC_IDRESPON_ACTI, 
                                'AC_IDMARCA'  => $AC_IDMARCA, 
                                'AC_MODELO'  => $AC_MODELO, 
                                'AC_NUMSERIE'  => $AC_NUMSERIE, 
                                'AC_IDCOLOR'  => $AC_IDCOLOR, 
                                'AC_IDESTADO_FISICO'  => $AC_IDESTADO_FISICO, 
                                'AC_IDCONDIBIEN'  => $AC_IDCONDIBIEN, 
                                'AC_IDPROCEDENCIA'  => $AC_IDPROCEDENCIA, 
                                'AC_OBSERVACIONES'  => $AC_OBSERVACIONES, 
                                'AC_TDOC'  => $AC_TDOC, 
                                'AC_SDOC'  => $AC_SDOC, 
                                'AC_NDOC'  => $AC_NDOC, 
                                'AC_IDPROVE'  => $AC_IDPROVE, 
                                'AC_FECHA_COMPRA'  => $AC_FECHA_COMPRA, 
                                'AC_FECHA_INI_OPE'  => $AC_FECHA_INI_OPE, 
                                'AC_GUIA_REMISION'  => $AC_GUIA_REMISION, 
                                'AC_NUM_DUA'  => $AC_DUA, 
                                'AC_IDCENCOS'  => $AC_IDCENCOS, 
                                'AC_IDCUENTA_CONTABLE'  => $AC_IDCUENTA_CONTABLE, 
                                'AC_TASA_DEPREC_CONTABLE'  => $AC_TASA_DEPREC_CONTABLE, 
                                'AC_MONEDACOMPRA'  => $AC_MONEDA_COMPRA, 
                                'AC_NUM_VOUCHER'  => $AC_NUM_VOUCHER, 
                                'AC_TC_VOUCHER'  => $AC_TC_VOUCHER, 
                                'AC_VH_SOLES'  => $AC_VH_SOLES, 
                                'AC_VH_DOLARES'  => $AC_VH_DOLARES, 
                                'AC_TC_CONTABLE'  => $AC_TC_COMPRA_CONTABLE, 
                                'AC_DEPREC_EJERCICIO_CONTABLE'  => $AC_DEPRE_EJERCICIO_CONTABLE, 
                                'AC_DEPREC_ACUMULADA_CONTABLE'  => $AC_DEPRE_ACUMULADA_CONTABLE, 
                                'AC_VALOR_LIBRO_CONTABLE'  => $AC_VALOR_LIBRO, 
                                'AC_TIEMPO_VIDA'  => $AC_TV, 
                                'AC_DEPREC_INDIVIDUAL'  => $AC_DEPREC_INDIVIDUAL, 
                                'AC_TASA_DEPREC_INDIVIDUAL'  => $AC_TASA_ANUAL_FINANCIERA, 
                                'AC_REFERENCIA_FINANCIERA'  => $AC_REF_FINANCIERA, 
                                'AC_DEPREC_EJERCICIO_FINANCIERA'  => $AC_DEPRE_EJERCICIO_FINANCIERA, 
                                'AC_DEPREC_ACUMULADA_FINANCIERA'  => $AC_DEPRE_ACUMULADA_FINANCIERA, 
                                'AC_NUMPLACA'  => $AC_NUMPLACA, 
                                'AC_ANIO_OTROS'  => $AC_ANIO, 
                                'AC_CHASIS'  => $AC_CHASIS,
                                'AC_NUMMOTOR '  => $AC_MOTOR, 
                                'AC_DIFCAMBIO_ACTIVO_OTROS'  => $AC_DIF_CAMBIO_ACTIVO, 
                                'AC_DIFCAMBIO_DEPREC_OTROS'  => $AC_DIF_CAMBIO_DEPRE, 
                                'AC_REVALUACION_ACTIVO_OTROS'  => $AC_REVALUACION_ACTI, 
                                'AC_REVALUACION_DEPREC_OTROS'  => $AC_REVALUACION_DEPRE, 
                                'AC_FOTO'  => $AC_FOTO,
                                'AC_USUARIO'  => $AC_USUARIO, 
                                'AC_TERMINAL'  => $AC_TERMINAL, 
                                'AC_ESTADO'  => $AC_ESTADO, 
                                'AC_CODPROYECTO'  => $AC_CODPROYECTO, 
                                'AC_DIFCAMBIO_DEPREC_FINANCIERO_OTROS'  => $AC_DIFCAMBIO_DEPREC_FINANCIERO_OTROS, 
                                'AC_REVALUACION_DEPREC_FINANCIERO_OTROS'  => $AC_REVALUACION_DEPREC_FINANCIERO_OTROS, 
                                'AC_FLAG_ESTADO_INVENTARIO'  => $AC_FLAG_ESTADO_INVENTARIO, 
                                'AC_DIMENSION'  => $AC_DIMENSION, 
                                'AC_EDIFICIO'  => $AC_EDIFICIO, 
                                'AC_PISO'  => $AC_PISO, 
                                'AC_SUPERVISOR'  => $AC_SUPERVISOR, 
                                'AC_USUARIO_UBICACION'  => $AC_USUARIO_UBICACION, 
                                'AC_FLAG_DEPRECIA'  => $AC_FLAG_DEPRECIA, 
                                'AC_FLAG_ACTIVO_INCORPORACION'  => $AC_FLAG_ACTIVO_INCORPORACION,
                                'AC_SERIE_GUIA_REMISION'  => null, 
                                'AC_NUM_CONTRATO'  => null
                                );
                            }
                        $this->ImportarmaestroModel->insertbien($databien,$actualiza_inicio_operacion); 
                        $msg = $msg . "Se importaron " . $highestRow . " bien(s)<br>";
 
                    }elseif ($edificio == "1" && $nombrehoja == "edificio") {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                            for($row=2; $row<=$highestRow; $row++){
                                 $SE_ID = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 $SE_DESCRIPCION = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                 $ABREVIATURA = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            
                                 $dataedificio[] = array(
                                  'SE_ID'  => $SE_ID, 
                                  'SE_DESCRIPCION'  => $SE_DESCRIPCION,
                                  'SE_TERMINAL'   => $terminal,
                                  'SE_USUARIO'    => $usuariocrea , 
                                  'SE_FECREG'  => $fecha_registro,
                                  'SE_FECMOD'   => $fecha_registro,
                                  'SE_ESTADO'    => '1'  ,
                                  'SE_ABREVIATURA'    => $ABREVIATURA  
                                  
                                 );
                            }
                        $this->ImportarmaestroModel->insertedificio($dataedificio); 
                        $msg = $msg . "Se importaron " . $highestRow . " edificio(s)<br>";

                    }elseif ($piso == "1" && $nombrehoja == "piso") {
                        $highestRow = $worksheet->getHighestRow();
                        $highestColumn = $worksheet->getHighestColumn();
                            for($row=2; $row<=$highestRow; $row++){
                                 $SE_ID = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                 $SE_DESCRIPCION = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                 $ABREVIATURA = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            
                                 $datapiso[] = array(
                                  'SE_ID'  => $SE_ID, 
                                  'SE_DESCRIPCION'  => $SE_DESCRIPCION,
                                  'SE_TERMINAL'   => $terminal,
                                  'SE_USUARIO'    => $usuariocrea , 
                                  'SE_FECREG'  => $fecha_registro,
                                  'SE_FECMOD'   => $fecha_registro,
                                  'SE_ESTADO'    => '1'  ,
                                  'SE_ABREVIATURA'    => $ABREVIATURA  
                                  
                                 );
                            }
                        $this->ImportarmaestroModel->insertpiso($datapiso); 
                        $msg = $msg . "Se importaron " . $highestRow . " piso(s)<br>";
                    }
                }
           
            $this->session->set_flashdata('msg',$msg);
           redirect('importarmaestro');
      } 
 }

 


    

}
