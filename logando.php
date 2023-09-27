<?php
session_start();
include_once './conexao/conexao.php';


if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

//Efetuando Query no banco se o usuário existe e credenciais são verdadeiras
$query = "SELECT * FROM usuarios WHERE email = '{$usuario}' and senha = md5('{$senha}')";



//Efetuando busca no banco se o usuário tem nivel de acesso administrador
$resultado = mysqli_query($conexao, $query);
	if(mysqli_num_rows($resultado) == 1){
		 
		 
		
		//Efetuando a Query
		$queryAdmin = $conexao->query("SELECT * FROM usuarios WHERE  email = '{$usuario}' AND instrutor = 1");
		$busca = mysqli_fetch_assoc($queryAdmin);
	
		
		//Se o usuário do administrador ele ira acessar o menu completo.
		if($busca >= 1){
		$dados = mysqli_fetch_array($resultado);
		$_SESSION['logado'] = true;
		$_SESSION['admin_logado'] = true;
		$_SESSION['id'] = $dados ['id'];
		header('Location: dashboard.php');
		$conexao->close();
		exit();
		
		

		
		
		//Se o usuário for comum ele entrara no menu parcial
		}else{
		$_SESSION['nao_autorizado'] = true;
		header('Location: index.php');
		$conexao->close();
		exit();


		}
	}else{

		$_SESSION['nao_autenticado'] = true;
		header('Location: index.php');
		$conexao->close();
		exit();


		}
	
?>