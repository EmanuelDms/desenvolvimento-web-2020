$(document).ready(() => {
    $('#documentacao').on('click', () =>{
        //  #### GET (Default) #####
        // $('#pagina').load('documentacao.html')
        // Para a requisição (get) você recebe um parâmetro de resposta, podendo ser nomeado
        /* 
            #### GET #####
        $.get('documentacao.html', data => {
            $('#pagina').html(data)
        }) */
        //  #### POST #####
        $.post('documentacao.html', data =>{
            $('#pagina').html(data)
        })
    })

	$('#suporte').on('click', () =>{
        //  #### GET (Default) #####
        // $('#pagina').load('suporte.html')
        
        /* 
            #### GET #####
        $.get('suporte.html', data => {
        $('#pagina').html(data)
        }) */
        //  #### POST #####
        $.post('suporte.html', data =>{
            $('#pagina').html(data)
        })
    })

    // ajax
    $('#competencia').on('change', e => {
        let competencia = $(e.target).val();

        // metódo, url, dados, sucesso, erro
        $.ajax({
            type: 'GET',
            url: 'app.php',
            data: `competencia=${competencia}`, //x-www-form-urlencoded
            dataType: 'json',
            success: data => { 
                $('#num_vendas').html(data.numeroVendas)
                $('#total_vendas').html('R$ '+(data.totalVendas).replace('.', ','))
                $('#clientes_ativos').html(data.clientesAtivos)
                $('#clientes_inativos').html(data.clientesInativos)
                $('#total_despesas').html('R$ '+(data.totalDespesas).replace('.', ','))
            },
            error: error => { console.log(error) }
        })
    }) 
})