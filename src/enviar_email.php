
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'caminho/para/o/PHPMailer/src/Exception.php';
require 'caminho/para/o/PHPMailer/src/PHPMailer.php';
require 'caminho/para/o/PHPMailer/src/SMTP.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0; 
    $mail->isSMTP(); 
    $mail->Host = 'seu_host_smtp'; 
    $mail->SMTPAuth = true; 
    $mail->Username = 'seu_email'; 
    $mail->Password = 'sua_senha'; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587; 

    $mail->setFrom('seu_email', 'Seu Nome');
    $mail->addAddress('destinatario_email', 'Destinatario Nome');

    $mail->isHTML(true);
    $mail->Subject = $assunto;
    $mail->Body = "Nome: $nome<br>Email: $email<br>Assunto: $assunto<br>Mensagem: $mensagem";

    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar a mensagem. Mailer Error: {$mail->ErrorInfo}";
}
?> 
