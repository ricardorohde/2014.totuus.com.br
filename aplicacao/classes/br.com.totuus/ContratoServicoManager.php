<?php 

require_once ("GenericManager.php");

class ContratoServico {  
 
 	public $seqContrato;
	public $seqServico;
	public $dscUrlServico;

}

class ContratoServicoManager extends GenericManager {

	public function save($contratoServico) {

		$query = "INSERT INTO contrato_servico (seq_contrato, seq_servico, dsc_url_servico) VALUES (".$contratoServico->seqContrato.", ".$contratoServico->seqServico.", '".$contratoServico->dscUrlServico."')";

		return $this->executeQuery($query);

	}

	/*
	public function delete($idContratoServico) {

		$query = "DELETE FROM contrato_servico WHERE  = ".$idContratoServico;

		return $this->executeQuery($query);

 	}

	public function update($contratoServico) {

		$query = "UPDATE contrato_servico SET ".  
   "seq_contrato = ".$contratoServico->seqContrato.", ". 
 "seq_servico = ".$contratoServico->seqServico.", ". 
 " dsc_url_servico = '".$contratoServico->dscUrlServico."' WHERE  = ".$contratoServico-> ;

		return $this->executeQuery($query);

	}

	public function findById($idContratoServico) {

		$query = "SELECT * FROM contrato_servico WHERE  = ".$idContratoServico;

		$result = $this->executeQuery($query);

		$contratoServico = new ContratoServico();

		while($item = mysql_fetch_array($result)) 
		{
			$contratoServico->seqContrato = $item['seq_contrato'];   
			$contratoServico->seqServico = $item['seq_servico'];   
			$contratoServico->dscUrlServico = $item['dsc_url_servico'];   
		}

		return $contratoServico;

	}

	public function findAll() {

		$query = "SELECT * FROM contrato_servico";

		return $this->executeQuery($query);

	}
	*/

}

?>