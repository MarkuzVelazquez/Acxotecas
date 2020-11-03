<?php
include ('fpdf/fpdf.php');

error_reporting(0);

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

  $no_competidor = $row[ 'id_registros' ];
  $pago = $row[ 'pago' ]; 
  $evento = $row[ 'evento' ]; 
 endwhile;
}

if($pago=="SI"){
  
  $pdf = new FPDF();
  $pdf->AddPage();

    $pdf->SetFont('Helvetica', 'B', 38);
    $pdf->Write (10,$evento);
    $pdf->Ln(20);
    $pdf->Write (18,"Numero de Participante");
    $pdf->Ln(50);
    $pdf->SetFont('Helvetica', 'B', 200);
    $pdf->Write (10,$no_competidor);
    $pdf->Ln(15); //salto de linea
    $pdf->Output("runner.pdf",'F');
    echo "<script language='javascript'>window.open('runner/runner.pdf','_self','');</script>";//para ver el archivo pdf generado
    exit;
}else{
    echo "<script type=\"text/javascript\">alert('Aun no ha sido verificado tu pago, espera 1-3 dias habiles por la verificacion');</script>";
}

?>