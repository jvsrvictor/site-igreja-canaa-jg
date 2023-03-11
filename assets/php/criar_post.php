<?php
    //Conexão com o BD
    include "connection.php";
    
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');


    //Define constante para caminho de arquivos no servidor
    define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT']);
    $ROOT = dirname(__FILE__);


    if(isset($_POST['id_postagem'])){
    //Editar Postagem
        //Sistema de GET by ID
        $postsp = mysqli_fetch_assoc(mysqli_query($conn_db_posts,"SELECT * FROM `posts` WHERE id='" . $_POST['id_postagem'] . "'"));
        

        if(file_exists($_FILES['image']['tmp_name'])){
            //Deleta imagem antiga
            $destination0 = ROOT_PATH . '/postsDB/images/' . $postsp['foto'];
            unlink($destination0);

            //Upload da imagem nova
            $_FILES['image']['name'];
            $image_name = time() . '_' . str_replace(' ', '', $_FILES['image']['name']);
            
            $destination = ROOT_PATH . '/postsDB/images/' . $image_name;

            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            if($result){
                $_POST['image'] = $image_name;
            }

            if($postsp['culto_com_capacidade']==1){
                $culto_com_capacidade = 1;
                if($postsp['culto_com_capacidade']==0){
                    $culto_id = 'culto' . '_' . time();
                    //Cria tabela para a incrição do culto
                    $sql_cultos = "CREATE TABLE " . $culto_id . "(id int(4) AUTO_INCREMENT, nome varchar(50) NOT NULL, telefone varchar(50), email varchar(50),PRIMARY KEY (id));";
                    mysqli_query($conn_db_cultos, $sql_cultos);
                    $sql = "UPDATE posts SET foto='".$image_name."', titulo='".$_POST['titulo']."', autor='".$_POST['autor']."', conteudo='".$_POST['conteudo']."', culto_com_capacidade='".$culto_com_capacidade."', data_culto='".$_POST['data_culto']."', h_limite='".$_POST['h_limite']."', capacidade='".$_POST['capacidade_culto']."', nome_culto='".$_POST['nome_culto']."', id_culto='".$culto_id."' WHERE id='".$_POST['id_postagem']."'";
                }else{
                    $sql = "UPDATE posts SET foto='".$image_name."', titulo='".$_POST['titulo']."', autor='".$_POST['autor']."', conteudo='".$_POST['conteudo']."', culto_com_capacidade='".$culto_com_capacidade."', data_culto='".$_POST['data_culto']."', h_limite='".$_POST['h_limite']."', capacidade='".$_POST['capacidade_culto']."', nome_culto='".$_POST['nome_culto']."' WHERE id='".$_POST['id_postagem']."'";
                }
            
            }else{
                $culto_com_capacidade = 0;
                if($postsp['culto_com_capacidade']==1){
                    //Deleta lista de inscritos
                    mysqli_query($conn_db_cultos,"DROP TABLE ". $postsp['id_culto'] ."");

                    $sql = "UPDATE posts SET foto='".$image_name."', titulo='".$_POST['titulo']."', autor='".$_POST['autor']."', conteudo='".$_POST['conteudo']."', culto_com_capacidade='".$culto_com_capacidade."' WHERE id='".$_POST['id_postagem']."'";
                }else{
                    $sql = "UPDATE posts SET foto='".$image_name."', titulo='".$_POST['titulo']."', autor='".$_POST['autor']."', conteudo='".$_POST['conteudo']."', culto_com_capacidade='".$culto_com_capacidade."' WHERE id='".$_POST['id_postagem']."'";
                }
            }

        }else{
            if($_POST['culto_com_contagem']==1){
                $culto_com_capacidade = 1;
                if($postsp['culto_com_capacidade']==0){
                    $culto_id = 'culto' . '_' . time();
                    //Cria tabela para a incrição do culto
                    $sql_cultos = "CREATE TABLE " . $culto_id . "(id int(4) AUTO_INCREMENT, nome varchar(50) NOT NULL, telefone varchar(50), email varchar(50),PRIMARY KEY (id));";
                    mysqli_query($conn_db_cultos, $sql_cultos);
                    $sql = "UPDATE posts SET titulo='".$_POST['titulo']."', autor='".$_POST['autor']."', conteudo='".$_POST['conteudo']."', culto_com_capacidade='".$culto_com_capacidade."', data_culto='".$_POST['data_culto']."', h_limite='".$_POST['h_limite']."', capacidade='".$_POST['capacidade_culto']."', nome_culto='".$_POST['nome_culto']."', id_culto='".$culto_id."' WHERE id='".$_POST['id_postagem']."'";
                }else{
                    $sql = "UPDATE posts SET titulo='".$_POST['titulo']."', autor='".$_POST['autor']."', conteudo='".$_POST['conteudo']."', culto_com_capacidade='".$culto_com_capacidade."', data_culto='".$_POST['data_culto']."', h_limite='".$_POST['h_limite']."', capacidade='".$_POST['capacidade_culto']."', nome_culto='".$_POST['nome_culto']."' WHERE id='".$_POST['id_postagem']."'";
                }
            }else{
                $culto_com_capacidade = 0;
                if($postsp['culto_com_capacidade']==1){
                    //Deleta lista de inscritos
                    mysqli_query($conn_db_cultos,"DROP TABLE ". $postsp['id_culto'] ."");

                    $sql = "UPDATE posts SET titulo='".$_POST['titulo']."', autor='".$_POST['autor']."', conteudo='".$_POST['conteudo']."', culto_com_capacidade='".$culto_com_capacidade."' WHERE id='".$_POST['id_postagem']."'";
                }else{
                    $sql = "UPDATE posts SET titulo='".$_POST['titulo']."', autor='".$_POST['autor']."', conteudo='".$_POST['conteudo']."', culto_com_capacidade='".$culto_com_capacidade."' WHERE id='".$_POST['id_postagem']."'";
                }
            }

        }

        //Update na tabela
        if (mysqli_query($conn_db_posts, $sql)) {
            echo '1';
        } else {
            echo '0'. mysqli_error($conn_db_posts);
        }
        
    }else{
    //Criar Postagem
        //Upload de imagem
        $_FILES['image']['name'];
        $image_name = time() . '_' . str_replace(' ', '', $_FILES['image']['name']);
        $destination = ROOT_PATH . '/postsDB/images/' . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if($result){
            $_POST['image'] = $image_name;
        }

        //Definição de variáveis
        $titulo = $_POST['titulo'];
        $conteudo = $_POST['conteudo'];
        $datac = date('Y-m-d H:i:s');
        $autor = $_POST['autor'];

        if($_POST['culto_com_contagem']==1){
            //Definição de variáveis
            $culto_com_capacidade = 1;
            $nome_culto = $_POST['nome_culto'];
            $capacidade = $_POST['capacidade_culto'];
            $data_culto = $_POST['data_culto'];
            $h_limite = $_POST['h_limite'];
            $culto_id = 'culto' . '_' . time();
            
            //Cria tabela para a incrição do culto
            $sql_cultos = "CREATE TABLE " . $culto_id . "(id int(4) AUTO_INCREMENT, nome varchar(50) NOT NULL, telefone varchar(50), email varchar(50),PRIMARY KEY (id));";
            mysqli_query($conn_db_cultos, $sql_cultos);

            //Cria nova postagem com contagem
            $sql_main_db = "INSERT INTO posts (titulo, autor, datac, conteudo, foto, culto_com_capacidade, data_culto, h_limite, capacidade, id_culto, nome_culto) VALUES('$titulo', '$autor', '$datac', '$conteudo', '$image_name', '$culto_com_capacidade', '$data_culto', '$h_limite', '$capacidade',  '$culto_id', '$nome_culto')";
            mysqli_query($conn_db_posts, $sql_main_db);
        }else{
            //Cria nova postagem sem contagem
            $culto_com_capacidade = 0;
            $sql_main_db = "INSERT INTO posts (titulo, autor, datac, conteudo, foto, culto_com_capacidade) VALUES('$titulo', '$autor', '$datac', '$conteudo', '$image_name', '$culto_com_capacidade')";
            mysqli_query($conn_db_posts, $sql_main_db);
        }
    
        echo 1;
    }



    
?>