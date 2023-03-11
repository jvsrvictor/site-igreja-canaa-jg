<?php

    //Conexão com BD
	include "connection.php";

    if(isset($_POST['user'])&&isset($_POST['pass'])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $result = mysqli_query($conn_db_posts, "SELECT * FROM usuarios WHERE usuario='".$user."'");

        if($result){
            $user_sql = mysqli_fetch_assoc($result);
            if($user_sql){
                if( password_verify($pass,$user_sql['pass_hash']) ){
                    session_start();
                    $_SESSION['user']=$user_sql['id'];
                    $response = 1;
                }else{
                    $response = 2;
                }
            }else{
                $response = 3;
            }
        }else{
            $response = 4;
        }
    }else{
        $response = 5;
    }
    
    echo $response;
?>

