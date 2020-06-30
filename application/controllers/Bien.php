 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Bien extends CI_Controller {

     public function __construct(){
        parent::__construct();
         $this->load->library('session');
        $this->load->library(array('form_validation','email','pagination'));
        $this->load->helper(array('maestros/sede_rules','string'));
        $this->load->model('BienModel');
        $this->load->helper('date');
        $this->load->helper('sf_helper');

        //$this->load->library('upload');
        $this->load->helper('file');
    }
    public function index($offset = 0){
        $data = $this->BienModel->getBienes();
        $config['base_url'] = base_url('bienes/index');
        $config['per_page'] = 10;
        $config['total_rows'] = count($data);

        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['pr']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $page = $this->BienModel->getPaginateBien($config['per_page'],$offset);
        
        $this->getTemplate($this->load->view('bien',array('data' => $page),true));
        
    }
    public function temporal($buscar){
        $buscar = urldecode($buscar);
        $page = $this->BienModel->getBienTemporal($buscar);
               
       echo json_encode($page);
        
    }

    public function delete(){
        $_id = $this->input->post('id',true);

        if(empty($_id)){
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('msg'=>'El id no puede ser vacio')));
        }else{
            $this->BienModel->deletebien($_id);
            $this->output
                ->set_status_header(200);
        }
    }
    public function create(){

         $id = $this->BienModel->getlastid();
         $data['id'] = $id; 
         $vista = $this->load->view('create_bien',$data,true);
         $this->getTemplate($vista);
    }
    
    public function update(){


        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);

     
        $this->upload->do_upload('profile_image');
        $data =   $this->upload->data();
      
        $imagencontenido=$this->input->post('imagencontenido');

        if (empty($data['orig_name'])) {
            if($imagencontenido=='#'){
                $foto=null;    
            }else{


            }
       
        }else{ 

            $dataString = file_get_contents($data['full_path']);
            $orig_name = $data['orig_name'];
            $hex_image = bin2hex($dataString); 

            $foto="0x".$hex_image;
            delete_files('./images/') ;
        }

      $AC_IDACTIVO   = $this->input->post('AC_IDACTIVO');
 


      // 2 $AC_CODIGO_ALT  = $this->input->post('AC_CODIGO_ALT');
       // $AC_CODIGO_BARRA   = $this->input->post('AC_CODIGO_BARRA');
        //$AC_COMPONENTE_DE  = $this->input->post('AC_COMPONENTE_DE');
        $AC_ACTIVO_DES   = $this->input->post('AC_ACTIVO_DES');
      
        $OF_TERMINAL = gethostname();
                        

           $AC_CODIGO_ALT   = $this->input->post('AC_CODIGO_ALT');              
//        AC_IDFAMILIA

         $AC_IDFAMILIA = $this->input->post('AC_IDFAMILIA'); 
       // $OF_IMAGEN   = $this->input->post('OF_DESCRIPCION');

         $AC_FECHA_COMPRA = $this->input->post('AC_FECHA_COMPRA');
        $AC_FECHA_INI_OPE = $this->input->post('AC_FECHA_INI_OPE'); 
        $AC_IDMARCA   = $this->input->post('AC_IDMARCA');
        $AC_MODELO   = $this->input->post('AC_MODELO'); 
        $AC_NUMSERIE   = $this->input->post('AC_NUMSERIE');

        $AC_NUMPLACA = $this->input->post('AC_NUMPLACA');
        $AC_IDPROVE  = $this->input->post('AC_IDPROVE');
        $AC_TDOC  = $this->input->post('AC_TDOC');
         $AC_SDOC  = $this->input->post('AC_SDOC');
     


       $AC_NDOC  = $this->input->post('AC_NDOC');
         $AC_IDESTADO_FISICO  = $this->input->post('AC_IDESTADO_FISICO');
           $AC_CODIGO_BARRA  = $this->input->post('AC_CODIGO_BARRA');
             $AC_IDCENCOS  = $this->input->post('AC_IDCENCOS');
             $AC_IDAREA  = $this->input->post('AC_IDAREA');
             $AC_NUM_CONTRATO  = $this->input->post('AC_NUM_CONTRATO');
             $AC_VALOR_RESIDUAL  = $this->input->post('AC_VALOR_RESIDUAL');
             $AC_IDORIGEN_REQ  = $this->input->post('AC_IDORIGEN_REQ');
             $AC_IDRESPON_ACTI  = $this->input->post('AC_IDRESPON_ACTI');
              $AC_IDCOLOR  = $this->input->post('AC_IDCOLOR');
              $AC_IDSEDE  = $this->input->post('AC_IDSEDE');
              $AC_IDLOCAL  = $this->input->post('AC_IDLOCAL');
              $AC_IDOFICINA  = $this->input->post('AC_IDOFICINA');
               $AC_IDCONDIBIEN  = $this->input->post('AC_IDCONDIBIEN');
               $AC_IDPROCEDENCIA  = $this->input->post('AC_IDPROCEDENCIA');
               $AC_TIPO_BIEN  = $this->input->post('AC_TIPO_BIEN');
               $AC_COMPONENTE_DE  = $this->input->post('AC_COMPONENTE_DE');

                $AC_CODIGO_PRINCIPAL  = $this->input->post('AC_CODIGO_PRINCIPAL');
                 $AC_SUBFAMILIA  = $this->input->post('AC_SUBFAMILIA');
                 $AC_IDCUENTA_CONTABLE  = $this->input->post('AC_IDCUENTA_CONTABLE');
                 $AC_TASA_DEPREC_CONTABLE  = $this->input->post('AC_TASA_DEPREC_CONTABLE');
                 $AC_MONEDACOMPRA  = $this->input->post('AC_MONEDACOMPRA');
                 $AC_NUM_VOUCHER  = $this->input->post('AC_NUM_VOUCHER');
                 $AC_TC_VOUCHER  = $this->input->post('AC_TC_VOUCHER');
                 $AC_DEPREC_EJERCICIO_CONTABLE  = $this->input->post('AC_DEPREC_EJERCICIO_CONTABLE');
                 $AC_DEPREC_ACUMULADA_CONTABLE  = $this->input->post('AC_DEPREC_ACUMULADA_CONTABLE');
                 $AC_VALOR_LIBRO_CONTABLE  = $this->input->post('AC_VALOR_LIBRO_CONTABLE');

                 $AC_TIEMPO_VIDA  = $this->input->post('AC_TIEMPO_VIDA');

                  $AC_DEPREC_INDIVIDUAL  = $this->input->post('AC_DEPREC_INDIVIDUAL');
                  $AC_REFERENCIA_FINANCIERA  = $this->input->post('AC_REFERENCIA_FINANCIERA');
                  $AC_DEPREC_EJERCICIO_FINANCIERA  = $this->input->post('AC_DEPREC_EJERCICIO_FINANCIERA');
                  $AC_DEPREC_ACUMULADA_FINANCIERA  = $this->input->post('AC_DEPREC_ACUMULADA_FINANCIERA');
                  $AC_ANIO_OTROS  = $this->input->post('AC_ANIO_OTROS');
                  $AC_CHASIS  = $this->input->post('AC_CHASIS');


                  $AC_NUMMOTOR  = $this->input->post('AC_NUMMOTOR');

                   $AC_CODPROYECTO  = $this->input->post('AC_CODPROYECTO');

                   $AC_FLAG_ESTADO_INVENTARIO  = $this->input->post('AC_FLAG_ESTADO_INVENTARIO');
                   $AC_SUPERVISOR  = $this->input->post('AC_SUPERVISOR');
                   $AC_USUARIO_UBICACION  = $this->input->post('AC_USUARIO_UBICACION');

                    $AC_DIMENSION = $this->input->post('AC_DIMENSION');

                    $AC_OBSERVACIONES = $this->input->post('AC_OBSERVACIONES');

                    $AC_SERIE_GUIA_REMISION = $this->input->post('AC_SERIE_GUIA_REMISION');


                    
                    $AC_NUM_DUA = $this->input->post('AC_NUM_DUA');


                    $AC_VH_SOLES = $this->input->post('AC_VH_SOLES');
                    $AC_VH_DOLARES = $this->input->post('AC_VH_DOLARES');


                    $AC_TASA_DEPREC_INDIVIDUAL =  $this->input->post('AC_TASA_DEPREC_INDIVIDUAL');

            if (isset($estado) ==false ) {
                  $estado = '0';
            }
           // $this->form_validation->set_rules(getUpdateUserRules());
           // if($this->form_validation->run() === FALSE){
           //     $view = $this->load->view('admin/edit_user','',true);
           //     $this->getTemplate($view);
           // }else{
                # actualizar
                // show_404();
         if (isset($this->session)){
            $usuariocrea = $this->session->userdata('CODUSUARIO');

         }else{
              $usuariocrea = NULL;  
         }

    ////  ////   if ($dataString) {

    ////            $data = array(
 
  //              'OF_IMAGEN' => "0x".$hex_image ,
  //              'OF_IDSEDE' => $OF_IDSEDE,
  //              'OF_IDLOCAL' => $OF_IDLOCAL,
//                'OF_IDAREA' => $OF_IDAREA,
     //           'OF_DESCRIPCION' => $OF_DESCRIPCION,
 //               'OF_ABREVI' => $OF_ABREVI,
       //         'OF_ESTADO' => $estado,
//                'OF_USUARIO' => $usuariocrea,  
//               'OF_FECREG' => $fechaRegistro,
       //         'OF_FECMOD' => $fechaRegistro,   
//                'OF_RESPONSABLE' => $OF_RESPONSABLE,  
      //          'OF_SUPERVISOR' => $OF_SUPERVISOR,  
//                'OF_IDOFICINA' => $OF_IDOFICINA,    
//                'OF_IDPISO' => $OF_IDPISO,   

         //       );
        //}
        //else{
        if (empty($data['orig_name'])) {
            if($imagencontenido=='#'){
                 $data = array(

            'AC_CODIGO' => $AC_IDACTIVO,
              //2   'AC_CODIGO_ALT' => $AC_CODIGO_ALT   ,
                'AC_ACTIVO_DES' => $AC_ACTIVO_DES,
            //    'AC_TIPO_BIEN' => $AC_TIPO_BIEN,
                'AC_CODIGO_ALT' => $AC_CODIGO_ALT,
               'AC_IDFAMILIA'  => $AC_IDFAMILIA,
            'AC_FECHA_COMPRA'=> $AC_FECHA_COMPRA,
                'AC_FECHA_INI_OPE' => $AC_FECHA_INI_OPE,
                'AC_IDMARCA' => $AC_IDMARCA,
                'AC_MODELO' => $AC_MODELO,  
                'AC_NUMSERIE' => $AC_NUMSERIE,
                'AC_NUMPLACA' => $AC_NUMPLACA,
                'AC_IDPROVE' => $AC_IDPROVE,   
                //'OF_IMAGEN' => $descripcion,   
                'AC_TDOC' => $AC_TDOC,  
                'AC_SDOC' => $AC_SDOC,  
                'AC_NDOC' => $AC_NDOC,    
                'AC_IDESTADO_FISICO' => $AC_IDESTADO_FISICO,   
                'AC_CODIGO_BARRA' => $AC_CODIGO_BARRA,  
                'AC_IDCENCOS' => $AC_IDCENCOS,  
                'AC_IDAREA' => $AC_IDAREA,  
                'AC_NUM_CONTRATO' => $AC_NUM_CONTRATO,  
                'AC_VALOR_RESIDUAL' => $AC_VALOR_RESIDUAL,
                'AC_IDORIGEN_REQ' => $AC_IDORIGEN_REQ,
                'AC_IDRESPON_ACTI' => $AC_IDRESPON_ACTI,
                'AC_IDCOLOR' => $AC_IDCOLOR,
                'AC_IDSEDE' => $AC_IDSEDE,
                'AC_IDLOCAL' => $AC_IDLOCAL,
                'AC_IDOFICINA' => $AC_IDOFICINA,
                'AC_IDCONDIBIEN' => $AC_IDCONDIBIEN,
                 'AC_IDPROCEDENCIA' => $AC_IDPROCEDENCIA,
                 'AC_TIPO_BIEN' => $AC_TIPO_BIEN,
                 'AC_COMPONENTE_DE' => $AC_COMPONENTE_DE,
                 'AC_CODIGO_PRINCIPAL' => $AC_CODIGO_PRINCIPAL,
                 'AC_SUBFAMILIA' => $AC_SUBFAMILIA,
                 'AC_IDCUENTA_CONTABLE' => $AC_IDCUENTA_CONTABLE,
                 'AC_TASA_DEPREC_CONTABLE' => $AC_TASA_DEPREC_CONTABLE,
                 'AC_MONEDACOMPRA' => $AC_MONEDACOMPRA,
                 'AC_NUM_VOUCHER' => $AC_NUM_VOUCHER,
                 'AC_TC_VOUCHER' => $AC_TC_VOUCHER,
                 'AC_DEPREC_EJERCICIO_CONTABLE' => $AC_DEPREC_EJERCICIO_CONTABLE,
                 'AC_DEPREC_ACUMULADA_CONTABLE' => $AC_DEPREC_ACUMULADA_CONTABLE,
                 'AC_VALOR_LIBRO_CONTABLE' => $AC_VALOR_LIBRO_CONTABLE,

                 'AC_TIEMPO_VIDA' => $AC_TIEMPO_VIDA,
                 'AC_DEPREC_INDIVIDUAL' => $AC_DEPREC_INDIVIDUAL,
                 'AC_REFERENCIA_FINANCIERA' => $AC_REFERENCIA_FINANCIERA,
                  'AC_DEPREC_EJERCICIO_FINANCIERA' => $AC_DEPREC_EJERCICIO_FINANCIERA,
                  'AC_DEPREC_ACUMULADA_FINANCIERA' => $AC_DEPREC_ACUMULADA_FINANCIERA,

                  'AC_ANIO_OTROS' => $AC_ANIO_OTROS,
                  'AC_CHASIS' => $AC_CHASIS,
                   'AC_NUMMOTOR' => $AC_NUMMOTOR,
                   'AC_CODPROYECTO' => $AC_CODPROYECTO,
                    'AC_FLAG_ESTADO_INVENTARIO' => $AC_FLAG_ESTADO_INVENTARIO,

                    'AC_SUPERVISOR' => $AC_SUPERVISOR,
                    'AC_USUARIO_UBICACION' => $AC_USUARIO_UBICACION,

                        'AC_DIMENSION' => $AC_DIMENSION,

                        'AC_OBSERVACIONES' => $AC_OBSERVACIONES,


                        'AC_SERIE_GUIA_REMISION' => $AC_SERIE_GUIA_REMISION,

                        'AC_NUM_DUA' => $AC_NUM_DUA,

                        'AC_VH_SOLES' => $AC_VH_SOLES,

                        'AC_VH_DOLARES' => $AC_VH_DOLARES,
                        'AC_FOTO' => $foto,

                                  'AC_TASA_DEPREC_INDIVIDUAL'  => $AC_TASA_DEPREC_INDIVIDUAL

                );

            }else{
                  $data = array(

            'AC_CODIGO' => $AC_IDACTIVO,
              //2   'AC_CODIGO_ALT' => $AC_CODIGO_ALT   ,
                'AC_ACTIVO_DES' => $AC_ACTIVO_DES,
            //    'AC_TIPO_BIEN' => $AC_TIPO_BIEN,
                'AC_CODIGO_ALT' => $AC_CODIGO_ALT,
               'AC_IDFAMILIA'  => $AC_IDFAMILIA,
            'AC_FECHA_COMPRA'=> $AC_FECHA_COMPRA,
                'AC_FECHA_INI_OPE' => $AC_FECHA_INI_OPE,
                'AC_IDMARCA' => $AC_IDMARCA,
                'AC_MODELO' => $AC_MODELO,  
                'AC_NUMSERIE' => $AC_NUMSERIE,
                'AC_NUMPLACA' => $AC_NUMPLACA,
                'AC_IDPROVE' => $AC_IDPROVE,   
                //'OF_IMAGEN' => $descripcion,   
                'AC_TDOC' => $AC_TDOC,  
                'AC_SDOC' => $AC_SDOC,  
                'AC_NDOC' => $AC_NDOC,    
                'AC_IDESTADO_FISICO' => $AC_IDESTADO_FISICO,   
                'AC_CODIGO_BARRA' => $AC_CODIGO_BARRA,  
                'AC_IDCENCOS' => $AC_IDCENCOS,  
                'AC_IDAREA' => $AC_IDAREA,  
                'AC_NUM_CONTRATO' => $AC_NUM_CONTRATO,  
                'AC_VALOR_RESIDUAL' => $AC_VALOR_RESIDUAL,
                'AC_IDORIGEN_REQ' => $AC_IDORIGEN_REQ,
                'AC_IDRESPON_ACTI' => $AC_IDRESPON_ACTI,
                'AC_IDCOLOR' => $AC_IDCOLOR,
                'AC_IDSEDE' => $AC_IDSEDE,
                'AC_IDLOCAL' => $AC_IDLOCAL,
                'AC_IDOFICINA' => $AC_IDOFICINA,
                'AC_IDCONDIBIEN' => $AC_IDCONDIBIEN,
                 'AC_IDPROCEDENCIA' => $AC_IDPROCEDENCIA,
                 'AC_TIPO_BIEN' => $AC_TIPO_BIEN,
                 'AC_COMPONENTE_DE' => $AC_COMPONENTE_DE,
                 'AC_CODIGO_PRINCIPAL' => $AC_CODIGO_PRINCIPAL,
                 'AC_SUBFAMILIA' => $AC_SUBFAMILIA,
                 'AC_IDCUENTA_CONTABLE' => $AC_IDCUENTA_CONTABLE,
                 'AC_TASA_DEPREC_CONTABLE' => $AC_TASA_DEPREC_CONTABLE,
                 'AC_MONEDACOMPRA' => $AC_MONEDACOMPRA,
                 'AC_NUM_VOUCHER' => $AC_NUM_VOUCHER,
                 'AC_TC_VOUCHER' => $AC_TC_VOUCHER,
                 'AC_DEPREC_EJERCICIO_CONTABLE' => $AC_DEPREC_EJERCICIO_CONTABLE,
                 'AC_DEPREC_ACUMULADA_CONTABLE' => $AC_DEPREC_ACUMULADA_CONTABLE,
                 'AC_VALOR_LIBRO_CONTABLE' => $AC_VALOR_LIBRO_CONTABLE,

                 'AC_TIEMPO_VIDA' => $AC_TIEMPO_VIDA,
                 'AC_DEPREC_INDIVIDUAL' => $AC_DEPREC_INDIVIDUAL,
                 'AC_REFERENCIA_FINANCIERA' => $AC_REFERENCIA_FINANCIERA,
                  'AC_DEPREC_EJERCICIO_FINANCIERA' => $AC_DEPREC_EJERCICIO_FINANCIERA,
                  'AC_DEPREC_ACUMULADA_FINANCIERA' => $AC_DEPREC_ACUMULADA_FINANCIERA,

                  'AC_ANIO_OTROS' => $AC_ANIO_OTROS,
                  'AC_CHASIS' => $AC_CHASIS,
                   'AC_NUMMOTOR' => $AC_NUMMOTOR,
                   'AC_CODPROYECTO' => $AC_CODPROYECTO,
                    'AC_FLAG_ESTADO_INVENTARIO' => $AC_FLAG_ESTADO_INVENTARIO,

                    'AC_SUPERVISOR' => $AC_SUPERVISOR,
                    'AC_USUARIO_UBICACION' => $AC_USUARIO_UBICACION,

                        'AC_DIMENSION' => $AC_DIMENSION,

                        'AC_OBSERVACIONES' => $AC_OBSERVACIONES,


                        'AC_SERIE_GUIA_REMISION' => $AC_SERIE_GUIA_REMISION,

                        'AC_NUM_DUA' => $AC_NUM_DUA,

                        'AC_VH_SOLES' => $AC_VH_SOLES,

                        'AC_VH_DOLARES' => $AC_VH_DOLARES,
                         

                                  'AC_TASA_DEPREC_INDIVIDUAL'  => $AC_TASA_DEPREC_INDIVIDUAL

                );

            }
        }else{
                $data = array(

            'AC_CODIGO' => $AC_IDACTIVO,
              //2   'AC_CODIGO_ALT' => $AC_CODIGO_ALT   ,
                'AC_ACTIVO_DES' => $AC_ACTIVO_DES,
            //    'AC_TIPO_BIEN' => $AC_TIPO_BIEN,
                'AC_CODIGO_ALT' => $AC_CODIGO_ALT,
               'AC_IDFAMILIA'  => $AC_IDFAMILIA,
            'AC_FECHA_COMPRA'=> $AC_FECHA_COMPRA,
                'AC_FECHA_INI_OPE' => $AC_FECHA_INI_OPE,
                'AC_IDMARCA' => $AC_IDMARCA,
                'AC_MODELO' => $AC_MODELO,  
                'AC_NUMSERIE' => $AC_NUMSERIE,
                'AC_NUMPLACA' => $AC_NUMPLACA,
                'AC_IDPROVE' => $AC_IDPROVE,   
                //'OF_IMAGEN' => $descripcion,   
                'AC_TDOC' => $AC_TDOC,  
                'AC_SDOC' => $AC_SDOC,  
                'AC_NDOC' => $AC_NDOC,    
                'AC_IDESTADO_FISICO' => $AC_IDESTADO_FISICO,   
                'AC_CODIGO_BARRA' => $AC_CODIGO_BARRA,  
                'AC_IDCENCOS' => $AC_IDCENCOS,  
                'AC_IDAREA' => $AC_IDAREA,  
                'AC_NUM_CONTRATO' => $AC_NUM_CONTRATO,  
                'AC_VALOR_RESIDUAL' => $AC_VALOR_RESIDUAL,
                'AC_IDORIGEN_REQ' => $AC_IDORIGEN_REQ,
                'AC_IDRESPON_ACTI' => $AC_IDRESPON_ACTI,
                'AC_IDCOLOR' => $AC_IDCOLOR,
                'AC_IDSEDE' => $AC_IDSEDE,
                'AC_IDLOCAL' => $AC_IDLOCAL,
                'AC_IDOFICINA' => $AC_IDOFICINA,
                'AC_IDCONDIBIEN' => $AC_IDCONDIBIEN,
                 'AC_IDPROCEDENCIA' => $AC_IDPROCEDENCIA,
                 'AC_TIPO_BIEN' => $AC_TIPO_BIEN,
                 'AC_COMPONENTE_DE' => $AC_COMPONENTE_DE,
                 'AC_CODIGO_PRINCIPAL' => $AC_CODIGO_PRINCIPAL,
                 'AC_SUBFAMILIA' => $AC_SUBFAMILIA,
                 'AC_IDCUENTA_CONTABLE' => $AC_IDCUENTA_CONTABLE,
                 'AC_TASA_DEPREC_CONTABLE' => $AC_TASA_DEPREC_CONTABLE,
                 'AC_MONEDACOMPRA' => $AC_MONEDACOMPRA,
                 'AC_NUM_VOUCHER' => $AC_NUM_VOUCHER,
                 'AC_TC_VOUCHER' => $AC_TC_VOUCHER,
                 'AC_DEPREC_EJERCICIO_CONTABLE' => $AC_DEPREC_EJERCICIO_CONTABLE,
                 'AC_DEPREC_ACUMULADA_CONTABLE' => $AC_DEPREC_ACUMULADA_CONTABLE,
                 'AC_VALOR_LIBRO_CONTABLE' => $AC_VALOR_LIBRO_CONTABLE,

                 'AC_TIEMPO_VIDA' => $AC_TIEMPO_VIDA,
                 'AC_DEPREC_INDIVIDUAL' => $AC_DEPREC_INDIVIDUAL,
                 'AC_REFERENCIA_FINANCIERA' => $AC_REFERENCIA_FINANCIERA,
                  'AC_DEPREC_EJERCICIO_FINANCIERA' => $AC_DEPREC_EJERCICIO_FINANCIERA,
                  'AC_DEPREC_ACUMULADA_FINANCIERA' => $AC_DEPREC_ACUMULADA_FINANCIERA,

                  'AC_ANIO_OTROS' => $AC_ANIO_OTROS,
                  'AC_CHASIS' => $AC_CHASIS,
                   'AC_NUMMOTOR' => $AC_NUMMOTOR,
                   'AC_CODPROYECTO' => $AC_CODPROYECTO,
                    'AC_FLAG_ESTADO_INVENTARIO' => $AC_FLAG_ESTADO_INVENTARIO,

                    'AC_SUPERVISOR' => $AC_SUPERVISOR,
                    'AC_USUARIO_UBICACION' => $AC_USUARIO_UBICACION,

                        'AC_DIMENSION' => $AC_DIMENSION,

                        'AC_OBSERVACIONES' => $AC_OBSERVACIONES,


                        'AC_SERIE_GUIA_REMISION' => $AC_SERIE_GUIA_REMISION,

                        'AC_NUM_DUA' => $AC_NUM_DUA,

                        'AC_VH_SOLES' => $AC_VH_SOLES,

                        'AC_VH_DOLARES' => $AC_VH_DOLARES,
                        'AC_FOTO' => $foto,

                                  'AC_TASA_DEPREC_INDIVIDUAL'  => $AC_TASA_DEPREC_INDIVIDUAL

                );
        }
        
                $this->BienModel->updateBien($AC_IDACTIVO,$data);



                $this->session->set_flashdata('msg','La bien '.$descripcion.' fue actualizada correctamente');
                redirect('bienes');
      
    
    }

    public function store(){


       

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);

        //if (!$this->upload->do_upload('profile_image')) {
           // $error = array('error' => $this->upload->display_errors());

           // $this->load->view('files/upload_form', $error);
        //} else {
        $this->upload->do_upload('profile_image');
            $data =   $this->upload->data();
  
        $dataString = file_get_contents($data['full_path']);
        $orig_name = $data['orig_name'];
        $hex_image = bin2hex($dataString); 
 
        //$uploadImage = $this->Personalinfo_model->uploadImage(array('orig_name' => $orig_name, 'dataString' => $dataString ));

        //delete_files('./images/') ;
        delete_files('./images/') ;
            //$this->load->view('files/upload_result', $data);
        //}

 
 
     $AC_IDACTIVO   = $this->input->post('AC_IDACTIVO');
 


      // 2 $AC_CODIGO_ALT  = $this->input->post('AC_CODIGO_ALT');
       // $AC_CODIGO_BARRA   = $this->input->post('AC_CODIGO_BARRA');
        //$AC_COMPONENTE_DE  = $this->input->post('AC_COMPONENTE_DE');
        $AC_ACTIVO_DES   = $this->input->post('AC_ACTIVO_DES');
      
        $OF_TERMINAL = gethostname();
                        

           $AC_CODIGO_ALT   = $this->input->post('AC_CODIGO_ALT');              
//        AC_IDFAMILIA

         $AC_IDFAMILIA = $this->input->post('AC_IDFAMILIA'); 
       // $OF_IMAGEN   = $this->input->post('OF_DESCRIPCION');

         $AC_FECHA_COMPRA = $this->input->post('AC_FECHA_COMPRA');
        $AC_FECHA_INI_OPE = $this->input->post('AC_FECHA_INI_OPE'); 
        $AC_IDMARCA   = $this->input->post('AC_IDMARCA');
        $AC_MODELO   = $this->input->post('AC_MODELO'); 
        $AC_NUMSERIE   = $this->input->post('AC_NUMSERIE');

        $AC_NUMPLACA = $this->input->post('AC_NUMPLACA');
        $AC_IDPROVE  = $this->input->post('AC_IDPROVE');
        $AC_TDOC  = $this->input->post('AC_TDOC');
         $AC_SDOC  = $this->input->post('AC_SDOC');
     


       $AC_NDOC  = $this->input->post('AC_NDOC');
         $AC_IDESTADO_FISICO  = $this->input->post('AC_IDESTADO_FISICO');
           $AC_CODIGO_BARRA  = $this->input->post('AC_CODIGO_BARRA');
             $AC_IDCENCOS  = $this->input->post('AC_IDCENCOS');
             $AC_IDAREA  = $this->input->post('AC_IDAREA');
             $AC_NUM_CONTRATO  = $this->input->post('AC_NUM_CONTRATO');
             $AC_VALOR_RESIDUAL  = $this->input->post('AC_VALOR_RESIDUAL');
             $AC_IDORIGEN_REQ  = $this->input->post('AC_IDORIGEN_REQ');
             $AC_IDRESPON_ACTI  = $this->input->post('AC_IDRESPON_ACTI');
              $AC_IDCOLOR  = $this->input->post('AC_IDCOLOR');
              $AC_IDSEDE  = $this->input->post('AC_IDSEDE');
              $AC_IDLOCAL  = $this->input->post('AC_IDLOCAL');
              $AC_IDOFICINA  = $this->input->post('AC_IDOFICINA');
               $AC_IDCONDIBIEN  = $this->input->post('AC_IDCONDIBIEN');
               $AC_IDPROCEDENCIA  = $this->input->post('AC_IDPROCEDENCIA');
               $AC_TIPO_BIEN  = $this->input->post('AC_TIPO_BIEN');
               $AC_COMPONENTE_DE  = $this->input->post('AC_COMPONENTE_DE');

                $AC_CODIGO_PRINCIPAL  = $this->input->post('AC_CODIGO_PRINCIPAL');
                 $AC_SUBFAMILIA  = $this->input->post('AC_SUBFAMILIA');
                 $AC_IDCUENTA_CONTABLE  = $this->input->post('AC_IDCUENTA_CONTABLE');
                 $AC_TASA_DEPREC_CONTABLE  = $this->input->post('AC_TASA_DEPREC_CONTABLE');
                 $AC_MONEDACOMPRA  = $this->input->post('AC_MONEDACOMPRA');
                 $AC_NUM_VOUCHER  = $this->input->post('AC_NUM_VOUCHER');
                 $AC_TC_VOUCHER  = $this->input->post('AC_TC_VOUCHER');
                 $AC_DEPREC_EJERCICIO_CONTABLE  = $this->input->post('AC_DEPREC_EJERCICIO_CONTABLE');
                 $AC_DEPREC_ACUMULADA_CONTABLE  = $this->input->post('AC_DEPREC_ACUMULADA_CONTABLE');
                 $AC_VALOR_LIBRO_CONTABLE  = $this->input->post('AC_VALOR_LIBRO_CONTABLE');

                 $AC_TIEMPO_VIDA  = $this->input->post('AC_TIEMPO_VIDA');

                  $AC_DEPREC_INDIVIDUAL  = $this->input->post('AC_DEPREC_INDIVIDUAL');
                  $AC_REFERENCIA_FINANCIERA  = $this->input->post('AC_REFERENCIA_FINANCIERA');
                  $AC_DEPREC_EJERCICIO_FINANCIERA  = $this->input->post('AC_DEPREC_EJERCICIO_FINANCIERA');
                  $AC_DEPREC_ACUMULADA_FINANCIERA  = $this->input->post('AC_DEPREC_ACUMULADA_FINANCIERA');
                  $AC_ANIO_OTROS  = $this->input->post('AC_ANIO_OTROS');
                  $AC_CHASIS  = $this->input->post('AC_CHASIS');


                  $AC_NUMMOTOR  = $this->input->post('AC_NUMMOTOR');

                   $AC_CODPROYECTO  = $this->input->post('AC_CODPROYECTO');

                   $AC_FLAG_ESTADO_INVENTARIO  = $this->input->post('AC_FLAG_ESTADO_INVENTARIO');
                   $AC_SUPERVISOR  = $this->input->post('AC_SUPERVISOR');
                   $AC_USUARIO_UBICACION  = $this->input->post('AC_USUARIO_UBICACION');

                    $AC_DIMENSION = $this->input->post('AC_DIMENSION');

                    $AC_OBSERVACIONES = $this->input->post('AC_OBSERVACIONES');

                    $AC_SERIE_GUIA_REMISION = $this->input->post('AC_SERIE_GUIA_REMISION');


                    
                    $AC_NUM_DUA = $this->input->post('AC_NUM_DUA');


                    $AC_VH_SOLES = $this->input->post('AC_VH_SOLES');
                    $AC_VH_DOLARES = $this->input->post('AC_VH_DOLARES');


                    $AC_TASA_DEPREC_INDIVIDUAL =  $this->input->post('AC_TASA_DEPREC_INDIVIDUAL');

                //    $AC_FOTO = $this->input->post('AC_FOTO');

        $this->form_validation->set_rules(getCreateUserRules());

         if (isset($this->session)){
            $usuariocrea = $this->session->userdata('CODUSUARIO');

         }else{
              $usuariocrea = NULL;  

         }  
        //if($this->form_validation->run() == FALSE){
        //   $this->output->set_status_header(400);
        //}else {
            $bien = array(
             //   'OF_ID' =>  $lastid,
               //  'OF_IMAGEN' => $orig_name, 
               // 'OF_IMAGEN' => "0x".$hex_image ,


                'AC_CODIGO' => $AC_IDACTIVO,
              //2   'AC_CODIGO_ALT' => $AC_CODIGO_ALT   ,
                'AC_ACTIVO_DES' => $AC_ACTIVO_DES,
            //    'AC_TIPO_BIEN' => $AC_TIPO_BIEN,
                'AC_CODIGO_ALT' => $AC_CODIGO_ALT,
               'AC_IDFAMILIA'  => $AC_IDFAMILIA,
            'AC_FECHA_COMPRA'=> $AC_FECHA_COMPRA,
                'AC_FECHA_INI_OPE' => $AC_FECHA_INI_OPE,
                'AC_IDMARCA' => $AC_IDMARCA,
                'AC_MODELO' => $AC_MODELO,  
                'AC_NUMSERIE' => $AC_NUMSERIE,
                'AC_NUMPLACA' => $AC_NUMPLACA,
                'AC_IDPROVE' => $AC_IDPROVE,   
                //'OF_IMAGEN' => $descripcion,   
                'AC_TDOC' => $AC_TDOC,  
                'AC_SDOC' => $AC_SDOC,  
                'AC_NDOC' => $AC_NDOC,    
                'AC_IDESTADO_FISICO' => $AC_IDESTADO_FISICO,   
                'AC_CODIGO_BARRA' => $AC_CODIGO_BARRA,  
                'AC_IDCENCOS' => $AC_IDCENCOS,  
                'AC_IDAREA' => $AC_IDAREA,  
                'AC_NUM_CONTRATO' => $AC_NUM_CONTRATO,  
                'AC_VALOR_RESIDUAL' => $AC_VALOR_RESIDUAL,
                'AC_IDORIGEN_REQ' => $AC_IDORIGEN_REQ,
                'AC_IDRESPON_ACTI' => $AC_IDRESPON_ACTI,
                'AC_IDCOLOR' => $AC_IDCOLOR,
                'AC_IDSEDE' => $AC_IDSEDE,
                'AC_IDLOCAL' => $AC_IDLOCAL,
                'AC_IDOFICINA' => $AC_IDOFICINA,
                'AC_IDCONDIBIEN' => $AC_IDCONDIBIEN,
                 'AC_IDPROCEDENCIA' => $AC_IDPROCEDENCIA,
                 'AC_TIPO_BIEN' => $AC_TIPO_BIEN,
                 'AC_COMPONENTE_DE' => $AC_COMPONENTE_DE,
                 'AC_CODIGO_PRINCIPAL' => $AC_CODIGO_PRINCIPAL,
                 'AC_SUBFAMILIA' => $AC_SUBFAMILIA,
                 'AC_IDCUENTA_CONTABLE' => $AC_IDCUENTA_CONTABLE,
                 'AC_TASA_DEPREC_CONTABLE' => $AC_TASA_DEPREC_CONTABLE,
                 'AC_MONEDACOMPRA' => $AC_MONEDACOMPRA,
                 'AC_NUM_VOUCHER' => $AC_NUM_VOUCHER,
                 'AC_TC_VOUCHER' => $AC_TC_VOUCHER,
                 'AC_DEPREC_EJERCICIO_CONTABLE' => $AC_DEPREC_EJERCICIO_CONTABLE,
                 'AC_DEPREC_ACUMULADA_CONTABLE' => $AC_DEPREC_ACUMULADA_CONTABLE,
                 'AC_VALOR_LIBRO_CONTABLE' => $AC_VALOR_LIBRO_CONTABLE,

                 'AC_TIEMPO_VIDA' => $AC_TIEMPO_VIDA,
                 'AC_DEPREC_INDIVIDUAL' => $AC_DEPREC_INDIVIDUAL,
                 'AC_REFERENCIA_FINANCIERA' => $AC_REFERENCIA_FINANCIERA,
                  'AC_DEPREC_EJERCICIO_FINANCIERA' => $AC_DEPREC_EJERCICIO_FINANCIERA,
                  'AC_DEPREC_ACUMULADA_FINANCIERA' => $AC_DEPREC_ACUMULADA_FINANCIERA,

                  'AC_ANIO_OTROS' => $AC_ANIO_OTROS,
                  'AC_CHASIS' => $AC_CHASIS,
                   'AC_NUMMOTOR' => $AC_NUMMOTOR,
                   'AC_CODPROYECTO' => $AC_CODPROYECTO,
                    'AC_FLAG_ESTADO_INVENTARIO' => $AC_FLAG_ESTADO_INVENTARIO,

                    'AC_SUPERVISOR' => $AC_SUPERVISOR,
                    'AC_USUARIO_UBICACION' => $AC_USUARIO_UBICACION,

                        'AC_DIMENSION' => $AC_DIMENSION,

                        'AC_OBSERVACIONES' => $AC_OBSERVACIONES,


                        'AC_SERIE_GUIA_REMISION' => $AC_SERIE_GUIA_REMISION,

                        'AC_NUM_DUA' => $AC_NUM_DUA,

                        'AC_VH_SOLES' => $AC_VH_SOLES,

                        'AC_VH_DOLARES' => $AC_VH_DOLARES,
                        'AC_FOTO' => "0x".$hex_image ,

                                  'AC_TASA_DEPREC_INDIVIDUAL'  => $AC_TASA_DEPREC_INDIVIDUAL

                
            );
    
            
            
            if(!$this->BienModel->save($bien)){
                $this->output->set_status_header(500);
            }else{
                 
                $this->session->set_flashdata('msg','La bien a sido registrada'); 
                redirect(base_url('bienes'));
            }


        //}

        $vista = $this->load->view('admin/create_user','',true);
        $this->getTemplate($vista); 
    }




    public function edit($id = 0){
        $bien = $this->BienModel->getBien($id);
        //$bien['OF_IMAGEN'] = substr($bien['OF_IMAGEN'] ,2);
        //var_dump($bien['OF_IMAGEN'] );
        //$im = imagecreatefromstring( $this->BienModel->hexToStr($bien['OF_IMAGEN']));

        //$hexAsString = file_get_contents(  $bien[ "OF_IMAGEN" ] );

        // Just in case...
        if (empty($bien[ "AC_FOTO" ])){


        }else{
        assert( '0x' == substr( $bien[ "AC_FOTO" ], 0, 2 ));

        // Skip first two chars
        $hexDigits = substr( $bien[ "AC_FOTO" ], 2, strlen( $bien[ "AC_FOTO" ] ) -2 );

        $bien[ "AC_FOTO" ] = base64_encode(pack('H*', $hexDigits  ));
        //$bien[ "OF_IMAGEN" ] =  base64_encode($bien['OF_IMAGEN']);
        //$bien[ "OF_IMAGEN" ] =  $im;
        }
//var_dump($bien['PRO_DESCRIPCION']);
//exit;

        $view = $this->load->view('edit_bien',array('bien' => $bien),true);
        $this->getTemplate($view);
    }


    public function sendEmail($data){

        $this->email->from('sistema@hospidev.com', 'Hospidev');
        $this->email->to($data['correo']);

        $this->email->subject('Datos de cuenta');

        $vista = $this->load->view('emails/welcome',$data,TRUE);

        $this->email->message($vista);

        $this->email->send();
    }
    public function getTemplate($view){
         $data1['idscript'] = "show_bienes.js";   
        $data = array(
            'head' => $this->load->view('templates/header','',TRUE),
            'nav' => $this->load->view('templates/menu','',TRUE),
            'aside' => $this->load->view('templates/barra_sesion','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('templates/footer',$data1,TRUE),
        );
        $this->load->view('dashboard',$data);
    }


    public function get_familia_data($texto = '')
    {
              $get_student = $this->BienModel->get_familia_data_model($texto);
 
        echo  json_encode($get_student); 

        
    }
    public function get_subfamilia_data($id = '')
    {
       
        $get_student = $this->BienModel->get_subfamilia_data_model($id);
 
        echo  json_encode($get_student); 

        
    }
    public function get_sede_data($id = '')
    {
       
        $get_student = $this->BienModel->get_sede_data_model($id);
 
        echo  json_encode($get_student); 

        
    }
    public function get_local_data($id = '')
    {
       
        $get_student = $this->BienModel->get_local_data_model($id);
 
        echo  json_encode($get_student); 

        
    }
    public function get_area_data($id = '')
    {
       
        $get_student = $this->BienModel->get_area_data_model($id);
 
        echo  json_encode($get_student); 

        
    }
    public function get_oficina_data($id = '')
    {
       
        $get_student = $this->BienModel->get_oficina_data_model($id);
 
        echo  json_encode($get_student); 

        
    }
    public function get_edificio_data($id = '')
    {
       
        $get_student = $this->BienModel->get_edificio_data_model($id);
 
        echo  json_encode($get_student); 

        
    }
    public function get_piso_data($id = '')
    {
       
        $get_student = $this->BienModel->get_piso_data_model($id);
 
        echo  json_encode($get_student); 

        
    }
    public function get_responsable_data($id = '')
    {
       
        $get_student = $this->BienModel->get_responsable_data_model($id);
 
        echo  json_encode($get_student); 

        
    }

    public function get_supervisor_data($id = '')
    {
       
        $get_student = $this->BienModel->get_responsable_data_model($id);
 
        echo  json_encode($get_student); 

        
    }
    public function get_usuario_data($id = '')
    {
       
        $get_student = $this->BienModel->get_responsable_data_model($id);
 
        echo  json_encode($get_student); 

        
    }
    public function get_contrato_data($id = '')
    {
       
        $get_student = $this->BienModel->get_contrato_data_model($id);
 
        echo  json_encode($get_student); 

        
    }
    public function get_tasa_depre_cuenta($id_cuenta){

        $tasa = $this->BienModel->get_tasa_depre_cuenta($id_cuenta);   
 
        echo  json_encode($tasa); 
    }

    public function get_bien_data($id = '')
    {
        $id = urldecode($id);

        $get_student = $this->BienModel->get_bien_data_model($id);
       
        echo  json_encode($get_student); 

        
    }
    public function get_mejoras_data($id = '')
    {
        $id = urldecode($id);

        $get_mejora = $this->BienModel->get_mejoras_model($id);
       
        echo  json_encode($get_mejora); 

        
    }
    public function get_ajustes_data($id = '')
    {
        $id = urldecode($id);

        $get_ajuste = $this->BienModel->get_ajustes_model($id);
       
        echo  json_encode($get_ajuste); 

        
    }

}
