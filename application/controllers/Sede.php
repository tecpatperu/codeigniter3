 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Sede extends CI_Controller {

     public function __construct(){
        parent::__construct();
         $this->load->library('session');
        $this->load->library(array('form_validation','email','pagination'));
        $this->load->helper(array('maestros/sede_rules','string'));
        $this->load->model('SedeModel');
        $this->load->helper('date');
$this->load->helper('form');
    }
    public function index($offset = 0){
        $data = $this->SedeModel->getSedes();
        $config['base_url'] = base_url('Sede/index');
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

        $page = $this->SedeModel->getPaginateSede($config['per_page'],$offset);
        
        $this->getTemplate($this->load->view('sede',array('data' => $page),true));
        
    }
    public function delete(){
        $_id = $this->input->post('id',true);

        if(empty($_id)){
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('msg'=>'El id no puede ser vacio')));
        }else{
            $this->SedeModel->deletesede($_id);
            $this->output
                ->set_status_header(200);
        }
    }
    public function create(){
        $vista = $this->load->view('create_sede','',true);
        $this->getTemplate($vista);
    }
    
    public function update(){
            $_id = $this->input->post('idSede');
            $descripcion = $this->input->post('descripcion');
            $abreviatura = $this->input->post('abreviatura');
            $estado = $this->input->post('estado');   
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
                $data = array(
                    'SE_DESCRIPCION' => $descripcion,
                    'SE_ABREVIATURA' => $abreviatura,
                    'SE_ESTADO' => $estado,
                    'SE_FECMOD' => $fechaRegistro,
                    'SE_USUARIO' => $usuariocrea,

                );
                $this->SedeModel->updateSede($_id,$data);
                $this->session->set_flashdata('msg','La sede '.$descripcion.' fue actualizado correctamente');
                redirect('sedes');
            //}
    
    }

    public function store(){
        $id = $this->input->post('SE_ID');
        $descripcion = $this->input->post('SE_DESCRIPCION');
        $abreviatura = $this->input->post('SE_ABREVIATURA');
        $estado = $this->input->post('SE_ESTADO');
        //$lastid  = $this->SedeModel->getlastid();
         
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
            $sede = array(
                'SE_ID' =>  $id,
                'SE_DESCRIPCION' => $descripcion,
                'SE_ABREVIATURA' => $abreviatura,
                'SE_ESTADO' => 1,
                'SE_FECREG' => $fechaRegistro,
                'SE_FECMOD' => $fechaRegistro,
                'SE_USUARIO' => $usuariocrea,
            );
    
            
            
            if(!$this->SedeModel->save($sede)){
              $this->output->set_status_header(500);
                $this->session->set_flashdata('msg', 'Sede ya existe. Ingrese otra sede!');
                 redirect(base_url('sedes'));
            }else{
                 
                $this->session->set_flashdata('msg','La sede a sido registrado'); 
                redirect(base_url('sedes'));
            }


        //}

        $vista = $this->load->view('admin/create_user','',true);
        $this->getTemplate($vista); 
    }
    public function edit($id = 0){
        $sede = $this->SedeModel->getSede($id);
        $view = $this->load->view('edit_sede',array('sede' => $sede),true);
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

    public function get_sede_data()
    {
              $get_student = $this->SedeModel->get_sede_data_model();
 
        echo  json_encode($get_student); 

        
    }

}
