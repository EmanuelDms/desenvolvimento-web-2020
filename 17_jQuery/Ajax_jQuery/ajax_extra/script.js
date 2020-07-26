$(document).ready(()=>{

	$("button").on("click", (e)=>{
		// Impede o envio do formulário
		e.preventDefault()


		// O método serialize ele encapsula todos os campos de determinado seletor usando o padrão urlencode
		let dados = $('form').serialize();

		// ajax
		$.ajax({
			type: 'post',
			url: './app.php', 
			data: dados, //x-www-form-urlencode
			dataType: 'json',
			success: data => { console.log(data) },
			error: erro => { console.log(erro) } 
		})
	})
})