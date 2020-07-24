$(document).ready(()=>{
    buttonLink = $('#page');
    $('#external_page').html("jQuery com Ajax!");
    


    buttonLink.on('click', ()=>{
        $.post('./moi_ajax/index.html', data => {
            $('#external_page').html(data)
        });
    });

});