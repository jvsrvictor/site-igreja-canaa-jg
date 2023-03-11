<?php
    //Conexão com o BD
    include "connection.php";   

    //Define constante para caminho de arquivos no servidor
    define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT']);

    $postsp = mysqli_fetch_assoc(mysqli_query($conn_db_posts,"SELECT * FROM `posts` WHERE id='" . $_POST['id'] . "'"));

    //Deleta imagem
    $destination0 = ROOT_PATH . '/postsDB/images/' . $postsp['foto'];
    unlink($destination0);

    //Deleta lista de inscritos
    if($postsp['culto_com_capacidade']==1){
        mysqli_query($conn_db_cultos,"DROP TABLE ". $postsp['id_culto'] ."");
    }

    mysqli_query($conn_db_posts,"DELETE FROM posts WHERE id = '".$_POST['id']."'");
    echo 1;

?>