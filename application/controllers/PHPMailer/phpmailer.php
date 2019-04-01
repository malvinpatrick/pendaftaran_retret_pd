<?php
        include_once('phpmailer/PHPMailerAutoload.php');
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
        $this->fromEmailName = "History Maker" ;
        $this->webHandlerURL = "http://registration.php?vKey=" ;
        $this->namaPerusahaan = "PD ISTTS" ;
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

    function send_news($NRP,$NAMA,$EMAIL,$NO){
        $pesan = "<html>
    <head>
        <style>
            body{
                font-family: calibri;
                background: MidnightBlue ;
                color: white;
            }
            .card{
                border : 1px solid MidnightBlue;
                padding: 20px;    
                box-shadow:0px 0px 100px black;
            }
        </style>
    </head>
    <body>
        <h1>Pendaftaran Sukses !!!</h1>
        <h2>Peserta dengan identitas sebagai berikut telah berhasil melakukan pendaftaran :</h2>
        
        <div class=\"card\">
            NRP : ".$NRP." <br>
            Nama Lengkap : ".$NAMA."<br>
            Email : ".$EMAIL."<br>
            No Handphone : ".$NO."<br>
        </div>
        <p style=\"font-size: 25px\">
            Segera lunasi pembayaran retret \"History Maker\"<br>
        </p>
        <h3>Pelunasan dapat dilakukan pada 14-Sept-2018 s/d 05-Okt-2018</h3>
        <ul>
            <li>Rp. 200.000 (bagi mahasiswa lama)</li>
            <li>Rp. 150.000 (bagi mahasiswa baru)</li>
        </ul>
        Pembayaran dapat dilakukan secara transfer atau tunai saat jadwal PD berlangsung <br>
        No.Rek : <strong>0500323451</strong> (BCA) a/n Jeanifer Imaniar<br>
        <h3>Konfirmasi pembayaran dapat menghubungi :</h3>
        <ul>
            <li>Mahasiswa Baru : Jeanifer (line : jeanifer_99)</li>
            <li>Mahasiswa Lama : Joshua (line : josatojr)</li>
            <em>*kirimkan bukti transfer disertai dengan <strong>NAMA</strong> dan <strong>NRP</strong></em>
        </ul>
        Berikut adalah perlengkapan yang <strong>HARUS</strong> dibawa saat retret \"History Maker\",
        <ol>
            <li>Pakaian untuk 3 hari 2 malam</li>
            <li>Obat-obatan pribadi</li>
            <li>Alat mandi</li>
            <li>Sandal tidak licin</li>
            <li>Pakaian siap kotor dan kresek secukupnya</li>
            <li>Alkitab fisik dan alat tulis</li>
            <li>Jaket</li>
            <li>Disarankan membawa tas ransel/jinjing dan bukan koper</li>
        </ol>
        <br>
        Berikut adalah perlengkapan yang <strong>TIDAK BOLEH</strong> dibawa saat retret \"History Maker\",
        <ol>
            <li>Alat elektronik selain handphone</li>
            <li>Korek api, minuman keras, rokok, vape, dan sejenisnya</li>
            <li>Alat musik</li>
            <li>Perhiasan yang berlebihan</li>
            <li>Disarankan untuk menggunakan kacamata bagi yang menggunakan softlens</li>
        </ol>
        <br>
        Berikut adalah Peraturan yang <strong>HARUS DITAATI</strong> Selama Retret \"History Maker\",
        <ol>
            <li>Menggunakan kaos berlengan dan <strong>celana panjang</strong> selama sesi berlangsung</li>
            <li>Menggunakan tanda pengenal selama berada diluar kamar</li>
            <li>Peserta tidak diperbolehkan keluar kamar lebih dari jam 22.30 dengan alasan apapun</li>
            <li>Sebelum sesi setiap handphone dititipkan di ketua kamar atau asisten ketua kamar masing-masing</li>
            <li>DILARANG berkata kasar</li>
            <li>DILARANG berduaan dengan lawan jenis/sesama jenis</li>
            <li>DILARANG berada di sekitar kolam ruang makan</li>
        </ol>
        Apabila ada pertanyaan atau terjadi error hubungi Malvin Patrick (line : malvinpatrick)
        <div class=\"text-center mt-5\">
            <strong>God Bless You</strong>
        </div>
        <br>
        <hr>
        <h2>
        Dihimbau kepada peserta agar MENYIMPAN EMAIL INI untuk menunjukkan bahwa peserta telah resmi terdaftar untuk mengikuti Retret PD ISTTS 2018 dan ditunjukkan waktu melakukan pelunasan
        </h2>
    </body>
    
</html>";
        $phpmail=new myPHPMailer();
		return $phpmail->sendmail($EMAIL,$pesan,' Konfirmasi Pendaftaran ',$this->replyTo);
        //echo sentEmail($email,$textEmail);
	}


    
}