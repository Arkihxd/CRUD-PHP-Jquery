<?php 
	require_once "class/Dependente.php";
	require_once "class/Pessoa.php";
	require_once "Conexao.php";
	class DependenteDAO{
		private $conexao;

		function __construct(Conexao $conexao) {
			$this->conexao = $conexao;
		}

		function buscaDependentes($filtro) {
			$dados = [];
			$dependente = new Dependente();
			$sql = "
				SELECT
					dependentes.id,
					dependentes.nome,
					dependentes.pessoa
				FROM
					dependentes
				WHERE
					dependentes.pessoa = $filtro
				ORDER BY
					dependentes.pessoa
			";
			$query = mysqli_query($this->conexao->getConection(), $sql);
			while ($registro = mysqli_fetch_assoc($query)) {
				$dependente->id = $registro['id'];
				$dependente->nome = $registro['nome'];
				$dependente->pessoa = $registro['pessoa'];

			 $dados[] = ['id' => $dependente->id,
			 			'nome' => $dependente->nome,
						'pessoa' => $dependente->pessoa];
			}
			return $dados;


		}

		function cadastrarDependente(Dependente $dependente) {
				$sql ="INSERT INTO dependentes
					(nome, pessoa)
				VALUES
					('$dependente->nome', $dependente->pessoa)
				  ";
			return mysqli_query($this->conexao->getConection(), $sql);
		}


		function excluiDependentes($id) {
			$sql = "DELETE FROM dependentes
				WHERE id = $id";
			return mysqli_query($this->conexao->getConection(), $sql);
		}

	}
 ?>