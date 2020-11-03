<?php
error_reporting(0);

include ('fpdf/fpdf.php');

sleep(1);

$servidor="localhost";   
$usuario="root";         
$contraseña="";

$db = mysql_connect($servidor, $usuario,$contraseña); 
  if (!$db)
  {
     echo "Error: No se ha podido conectar al servidor.";
     exit;
  }

$basedatos= mysql_select_db("area_deportes");  
if (!$basedatos)
{
     echo "Error: No se ha podido conectar a la base de datos.";
     exit;
}

//Validacion email
if (trim($_POST['email']) == '')
{
       echo "<script type=\"text/javascript\">alert('Proporciona un correo');</script>";
}else{
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === FALSE){
        echo "<script type=\"text/javascript\">alert('Esta direccion de correo no es valida, verificala');</script>";
        }else{
         $email =  mysql_real_escape_string($_POST['email']);
        }
}

$sql = "SELECT * FROM registros WHERE email = '".$email."'";
$result = mysql_query($sql);

$num=mysql_num_rows( $result);

if($num==0){
  echo "<script type=\"text/javascript\">alert('Este correo no esta registrado, verifique sus datos o registrese');</script>";
}else{

while ($row = mysql_fetch_array($result)):

  $nombre_bd = $row[ 'nombre' ];
  $paterno_bd = $row[ 'paterno' ];
  $materno_bd = $row[ 'materno' ];
  $costo_bd = $row[ 'costo' ];

  $pdf = new FPDF();
  $pdf->AddPage();

    $pdf->SetFont('Helvetica', 'B', 14);
    $pdf->Write (7,"Recibo para deposito en cuenta");
    $pdf->Ln(15);
    $pdf->Write (7,"Nombre del participante:");
    $pdf->Write (7,$nombre_bd);
    $pdf->Write (7,$paterno_bd);
    $pdf->Write (7,$materno_bd);
    $pdf->Ln(15); //salto de linea
    $pdf->Write (7,"Informacion para deposito en cuenta:");
    $pdf->Ln(15);
    $pdf->Write (7,"Banco: HSBC");
    $pdf->Ln();
    $pdf->Write (7,"Titular: Yamira Vargas");
    $pdf->Ln();
    $pdf->Write (7,"Cuenta: 123456"); 
    $pdf->Ln(15);//ahora salta 15 lineas 
    $pdf->SetTextColor('255','0','0');//para imprimir en rojo 
    $pdf->Multicell(190,7,"\n Total a pagar:".$costo_bd,1,'R');
    $pdf->Ln(15);
    $pdf->SetTextColor('0','0','0');
    $pdf->Write (5,"Favor de enviar una copia del baucher de pago emitido por el banco, 
    al siguiente correo: por_ti_por_tu_salud@hotmail.com");
    $pdf->Ln(15);
    $pdf->Write (5,"Se le pide esta informacion para poder verificar su pago y asignarle su numero de competidor");
    $pdf->Output("recibo.pdf",'F');
    echo "<script language='javascript'>window.open('pdf/recibo.pdf','_self','');</script>";//para ver el archivo pdf generado
    exit;
 endwhile;
}

?>