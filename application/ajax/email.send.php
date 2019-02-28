<?php
session_start();
$email = $_REQUEST['email'];
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$subject = "Registration Verification";
$key = generateRandomString();
$_SESSION['email-key'] = $key;
$message = "
    <html> 
    <head> 
        <title>E-mail verification</title> 
    </head> 
    <body> 
        <div style='width: 100%; height:100px; background: #414141; text-align:center;  padding-top: 35px;'>
            <h1 style=' color: #eee; font-family: Helvetica, sans-serif; font-size: 35px;'>Your e-mail verification key</h1>
        </div>
        <div style='margin:20px auto; color: #414141; font-family: Helvetica, sans-serif; font-size: 20px; display: block; text-align: center;'>
        <h2>Hello, this is your verification key, enter it into confirmation form: " . $key . "</h2>
        </div>
    </body> 
</html>
";
$headers = "Content-type: text/html; charset=utf-8 \r\n";
if (mail($email, $subject, $message, $headers)) {
	echo '1';
} else {
	echo '0';
}
?>