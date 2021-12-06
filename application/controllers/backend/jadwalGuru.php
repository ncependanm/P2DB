<?php
class jadwalGuru extends CI_Controller{
    
    var $folder =   "backend/jadwalGuru";
    var $tables =   "tbl_jadwal_pelajaran";
    var $pk     =   "jadwal_pelajaran_id";
    var $title  =   "Daftar Jadwal Mengajar";
    var $titleInputan  = "";
    
    function __construct() {
        parent::__construct();
		$this->load->model('jadwal_model','jadwalModel');
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Jadwal Mengajar - SIAKAD ONLINE";
        $data['menu'] = "jadwal";
        $data['subMenu'] = "";
        $data['subMenuB'] = "";

		if($this->session->userdata('id_users')!='')
		{
		
		$sql = "SELECT * FROM tbl_jadwal_pelajaran tjp 
				JOIN tbl_ruangan tr ON(tjp.jadwal_pelajaran_ruangan_id = tr.ruangan_id) 
				JOIN tbl_kelas tk ON(tr.ruangan_kelas_id = tk.kelas_id) 
				JOIN tbl_jurusan tj ON(tr.ruangan_jurusan_id = tj.jurusan_id) 
				JOIN tbl_guru tg ON(tjp.jadwal_pelajaran_guru_id = tg.guru_id) 
				JOIN tbl_mata_pelajaran tmp ON(tjp.jadwal_pelajaran_mata_pelajaran_id = tmp.mata_pelajaran_id) 
				WHERE guru_id = ". $this->session->userdata('id_akun') ." 
				AND jadwal_pelajaran_hari = 1 
				ORDER BY tr.ruangan_id, tjp.jadwal_pelajaran_jam_ke ASC";
        $data['jadwalSenin'] = $this->db->query($sql)->result();
		
		$sql = "SELECT * FROM tbl_jadwal_pelajaran tjp 
				JOIN tbl_ruangan tr ON(tjp.jadwal_pelajaran_ruangan_id = tr.ruangan_id) 
				JOIN tbl_kelas tk ON(tr.ruangan_kelas_id = tk.kelas_id) 
				JOIN tbl_jurusan tj ON(tr.ruangan_jurusan_id = tj.jurusan_id) 
				JOIN tbl_guru tg ON(tjp.jadwal_pelajaran_guru_id = tg.guru_id) 
				JOIN tbl_mata_pelajaran tmp ON(tjp.jadwal_pelajaran_mata_pelajaran_id = tmp.mata_pelajaran_id) 
				WHERE guru_id = ". $this->session->userdata('id_akun') ." 
				AND jadwal_pelajaran_hari = 2 
				ORDER BY tr.ruangan_id, tjp.jadwal_pelajaran_jam_ke ASC";
        $data['jadwalSelasa'] = $this->db->query($sql)->result();
		
		
		$sql = "SELECT * FROM tbl_jadwal_pelajaran tjp 
				JOIN tbl_ruangan tr ON(tjp.jadwal_pelajaran_ruangan_id = tr.ruangan_id) 
				JOIN tbl_kelas tk ON(tr.ruangan_kelas_id = tk.kelas_id) 
				JOIN tbl_jurusan tj ON(tr.ruangan_jurusan_id = tj.jurusan_id) 
				JOIN tbl_guru tg ON(tjp.jadwal_pelajaran_guru_id = tg.guru_id) 
				JOIN tbl_mata_pelajaran tmp ON(tjp.jadwal_pelajaran_mata_pelajaran_id = tmp.mata_pelajaran_id) 
				WHERE guru_id = ". $this->session->userdata('id_akun') ." 
				AND jadwal_pelajaran_hari = 3 
				ORDER BY tr.ruangan_id, tjp.jadwal_pelajaran_jam_ke ASC";
        $data['jadwalRabu'] = $this->db->query($sql)->result();
		
		
		$sql = "SELECT * FROM tbl_jadwal_pelajaran tjp 
				JOIN tbl_ruangan tr ON(tjp.jadwal_pelajaran_ruangan_id = tr.ruangan_id) 
				JOIN tbl_kelas tk ON(tr.ruangan_kelas_id = tk.kelas_id) 
				JOIN tbl_jurusan tj ON(tr.ruangan_jurusan_id = tj.jurusan_id) 
				JOIN tbl_guru tg ON(tjp.jadwal_pelajaran_guru_id = tg.guru_id) 
				JOIN tbl_mata_pelajaran tmp ON(tjp.jadwal_pelajaran_mata_pelajaran_id = tmp.mata_pelajaran_id) 
				WHERE guru_id = ". $this->session->userdata('id_akun') ." 
				AND jadwal_pelajaran_hari = 4 
				ORDER BY tr.ruangan_id, tjp.jadwal_pelajaran_jam_ke ASC";
        $data['jadwalKamis'] = $this->db->query($sql)->result();
		
		
		$sql = "SELECT * FROM tbl_jadwal_pelajaran tjp 
				JOIN tbl_ruangan tr ON(tjp.jadwal_pelajaran_ruangan_id = tr.ruangan_id) 
				JOIN tbl_kelas tk ON(tr.ruangan_kelas_id = tk.kelas_id) 
				JOIN tbl_jurusan tj ON(tr.ruangan_jurusan_id = tj.jurusan_id) 
				JOIN tbl_guru tg ON(tjp.jadwal_pelajaran_guru_id = tg.guru_id) 
				JOIN tbl_mata_pelajaran tmp ON(tjp.jadwal_pelajaran_mata_pelajaran_id = tmp.mata_pelajaran_id) 
				WHERE guru_id = ". $this->session->userdata('id_akun') ." 
				AND jadwal_pelajaran_hari = 5 
				ORDER BY tr.ruangan_id, tjp.jadwal_pelajaran_jam_ke ASC";
        $data['jadwalJumat'] = $this->db->query($sql)->result();
		
		
		$sql = "SELECT * FROM tbl_jadwal_pelajaran tjp 
				JOIN tbl_ruangan tr ON(tjp.jadwal_pelajaran_ruangan_id = tr.ruangan_id) 
				JOIN tbl_kelas tk ON(tr.ruangan_kelas_id = tk.kelas_id) 
				JOIN tbl_jurusan tj ON(tr.ruangan_jurusan_id = tj.jurusan_id) 
				JOIN tbl_guru tg ON(tjp.jadwal_pelajaran_guru_id = tg.guru_id) 
				JOIN tbl_mata_pelajaran tmp ON(tjp.jadwal_pelajaran_mata_pelajaran_id = tmp.mata_pelajaran_id) 
				WHERE guru_id = ". $this->session->userdata('id_akun') ." 
				AND jadwal_pelajaran_hari = 6 
				ORDER BY tr.ruangan_id, tjp.jadwal_pelajaran_jam_ke ASC";
        $data['jadwalSabtu'] = $this->db->query($sql)->result();
		}		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
}