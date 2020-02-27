 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Piso extends CI_Controller {

     public function __construct(){
        parent::__construct();
         $this->load->library('session');
        $this->load->library(array('form_validation','email','pagination'));
        $this->load->helper(array('maestros/sede_rules','string'));
        $this->load->model('PisoModel');
        $this->load->helper('date');
    }
    public function index($offset = 0){
        $data = $this->PisoModel->getPisos();
        $config['base_url'] = base_url('pisos/index');
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

        $page = $this->PisoModel->getPaginatePiso($config['per_page'],$offset);
        
        $this->getTemplate($this->load->view('Piso',array('data' => $page),true));
        
    }
    public function delete(){
        $_id = $this->input->post('id',true);

        if(empty($_id)){
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('msg'=>'El id no puede ser vacio')));
        }else{
            $this->PisoModel->deletepiso($_id);
            $this->output
                ->set_status_header(200);
        }
    }
    public function create(){
        $vista = $this->load->view('create_piso','',true);
        $this->getTemplate($vista);
    }
    
    public function update(){
            $_id = $this->input->post('idPiso');
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
                $this->PisoModel->updatePiso($_id,$data);
                $this->session->set_flashdata('msg','El piso '.$descripcion.' fue actualizado correctamente');
                redirect('pisos');
            //}
    
    }

    public function store(){
        $descripcion = $this->input->post('SE_DESCRIPCION');
        $abreviatura = $this->input->post('SE_ABREVIATURA');
        $estado = $this->input->post('SE_ESTADO');
        $lastid  = $this->PisoModel->getlastid();
         
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
            $piso = array(
                'SE_ID' =>  $lastid,
                'SE_DESCRIPCION' => $descripcion,
                'SE_ABREVIATURA' => $abreviatura,
                'SE_ESTADO' => 1,
                'SE_FECREG' => $fechaRegistro,
                'SE_FECMOD' => $fechaRegistro,
                'SE_USUARIO' => $usuariocrea,
            );
    
            
            
            if(!$this->PisoModel->save($piso)){
                $this->output->set_status_header(500);
            }else{
                 
                $this->session->set_flashdata('msg','El piso a sido registrado'); 
                redirect(base_url('pisos'));
            }


        //}

        $vista = $this->load->view('admin/create_user','',true);
        $this->getTemplate($vista); 
    }
    public function edit($id = 0){
        $piso = $this->PisoModel->getPiso($id);
        $view = $this->load->view('edit_piso',array('piso' => $piso),true);
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
         $data1['idscript'] = "show_pisos.js";   
        $data = array(
            'head' => $this->load->view('templates/header','',TRUE),
            'nav' => $this->load->view('templates/menu','',TRUE),
            'aside' => $this->load->view('templates/barra_sesion','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('templates/footer',$data1,TRUE),
        );
        $this->load->view('dashboard',$data);
    }

     public function get_piso_data()
    {
       $get_student = $this->PisoModel->getPisos();
 
        echo  json_encode($get_student); 

        
    }
}
