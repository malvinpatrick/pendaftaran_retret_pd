<?php
        require_once('phpmailer\PHPMailerAutoload.php');


class myPHPMailer{
    private $host;
    private $username;
    private $password;
    private $webHandlerURL;
    private $fromEmailAddress;private $fromEmailName;
    
    private $namaPerusahaan;
    private $tahunPerusahaan;
    private $replyTo;
	
	/**
     * PHP Mailer Class init
     * @author Williams Gunawan <williams.gunawan123@gmail.com>
     * @since 2018
     *
     * @return void
     */

    function __construct()
    {
        $this->host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $this->username = 'retretpd2018@gmail.com';                 // SMTP username
        $this->password = 'sttsuntukjesus';                           // SMTP password
        $this->fromEmailAddress = "noreply@tumasing.com" ;
        $this->fromEmailName = "UNTUK ACARA APA" ;
        $this->webHandlerURL = "http://registration.php?vKey=" ;
        $this->namaPerusahaan = "DARI ORGANISASI APA" ;
        $this->tahunPerusahaan = "2018" ;
        $this->replyTo = "REPLY TO@gmail.com" ;
    }



    private function sendmail($kirim, $pesan, $judul, $balas){
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 2;                               // Enable verbose debug
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $this->host;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $this->username;                 // SMTP username
        $mail->Password = $this->password;                           // SMTP password
        $mail->SMTPSecure = 'tls';              // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;
        $mail->setFrom($this->fromEmailAddress, $this->fromEmailName);
        $mail->addAddress($kirim, 'Welcome !');     // Add a recipient
        $mail->addReplyTo($balas, 'EZ Code');
        $mail->Subject = $judul;
        $mail->Body    = $pesan;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $sukses='';
        if(!$mail->send()) {
            $sukses= false;
            $error = $mail->ErrorInfo;
        } else {
            $sukses =true;
        }
        return $sukses;
    }

    function send_news($NRP,$NAMA,$JURUSAN,$EMAIL,$NO,$LINE,$JK,$ALERGI){
        $oritemplate=file_get_contents('sendMail.html');
		$textEmail=str_replace("@NRP",$NRP,$oritemplate);
		$textEmail=str_replace("@NAMA",$NAMA,$textEmail);
        $textEmail=str_replace("@JURUSAN",$JURUSAN,$textEmail);
        $textEmail=str_replace("@EMAIL",$EMAIL,$textEmail);
        $textEmail=str_replace("@NO",$NO,$textEmail);
        $textEmail=str_replace("@LINE",$LINE,$textEmail);
        $textEmail=str_replace("@JK",$JK,$textEmail);
        $textEmail=str_replace("@ALERGI",$ALERGI,$textEmail);
        $phpmail=new myPHPMailer();
		return $phpmail->sendmail($EMAIL,$textEmail,' Konfirmasi Pendaftaran ',$this->replyTo);
        //echo sentEmail($email,$textEmail);
	}


    
}