<?php
//Dados Form
$email=$_POST['email'];
$nome=$_POST['nome'];
$tel=$_POST['tel'];
$data_nasc=$_POST['data_nasc'];
$ra=$_POST['ra'];
$turma=$_POST['turma'];
$curso=$_POST['curso'];
$local=$_POST['local'];
$turno=$_POST['turno'];

$emailUser = 'manipuladorcandidatos@gmail.com';
$passwordUser = 'fmucandidatos';

$msg = "<h1><b>Candidato Cadastrado</b></h1> <br> 
Nome: ".$nome."<br>".
"Email: ".$email."<br>".
"tel: ".$tel."<br>".
"Data de Nascimento: ".$data_nasc."<br>".
"ra: ".$ra."<br>".
"turma: ".$turma."<br>".
"curso: ".$curso."<br>".
"local: ".$local."<br>".
"turno: ".$turno."<br>";

require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
  ->setUsername($emailUser)
  ->setPassword($passwordUser)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Candidato FMU'))
  ->setFrom([$emailUser => 'John Doe'])
  ->setTo(['candidatosfmu@gmail.com'])
  ->setBody($msg, 'text/html' )
  ;
// Send the message
$result = $mailer->send($message);

echo '<h2>Email enviado !</h2>';
