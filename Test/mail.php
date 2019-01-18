<?php

$yoursecretkey = "6LeK6l4UAAAAAKmXeItqGYE0SajSsXA84RgY9bLG";

$yourpublickey = "6LeK6l4UAAAAANyt73QsykFsODIfwN02FYpRdodk";

// GOOGLE GOODNESS
  ini_set('display_errors',1);  error_reporting(E_ALL);
  if(isset($_POST['submit'])){
      $userIP = $_SERVER["REMOTE_ADDR"];
      $recaptchaResponse = $_POST['g-recaptcha-response'];
      $secretKey = $yoursecretkey;
      $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}&remoteip={$userIP}");

      if(!strstr($request, "true")){
          echo '<div class="alert alert-danger" role="alert"><strong>Ошибка! </strong>У Вас проблемы с капчей, возможно Вы ошиблись или Вы робот=)</div>';
      }
      else{

require_once('catalog/view/javascript/phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$adres = $_POST['user_adres'];
$phone = $_POST['user_phone'];
$select = $_POST['product_select'];
$size = $_POST['product_size'];
$under = $_POST['under_size'];
$usermessage = $_POST['user_message'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.beget.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mail@lascut.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'jinhost52'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('mail@lascut.ru'); // от кого будет уходить письмо
$mail->addAddress('mail@lascut.ru');     // Кому будет уходить письмо 
$mail->addReplyTo($email);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment($_FILES['upload']['tmp_name'], $_FILES['upload']['name']);    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта - Lascut';
$mail->Body    = '<table style="width: 100%;">
	<tr style="background-color: #f8f8f8;">
		<td style="padding: 10px; border: #e9e9e9 1px solid;"><strong>Ф.И.О:</strong></td>
		<td style="padding: 10px; border: #e9e9e9 1px solid;">'.$name.'</td>
	</tr>
	<tr style="background-color: #f8f8f8;">
		<td style="padding: 10px; border: #e9e9e9 1px solid;"><strong>E-mail:</strong></td>
		<td style="padding: 10px; border: #e9e9e9 1px solid;">'.$email.'</td>
	</tr>
	<tr style="background-color: #f8f8f8;">
		<td style="padding: 10px; border: #e9e9e9 1px solid;"><strong>Адрес доставки:</strong></td>
		<td style="padding: 10px; border: #e9e9e9 1px solid;">'.$adres.'</td>
	</tr>
	<tr style="background-color: #f8f8f8;">
		<td style="padding: 10px; border: #e9e9e9 1px solid;"><strong>Телефон:</strong></td>
		<td style="padding: 10px; border: #e9e9e9 1px solid;">'.$phone.'</td>
	</tr>
	<tr style="background-color: #f8f8f8;">
		<td style="padding: 10px; border: #e9e9e9 1px solid;"><strong>Выбранная продукция:</strong></td>
		<td style="padding: 10px; border: #e9e9e9 1px solid;">'.$select.'</td>
	</tr>
	<tr style="background-color: #f8f8f8;">
		<td style="padding: 10px; border: #e9e9e9 1px solid;"><strong>Размер изделия, мм.:</strong></td>
		<td style="padding: 10px; border: #e9e9e9 1px solid;">'.$size.'</td>
	</tr>
	<tr style="background-color: #f8f8f8;">
		<td style="padding: 10px; border: #e9e9e9 1px solid;"><strong>Размер места под изделие, мм.:</strong></td>
		<td style="padding: 10px; border: #e9e9e9 1px solid;">'.$under.'</td>
	</tr>
	</tr>
	<tr style="background-color: #f8f8f8;">
		<td style="padding: 10px; border: #e9e9e9 1px solid;"><strong>Сообщение:</strong></td>
		<td style="padding: 10px; border: #e9e9e9 1px solid;">'.$usermessage.'</td>
	</tr>
</table>';
//Success
if(!$mail->send()) {
    echo 'Error';
} else {
	include('https://lascut.ru/index.php?route=information/contact/success');
}
}}
?>


