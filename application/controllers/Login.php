<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Auth');
 
        $this->load->library(array('form_validation','session'));
             $this->load->helper(array('auth/login_rules'));

   
    }
    public function index(){
        $this->load->view('login');
    }
    public function validate(){
     
        $rules = getLoginRules();
        $this->form_validation->set_rules($rules);

        if($this->form_validation->run() === FALSE){
            $this->load->view('login');

        }else{
   
            $usr = $this->input->post('usuario');
            $pass = $this->input->post('password');
            if(!$res = $this->Auth->login($usr,$pass)){
                //echo json_encode(array('msg' => 'Verifique sus credenciales'));
                //$this->output->set_status_header(401);
                $datan['noingreso'] = 'Verifique sus credenciales';
                 $this->load->view('login',$datan);
                return;
            }
            $data = array(
                'CODUSUARIO' => $res->CODUSUARIO,
                'CODEMPRESA' => $res->CODEMPRESA,
                'TIPUSUARIO' => $res->TIPUSUARIO,
                'NOMUSUARIO' => $res->NOMUSUARIO,
                'is_logged' => TRUE,
            );
            $this->session->set_userdata($data);
            $this->session->set_flashdata('msg','Bienvenido al sistema '.$data['NOMUSUARIO']);
            //echo json_encode(array("url" => base_url('dashboard')));
               $view = $this->load->view('welcome_message','',true);
                $this->getTemplate($view);
               //$this->load->view('dashboard');  
        }
    }
    public function logout(){
        $vars = array('CODUSUARIO','CODEMPRESA','TIPUSUARIO','NOMUSUARIO','is_logged');
        $this->session->unset_userdata($vars);
        $this->session->sess_destroy();
        redirect('login');
    }
    public function getTemplate($view){
        $data = array(
            'head' => $this->load->view('templates/header','',TRUE),
            'nav' => $this->load->view('templates/menu','',TRUE),
            'aside' => $this->load->view('templates/barra_sesion','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('templates/footer','',TRUE),
        );
        $this->load->view('dashboard',$data);
    }
}