<?php
// Email class interacting with PHPMailer to send email
namespace helpers;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    protected $receiver;
    protected $sender;
    protected $password;
    protected $mail;
    protected $template;

    /**
     * @param $email
     */
    public function __construct($email)
    {
        $this->receiver = $email;
        $this->sender = 'donate.us.sl@gmail.com';
        $this->password = 'xxtsnkzzsockiejj';

        $this->mail = new PHPMailer();
        $this->mail->isSMTP();                                     //Send using SMTP
        $this->mail->Host = 'smtp.gmail.com';                //Set the SMTP server to send through
        $this->mail->SMTPAuth = true;                            //Enable SMTP authentication
        $this->mail->Username = $this->sender;                   //SMTP username
        $this->mail->Password = $this->password;                 //SMTP password
        $this->mail->SMTPSecure = 'tls';                           //Enable implicit TLS encryption
        $this->mail->Port = 587;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    }

    // send OTP verification email

    /**
     * @param $receiverName
     * @param $OTPCode
     * @return void
     */
    public function sendVerificationEmail($receiverName, $OTPCode)
    {
        $this->template = URLROOT . "/templates/email.php";

        try {
            $this->mail->setFrom($this->sender, 'DonateUs');
            $this->mail->addAddress($this->receiver);
            $this->mail->addReplyTo($this->sender);

            $this->mail->isHTML(true);
            $this->mail->Subject = "DonateUs Account Verification";

            if (file_exists($this->template)) {
                $this->mail->Body = "<h1 style='text-align: center; margin-top: 40px;'>Hello " . $receiverName . ",</h1>" . file_get_contents($this->template) .
                    "<br><h4 style='text-align: center;'>The verification code is : <b>" . $OTPCode . "<b></h4>";
            } else {
                $this->mail->Body = "<h1 style='text-align: center; margin-top: 40px;'>Hello " . $receiverName . ",</h1>
                    <h2 style='color: #0A2558;'>Welcome To DonateUs</h2>
                    <h4>Before using our service there is one more little thing to do. Please use the below OTP to verify your account.</h4>
                    <h3 style='color: #0A2558;'>Thank You!</h3>
                    <h4 style='text-align: center;'>The verification code is : <b>" . $OTPCode . "<b></h4>";
            }
            $this->mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    /**
     * @param $resetLink
     * @return void
     */
    public function sendPasswordResetEmail($resetLink)
    {
        try {
            $this->mail->setFrom($this->sender, 'DonateUs');
            $this->mail->addAddress($this->receiver);
            $this->mail->addReplyTo($this->sender);

            $this->mail->isHTML(true);
            $this->mail->Subject = "DonateUs Password Reset";
            $receiverName = "User";

            $this->mail->Body = "<h1 style='text-align: center; margin-top: 40px;'>Hello " . $receiverName . ",</h1>
                <br><h4 style='text-align: center;'>Dear user,
                <br><br>
                You have requested to reset your password. Please click the following link to reset your password:
                <br><br>
                <a href='" . $resetLink . "'>Reset Password</a>
                <br><br>
                If you did not request this, please ignore this email.
                <br><br>
                Regards,
                <br>
                DonateUs</h4>";
            $this->mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}