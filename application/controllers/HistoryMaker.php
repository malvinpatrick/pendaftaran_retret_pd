<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryMaker extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
        $this->load->database();

        include_once("PHPMailer/phpmailer.php");
        //TIMEZONE
        date_default_timezone_set("Asia/Jakarta");
	}
	
	public function index()
	{
	    $dateNow = new DateTime();
	    $dateLimit = new DateTime("06-10-2018 00:00:00");

	    if($dateNow > $dateLimit){
	        $this->load->view("close");
        }else{
            $this->load->view('index');
            if($this->input->post('submit'))
            {
                $this->load->model('Model_daftar');
                $cek = $this->Model_daftar->cek($this->input->post('nrp'));
                $nrp = $this->input->post('nrp');
                $avaible = false;
                foreach ($cek as $i){
                    if($i->jumlah == 0) $avaible = true;
                    else $avaible = false;
                }
                if($avaible == true && (strlen($nrp) == 6 || strlen($nrp) == 9)){
                    $id = $this->Model_daftar->insertData();
                    $this->session->set_userdata('email', $id);


                    $nama = $this->input->post('nama');
                    $email = $this->input->post('email');
                    $notel = $this->input->post('notelp');
                    $this->email($nrp, $nama, $email, $notel);
                    redirect('HistoryMaker/response');
                }else{
                    echo "<script>alert('ERROR !!')</script>";
                }
            }
        }
	}

	public function email($nrp, $nama, $email, $no){
        //SEND EMAIL
        $emails=new myPHPMailer();
        if($emails ->send_news($nrp,$nama,$email,$no)){
            echo "Email sudah dikirim !!!";
        }else{
            echo "Gagal kirim email";
        }
    }

    public function response()
    {
        //CEK, JIKA DITEMBAK LANGSUNG
        if($this->session->userdata('email')){
            $data["email"] = $this->session->userdata('email');
            $this->load->view('response', $data);
        }else{
            redirect();
        }

    }

}
