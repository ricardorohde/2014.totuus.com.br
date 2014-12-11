<?php 

require_once ("GenericManager.php");

class Contrato {  
 
 	public $seqContrato;
	public $seqUsuarioResponsavel;
	public $seqServico;
	public $numContrato;
	public $datInicio;
	public $numMesesValidade;
	public $dscObservacao;

}

class ContratoManager extends GenericManager {

	public function save($contrato) {

		$query = "INSERT INTO contrato (seq_usuario_responsavel, seq_servico, num_contrato, dat_inicio, num_meses_validade, dsc_observacao) VALUES (".$contrato->seqUsuarioResponsavel.", ".$contrato->seqServico.", ".$contrato->numContrato.", timestamp(str_to_date('".$contrato->datInicio."', '%d/%m/%Y')), ".$contrato->numMesesValidade.", '".$contrato->dscObservacao."')";

		return $this->executeQuery($query);

	}

	public function delete($idContrato) {

		$query = "DELETE FROM contrato WHERE seq_contrato = ".$idContrato;

		return $this->executeQuery($query);

 	}

	public function update($contrato) {

		$query = "UPDATE contrato SET ".  
   "seq_usuario_responsavel = ".$contrato->seqUsuarioResponsavel.", ". 
 "seq_servico = ".$contrato->seqServico.", ". 
 "num_contrato = ".$contrato->numContrato.", ". 
 " dat_inicio = timestamp(str_to_date('".$contrato->datInicio."', '%d/%m/%Y')), ". 
 "num_meses_validade = ".$contrato->numMesesValidade.", ". 
 " dsc_observacao = '".$contrato->dscObservacao."' WHERE seq_contrato = ".$contrato->seqContrato ;

		return $this->executeQuery($query);

	}

	public function findById($idContrato) {

		$query = "SELECT seq_contrato, seq_usuario_responsavel, seq_servico, num_contrato, DATE_FORMAT(dat_inicio, '%d/%m/%Y') as dat_inicio, num_meses_validade, dsc_observacao " . 
				 "FROM contrato WHERE seq_contrato = ".$idContrato;

		$result = $this->executeQuery($query);

		$contrato = new Contrato();

		while($item = mysql_fetch_array($result)) 
		{
			$contrato->seqContrato = $item['seq_contrato'];   
			$contrato->seqUsuarioResponsavel = $item['seq_usuario_responsavel'];   
			$contrato->seqServico = $item['seq_servico'];   
			$contrato->numContrato = $item['num_contrato'];   
			$contrato->datInicio = $item['dat_inicio'];   
			$contrato->numMesesValidade = $item['num_meses_validade'];   
			$contrato->dscObservacao = $item['dsc_observacao'];   
		}

		return $contrato;

	}
	
	public function findMaxSeqContrato() {

		$query = "SELECT max(seq_contrato) as seq_contrato FROM contrato";

		$result = $this->executeQuery($query);
		
		$retorno = 0;

		while($item = mysql_fetch_array($result)) 
		{
			$retorno = $item['seq_contrato']; 
		}

		return $retorno;

	}

	public function findAll() {

		$query = "SELECT * FROM contrato";

		return $this->executeQuery($query);

	}

}

?>