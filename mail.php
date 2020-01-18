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





    //параметры по умолчанию
    $myMail = 'manockov@outlook.com';
    $tema = 'Письмо с сайта';
    // Отслеживаем передачу данных методом POST
    if($_POST['send']){
        //занносим данные в переменные
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        //указываем от кого письмо
        $header = "From: ".$email;
        //отправляем письмо
        $sended = mail($myMail, $tema, $message, $header);
        //проверяем, если письмо отправилось, выводим сообщение, если нет, тоже сообщаем об этом
        if($sended){
            echo "Письмо успешно отправленно!";
        }else{
            echo "Письмо не отправилось!";
        }
    }


?>