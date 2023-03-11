
<?php
    //Conexão com BD
	include "connection.php";

    //Sistema de datas em português
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

    $output='';

    if($_POST['query']!=''){
        //Seleciona a lista de ID's
        $total_pages_sql = "SELECT COUNT(*) FROM `posts` WHERE nome_culto LIKE '%" .$_POST['query']. "%' AND culto_com_capacidade='1'";
        $result = mysqli_query($conn_db_posts,$total_pages_sql);
        //Total de linhas que a pesquisa terá
        $total_rows = mysqli_fetch_array($result)[0];

        if($_POST['limit'] <= ceil($total_rows/10)*10){
            $sql = "SELECT * FROM `posts` WHERE nome_culto LIKE '%" .$_POST['query']. "%' AND culto_com_capacidade='1' ORDER BY datac DESC LIMIT ".$_POST['limit']."";
        }else{
            $sql = '';
        }
    }else{
        //Seleciona a lista de ID's
        $total_pages_sql = "SELECT COUNT(*) FROM `posts` WHERE culto_com_capacidade='1'";
        $result = mysqli_query($conn_db_posts,$total_pages_sql);
        //Total de linhas que a pesquisa terá
        $total_rows = mysqli_fetch_array($result)[0];

        if($_POST['limit'] <= ceil($total_rows/10)*10){
            $sql = "SELECT * FROM `posts` WHERE culto_com_capacidade='1' ORDER BY datac DESC LIMIT ".$_POST['limit']."";
        }else{
            $sql = '';
        }
    }

    if($sql!=''){
        $resultado = mysqli_query($conn_db_posts,$sql);
        
        if(mysqli_num_rows($resultado)>0){
            while($row=mysqli_fetch_assoc($resultado)){

                //Cálculo o número de inscritos no determinado culto
                $total_inscritos_culto_sql = "SELECT COUNT(*) FROM `". $row['id_culto'] ."`";
                $resultado_culto_ind = mysqli_query($conn_db_cultos,$total_inscritos_culto_sql);
                //Total de inscritos
                $total_inscritos_culto = mysqli_fetch_array($resultado_culto_ind)[0];


                $output .='
                    <tr>
                        <td><a style="cursor: pointer;" onclick="frames['."'".$row['id_culto']."'".'].print()" ><iframe style="position: absolute;width:0;height:0;border:0;" src="inscritos?id_culto='.$row['id_culto'].'" name="'.$row['id_culto'].'"></iframe><i class="fas fa-print"></i>&nbsp;&nbsp;&nbsp;' .$row['nome_culto']. '</a></td>
                        <td>' .strftime('%d de %B de %Y', strtotime($row['data_culto'])). '</td>
                        <td><i class="fas fa-user-friends"></i>&nbsp;&nbsp;&nbsp;'.$total_inscritos_culto . '/' . $row['capacidade']. '</td>
                    </tr>
                ';
            }
        }
    }

    echo $output;
    
        


    
    

?>