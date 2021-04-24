<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lacak extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('lacak/mLacak','lacak');
	}

    public function index() {
        $this->db = $this->load->database('default', true);
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}
        $q1 = 'select count(*) jumlah from t_surat_masuk where status = 1';
        $getq1 = $this->db->query($q1)->row();
        $jum1 = $getq1->jumlah;

        $q2 = 'select count(*) jumlah from t_surat_masuk where status = 2';
        $getq2 = $this->db->query($q2)->row();
        $jum2 = $getq2->jumlah;
        
        $q3 = 'select count(*) jumlah from t_surat_masuk where status = 3';
        $getq3 = $this->db->query($q3)->row();
        $jum3 = $getq3->jumlah;
        
        $q4 = 'select count(*) jumlah from t_surat_masuk where status = 4';
        $getq4 = $this->db->query($q4)->row();
        $jum4 = $getq4->jumlah;

        $q5 = 'select count(*) jumlah from t_surat_masuk where status = 5';
        $getq5 = $this->db->query($q5)->row();
        $jum5 = $getq5->jumlah;
        $data = array(
            'page'=>"tracking",
            'jum1'=>$jum1,
            'jum2'=>$jum2,
            'jum3'=>$jum3,
            'jum4'=>$jum4,
            'jum5'=>$jum5,
        );
		
		$this->load->view('lacak/vLacak', $data);
	}

    public function lacakList()
    {
        $status = $_GET['status'];
        $this->load->helper('url');    
        $list = $this->lacak->get_datatables($status);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $lacak) {
            $no++;
            $row = array();
            $row[] = $lacak->no_surat;
            $row[] = $lacak->indek_berkas;
            $row[] = $lacak->kegiatan;
            $row[] = $lacak->isi_ringkas;
            $row[] = $lacak->dari;
            $row[] = $lacak->tgl_surat;
            $row[] = $lacak->tgl_diterima;
       
            if($lacak->status==5){
                $row[] = "0 hari";
            }
            else{
                $tgl1 = new DateTime("now");
                $tgl2 = new DateTime($lacak->tgl_selesai);
                $d = $tgl2->diff($tgl1)->days;
                $row[] = $d." hari";    
            }
            
            $row[] = $lacak->tgl_selesai;
            if($lacak->status==1){
                $row[]= 'Surat Baru Masuk';
            }elseif($lacak->status==2){
                $row[]='Surat sudah di disposisi Kepala';
            }
            elseif($lacak->status==3){
                $row[]='Surat sudah di disposisi kasubag';
            }elseif($lacak->status==4){
                $row[]='Surat sudah di terima pelaksana';
            }elseif($lacak->status==5){
                $row[]='Surat sudah selesai';
            }else{
                $row[]='Status tidak diketahui';
            }

            if($lacak->status==4)
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit"
                onclick="selesai('."'".$lacak->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Selesaikan</a>';
            else
            $row[] = '';
            $data[] = $row;
            }

            $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->lacak->count_all($status),
            "recordsFiltered" => $this->lacak->count_filtered($status),
            "data" => $data,
            );
            //output to json format
            echo json_encode($output);
            }
     function lacakSelesai($id){
        $this->db = $this->load->database('default', true);
        $qSelesai = "update t_surat_masuk set status = 5, tgl_selesai =now() where id = '$id'";
        $this->db->query($qSelesai);
        echo json_encode(array("status" => TRUE));
    }
         
}