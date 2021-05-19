$(document).ready(function () {

	$('.busca').keyup(function (event) {
		let filtro = $('.busca-input').val();
		$.ajax({
			url: 'busca.json.php',
			data: `filtro=${filtro}`,
			dataType: 'json'
		}).done(function (dados) {
			const pessoas = dados.pessoas;
			$('.pessoas').text('');
			pessoas.forEach(function (pessoa) {
				populaContainer(pessoa);

			});
		});
	});

});

function populaContainer(pessoa) {
	const resultado = `
		 <div class="col s12 m4">
          <div class="card white darken-1">
            <div class="card-content black-text">
              <h5 class="card-title">${pessoa.nome}</h5>
              <div id="div${pessoa.id}" align="center">
              	<button type="button" id="${pessoa.id}" class="btn light-green white-text bntDependentes">Visualizar</button>
              </div>
            </div>
          </div>
        </div>

	`;
	$('.pessoas').append(resultado);
	populaDependentes(pessoa);
}

function populaDependentes(pessoa) {
	$(".bntDependentes").click(function () {
		var id_dependentes = $(this).attr('id');
		$.ajax({
			url: 'busca2.json.php',
			data: `filtro=${id_dependentes}`,
			dataType: 'json'
		}).done(function (dependentes) {
			$(`#div${id_dependentes}`).hide();
			$(`#div${id_dependentes}`).text('');
			dependentes.forEach(function (dependente) {
				var novop = `
					<p class="row card-text hoverd${dependente.id}">${dependente.nome}<i class="material-icons spanzap${dependente.id}" style="display:none"">delete</i> </p>
				`;
				$(`#div${id_dependentes}`).append(novop);
				$(`#div${id_dependentes}`).slideDown(2000, function () {

				});
				excluirDependentes(dependente);
			});
		});

	});
}

function excluirDependentes(dependente) {
	$(`.hoverd${dependente.id}`).hover(function () {
		$(`.spanzap${dependente.id}`).show();
	}, function () {
		$(`.spanzap${dependente.id}`).hide();
	});
	$(`.spanzap${dependente.id}`).click(function () {
		$.ajax({
			url: 'busca3.json.php',
			data: `filtro=${dependente.id}`,
			dataType: 'json'
		}).done(function (resposta) {
			const sucesso = resposta.sucesso;
			if (sucesso)
				$(`.hoverd${dependente.id}`).remove();
		});
	});
}
