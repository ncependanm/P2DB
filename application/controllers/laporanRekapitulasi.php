<?php
class laporanRekapitulasi extends CI_Controller
{
    var $tables =   "tbl_agama";
	
    function __construct() 
	{
        parent::__construct();
    }
    
    function index()
    {		
		$sql = "SELECT reg_data_diri_agama_id, reg_data_diri_jenis_kelamin, COUNT(reg_data_diri_id) as jml 
				FROM tbl_reg_data_diri 
				GROUP BY reg_data_diri_jenis_kelamin, reg_data_diri_agama_id";
		$dataAgama = $this->db->query($sql)->result();
		$lakiLaki = 0;
		$perempuan = 0;
		$islam = 0;
		$kristen = 0;
		$katolik = 0;
		$budha = 0;
		$hindu = 0;
		$kepercayaan = 0;
		$islamP = 0;
		$kristenP = 0;
		$katolikP = 0;
		$budhaP = 0;
		$hinduP = 0;
		$kepercayaanP = 0;
		foreach ($dataAgama as $a)
		{
			if($a->reg_data_diri_jenis_kelamin == 'L'){
				if($a->reg_data_diri_agama_id == '1'){
					$islam = $a->jml;
				} else if($a->reg_data_diri_agama_id == '2'){
					$kristen = $a->jml;
				} else if($a->reg_data_diri_agama_id == '3'){
					$katolik = $a->jml;
				} else if($a->reg_data_diri_agama_id == '4'){
					$budha = $a->jml;
				} else if($a->reg_data_diri_agama_id == '5'){
					$hindu = $a->jml;
				} else if($a->reg_data_diri_agama_id == '6'){
					$kepercayaan = $a->jml;
				}
				$lakiLaki = $lakiLaki + $a->jml;
			} else if($a->reg_data_diri_jenis_kelamin == 'P'){
				if($a->reg_data_diri_agama_id == '1'){
					$islamP = $a->jml;
				} else if($a->reg_data_diri_agama_id == '2'){
					$kristenP = $a->jml;
				} else if($a->reg_data_diri_agama_id == '3'){
					$katolikP = $a->jml;
				} else if($a->reg_data_diri_agama_id == '4'){
					$budhaP = $a->jml;
				} else if($a->reg_data_diri_agama_id == '5'){
					$hinduP = $a->jml;
				} else if($a->reg_data_diri_agama_id == '6'){
					$kepercayaanP = $a->jml;
				}
				$perempuan = $perempuan + $a->jml;
			}
		}
		$data['lakiLaki'] = $lakiLaki;
		$data['perempuan'] = $perempuan;
		$data['jmlJK'] = $lakiLaki + $perempuan;
		
		$data['islam'] = $islam;
		$data['islamP'] = $islamP;
		$data['jmlIslam'] = $islam + $islamP;
		
		$data['kristen'] = $kristen;
		$data['kristenP'] = $kristenP;
		$data['jmlKristen'] = $kristen + $kristenP;
		
		$data['katolik'] = $katolik;
		$data['katolikP'] = $katolikP;
		$data['jmlKatolik'] = $katolik + $katolikP;
		
		$data['budha'] = $budha;
		$data['budhaP'] = $budhaP;
		$data['jmlBudha'] = $budha + $budhaP;
		
		$data['hindu'] = $hindu;
		$data['hinduP'] = $hinduP;
		$data['jmlHindu'] = $hindu + $hinduP;
		
		$data['kepercayaan'] = $kepercayaan;
		$data['kepercayaanP'] = $kepercayaanP;
		$data['jmlKepercayaan'] = $kepercayaan + $kepercayaanP;
		
		$sql = 'SELECT reg_data_diri_jenis_kelamin, MID(reg_data_diri_tgl_lahir,7,4) as thn, COUNT(reg_data_diri_id) as jml 
				FROM tbl_reg_data_diri 
				GROUP BY reg_data_diri_jenis_kelamin, MID(reg_data_diri_tgl_lahir,7,4) 
				ORDER BY reg_data_diri_jenis_kelamin,MID(reg_data_diri_tgl_lahir,7,4)';
		$dataUmur = $this->db->query($sql)->result();
		$umurL14 = 0;
		$umurL15 = 0;
		$umurL16 = 0;
		$umurL17 = 0;
		$umurP14 = 0;
		$umurP15 = 0;
		$umurP16 = 0;
		$umurP17 = 0;
		foreach ($dataUmur as $u)
		{
			if($u->reg_data_diri_jenis_kelamin == 'L'){
				if($u->thn == '2000'){
					$umurL17 = $u->jml;
				} else if($u->thn == '2001'){
					$umurL16 = $u->jml;
				} else if($u->thn == '2002'){
					$umurL15 = $u->jml;
				} else if($u->thn == '2003'){
					$umurL14 = $u->jml;
				}
			} else if($u->reg_data_diri_jenis_kelamin == 'P'){
				if($u->thn == '2000'){
					$umurP17 = $u->jml;
				} else if($u->thn == '2001'){
					$umurP16 = $u->jml;
				} else if($u->thn == '2002'){
					$umurP15 = $u->jml;
				} else if($u->thn == '2003'){
					$umurP14 = $u->jml;
				}
			} 
		}
		$data['umurL14'] = $umurL14;
		$data['umurP14'] = $umurP14;
		$data['jmlUmur14'] = $umurL14 + $umurP14;
		
		$data['umurL15'] = $umurL15;
		$data['umurP15'] = $umurP15;
		$data['jmlUmur15'] = $umurL15 + $umurP15;
		
		$data['umurL16'] = $umurL16;
		$data['umurP16'] = $umurP16;
		$data['jmlUmur16'] = $umurL16 + $umurP16;
		
		$data['umurL17'] = $umurL17;
		$data['umurP17'] = $umurP17;
		$data['jmlUmur17'] = $umurL17 + $umurP17;
		
		$sql = "SELECT reg_data_ortu_ind, reg_data_ortu_pekerjaan_id,  COUNT(reg_data_ortu_id) as jml  
					FROM tbl_reg_data_ortu 
					WHERE reg_data_ortu_nama not in ('','-')
					GROUP BY reg_data_ortu_ind, reg_data_ortu_pekerjaan_id";
		$dataOrtu = $this->db->query($sql)->result();
		$buruhA = 0;
		$karyawanSwastaA = 0;
		$nelayanA = 0;
		$pedagangBesarA = 0;
		$pedagangKecilA = 0;
		$pensiunanA = 0;
		$petaniA = 0;
		$peternakA = 0;
		$pnspolritniA = 0;
		$tkiA = 0;
		$tidakBekerjaA = 0;
		$tidakDiterapkanA = 0;
		$wiraswastaA = 0;
		$wirausahaA = 0;
		$lainnyaA = 0;
		$buruhI = 0;
		$karyawanSwastaI = 0;
		$nelayanI = 0;
		$pedagangBesarI = 0;
		$pedagangKecilI = 0;
		$pensiunanI = 0;
		$petaniI = 0;
		$peternakI = 0;
		$pnspolritniI = 0;
		$tkiI = 0;
		$tidakBekerjaI = 0;
		$tidakDiterapkanI = 0;
		$wiraswastaI = 0;
		$wirausahaI = 0;
		$lainnyaI = 0;
		foreach ($dataOrtu as $o)
		{
			if($o->reg_data_ortu_ind == 'A'){
				if($o->reg_data_ortu_pekerjaan_id == '2'){
					$buruhA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '3'){
					$karyawanSwastaA = $o->jml;				
				} else if($o->reg_data_ortu_pekerjaan_id == '4'){
					$nelayanA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '5'){
					$pedagangBesarA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '6'){
					$pedagangKecilA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '7'){
					$pensiunanA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '8'){
					$petaniA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '9'){
					$peternakA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '10'){
					$pnspolritniA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '11'){
					$tkiA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '12'){
					$tidakBekerjaA = $tidakBekerjaA+ $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '13'){
					$tidakDiterapkanA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '15'){
					$wiraswastaA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '16'){
					$wirausahaA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '17'){
					$lainnyaA = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '0'){
					$tidakBekerjaA = $tidakBekerjaA + $o->jml;
				}
			} else if($o->reg_data_ortu_ind == 'I'){
				if($o->reg_data_ortu_pekerjaan_id == '2'){
					$buruhI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '3'){
					$karyawanSwastaI = $o->jml;				
				} else if($o->reg_data_ortu_pekerjaan_id == '4'){
					$nelayanI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '5'){
					$pedagangBesarI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '6'){
					$pedagangKecilI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '7'){
					$pensiunanI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '8'){
					$petaniI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '9'){
					$peternakI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '10'){
					$pnspolritniI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '11'){
					$tkiI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '12'){
					$tidakBekerjaI = $tidakBekerjaI + $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '13'){
					$tidakDiterapkanI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '15'){
					$wiraswastaI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '16'){
					$wirausahaI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '17'){
					$lainnyaI = $o->jml;
				} else if($o->reg_data_ortu_pekerjaan_id == '0'){
					$tidakBekerjaI = $tidakBekerjaI + $o->jml;
				}
			}
		}
		$data['buruhA'] = $buruhA;
		$data['karyawanSwastaA'] = $karyawanSwastaA;
		$data['nelayanA'] = $nelayanA;
		$data['pedagangBesarA'] = $pedagangBesarA;
		$data['pedagangKecilA'] = $pedagangKecilA;
		$data['pensiunanA'] = $pensiunanA;
		$data['petaniA'] = $petaniA;
		$data['peternakA'] = $peternakA;
		$data['pnspolritniA'] = $pnspolritniA;
		$data['tkiA'] = $tkiA;
		$data['tidakBekerjaA'] = $tidakBekerjaA;
		$data['tidakDiterapkanA'] = $tidakDiterapkanA;
		$data['wiraswastaA'] = $wiraswastaA;
		$data['wirausahaA'] = $wirausahaA;
		$data['lainnyaA'] = $lainnyaA;
		$data['jmlPekerjaanA'] = $buruhA + $karyawanSwastaA + $nelayanA + $pedagangBesarA + $pedagangBesarI +
		$pensiunanA + $petaniA + $peternakA + $pnspolritniA + $tkiA + $tidakBekerjaA + $tidakDiterapkanA +
		$wiraswastaA + $wirausahaA + $lainnyaA;
		$data['buruhI'] = $buruhI;
		$data['karyawanSwastaI'] = $karyawanSwastaI;
		$data['nelayanI'] = $nelayanI;
		$data['pedagangBesarI'] = $pedagangBesarI;
		$data['pedagangKecilI'] = $pedagangKecilI;
		$data['pensiunanI'] = $pensiunanI;
		$data['petaniI'] = $petaniI;
		$data['peternakI'] = $peternakI;
		$data['pnspolritniI'] = $pnspolritniI;
		$data['tkiI'] = $tkiI;
		$data['tidakBekerjaI'] = $tidakBekerjaI;
		$data['tidakDiterapkanI'] = $tidakDiterapkanI;
		$data['wiraswastaI'] = $wiraswastaI;
		$data['wirausahaI'] = $wirausahaI;
		$data['lainnyaI'] = $lainnyaI;
		$data['jmlPekerjaanI'] = $buruhI + $karyawanSwastaI + $nelayanI + $pedagangBesarI + $pedagangBesarI +
		$pensiunanI + $petaniI + $peternakI + $pnspolritniI + $tkiI + $tidakBekerjaI + $tidakDiterapkanI +
		$wiraswastaI + $wirausahaI + $lainnyaI;

		$sql = "select reg_data_ortu_ind, reg_data_ortu_penghasilan,  COUNT(reg_data_ortu_id) as jml 
				from tbl_reg_data_ortu 
				WHERE reg_data_ortu_nama not in ('','-')
				GROUP BY reg_data_ortu_ind, reg_data_ortu_penghasilan";
		$dataOrtuPenghasilan = $this->db->query($sql)->result();
		$kurang500A = 0;
		$rp500A = 0;
		$rp1000A = 0;
		$rp2000A = 0;
		$rp5000A = 0;
		$lebih20000A = 0;
		$kurang500I = 0;
		$rp500I = 0;
		$rp1000I = 0;
		$rp2000I = 0;
		$rp5000I = 0;
		$lebih20000I = 0;
		foreach ($dataOrtuPenghasilan as $op)
		{
			if($op->reg_data_ortu_ind == 'A'){
				if($op->reg_data_ortu_penghasilan == ''){
					$kurang500A = $kurang500A + $op->jml;
				} else if($op->reg_data_ortu_penghasilan == 'KURANG DARI RP. 500.000'){
					$kurang500A = $kurang500A + $op->jml;
				} else if($op->reg_data_ortu_penghasilan == 'RP. 500.000 - RP. 999.999'){
					$rp500A = $op->jml;
				} else if($op->reg_data_ortu_penghasilan == 'RP. 1.000.000 - RP. 1.999.999'){
					$rp1000A = $op->jml;
				} else if($op->reg_data_ortu_penghasilan == 'RP. 2.000.000 - RP. 4.999.999'){
					$rp2000A = $op->jml;
				} else if($op->reg_data_ortu_penghasilan == 'RP. 5.000.000 - RP. 20.000.000'){
					$rp5000A = $op->jml;
				} else if($op->reg_data_ortu_penghasilan == 'LEBIH DARI RP. 20.000.000'){
					$lebih20000A = $op->jml;
				}
			} else if($op->reg_data_ortu_ind == 'I') {
				if($op->reg_data_ortu_penghasilan == ''){
					$kurang500I = $kurang500I + $op->jml;
				} else if($op->reg_data_ortu_penghasilan == 'KURANG DARI RP. 500.000'){
					$kurang500I = $kurang500I + $op->jml;
				} else if($op->reg_data_ortu_penghasilan == 'RP. 500.000 - RP. 999.999'){
					$rp500I = $op->jml;
				} else if($op->reg_data_ortu_penghasilan == 'RP. 1.000.000 - RP. 1.999.999'){
					$rp1000I = $op->jml;
				} else if($op->reg_data_ortu_penghasilan == 'RP. 2.000.000 - RP. 4.999.999'){
					$rp2000I = $op->jml;
				} else if($op->reg_data_ortu_penghasilan == 'RP. 5.000.000 - RP. 20.000.000'){
					$rp5000I = $op->jml;
				} else if($op->reg_data_ortu_penghasilan == 'LEBIH DARI RP. 20.000.000'){
					$lebih20000I = $op->jml;
				}
			}
		}
		$data['kurang500A'] = $kurang500A;
		$data['rp500A'] = $rp500A;
		$data['rp1000A'] = $rp1000A;
		$data['rp2000A'] = $rp2000A;
		$data['rp5000A'] = $rp5000A;
		$data['lebih20000A'] = $lebih20000A;
		$data['jmlPenghasilanA'] = $kurang500A + $rp500A + $rp1000A + $rp2000A + $rp5000A + $lebih20000A;
		$data['kurang500I'] = $kurang500I;
		$data['rp500I'] = $rp500I;
		$data['rp1000I'] = $rp1000I;
		$data['rp2000I'] = $rp2000I;
		$data['rp5000I'] = $rp5000I;
		$data['lebih20000I'] = $lebih20000I;
		$data['jmlPenghasilanI'] = $kurang500I + $rp500I + $rp1000I + $rp2000I + $rp5000I + $lebih20000I;
		
		$sql = 'SELECT reg_data_diri_lulusan, COUNT(reg_data_diri_id) as jml 
				FROM tbl_reg_data_diri 
				GROUP BY reg_data_diri_lulusan 
				ORDER BY reg_data_diri_lulusan desc';
		$data['dataSekolah'] = $this->db->query($sql)->result();
		$data['jmlDataSekolah'] = $this->db->query($sql)->num_rows();
		
		$sql = "select COUNT(reg_data_diri_id) as jml from tbl_reg_data_diri where reg_data_diri_lulusan LIKE '%SMP%'";
		$datajmlDataSekolahSMP = $this->db->query($sql)->result();
		foreach ($datajmlDataSekolahSMP as $smp)
		{
			$data['jmlDataSekolahSMP'] = $smp->jml;
		}
		$sql = "select COUNT(reg_data_diri_id) as jml from tbl_reg_data_diri where reg_data_diri_lulusan LIKE '%MTS%'";
		$datajmlDataSekolahMTS = $this->db->query($sql)->result();
		foreach ($datajmlDataSekolahMTS as $mts)
		{
			$data['jmlDataSekolahMTS'] = $mts->jml;
		}
		
		$sql = "select count(reg_data_diri_id) as jml,reg_data_diri_alamat_kota from tbl_reg_data_diri
				group by reg_data_diri_alamat_kota";
		$data['dataKab'] = $this->db->query($sql)->result();
		$data['jmlDataKab'] = $this->db->query($sql)->num_rows();
		$sql = "select count(reg_data_diri_id) as jml,reg_data_diri_alamat_kecamatan from tbl_reg_data_diri
				group by reg_data_diri_alamat_kecamatan";
		$data['dataKec'] = $this->db->query($sql)->result();
		$data['jmlDataKec'] = $this->db->query($sql)->num_rows();
		
				
		$this->load->view('laporanRekapitulasi', $data);
    }
}