<?php
class jadwal extends CI_Controller{
    
    var $folder =   "backend/jadwal";
    var $tables =   "tbl_jadwal_pelajaran";
    var $pk     =   "jadwal_pelajaran_id";
    var $title  =   "Daftar Jadwal Pelajaran";
    var $titleInputan  = "Form Jadwal Pelajaran";
    
    function __construct() {
        parent::__construct();
		$this->load->model('jadwal_model','jadwalModel');
    }
    
    function data($idRuangan, $idThnAjaran, $idSemester)
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Jadwal Pelajaran - SIAKAD ONLINE";
        $data['menu'] = "kurikulum";
        $data['subMenu'] = "kelas";
        $data['subMenuB'] = "";
        $data['idRuangan'] = $idRuangan;
        $data['idThnAjaran'] = $idThnAjaran;
        $data['idSemester'] = $idSemester;
		
		if($this->session->userdata('id_users')!='')
		{
		
		$sql = "SELECT * FROM tbl_mata_pelajaran";
        $data['mataPelajaran'] = $this->db->query($sql)->result();
		
		$sql = "select * FROM tbl_ruangan 
				JOIN tbl_kelas ON (tbl_ruangan.ruangan_kelas_id = tbl_kelas.kelas_id) 
				JOIN tbl_jurusan ON(tbl_ruangan.ruangan_jurusan_id = tbl_jurusan.jurusan_id)
				WHERE ruangan_id = ". $idRuangan ."";
        $ruanganKelas = $this->db->query($sql)->result();
		foreach ($ruanganKelas as $r)
        {
			$data['ruanganKelas'] = $r->kelas_nama. ' ' .$r->jurusan_nama. ' ' .$r->ruangan_nama;
		}
		
		
		$sql = "SELECT * FROM tbl_jadwal_pelajaran tjp 
				JOIN tbl_guru tgsatu ON(tjp.jadwal_pelajaran_guru_id = tgsatu.guru_id) 
				JOIN tbl_mata_pelajaran tmpsatu ON(tjp.jadwal_pelajaran_mata_pelajaran_id = tmpsatu.mata_pelajaran_id)
				WHERE jadwal_pelajaran_ruangan_id = ".$idRuangan." AND jadwal_pelajaran_thn_ajaran_id = ".$idThnAjaran." 
				AND jadwal_pelajaran_semester_id = ". $idSemester ." ORDER BY jadwal_pelajaran_hari";
        $data['dataJadwal'] = $this->db->query($sql)->result();
		
		$sql = "SELECT * FROM tbl_jadwal_pelajaran 
				JOIN tbl_mata_pelajaran ON(tbl_jadwal_pelajaran.jadwal_pelajaran_mata_pelajaran_id = tbl_mata_pelajaran.mata_pelajaran_id) 
				JOIN tbl_guru ON(tbl_jadwal_pelajaran.jadwal_pelajaran_guru_id = tbl_guru.guru_id) 
				WHERE jadwal_pelajaran_hari = 1 AND jadwal_pelajaran_ruangan_id = ".$idRuangan." AND 
				jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." AND jadwal_pelajaran_semester_id = ". $idSemester ." 
				ORDER BY jadwal_pelajaran_jam_ke ASC";
        $data['jadwalSenin'] = $this->db->query($sql)->result();
		
				$sql = "SELECT * FROM tbl_jadwal_pelajaran 
				JOIN tbl_mata_pelajaran ON(tbl_jadwal_pelajaran.jadwal_pelajaran_mata_pelajaran_id = tbl_mata_pelajaran.mata_pelajaran_id) 
				JOIN tbl_guru ON(tbl_jadwal_pelajaran.jadwal_pelajaran_guru_id = tbl_guru.guru_id) 
				WHERE jadwal_pelajaran_hari = 2 AND jadwal_pelajaran_ruangan_id = ".$idRuangan." AND 
				jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." AND jadwal_pelajaran_semester_id = ". $idSemester ." 
				ORDER BY jadwal_pelajaran_jam_ke ASC";
        $data['jadwalSelasa'] = $this->db->query($sql)->result();
		
				$sql = "SELECT * FROM tbl_jadwal_pelajaran 
				JOIN tbl_mata_pelajaran ON(tbl_jadwal_pelajaran.jadwal_pelajaran_mata_pelajaran_id = tbl_mata_pelajaran.mata_pelajaran_id) 
				JOIN tbl_guru ON(tbl_jadwal_pelajaran.jadwal_pelajaran_guru_id = tbl_guru.guru_id) 
				WHERE jadwal_pelajaran_hari = 3 AND jadwal_pelajaran_ruangan_id = ".$idRuangan." AND 
				jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." AND jadwal_pelajaran_semester_id = ". $idSemester ." 
				ORDER BY jadwal_pelajaran_jam_ke ASC";
        $data['jadwalRabu'] = $this->db->query($sql)->result();

		$sql = "SELECT * FROM tbl_jadwal_pelajaran 
				JOIN tbl_mata_pelajaran ON(tbl_jadwal_pelajaran.jadwal_pelajaran_mata_pelajaran_id = tbl_mata_pelajaran.mata_pelajaran_id) 
				JOIN tbl_guru ON(tbl_jadwal_pelajaran.jadwal_pelajaran_guru_id = tbl_guru.guru_id) 
				WHERE jadwal_pelajaran_hari = 4 AND jadwal_pelajaran_ruangan_id = ".$idRuangan." AND 
				jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." AND jadwal_pelajaran_semester_id = ". $idSemester ." 
				ORDER BY jadwal_pelajaran_jam_ke ASC";
        $data['jadwalKamis'] = $this->db->query($sql)->result();
		
		$sql = "SELECT * FROM tbl_jadwal_pelajaran 
				JOIN tbl_mata_pelajaran ON(tbl_jadwal_pelajaran.jadwal_pelajaran_mata_pelajaran_id = tbl_mata_pelajaran.mata_pelajaran_id) 
				JOIN tbl_guru ON(tbl_jadwal_pelajaran.jadwal_pelajaran_guru_id = tbl_guru.guru_id) 
				WHERE jadwal_pelajaran_hari = 5 AND jadwal_pelajaran_ruangan_id = ".$idRuangan." AND 
				jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." AND jadwal_pelajaran_semester_id = ". $idSemester ." 
				ORDER BY jadwal_pelajaran_jam_ke ASC";
        $data['jadwalJumat'] = $this->db->query($sql)->result();
		
		$sql = "SELECT * FROM tbl_jadwal_pelajaran 
				JOIN tbl_mata_pelajaran ON(tbl_jadwal_pelajaran.jadwal_pelajaran_mata_pelajaran_id = tbl_mata_pelajaran.mata_pelajaran_id) 
				JOIN tbl_guru ON(tbl_jadwal_pelajaran.jadwal_pelajaran_guru_id = tbl_guru.guru_id) 
				WHERE jadwal_pelajaran_hari = 6 AND jadwal_pelajaran_ruangan_id = ".$idRuangan." AND 
				jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." AND jadwal_pelajaran_semester_id = ". $idSemester ." 
				ORDER BY jadwal_pelajaran_jam_ke ASC";
        $data['jadwalSabtu'] = $this->db->query($sql)->result();
		}		
		$this->template->load('backend/template', $this->folder.'/index',$data);
    }
	
	function tampilkanGuru($hari, $jamKe, $ruangan)
    {
        $id_mata_pelajaran  =   $_GET['mata_pelajaran'];
		$sql = "SELECT * FROM tbl_jadwal_pelajaran 
				WHERE jadwal_pelajaran_hari = '". $hari ."' AND jadwal_pelajaran_jam_ke = '" . $jamKe . "'";
		$dataGuruTmp = $this->db->query($sql)->result();
		$sql2 = "SELECT * FROM tbl_jadwal_pelajaran 
				WHERE jadwal_pelajaran_hari = '". $hari ."' AND jadwal_pelajaran_jam_ke = '" . $jamKe . "' 
				AND jadwal_pelajaran_ruangan_id = '". $ruangan ."'";
		$dataGuruTmp2 = $this->db->query($sql2)->result();
		$idGuruTmp = "";
		$koma = "";
		$ada = false;
		foreach ($dataGuruTmp as $g)
        {
			foreach($dataGuruTmp2 as $gg){
				if($g->jadwal_pelajaran_guru_id == $gg->jadwal_pelajaran_guru_id){
					$ada = true;
					continue;
				}
			}
			if($ada == false){
				$idGuruTmp .= $koma . $g->jadwal_pelajaran_guru_id;
				$koma = ",";				
			}
		}
		if($idGuruTmp == ""){
			$idGuruTmp = "''";
		}
		
		$sql = "SELECT * FROM tbl_pengajar 
				JOIN tbl_guru ON (tbl_pengajar.pengajar_guru_id = tbl_guru.guru_id) 
				WHERE pengajar_mata_pelajaran_id = ". $id_mata_pelajaran ." 
				AND pengajar_guru_id NOT IN (". $idGuruTmp .")";

		$data = $this->db->query($sql)->result();
		echo "<option value=''>Pilih Guru Pengajar</option>";
        foreach ($data as $r)
        {
            echo "<option value='$r->guru_id'>".  strtoupper($r->guru_nip)." - ".strtoupper($r->guru_nama)."</option>";
        }
    }
	
	function prepareEdit($ruangan, $thnAjaran, $hari, $idSemester)
    {
		$sql = "SELECT * FROM tbl_jadwal_pelajaran 
				JOIN tbl_mata_pelajaran ON(tbl_jadwal_pelajaran.jadwal_pelajaran_mata_pelajaran_id = tbl_mata_pelajaran.mata_pelajaran_id) 
				JOIN tbl_guru ON(tbl_jadwal_pelajaran.jadwal_pelajaran_guru_id = tbl_guru.guru_id) 
				WHERE jadwal_pelajaran_hari = ". $hari ." AND jadwal_pelajaran_ruangan_id = ".$ruangan." AND 
				jadwal_pelajaran_thn_ajaran_id = ". $thnAjaran ." AND jadwal_pelajaran_semester_id = ". $idSemester ." 
				ORDER BY jadwal_pelajaran_jam_ke ASC";

		/*$data = $this->db->query($sql)->row_array();*/
		$dataJadwalSeninTmp = $this->db->query($sql)->result();
		$pemisah = "";
		$dataJadwalSenin = "";
		foreach ($dataJadwalSeninTmp as $r)
        {
			$dataJadwalSenin .= $pemisah.$r->jadwal_pelajaran_jam_ke. ',' .$r->jadwal_pelajaran_guru_id. ',' .$r->jadwal_pelajaran_mata_pelajaran_id;
			$pemisah = "|";
		}
		
		echo json_encode(array("status" => TRUE, "senin" => $dataJadwalSenin));
    }
	
	function save()
	{
		$idRuangan = $this->input->post('idRuangan');
		$idThnAjaran = $this->input->post('idThnAjaran');
		$idHari = $this->input->post('idHari');
		$idSemester = $this->input->post('idSemester');
		
		if($this->input->post('mata_pelajaran_satu') != ""){
			$data = array(
				'jadwal_pelajaran_ruangan_id' => $idRuangan,
				'jadwal_pelajaran_thn_ajaran_id' => $idThnAjaran,
				'jadwal_pelajaran_semester_id' => $idSemester,
				'jadwal_pelajaran_hari' => $idHari,
				'jadwal_pelajaran_jam_ke' => '1',
				'jadwal_pelajaran_mata_pelajaran_id' => $this->input->post('mata_pelajaran_satu'),
				'jadwal_pelajaran_guru_id' => $this->input->post('guru_satu')
			);
			$sql = "SELECT * FROM tbl_jadwal_pelajaran 
					WHERE jadwal_pelajaran_ruangan_id = ". $idRuangan ." 
					AND jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." 
					AND jadwal_pelajaran_hari = ". $idHari ." 
					AND jadwal_pelajaran_jam_ke = '1'";
			$jadwalSatuTmp = $this->db->query($sql)->result();
			$ada = false;
			$idJadwal = "";
			foreach ($jadwalSatuTmp as $s)
			{
				$ada = true;
				$idJadwal = $s->jadwal_pelajaran_id;
			}
			if($ada){
				$this->mcrud->update($this->tables,$data, $this->pk,$idJadwal);
			}else{
				$this->db->insert($this->tables,$data);	
			}			
		}
		
		if($this->input->post('mata_pelajaran_dua') != ""){
			$data = array(
				'jadwal_pelajaran_ruangan_id' => $idRuangan,
				'jadwal_pelajaran_thn_ajaran_id' => $idThnAjaran,
				'jadwal_pelajaran_semester_id' => $idSemester,
				'jadwal_pelajaran_hari' => $idHari,
				'jadwal_pelajaran_jam_ke' => '2',
				'jadwal_pelajaran_mata_pelajaran_id' => $this->input->post('mata_pelajaran_dua'),
				'jadwal_pelajaran_guru_id' => $this->input->post('guru_dua')
			);
			$sql = "SELECT * FROM tbl_jadwal_pelajaran 
					WHERE jadwal_pelajaran_ruangan_id = ". $idRuangan ." 
					AND jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." 
					AND jadwal_pelajaran_hari = ". $idHari ." 
					AND jadwal_pelajaran_jam_ke = '2'";
			$jadwalSatuTmp = $this->db->query($sql)->result();
			$ada = false;
			$idJadwal = "";
			foreach ($jadwalSatuTmp as $s)
			{
				$ada = true;
				$idJadwal = $s->jadwal_pelajaran_id;
			}
			if($ada){
				$this->mcrud->update($this->tables,$data, $this->pk,$idJadwal);
			}else{
				$this->db->insert($this->tables,$data);	
			}			
		}
		
		if($this->input->post('mata_pelajaran_tiga') != ""){
			$data = array(
				'jadwal_pelajaran_ruangan_id' => $idRuangan,
				'jadwal_pelajaran_thn_ajaran_id' => $idThnAjaran,
				'jadwal_pelajaran_semester_id' => $idSemester,
				'jadwal_pelajaran_hari' => $idHari,
				'jadwal_pelajaran_jam_ke' => '3',
				'jadwal_pelajaran_mata_pelajaran_id' => $this->input->post('mata_pelajaran_tiga'),
				'jadwal_pelajaran_guru_id' => $this->input->post('guru_tiga')
			);
			$sql = "SELECT * FROM tbl_jadwal_pelajaran 
					WHERE jadwal_pelajaran_ruangan_id = ". $idRuangan ." 
					AND jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." 
					AND jadwal_pelajaran_hari = ". $idHari ." 
					AND jadwal_pelajaran_jam_ke = '3'";
			$jadwalSatuTmp = $this->db->query($sql)->result();
			$ada = false;
			$idJadwal = "";
			foreach ($jadwalSatuTmp as $s)
			{
				$ada = true;
				$idJadwal = $s->jadwal_pelajaran_id;
			}
			if($ada){
				$this->mcrud->update($this->tables,$data, $this->pk,$idJadwal);
			}else{
				$this->db->insert($this->tables,$data);	
			}			
		}

		if($this->input->post('mata_pelajaran_empat') != ""){
			$data = array(
				'jadwal_pelajaran_ruangan_id' => $idRuangan,
				'jadwal_pelajaran_thn_ajaran_id' => $idThnAjaran,
				'jadwal_pelajaran_semester_id' => $idSemester,
				'jadwal_pelajaran_hari' => $idHari,
				'jadwal_pelajaran_jam_ke' => '4',
				'jadwal_pelajaran_mata_pelajaran_id' => $this->input->post('mata_pelajaran_empat'),
				'jadwal_pelajaran_guru_id' => $this->input->post('guru_empat')
			);
			$sql = "SELECT * FROM tbl_jadwal_pelajaran 
					WHERE jadwal_pelajaran_ruangan_id = ". $idRuangan ." 
					AND jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." 
					AND jadwal_pelajaran_hari = ". $idHari ." 
					AND jadwal_pelajaran_jam_ke = '4'";
			$jadwalSatuTmp = $this->db->query($sql)->result();
			$ada = false;
			$idJadwal = "";
			foreach ($jadwalSatuTmp as $s)
			{
				$ada = true;
				$idJadwal = $s->jadwal_pelajaran_id;
			}
			if($ada){
				$this->mcrud->update($this->tables,$data, $this->pk,$idJadwal);
			}else{
				$this->db->insert($this->tables,$data);	
			}			
		}

		if($this->input->post('mata_pelajaran_lima') != ""){
			$data = array(
				'jadwal_pelajaran_ruangan_id' => $idRuangan,
				'jadwal_pelajaran_thn_ajaran_id' => $idThnAjaran,
				'jadwal_pelajaran_semester_id' => $idSemester,
				'jadwal_pelajaran_hari' => $idHari,
				'jadwal_pelajaran_jam_ke' => '5',
				'jadwal_pelajaran_mata_pelajaran_id' => $this->input->post('mata_pelajaran_lima'),
				'jadwal_pelajaran_guru_id' => $this->input->post('guru_lima')
			);
			$sql = "SELECT * FROM tbl_jadwal_pelajaran 
					WHERE jadwal_pelajaran_ruangan_id = ". $idRuangan ." 
					AND jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." 
					AND jadwal_pelajaran_hari = ". $idHari ." 
					AND jadwal_pelajaran_jam_ke = '5'";
			$jadwalSatuTmp = $this->db->query($sql)->result();
			$ada = false;
			$idJadwal = "";
			foreach ($jadwalSatuTmp as $s)
			{
				$ada = true;
				$idJadwal = $s->jadwal_pelajaran_id;
			}
			if($ada){
				$this->mcrud->update($this->tables,$data, $this->pk,$idJadwal);
			}else{
				$this->db->insert($this->tables,$data);	
			}			
		}

		if($this->input->post('mata_pelajaran_enam') != ""){
			$data = array(
				'jadwal_pelajaran_ruangan_id' => $idRuangan,
				'jadwal_pelajaran_thn_ajaran_id' => $idThnAjaran,
				'jadwal_pelajaran_semester_id' => $idSemester,
				'jadwal_pelajaran_hari' => $idHari,
				'jadwal_pelajaran_jam_ke' => '6',
				'jadwal_pelajaran_mata_pelajaran_id' => $this->input->post('mata_pelajaran_enam'),
				'jadwal_pelajaran_guru_id' => $this->input->post('guru_enam')
			);
			$sql = "SELECT * FROM tbl_jadwal_pelajaran 
					WHERE jadwal_pelajaran_ruangan_id = ". $idRuangan ." 
					AND jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." 
					AND jadwal_pelajaran_hari = ". $idHari ." 
					AND jadwal_pelajaran_jam_ke = '6'";
			$jadwalSatuTmp = $this->db->query($sql)->result();
			$ada = false;
			$idJadwal = "";
			foreach ($jadwalSatuTmp as $s)
			{
				$ada = true;
				$idJadwal = $s->jadwal_pelajaran_id;
			}
			if($ada){
				$this->mcrud->update($this->tables,$data, $this->pk,$idJadwal);
			}else{
				$this->db->insert($this->tables,$data);	
			}			
		}

		if($this->input->post('mata_pelajaran_tujuh') != ""){
			$data = array(
				'jadwal_pelajaran_ruangan_id' => $idRuangan,
				'jadwal_pelajaran_thn_ajaran_id' => $idThnAjaran,
				'jadwal_pelajaran_semester_id' => $idSemester,
				'jadwal_pelajaran_hari' => $idHari,
				'jadwal_pelajaran_jam_ke' => '7',
				'jadwal_pelajaran_mata_pelajaran_id' => $this->input->post('mata_pelajaran_tujuh'),
				'jadwal_pelajaran_guru_id' => $this->input->post('guru_tujuh')
			);
			$sql = "SELECT * FROM tbl_jadwal_pelajaran 
					WHERE jadwal_pelajaran_ruangan_id = ". $idRuangan ." 
					AND jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." 
					AND jadwal_pelajaran_hari = ". $idHari ." 
					AND jadwal_pelajaran_jam_ke = '7'";
			$jadwalSatuTmp = $this->db->query($sql)->result();
			$ada = false;
			$idJadwal = "";
			foreach ($jadwalSatuTmp as $s)
			{
				$ada = true;
				$idJadwal = $s->jadwal_pelajaran_id;
			}
			if($ada){
				$this->mcrud->update($this->tables,$data, $this->pk,$idJadwal);
			}else{
				$this->db->insert($this->tables,$data);	
			}			
		}

		if($this->input->post('mata_pelajaran_delapan') != ""){
			$data = array(
				'jadwal_pelajaran_ruangan_id' => $idRuangan,
				'jadwal_pelajaran_thn_ajaran_id' => $idThnAjaran,
				'jadwal_pelajaran_semester_id' => $idSemester,
				'jadwal_pelajaran_hari' => $idHari,
				'jadwal_pelajaran_jam_ke' => '8',
				'jadwal_pelajaran_mata_pelajaran_id' => $this->input->post('mata_pelajaran_delapan'),
				'jadwal_pelajaran_guru_id' => $this->input->post('guru_delapan')
			);
			$sql = "SELECT * FROM tbl_jadwal_pelajaran 
					WHERE jadwal_pelajaran_ruangan_id = ". $idRuangan ." 
					AND jadwal_pelajaran_thn_ajaran_id = ". $idThnAjaran ." 
					AND jadwal_pelajaran_hari = ". $idHari ." 
					AND jadwal_pelajaran_jam_ke = '8'";
			$jadwalSatuTmp = $this->db->query($sql)->result();
			$ada = false;
			$idJadwal = "";
			foreach ($jadwalSatuTmp as $s)
			{
				$ada = true;
				$idJadwal = $s->jadwal_pelajaran_id;
			}
			if($ada){
				$this->mcrud->update($this->tables,$data, $this->pk,$idJadwal);
			}else{
				$this->db->insert($this->tables,$data);	
			}			
		}
		
		echo json_encode(array("status" => TRUE));
	}
}