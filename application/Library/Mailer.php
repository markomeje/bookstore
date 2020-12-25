<?php

namespace Bookstore\Library;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Bookstore\Core\Logger;

class Mailer {


	public static function mail($type, $email, $data = []) {
		$mail = new PHPMailer;
		try { 
            $mail->isMail();
            $mail->SetFrom(EMAIL_FROM, EMAIL_FROM_NAME);
            $mail->AddReplyTo(EMAIL_REPLY_TO);
            $mail->isHTML(true);

            switch($type) {
                case (EMAIL_VERIFICATION):
                    $mail->Body = self::emailVerifyBody($email, $data);
                    $mail->Subject = EMAIL_VERIFICATION_SUBJECT;
                    $mail->AddAddress($email);
                    break;
                case (PASSWORD_RESET):
                    $mail->Body = self::passwordResetBody($email, $data);
                    $mail->Subject = PASSWORD_RESET_SUBJECT;
                    $mail->AddAddress($email);
                    break;
                case (SEND_BOOK_AS_ATTACHMENT):
                    $mail->Body = self::sendBookAsAttachmentBody($email, $data);
                    $mail->Subject = SEND_BOOK_AS_ATTACHMENT_SUBJECT;
                    $mail->AddAddress($email);
                    $mail->addAttachment(PUBLIC_PATH . DS . 'pdfs' . DS . $data['book']);
                    break;
                case (CONTACT_EMAIL_REQUEST):
                    $mail->Body = self::contactEmailBody($email, $data);
                    $mail->Subject = CONTACT_EMAIL_REQUEST_SUBJECT;
                    $mail->AddAddress($email);
                    break;
            }
            $mail->send();
        }catch(Exception $error) {
            Logger::log('SENDING MAIL ERROR', $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
        
	}

	private static function emailVerifyBody($email, $data) {
        $body  = "";
        $body .= "Dear " . $email . ", Please Verify Your Email By Clicking On The Following Link: "."\r\n";
        $body .= EMAIL_VERIFICATION_URL . "/" . urlencode($data["token"])."\r\n";
        $body .= ". If you didn't Perform This Action With your email, Please contact the admin directly."."\r\n";
        $body .= " Regards From Success And Motivation Book Series";
        return $body;
	}

	private static function passwordResetBody($email, $data) {
        $body  = "";
        $body .= "Dear " . $email . ", Please Use The Following Token To Reset Your Password: "."\r\n";
        $body .= " " . $data["token"];
        $body .= " If you didn't Perform This Action With your email, Please contact the admin directly.";
        $body .= " Regards From Success And Motivation Book Series";
        return $body;
    }

    private static function sendBookAsAttachmentBody($email) {
        $body  = "";
        $body .= "Dear " . $email . ", Thank You For Purchasing Our Book. Please find the book as an attachment below."."\r\n";
        $body .= " Regards From Success And Motivation Book Series";
        return $body;
    }

    public static function contactEmailBody($email, $data) {
        $body  = "";
        $body .= ucwords($data['firstname']." ".$data['lastname'])." Contacted You With Email " . $data['email'] . " And Phone Number " . $data['phone'] . "\r\n"; 
        $body .= "<h1>Message Content</h1>"."\r\n";
        $body .= $data['message'];
        return $body;
    }


}