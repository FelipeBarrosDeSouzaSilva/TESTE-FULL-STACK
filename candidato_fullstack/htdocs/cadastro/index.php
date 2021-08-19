<?php
	$caminho = "../../arquivos_privados/";
	require $caminho."conexao.php";
	#require $caminho."control.php";
	require $caminho."model.php";
	require $caminho."service.php";
	$acao = null;
	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
	
	if($acao == 'cadastrar_usuario'){
		$obj = new Obj();
		$obj->__set('nomeCliente', $_POST['nome']);
		
		$obj->__set('cpf', $_POST['cpf']);
		
		$obj->__set('email', $_POST['email']);
		
		
		$conexao = new Conexao();
		
		$service = new Service_query($conexao, $obj);
		$service->cadastrar_cliente();
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Teste fullstack</title>
		<style>
			*{
				margin: 0;
				padding: 0;
			}
			input, button{
				display: block;
				padding: 5px;
			}
			
		</style>
	</head>
	<body>
		<h1 class="title">CADASTRO DE CLIENTES</h1>
		<form action="index.php?acao=cadastrar_usuario" method="post">
			<input name="nome" placeholder="informe o seu nome">
			<input name="cpf" placeholder="informe o seu CPF">
			<input name="email" placeholder="informe o seu email">
			<button>CADASTRAR CLIENTE</button>
		</form>
	</body>
</html>