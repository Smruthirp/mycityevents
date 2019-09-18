<?php
require 'phpmailer/PHPMailerAutoload.php';
ob_start();
//require "generate-pdf.php";
include "pgResponse.php";
ob_end_clean();

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "premium25.web-hosting.com"; //premium25.web-hosting.com
$mail->SMTPSecure = "tls";
$mail->Port = 587; 
$mail->SMTPAuth = true;
$mail->Username = 'noreply@mycityevents.org'; //noreply@mycityevents.org
$mail->Password = 'Vijaypur1$'; //Vijaypur1$

$mail->setFrom('noreply@mycityevents.org','My City Events');
$mail->addAddress($email);
$mail->Subject = $user."'s". " event for ". $event." on ". $startDate;
$mail->Body = "Hello ".$user.", \n\n"."Thank you for booking ticket with us.\nPlease Find Attached your ticket, to this email."."\n\nFor Any Concerns or Help, please contact us on support@mycityevents.org \n\n"."Thanks, \nMy City Events";
require 'generate-pdf.php';
$pdfdoc = $pdf->Output('', 'S');
$mail->addStringAttachment($pdfdoc, $user."'s". " event for ". $event." on ". $startDate . ".pdf");

if ($mail->send())
    echo "Mail sent";
else
	echo "Mail not sent";
?>