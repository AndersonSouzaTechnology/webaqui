<?php
session_start(); // Inicia a sessão

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['enviar'])) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'contato@webaqui.com.br';
        $mail->Password   = 'Vipe4730@';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom('contato@webaqui.com.br', 'Contato webaqui');
        $mail->addAddress('contato@webaqui.com.br', 'Joe User');
        $mail->addReplyTo('contato@webaqui.com.br', 'Information');

        $mail->isHTML(true);
        $mail->Subject = 'Formulário de contato';
        $mail->Body    = "Mensagem enviada através do site, segue informações abaixo:<br>
                          Nome: " . $_POST['text'] . "<br>
                          Telefone: " . $_POST['tel'] . "<br>
                          E-mail: " . $_POST['email'];

        $mail->send();
        $_SESSION['mensagem'] = 'E-mail enviado com sucesso!';
    } catch (Exception $e) {
        $_SESSION['mensagem'] = "Erro ao enviar o e-mail:" . $mail->ErrorInfo;
    }
} else {
    $_SESSION['mensagem'] = "Erro ao enviar o e-mail, acesso não foi via formulário.";
}

header("Location: index.php"); // Certifique-se de que o caminho está correto
exit();

