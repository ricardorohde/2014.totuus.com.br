<?php 

require_once ("GenericManager.php");

class Usuario {  
 
 	public $seqUsuario;
	public $nomUsuarioGpsgate;
	public $dscNomUsuario;
	public $dscEmailUsuario;
	public $dscSenhaUsuario;
	public $dscEndereco;
	public $dscComplemento;
	public $dscCep;
	public $dscPais;
	public $dscUf;
	public $dscCidade;
	public $numTelefone;
	public $numFoneCelular;
	public $codCpfCnpj;
	public $datNascimento;
	public $staAdmin;

}

class UsuarioManager extends GenericManager {

	public function save($usuario) {

		$query = "INSERT INTO usuario (nom_usuario_gpsgate, dsc_nom_usuario, dsc_email_usuario, dsc_senha_usuario, dsc_endereco, dsc_complemento, dsc_cep, dsc_pais, dsc_uf, dsc_cidade, num_telefone, num_fone_celular, cod_cpf_cnpj, dat_nascimento, sta_admin) VALUES ('".$usuario->nomUsuarioGpsgate."', '".$usuario->dscNomUsuario."', '".$usuario->dscEmailUsuario."', '".$usuario->dscSenhaUsuario."', '".$usuario->dscEndereco."', '".$usuario->dscComplemento."', '".$usuario->dscCep."', '".$usuario->dscPais."', '".$usuario->dscUf."', '".$usuario->dscCidade."', '".$usuario->numTelefone."', '".$usuario->numFoneCelular."', '".$usuario->codCpfCnpj."', timestamp(str_to_date('".$usuario->datNascimento."', '%d/%m/%Y')), ".$usuario->staAdmin.")";

		return $this->executeQuery($query);

	}

	public function delete($idUsuario) {

		$query = "DELETE FROM usuario WHERE seq_usuario = ".$idUsuario;

		return $this->executeQuery($query);

 	}

	public function update($usuario) {

		$query = "UPDATE usuario SET ".  
   " nom_usuario_gpsgate = '".$usuario->nomUsuarioGpsgate."', ". 
  " dsc_nom_usuario = '".$usuario->dscNomUsuario."', ". 
  " dsc_email_usuario = '".$usuario->dscEmailUsuario."', ". 
  " dsc_senha_usuario = '".$usuario->dscSenhaUsuario."', ". 
  " dsc_endereco = '".$usuario->dscEndereco."', ". 
  " dsc_complemento = '".$usuario->dscComplemento."', ". 
  " dsc_cep = '".$usuario->dscCep."', ". 
  " dsc_pais = '".$usuario->dscPais."', ". 
  " dsc_uf = '".$usuario->dscUf."', ". 
  " dsc_cidade = '".$usuario->dscCidade."', ". 
  " num_telefone = '".$usuario->numTelefone."', ". 
  " num_fone_celular = '".$usuario->numFoneCelular."', ". 
  " cod_cpf_cnpj = '".$usuario->codCpfCnpj."', ". 
  " dat_nascimento = timestamp(str_to_date('".$usuario->datNascimento."', '%d/%m/%Y')),  sta_admin = ".$usuario->staAdmin." WHERE seq_usuario = ".$usuario->seqUsuario ;

		return $this->executeQuery($query);

	}

	public function findById($idUsuario) {

		$query = "SELECT * FROM usuario WHERE seq_usuario = ".$idUsuario;

		$result = $this->executeQuery($query);

		$usuario = new Usuario();

		while($item = mysql_fetch_array($result)) 
		{
			$usuario->seqUsuario = $item['seq_usuario'];   
			$usuario->nomUsuarioGpsgate = $item['nom_usuario_gpsgate'];   
			$usuario->dscNomUsuario = $item['dsc_nom_usuario'];   
			$usuario->dscEmailUsuario = $item['dsc_email_usuario'];   
			$usuario->dscSenhaUsuario = $item['dsc_senha_usuario'];   
			$usuario->dscEndereco = $item['dsc_endereco'];   
			$usuario->dscComplemento = $item['dsc_complemento'];   
			$usuario->dscCep = $item['dsc_cep'];   
			$usuario->dscPais = $item['dsc_pais'];   
			$usuario->dscUf = $item['dsc_uf'];   
			$usuario->dscCidade = $item['dsc_cidade'];   
			$usuario->numTelefone = $item['num_telefone'];   
			$usuario->numFoneCelular = $item['num_fone_celular'];   
			$usuario->codCpfCnpj = $item['cod_cpf_cnpj'];   
			$usuario->datNascimento = $item['dat_nascimento'];   
			$usuario->staAdmin = $item['sta_admin'];   
		}

		return $usuario;

	}

	public function findAll() {

		$query = "SELECT * FROM usuario";

		return $this->executeQuery($query);

	}
	
	public function findUsuariosByIdContrato($idContrato) {

		$query = "SELECT u.dsc_nom_usuario, u.seq_usuario, uc.seq_contrato 
				  FROM usuario u, usuario_contrato uc 
				  WHERE uc.seq_usuario = u.seq_usuario AND uc.seq_contrato = ".$idContrato;


		return $this->executeQuery($query);

	}
	
	public function findUsuariosByEmailPass($email, $pass) {

		$query = "SELECT nom_usuario_gpsgate 
				  FROM usuario 
				  WHERE dsc_email_usuario = '".$email."' AND dsc_senha_usuario = '".$pass."'";

		return $this->executeQuery($query);

	}
	
	public function countUsuarios() {

		$query = "SELECT 
   				 (select count(*) from usuario where sta_admin = 1) as usu_admin, 
                 (select count(*) from usuario where sta_admin = 2) as usu_sistema";

		return $this->executeQuery($query);

	}

}

?>