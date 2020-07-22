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
})