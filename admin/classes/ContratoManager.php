<?php 

require_once ("GenericManager.php");

class Contrato {  
 
 	public $seqContrato;
	public $seqUsuario;
	public $seqServico;
	public $numContrato;
	public $datInicio;
	public $numMesesValidade;
	public $numFormaPagamento;
	public $numDiaVencimento;
	public $vlrContrato;
	public $dscObservacao;

}

class ContratoManager extends GenericManager {

	public function save($contrato) {

		$query = "INSERT INTO contrato (seq_usuario, seq_servico, num_contrato, dat_inicio, num_meses_validade, num_forma_pagamento, num_dia_vencimento, vlr_contrato, dsc_observacao) VALUES (".$contrato->seqUsuario.", ".$contrato->seqServico.", ".$contrato->numContrato.", timestamp(str_to_date('".$contrato->datInicio."', '%d/%m/%Y')), ".$contrato->numMesesValidade.", ".$contrato->numFormaPagamento.", ".$contrato->numDiaVencimento.", ".$contrato->vlrContrato.", '".$contrato->dscObservacao."')";

		return $this->executeQuery($query);

	}

	public function delete($idContrato) {

		$query = "DELETE FROM contrato WHERE seq_contrato = ".$idContrato;

		return $this->executeQuery($query);

 	}

	public function update($contrato) {

		$query = "UPDATE contrato SET ".  
   			"seq_usuario = ".$contrato->seqUsuario.", ". 
 			"seq_servico = ".$contrato->seqServico.", ". 
 			"num_contrato = ".$contrato->numContrato.", ". 
 			" dat_inicio = timestamp(str_to_date('".$contrato->datInicio."', '%d/%m/%Y')), ". 
 			"num_meses_validade = ".$contrato->numMesesValidade.", ". 
 			"num_forma_pagamento = ".$contrato->numFormaPagamento.", ". 
 			"num_dia_vencimento = ".$contrato->numDiaVencimento.", ". 
 			"vlr_contrato = ".$contrato->vlrContrato.", ". 
 			" dsc_observacao = '".$contrato->dscObservacao."' WHERE seq_contrato = ".$contrato->seqContrato ;

		return $this->executeQuery($query);

	}

	public function findById($idContrato) {

		$query = "SELECT * FROM contrato WHERE seq_contrato = ".$idContrato;

		$result = $this->executeQuery($query);

		$contrato = new Contrato();

		while($item = mysql_fetch_array($result)) 
		{
			$contrato->seqContrato = $item['seq_contrato'];   
			$contrato->seqUsuario = $item['seq_usuario'];   
			$contrato->seqServico = $item['seq_servico'];   
			$contrato->numContrato = $item['num_contrato'];   
			$contrato->datInicio = $item['dat_inicio'];   
			$contrato->numMesesValidade = $item['num_meses_validade'];   
			$contrato->numFormaPagamento = $item['num_forma_pagamento'];   
			$contrato->numDiaVencimento = $item['num_dia_vencimento'];
			$contrato->vlrContrato = $item['vlr_contrato'];   
			$contrato->dscObservacao = $item['dsc_observacao'];   
		}

		return $contrato;

	}

	public function findAll() {

		$query = "SELECT * FROM contrato";

		return $this->executeQuery($query);

	}
	
	public function countContratos() {

		$query = "SELECT 
   				 (select count(*) from contrato where seq_servico = 1) as qtd_localizacao, 
                 (select count(*) from contrato where seq_servico = 2) as qtd_monitoramento, 
                 (select count(*) from contrato where seq_servico = 3) as qtd_dns ";

		return $this->executeQuery($query);

	}

	public function gerarNumeroContrato() {
		$queryData = "select curdate() as data_atual, (select count(*) from contrato where date_format(dat_inicio, '%d') = date_format(curdate(), '%d')) as qtd_contratos";
		$result = $this->executeQuery($queryData);
		
		$dataFormatada;
		$sequencialContrato;
		
		while($item = mysql_fetch_array($result)) 
		{
			$data = date_create($item['data_atual']);
			$dataFormatada = date_format($data, 'Ymd'); 
			
			$sequencialContrato = $item['qtd_contratos'] + 1;
			
			if(strlen($sequencialContrato) < 2)
				$sequencialContrato = "0" . $sequencialContrato;
		}
		
		return $dataFormatada . $sequencialContrato;
		 
	}

	public function selectMaxId() {

		$query = "SELECT max(seq_contrato) as seq_contrato FROM contrato";
		$result = $this->executeQuery($query);
		$item = mysql_fetch_array($result);

		return $item['seq_contrato'];

	}
	
}

?>