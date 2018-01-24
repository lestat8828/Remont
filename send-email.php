<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	die('Forbidden');
}

$email = '';
$phone = '';
$name = '';
$message = '';

$to = 'lestat88@ukr.net';
$redirectUrl = 'https://lestat8828.github.io/Remont/sendmail.html';

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
<html>
	<head></head>
	<body>
		<p>Имя: ${name}</p>
		<p>Тел: ${phone}</p>
		<p>Email: ${email}</p>
		<p>Сообщение: ${message}</p>
	</body>
</html>
";

mail($to, 'РЕМОНТ ' . date('Y-m-d H:m'), $body);

header("Location: ${$redirectUrl}");