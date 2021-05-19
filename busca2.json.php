<?php
	require_once "Conexao.php";
	require_once "class/Pessoa.php";
	require_once "class/Dependente.php";
	require_once "DependenteDAO.php";

	$filtro = "";
	if (isset($_GET["filtro"]))
		$filtro = $_GET["filtro"];

	$con = new Conexao();
	$dao = new DependenteDAO($con);

	$dependentes = new Dependente();
	$dependentes = $dao->buscaDependentes($filtro);

	echo json_encode($dependentes);

	$con->desconectar();
?>