<?php
    //Sistema de datas em português
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

    //Conexão com BD
	include "connection.php";
    
    //Sistema de GET by ID
    $id = $_POST['id'];
    $sqlsp = "SELECT * FROM `posts` WHERE id='" . $id . "'";
	$sql = mysqli_query($conn_db_posts,$sqlsp);
	$postsp = mysqli_fetch_assoc($sql);
    $data_hoje = strtotime(date("Y-m-d"));
    $data_culto = strtotime($postsp['data_culto']);
    $t_limite = strtotime($postsp['h_limite']);
    $desabilitado=1;$deucerto=0;

    if( ($postsp['capacidade'] - mysqli_num_rows(mysqli_query($conn_db_cultos,"SELECT * FROM `".$culto_id."`"))>0) && ($data_hoje <= $data_culto) ){
        $desabilitado=0;
        //Verifica se é a data do evento
        if( $data_hoje ==  $data_culto){
            //Verifica se ainda está no horário limite
            if(strtotime(now) <  $t_limite){
                $desabilitado=0;
            }else{
                $desabilitado=1;
            }
        }
    }


    $result = mysqli_query($conn_db_cultos,"SELECT COUNT(*) FROM `".$postsp['id_culto']."`");

    $restante = $postsp['capacidade'] - mysqli_fetch_array($result)[0];

    $array = array(
        "restante" => $restante,
        "capacidade" => $postsp['capacidade'],
        "disable" => $desabilitado,
        "tlimite" => $postsp['data_culto'],
        "hlimite" => $postsp['h_limite'],
        "tagora" => $deucerto,
        
    );

    echo json_encode($array);
?>