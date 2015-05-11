<?php
class Prop_model extends CI_Model {

  function __construct(){
      parent::__construct();
    
    }
   public function index()
	{
   
	}
	
	public function buscar($tipo,$operacion,$localidad,$hambientes){
		if(isset($tipo) && $tipo !="Todos"){ $this->db->where("tipo",$tipo);}
		if(isset($operacion) && $operacion !="Todas"){ $this->db->where("operacion",$operacion);}
		if(isset($localidad) && $localidad !="Todas"){ $this->db->where("localidad",$localidad);}
		if(isset($hambientes) && $hambientes !=0){ $this->db->where("hambientes",$hambientes);}
		
	$this->db->order_by("favorito", "desc"); 
  	$p = $this->db->get('propiedades');
  	if($p->num_rows() >0) {
  	
  		/*$data = array(
  			'id_p' => $row->id,
  			'tipo' => $row->tipo,
			'operacion' => $row->operacion,
			'pais' => $row->pais,
			'provincia' => $row->provincia,
			'localidad' => $row->localidad,
			'direccion' => $row->direccion,
  			'moneda' => $row->moneda,
			'precio' => $row->precio,
			'hambientes' => $row->hambientes,
			'favorito' => $row->favorito,
			'activo' => $row->activo,
			'imgurl' => $row->imgurl
  					);*/
 
 		  		return $p->result();
 
 		} else {
  		return false;
 
		 }
	}
	
   public function lista() {
	
  	$this->db->order_by("favorito", "desc"); 
  	$p = $this->db->get('propiedades');
  	if($p->num_rows() >0) {
  	
  		/*$data = array(
  			'id_p' => $row->id,
  			'tipo' => $row->tipo,
			'operacion' => $row->operacion,
			'pais' => $row->pais,
			'provincia' => $row->provincia,
			'localidad' => $row->localidad,
			'direccion' => $row->direccion,
  			'moneda' => $row->moneda,
			'precio' => $row->precio,
			'hambientes' => $row->hambientes,
			'favorito' => $row->favorito,
			'activo' => $row->activo,
			'imgurl' => $row->imgurl
  					);*/
 
 		  		return $p->result();
 
 		} else {
  		return false;
 
		 }
   }
   
   

 
 
 
   public function trae_prop($id) {
  	$this->db->where('id', $id);
  	$p = $this->db->get('propiedades');
  	if($p->num_rows() >0) {
  		foreach($p->result() as $row){
  			$data = array(
				'tipo' => $row->tipo,
				'operacion' => $row->operacion,
				'pais' => $row->pais,
				'provincia' => $row->provincia,
				'localidad' => $row->localidad,
				'direccion' => $row->direccion,
				'latitud' => $row->latitud,
				'longitud' => $row->longitud,
				'moneda' => $row->moneda,
				'precio' => $row->precio,
				'hambientes' => $row->hambientes,
				'favorito' => $row->favorito,
				'activo' => $row->activo,
				'imgurl' => $row->imgurl
  					);
		}
					
 		  		return $data;
 		} else {
  			return false;
 				}
	}
   
 public function agregar($datos) {
	 $datainsert = array( 
			/*'idpropietario' => $datos['idpropietario'],
	 		'idagento' => $datos['idagente'],*/
	 		'tipo' => $datos['tipo'],
			'operacion' => $datos['operacion'],
			'pais' => $datos['pais'],
			'provincia' => $datos['provincia'],
			'localidad' => $datos['localidad'],
			'direccion' => $datos['direccion'],
			'latitud' => $datos['latitud'],
			'longitud' => $datos['longitud'],
			'moneda' => $datos['moneda'],
			'precio' => $datos['precio'],
			'hambientes' => $datos['hambientes'],
			'favorito' => $datos['favorito'],
			'activo' => $datos['activo'],
			'imgurl' => $datos['imgurl']
			);
			
	 
	 
  	$p=$this->db->insert('propiedades',$datainsert);
	
  		if($p == false) {
		 return false; 
		} else{
			 return true;
			 }
	}
   
   public function eliminar($id) {
	
	$p=$this->db->delete('propiedades', array('id' => $id)); 
 	
  		if($p == false) {
		 return false; 
		} else{
			 return true;
			 }
 		  		
 
	}
    public function modificar($datos) {
	 $datainsert = array( 
			/*'idpropietario' => $datos['idpropietario'],
	 		'idagento' => $datos['idagente'],*/
	 		'tipo' => $datos['tipo'],
			'operacion' => $datos['operacion'],
			'pais' => $datos['pais'],
			'provincia' => $datos['provincia'],
			'localidad' => $datos['localidad'],
			'direccion' => $datos['direccion'],
			'latitud' => $datos['latitud'],
			'longitud' => $datos['longitud'],
			'moneda' => $datos['moneda'],
			'precio' => $datos['precio'],
			'hambientes' => $datos['hambientes'],
			'favorito' => $datos['favorito'],
			'activo' => $datos['activo'],
			'imgurl' => $datos['imgurl']
			);
			
	 
	 $this->db->where('id', $datos['id']);
  	$p=$this->db->update('propiedades',$datainsert);
  	
  	
  		if($p == false) {
		 return false; 
		} else{
			 return true;
			 }
 		  		
 
	}
  /* function dame_articulo($id){
      $ssql = "select * from articulo where id=" . $id;
      $rs = mysql_query($ssql);
      if (mysql_numrows($rs)==0){
         return false;
      }else{
         return mysql_fetch_array($rs);
      }
   }*/

}
?> 