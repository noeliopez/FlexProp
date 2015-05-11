<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {


	public function index()
	{		
		if($this->eslogin->is_logged_in() == TRUE){
			$this->load->model('prop_model');
			$lista=$this->prop_model->lista();
			$datos= array('lista' => $lista, 'sesion' =>$this->session->userdata);
			$this->load->view('inicio',$datos);
		}else{
			$this->load->view('inicio',$this->session->userdata);		
			echo "Antes debes loguearte";
			redirect('/login/', 'location');
		}
// codigo que queramos ejecutar
	}
	/// function para saber si el usuario esta loguiado

	public function desde($numero)
	{
		echo $numero;
	}
}