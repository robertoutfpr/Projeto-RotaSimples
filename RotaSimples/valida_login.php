﻿<?php

    $servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "rotas";
	
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

?>

<?php

session_start();
$usuariot = $_POST['usuario'];
$senhat = $_POST['senha'];


$result = mysqli_query($conn, "SELECT * FROM usuarios WHERE login='$usuariot' AND senha='$senhat' LIMIT 1");
$resultado = mysqli_fetch_assoc($result);


if(empty($resultado)){

	$_SESSION['loginErro'] = "Usuário ou senha Inválido";
	

	header("Location: index.php");
}else{

	$_SESSION['usuarioId'] 			= $resultado['id'];
	$_SESSION['usuarioNome'] 		= $resultado['nome'];
	$_SESSION['usuarioNivelAcesso'] = $resultado['nivel_acesso_id'];
	$_SESSION['usuarioLogin'] 		= $resultado['login'];
	$_SESSION['usuarioSenha'] 		= $resultado['senha'];
	
	if($_SESSION['usuarioNivelAcesso'] == 1){
		header("Location: perfil-administrador.php");
	}else{
		header("Location: perfil-usuario.php");
	}
}
?>