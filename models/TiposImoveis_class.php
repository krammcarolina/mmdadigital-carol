<?php

class TiposImoveis {
	
  private $_id      = null;
  private $_nome    = null;
  private $result;
  public  $_data    = array();
  public  $_item    = array();

	/**
	 * Public constructor 
	 * establishes a DB connection based on a helper class
	 * usage: 
	 * $p = new Contatos(); 
	 * $p->db = connectDB::getConn(); 
	 *
	 */
 	public function TiposImoveis() {
 	 global $db;
 		$db = new MysqliDb ('localhost', 'root', '', 'mmdadigital_teste');
 	} 


	/**
	 * Public Get one Object by key with no condition 
	 * additional filtering with conditions
	 * ex: $condition = ' status=1 '
	 * set debug to TRUE if you want to see SQL
	 *
	 * @param int $id
	 * @param string $condition
	 * @param boolean $debug
	 * @return array
	 */
		public function getObject($id,$condition=NULL,$debug=NULL) {
			global $db;

			$this->_item=array();
			$SQL = "SELECT * FROM tiposimoveis WHERE id = '".($id)."' ";
			if($condition!=NULL) {
				$SQL .= " AND ". $condition;
			}
			$SQL .= "  LIMIT 1 ";
			if($debug!=NULL) {
				 echo " <!-- Debug SQL: ".$SQL." -->\n ";
				 
			}
			$this->result = $db->rawQuery($SQL);
			
			return $this->result;
		}

	/**
	 * Public Get Full Object List with no condition
	 * get filtered Object List with conditions
	 * ex: $condition = ' id=3 AND (foo=bar OR bar<=foo)'
	 * set debug to true if you want to see SQL
	 *
	 * Also supports ORDER BY AND LIMIT
	 *
	 * @param string $condition
	 * @param string $order_by_and_or_limit
	 * @param boolean $debug
	 * @return array
	 */
	public function getList($condition=NULL,$order_by_and_or_limit=NULL,$debug=NULL)  {		
	 	global $db;
 
		$SQL = "SELECT * FROM tiposimoveis";
                 
		if($condition!=NULL) {
			$SQL .= " WHERE " . $condition;
		}
  
		if($order_by_and_or_limit!=NULL) {
			$SQL .= $order_by_and_or_limit ;
		}
   
  		$this->result = $db->rawQuery($SQL);
		
  		if($debug!=NULL) {
			 echo " <!-- Debug SQL: ".$SQL." -->\n ";
		}    

		$this->_data = array();
		
  		for ($i = 0, $d = @mysql_num_rows($this->result); $i < $d; $i++) {
			$this->_data[$i] = mysql_fetch_assoc($this->result);
		}
  
		return $this->result;
	}

	/**
	 * Public method to save an object to DB 
	 * works only if getObject() was called in advance
	 *
	 * @param boolean $debug
	 * @return boolean
	 */
	public function _updateDB($debug=NULL) 
	{
		global $db;

		$bfirstfield = true;
		$virgula = "";
		if($this->_item['id']!='')
		{
			$SQL = "UPDATE tiposimoveis SET ";
					if(!empty($this->_item['tipo'])) {
						$SQL .= $virgula ." `tipo`='".($this->_item['tipo'])."'";				
						if($bfirstfield){
							$virgula=", ";
							$bfirstfield = false;
						}
					}
					
										
			$SQL .= " WHERE `id`='".($this->_item['id'])."' LIMIT 1";
			if($debug!=NULL) {
				 echo " <!-- Debug SQL: ".$SQL." -->\n ";
			}
			
			$this->result = $db->rawQuery($SQL);	   		

			if ($this->result === false)
				return(false);
			else
				return(true);
		}
		else
		{
			return(false);
		}
	}

	/**
	 * Public method to save a new object to DB 
	 *
	 * @param boolean $debug
	 * @return boolean
	 */
	public function createNewObject($debug=NULL) 
	{
	 	global $db;
		$SQL = "INSERT INTO tiposimoveis  ";
		$SQL .= "(tipo)";
		$SQL .= " VALUES (  
				'".($this->_item['tipo'])."'
				)";
   
		if($debug!=NULL) {
		  echo " <!-- Debug SQL: ".$SQL." -->\n ";
		}

	   $this->result = $db->rawQuery($SQL);
	   return($this->result);
	}

	/**
	 * Public method to delete an object from DB 
	 *
	 * @param int $key_val
	 * @param boolean $debug
	 * @return boolean
	 */
	public function deleteObject($key_val) 
	{
		global $db;


		if($this->existeVinculoImovel($key_val))
			return false; //retorna false para avisar que não foi possível excluir.


		if($key_val!='')
		{
			$SQL = "DELETE FROM tiposimoveis  ";
			$SQL .= "  WHERE id =".($key_val);
			
			$this->result = $db->rawQuery($SQL);

			if ($this->result === false)
				return(false);
			else
				return(true);
		}
	}

	//verifica se existe vinculo de tipo de imovel com a tabela de imoveis
	private function existeVinculoImovel($iIdTipoImovel)
	{
		global $db;
		
		$SQL = "SELECT 1 
				FROM tiposimoveis
					INNER JOIN imoveis ON imoveis.tipoimovel = tiposimoveis.id 
				WHERE tiposimoveis.id =".($iIdTipoImovel);
		
		$this->result = $db->rawQuery($SQL);

		if ($db->count == 1)
			return true;
		else
			return false;
		
	}

	/**
	 * Private method Fatal Error 
	 *
	 * @return string
	 */
	private function fatal_error($error_msg="") 
	{
		$the_error .= "\n\n\nSQL error: ".mysql_error()."\n";
		$the_error .= "SQL error code: ".mysql_errno()."\n";
		$the_error .= "Date: ".date("l dS of F Y h:i:s A");
		$out = '<html><head><title>FastDB-Generator MySQL Error</title></head><body>
                        &nbsp;<br /><br /><blockquote><b>There has been an error with your database.</b><br />
                        <br /><br /><b>Error Returned</b><br />
                        <form name="mysql"><textarea rows="15" cols="60">".htmlspecialchars($error_msg)."".$the_error."</textarea></form><br />
                        We apologise for any inconvenience<br />fastDB-Generator by http://simpeligent.ch</blockquote></body></html>';
		print $out;
		exit();
	}
 

}
?>