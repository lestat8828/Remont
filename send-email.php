<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	die('Forbidden');
}

$email = '';
$phone = '';
$name = '';
$message = '';

$to = 'kyivrepair@gmail.com';

if (isset($_POST['email'])) {
	$email = $_POST['email'];
}

if (isset($_POST['phone'])) {
	$phone = $_POST['phone'];
}

if (isset($_POST['name'])) {
	$name = $_POST['name'];
}

if (isset($_POST['message'])) {
	$message = $_POST['message'];
}

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$body = "
		Имя: ${name}
		Тел: ${phone}
		Email: ${email}
		Сообщение: ${message}
";

mail($to, 'РЕМОНТ ' . date('Y-m-d H:m'), $body);

header("Location: http://kyivrepair.pro/sendmail.html", true, 301);
exit();