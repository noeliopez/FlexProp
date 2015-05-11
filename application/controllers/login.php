<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
    {
        parent:: __construct();
        $this->load->model('login_model');   
    }
	
	
	public function index()
	{
		if($this->eslogin->is_logged_in())
        {
			redirect('inicio', 'location');
		}
        else
        {
            //validar credenciales
            if(!$this->input->post('username')){
                $this->load->view('login');
            }
            else
            {
                $usuario = $this->input->post('username');
                $contraseña = $this->input->post('password');
                $q = $this->login_model->ValCred($usuario,$contraseña);

                if(!$q)
                {
                    //Cargar la plantilla con el contenido
                    $data['Error'] = 'Usuario y/o Password incorrectos';
                    $this->load->view('login',$data);
                }
                else
                {
                    //si las credenciales son validas crear la sesion del usuario
                    $this->__setsess($q);
                    redirect('inicio', 'location');
                }
            }
        }
	}

    function logout()
    {
        $this->session->sess_destroy();
        redirect('/login','location');
    }

    function __setsess($data)
    {
        $this->session->set_userdata($data);
    }
    
}