<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cartelera extends CI_Controller {
	
	public function __construct()
    {
    parent:: __construct();
    $this->load->model('cartelera_model');   
    }
	
	
	public function index()
	{
		if(!$this->eslogin->is_logged_in() == TRUE){
			
			redirect(base_url().'login', 'location');
		}else{
		//validar credenciales
		
			$data['sesion']=$this->session->userdata;
			$this->load->view('cartelera',$data);
			
		
			
			
				/*if($q == false){
		//Cargar la plantilla con el contenido
				$data['sesion']=$this->session->userdata;
				$data['Error'] = 'Usuario y/o Password incorrectos';
				$this->load->view('cartelera',$data);
				}else{
//si las credenciales son validas crear la sesion del usuario
				$data['sesion']=$this->session->userdata;
				$data['msj']="Se agrego su mensaje exitosamente";
				$this->load->view('cartelera',$data);
				}*/
		}
	}

/**
* User Log out
*/
function nuevo(){

$datos = array(
			'nombre' => $this->input->get('nombre'),
			'mensaje' => $this->input->get('mensaje')
			);
			$q = $this->cartelera_model->nuevo($datos);
			
	
}
function consulta(){
	

	$p = $this->cartelera_model->quehaydenuevoviejo();
	
		echo '<table width="100%" border=0>';
echo '<tr>
		<td>#</td>
		<td>Nombre</td>
		<td>Mensaje</td>
		<td>Fecha</td>
	  </tr>';	
	foreach ($p as $c){
		  echo '<tr>
		  <td>'.$c->id.'</td>
			<td>'.$c->nombre.'</td>
			<td>'.$c->mensaje.'</td>
			<td>'.$c->fecha.'</td>
		  </tr>';
	}
	echo '</table>';
	
	}

	
/**
* Colocar los datos en la session
* @param type $data
*/


/**
* confirma si el ususario tiene una session activa
* @return type
*/
	
	/*

	public function index()
	{
		
		// Cargo la lista de inmobiliaria
		$this->load->model('Login_model');
		// 
		$traelista = $this->Login_model->trae_lista();		
		
      	//creo el array con datos de configuración para la vista
      	$datos_vista = array('rs_articulos' => $traelista);
	    
		$this->load->view('login', $datos_vista);
	}
	
	public function desde($numero,$numero2,$numero3)
	{
		echo $numero.", ";
		echo $numero2.", ";
		echo $numero3;
	}
	*/
}