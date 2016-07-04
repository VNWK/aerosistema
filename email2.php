<?php 
session_start();
require_once('dbcon.php');
require_once 'PHPMailer/PHPMailerAutoload.php';
date_default_timezone_set('America/Caracas');

    if (isset($_POST['id_plan'])) {
    $stmt=$dbcon->prepare("SELECT * FROM mantenimiento WHERE id = :id_plan");
    $stmt->bindParam(":id_plan", $_POST['id_plan']);
    $stmt->execute();
    $array = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $stmt2=$dbcon->prepare("SELECT * FROM activo WHERE id = :fila");
    $stmt2->bindParam(":fila", $array['activo_id']);
    $stmt2->execute();
    $activo = $stmt2->fetch(PDO::FETCH_ASSOC);    

    $stmt3=$dbcon->prepare("SELECT * FROM modelo WHERE id = :fila");
    $stmt3->bindParam(":fila", $activo['modelo_id']);
    $stmt3->execute();
    $modelo = $stmt3->fetch(PDO::FETCH_ASSOC);

    $stmt4=$dbcon->prepare("SELECT * FROM ubicacion WHERE id = :fila");
    $stmt4->bindParam(":fila", $activo['modelo_id']);
    $stmt4->execute();
    $ubicacion = $stmt4->fetch(PDO::FETCH_ASSOC);

    $stmt5=$dbcon->prepare("SELECT * FROM user WHERE id = :fila");
    $stmt5->bindParam(":fila", $array['id']);
    $stmt5->execute();
    $usuario = $stmt5->fetch(PDO::FETCH_ASSOC);

    $ticket = $array['id'];

    $usuario_nombre = $usuario['nombre'];
    $usuario_apellido = $usuario['apellido'];

    $nombre_modelo = $modelo['nombre'];
    $nombre_ubicacion = $ubicacion['nombre'];   



    if ($array['prioridad'] == 1){
        $prioridad = "Baja";
    } elseif ($array['prioridad'] == 2) {
        $prioridad = "Normal";
    } elseif ($array['prioridad'] == 3) {
        $prioridad = "Alta";
    } elseif ($array['prioridad'] == 4) {
        $prioridad = "Urgente";
    };

    $m = new PHPMailer;
    $m->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );
    $m->isSMTP();

    $m->SMTPAuth = true;
    $m->SMTPDebug = 0;
    $m->IsHTML(true);    
    $m->Host = 'smtp.gmail.com';
    $m->Username = 'dt.aerochinita@gmail.com';
    $m->Password = 'dreamteam123';
    $m->SMTPSecure = 'tls';
    $m->Port = 587;
    
    $m->From = 'dt.aerochinita@gmail.com';
    $m->FromName = 'Dpto. Informatica Aeropuerto Internacional "La Chinita"';
    $m->AddReplyTo('dt.aerochinita@gmail.com', 'Ender Mendiluce');
    $m->addAddress($_POST['email'], 'Tecnico de Mantenimiento');    
    $m->Subject = 'Mantenimiento ';
    $m->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mantenimiento Pendiente</title>
    <style>
    
    
         @import url(http://fonts.googleapis.com/css?family=Roboto:300); /*Calling our web font*/
         
        /* Some resets and issue fixes */
        #outlook a { padding:0; }
        body{ width:100% !important; -webkit-text; size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; }     
        .ReadMsgBody { width: 100%; }
        .ExternalClass {width:100%;} 
        .backgroundTable {margin:0 auto; padding:0; width:100%;!important;} 
        table td {border-collapse: collapse;}
        .ExternalClass * {line-height: 115%;}   
        
        /* End reset */
        
        
        /* These are our tablet/medium screen media queries */
        @media screen and (max-width: 630px){
                
                
            /* Display block allows us to stack elements */                      
            *[class="mobile-column"] {display: block;} 
            
            /* Some more stacking elements */
            *[class="mob-column"] {float: none !important;width: 100% !important;}     
                 
            /* Hide stuff */
            *[class="hide"] {display:none !important;}          
            
            /* This sets elements to 100% width and fixes the height issues too, a god send */
            *[class="100p"] {width:100% !important; height:auto !important;}                    
                
            /* For the 2x2 stack */         
            *[class="condensed"] {padding-bottom:40px !important; display: block;}
            
            /* Centers content on mobile */
            *[class="center"] {text-align:center !important; width:100% !important; height:auto !important;}            
            
            /* 100percent width section with 20px padding */
            *[class="100pad"] {width:100% !important; padding:20px;} 
            
            /* 100percent width section with 20px padding left & right */
            *[class="100padleftright"] {width:100% !important; padding:0 20px 0 20px;} 
            
            /* 100percent width section with 20px padding top & bottom */
            *[class="100padtopbottom"] {width:100% !important; padding:20px 0px 20px 0px;} 
            
        
        }
            
        
    </style>
    
   
</head>


<div style="background:#EEEEEE;">

<body style="padding:0; margin:0" bgcolor="#EEEEEE">

<table border="0" cellpadding="0" cellspacing="0" style="margin: 0; padding: 0" width="100%">
    <tr>
        <td align="center" valign="top">
        
            <table width="640" border="0" cellspacing="0" cellpadding="0" class="hide">
                <tr>
                    <td height="20"></td>
                </tr>
            </table>
            
            <table width="640" cellspacing="0" cellpadding="0" bgcolor="#" class="100p">
                <tr>
                    <td background="http://i.imgur.com/uRKTpEM.png" bgcolor="#FFFFFF" width="640" valign="top" class="100p">
                        <!--[if gte mso 9]>
                        <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:640px;">
                            <v:fill type="tile" src="http://i.imgur.com/5gZzgJ5.png" color="#B94C37" />
                            <v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
                                <![endif]-->
                                <div>
                                    <table width="640" border="0" cellspacing="0" cellpadding="20" class="100p">
                                        <tr>
                                            <td valign="top">
                                                <table border="0" cellspacing="0" cellpadding="0" width="600" class="100p">
                                                    <tr>
                                                        <td align="left" width="50%" class="100p"><img src="http://i.imgur.com/m5jyeI5.png?2" alt="Logo" border="0" style="display:block" /></td>
                                                        <td width="50%" class="hide" align="right" style="font-size:16px; color:#FFFFFF;"><font face="\'Roboto\', Arial, sans-serif"><a href="#" style="color:#FFFFFF; text-decoration:none;"><img src="http://i.imgur.com/Q1ZUZTn.png?1" alt="Logo" border="0" style="display:block" /></a></font></td>
                                                    </tr>
                                                </table>
                                                <table border="0" cellspacing="0" cellpadding="0" width="600" class="100p">
                                                    <tr>
                                                        <td height="35"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="color:#FFFFFF; font-size:24px;">
                                                            <font face="\'Roboto\', Arial, sans-serif">
                                                                <span style="font-size:44px;">Mantenimiento</span><br />
                                                                <br /><br>
                                                                <Span style="font-size:24px;">Usted tiene un Mantenimiento<br />
                                                                pendiente a realizar en el siguiente activo</Span>
                                                                <br /><br />
                                                                
                                                                <a href="##" style="color:#FFFFFF; text-decoration:none;">
                                                                </a>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="35"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!--[if gte mso 9]>
                            </v:textbox>
                        </v:rect>
                        <![endif]-->
                    </td>
                </tr>
            </table>
            <table width="640" border="0" cellspacing="0" cellpadding="20" bgcolor="#010103" class="100p">
                <tr>
                    <td align="center" style="font-size:24px; color:#FFFFFF;"><font face="\'Roboto\', Arial, sans-serif">'.$nombre_modelo.' - # '.$activo['serial'].'<br>'.$nombre_ubicacion.'<br>Ticket #'.$ticket.'</font></td>
                </tr>
            </table>
            <table width="640" border="0" cellspacing="0" cellpadding="20" class="100p" bgcolor="#FFFFFF">
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" class="100padtopbottom" width="600">
                            <tr>
                                <td align="left" class="condensed" valign="top">
                                    <table align="left" border="0" cellpadding="0" cellspacing="0" class="mob-column" width="290">
                                        <tr>
                                            <td valign="top" align="center">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td valign="top" align="center" class="100padleftright">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="135" align="center"><a href="#"><img src="http://i.imgur.com/TDhiVno.png" border="0" style="display:block;"/></a></td>
                                                                    <td width="20"></td>
                                                                    <td width="135" align="center"><a href="#"><img src="http://i.imgur.com/IqooQdR.png" border="0" style="display:block;"/></a></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" class="100padleftright" align="center">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td valign="top" width="135" align="center" style="font-size:16px; color:#111111;"><font face="\'Roboto\', Arial, sans-serif">Fecha de Registro:<br>'.$array['fecha_reg'].'</font></td>
                                                                    <td width="20"></td>
                                                                    <td valign="top" width="135" align="center"  style="font-size:16px; color:#111111;"><font face="\'Roboto\', Arial, sans-serif">Prioridad:<br>'.$prioridad.'</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="20" class="hide"></td>
                                <td align="left" class="condensed" valign="top">
                                    <table align="left" border="0" cellpadding="0" cellspacing="0" class="mob-column" width="290">
                                        <tr>
                                            <td valign="top" align="center">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td valign="top" align="center" class="100padleftright">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="135" align="center"><a href="#"><img src="http://i.imgur.com/NJCUsX2.png" border="0" style="display:block;"/></a></td>
                                                                    <td width="20"></td>
                                                                    <td width="135" align="center"><a href="#"><img src="http://i.imgur.com/4gnXeyt.png" border="0" style="display:block;"/></a></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" class="100padleftright" align="center">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td valign="top" width="135" align="center" style="font-size:16px; color:#111111;"><font face="\'Roboto\', Arial, sans-serif">Usuario que delega:<br>'.$usuario_nombre.' '.$usuario_apellido.'</font></td>
                                                                    <td width="20"></td>
                                                                    <td valign="top" width="135" align="center"  style="font-size:16px; color:#111111;"><font face="\'Roboto\', Arial, sans-serif">Aeropuerto Internacional La Chinita</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="640" border="0" cellspacing="0" cellpadding="0" bgcolor="#b2d6db" class="100p" height="1">
                <tr>
                    <td width="20" bgcolor="#FFFFFF"></td>
                    <td align="center" height="1" style="line-height:0px; font-size:1px;">&nbsp;</td>
                    <td width="20" bgcolor="#ffffff"></td>
                </tr>
            </table>
            <table width="640" border="0" cellspacing="0" cellpadding="20" bgcolor="#ffffff" class="100p">
                <tr>
                    <td align="center" style="font-size:16px; color:#848484;"><font face="\'Roboto\', Arial, sans-serif"><span style="color:#000000; font-size:24px;">Descripcion del Mantenimiento</span><br />
                        <br />
                        <span style="font-size:16px;">'.$array['desc_mant'].'</span></font>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size:16px; color:#848484;"><font face="\'Roboto\', Arial, sans-serif"><span style="color:#FF0000; font-size:16px;">Aeropuerto Internacional La Chinita</span><br />
                        <br /></span></font>
                    </td>
                </tr>
            </table>
            <table width="640" border="0" cellspacing="0" cellpadding="20" bgcolor="#ffffff" class="100p">
                <tr>
                    <td align="left" width="50%" style="font-size:14px; color:#848484;"><font face="\'Roboto\', Arial, sans-serif">Bolivariana de Aeropuertos (BAER) , S.A.</font></td>
                    <td align="right" width="50%" style="font-size:14px; color:#848484;"><font face="\'Roboto\', Arial, sans-serif">Aeropuerto Internacional "La Chinita"</font></td>
                </tr>
            </table>
            <table width="640" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" class="100p">
                <tr>
                    <td align="center"><img src="http://i.imgur.com/dZUREej.png?1" class="100p" border="0" style="display:block" /></td>
                </tr>
            
            <table width="640" class="100p" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="50"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
    
</body>
</html>
';
    $m->AltBody = "Estimado personal de Mantenimiento, ante todo reciba un cordial saludo patriotico y revolucionario. A traves de este comunicado le notificamos que usted tiene un mantenimiento pendiente por realizar al Activo ".$nombre_modelo.", Serial ".$activo['serial'].", ubicado en ".$nombre_ubicacion.". A continuacion los datos referentes al mantenimiento:
    Fecha de registro - ".$array['fecha_reg'].", Descripci&oacute;n - ".$array['desc_mant'].", Prioridad -".$array['prioridad'].", Usuario que delega - ".$array['user_reg'].". Patria Socialista o Muerte, Venceremos!"
    ;

//var_dump($m->send());
    if (!$m->send()){
        echo "No se pudo enviar el E-mail solicitado";
        
    }
    else{
        echo "Se ha enviado el E-mail exitosamente";
    }
    
} 

else {
    echo "No se ha encontrado el mantenimiento planificado.";
}

 ?>