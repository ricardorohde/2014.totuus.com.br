<?php 

require_once ("GenericManager.php");

class Camera {  
 
 	public $seqCamera;
	public $dscCliente;
	public $dscUrl;
	public $dscPorta;
	public $dscNomeCamera;
	public $dscModelo;

}

class CameraManager extends GenericManager {

	public function save($camera) {

		$query = "INSERT INTO camera (dsc_cliente, dsc_url, dsc_porta, dsc_nome_camera, dsc_modelo) VALUES ('".$camera->dscCliente."', '".$camera->dscUrl."', '".$camera->dscPorta."', '".$camera->dscNomeCamera."', '".$camera->dscModelo."')";

		return $this->executeQuery($query);

	}

	public function delete($idCamera) {

		$query = "DELETE FROM camera WHERE seq_camera = ".$idCamera;

		return $this->executeQuery($query);

 	}

	public function update($camera) {

		$query = "UPDATE camera SET ".  
   " dsc_cliente = '".$camera->dscCliente."', ". 
  " dsc_url = '".$camera->dscUrl."', ". 
  " dsc_porta = '".$camera->dscPorta."', ". 
  " dsc_nome_camera = '".$camera->dscNomeCamera."', ". 
  " dsc_modelo = '".$camera->dscModelo."' WHERE seq_camera = ".$camera->seqCamera ;

		return $this->executeQuery($query);

	}

	public function findById($idCamera) {

		$query = "SELECT * FROM camera WHERE seq_camera = ".$idCamera;

		$result = $this->executeQuery($query);

		$camera = new Camera();

		while($item = mysql_fetch_array($result)) 
		{
			$camera->seqCamera = $item['seq_camera'];   
			$camera->dscCliente = $item['dsc_cliente'];   
			$camera->dscUrl = $item['dsc_url'];   
			$camera->dscPorta = $item['dsc_porta'];   
			$camera->dscNomeCamera = $item['dsc_nome_camera'];   
			$camera->dscModelo = $item['dsc_modelo'];   
		}

		return $camera;

	}

	public function findAll() {

		$query = "SELECT * FROM camera order by dsc_cliente, dsc_nome_camera";

		return $this->executeQuery($query);

	}

}

?>