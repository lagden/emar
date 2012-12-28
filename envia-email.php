<?php
require_once 'swiftmailer/lib/swift_required.php';

$post = isset($_POST['boxinfo']) ? $_POST['boxinfo'] : false;

// previne erros
$campos = array('titulo','nome','sobrenome','email','pais','info','outras','spam','produto','location');
foreach ($campos as $campo)
    $post[$campo] = isset($post[$campo]) ? $post[$campo] : null;

if($post)
{
    // Alterar a conta de email!!! - Webhost da erro, mas local funciona muito bem;
    // $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
    //     ->setUsername('4nothing@gmail.com')
    //     ->setPassword('big1buttgirl2');

    // Plano B
    $transport = Swift_MailTransport::newInstance();

    $mailer = Swift_Mailer::newInstance($transport);

    $body="<h1>{$post['titulo']} {$post['nome']} {$post['sobrenome']} deseja:</h1>";
    if($post['info'])$body .= "<p>{$post['info']}</p>";
    if($post['outras'])$body .= "<p>{$post['outras']}</p>";
    if($post['spam'])$body .= "<p>{$post['spam']}</p>";
    $body .= "<h2>Dados do produto</h2>";
    $body .= "<p>{$post['produto']}</p>";

    $message = Swift_Message::newInstance()
        ->setSubject('Pedido de informação')
        ->setFrom(array($post['email'] => "{$post['nome']} {$post['sobrenome']}"))
        
        // Alterar o email de quem vai receber!!!
        ->setTo(array('lagden@gmail.com','gfelizola@gmail.com'))
        ->setBody('pedido de informação')
        ->addPart($body, 'text/html');

    if ($mailer->send($message))
        header("Location: {$post['location']}");
    else
        echo "Falha no sistema.\n";

}
else
    echo "Post inválido.\n";
