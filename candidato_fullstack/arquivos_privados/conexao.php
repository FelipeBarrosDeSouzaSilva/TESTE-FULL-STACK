<?php

	class Conexao {
		private $host = 'localhost';
		private $dbname = 'tarefas';
		private $usuario = 'root';
		private $senha = '';
		
		public function conectar(){
			try {
				$conexao = new PDO(
					"mysql:host=$this->host;dbname=$this->dbname",
					"$this->usuario",
					"$this->senha"
				);
			
			return $conexao;
			
			}catch(PDOException $erro){
				echo '<p>'.$erro.'</p>';
			}
		}
	}