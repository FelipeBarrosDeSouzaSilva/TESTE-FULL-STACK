<?php

	class Obj {
		private $id_cliente;
		private $id_produto;
		private $numeroPedido;
		private $data_cadastro;
		private $nomeCliente;
		private $cpf;
		private $email;
		private $dtPedido;
		private $codPedido;
		private $nomeProduto;
		private $valorUnitario;
		private $quantidade;
		
		public function __get($atributo){
				return $this->$atributo;
		}
		public function __set($atributo, $valor){
				
				$this->$atributo = $valor;
			
		}
	}