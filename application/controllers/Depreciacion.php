 <?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Depreciacion extends CI_Controller {

     public function __construct(){
        parent::__construct();
         $this->load->library('session');
        $this->load->library(array('form_validation','email','pagination'));
         
        $this->load->model('DepreciacionModel');
        $this->load->helper('date');
        $this->load->helper('form');
          $this->load->library('excel');

    }
        public function index($offset = 0){
           
               $dat = "";
            $this->getTemplate($this->load->view('depreciacion',$dat,true))   ;
        }
        public function getTemplate($view){
         $data1['idscript'] = "show_depreciacion.js";   
        $data = array(
            'head' => $this->load->view('templates/header','',TRUE),
            'nav' => $this->load->view('templates/menu','',TRUE),
            'aside' => $this->load->view('templates/barra_sesion','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('templates/footer',$data1,TRUE),
        );
        $this->load->view('dashboard',$data);
        }
        public function calcular_depreciacion() {

              $msg="";
           $chk_tributario = $this->input->post('chk_tributario');
           $messelect = $this->input->post('mes');
           $añoselect = $this->input->post('año');
           $cantidad =  $this->DepreciacionModel->verificar_depre_mensuales_cantidad($chk_tributario);

             if (count($cantidad) == 0) {


                  $dt_deprec = "";
                  $dt_deprec = $this->DepreciacionModel->get_Fecha_Inicio_Operaciones();

                  if (count($dt_deprec) > 0) {

                       $mes = date('m', strtotime("+1 months", strtotime($dt_deprec['FECHA'])));

                       $año = date('Y', strtotime("+1 months", strtotime($dt_deprec['FECHA'])));
   
                      if (intval( $mes) == 1) {
                          $dt_deprec = "";
                          $dt_deprec = $this->DepreciacionModel->verificar_depre_mensuales_cantidad($año - 1);
                          if (count($dt_deprec) == 0 ){ 
                              $msg = "Debe realizar el cierre del Ejercicio ".($año - 1) ."para realizar la depreciación del mes elegido.";
 
                          }
                      }
   
                      if (intval( $mes) == $messelect && $año == $añoselect) {

                      }else{
                      
                          $msg = "El mes elegido es invalido para Depreciar,"."el mes correcto es " .  $mes  . "/" . $año;
                       
                      }
                  }else{
                      $msg = "El sistema no posee fecha de inicio de operaciones. Verifique.!";
                    
                       
                  }
             }else{
                  $dt_deprec = "";
                  $dt_deprec = $this->DepreciacionModel->Verificar_Ultimo_mes_depreciado_y_cerrado($chk_tributario);

                  if (count($dt_deprec) > 0) {
                           $mes = date('m', strtotime("+1 months", strtotime($dt_deprec['FECHA'])));
                           $año = date('Y', strtotime("+1 months", strtotime($dt_deprec['FECHA'])));

                              if (intval( $mes) == 12) {
                                  $dt_deprec = "";
                                  $dt_deprec = $this->DepreciacionModel->Verificar_Cierres_del_Ejercicio($año);
                                  if (count($dt_deprec) > 0) {

                                      $mes = 1;
                                      $año = $año + 1;

                                      if( intval( $mes) == $messelect && $año == $añoselect) {

                                      }else{
                                           $msg = "El mes elegido para depreciar es invalido."."Verifique las depreciaciones realizadas.!";
                                          
                                      }
                                  }else{
                                       $msg = "Debe realizar el cierre del Ejercicio" . $anio . "," . "para realizar la depreciación del mes elegido." ;
               
                                  }
                              }elseif (intval( $mes) == $messelect && $año == $añoselect) {
                                  $msg = "La Depreciación de " . $messelect . " del " & $añoselect & " ya fue generada." &  "Tambien se encuentra registrado en el Cierre Mensual. Solo puede consultar la Depreciación del mes elegido.";
                  
                              }else{
                                  $mes = $mes + 1;
                                  if (intval( $mes) == $messelect && $año == $añoselect) {

                                  }else{
                                      $msg = "El mes elegido para depreciar es invalido." . "Verifique las depreciaciones realizadas.!";
                                      
                                  }
                              }




                  }else{
                       $dt_deprec = "";
                       $mes_trabajo  = 0;
                       $anio_trabajo = 0;

                
                        $dt_deprec = $this->DepreciacionModel->Get_Fecha_Inicio_Operaciones();
                        if (count($dt_deprec) > 0) {

                            $mes = date('m', strtotime("+1 months", strtotime($dt_deprec['FECHA'])));
                            $año = date('Y', strtotime("+1 months", strtotime($dt_deprec['FECHA'])));

                            if (intval( $mes) == $messelect && $año == $añoselect) {
                                $mes_trabajo = $messelect;
                                $anio_trabajo = $añoselect;

                                $dt_deprec = $this->DepreciacionModel->Verificar_Depre_Mes_Ant_Abierto($mes_trabajo, $anio_trabajo,$chk_tributario);
                                if (count($dt_deprec) > 0)  {
                                    $msg = "La depreciacion para " . $messelect . " del " . $añoselect . " esta generada verificar el CIERRE MENSUAL del mes elegido.";
                                    

                                }

                            }else{
                                if ($messelect = 1) {
                                    $mes_trabajo = 12;
                                    $anio_trabajo = $añoselect - 1;
                                }else{
                                    $mes_trabajo = $messelect - 1;
                                    $anio_trabajo = $añoselect;
                                }

                                $dt_deprec = $this->DepreciacionModel->Verificar_Depre_Mes_Ant_Abierto(_mes_trabajo, anio_trabajo, $chk_tributario);
                                if (count($dt_deprec) > 0) {
                                    $msg = "Realizar el CIERRE MENSUAL del mes anterior,para realizar la Depreciación del mes elegido.";

                                }else{
                                     $msg = "Realizar la Depreciación y cierre del mes anterior,para realizar la Depreciación del mes elegido.";
                                   
                                }
                            }
                            
                        }else{
                           $msg = "El sistema no posee fecha de inicio de operaciones. Verifique.!";
             
                        }

                 }
            
             
             // $this->session->set_flashdata('msg',$msg);
              //redirect('Depreciacion');
            }
        
        
            echo json_encode($msg);
          }

 }

 