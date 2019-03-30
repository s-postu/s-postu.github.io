<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];
$name = htmlspecialchars($name);
$phone = htmlspecialchars($phone);
$email = htmlspecialchars($email);
$message = htmlspecialchars($message);
$name = urldecode($name);
$phone = urldecode($phone);
$email = urldecode($email);
$message = urldecode($message);
$name = trim($name);
$phone = trim($phone);
$email = trim($email);
$message = trim($message);

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.rambler.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 's-postu';               // Наш логин
$mail->Password = 'krasnikova29850221';               // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('s-postu@rambler.ru', 'От сайта Сваи');   // От кого письмо 
$mail->addAddress('krastp@gmail.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Данные из сайта Сваи';
$mail->Body    = '
	Пользователь оставил свои данные <br> 
	Имя: ' . $name . ' <br>
	Телефон: ' . $phone . ' <br>
	Почта: ' . $email . ' <br>
	Сайт: ' . $user_url . ' <br>
	Сообщение: ' . $message . '';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>