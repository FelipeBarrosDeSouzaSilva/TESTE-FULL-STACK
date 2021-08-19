<?php

	class Service_query {
		
		private $conexao;
		private $obj;
		
		public function __construct(Conexao $conexao, Obj $obj){
			$this->conexao = $conexao->conectar();
			$this->obj = $obj;
		}
		
		public function atualizar() {
			$query = "update tb_objs set obj = ? where id = ?";
			
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $this->obj->__get('obj'));
			$stmt->bindValue(2, $this->obj->__get('id'));
			$saida = $stmt->execute();
			if($saida){
				header('Location: todas_objs.php?atualizado');
			}
		}
		public function deletar_produto() {
			$query ='delete from produto where numeroPedido = :id';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':id', $this->obj->__get('id_produto'));
			$stmt->execute();
			
			header('Location: index.php?produto_deletado');
		}
		public function atualizar_produto() {
			$query ='update produto set nomeProduto = ?, codBarras = ?, valorUnitario = ? where numeroPedido = ?';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $this->obj->__get('nomeProduto'));
			$stmt->bindValue(2, $this->obj->__get('codPedido'));
			$stmt->bindValue(3, $this->obj->__get('valorUnitario'));
			$stmt->bindValue(4, $this->obj->__get('id_produto'));
			$stmt->execute();
			
			header('Location: index.php?produto_editado');
		}
		
		/*create table pedido(
			numeroPedido int AUTO_INCREMENT PRIMARY KEY,
			nomeCliente varchar(100),
			cpf char(11),
			email varchar(30) not null,
			dtPedido datetime DEFAULT current_timestamp(),
			codBarras varchar(20),
			nomeProduto varchar(100) not null,
			valorUnitario decimal(5,2),
			quantidade int 
		);*/
		public function cadastrar_cliente(){
			$query = "insert into cliente(nomeCliente, cpf, email) values(?, ?, ?);";
			
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $this->obj->__get('nomeCliente'));
			$stmt->bindValue(2, $this->obj->__get('cpf'));
			$stmt->bindValue(3, $this->obj->__get('email'));
			$stmt->execute();
			header('location: index.php?cadastrado');			
		}
		public function cadastrar_produto(){
			$query = "insert into produto(nomeProduto, codBarras, valorUnitario) values(?, ?, ?);";
			/*
				<input name="nomeProduto" placeholder="informe o nome do produto">
			<input name="codBarras" placeholder="informe o código do produto">
			<input name="valorUnitario" placeholder="informe o valor unitario">
			*/
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(1, $this->obj->__get('nomeProduto'));
			$stmt->bindValue(2, $this->obj->__get('codBarras'));
			$stmt->bindValue(3, $this->obj->__get('valorUnitario'));
			$stmt->execute();
			header('location: index.php?produto_cadastrado');			
		}
		
		public function retornar_produtos(){
			$query = "select * from produto";
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	}