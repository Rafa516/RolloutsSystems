<?php 

namespace Projeto\Model;


use \Projeto\Model;
use \Projeto\DB\Sql;
use \Projeto\Mailer;

//Classe Usuario(Usuários, com seus métodos específicos)
class Usuario extends Model {

	const SESSION = "Usuario";
	const ERROR = "UsuarioError";
	const ERROR_REGISTER = "UsuarioErrorRegister";
	const SUCCESS = "UsuarioSucesss";
	const SECRET = "Php7_Secret";
	const SECRET_IV = "Php7_Secret_IV";


	//Método estático para verificação e validação do usuário comum e do administrador
	public static function login($login, $senha)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios  WHERE login = :login", array(
			":login"=>$login
		)); 

		if (count($results) === 0) {
			throw new \Exception("Falha na sua tentativa de login.Conta não cadastrada");
		}


		$data = $results[0];


		if (password_verify($senha, $data['senha']) === true) {

			$Usuario = new Usuario();

			$data['nome_user'] = utf8_encode($data['nome_user']);

			$Usuario->setData($data);


			$_SESSION[Usuario::SESSION] = $Usuario->getValues();

			return $Usuario;

		} else {

			throw new \Exception("Falha na sua tentativa de login. Senha inválida");



		}

	}



	//Método estático para verificar se o email do usuário já existe
	public static function checkEmailExist($email)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE email = :email", [
			':email'=>$email
		]);

		return (count($results) > 0);

	}

	//Método estático para verificar se o login do usuário já existe
	public static function checkLoginExist($login)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE login = :login", [
			':login'=>$login
		]);

		return (count($results) > 0);

	}

	
 	//Método estático para encerrar a sessão do usuário (logout)
	public static function logout()
	{

		$_SESSION[Usuario::SESSION] = NULL;

	}

	//Método estático para criptografar as senhas registradas dos usuários
	public static function getPasswordHash($senha)
	{

		return password_hash($senha, PASSWORD_DEFAULT, [
			'cost'=>12
		]);

	}

	//Método estático para pegar a sessão dos usuários
	public static function getFromSession()
	{

		$Usuario = new Usuario();

		if (isset($_SESSION[Usuario::SESSION]) && (int)$_SESSION[Usuario::SESSION]['id_usuario'] > 0) {

			$Usuario->setData($_SESSION[Usuario::SESSION]);

		}

		return $Usuario;

	}

	//Método estático para verificar a autenticidade do usuário comum, e verificar se ele esta com a sessão iniciada ou não.
	public static function verificaLogin($inadmin = true)
	{

		if (	
			(bool)$_SESSION[Usuario::SESSION]["id_usuario"] !== $inadmin
			||
			(int)$_SESSION[Usuario::SESSION]["inadmin"] !== 0
		) {
			
			header("Location: /");
			exit;

		}

	}

	//Método estático para verificar a autenticidade do usuário Administrador, e verificar se ele esta com a sessão iniciada ou não.
	public static function verificaLoginAdmin($inadmin = true)
	{

		if (
			
			(bool)$_SESSION[Usuario::SESSION]["id_usuario"] !== $inadmin
			||
			(int)$_SESSION[Usuario::SESSION]["inadmin"] !== 1
		) {
			
			header("Location: /admin/login");
			exit;

		}

	}

	
	//Método para selecionar todos os usuários e passar a ID como parâmetro
	public function get($id_usuario)
	{
	 
		 $sql = new Sql();
		 
		 $results = $sql->select("SELECT * FROM tb_usuarios  WHERE id_usuario = :id_usuario", array(
		 ":id_usuario"=>$id_usuario
		 ));

		 
		 $this->setData($results[0]);
	 
	 }

	 //Método para salvar os dados do procedimento de registro do usuário comum.
	public function cadastroUsuario()
	{

		$sql  = new Sql();

		$results = $sql->select("CALL sp_cadastro_usuario(:nome_user,:localidade,:login,:senha,:email,:inadmin,:empresa,:cargo,:foto)",array(
			":nome_user"=>$this->getnome_user(),
			":localidade"=>$this->getlocalidade(),
			":login"=>$this->getlogin(),
			":senha"=>Usuario::getPasswordHash($this->getsenha()),
			":email"=>$this->getemail(),
			":inadmin"=>$this->getinadmin(),
			":empresa"=>$this->getempresa(),
			":cargo"=>$this->getcargo(),
			":foto"=>$this->getfoto()

		));

		$this->setData($results[0]);

	}

	 //Método para editar os dados do procedimento  do usuário comum.
	public function editarUsuario()
	{

		$sql  = new Sql();

		$results = $sql->select("CALL sp_editar_usuario(:id_usuario,:nome_user,:localidade,:empresa,:inadmin,:cargo)",array(
			":id_usuario"=>$this->getid_usuario(),
			":nome_user"=>$this->getnome_user(),
			":localidade"=>$this->getlocalidade(),
			":empresa"=>$this->getempresa(),
			":inadmin"=>$this->getinadmin(),
			":cargo"=>$this->getcargo(),
		));

		$this->setData($results[0]);

	}

	public function editarSenha()
	{

		$sql  = new Sql();

		$results = $sql->select("CALL sp_editar_senha(:id_usuario,:senha)",array(
			":id_usuario"=>$this->getid_usuario(),
			":senha"=>Usuario::getPasswordHash($this->getsenha()),
		));

		$this->setData($results[0]);

	}


	//Método para editar a imagem do perfil
	public function alterarImagemPerfil()
    {
        $sql = new Sql();
 
        $results = $sql->select('CALL sp_alterar_imagem_perfil(:id_usuario,:foto)', [
            ":id_usuario" => $this->getid_usuario(),
            ":foto"=>Usuario::getImage($this->getfoto())
           ,
        ]);

        if($this->getfoto() != 0)
        {

	        $img = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
				"res" . DIRECTORY_SEPARATOR . 
				"ft_perfil" . DIRECTORY_SEPARATOR . 
				$this->getfoto();
				unlink($img);

		}
		else
		{
			$img = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
				"res" . DIRECTORY_SEPARATOR . 
				"ft_perfil" . DIRECTORY_SEPARATOR . 
			     $this->getfoto();
			     $img;

				
		}

    }
	
	//Método estático para nome_userar e mover a imagem para a pasta de destino 
    public static function getImage($value)
	{
		$name_file = date('Ymdhms');

		$directory = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"ft_perfil" . DIRECTORY_SEPARATOR .
			$name_file;	
			     			
			$foto = isset($_FILES['foto']) ? $_FILES['foto'] : FALSE;
			
				if (!$foto['error']){
					
					 move_uploaded_file($foto['tmp_name'],$directory);

					return $name_file;

				} else {

					return 0;

				}
	}

	//Método para deletar os usuários
	public function deletarUsuario()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_usuarios WHERE id_usuario = :id_usuario", [
			':id_usuario'=>$this->getid_usuario()
		]);

			if($this->getinadmin() == 1 && $this->getfoto() != 0){

				$img = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
					"res" . DIRECTORY_SEPARATOR . 
					"ft_perfil" . DIRECTORY_SEPARATOR . 
					$this->getfoto();
					unlink($img);
			}
			else{

				$img = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
					"res" . DIRECTORY_SEPARATOR . 
					"ft_perfil" . DIRECTORY_SEPARATOR . 
					$this->getfoto();

			}

	}

	//PAGINAÇÃO DA PÁGINA  USUÁRIOS
	public  function getPageUsers($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios  ORDER BY data_registro desc
			LIMIT $start, $itemsPerPage");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}
	

	//BUSCA DA PÁGINA USUÁRIOS

	public static function getPageSearchUsers($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios
			WHERE id_usuario LIKE :search  OR email LIKE :search OR nome_user LIKE :search OR login LIKE :search
			OR cargo LIKE :search  OR empresa LIKE :search  
			ORDER BY data_registro DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	//Método estático para verificar o total de usuários registrados
	public static function total()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");
	  
		return ['totalUsuarios'=>(int)$resultTotal[0]["nrtotal"]];
	}
	
   
	//PAGINAÇÃO DA PÁGINA MEUS rollouts
	public  function getPage($page = 1, $itemsPerPage = 5)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM  tb_rollouts WHERE id_usuario = :id_usuario ORDER BY data_registro DESC
			LIMIT $start, $itemsPerPage", [	 

			':id_usuario'=>$this->getid_usuario()
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}


//PAGINAÇÃO DA PÁGINA MEUS rollouts Em Brasilia
	public  function getPageRolloutBsb($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM  tb_rollouts WHERE id_usuario = :id_usuario AND cidade = 'Brasília' ORDER BY dt_data_rollout DESC
			LIMIT $start, $itemsPerPage", [	 

			':id_usuario'=>$this->getid_usuario()
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA MEUS rollouts DE BRASILIA

	public static function getPageSearchBsb($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario AND cidade = 'Brasília'
			WHERE nome LIKE :search OR id_rollout LIKE :search OR situacao LIKE :search OR nome_user LIKE :search 
			ORDER BY dt_data_rollout DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}



//PAGINAÇÃO DA PÁGINA MEUS rollouts NO RIO DE JANEIRO
	public  function getPageRolloutRJ($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM  tb_rollouts WHERE id_usuario = :id_usuario AND cidade = 'Rio de Janeiro' ORDER BY dt_data_rollout DESC
			LIMIT $start, $itemsPerPage", [	 

			':id_usuario'=>$this->getid_usuario()
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}


//BUSCA DA PÁGINA MEUS rollouts DO RIO DE JANEIRO

public static function getPageSearchRj($search, $page = 1, $itemsPerPage = 25)
{

	$start = ($page - 1) * $itemsPerPage;

	$sql = new Sql();

	$results = $sql->select("
		SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario AND cidade = 'Rio de Janeiro'
		WHERE nome LIKE :search OR id_rollout LIKE :search OR situacao LIKE :search OR nome_user LIKE :search 
		ORDER BY dt_data_rollout DESC
		LIMIT $start, $itemsPerPage;
	", [
		':search'=>'%'.$search.'%'
	]);

	$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	return [
		'data'=>$results,
		'total'=>(int)$resultTotal[0]["nrtotal"],
		'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
	];

}


//PAGINAÇÃO DA PÁGINA MEUS rollouts EM RECIFE
public  function getPageRolloutRec($page = 1, $itemsPerPage = 25)
{

	$start = ($page - 1) * $itemsPerPage;

	$sql = new Sql();

	$results = $sql->select("
		SELECT SQL_CALC_FOUND_ROWS *
		FROM  tb_rollouts WHERE id_usuario = :id_usuario AND cidade = 'Recife' ORDER BY dt_data_rollout DESC
		LIMIT $start, $itemsPerPage", [	 

		':id_usuario'=>$this->getid_usuario()
	]);

	$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	return [
		'data'=>$results,
		'total'=>(int)$resultTotal[0]["nrtotal"],
		'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
	];

}

//BUSCA DA PÁGINA MEUS rollouts DE RECIFE 

public static function getPageSearchRec($search, $page = 1, $itemsPerPage = 25)
{

	$start = ($page - 1) * $itemsPerPage;

	$sql = new Sql();

	$results = $sql->select("
		SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario AND cidade = 'Recife'
		WHERE nome LIKE :search OR id_rollout LIKE :search OR situacao LIKE :search OR nome_user LIKE :search 
		ORDER BY dt_data_rollout DESC
		LIMIT $start, $itemsPerPage;
	", [
		':search'=>'%'.$search.'%'
	]);

	$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	return [
		'data'=>$results,
		'total'=>(int)$resultTotal[0]["nrtotal"],
		'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
	];

}

//PAGINAÇÃO DA PÁGINA MEUS rollouts EM FLORIANOPOLIS
public  function getPageRolloutFlr($page = 1, $itemsPerPage = 25)
{

	$start = ($page - 1) * $itemsPerPage;

	$sql = new Sql();

	$results = $sql->select("
		SELECT SQL_CALC_FOUND_ROWS *
		FROM  tb_rollouts WHERE id_usuario = :id_usuario AND cidade = 'Florianópolis' ORDER BY dt_data_rollout DESC
		LIMIT $start, $itemsPerPage", [	 

		':id_usuario'=>$this->getid_usuario()
	]);

	$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	return [
		'data'=>$results,
		'total'=>(int)$resultTotal[0]["nrtotal"],
		'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
	];

}


//BUSCA DA PÁGINA MEUS rollouts DE RECIFE 

public static function getPageSearchFlr($search, $page = 1, $itemsPerPage = 25)
{

	$start = ($page - 1) * $itemsPerPage;

	$sql = new Sql();

	$results = $sql->select("
		SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario AND cidade = 'Florianópolis'
		WHERE nome LIKE :search OR id_rollout LIKE :search OR situacao LIKE :search OR nome_user LIKE :search 
		ORDER BY dt_data_rollout DESC
		LIMIT $start, $itemsPerPage;
	", [
		':search'=>'%'.$search.'%'
	]);

	$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	return [
		'data'=>$results,
		'total'=>(int)$resultTotal[0]["nrtotal"],
		'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
	];

}


//PAGINAÇÃO DA PÁGINA MEUS termos Em Brasilia
public  function getPageTermoBsb($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM  tb_termos WHERE id_usuario = :id_usuario AND cidade = 'Brasília' ORDER BY dt_data DESC
			LIMIT $start, $itemsPerPage", [	 

			':id_usuario'=>$this->getid_usuario()
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA MEUS TERMOS DE BRASÍLIA

	public static function getPageSearchTermoBsb($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario AND cidade = 'Brasília'
			WHERE nome_t LIKE :search OR id_termos LIKE :search OR dt_data LIKE :search OR n_chamadoT LIKE :search
			OR nome_user LIKE :search
			OR situacao_t LIKE :search 
			ORDER BY dt_data DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//PAGINAÇÃO DA PÁGINA MEUS termos Em Rio de Janeiro
public  function getPageTermoRj($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM  tb_termos WHERE id_usuario = :id_usuario AND cidade = 'Rio de Janeiro' ORDER BY dt_data DESC
			LIMIT $start, $itemsPerPage", [	 

			':id_usuario'=>$this->getid_usuario()
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA MEUS TERMOS DO RIO DE JANEIRO

	public static function getPageSearchTermoRj($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario AND cidade = 'Rio de Janeiro'
			WHERE nome_t LIKE :search OR id_termos LIKE :search OR dt_data LIKE :search OR n_chamadoT LIKE :search
			OR nome_user LIKE :search
			OR situacao_t LIKE :search 
			ORDER BY dt_data DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}


//PAGINAÇÃO DA PÁGINA MEUS termos Em Recife
public  function getPageTermoRec($page = 1, $itemsPerPage = 25)
{

	$start = ($page - 1) * $itemsPerPage;

	$sql = new Sql();

	$results = $sql->select("
		SELECT SQL_CALC_FOUND_ROWS *
		FROM  tb_termos WHERE id_usuario = :id_usuario AND cidade = 'Recife' 
		ORDER BY dt_data DESC
		LIMIT $start, $itemsPerPage", [	 

		':id_usuario'=>$this->getid_usuario()
	]);

	$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	return [
		'data'=>$results,
		'total'=>(int)$resultTotal[0]["nrtotal"],
		'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
	];

}

//BUSCA DA PÁGINA MEUS TERMOS DO RIO DE RECIFE

	public static function getPageSearchTermoRec($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario AND cidade = 'Recife'
			WHERE nome_t LIKE :search OR id_termos LIKE :search OR dt_data LIKE :search OR n_chamadoT LIKE :search
			OR nome_user LIKE :search
			OR situacao_t LIKE :search 
			ORDER BY dt_data DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//PAGINAÇÃO DA PÁGINA MEUS termos Em FLORIANOPOLIS
	public  function getPageTermoFlr($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM  tb_termos WHERE id_usuario = :id_usuario AND cidade = 'Florianópolis' 
			ORDER BY dt_data DESC
			LIMIT $start, $itemsPerPage", [	 

			':id_usuario'=>$this->getid_usuario()
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}
	
//BUSCA DA PÁGINA MEUS TERMOS DO RIO DE RECIFE

	public static function getPageSearchTermoFlr($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario AND cidade = 'Florianópolis'
			WHERE nome_t LIKE :search OR id_termos LIKE :search OR dt_data LIKE :search OR n_chamadoT LIKE :search
			OR nome_user LIKE :search
			OR situacao_t LIKE :search 
			ORDER BY dt_data DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}


//BUSCA DA PÁGINA USUÁRIOS

	public static function getPageSearchUsuarios($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios
			WHERE id_usuario LIKE :search  OR email LIKE :search OR nome_user LIKE :search OR login LIKE :search
			OR cargo LIKE :search  OR empresa LIKE :search  
			ORDER BY data_registro DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}




//Método estático que seta a mensagem de erro
	public static function setError($msg)
	{

		$_SESSION[Usuario::ERROR] = $msg;

	}

//Método estático que pega a mensagem de erro
	public static function getError()
	{

		$msg = (isset($_SESSION[Usuario::ERROR]) && $_SESSION[Usuario::ERROR]) ? $_SESSION[Usuario::ERROR] : '';

		Usuario::clearError();

		return $msg;

	}

//Método estático que limpa a mensagem de erro
	public static function clearError()
	{

		$_SESSION[Usuario::ERROR] = NULL;

	}
//Método estático que seta a mensagem de sucesso
	public static function setSuccess($msg)
	{

		$_SESSION[Usuario::SUCCESS] = $msg;

	}

//Método estático que seta a mensagem de sucesso
	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Usuario::SUCCESS]) && $_SESSION[Usuario::SUCCESS]) ? $_SESSION[Usuario::SUCCESS] : '';

		Usuario::clearSuccess();

		return $msg;

	}
//Método estático que limpa a mensagem de sucesso
	public static function clearSuccess()
	{

		$_SESSION[Usuario::SUCCESS] = NULL;

	}

	public static function setErrorRegister($msg)
	{

		$_SESSION[Usuario::ERROR_REGISTER] = $msg;

	}

	public static function getErrorRegister()
	{

		$msg = (isset($_SESSION[Usuario::ERROR_REGISTER]) && $_SESSION[Usuario::ERROR_REGISTER]) ? $_SESSION[Usuario::ERROR_REGISTER] : '';

		Usuario::clearErrorRegister();

		return $msg;

	}

	public static function clearErrorRegister()
	{

		$_SESSION[Usuario::ERROR_REGISTER] = NULL;

	}
//Método estático para recuperar senha
public static function getForgot($email,$inadmin = true)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM  tb_usuarios  WHERE email = :email", 
			array(
				":email"=>$email

		));

		if(count($results) === 0)
		{

		throw new \Exception("E-mail não cadastrado no sistema");
			
		}
		else
		{
			$data = $results[0];

			$results2 = $sql->select("CALL sp_userspasswordsrecoveries_create(:id_usuario,:desip)",array(
				":id_usuario"=>$data["id_usuario"],
				":desip"=>$_SERVER["REMOTE_ADDR"]
			));
			
			if(count($results2) === 0)
			{
				throw new \Exception("Não foi possível recuperar a senha.");
				
			}
			else
			{
				$dataRecovery = $results2[0];

				$code = openssl_encrypt($dataRecovery['idrecovery'], 'AES-128-CBC', pack("a16", Usuario::SECRET), 0, pack("a16", Usuario::SECRET_IV));

				$code = base64_encode($code);
		

					$link = "http://rollouts-systems.com.br/resetar-senha?code=$code";
					
						

				$mailer = new Mailer($data['email'], $data['nome_user'], "Redefinir sua senha", "forgot", array(
					"name"=>$data['nome_user'],
					"link"=>$link
				));				

				$mailer->send();

				return $link;
			
			}
		}
	} 

	public static function validForgotDecrypt($code)
	{

		$code = base64_decode($code);

		$idrecovery = openssl_decrypt($code, 'AES-128-CBC', pack("a16", Usuario::SECRET), 0, pack("a16", Usuario::SECRET_IV));

		$sql = new Sql();

		$results = $sql->select("
			SELECT *
			FROM tb_userspasswordsrecoveries a
			INNER JOIN tb_usuarios b USING(id_usuario)
			WHERE
				a.idrecovery = :idrecovery
				AND
				a.dtrecovery IS NULL
				AND
				DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();
		", array(
			":idrecovery"=>$idrecovery
		));

		if (count($results) === 0)
		{

			header("Location: /resetar-senha-erro");
			exit;

		}
		else
		{

			return $results[0];
		}

	}

	


	public static function setForgotUsed($idrecovery)
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_userspasswordsrecoveries SET dtrecovery = NOW() WHERE idrecovery = :idrecovery", array(
			":idrecovery"=>$idrecovery
		));

	}


	
	public function setPassword($senha)
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_usuarios SET senha = :senha WHERE id_usuario = :id_usuario", array(
			":senha"=>$senha,
			":id_usuario"=>$this->getid_usuario()
			
		));

	}



}



 ?>