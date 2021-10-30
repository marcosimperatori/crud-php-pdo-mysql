$(function () {
    //caminho absoluto do projeto
    var BASE = 'http://localhost/crud5/';
    var alerts = ["alert-info", "alert-success", "alert-danger", "alert-warning"];

    /* método para inser/update */
    $('form').submit(function () {
        var form = $(this); //esse this é o form que foi submetido
        var caminho = form.attr('id'); //esse id vem do atributo id do form em questão
        var dadosF = new FormData($(this)[0]); // dados que vem do formulário submetido

        $.ajax({
            url: BASE + caminho,
            data: dadosF,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function (data) {
                $(".fa").addClass("fa-spinner fa-spin");

                //remove a classe de alert que estiver ativa no momento
                $.each(alerts, function (key, value) {
                    $('.alert').removeClass(value);
                });
            },
            success: function (data) {
                $(".fa").removeClass("fa-spinner fa-spin");
                $('.result').html('');


                //aqui dentro eu ver o que fazer com esse retorno que o navegador entregou ao ajax
                if (data.retorno) {
                    $('.alert').addClass(data.retorno[0]);
                    $('.result').html(data.retorno[1]);
                }

                if (data.redirect) {
                    window.setTimeout(function () {
                        window.location.href = BASE + data.redirect[0];
                    }, data.redirect[1]);
                }
            }
        });
        //impede que a página seja atualizada automaticamente
        return false;
    });

    /* Método para excluir */
    $('.excluir').click(function (event) {
        var caminho = $(this).attr('destino');
        var id = $(this).attr('registro');
        var tr = $(this).closest('tr');

        $.ajax({
            url: BASE + caminho,
            data: {id: id},
            type: 'POST',
            dataType: 'json',
            beforeSend: function (data) {
                //remove a classe de alert que estiver ativa no momento
                $.each(alerts, function (key, value) {
                    $('.alert').removeClass(value);
                });
            },
            success: function (data) {
                $('.result').html('');

                if (data.retorno) {
                    $('.alert').addClass(data.retorno[0]);
                    $('.result').html(data.retorno[1]);

                    tr.fadeOut(600,function(){
                        tr.remove();
                    })

                    setTimeout(function(){
                        $('#mensagem').fadeOut('');
                    },2000);
                }

                if (data.redirect) {
                    window.setTimeout(function () {
                        window.location.href = BASE + data.redirect[0];
                    }, data.redirect[1]);
                }
            }
        });
        return false;
    })
});