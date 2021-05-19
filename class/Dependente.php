<?php 
    require_once "Pessoa.php";
	class Dependente{
		public $id;
		public $nome;
        public $pessoa;

    	public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function get() {
            return $this->nome;
        }

        public function getPessoa() {
            return $this->pessoa;
        }

        public function setPessoa($pessoa) {
            $this->pessoa = $pessoa;
        }
    }   

 ?>