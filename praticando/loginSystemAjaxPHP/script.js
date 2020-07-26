$('document').ready(() =>{

    $("#btn-login").on('click', ()=>
    {
        let data = $('#login-form').serialize();

// “TENTATIVAS_ACEITAS” informa quantidade de vezes seguidas que será aceito tentativas de login “não validadas”
// “MINUTOS_BLOQUEIO” informa quantos minutos o IP ficará bloqueado caso o usuário tenha excedido o quantidade de tentativas

        // ajax
        $.ajax({
            type: 'POST',
            url: 'app.php',
            data: data,
            dataType: 'json',
            beforeSend: () =>
            {
                $("#btn-login").html('Carregando...')
            },
            success: response =>{
                $("#btn-login").html('Entrar')
                if (response.codigo == 1) {
                    $("#login-alert").css('display', 'none')
                    window.location.href = "home.php";
                }
                else{
                    $("#login-alert").css('display', 'block')
                    $("#mensagem").html('<strong>Erro!</strong>&nbsp;'+response.mensagem)
                }
            }
        })
    })
})