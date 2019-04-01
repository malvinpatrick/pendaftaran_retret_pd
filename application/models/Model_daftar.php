<?php
class Model_daftar extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->database();
    }

    public function insertData(){
        $nrp = $this->input->post("nrp");
        $nama = $this->input->post("nama");
        $email = $this->input->post("email");
        $line = $this->input->post("line");
        $notelp = $this->input->post("notelp");
        $jk = $this->input->post("JK");
        $alergi = $this->input->post("alergi");
        $jurusan = $this->input->post("jurusan");

        $data = array(
            'nama' => $nama,
            'nrp' => $nrp,
            'jenis_kelamin' =>$jk,
            'no_hp' => $notelp,
            'id_line' => $line,
            'email' => $email,
            'id_jurusan' => $jurusan,
            'alergi' => $alergi
        );

        $this->db->insert('dataregister',$data);
        return $email;
    }

    function cek($nrp){
        $query = $this->db->query("select count(*) as jumlah from dataregister where nrp = '".$nrp."'");
        return $query->result();
    }
}

?>