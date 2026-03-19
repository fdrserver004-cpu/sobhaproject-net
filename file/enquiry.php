<?php
 require 'PHPMailer/vendor/autoload.php'; // Include PHPMailer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $PROJECT = $_POST['property_name'];
    $message = $_POST['comment'];
      
    $to = 'sahnisapna1212@gmail.com';
    
    $subject = 'New Form Submission';

   $email_content .= "<html>
<head>
<title>HTML email</title>
</head>
<body>

<table style='border:1px solid #ddd; padding:20px;'>
<tr >
<th style='font-size:14px;font-family:roboto;'> ".$PROJECT." </th>
</tr>
<tr>
<th style='text-align:left;padding-right:30px;border:1px solid #ddd; font-family:roboto;padding:10px;'> Name </th>
<th style='text-align:left;padding-right:30px;border:1px solid #ddd;font-family:roboto;padding:10px;'> Email </th>
<th style='text-align:left;border:1px solid #ddd;font-family:roboto;padding:10px;'> Phone </th>
<th style='text-align:left;border:1px solid #ddd;font-family:roboto;padding:10px;'> Message </th>

</tr>
<tr>
<td style='text-align:left;border:1px solid #ddd;font-family:roboto;padding:10px;'> ".$name."</td>
<td style='text-align:left;border:1px solid #ddd;font-family:roboto;padding:10px;'> ".$email."</td>
<td style='text-align:left;border:1px solid #ddd;font-family:roboto;padding:10px;'>".$phone."</td>
<td style='text-align:left;border:1px solid #ddd;font-family:roboto;padding:10px;'>".$message."</td>
</tr>

</table>
</body>
</html>
";
    try {
    $mail->SMTPSecure = "ssl";  
    $mail->Host='smtp.gmail.com';  
    $mail->Port='465';   
    $mail->Username   = 'parvesh@globalhunttechnologies.in'; 
    $mail->Password   = 'ovlzislhowcmscua';  
    $mail->SMTPKeepAlive = true;  
    $mail->Mailer = "smtp"; 
    $mail->IsSMTP();  
    $mail->SMTPAuth   = true;
    $mail->CharSet = 'utf-8';  
    $mail->SMTPDebug  = 0;
    $mail->setFrom($email, $name);
    $mail->addAddress($to);
    $mail->isHTML(true);     
    $mail->Subject = $subject;
    $mail->Body = $email_content;

    $mail->send();
   
     
     header("Location: http://buypropertybangalore.com/thanks.html");
} catch (Exception $e) {
    header("Location: http://buypropertybangalore.com/");
}
}


?>