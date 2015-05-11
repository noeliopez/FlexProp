<?php
class Cartelera_model extends CI_Model {

  function __construct(){
      parent::__construct();
    
    }
		
   public function index()
	{
    $this->load->database();
	}
	
	public function nuevo($datos){
		$this->load->helper('date');
		$datainsert = array(
			'nombre' => $datos['nombre'],
			'mensaje' => $datos['mensaje'],
			'fecha' => now()
		);
		$p=$this->db->insert('cartelera',$datainsert);	
		return $p;
	}
	
   public function quehaydenuevoviejo() {

  	$q = $this->db->get('cartelera');
  	if($q->num_rows() >0) {
  	/*foreach ($q->result() as $row) {
  		$data = array(
  			
  			'id' => $row->id,
			'nombre' => $row->nombre,
			'mensaje' => $row->mensaje,
			'fecha' => $row->fecha
  );
 
 }*/
  return $q->result();
 
 } else {
  return false;
 
 }
 
 }
   
   
   function trae_lista(){
      $ssql = "select * from lista";
      return mysql_query($ssql);
   }

}
?> 