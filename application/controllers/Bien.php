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
        //$this->load->library('upload');
        $this->load->helper('file');
    }
    public function index($offset = 0){
        $data = $this->BienModel->getBienes();
        $config['base_url'] = base_url('bienes/index');
        $config['per_page'] = 10;
        $config['total_rows'] = count($data);

        $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] 	= '</ul></nav></div>';
        $config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] 	= '</span></li>';
        $config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] 	= '</span></li>';
        $config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] 	= '</span></li>';

        $this->pagination->initialize($config);

        $page = $this->BienModel->getPaginateBien($config['per_page'],$offset);
        
        $this->getTemplate($this->load->view('bien',array('data' => $page),true));
        
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
        $vista = $this->load->view('create_bien','',true);
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
        $dataString = file_get_contents($data['full_path']);

        if ($dataString) {
 
        $orig_name = $data['orig_name'];
        $hex_image = bin2hex($dataString); 
        delete_files('./images/') ;
       
        }

        $_id   = $this->input->post('OF_ID');
        $OF_IDSEDE   = $this->input->post('OF_IDSEDE');
        $OF_IDLOCAL  = $this->input->post('OF_IDLOCAL');
        $OF_IDAREA   = $this->input->post('OF_IDAREA');
        $OF_DESCRIPCION  = $this->input->post('OF_DESCRIPCION');
        $OF_ABREVI   = $this->input->post('OF_ABREVI');
      
        $OF_TERMINAL = gethostname();
 
       // $OF_IMAGEN   = $this->input->post('OF_DESCRIPCION');
        $OF_RESPONSABLE = $this->input->post('OF_RESPONSABLE'); 
        $OF_SUPERVISOR   = $this->input->post('OF_SUPERVISOR');
        $OF_IDOFICINA   = $this->input->post('OF_IDOFICINA'); 
        $OF_IDPISO   = $this->input->post('OF_IDPISO');

        $estado = $this->input->post('estado');
       
         
        $format = "%Y-%m-%d %h:%i %a";
        $fechaRegistro = @mdate($format);


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

         if ($dataString) {

                $data = array(
 
                'OF_IMAGEN' => "0x".$hex_image ,
                'OF_IDSEDE' => $OF_IDSEDE,
                'OF_IDLOCAL' => $OF_IDLOCAL,
                'OF_IDAREA' => $OF_IDAREA,
                'OF_DESCRIPCION' => $OF_DESCRIPCION,
                'OF_ABREVI' => $OF_ABREVI,
                'OF_ESTADO' => $estado,
                'OF_USUARIO' => $usuariocrea,  
                'OF_TERMINAL' => $OF_TERMINAL,
                'OF_FECREG' => $fechaRegistro,
                'OF_FECMOD' => $fechaRegistro,   
                'OF_RESPONSABLE' => $OF_RESPONSABLE,  
                'OF_SUPERVISOR' => $OF_SUPERVISOR,  
                'OF_IDOFICINA' => $OF_IDOFICINA,    
                'OF_IDPISO' => $OF_IDPISO,   

                );
        }else{

                $data = array(

                'OF_IDSEDE' => $OF_IDSEDE,
                'OF_IDLOCAL' => $OF_IDLOCAL,
                'OF_IDAREA' => $OF_IDAREA,
                'OF_DESCRIPCION' => $OF_DESCRIPCION,
                'OF_ABREVI' => $OF_ABREVI,
                'OF_ESTADO' => $estado,
                'OF_USUARIO' => $usuariocrea,  
                'OF_TERMINAL' => $OF_TERMINAL,
                'OF_FECREG' => $fechaRegistro,
                'OF_FECMOD' => $fechaRegistro,   
                'OF_RESPONSABLE' => $OF_RESPONSABLE,  
                'OF_SUPERVISOR' => $OF_SUPERVISOR,  
                'OF_IDOFICINA' => $OF_IDOFICINA,    
                'OF_IDPISO' => $OF_IDPISO,   

                );

        }
                $this->BienModel->updateBien($_id,$data);
                $this->session->set_flashdata('msg','La bien '.$descripcion.' fue actualizada correctamente');
                redirect('biens');
      
    
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

 
 
        $OF_IDSEDE   = $this->input->post('OF_IDSEDE');
        $OF_IDLOCAL  = $this->input->post('OF_IDLOCAL');
        $OF_IDAREA   = $this->input->post('OF_IDAREA');
        $OF_DESCRIPCION  = $this->input->post('OF_DESCRIPCION');
        $OF_ABREVI   = $this->input->post('OF_ABREVI');
      
        $OF_TERMINAL = gethostname();
 
       // $OF_IMAGEN   = $this->input->post('OF_DESCRIPCION');
        $OF_RESPONSABLE = $this->input->post('OF_RESPONSABLE'); 
        $OF_SUPERVISOR   = $this->input->post('OF_SUPERVISOR');
        $OF_IDOFICINA   = $this->input->post('OF_IDOFICINA'); 
        $OF_IDPISO   = $this->input->post('OF_IDPISO');

        $estado = $this->input->post('OF_ESTADO');
        $lastid  = $this->BienModel->getlastid();
         
        $format = "%Y-%m-%d %h:%i %a";
        $fechaRegistro = @mdate($format);

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
                'OF_ID' =>  $lastid,
               //  'OF_IMAGEN' => $orig_name, 
                'OF_IMAGEN' => "0x".$hex_image ,


                'OF_IDSEDE' => $OF_IDSEDE,
                'OF_IDLOCAL' => $OF_IDLOCAL,
                'OF_IDAREA' => $OF_IDAREA,
                'OF_DESCRIPCION' => $OF_DESCRIPCION,
                'OF_ABREVI' => $OF_ABREVI,
                'OF_ESTADO' => 1,
                'OF_USUARIO' => $usuariocrea,  
                'OF_TERMINAL' => $OF_TERMINAL,
                'OF_FECREG' => $fechaRegistro,
                'OF_FECMOD' => $fechaRegistro,   
                //'OF_IMAGEN' => $descripcion,   
                'OF_RESPONSABLE' => $OF_RESPONSABLE,  
                'OF_SUPERVISOR' => $OF_SUPERVISOR,  
                'OF_IDOFICINA' => $OF_IDOFICINA,    
                'OF_IDPISO' => $OF_IDPISO,   
                
            );
    
            
            
            if(!$this->BienModel->save($bien)){
                $this->output->set_status_header(500);
            }else{
                 
                $this->session->set_flashdata('msg','La bien a sido registrada'); 
                redirect(base_url('biens'));
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
        if (empty($bien[ "OF_IMAGEN" ])){


        }else{
        assert( '0x' == substr( $bien[ "OF_IMAGEN" ], 0, 2 ));

        // Skip first two chars
        $hexDigits = substr( $bien[ "OF_IMAGEN" ], 2, strlen( $bien[ "OF_IMAGEN" ] ) -2 );

        $bien[ "OF_IMAGEN" ] = base64_encode(pack('H*', $hexDigits  ));
        //$bien[ "OF_IMAGEN" ] =  base64_encode($bien['OF_IMAGEN']);
        //$bien[ "OF_IMAGEN" ] =  $im;
        }
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



}
