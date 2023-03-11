
<?php
    //Conexão com BD
	include "connection.php";

    $output='';

    if($_POST['query']!=''){
        $total_pages_sql = "SELECT COUNT(*) FROM `posts` WHERE titulo LIKE '%" .$_POST['query']. "%'";
        $result = mysqli_query($conn_db_posts,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];


        if($_POST['limit'] <= ceil($total_rows/10)*10){
            $sql = "SELECT * FROM `posts` WHERE titulo LIKE '%" .$_POST['query']. "%' ORDER BY datac DESC LIMIT ".$_POST['limit']."";
        }else{
            $sql = '';
        }
    }else{
        $total_pages_sql = "SELECT COUNT(*) FROM `posts`";
        $result = mysqli_query($conn_db_posts,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];


        if($_POST['limit'] <= ceil($total_rows/10)*10){
            $sql = "SELECT * FROM `posts` ORDER BY datac DESC LIMIT ".$_POST['limit']."";
        }else{
            $sql = '';
        }
    }

    if($sql!=''){
        $resultado = mysqli_query($conn_db_posts,$sql);
        
        if(mysqli_num_rows($resultado)>0){
            while($row=mysqli_fetch_assoc($resultado)){

                
                $sqlsp = "SELECT * FROM `usuarios` WHERE id='" . $row['autor'] . "'";

                $sqlu = mysqli_query($conn_db_posts,$sqlsp);
                $usuario = mysqli_fetch_assoc($sqlu);

                $output .='
                    <tr>
                        <td><a href="post?id=' .$row['id']. '">' .$row['titulo']. '</a></td>
                        <td>' .strftime('%d de %B de %Y', strtotime($row['datac'])). '</td>
                        <td>' .$usuario['nome']. '</td>
                        <td><center><a href="createpost?id=' .$row['id']. '"><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="postmanager?id=' .$row['id']. '"><i class="fas fa-trash-alt"></i></a>&nbsp;&nbsp;&nbsp;</center></td>
                    </tr>
                ';
            }
        }
    }

    echo $output;
    
        


    
    

?>