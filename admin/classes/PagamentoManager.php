<?php 

require_once ("GenericManager.php");

class Pagamento {  
 
 	public $seqPagamento;
	public $seqContrato;
	public $staPagamento;
	public $datPagamento;

}

class PagamentoManager extends GenericManager {

	public function save($pagamento) {

		$query = "INSERT INTO pagamento (seq_contrato, sta_pagamento, dat_pagamento) VALUES (".$pagamento->seqContrato.", ".$pagamento->staPagamento.", timestamp(str_to_date('".$pagamento->datPagamento."', '%d/%m/%Y')))";

		return $this->executeQuery($query);

	}

	public function delete($idPagamento) {

		$query = "DELETE FROM pagamento WHERE seq_pagamento = ".$idPagamento;

		return $this->executeQuery($query);

 	}

	public function update($pagamento) {

		$query = "UPDATE pagamento SET ".  
   "seq_contrato = ".$pagamento->seqContrato.", ". 
 "sta_pagamento = ".$pagamento->staPagamento.", ". 
 " dat_pagamento = timestamp(str_to_date('".$pagamento->datPagamento."', '%d/%m/%Y') WHERE seq_pagamento = ".$pagamento->seqPagamento ;

		return $this->executeQuery($query);

	}

	public function findById($idPagamento) {

		$query = "SELECT * FROM pagamento WHERE seq_pagamento = ".$idPagamento;

		$result = $this->executeQuery($query);

		$pagamento = new Pagamento();

		while($item = mysql_fetch_array($result)) 
		{
			$pagamento->seqPagamento = $item['seq_pagamento'];   
			$pagamento->seqContrato = $item['seq_contrato'];   
			$pagamento->staPagamento = $item['sta_pagamento'];   
			$pagamento->datPagamento = $item['dat_pagamento'];   
		}

		return $pagamento;

	}

	public function findAll() {

		$query = "SELECT * FROM pagamento";

		return $this->executeQuery($query);

	}
	
	public function gerarPagamentos($seqContrato){
		$contratoManager = new ContratoManager();
		$contrato = $contratoManager->findById($seqContrato);
		
		$dataInicio_raw = date_format(date_create($contrato->datInicio), 'Y-m-d');
		$dataInicio = strtotime($dataInicio_raw);
		
		for($i = 1; $i <= $contrato->numMesesValidade; $i++) {
			
			$proximaData = mktime(0,0,0, date('m', $dataInicio) + $i, $contrato->numDiaVencimento);
			
			$pagamento = new Pagamento();
			
			$pagamento->seqContrato = $contrato->seqContrato;
			$pagamento->staPagamento = 1;
			$pagamento->datPagamento = date('d/m/Y', $proximaData);
			
			$this->save($pagamento);
			
		}
	}
	
	public function deleteBySeqContrato($seqContrato) {

		$query = "DELETE FROM pagamento WHERE seq_contrato = ".$seqContrato;

		return $this->executeQuery($query);

 	}
 	
 	public function findPagamentosMesCorrente() {
 		
	 	$query = "SELECT pag.seq_pagamento as seq_pagamento, "
	           . " pag.seq_contrato as seq_contrato, "
	           . " pag.sta_pagamento as sta_pagamento,"
	           . " pag.dat_pagamento AS dat_pagamento, "
	           . " con.num_contrato AS num_contrato, "
	           . " con.vlr_contrato AS vlr_contrato, "
	           . " usu.dsc_nom_usuario AS nom_usuario "
	           . "FROM pagamento pag, contrato con, usuario usu "
	           . "WHERE pag.seq_contrato = con.seq_contrato "
	           . " AND con.seq_usuario = usu.seq_usuario "
	           . " AND MONTH(pag.dat_pagamento) = MONTH(now()) "
	           . " AND YEAR(pag.dat_pagamento) = YEAR(now()) "
			   . " ORDER BY pag.dat_pagamento";
		
		return $this->executeQuery($query);
		
 	}

	public function countPagamentos() {

		$query = "SELECT 
  				 (select count(*) from pagamento pag where sta_pagamento = 1 AND MONTH(pag.dat_pagamento) = MONTH(now()) AND YEAR(pag.dat_pagamento) = YEAR(now())) as qtd_abertos, 
                 (select count(*) from pagamento pag where sta_pagamento = 2 AND MONTH(pag.dat_pagamento) = MONTH(now()) AND YEAR(pag.dat_pagamento) = YEAR(now())) as qtd_realizados";

		return $this->executeQuery($query);

	}
	
	public function mudarStatusPagamento($seqPagamento) {
		$query = "UPDATE pagamento SET sta_pagamento = 2 WHERE seq_pagamento = ".$seqPagamento;

		$this->executeQuery($query);
	}
	
}

?>