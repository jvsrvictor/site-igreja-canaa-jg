
<?php
    //Conexão com BD
	include "connection.php";
	
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

    $output1='';
    $output2='';
    $output3='';

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
            $first = true;
            while($row=mysqli_fetch_assoc($resultado)){
                if($first){
                    $output1 ='
                    
                                <article class="post featured">

									<header class="major">
										<span class="date">' .strftime('%d de %B de %Y', strtotime($row['datac'])). '</span>
										<h2><a href="post?id=' .$row['id']. '">' .$row['titulo']. '</a></h2>
										<p>'. substr(strip_tags($row['conteudo']), 0, 250). '...' .'</p>
									</header>

									<a href="post?id=' .$row['id']. '" class="image main"><img src="postsDB/images/' .$row['foto']. '" alt="" /></a>
									
									<ul class="actions special">
										<li><a href="post?id=' .$row['id']. '" class="button large">Saiba Mais</a></li>
									</ul>

								</article>
                    
                    ';
                    $first=false;
                }else{
                    $output2 .='
                                <article>

                                    <header>
                                        <span class="date">' .strftime('%d de %B de %Y', strtotime($row['datac'])). '</span>
                                        <h2><a href="post?id=' .$row['id']. '">' .$row['titulo']. '</a></h2>
                                    </header>

                                    <a href="post?id=' .$row['id']. '" class="image fit"><img src="postsDB/images/' .$row['foto']. '" alt="" /></a>
                                        
                                    <p>'. substr(strip_tags($row['conteudo']), 0, 150). '...' .'</p>
                                        
                                    <ul class="actions special">
                                        <li><a href="post?id=' .$row['id']. '" class="button">Saiba Mais</a></li>
                                    </ul>

                                </article>
                    ';
                }
            }
            $output3 = $output1 .'<section class="posts">'. $output2 .'</section>';
        }
    }

    echo $output3;
    
        


    
    

?>