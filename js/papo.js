function search() {
    var term = $("#pesquisar").val();
    if (term.length >= 3) {
        $.ajax({
            url: 'search.php?term=' + term,
            success: function (data) {
                $('#searchContainer').html(data);
                $('#searchContainer').show();
            }
        });
    } else {
        $('#searchContainer').hide();
    }
}

$(".card-footer").hide();

function send() {
    var mensagem = $("#enviarMensagem").val();
    var inputtt = document.getElementById('inputt')

    var id = inputtt.value
    $.ajax({
        url: 'send.php?mensagem=' + mensagem + ' & id=' + id,
        success: function (data) {
            $("#enviarMensagem").val("");
            var conversinha2 = document.getElementById('conversinha')
            conversinha2.scrollTop = conversinha2.scrollHeight;
            papo()
        }
    });
}


$('#enviarMensagem').on('keyup', function (event) {
    if (event.keyCode === 13 && ($("#enviarMensagem").val().length > 0)) {
        send();
    }
});



function papo() {
    var inputtt = document.getElementById('inputt')
    var id = inputtt.value
    $.ajax({
        url: 'papo.php?id=' + id,
        success: function (data) {
            $('#conversinha').html(data)
            var conversinha = document.getElementById('conversinha')
            conversinha.scrollTop = conversinha.scrollHeight;
        }
    });
}

