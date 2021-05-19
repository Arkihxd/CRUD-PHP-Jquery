<?php 
	require_once "class/Dependente.php";
	require_once "DependenteDAO.php";
	require_once "Conexao.php";

	$con = new Conexao();

	$dependente = new Dependente();
	$dao = new DependenteDAO($con);

	$dependente->nome = $_POST['nome'];
	$dependente->pessoa = $_POST['pessoa'];

	$sucesso = $dao->cadastrarDependente($dependente);

	if ($sucesso){
		$mensagem = "<strong>$dependente->nome cadastrado com sucesso!</strong>";
	}else{
		$mensagem = "Não foi possivel cadastrar";
	}

	$con->desconectar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SBI - Sistema de Busca Integrado</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <link rel="stylesheet" href="styles.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
  <link rel="stylesheet" href="styles.css">
  
</head>
<body>
	<nav class="light-green">
    <div class="nav-wrapper light-green container">
      <a href="index.php" class="brand-logo">SBI</a>
      <div>
        <ul class="right hide-on-med-and-down">
          <li><a href="index.php">Busca</a></li>
          <li><a href="InserirPessoa.php">Cadastrar Pessoa</a></li>
          <li><a href="InserirDependente.php">Cadastrar Dependente</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="section no-pad-bot grey lighten-5" id="index-banner">
    <div class="container">
      <br>
      <h1 class="header center light-green-text ">Sistema de Busca Integrado</h1>
      <div class="row center">
        <h5 class="header col s12 light">Suas ações são computadas em tempo real sem requerer atualização da página.</h5>
      </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section center">
    	<div class="card">
	    	<div class= "card-content">
		      <?php 
		      	echo "<span>$mensagem</span>";
		       ?>
	       </div>
       </div>
    </div>
    <a href="inserirDependente.php"><button class="btn btn-info m-3" type="submit">Voltar</button></a>

    
  <div class="row spacing"></div>
   
  </div>

  <footer class="page-footer light-green ">
    <div class="container">
      <div class="row">
        <div class="col l12 s12">
          <h5 class="white-text">Usando JavaScript para melhorar sua experiência</h5>
          <p class="white-text lighten-4">Afim de privilegiar o uso de seus dados, tal como dar-lhe uma experiência mais fluída, o Sistema de Busca Integrado (SBI), oferece busca em tempo real e atualização dos objetos sem necessidade de atualizar.</p>
        </div>

      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      	<a class="white-text" href="http://materializecss.com">Made with Materialize</a>
      </div>
    </div>
  </footer>

  <!--  Scripts-->
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="ajax.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('select').formSelect();
  });
  </script>

  </body>
</html>
