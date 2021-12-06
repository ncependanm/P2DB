<?php
class regSiswa extends CI_Controller{
    
    var $folder =   "backend/regSiswa";
    var $title  =   "Data Calon Siswa";
    var $titleInputan  =   "Form Calon Siswa";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $data['title'] = $this->title;
        $data['titleInputan'] = $this->titleInputan;
        $data['desc'] = "";
        $data['info'] = "";
        $data['judulHalaman'] = "Data Calon Siswa - SIAKAD ONLINE";
        $data['menu'] = "dataDiri";
        $data['subMenu'] = "";
        $data['subMenuB'] = "";
		
		$sql = "SELECT * FROM tbl_agama";
        $data['agama'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_propinsi";
        $data['propinsi'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_pendidikan";
        $data['pendidikan'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_pekerjaan";
        $data['pekerjaan'] = $this->db->query($sql)->result();
		$sql = "SELECT * FROM tbl_sekolah";
        $data['sekolah'] = $this->db->query($sql)->result();


		$sql = "SELECT * FROM tbl_reg_akun tra
						JOIN tbl_reg_data_diri trd ON(tra.reg_akun_id = trd.reg_data_diri_reg_akun_id)
						JOIN tbl_agama ta ON(trd.reg_data_diri_agama_id = ta.agama_id)
						WHERE reg_akun_id = ".$this->session->userdata('id_akun');
		$jmlData = $this->db->query($sql)->num_rows();
		$data['jmlData'] = $jmlData;
		$this->template->load('backend/template', $this->folder.'/form',$data);
    }
	
	public function loadTable()
	{	
		$list = $this->agamaModel->get_datatables();
		$data = array();
		$no = 0;
		$thn_ajaran_status = '';
		$thn_ajaran_reg_status = '';
		
		foreach ($list as $agama) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $agama->agama_nama;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$agama->agama_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" id="hapusData" href="javascript:void(0)" title="Hapus" data-id="'.$agama->agama_id.'"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->agamaModel->count_all(),
						"recordsFiltered" => $this->agamaModel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	function prepareEdit($id)
    {
            $data = $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            echo json_encode($data);
    }
    function update()
	{
		$id = $this->input->post('id');
		$akreditasSekolah = $this->input->post('reg_data_diri_lulusan_akreditas');

		$dataRegAkun = array(
			'reg_akun_nisn' => $this->input->post('reg_akun_nisn'),
			'reg_akun_nama' => strtoupper($this->input->post('reg_data_diri_nama'))
		);
		
		$sqlTblRegDataDiri =  $this->db->get_where('tbl_reg_akun',array('reg_akun_id'=>$id));
		if($sqlTblRegDataDiri->num_rows()>0) {
			$this->mcrud->update('tbl_reg_akun', $dataRegAkun, 'reg_akun_id', $id);			
		} else {
			$this->db->insert('tbl_reg_akun', $dataRegAkun);
		}
		$lulusan = $this->input->post('reg_data_diri_lulusan');
		if($lulusan == 'LAINNYA'){
			$lulusan = $this->input->post('reg_data_diri_lulusan_tmp');
		} 
		
		$dataRegDataDiri = array(
			'reg_data_diri_reg_akun_id' => $id,
			'reg_data_diri_nama' => strtoupper($this->input->post('reg_data_diri_nama')),
			'reg_data_diri_panggilan' => strtoupper($this->input->post('reg_data_diri_panggilan')),
			'reg_data_diri_jenis_kelamin' => $this->input->post('reg_data_diri_jenis_kelamin'),
			'reg_data_diri_agama_id' => $this->input->post('reg_data_diri_agama_id'),
			'reg_data_diri_tempat_lahir' => strtoupper($this->input->post('reg_data_diri_tempat_lahir')),
			'reg_data_diri_tgl_lahir' => $this->input->post('reg_data_diri_tgl_lahir'),
			'reg_data_diri_alamat_propinsi' => strtoupper($this->input->post('reg_data_diri_alamat_propinsi')),
			'reg_data_diri_alamat_kota' => strtoupper($this->input->post('reg_data_diri_alamat_kota')),
			'reg_data_diri_no_telp' => $this->input->post('reg_data_diri_no_telp'),
			'reg_data_diri_lulusan' => strtoupper($lulusan),
			'reg_data_diri_lulusan_akreditas' => $akreditasSekolah,
			'reg_data_diri_nis' => $this->input->post('reg_data_diri_nis'),
			'reg_data_diri_no_un' => $this->input->post('reg_data_diri_no_un'),
			'reg_data_diri_no_nik' => $this->input->post('reg_data_diri_no_nik'),
			'reg_data_diri_npsn' => $this->input->post('reg_data_diri_npsn'),
			'reg_data_diri_alamat_dusun' => strtoupper($this->input->post('reg_data_diri_alamat_dusun')),
			'reg_data_diri_alamat_rt' => strtoupper($this->input->post('reg_data_diri_alamat_rt')),
			'reg_data_diri_alamat_rw' => strtoupper($this->input->post('reg_data_diri_alamat_rw')),
			'reg_data_diri_alamat_desa' => strtoupper($this->input->post('reg_data_diri_alamat_desa')),
			'reg_data_diri_alamat_kodepos' => $this->input->post('reg_data_diri_alamat_kodepos'),
			'reg_data_diri_alamat_kecamatan' => strtoupper($this->input->post('reg_data_diri_alamat_kecamatan')),
			'reg_data_diri_no_telp_rumah' => $this->input->post('reg_data_diri_no_telp_rumah'),
			'reg_data_diri_email' => $this->input->post('reg_data_diri_email'),
			'reg_data_diri_no_kks' => $this->input->post('reg_data_diri_no_kks'),
			'reg_data_diri_penerima_pkh_kps' => $this->input->post('reg_data_diri_penerima_pkh_kps'),
			'reg_data_diri_no_pkh_kps' => $this->input->post('reg_data_diri_no_pkh_kps'),
			'reg_data_diri_usulan_layak_pip' => $this->input->post('reg_data_diri_usulan_layak_pip'),
			'reg_data_diri_alasan_layak' => strtoupper($this->input->post('reg_data_diri_alasan_layak')),
			'reg_data_diri_penerima_kip' => $this->input->post('reg_data_diri_penerima_kip'),
			'reg_data_diri_no_kip' => $this->input->post('reg_data_diri_no_kip'),
			'reg_data_diri_nama_kip' => strtoupper($this->input->post('reg_data_diri_nama_kip')),
			'reg_data_diri_alasan_menolak_kip' => strtoupper($this->input->post('reg_data_diri_alasan_menolak_kip')),
			'reg_data_diri_no_reg_akta' => $this->input->post('reg_data_diri_no_reg_akta')
		);
		
		$sqlTblRegDataDiri =  $this->db->get_where('tbl_reg_data_diri',array('reg_data_diri_reg_akun_id'=>$id));
		if($sqlTblRegDataDiri->num_rows()>0) {
			$this->mcrud->update('tbl_reg_data_diri', $dataRegDataDiri, 'reg_data_diri_reg_akun_id', $id);			
		} else {
			$this->db->insert('tbl_reg_data_diri', $dataRegDataDiri);
		}
		
		$dataRegDataOrtuA = array(
			'reg_data_ortu_reg_akun_id' => $id,
			'reg_data_ortu_nama' => strtoupper($this->input->post('reg_data_ortu_nama_a')),
			'reg_data_ortu_tempat_lahir' => strtoupper($this->input->post('reg_data_ortu_tempat_lahir_a')),
			'reg_data_ortu_tgl_lahir' => $this->input->post('reg_data_ortu_tgl_lahir_a'),
			'reg_data_ortu_alamat' => strtoupper($this->input->post('reg_data_ortu_alamat_a')),
			'reg_data_ortu_no_telepon' => $this->input->post('reg_data_ortu_no_telepon_a'),
			'reg_data_ortu_agama_id' => $this->input->post('reg_data_ortu_agama_id_a'),
			'reg_data_ortu_pendidikan_id' => $this->input->post('reg_data_ortu_pendidikan_id_a'),
			'reg_data_ortu_pekerjaan_id' => $this->input->post('reg_data_ortu_pekerjaan_id_a'),
			'reg_data_ortu_penghasilan' => $this->input->post('reg_data_ortu_penghasilan_a'),
			'reg_data_ortu_no_nik' => $this->input->post('reg_data_ortu_no_nik_a'),
			'reg_data_ortu_ind' => 'A'
		);

		$sqlTblRegDataOrtuA =  $this->db->get_where('tbl_reg_data_ortu',array('reg_data_ortu_reg_akun_id'=>$id, 'reg_data_ortu_ind'=>'A'));
		if($sqlTblRegDataOrtuA->num_rows()>0) {
			$a=  $sqlTblRegDataOrtuA->row_array();
			$this->mcrud->update('tbl_reg_data_ortu', $dataRegDataOrtuA, 'reg_data_ortu_id', $a['reg_data_ortu_id']);			
		} else {
			$this->db->insert('tbl_reg_data_ortu', $dataRegDataOrtuA);
		}
		
		$dataRegDataOrtuI = array(
			'reg_data_ortu_reg_akun_id' => $id,
			'reg_data_ortu_nama' => strtoupper($this->input->post('reg_data_ortu_nama_i')),
			'reg_data_ortu_tempat_lahir' => strtoupper($this->input->post('reg_data_ortu_tempat_lahir_i')),
			'reg_data_ortu_tgl_lahir' => $this->input->post('reg_data_ortu_tgl_lahir_i'),
			'reg_data_ortu_alamat' => strtoupper($this->input->post('reg_data_ortu_alamat_i')),
			'reg_data_ortu_no_telepon' => $this->input->post('reg_data_ortu_no_telepon_i'),
			'reg_data_ortu_agama_id' => $this->input->post('reg_data_ortu_agama_id_i'),
			'reg_data_ortu_pendidikan_id' => $this->input->post('reg_data_ortu_pendidikan_id_i'),
			'reg_data_ortu_pekerjaan_id' => $this->input->post('reg_data_ortu_pekerjaan_id_i'),
			'reg_data_ortu_penghasilan' => $this->input->post('reg_data_ortu_penghasilan_i'),
			'reg_data_ortu_no_nik' => $this->input->post('reg_data_ortu_no_nik_i'),
			'reg_data_ortu_ind' => 'I'
		);
		
		$sqlTblRegDataOrtuI =  $this->db->get_where('tbl_reg_data_ortu',array('reg_data_ortu_reg_akun_id'=>$id, 'reg_data_ortu_ind'=>'I'));
		if($sqlTblRegDataOrtuI->num_rows()>0) {
			$a=  $sqlTblRegDataOrtuI->row_array();
			$this->mcrud->update('tbl_reg_data_ortu', $dataRegDataOrtuI, 'reg_data_ortu_id', $a['reg_data_ortu_id']);
		} else {
			$this->db->insert('tbl_reg_data_ortu', $dataRegDataOrtuI);
		}
		
		$dataRegDataOrtuW = array(
			'reg_data_ortu_reg_akun_id' => $id,
			'reg_data_ortu_nama' => strtoupper($this->input->post('reg_data_ortu_nama_w')),
			'reg_data_ortu_tempat_lahir' => strtoupper($this->input->post('reg_data_ortu_tempat_lahir_w')),
			'reg_data_ortu_tgl_lahir' => $this->input->post('reg_data_ortu_tgl_lahir_w'),
			'reg_data_ortu_alamat' => strtoupper($this->input->post('reg_data_ortu_alamat_w')),
			'reg_data_ortu_no_telepon' => $this->input->post('reg_data_ortu_no_telepon_w'),
			'reg_data_ortu_agama_id' => $this->input->post('reg_data_ortu_agama_id_w'),
			'reg_data_ortu_pendidikan_id' => $this->input->post('reg_data_ortu_pendidikan_id_w'),
			'reg_data_ortu_pekerjaan_id' => $this->input->post('reg_data_ortu_pekerjaan_id_w'),
			'reg_data_ortu_penghasilan' => $this->input->post('reg_data_ortu_penghasilan_w'),
			'reg_data_ortu_no_nik' => $this->input->post('reg_data_ortu_no_nik_w'),
			'reg_data_ortu_ind' => 'W'
		);
		
		$sqlTblRegDataOrtuW =  $this->db->get_where('tbl_reg_data_ortu',array('reg_data_ortu_reg_akun_id'=>$id, 'reg_data_ortu_ind'=>'W'));
		if($sqlTblRegDataOrtuW->num_rows()>0) {
			$a=  $sqlTblRegDataOrtuW->row_array();
			$this->mcrud->update('tbl_reg_data_ortu', $dataRegDataOrtuW, 'reg_data_ortu_id', $a['reg_data_ortu_id']);
		} else {
			$this->db->insert('tbl_reg_data_ortu', $dataRegDataOrtuW);
		}

		$nilaiIndSatu = $this->input->post('reg_data_nilai_ind_satu');
		$nilaiIndDua = $this->input->post('reg_data_nilai_ind_dua');
		$nilaiIndTiga = $this->input->post('reg_data_nilai_ind_tiga');
		$nilaiIndEmpat = $this->input->post('reg_data_nilai_ind_empat');
		$nilaiIndLima = $this->input->post('reg_data_nilai_ind_lima');

		$nilaiIngSatu = $this->input->post('reg_data_nilai_ing_satu');
		$nilaiIngDua = $this->input->post('reg_data_nilai_ing_dua');
		$nilaiIngTiga = $this->input->post('reg_data_nilai_ing_tiga');
		$nilaiIngEmpat = $this->input->post('reg_data_nilai_ing_empat');
		$nilaiIngLima = $this->input->post('reg_data_nilai_ing_lima');
		
		$nilaiIpaSatu = $this->input->post('reg_data_nilai_ipa_satu');
		$nilaiIpaDua = $this->input->post('reg_data_nilai_ipa_dua');
		$nilaiIpaTiga = $this->input->post('reg_data_nilai_ipa_tiga');
		$nilaiIpaEmpat = $this->input->post('reg_data_nilai_ipa_empat');
		$nilaiIpaLima = $this->input->post('reg_data_nilai_ipa_lima');
		
		$nilaiMtkSatu = $this->input->post('reg_data_nilai_mtk_satu');
		$nilaiMtkDua = $this->input->post('reg_data_nilai_mtk_dua');
		$nilaiMtkTiga = $this->input->post('reg_data_nilai_mtk_tiga');
		$nilaiMtkEmpat = $this->input->post('reg_data_nilai_mtk_empat');
		$nilaiMtkLima = $this->input->post('reg_data_nilai_mtk_lima');
		
		$peringkatSatu = $this->input->post('reg_data_peringkat_satu');
		$peringkatDua = $this->input->post('reg_data_peringkat_dua');
		$peringkatTiga = $this->input->post('reg_data_peringkat_tiga');
		$peringkatEmpat = $this->input->post('reg_data_peringkat_empat');
		$peringkatLima = $this->input->post('reg_data_peringkat_lima');
		
		$dataRegDataNilai = array(
			'reg_data_nilai_reg_akun_id' => $id,
			'reg_data_nilai_ind_satu' => $nilaiIndSatu,
			'reg_data_nilai_ind_dua' => $nilaiIndDua,
			'reg_data_nilai_ind_tiga' => $nilaiIndTiga,
			'reg_data_nilai_ind_empat' => $nilaiIndEmpat,
			'reg_data_nilai_ind_lima' => $nilaiIndLima,				
			'reg_data_nilai_ing_satu' => $nilaiIngSatu,
			'reg_data_nilai_ing_dua' => $nilaiIngDua,
			'reg_data_nilai_ing_tiga' => $nilaiIngTiga,
			'reg_data_nilai_ing_empat' => $nilaiIngEmpat,
			'reg_data_nilai_ing_lima' => $nilaiIngLima,
			'reg_data_nilai_ipa_satu' => $nilaiIpaSatu,
			'reg_data_nilai_ipa_dua' => $nilaiIpaDua,
			'reg_data_nilai_ipa_tiga' => $nilaiIpaTiga,
			'reg_data_nilai_ipa_empat' => $nilaiIpaEmpat,
			'reg_data_nilai_ipa_lima' => $nilaiIpaLima,				
			'reg_data_nilai_mtk_satu' => $nilaiMtkSatu,
			'reg_data_nilai_mtk_dua' => $nilaiMtkDua,
			'reg_data_nilai_mtk_tiga' => $nilaiMtkTiga,
			'reg_data_nilai_mtk_empat' => $nilaiMtkEmpat,
			'reg_data_nilai_mtk_lima' => $nilaiMtkLima,
			'reg_data_peringkat_satu' => $peringkatSatu,
			'reg_data_peringkat_dua' => $peringkatDua,
			'reg_data_peringkat_tiga' => $peringkatTiga,
			'reg_data_peringkat_empat' => $peringkatEmpat,
			'reg_data_peringkat_lima' => $peringkatLima
		);
		
		$sqlTblRegDataNilai =  $this->db->get_where('tbl_reg_data_nilai',array('reg_data_nilai_reg_akun_id'=>$id));
		if($sqlTblRegDataNilai->num_rows()>0) {
			$this->mcrud->update('tbl_reg_data_nilai', $dataRegDataNilai, 'reg_data_nilai_reg_akun_id', $id);
		} else {
			$this->db->insert('tbl_reg_data_nilai', $dataRegDataNilai);
		}

		$reg_data_prestasi_nama_satu = $this->input->post('reg_data_prestasi_nama_satu');
		
		$reg_data_prestasi_nama_dua = $this->input->post('reg_data_prestasi_nama_dua');
		
		$reg_data_prestasi_nama_tiga = $this->input->post('reg_data_prestasi_nama_tiga');

		$reg_data_prestasi_nama_empat = $this->input->post('reg_data_prestasi_nama_empat');
		
		$nilaiTingkatLombaSatu = 0;
		$nilaiTingkatLombaDua = 0;
		$nilaiTingkatLombaTiga = 0;

		$nilaiJuaraLombaSatu = 0;
		$nilaiJuaraLombaDua = 0;
		$nilaiJuaraLombaTiga = 0;
		
		$totalNilaiLombaSatu = 0;
		$totalNilaiLombaDua = 0;
		$totalNilaiLombaTiga = 0;
		
		if($this->session->userdata('reg_akun_jalur_daftar') == 'P'){		
			if($reg_data_prestasi_nama_satu != ""){
				$tingkat = $this->input->post('reg_data_prestasi_tingkat_satu');
				$juara =$this->input->post('reg_data_prestasi_juara_satu');
				$dataRegDataPrestasi = array(
					'reg_data_prestasi_reg_akun_id' => $id,
					'reg_data_prestasi_indek' => "1",
					'reg_data_prestasi_nama' => strtoupper($this->input->post('reg_data_prestasi_nama_satu')),
					'reg_data_prestasi_thn' => $this->input->post('reg_data_prestasi_thn_satu'),
					'reg_data_prestasi_jenis_prestasi' => strtoupper($this->input->post('reg_data_prestasi_jenis_prestasi_satu')),
					'reg_data_prestasi_tingkat' => $tingkat,
					'reg_data_prestasi_juara' => $juara,
					'reg_data_prestasi_penyelenggara' => strtoupper($this->input->post('reg_data_prestasi_penyelenggara_satu'))
				);
				$sqlTblRegDataPrestasi =  $this->db->get_where('tbl_reg_data_prestasi',array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek' => '1'));
				if($sqlTblRegDataPrestasi->num_rows()>0) {
					$this->mcrud->updateArray('tbl_reg_data_prestasi', $dataRegDataPrestasi, array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek' => '1'));
				} else {
					$this->db->insert('tbl_reg_data_prestasi', $dataRegDataPrestasi);
				}
				$nilaiTingkatLombaSatu = $this->getPrestasiTingkat($tingkat);
				$nilaiJuaraLombaSatu = $this->getPrestasiJuara($juara);
				$totalNilaiLombaSatu = $nilaiTingkatLombaSatu * $nilaiJuaraLombaSatu;
			}
			
			if($reg_data_prestasi_nama_dua != ""){
				$tingkat =  $this->input->post('reg_data_prestasi_tingkat_dua');
				$juara = $this->input->post('reg_data_prestasi_juara_dua');
				$dataRegDataPrestasi = array(
					'reg_data_prestasi_reg_akun_id' => $id,
					'reg_data_prestasi_indek' => "2",
					'reg_data_prestasi_nama' => strtoupper($this->input->post('reg_data_prestasi_nama_dua')),
					'reg_data_prestasi_thn' => $this->input->post('reg_data_prestasi_thn_dua'),
					'reg_data_prestasi_jenis_prestasi' => strtoupper($this->input->post('reg_data_prestasi_jenis_prestasi_dua')),
					'reg_data_prestasi_tingkat' => $tingkat,
					'reg_data_prestasi_juara' => $juara,
					'reg_data_prestasi_penyelenggara' => strtoupper($this->input->post('reg_data_prestasi_penyelenggara_dua'))
				);
				$sqlTblRegDataPrestasi =  $this->db->get_where('tbl_reg_data_prestasi',array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek' => '2'));
				if($sqlTblRegDataPrestasi->num_rows()>0) {
					$this->mcrud->updateArray('tbl_reg_data_prestasi', $dataRegDataPrestasi, array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek' => '2'));
				} else {
					$this->db->insert('tbl_reg_data_prestasi', $dataRegDataPrestasi);
				}
				$nilaiTingkatLombaDua = $this->getPrestasiTingkat($tingkat);
				$nilaiJuaraLombaDua = $this->getPrestasiJuara($juara);
				$totalNilaiLombaDua = $nilaiTingkatLombaDua * $nilaiJuaraLombaDua;
			}
			
			if($reg_data_prestasi_nama_tiga != ""){
				$tingkat = $this->input->post('reg_data_prestasi_tingkat_tiga');
				$juara = $this->input->post('reg_data_prestasi_juara_tiga');
				$dataRegDataPrestasi = array(
					'reg_data_prestasi_reg_akun_id' => $id,
					'reg_data_prestasi_indek' => "3",
					'reg_data_prestasi_nama' => strtoupper($this->input->post('reg_data_prestasi_nama_tiga')),
					'reg_data_prestasi_thn' => $this->input->post('reg_data_prestasi_thn_tiga'),
					'reg_data_prestasi_jenis_prestasi' => strtoupper($this->input->post('reg_data_prestasi_jenis_prestasi_tiga')),
					'reg_data_prestasi_tingkat' => $tingkat,
					'reg_data_prestasi_juara' => $juara,
					'reg_data_prestasi_penyelenggara' => strtoupper($this->input->post('reg_data_prestasi_penyelenggara_tiga'))
				);
				$sqlTblRegDataPrestasi =  $this->db->get_where('tbl_reg_data_prestasi',array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek' => '3'));
				if($sqlTblRegDataPrestasi->num_rows()>0) {
					$this->mcrud->updateArray('tbl_reg_data_prestasi', $dataRegDataPrestasi, array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek' => '3'));
				} else {
					$this->db->insert('tbl_reg_data_prestasi', $dataRegDataPrestasi);
				}
				$nilaiTingkatLombaTiga = $this->getPrestasiTingkat($tingkat);
				$nilaiJuaraLombaTiga = $this->getPrestasiJuara($juara);
				$totalNilaiLombaTiga = $nilaiTingkatLombaTiga * $nilaiJuaraLombaTiga;
			}
			
			$nilaiSmtSatu = $this->getNilaiSmt($nilaiIndSatu) + $this->getNilaiSmt($nilaiIngSatu) + $this->getNilaiSmt($nilaiIpaSatu)+ $this->getNilaiSmt($nilaiMtkSatu);
			$nilaiSmtDua = $this->getNilaiSmt($nilaiIndDua) + $this->getNilaiSmt($nilaiIngDua) + $this->getNilaiSmt($nilaiIpaDua)+ $this->getNilaiSmt($nilaiMtkDua);
			$nilaiSmtTiga = $this->getNilaiSmt($nilaiIndTiga) + $this->getNilaiSmt($nilaiIngTiga) + $this->getNilaiSmt($nilaiIpaTiga)+ $this->getNilaiSmt($nilaiMtkTiga);
			$nilaiSmtEmpat = $this->getNilaiSmt($nilaiIndEmpat) + $this->getNilaiSmt($nilaiIngEmpat) + $this->getNilaiSmt($nilaiIpaEmpat)+ $this->getNilaiSmt($nilaiMtkEmpat);
			$nilaiSmtLima = $this->getNilaiSmt($nilaiIndLima) + $this->getNilaiSmt($nilaiIngLima) + $this->getNilaiSmt($nilaiIpaLima)+ $this->getNilaiSmt($nilaiMtkLima);
			
			$nilaiRankingSmsSatu = $this->getNilaiAkreditasSekolah($akreditasSekolah, $peringkatSatu);
			$nilaiRankingSmsDua = $this->getNilaiAkreditasSekolah($akreditasSekolah, $peringkatDua);
			$nilaiRankingSmsTiga = $this->getNilaiAkreditasSekolah($akreditasSekolah, $peringkatTiga);
			$nilaiRankingSmsEmpat = $this->getNilaiAkreditasSekolah($akreditasSekolah, $peringkatEmpat);
			$nilaiRankingSmsLima = $this->getNilaiAkreditasSekolah($akreditasSekolah, $peringkatLima);
			
			$totalNilaiSmtSatu = ($nilaiSmtSatu / 10) + $nilaiRankingSmsSatu;
			$totalNilaiSmtDua = ($nilaiSmtDua / 10) + $nilaiRankingSmsDua;
			$totalNilaiSmtTiga = ($nilaiSmtTiga / 10) + $nilaiRankingSmsTiga;
			$totalNilaiSmtEmpat = ($nilaiSmtEmpat / 10) + $nilaiRankingSmsEmpat;
			$totalNilaiSmtLima = ($nilaiSmtLima / 10) + $nilaiRankingSmsLima;
			
			
			$grandTotalNilaiRaport = $totalNilaiSmtSatu + $totalNilaiSmtDua + $totalNilaiSmtTiga + $totalNilaiSmtEmpat + $totalNilaiSmtLima;
			$grandTotalPrestasi = $totalNilaiLombaSatu + $totalNilaiLombaDua + $totalNilaiLombaTiga;
			
			
			$dataRegDataNilaiTes = array(
				'reg_data_nilai_tes_reg_akun_id' => $id,
				'reg_data_nilai_raport' => $grandTotalNilaiRaport,
				'reg_data_nilai_prestasi' => $grandTotalPrestasi
			);
			$sqlTblRegDataNilaiTes =  $this->db->get_where('tbl_reg_data_nilai_tes',array('reg_data_nilai_tes_reg_akun_id'=>$id));
			if($sqlTblRegDataNilaiTes->num_rows()>0) {
				$this->mcrud->updateArray('tbl_reg_data_nilai_tes', $dataRegDataNilaiTes, array('reg_data_nilai_tes_reg_akun_id'=>$id));
			} else {
				$this->db->insert('tbl_reg_data_nilai_tes', $dataRegDataNilaiTes);
			}
		} else  {
			$nilaiMtkSkhu = $this->input->post('reg_data_nilai_skhu_mtk');
			$nilaiIndSkhu = $this->input->post('reg_data_nilai_skhu_ind');
			$nilaiIngSkhu = $this->input->post('reg_data_nilai_skhu_ing');
			$nilaiIpaSkhu = $this->input->post('reg_data_nilai_skhu_ipa');
			$totalSkhu = (($nilaiMtkSkhu + $nilaiIndSkhu + $nilaiIngSkhu +$nilaiIpaSkhu) / 4);
			$dataRegDataNilaiSKHU = array(
				'reg_data_nilai_skhu_reg_akun_id' => $id,
				'reg_data_nilai_skhu_mtk' => $nilaiMtkSkhu,
				'reg_data_nilai_skhu_ind' => $nilaiIndSkhu,
				'reg_data_nilai_skhu_ing' => $nilaiIngSkhu,
				'reg_data_nilai_skhu_ipa' => $nilaiIpaSkhu
			);
			$sqlTblRegDataNilaiSKHU =  $this->db->get_where('tbl_reg_data_nilai_skhu',array('reg_data_nilai_skhu_reg_akun_id'=>$id));
			if($sqlTblRegDataNilaiSKHU->num_rows()>0) {
				$this->mcrud->updateArray('tbl_reg_data_nilai_skhu', $dataRegDataNilaiSKHU, 
				array('reg_data_nilai_skhu_reg_akun_id'=>$id));
			} else {
				$this->db->insert('tbl_reg_data_nilai_skhu', $dataRegDataNilaiSKHU);
			}
			
			$dataRegDataNilaiTes = array(
				'reg_data_nilai_tes_reg_akun_id' => $id,
				'reg_data_nilai_prestasi' => $totalSkhu
			);
			$sqlTblRegDataNilaiTes =  $this->db->get_where('tbl_reg_data_nilai_tes',array('reg_data_nilai_tes_reg_akun_id'=>$id));
			if($sqlTblRegDataNilaiTes->num_rows()>0) {
				$this->mcrud->updateArray('tbl_reg_data_nilai_tes', $dataRegDataNilaiTes, array('reg_data_nilai_tes_reg_akun_id'=>$id));
			} else {
				$this->db->insert('tbl_reg_data_nilai_tes', $dataRegDataNilaiTes);
			}
		}
		echo json_encode(array("status" => TRUE));
	}
	
	function getNilaiSmt($nilai){
		$nilaiTmp = 0;
		if(strpos($nilai, ',') !== false){
			$nilaiTmp = str_replace(',','',$nilai);			
		} else {
			$nilaiTmp = $nilai*10;
		}
		return $nilaiTmp;
	}
	
	function getNilaiAkreditasSekolah($akreditas, $ranking)
	{
		$nilai = 0;
		if($akreditas == 'A'){
			if($ranking == '1'){
				$nilai = 20;
			} else if($ranking == '2'){
				$nilai = 18;
			} else if($ranking == '3'){
				$nilai = 16;
			} else if($ranking == '4'){
				$nilai = 14;
			} else if($ranking == '5'){
				$nilai = 12;
			} else if($ranking == '6'){
				$nilai = 10;
			} else if($ranking == '7'){
				$nilai = 8;
			} else if($ranking == '8'){
				$nilai = 6;
			} else if($ranking == '9'){
				$nilai = 4;
			} else if($ranking == '10'){
				$nilai = 2;
			}
		} else if ($akreditas == 'B'){
			if($ranking == '1'){
				$nilai = 20;
			} else if($ranking == '2'){
				$nilai = 18;
			} else if($ranking == '3'){
				$nilai = 16;
			} else if($ranking == '4'){
				$nilai = 14;
			} else if($ranking == '5'){
				$nilai = 12;
			} else {
				$nilai = 0;
			}
		} else if ($akreditas == 'C'){
			if($ranking == '1'){
				$nilai = 20;
			} else if($ranking == '2'){
				$nilai = 18;
			} else if($ranking == '3'){
				$nilai = 16;
			} else if($ranking == '4'){
				$nilai = 14;
			} else if($ranking == '5'){
				$nilai = 12;
			} else {
				$nilai = 0;
			}
		} else if ($akreditas == 'N'){
			$nilai = 0;
		} 
		return $nilai;
	}
	
	function getPrestasiTingkat($ind){
		$nilai = 0;
		if($ind == 'Sekolah'){
			$nilai = 4;
		} else if($ind == 'Kecamatan'){
			$nilai = 10;
		} else if($ind == 'Kabupaten'){
			$nilai = 15;
		} else if($ind == 'Provinsi'){
			$nilai = 20;
		} else if($ind == 'Nasional'){
			$nilai = 25;
		} else if($ind == 'Internasional'){
			$nilai = 30;
		}
		return $nilai;
	} 
	
	function getPrestasiJuara($ind){
		$nilai = 0;
		if($ind == '1'){
			$nilai = 4;
		} else if($ind == '2'){
			$nilai = 3;
		} else if($ind == '3'){
			$nilai = 2;
		} else if($ind == '4'){
			$nilai = 1;
		}
		return $nilai;
	} 
	
	function save()
	{
		$data = array(
			'agama_nama' => $this->input->post('agama_nama')
		);
		$this->db->insert($this->tables,$data);
		echo json_encode(array("status" => TRUE));
	}
	
    function delete($id)
    {
        $chekid = $this->db->get_where($this->tables,array($this->pk=>$id));
        if($chekid>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $id);
        }
        echo json_encode(array("status" => TRUE));
    }
	
	function tampilkanKota()
    {
        $reg_data_diri_alamat_propinsi_id  =   $_GET['reg_data_diri_alamat_propinsi_id'];
        $data   = $this->db->get_where('tbl_kota',array('kota_propinsi_id'=>$reg_data_diri_alamat_propinsi_id))->result();
        foreach ($data as $r)
        {
            echo "<option value='$r->kota_id'>".  strtoupper($r->kota_nama)."</option>";
        }
    }
	
	function getDataRegAkun($id)
    {
        $dataAkun = $this->mcrud->getByID("tbl_reg_akun",  "reg_akun_id",$id)->row_array();
		$dataDiri = $this->mcrud->getByID("tbl_reg_data_diri 
											JOIN tbl_agama ON(tbl_reg_data_diri.reg_data_diri_agama_id = tbl_agama.agama_id)",
											"reg_data_diri_reg_akun_id",$id)->row_array();

        $dataOrtu = $this->db->get_where('tbl_reg_data_ortu 
											JOIN tbl_agama ON(tbl_reg_data_ortu.reg_data_ortu_agama_id = tbl_agama.agama_id)
											JOIN tbl_pendidikan ON(tbl_reg_data_ortu.reg_data_ortu_pendidikan_id = tbl_pendidikan.pendidikan_id)
											JOIN tbl_pekerjaan ON(tbl_reg_data_ortu.reg_data_ortu_pekerjaan_id = tbl_pekerjaan.pekerjaan_id)',
										array('reg_data_ortu_reg_akun_id'=>$id, 'reg_data_ortu_ind'=>'A'))->row_array();
        $dataOrtuI = $this->db->get_where('tbl_reg_data_ortu 
											JOIN tbl_agama ON(tbl_reg_data_ortu.reg_data_ortu_agama_id = tbl_agama.agama_id)
											JOIN tbl_pendidikan ON(tbl_reg_data_ortu.reg_data_ortu_pendidikan_id = tbl_pendidikan.pendidikan_id)
											JOIN tbl_pekerjaan ON(tbl_reg_data_ortu.reg_data_ortu_pekerjaan_id = tbl_pekerjaan.pekerjaan_id)',
										array('reg_data_ortu_reg_akun_id'=>$id, 'reg_data_ortu_ind'=>'I'))->row_array();
        $dataOrtuW = $this->db->get_where('tbl_reg_data_ortu 
											JOIN tbl_agama ON(tbl_reg_data_ortu.reg_data_ortu_agama_id = tbl_agama.agama_id)
											JOIN tbl_pendidikan ON(tbl_reg_data_ortu.reg_data_ortu_pendidikan_id = tbl_pendidikan.pendidikan_id)
											JOIN tbl_pekerjaan ON(tbl_reg_data_ortu.reg_data_ortu_pekerjaan_id = tbl_pekerjaan.pekerjaan_id)',
										array('reg_data_ortu_reg_akun_id'=>$id, 'reg_data_ortu_ind'=>'W'))->row_array();

        $dataNilai = $this->mcrud->getByID("tbl_reg_data_nilai",  "reg_data_nilai_reg_akun_id",$id)->row_array();
        $dataPrestasi = $this->mcrud->getByID("tbl_reg_data_prestasi",  "reg_data_prestasi_reg_akun_id",$id)->row_array();
		$dataPrestasiSatu = $this->db->get_where('tbl_reg_data_prestasi',
										array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek'=>'1'))->row_array();
		$dataPrestasiDua = $this->db->get_where('tbl_reg_data_prestasi',
										array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek'=>'2'))->row_array();
		$dataPrestasiTiga = $this->db->get_where('tbl_reg_data_prestasi',
										array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek'=>'3'))->row_array();
		$dataPrestasiEmpat = $this->db->get_where('tbl_reg_data_prestasi',
										array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek'=>'4'))->row_array();
        
        $dataSkhu = $this->mcrud->getByID("tbl_reg_data_nilai_skhu",  "reg_data_nilai_skhu_reg_akun_id",$id)->row_array();
		
		echo json_encode(array("status" => TRUE, "dataAkun" => $dataAkun, "dataDiri" => $dataDiri, "dataOrtu" => $dataOrtu,
								"dataOrtuI" => $dataOrtuI, "dataNilai" => $dataNilai, "dataPrestasi" => $dataPrestasi, "dataOrtuW" => $dataOrtuW,
								"dataPrestasiSatu" => $dataPrestasiSatu, "dataPrestasiDua" => $dataPrestasiDua, "dataPrestasiTiga" => $dataPrestasiTiga, "dataPrestasiEmpat" => $dataPrestasiEmpat,
								"dataSkhu" => $dataSkhu));
    }
	function getDataNew($id)
	{
        $dataAkun = $this->mcrud->getByID("tbl_reg_akun",  "reg_akun_id",$id)->row_array();
        $dataDiri = $this->mcrud->getByID("tbl_reg_data_diri 
											JOIN tbl_agama ON(tbl_reg_data_diri.reg_data_diri_agama_id = tbl_agama.agama_id)",
											"reg_data_diri_reg_akun_id",$id)->row_array();

        $dataOrtu = $this->db->get_where('tbl_reg_data_ortu 
											JOIN tbl_agama ON(tbl_reg_data_ortu.reg_data_ortu_agama_id = tbl_agama.agama_id)
											JOIN tbl_pendidikan ON(tbl_reg_data_ortu.reg_data_ortu_pendidikan_id = tbl_pendidikan.pendidikan_id)
											JOIN tbl_pekerjaan ON(tbl_reg_data_ortu.reg_data_ortu_pekerjaan_id = tbl_pekerjaan.pekerjaan_id)',
										array('reg_data_ortu_reg_akun_id'=>$id, 'reg_data_ortu_ind'=>'A'))->row_array();
        $dataOrtuI = $this->db->get_where('tbl_reg_data_ortu 
											JOIN tbl_agama ON(tbl_reg_data_ortu.reg_data_ortu_agama_id = tbl_agama.agama_id)
											JOIN tbl_pendidikan ON(tbl_reg_data_ortu.reg_data_ortu_pendidikan_id = tbl_pendidikan.pendidikan_id)
											JOIN tbl_pekerjaan ON(tbl_reg_data_ortu.reg_data_ortu_pekerjaan_id = tbl_pekerjaan.pekerjaan_id)',
										array('reg_data_ortu_reg_akun_id'=>$id, 'reg_data_ortu_ind'=>'I'))->row_array();
        $dataOrtuW = $this->db->get_where('tbl_reg_data_ortu 
											JOIN tbl_agama ON(tbl_reg_data_ortu.reg_data_ortu_agama_id = tbl_agama.agama_id)
											JOIN tbl_pendidikan ON(tbl_reg_data_ortu.reg_data_ortu_pendidikan_id = tbl_pendidikan.pendidikan_id)
											JOIN tbl_pekerjaan ON(tbl_reg_data_ortu.reg_data_ortu_pekerjaan_id = tbl_pekerjaan.pekerjaan_id)',
										array('reg_data_ortu_reg_akun_id'=>$id, 'reg_data_ortu_ind'=>'W'))->row_array();

        $dataNilai = $this->mcrud->getByID("tbl_reg_data_nilai",  "reg_data_nilai_reg_akun_id",$id)->row_array();
		
		$dataPrestasiSatu = $this->db->get_where('tbl_reg_data_prestasi',
										array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek'=>'1'))->row_array();
		$dataPrestasiDua = $this->db->get_where('tbl_reg_data_prestasi',
										array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek'=>'2'))->row_array();
		$dataPrestasiTiga = $this->db->get_where('tbl_reg_data_prestasi',
										array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek'=>'3'))->row_array();
		$dataPrestasiEmpat = $this->db->get_where('tbl_reg_data_prestasi',
										array('reg_data_prestasi_reg_akun_id'=>$id, 'reg_data_prestasi_indek'=>'4'))->row_array();
		
        $dataPrestasi = $this->mcrud->getByID("tbl_reg_data_prestasi",  "reg_data_prestasi_reg_akun_id",$id)->row_array();

        $dataSkhu = $this->mcrud->getByID("tbl_reg_data_nilai_skhu",  "reg_data_nilai_skhu_reg_akun_id",$id)->row_array();
        
		echo json_encode(array("status" => TRUE, "dataAkun" => $dataAkun, "dataDiri" => $dataDiri, "dataOrtu" => $dataOrtu,
								"dataOrtuI" => $dataOrtuI, "dataNilai" => $dataNilai, "dataPrestasi" => $dataPrestasi, "dataOrtuW" => $dataOrtuW,
								"dataPrestasiSatu" => $dataPrestasiSatu, "dataPrestasiDua" => $dataPrestasiDua, "dataPrestasiTiga" => $dataPrestasiTiga, "dataPrestasiEmpat" => $dataPrestasiEmpat,
								"dataSkhu" => $dataSkhu));
		
	}
	
	public function uploadFoto(){
		$fileName = $this->input->post('file', TRUE);

		$config['upload_path'] = './assets/upload/foto/'; 
		$config['file_name'] = $this->session->userdata('username').time();
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 2048;
		$config['max_width'] = 240;
		$config['max_height'] = 300;

		$this->load->library('upload', $config);
		$this->upload->initialize($config); 
			  
		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('msgUpload',$this->upload->display_errors()); 
			redirect('backend/regSiswa'); 
		} else {
			$media = $this->upload->data();
			$inputFileName = 'assets/upload/foto/'.$media['file_name'];
			
			$data = array(
				'reg_data_diri_img' => $inputFileName
			);			
			$this->mcrud->update('tbl_reg_data_diri', $data, 'reg_data_diri_id', $this->session->userdata('id_users'));			
			$this->session->set_flashdata('msgUpload','Sukses Upload Foto'); 
			redirect('backend/regSiswa'); 
		}  
	} 

}
