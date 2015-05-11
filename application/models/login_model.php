<?php
class Login_model extends CI_Model {

  function __construct(){
      parent::__construct();
    
    }
   public function index()
	{
    $this->load->database();
	}
	
   public function ValCred($username, $password) {
  	$claus = array(
  		'mail' => $username,
  		'contraseña' => $password,
  		
  	);
  	$this->db->where($claus);
  	$q = $this->db->get('usuarios');
  	if($q->num_rows() >0) {
  	foreach ($q->result() as $row) {
  		$data = array(
  			'active' => $row->active,
  			'id' => $row->id,
			'nombre' => $row->nombre,
			'apellido' => $row->apellido,
			'categoria' => $row->categoria,
  			'is_logged_in' => true
  );
 
 }
  return $data;
 
 } else {
  return false;
 
 }
 
 }
   
   
   function trae_lista(){
      $ssql = "select * from lista";
      return mysql_query($ssql);
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