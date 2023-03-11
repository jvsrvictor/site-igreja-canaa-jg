<?php   
    date_default_timezone_set('America/Sao_Paulo');


    $servername1 = 'localhost';
    $username1 = 'id16589621_cjg_posts';
    $password1 = '<rSQ3wPR-x!%oGS-';
    $database1 = 'id16589621_posts';

    //Conexão com BD principal
    $conn_db_posts = mysqli_connect($servername1, $username1, $password1, $database1);
        if(!$conn_db_posts){
            echo"Não foi possível se conectar com o servidor de Banco de Dados Principal";
        }



    $servername2 = 'localhost';
    $username2 = 'id16589621_cjg_cultos';
    $password2 = 'G(XPlaec6uTm>Ltn';
    $database2 = 'id16589621_cultos';

        //Conexão com BD de cultos
    $conn_db_cultos = mysqli_connect($servername2, $username2, $password2, $database2);
        if(!$conn_db_cultos){
            echo"Não foi possível se conectar com o servidor de Banco de Dados de Cultos";
        }
?>