<?php

class Imoveis {

	private	$result;
	public	$_data         = array();
	public	$_item         = array();

	/**
	* Public constructor 
	* establishes a DB connection based on a helper class
	* usage: 
	* $p = new Imoveis(); 
	* $p->db = connectDB::getConn(); 
	*
	*/
 	public function Imoveis() {
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
		$this->_item=array();
		$SQL = "SELECT imoveis.*, estados.sigla as uf FROM imoveis 
					INNER JOIN estados on estados.id = imoveis.estado
				WHERE imoveis.id = ".$id ;
		if($condition!=NULL) {
			$SQL .= " AND ". $condition;
		}
		$SQL .= "  LIMIT 1 ";
		
		echo $SQL;
			 
		
		$result = mysql_query($SQL,$this->db) or $this->fatal_error("MySQL Query Error: $SQL");

		if ($row = mysql_fetch_array($result)) {
			$this->_item['id']          = $row['id'];
			$this->_item['tipoimovel']  = $row['tipoimovel'];
			$this->_item['tipoanuncio'] = $row['tipoanuncio'];
			$this->_item['rua']         = $row['rua'];
			$this->_item['numero']      = $row['numero'];
			$this->_item['cidade']      = $row['cidade'];
			$this->_item['bairro']      = $row['bairro'];
			$this->_item['estado']      = $row['estado'];
			$this->_item['descricao']   = $row['descricao'];
			$this->_item['uf']   = $row['uf'];
		}
		return $this->_item;
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
 
		$SQL = "SELECT imoveis.*, estados.sigla as uf FROM imoveis 
				INNER JOIN estados on estados.id = imoveis.estado ";
                 
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
		$bfirstfield = true;
		$virgula = "";
		if($this->_item['id']!='')
		{
			$SQL = "UPDATE imoveis SET ";
					if(!empty($this->_item['id'])) {						
						$SQL .= $virgula ." `id`='".($this->_item['id'])."'";				
						if($bfirstfield){
							$virgula=", ";
							$bfirstfield = false;
						}
					}
					
					
					if(!empty($this->_item['tipoimovel'])) {
						$SQL .= $virgula ." `tipoimovel`='".($this->_item['tipoimovel'])."'";
						if($bfirstfield) {
							$virgula=", ";
							$bfirstfield = false;
						}
					}
     
     if(!empty($this->_item['tipoanuncio'])) {
						$SQL .= $virgula ." `tipoanuncio`='".($this->_item['tipoanuncio'])."'";
						if($bfirstfield) {
							$virgula=", ";
							$bfirstfield = false;
						}
					}
     
     if(!empty($this->_item['rua'])) {
						$SQL .= $virgula ." `rua`='".($this->_item['rua'])."'";
						if($bfirstfield) {
							$virgula=", ";
							$bfirstfield = false;
						}
					}
     
     if(!empty($this->_item['numero'])) {
						$SQL .= $virgula ." `numero`='".($this->_item['numero'])."'";
						if($bfirstfield) {
							$virgula=", ";
							$bfirstfield = false;
						}
					}
     
     if(!empty($this->_item['cidade'])) {
						$SQL .= $virgula ." `cidade`='".($this->_item['cidade'])."'";
						if($bfirstfield) {
							$virgula=", ";
							$bfirstfield = false;
						}
					}
						
										
			$SQL .= " WHERE `id`='".($this->_item['id'])."' LIMIT 1";
			if($debug!=NULL) {
				 echo " <!-- Debug SQL: ".$SQL." -->\n ";
			}
			
			$result = mysql_query($SQL,$this->db);
			if ($result === false)
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
	public function createNewObject($debug=NULL) {
	  global $db;
		$SQL = "INSERT INTO imoveis  ";
		$SQL .= "(tipoimovel, tipoanuncio, rua, numero, cidade, bairro, estado, descricao)";
		$SQL .= " VALUES (  
			".($this->_item['tipoimovel']).",
			".($this->_item['tipoanuncio']).",
			'".($this->_item['rua'])."',
			'".($this->_item['numero'])."',
			'".($this->_item['cidade'])."',
			'".($this->_item['bairro'])."',
			".($this->_item['estado']).",
			'".($this->_item['descricao'])."'
		)";
    
		if($debug!=NULL) {
		  echo " <!-- Debug SQL: ".$SQL." -->\n ";
		}

	  $this->result = $db->rawQuery($SQL);
	  return($db->getInsertId());
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

		//Excluir imagens do imovel
		$SQL = "DELETE FROM imagens  ";
		$SQL .= "  WHERE imovel=".($key_val);
		$this->result = $db->rawQuery($SQL);
		
		//Desvincular contatos do imovel [contatosimoveis]
		$SQL = "DELETE FROM contatosimoveis  ";
		$SQL .= "  WHERE imovel=".($key_val);
		$this->result = $db->rawQuery($SQL);
				
		$SQL = "DELETE FROM imoveis  ";
		$SQL .= "  WHERE id =".($key_val);			
		$this->result = $db->rawQuery($SQL);			
	
	}


	public function getImoveisRelacionados($p_cidade, $p_idImovelAtual){
		global $db;

		$sql = "SELECT rand() as rand, imoveis.*
				FROM `imoveis` 
				WHERE  imoveis.cidade='{$p_cidade}'
				and imoveis.id <> {$p_idImovelAtual}
				ORDER by rand limit 3";
		//falta botar a CIDADE pois está em TESTE								
		$query = $db->rawQuery($sql);

		//inicializa classe contatos
		$oContato = new Contatos();

		//inicializa classe de imagens
		$oImagem = new Imagens();

		$arr = array();
		$total = sizeof($query);
		for ($i=0; $i < $total; $i++) { 
			
			//busca o primeiro contato do imovel
			$arrContato = $oContato->getPrimeiroContato($query[$i]['id']);

			//busca imagem do imovel
			$arrImagem = $oImagem->getList("imovel=".$query[$i]['id'], " ORDER BY id LIMIT 1");

			//monta array de dados para retorno
			$arr[] = ["id" => $query[$i]['id'],
					  "imagem" => $arrImagem[0]['imagem'],
			 		  "responsavel" => $arrContato['responsavel'],
			 		  "contato" => $arrContato['contato']];
		}		
		return $arr;
	}

	public function getContatosImovel($p_idImovel){
		global $db;

		$sql = "SELECT imoveis.id, contatos.responsavel, fc.tipo, fc.contato
				FROM contatos
					INNER JOIN contatosimoveis as ci on ci.contato = contatos.id
				    INNER JOIN imoveis on imoveis.id = ci.imovel
				    INNER JOIN formascontatos as fc on fc.contatoid = contatos.id
				WHERE
					imoveis.id={$p_idImovel}
				ORDER BY contatos.responsavel, fc.tipo";

		$query = $db->rawQuery($sql);
				
		return $query;
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