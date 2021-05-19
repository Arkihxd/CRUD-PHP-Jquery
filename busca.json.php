<?php
	require_once "Conexao.php";
	require_once "class/Pessoa.php";
	require_once "PessoaDAO.php";

	$filtro = "";
	if (isset($_GET["filtro"]))
		$filtro = $_GET["filtro"];

	$con = new Conexao();
	$dao = new PessoaDAO($con);

	$pessoas = new Pessoa();
	$pessoas = $dao->buscaTodos($filtro);

	echo json_encode($pessoas);

	$con->desconectar();
?>