<?php 
	require_once "class/Pessoa.php";
	require_once "Conexao.php";
	class PessoaDAO{
		private $conexao;

		function __construct(Conexao $conexao) {
			$this->conexao = $conexao;
		}

		function buscaTodos($filtro = "") {
			$dados = [];
			$pessoa = new Pessoa();
			$sql = "
				SELECT
					pessoas.id,
					pessoas.nome
				FROM
					pessoas
				WHERE
					pessoas.nome LIKE '%$filtro%'
				ORDER BY
					pessoas.nome
			";
			$query = mysqli_query($this->conexao->getConection(), $sql);
			while ($registro = mysqli_fetch_assoc($query)) {
				$pessoa->id = $registro['id'];
				$pessoa->nome = $registro['nome'];

				$dados["pessoas"][] = ['id' => $pessoa->id,
					'nome' => $pessoa->nome];

			}

			return $dados;
		}

		function cadastrarPessoa(Pessoa $pessoa) {
			if ($pessoa->nome == "") {
				return false;
			}
			
				$sql ="INSERT INTO pessoas
					(nome)
				VALUES
					('$pessoa->nome')
				  ";
			return mysqli_query($this->conexao->getConection(), $sql);
		}

		function buscaSelection() {
			$sql = "SELECT * from pessoas";
			return mysqli_query($this->conexao->getConection(), $sql);

		}

	}
 ?>