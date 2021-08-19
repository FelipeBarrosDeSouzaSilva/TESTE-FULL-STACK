<?php
	$caminho = "../../arquivos_privados/";
	require $caminho."conexao.php";
	require $caminho."model.php";
	require $caminho."service.php";
	
	$acao = null;
	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
	
	if($acao == 'cadastrar_produto'){
		$obj = new Obj();
		$obj->__set('nomeProduto', $_POST['nomeProduto']);
		$obj->__set('codBarras', $_POST['codBarras']);
		$obj->__set('valorUnitario', $_POST['valorUnitario']);
		
		
		$conexao = new Conexao();
		
		$service = new Service_query($conexao, $obj);
		$service->cadastrar_produto();
	}
	
	if($acao == 'deletar' and isset($_GET['id'])){
		$obj = new Obj();
		$obj->__set('id_produto', $_GET['id']);;
		
		
		$conexao = new Conexao();
		
		$service = new Service_query($conexao, $obj);
		$service->deletar_produto();
	}
	if($acao == 'atualizar' and isset($_GET['id'])){
		$obj = new Obj();
		$obj->__set('id_produto', $_GET['id']);
		$obj->__set('nomeProduto', $_POST['nomeProduto']);
		$obj->__set('valorUnitario', $_POST['valorUnitario']);
		$obj->__set('codPedido', $_POST['codPedido']);
		
		
		$conexao = new Conexao();
		
		$service = new Service_query($conexao, $obj);
		$service->atualizar_produto();
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			*{
				margin: 0;
				padding: 0;
			}
			.title{
				text-align: center;
				margin-top: 20px;
				margin-botton: 20px;
			}
			input, button{
				display: block;
				padding: 5px;
				text-align: center;
				margin: auto;
			}
			
			table{
				margin: 15px 0px 15px 0px;
				box-shadow: 4px 4px 4px gray;
				margin: 10px auto 10px auto;
				width: 40%;
				text-align: center;
			}
			button{
				background: red;
				color: white;
				padding: 5px;
				border-radius: 4px;
			}
		</style>
		<title>Cadastro de produto</title>
	</head>
	<body>
		<h1 class="title">CADASTRO DE PRODUTOS</h1>
		<form action="index.php?acao=cadastrar_produto" method="post">
			<input name="nomeProduto" placeholder="informe o nome do produto">
			<input name="codBarras" placeholder="informe o código do produto">
			<input name="valorUnitario" placeholder="informe o valor unitario">
			<button class="btn">CADASTRAR PRODUTO</button>
		</form>
		<h1 class="title">Listagem de produtos</h1>
		<?php
			$obj = new Obj();
			$conexao = new Conexao();
			$service = new Service_query($conexao, $obj);
			
			$produtos = $service->retornar_produtos();
			
			foreach($produtos as $value => $key){ ?>
				<div id="elemento_<?= $key['numeroPedido'];?>">
					<table id="tabela_<?= $key['numeroPedido'];?>">
						<tr>
							<td>
								Nome: <?= $key['nomeProduto'];?>
							</td>
						</tr>
						
						<tr>
							<td>
								código: <?= $key['codBarras'];?>
							</td>
						</tr>
						
						<tr>
							<td>
								código: <?= $key['valorUnitario'];?>
							</td>
						</tr>
						<br>
						<tr>
							<td class="botoes">
								<button onclick="deletar_produto(<?= $key['numeroPedido'];?>)">Deletar produto</button>
								<br>
								<button onclick="editar(<?= $key['numeroPedido'];?>, `<?= $key['nomeProduto'];?>`, `<?= $key['codBarras'];?>`, `<?= $key['valorUnitario']?>`)">Editar produto</button>
							</td>
						</tr>
					</table>
				</div>
		<?php }
		?>
		<script src="../js/crud.js"></script>
	</body>
</html>