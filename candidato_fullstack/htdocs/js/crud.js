function deletar_produto(id){
	location.href = "index.php?acao=deletar&&id=" + id;
}
function editar(id, nome, cod, val){
		let form = document.createElement('form');
		let input = document.createElement('input');
		input.value = nome;
		input.placeholder = "nome do produto";
		input.name = "nomeProduto";
		
		input.placeholder = "nome do produto";
		input.codigo = "codBarras";
		
		let button = document.createElement('button');
		button.innerHTML = "Atualizar";
		
		let codigo = document.createElement('input');
		codigo.placeholder = "código do produto";
		codigo.name = "codPedido";
		codigo.value = cod;
		
		let valor = document.createElement('input');
		valor.placeholder = "valor do produto";
		valor.name = "valorUnitario";
		valor.value = val;
		
		
		let elemento = document.getElementById('elemento_' + id);
		let tabela = document.getElementById('tabela_' + id);
		
		form.appendChild(input);
		form.appendChild(codigo);
		form.appendChild(valor);
		form.appendChild(button);
		form.action = "index.php?acao=atualizar&&id=" + id;
		form.method = "post";
		elemento.appendChild(form);
		tabela.innerHTML = "";
	}