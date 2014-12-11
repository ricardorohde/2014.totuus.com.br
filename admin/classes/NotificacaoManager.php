<?php 

require_once ("GenericManager.php");

class Notificacao {  
 
 	public $seqNotificacao;
	public $seqUsuario;
	public $staNotificacao;
	public $dscTituloNotificacao;
	public $dscNotificacao;
	public $datNotificacao;

}

class NotificacaoManager extends GenericManager {

	public function save($notificacao) {

		$query = "INSERT INTO notificacao (seq_usuario, sta_notificacao, dsc_titulo_notificacao, dsc_notificacao, dat_notificacao) VALUES (".$notificacao->seqUsuario.", ".$notificacao->staNotificacao.", '".$notificacao->dscTituloNotificacao."', '".$notificacao->dscNotificacao."', timestamp(str_to_date('".$notificacao->datNotificacao."', '%d/%m/%Y')))";

		return $this->executeQuery($query);

	}

	public function delete($idNotificacao) {

		$query = "DELETE FROM notificacao WHERE seq_notificacao = ".$idNotificacao;

		return $this->executeQuery($query);

 	}

	public function update($notificacao) {

		$query = "UPDATE notificacao SET ".  
   "seq_usuario = ".$notificacao->seqUsuario.", ". 
 "sta_notificacao = ".$notificacao->staNotificacao.", ". 
 " dsc_titulo_notificacao = '".$notificacao->dscTituloNotificacao."', ". 
  " dsc_notificacao = '".$notificacao->dscNotificacao."', ". 
  " dat_notificacao = timestamp(str_to_date('".$notificacao->datNotificacao."', '%d/%m/%Y') WHERE seq_notificacao = ".$notificacao->seqNotificacao ;

		return $this->executeQuery($query);

	}

	public function findById($idNotificacao) {

		$query = "SELECT * FROM notificacao WHERE seq_notificacao = ".$idNotificacao;

		$result = $this->executeQuery($query);

		$notificacao = new Notificacao();

		while($item = mysql_fetch_array($result)) 
		{
			$notificacao->seqNotificacao = $item['seq_notificacao'];   
			$notificacao->seqUsuario = $item['seq_usuario'];   
			$notificacao->staNotificacao = $item['sta_notificacao'];   
			$notificacao->dscTituloNotificacao = $item['dsc_titulo_notificacao'];   
			$notificacao->dscNotificacao = $item['dsc_notificacao'];   
			$notificacao->datNotificacao = $item['dat_notificacao'];   
		}

		return $notificacao;

	}

	public function findAll() {

		$query = "SELECT * FROM notificacao";

		return $this->executeQuery($query);

	}
	
	public function getQtdNotificacoesNaoLidas($idUsuario) {

		$query = "SELECT count(*) as quantidade FROM notificacao WHERE sta_notificacao = 1 AND seq_usuario = ".$idUsuario;

		return $this->executeQuery($query);

	}
	
	public function getListaNotificacoes($idUsuario) {

		$query = "SELECT * FROM notificacao WHERE seq_usuario = ".$idUsuario;

		return $this->executeQuery($query);

	}
	
	public function gerarNotificacoes($titulo, $descricao){
		$usuarioManager = new UsuarioManager();
		$usuarios = $usuarioManager->findUsuariosAdmin();
		
		while($usuario = mysql_fetch_array($usuarios))
		{
			$notificacao = new Notificacao();
			$notificacao->datNotificacao = date('d/m/Y');
			$notificacao->dscTituloNotificacao = $titulo;
			$notificacao->dscNotificacao = $descricao;
			$notificacao->seqUsuario = $usuario['seq_usuario'];
			$notificacao->staNotificacao = 1;
			
			$this->save($notificacao);
		}
	}
	
	public function updateQtdNotificacoes($idUsuario) {
		$query = "UPDATE notificacao SET sta_notificacao = 2 WHERE seq_usuario = ".$idUsuario;

		$this->executeQuery($query);
	}

}

?>