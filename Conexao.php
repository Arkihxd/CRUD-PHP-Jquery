<?php 
	class Conexao{
		public $servidor = "localhost";
		public $usuario = "root";
		public $senha = "";
		public $bd = "mysql-info16";
		public $conexao = null;

		public function __construct(){
			$this->conect();
		}

		public function getConection(){
			return $this->conexao;
		}

		private function conect(){
			$this->conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha);
			mysqli_select_db($this->conexao, $this->bd);
			mysqli_set_charset($this->conexao, "utf8");
		}
		public function desconectar(){
			mysqli_close($this->conexao);
		}
	}
 ?>