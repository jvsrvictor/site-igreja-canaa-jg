$(document).ready(function(){

    const circleProgress = new CircleProgress('.progress');
    circleProgress.attr({
        indeterminateText: '0',
    });

    var url = window.location.href;
    var id = url.split('?').pop().split('=').pop();
    var restante=1;
    var capacidade;
    var desabilitado = 0;

    function get_vagas(id){
        if(desabilitado==0){
            $.ajax({
            url: 'assets\\php\\get_culto_vagas_restantes.php',
            dataType: 'json',
            method: 'post',
            data:{id: id},

            success:function(data){
                restante = data.restante;
                capacidade = data.capacidade;
                desabilitado = parseInt(data.disable,10);

                console.log(restante+capacidade+desabilitado);

                if(desabilitado==1){
                    circleProgress.max = capacidade;
                    circleProgress.value = restante;
                    $("#nome_cadastro").attr("disabled", true);
                    $("#email_cadastro").attr("disabled", true);
                    $("#telefone_cadastro").attr("disabled", true);
                    $("#enviar_email").attr("disabled", true);
                    $("#cadastrar").attr("disabled", true);
                    
                }else{
                    
                    circleProgress.max = capacidade;
                    circleProgress.value = restante;
                }
            }
        });
        }
    }

    setInterval(function(){get_vagas(id);}, 1000);
    
});