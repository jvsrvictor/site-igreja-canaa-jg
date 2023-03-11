<?php
    //Sistema de datas em português
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

    //Conexão com o BD
    include "connection.php";
    $response = '3';
    //Cria cadastro

        $id = $_POST['id_postagem'];
        $sqlsp2 = "SELECT * FROM `posts` WHERE id='" . $id . "'";
        $sql2 = mysqli_query($conn_db_posts,$sqlsp2);
        $postsp = mysqli_fetch_assoc($sql2);
        $culto_id = $postsp['id_culto'];
        $data_hoje = strtotime(date("Y-m-d"));
        $data_culto = strtotime($postsp['data_culto']);
        $t_limite = strtotime($postsp['h_limite']);
        $desabilitado=1;

        if( ($postsp['capacidade'] - mysqli_num_rows(mysqli_query($conn_db_cultos,"SELECT * FROM `".$culto_id."`"))>0) && ($data_hoje <= $data_culto) ){
            $desabilitado=0;
            //Verifica se é a data do evento
            if( $data_hoje ==  $data_culto){
                //Verifica se ainda está no horário limite
                if(strtotime(now) >  $t_limite){
                    $desabilitado=1;
                }
            }
        }

            
        if($desabilitado=1){
            //Definição de variáveis
            $nome_cadastro = $_POST['nome_cadastro'];
            
            //Verifica se nome já cadastrado
            if(mysqli_fetch_array(mysqli_query($conn_db_cultos,"SELECT * FROM `".$culto_id."` WHERE nome='".$nome_cadastro."'"))){
                $response = '4';
            }else{
                //Continua com o cadastro
                $email_cadastro = $_POST['email_cadastro'];
                $telefone_cadastro = $_POST['telefone_cadastro'];
                //Cria novo cadastro
                $sql_cultos = "INSERT INTO " . $culto_id ." (nome, telefone, email) VALUES('$nome_cadastro', '$telefone_cadastro' ,'$email_cadastro')";
                mysqli_query($conn_db_cultos, $sql_cultos);

                require_once('PHPMailer/PHPMailerAutoload.php');
                
                //Prepara email de confirmação
                if(isset($_POST['enviar_email']) && isset($_POST['email_cadastro'])){     

                    $body = '<!DOCTYPE html>
                    <!-- saved from url=(0150)file:///E:/OneDrive/Design%20Projects/Igreja%20Cana%C3%A3/M%C3%ADdias%20Sociais/Website%20Cana%C3%A3%20Jardim%20Guanabara/SiteCJG/template_email.html# -->
                    <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                        <title>
                        </title>
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <style type="text/css">
                          #outlook a{padding: 0;}
                                      .ReadMsgBody{width: 100%;}
                                      .ExternalClass{width: 100%;}
                                      .ExternalClass *{line-height: 100%;}
                                      body{margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;}
                                      table, td{border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
                                      img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
                                      p{display: block; margin: 13px 0;}
                        </style>
                        <!--[if !mso]><!-->
                        <style type="text/css">
                          @import url("https://fonts.googleapis.com/css?family=Merriweather:300,700,300italic,700italic|Source+Sans+Pro:900");
                          @media only screen and (max-width:480px) {
                                                @-ms-viewport {width: 320px;}
                                                @viewport {	width: 320px; }
                                          }
                        </style>
                        <!--<![endif]-->
                        <!--[if mso]> 
                            <xml> 
                                <o:OfficeDocumentSettings> 
                                    <o:AllowPNG/> 
                                    <o:PixelsPerInch>96</o:PixelsPerInch> 
                                </o:OfficeDocumentSettings> 
                            </xml>
                            <![endif]-->
                        <!--[if lte mso 11]> 
                            <style type="text/css"> 
                                .outlook-group-fix{width:100% !important;}
                            </style>
                            <![endif]-->
                        <style type="text/css">
                          @media only screen and (min-width:480px) {
                          .dys-column-per-100 {
                              width: 100.000000% !important;
                              max-width: 100.000000%;
                          }
                          }
                          @media only screen and (min-width:480px) {
                          .dys-column-per-100 {
                              width: 100.000000% !important;
                              max-width: 100.000000%;
                          }
                          }
                          @media only screen and (min-width:480px) {
                          .dys-column-per-5 {
                              width: 5% !important;
                              max-width: 5%;
                          }
                          .dys-column-per-45 {
                              width: 45% !important;
                              max-width: 45%;
                          }
                          }
                          @media only screen and (min-width:480px) {
                          .dys-column-per-100 {
                              width: 100.000000% !important;
                              max-width: 100.000000%;
                          }
                          }
                          @media only screen and (min-width:480px) {
                          .dys-column-per-100 {
                              width: 100.000000% !important;
                              max-width: 100.000000%;
                          }
                          }
                        </style>
                      </head>
                      <body style="background-color: #f7f7f7;">
                        <div>
                          <table align="center" background="./template_email2_files/4E687TRe69Ld95IDWyEg_bg_top_02.jpg" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background: url(https://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg) bottom center #ffffff;width:100%;background-repeat: repeat-x;">
                            <tbody>
                              <tr>
                                <td>
                                  <!--[if mso | IE]>
                    <v:rect style="mso-width-percent:1000;" xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false"><v:fill src="https://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg" origin="0.5, 0" position="0.5, 0" type="tile" /><v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
                    <![endif]-->
                                  <div style="margin:0px auto;max-width:600px;">
                                    <div style="font-size:0;line-height:0;">
                                      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                                        <tbody>
                                          <tr>
                                            <td style="direction:ltr;font-size:0px;padding:20px 0px 30px 0px;text-align:center;vertical-align:top;">
                                              <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:600px;">
                    <![endif]-->
                                              <div class="dys-column-per-100 outlook-group-fix" style="direction:ltr;display:inline-block;font-size:13px;text-align:left;vertical-align:top;width:100%;">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                  <tbody>
                                                    <tr>
                                                      <td style="padding:0px 20px;vertical-align:top;">
                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="" width="100%">
                                                          <tbody><tr>
                                                            <td align="left" style="font-size:0px;padding:0px;word-break:break-word;">
                                                              <table border="0" cellpadding="0" cellspacing="0" style="cellpadding:0;cellspacing:0;color:#000000;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:13px;line-height:22px;table-layout:auto;width:100%;" width="100%">
                                                                <tbody><tr>
                                                                  <td>
                                                                    <a href="https://canaajdguanabara.ga" target="_blank">
                                                                      <img alt="Logo" height="100" padding="5px" src="https://canaajdguanabara.ga/images/logo_footer.png" width="100" style="display: block;margin-left: auto;margin-right: auto;">
                                                                    </a>
                                                                  </td>
                                                                  
                                                                  
                                                                  
                                                                </tr>
                                                              </tbody></table>
                                                            </td>
                                                          </tr>
                                                        </tbody></table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </div>
                                              <!--[if mso | IE]>
                    </td></tr></table>
                    <![endif]-->
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                  <!--[if mso | IE]>
                    </v:textbox></v:rect>
                    <![endif]-->
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f7f7f7;background-color:#f7f7f7;width:100%;">
                            <tbody>
                              <tr>
                                <td>
                                  <div style="margin:0px auto;max-width:600px;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                                      <tbody>
                                        <tr>
                                          <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                                            <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:600px;">
                    <![endif]-->
                                            <div class="dys-column-per-100 outlook-group-fix" style="direction:ltr;display:inline-block;font-size:13px;text-align:left;vertical-align:top;width:100%;">
                                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                                <tbody><tr>
                                                  <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="color:#4d4d4d;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:32px;font-weight:700;line-height:37px;text-align:center;">
                                                      INSCRIÇÃO CONFIRMADA
                                                    </div>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="color:#777777;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:14px;line-height:21px;text-align:center;">
                                                      Parabéns, acabamos de receber a sua inscrição para o '.$postsp['nome_culto'].' do dia '. strftime('%d de %B de %Y', strtotime($postsp['data_culto'])) .'.
                                                    </div>
                                                  </td>
                                                </tr>
                                              </tbody></table>
                                            </div>
                                            <!--[if mso | IE]>
                    </td></tr></table>
                    <![endif]-->
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f7f7f7;background-color:#f7f7f7;width:100%;">
                            <tbody>
                              <tr>
                                <td>
                                  <div style="margin:0px auto;max-width:600px;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                                      <tbody>
                                        <tr>
                                          <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                                            <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:270px;">
                    <![endif]-->
                                            <div class="dys-column-per-45 outlook-group-fix" style="direction:ltr;display:inline-block;font-size:13px;text-align:left;vertical-align:top;width:100%;">
                                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                <tbody>
                                                  <tr>
                                                    <td style="background-color:#ffffff;border:1px solid #e5e5e5;padding:15px;vertical-align:top;">
                                                      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="" width="100%">
                                                        <tbody><tr>
                                                          <td align="left" style="font-size:0px;padding:0px ;word-break:break-word;">
                                                            <div style="color:#4d4d4d;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:18px;font-weight:700;line-height:25px;text-align:left;">
                                                              NOME
                                                            </div>
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                          <td align="left" style="font-size:0px;padding:0px;word-break:break-word;">
                                                            <div style="color:#777777;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:14px;line-height:23px;text-align:left;">
                                                            '.$nome_cadastro.'
                                                            </div>
                                                          </td>
                                                        </tr>
                                                      </tbody></table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <!--[if mso | IE]>
                    </td>
                    <![endif]-->
                                            <!-- empty column to create gap -->
                                            <!--[if mso | IE]>
                    <td style="vertical-align:top;width:30px;">
                    <![endif]-->
                                            <div class="dys-column-per-5 outlook-group-fix" style="direction:ltr;display:inline-block;font-size:13px;text-align:left;vertical-align:top;width:100%;">
                                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                <tbody>
                                                  <tr>
                                                    <td style="background-color:#FFFFFF;padding:0;vertical-align:top;">
                                                      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="" width="100%">
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <!--[if mso | IE]>
                    </td><td style="vertical-align:top;width:270px;">
                    <![endif]-->
                                            <div class="dys-column-per-45 outlook-group-fix" style="direction:ltr;display:inline-block;font-size:13px;text-align:left;vertical-align:top;width:100%;">
                                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                <tbody>
                                                  <tr>
                                                    <td style="background-color:#ffffff;border:1px solid #e5e5e5;padding:15px;vertical-align:top;">
                                                      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="" width="100%">
                                                        <tbody><tr>
                                                          <td align="left" style="font-size:0px;padding:0px ;word-break:break-word;">
                                                            <div style="color:#4d4d4d;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:18px;font-weight:700;line-height:25px;text-align:left;">
                                                              DATA E HORA DA INSCRIÇÃO
                                                            </div>
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                          <td align="left" style="font-size:0px;padding:0px;word-break:break-word;">
                                                            <div style="color:#777777;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:14px;line-height:22px;text-align:left;">
                                                              '. strftime('%d de %B de %Y, às %H:%M', strtotime(now)) .'
                                                            </div>
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                          <td align="left" style="font-size:0px;padding:0px ;word-break:break-word;">
                                                            <div style="color:#4d4d4d;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:18px;font-weight:700;line-height:25px;text-align:left;">
                                                            </div>
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                          <td align="left" style="font-size:0px;padding:0px;word-break:break-word;">
                                                            <div style="color:#777777;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:14px;line-height:22px;text-align:left;">
                                                            </div>
                                                          </td>
                                                        </tr>
                                                      </tbody></table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <!--[if mso | IE]>
                    </td></tr></table>
                    <![endif]-->
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <!--[if mso | IE]>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600"><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                    <![endif]-->
                          <div style="background:#FFFFFF;background-color:#FFFFFF;margin:0px auto;max-width:600px;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#FFFFFF;background-color:#FFFFFF;width:100%;">
                              <tbody>
                                <tr>
                                  <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:600px;">
                    <![endif]-->
                                    <div class="dys-column-per-100 outlook-group-fix" style="direction:ltr;display:inline-block;font-size:13px;text-align:left;vertical-align:top;width:100%;">
                                      <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                        <tbody><tr>
                                          <td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:5px;word-break:break-word;">
                                          </td>
                                        </tr>
                                        <tr>
                                          <td align="center" style="font-size:0px;padding:10px 25px;padding-top:0px;word-break:break-word;">
                                            <div style="color:#777777;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:14px;line-height:21px;text-align:center;">
                                              <img style="width: 100%; height: auto;" src="https://www.canaajdguanabara.ga/postsDB/images/'.$postsp['foto'].'" alt="">
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody></table>
                                    </div>
                                    <!--[if mso | IE]>
                    </td></tr></table>
                    <![endif]-->
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--[if mso | IE]>
                    </td></tr></table>
                    <![endif]-->
                          <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f7f7f7;background-color:#f7f7f7;width:100%;">
                            <tbody>
                              <tr>
                                <td>
                                  <div style="margin:0px auto;max-width:600px;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                                      <tbody>
                                        <tr>
                                          <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                                            <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:600px;">
                    <![endif]-->
                                            <div class="dys-column-per-100 outlook-group-fix" style="direction:ltr;display:inline-block;font-size:13px;text-align:left;vertical-align:top;width:100%;">
                                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                                <tbody>
                                                  <tr><td align="center" style="color:#777777;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:14px;font-style:bold;font-weight:700;line-height:21px;text-align:center;">NOSSAS REDES SOCIAIS</td></tr>
                                                  <tr>
                                                  <td align="center" style="padding:5px 25px;word-break:break-word; font-size: 25px;">
                                                    <a target="_blank" href="https:\\www.youtube.com/canaajdguanabara"><img height="25" width="25" style="margin: 10px;" src="https://canaajdguanabara.ga/images/YouTube.png" ></a>
                                                    <a target="_blank" href="https:\\www.instagram.com/canaajdguanabara"><img height="25" width="25" style="margin: 10px;" src="https://canaajdguanabara.ga/images/Instagram.png" ></i></a>
                                                    <a target="_blank" href="https:\\www.facebook.com/canaajdguanabara"><img height="25" width="25" style="margin: 10px;" src="https://canaajdguanabara.ga/images/Facebook.png" ></i></a>
                                                  </td>
                                                  </tr>
                                                  
                                                  
                                                  <tr>
                                                  <td align="center" style="font-size:0px;padding:5px 25px;word-break:break-word;">
                                                    
                                                      
                                                    
                                                    <div style="color:#777777;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:14px;font-style:bold;font-weight:700;line-height:21px;text-align:center;">
                                                     <br> IGREJA CANAÃ JARDIM GUANABARA
                                                    </div>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td align="center" style="font-size:0px;padding:5px 25px;word-break:break-word;">
                                                    <div style="color:#777777;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:14px;font-style:bold;line-height:1;text-align:center;">
                                                      Av. Godolfredo Pimentel, 12
                                                      Quintino Cunha
                                                    </div>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td align="center" style="font-size:0px;padding:5px 25px;word-break:break-word;">
                                                    <div style="color:#777777;font-family: &quot;Source Sans Pro&quot;, Helvetica, sans-serif;font-size:14px;font-style:bold;line-height:1;text-align:center;">
                                                      Fortaleza - CE, 60351-060
                                                    </div>
                                                  </td>
                                                </tr>
                                              </tbody></table>
                                            </div>
                                            <!--[if mso | IE]>
                    </td></tr></table>
                    <![endif]-->
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      
                    </body></html>';
                
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
                    $mail->Username = 'canaa.jdguanabara.contato@gmail.com';
                    $mail->Password = 'sFMUp*cw2Z';
                    $mail->setFrom($email_cadastro, 'CONTATO CANAÃ JARDIM GUANABRA');
                    $mail->Subject = 'Cadastro para o ' .$postsp['nome_culto']. ' - ' . strftime('%d/%m/%y', strtotime($postsp['data_culto']));
                    $mail->Body = $body;
                    $mail->AddAddress($email_cadastro);
                    $mail->ClearReplyTos();
                    $mail->addReplyTo($email_cadastro, $nome_cadastro);
                
                
                    $mail->send();
                    
                
                }
                $response = '1';
            }
        }else{
            $response = '0';
        }       
                    
        
                    

                
                



        
        

        
    
    echo $response;
?>