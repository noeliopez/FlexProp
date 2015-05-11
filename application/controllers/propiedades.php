<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propiedades extends CI_Controller {

 function __construct(){
      parent::__construct();
	  $this->load->model('prop_model');
    }
	
	public function index()
	{
        if($this->eslogin->is_logged_in())
        {
            $tipo = $this->input->get('tipo');
            $operacion = $this->input->get('operacion');
            $localidad = $this->input->get('localidad');
            $hambientes = $this->input->get('hambientes');
            
			if(!$this->$tipo)
            {
                $lista=$this->prop_model->lista(); 
                $datos = array( 'sesion' => $this->session->userdata, 'prop' => $lista ); 
                $this->load->view('propiedades',$datos); 
			}
            else
            {
                $lista=$this->prop_model->buscar($this->$tipo,$this->$operacion,$this->$localidad,$this->$hambientes);                
                $datos = array( 'sesion' => $this->session->userdata, 'prop' => $lista ); 
                $this->load->view('propiedades',$datos); 
			}
        }
        else
        {
			$error ="Antes debes loguearte";
			$data = array('Error' => $error, $this->session->userdata);
			$this->load->view('login',$data);	
		}

	}

	public function ver($id){
	
		if($this->eslogin->is_logged_in() == TRUE){ // Comprueba que esté loguiado
		
			$lista=$this->prop_model->trae_prop($id); // Trae los datos de las propiedades y los guardo en una variable
			$datos = array( 'sesion' => $this->session->userdata, 'prop' => $lista ); // Guardo la info para la vista, en una variable
			//Perdon vero por este choclo, pero tenia fiaca de hacer otra vista! ajaj
			echo '<link rel="stylesheet" href="'.base_url().'css/bootstrap.css">';
		echo "<h2>".$lista['tipo']." en ".$lista['operacion']."</h2>";
		echo "<img src='".base_url()."img/".$lista['imgurl']."' width='90%'  class='img-polaroid'/>";
		echo "<h3>Descripci&oacute;n <small>".$lista['direccion'].", ".$lista['localidad'].", ".$lista['provincia'].", ".$lista['pais']."</small></h3>";
		echo "<h5>Hambientes: ".$lista['hambientes']."</h5>";
		echo "<h5>Precio: ".$lista['precio']."</h5>";
		
		echo "<h3>Ubicacion</h3>";
		echo '<iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=46.677964,107.138672&amp;ie=UTF8&amp;hq=&amp;t=m&amp;z=16&amp;ll='.$lista['latitud'].','.$lista['longitud'].'&amp;output=embed"></iframe>';
		}else{
			//Si no està loguiado le pegamos una pata.., lo mandamos al login con un lindo mensajito de error :B
			$error ="Antes debes loguearte";
			$data = array('Error' => $error, $this->session->userdata);
			$this->load->view('login',$data);	
		}
		
	}
	

	public function agregar()
	{
		
		if($this->eslogin->is_logged_in() == TRUE){ 
		
			if(!$this->input->post('tipo')){
			$lista=$this->prop_model->lista();
			$datos = array( 'sesion' => $this->session->userdata, 'prop' => $lista );
			$this->load->view('agregar_prop',$datos);
			}else{
				
				$config['upload_path'] = './img/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '5000';
				$config['max_width']  = '5000';
				$config['max_height']  = '2500';
				
				$this->load->library('upload', $config);
			
				if ( ! $this->upload->do_upload())
				{
					$msj = array('sesion' => $this->session->userdata, 'error' => $this->upload->display_errors());
					
					$this->load->view('agregar_prop', $msj);
				}
				else
				{
					if($file_data = $this->upload->data()){
						
					
					
					$datos=array(
						'tipo'=> $this->input->post('tipo'),
						'operacion' => $this->input->post('operacion'),
						'pais' => $this->input->post('pais'),
						'provincia' => $this->input->post('provincia'),
						'localidad' => $this->input->post('localidad'),
						'direccion' => $this->input->post('direccion'),
						'latitud' => $this->input->post('lat'),
						'longitud' => $this->input->post('lng'),
						'moneda' => $this->input->post('moneda'),
						'precio' => $this->input->post('precio'),
						'hambientes' => $this->input->post('hambientes'),
						'favorito' => $this->input->post('favorito'),
						'activo' => $this->input->post('activo'),
						'imgurl' => $file_data['file_name']
						);
						$p=$this->prop_model->agregar($datos);	
						if($p == false){
							$error= "Disculpe las molestias, Hubo un problema y no se pudo agregar su propiedad";
							$datos = array( 'sesion' => $this->session->userdata, 'error' => $error );
							$this->load->view('agregar_prop',$datos);
						}else{
						$msj= "Su propiedad fue agregada exitosamente ".$file_data['file_name'];
							$datos = array( 'sesion' => $this->session->userdata, 'msj' => $msj );
							$this->load->view('agregar_prop',$datos);
						}
					
				}
				}
						
					}
			
		}else{
			$error ="Antes debes loguearte";
			$data = array('Error' => $error, $this->session->userdata);
			$this->load->view('login',$data);	
		}
		
		
	}
	
	public function eliminar($id)
	{
		if(isset($id)){
			if($this->prop_model->eliminar($id)){
				echo "Eliminado exitosamente!";
			redirect(base_url().'propiedades/', 'location');
			} else {
				echo "No pudo ser eliminado!, vuelve a intentarlo mas tarde";
				sleep(2);
			redirect(base_url().'propiedades/', 'location');
			}
			
		} else { $error ="Antes debes loguiarte";
			$data = array('Error' => $error, $this->session->userdata);
			$this->load->view('login',$data);	 }
			
	}
	
	
	
	public function modificar($id)
	{
		
	if($this->eslogin->is_logged_in() == TRUE){
			if(!$this->input->post('tipo')){
			$lista=$this->prop_model->trae_prop($id);
			$datos = array( 'sesion' => $this->session->userdata, 'prop' => $lista, 'id' => $id );
			$this->load->view('modificar_prop',$datos);
			}else{
				
				$config['upload_path'] = './img/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '5000';
				$config['max_width']  = '5000';
				$config['max_height']  = '2500';
				
				$this->load->library('upload', $config);
			
				if ( ! $this->upload->do_upload())
				{
					$msj = array('sesion' => $this->session->userdata, 'error' => $this->upload->display_errors());
					
					$this->load->view('modificar_prop', $msj);
				}
				else
				{
					if($file_data = $this->upload->data()){
						
					
					
					$datos=array(
						'tipo'=> $this->input->post('tipo'),
						'operacion' => $this->input->post('operacion'),
						'pais' => $this->input->post('pais'),
						'provincia' => $this->input->post('provincia'),
						'localidad' => $this->input->post('localidad'),
						'direccion' => $this->input->post('direccion'),
						'latitud' => $this->input->post('lat'),
						'longitud' => $this->input->post('lng'),
						'moneda' => $this->input->post('moneda'),
						'precio' => $this->input->post('precio'),
						'hambientes' => $this->input->post('hambientes'),
						'favorito' => $this->input->post('favorito'),
						'activo' => $this->input->post('activo'),
						'id'=>$this->input->post('id'),
						'imgurl' => $file_data['file_name']
						);
						$p=$this->prop_model->modificar($datos);	
						if($p == false){
							$error= "Disculpe las molestias, Hubo un problema y no se pudo agregar su propiedad. <a href='".base_url()."propiedades/'>Volver</a>";
							$datos = array( 'sesion' => $this->session->userdata, 'error' => $error );
							$this->load->view('modificar_prop',$datos);
						}else{
						$msj= "Su propiedad fue modificada exitosamente. <a href='".base_url()."propiedades/'>Volver</a>";
							$datos = array( 'sesion' => $this->session->userdata, 'msj' => $msj );
							$this->load->view('modificar_prop',$datos);
						}
					
				}
				}
						
					}
			
		}else{
				
				
				/*
				$datos=array(
				'tipo'=> $this->input->post('tipo'),
				'operacion' => $this->input->post('operacion'),
				'pais' => $this->input->post('pais'),
				'provincia' => $this->input->post('provincia'),
				'localidad' => $this->input->post('localidad'),
				'direccion' => $this->input->post('direccion'),
				'latitud' => $this->input->post('lat'),
				'longitud' => $this->input->post('lng'),
				'moneda' => $this->input->post('moneda'),
				'precio' => $this->input->post('precio'),
				'hambientes' => $this->input->post('hambientes'),
				'favorito' => $this->input->post('favorito'),
				'activo' => $this->input->post('activo'),
				'id'=> $this->input->post('id'),
				'imgurl' => '2.jpg'
				);
				$p=$this->prop_model->modificar($datos);	
				if($p == false){
					$error= "Disculpe las molestias, Hubo un problema y no se pudo modificar su propiedad";
					$datos = array( 'sesion' => $this->session->userdata, 'error' => $error );
					$this->load->view('modificar_prop',$datos);
				}else{
				$msj= "Su propiedad fue modificada exitosamente. <a href='".base_url()."propiedades/'>Volver</a>";
					$datos = array( 'sesion' => $this->session->userdata, 'msj' => $msj );
					$this->load->view('modificar_prop',$datos);
				}
			}
			
		}else{*/
			$error ="Antes debes loguearte";
			$data = array('Error' => $error, $this->session->userdata);
			$this->load->view('login',$data);	
		}
	
		
	}
	
	
	public function enviar($id){
	
		if($this->eslogin->is_logged_in() == TRUE){ // Comprueba que esté loguiado
		echo '<link rel="stylesheet" href="'.base_url().'css/bootstrap.css">';
			if(!$this->input->post('email')){
			$this->load->helper('form');
			
			echo form_open('propiedades/enviar/'.$id);
			$email = array(
              'name'        => 'email',
              'placeholder'	=> 'Ejemplo@ejemplo.com',
			  'type'		=> 'email',
              'maxlength'   => '100',
              'size'        => '50',
			  'class'		=> 'span2',
              'style'       => 'width:50%'
            );
			
			echo form_input($email);
			echo "<br>";
			$mensajin = array(
              'name'        => 'mensajin',
              'placeholder'       => 'Escribe aqui tu mensaje personal',
              
              'size'        => '50',
              'style'       => 'width:50%',
            );
			echo $id;
			echo form_textarea($mensajin);
			$dataenviar = array(
				'name' => 'enviar',
				'id' => 'button',
				'value' => 'Enviar',
				'type' => 'submit',
				'class' => 'btn btn-primary'
			);
			echo form_submit('Enviar','Enviar');
			echo form_close();
			
			}else{
			$this->load->library('email');
			$lista=$this->prop_model->trae_prop($id); // Trae los datos de las propiedades y los guardo en una variable
			$sesion=$this->session->userdata; // Guardo la info para la vista, en una variable
			
			$mensajin="<h2>".$lista['tipo']." en ".$lista['operacion']."</h2>
			<img src='".base_url()."img/".$lista['imgurl']."' width='90%'  />
			<h3>Descripci&oacute;n <small>".$lista['direccion'].", ".$lista['localidad'].", ".$lista['provincia'].", ".$lista['pais']."</small></h3>
			<h5>Hambientes: ".$lista['hambientes']."</h5>
			<h5>Precio: ".$lista['precio']."</h5>";
			
			
			$this->email->from('noeel.sp@hotmail.com','Noel');
			$this->email->to($this->input->post('mail')); 
			
			$this->email->subject($lista['tipo']." en ".$lista['direccion']);
			$this->email->message($mensajin);
			
			$this->email->send();
			
			echo $this->email->print_debugger();
			// Esto dice que se manda, pero nunca me llego un solo mail, quizas sea por que uso Hotmail y tiene mucho filtro, pero son las dos y media de la mañana.. sabras comprender jajaja
			
			
			}
		}else{
			//Si no està loguiado le pegamos una pata.., lo mandamos al login con un lindo mensajito de error :B
			$error ="Antes debes loguearte";
			$data = array('Error' => $error, 'sesion' => $this->session->userdata);
			$this->load->view('login',$data);	
		}
		
	}
	
	public function favorito($id)
	{
		/* -- No llegue con los tiempos!
		if(isset($id)){
			if($p=$this->prop_model->trae_prop($id)){
				echo $p['favorito'];
			} else { echo "No se pudo hacer la consulta"; }
			
			} else {
				echo "No se pudo hacer la consulta";
				
			}*/
			
			
	}
	
}