<?php

// $method = $_SERVER['REQUEST_METHOD'];

// //Script Foreach
// $c = true;
// if ( $method === 'POST' ) {

// 	$project_name = trim($_POST["project_name"]);
// 	$admin_email  = trim($_POST["admin_email"]);
// 	$form_subject = trim($_POST["form_subject"]);

// 	foreach ( $_POST as $key => $value ) {
// 		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
// 			$message .= "
// 			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
// 				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
// 				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
// 			</tr>
// 			";
// 		}
	
// 	}
// } else if ( $method === 'GET' ) {

// 	$project_name = trim($_GET["project_name"]);
// 	$admin_email  = trim($_GET["admin_email"]);
// 	$form_subject = trim($_GET["form_subject"]);

// 	foreach ( $_GET as $key => $value ) {
// 		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
// 			$message .= "
// 			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
// 				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
// 				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
// 			</tr>
// 			";
// 		}
// 	}
// }

// $message = "<table style='width: 100%;'>$message</table>";

// function adopt($text) {
// 	return '=?UTF-8?B?'.Base64_encode($text).'?=';
// }

// $headers = "MIME-Version: 1.0" . PHP_EOL .
// "Content-Type: text/html; charset=utf-8" . PHP_EOL .
// 'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
// 'Reply-To: '.$admin_email.'' . PHP_EOL;

// mail($admin_email, adopt($form_subject), $message, $headers );

echo "code success";


/*
Форма обратной связи может получать сообщения с любых почтовых ящиков.
Исправлена проблема кодировки при получении писем почтовым клиентом Outlook.
Вы скачали её с сайта Epic Blog https://epicblog.net Заходите на сайт снова!
ВНИМАНИЕ! Лучше всего в переменную myemail прописать почту домена, который использует сайт. А не mail.ru, gmail и тд.
*/
if(isset($_POST['submit'])){
/* Устанавливаем e-mail Кому и от Кого будут приходить письма */   
$to = "obr66139@bcaoo.com"; // Здесь нужно написать e-mail, куда будут приходить письма   
$from = "no-reply(собака)epicblog.net"; // Здесь нужно написать e-mail, от кого будут приходить письма, например no-reply(собака)epicblog.net
 
/* Указываем переменные, в которые будет записываться информация с формы */
$first_name = $_POST['first_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$subject = "Форма отправки сообщений с сайта Epic Blog";
     
/* Проверка правильного написания e-mail адреса */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<br /> Е-mail адрес не существует");
}
     
/* Переменная, которая будет отправлена на почту со значениями, вводимых в поля */
$mail_to_myemail = "Здравствуйте! 
Было отправлено сообщение с сайта! 
Имя отправителя: $first_name
E-mail: $email
Номер телефона: $phone
Текст сообщения: $message
Чтобы ответить на письмо, создайте новое сообщение, скопируйте электронный адрес и вставьте в поле Кому.";  
     
$headers = "From: $from \r\n";
     
/* Отправка сообщения, с помощью функции mail() */
mail($to, $subject, $mail_to_myemail, $headers . 'Content-type: text/plain; charset=utf-8');
echo "Сообщение отправлено. Спасибо Вам " . $first_name . ", мы скоро свяжемся с Вами.";
echo "<br /><br /><a href='https://epicblog.net'>Вернуться на сайт.</a>";
}
?>
