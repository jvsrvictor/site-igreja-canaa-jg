<?php

require_once('PHPMailer/PHPMailerAutoload.php');

if(isset($_POST["mensagem_contato"]) && !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["message"])){
    $nome = $_POST["name"];
    $email = $_POST["email"];
    $mensagem = $_POST["message"];
    
    $body = "<h3>CANAÃ JARDIM GUANABARA - CONTATO</h3><br>
            <h4>Nome:</h4><br>".$nome.
            "<h4>Email:</h4><br>".$email.
            "<h4>Mensagem:</h4><br>".$mensagem;

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    // $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    // $mail->port = '465';

    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->Username = 'cjg.contato.sender@gmail.com';
    $mail->Password = 'sFMUp*cw2Z';
    $mail->setFrom($email, 'CONTATO SITE CJG');
    $mail->Subject = 'Mensagem de '.$nome;
    $mail->Body = $body;
    $mail->AddAddress('canaa.jdguanabara.contato@gmail.com');
    $mail->ClearReplyTos();
    $mail->addReplyTo($email, $nome);


    $mail->send();

    }


?>