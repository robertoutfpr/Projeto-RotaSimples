﻿<?php
session_start();
session_destroy();

//Removo todas as informações contidas na variaveis globais
unset($_SESSION['usuarioId'],			
$_SESSION['usuarioNome'], 		
$_SESSION['usuarioNivelAcesso'], 
$_SESSION['usuarioLogin'], 		
$_SESSION['usuarioSenha']);

//redirecio o usuário para a página de login
header("Location: index.php");
?>