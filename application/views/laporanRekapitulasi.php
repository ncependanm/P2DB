<?php
$ada = true;
if($this->session->userdata('level')=='1')
{
	$ada = true;
}
if(!$ada){
	?>
<?php } else {
			header("Content-type:application/vnd-ms-excel");
			header("Content-Disposition:attachment;filename=Laporan Rekapitulasi.xls");?>
<html>
	<head>
		<title>Laporan Rekapitulasi
		</title>
		<script>
		$(document).ready(function() {
		setTimeout(function(){
			window.close();
		}, 3000);
		});
		</script>
	</head>
	<body>
		<table>
		<tr>
			<td colspan="7">
				REKAPITULASI DATA PENDAFTAR CALON SISWA BARU
			</td>
		</tr>
		<tr>
			<td colspan="7">
				SMA 1 SIMPANG EMPAT
			</td>
		</tr>
		<tr>
			<td colspan="7">
				TAHUN PELAJARAN 2017/2018
			</td>
		</tr>
		<tr>
			<td colspan="7">
				
			</td>
		</tr>
		<tr>
			<td colspan="7">
				JALUR PRESTASI
			</td>
		</tr>
		</table>
		<table border="1" width="80%">
			<tr>
				<td rowspan="2" width="5%" valign="top">No</td>
				<td rowspan="2" colspan="2" width="30%" valign="top">URAIAN REKAPITULASI</td>
				<td colspan="2" width="20%" valign="top">JUMLAH</td>
				<td rowspan="2" colspan="2" width="25%" valign="top">TOTAL</td>
			</tr>
			<tr>
				<td>L</td>
				<td>P</td>
			</tr>
			<tr>
				<td>1</td>
				<td colspan="2">JENIS KELAMIN</td>
				<td><?=$lakiLaki?></td>
				<td><?=$perempuan?></td>
				<td colspan="2"><?=$jmlJK?></td>
			</tr>
			<tr>
				<td rowspan="6" valign="top">2</td>
				<td rowspan="6" valign="top">AGAMA</td>
				<td>ISLAM</td>
				<td><?=$islam?></td>
				<td><?=$islamP?></td>
				<td colspan="2"><?=$jmlIslam?></td>
			</tr>
			<tr>
				<td>KRISTEN</td>
				<td><?=$kristen?></td>
				<td><?=$kristenP?></td>
				<td colspan="2"><?=$jmlKristen?></td>
			</tr>
			<tr>
				<td>KATOLIK</td>
				<td><?=$katolik?></td>
				<td><?=$katolikP?></td>
				<td colspan="2"><?=$jmlKatolik?></td>
			</tr>
			<tr>
				<td>BUDHA</td>
				<td><?=$budha?></td>
				<td><?=$budhaP?></td>
				<td colspan="2"><?=$jmlBudha?></td>
			</tr>
			<tr>
				<td>HINDU</td>
				<td><?=$hindu?></td>
				<td><?=$hinduP?></td>
				<td colspan="2"><?=$jmlHindu?></td>
			</tr>
			<tr>
				<td>KEPERCAYAAN</td>
				<td><?=$kepercayaan?></td>
				<td><?=$kepercayaanP?></td>
				<td colspan="2"><?=$jmlKepercayaan?></td>
			</tr>
			<tr>
				<td rowspan="4" valign="top">3</td>
				<td rowspan="4" valign="top">USIA</td>
				<td>14</td>
				<td><?=$umurL14?></td>
				<td><?=$umurP14?></td>
				<td colspan="2"><?=$jmlUmur14?></td>
			</tr>
			<tr>
				<td>15</td>
				<td><?=$umurL15?></td>
				<td><?=$umurP15?></td>
				<td colspan="2"><?=$jmlUmur15?></td>
			</tr>
			<tr>
				<td>16</td>
				<td><?=$umurL16?></td>
				<td><?=$umurP16?></td>
				<td colspan="2"><?=$jmlUmur16?></td>
			</tr>
			<tr>
				<td>17</td>
				<td><?=$umurL17?></td>
				<td><?=$umurP17?></td>
				<td colspan="2"><?=$jmlUmur17?></td>
			</tr>
			<tr>
				<td rowspan="33" valign="top">4</td>
				<td colspan="2">PEKERJAAN</td>
				<td>JUMLAH</td>
				<td colspan="2">PENGHASILAN</td>
				<td>JUMLAH</td>
			</tr>
			<tr>
				<td rowspan="15" valign="top">BAPAK</td>
				<td>BURUH</td>
				<td><?=$buruhA?></td>
				<td rowspan="15" valign="top">BAPAK</td>
				<td>KURANG DARI RP. 500.000</td>
				<td><?=$kurang500A?></td>
			</tr>
			<tr>
				<td>KARYAWAN SWASTA</td>
				<td><?=$karyawanSwastaA?></td>
				<td>RP. 500.000 - RP. 999.999</td>
				<td><?=$rp500A?></td>
			</tr>
			<tr>
				<td>NELAYAN</td>
				<td><?=$nelayanA?></td>
				<td>RP. 1.000.000 - RP. 1.999.999</td>
				<td><?=$rp1000A?></td>
			</tr>
			<tr>
				<td>PEDAGANG BESAR</td>
				<td><?=$pedagangBesarA?></td>
				<td>RP. 2.000.000 - RP. 4.999.999</td>
				<td><?=$rp2000A?></td>
			</tr>
			<tr>
				<td>PEDAGANG KECIL</td>
				<td><?=$pedagangKecilA?></td>
				<td WIDTH>RP. 5.000.000 - RP. 20.000.000</td>
				<td><?=$rp5000A?></td>
			</tr>
			<tr>
				<td>PENSIUNAN</td>
				<td><?=$pensiunanA?></td>
				<td>LEBIH DARI RP. 20.000.000</td>
				<td><?=$lebih20000A?></td>
			</tr>
			<tr>
				<td>PETANI</td>
				<td><?=$petaniA?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>PETERNAK</td>
				<td><?=$peternakA?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>PNS/POLRI/TNI</td>
				<td><?=$pnspolritniA?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>TENAGA KERJA INDONESIA</td>
				<td><?=$tkiA?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>WIRAUSAHA</td>
				<td><?=$wirausahaA?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>WIRASWASTA</td>
				<td><?=$wiraswastaA?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>TIDAK DAPAT DITENTUKAN</td>
				<td><?=$tidakDiterapkanA?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>TIDAK BEKERJA</td>
				<td><?=$tidakBekerjaA?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>LAINNYA</td>
				<td><?=$lainnyaA?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2">TOTAL</td>
				<td><?=$jmlPekerjaanA?></td>
				<td colspan="2">TOTAL</td>
				<td><?=$jmlPenghasilanA?></td>
			</tr>
			<tr>
				<td rowspan="15" valign="top">IBU</td>
				<td>BURUH</td>
				<td><?=$buruhI?></td>
				<td rowspan="15" valign="top">IBU</td>
				<td>KURANG DARI RP. 500.000</td>
				<td><?=$kurang500I?></td>
			</tr>
			<tr>
				<td>KARYAWAN SWASTA</td>
				<td><?=$karyawanSwastaI?></td>
				<td>RP. 500.000 - RP. 999.999</td>
				<td><?=$rp500I?></td>
			</tr>
			<tr>
				<td>NELAYAN</td>
				<td><?=$nelayanI?></td>
				<td>RP. 1.000.000 - RP. 1.999.999</td>
				<td><?=$rp1000I?></td>
			</tr>
			<tr>
				<td>PEDAGANG BESAR</td>
				<td><?=$pedagangBesarI?></td>
				<td>RP. 2.000.000 - RP. 4.999.999</td>
				<td><?=$rp2000I?></td>
			</tr>
			<tr>
				<td>PEDAGANG KECIL</td>
				<td><?=$pedagangKecilI?></td>
				<td WIDTH>RP. 5.000.000 - RP. 20.000.000</td>
				<td><?=$rp5000I?></td>
			</tr>
			<tr>
				<td>PENSIUNAN</td>
				<td><?=$pensiunanI?></td>
				<td>LEBIH DARI RP. 20.000.000</td>
				<td><?=$lebih20000I?></td>
			</tr>
			<tr>
				<td>PETANI</td>
				<td><?=$petaniI?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>PETERNAK</td>
				<td><?=$peternakI?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>PNS/POLRI/TNI</td>
				<td><?=$pnspolritniI?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>TENAGA KERJA INDONESIA</td>
				<td><?=$tkiI?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>WIRAUSAHA</td>
				<td><?=$wirausahaI?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>WIRASWASTA</td>
				<td><?=$wiraswastaI?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>TIDAK DAPAT DITENTUKAN</td>
				<td><?=$tidakDiterapkanI?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>TIDAK BEKERJA</td>
				<td><?=$tidakBekerjaI?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>LAINNYA</td>
				<td><?=$lainnyaI?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2">TOTAL</td>
				<td><?=$jmlPekerjaanI?></td>
				<td colspan="2">TOTAL</td>
				<td><?=$jmlPenghasilanI?></td>
			</tr>
			<tr>
				<td valign="top" rowspan="<?=$jmlDataSekolah+1+$jmlDataKab + $jmlDataKec?>">5</td>
				<td colspan="2">SEKOLAH</td>
				<td>JUMLAH</td>
				<td colspan="3">TOTAL</td>
			</tr>
			<?php $no=0; foreach ($dataSekolah as $s)
					{ $no++;?>
			<tr>
				<?php if($no == 1){ ?>
				<td valign="top" rowspan="<?=$jmlDataSekolah?>">ASAL</td>
				<td><?=$s->reg_data_diri_lulusan?></td>
				<td><?=$s->jml?></td>
				<td>SMPN / SMP</td>
				<td colspan="2"><?=$jmlDataSekolahSMP?></td>
				<?php } else {
						if($no == 2){?>
				<td><?=$s->reg_data_diri_lulusan?></td>
				<td><?=$s->jml?></td>
				<td>MTSN / MTS</td>
				<td colspan="2"><?=$jmlDataSekolahMTS?></td>
					<?php } else { ?>
					<td><?=$s->reg_data_diri_lulusan?></td>
					<td><?=$s->jml?></td>
					<td colspan="3"></td>
					<?php } ?>
				<?php } ?>
			</tr>
			<?php } ?>
			
			<?php $no=0; foreach ($dataKab as $kab)
					{ $no++;?>
			<tr>
				<?php if($no == 1){ ?>
				<td valign="top" rowspan="<?=$jmlDataKab?>">KABUPATEN</td>
				<td><?=$kab->reg_data_diri_alamat_kota?></td>
				<td><?=$kab->jml?></td>
				<td colspan="3"></td>
				<?php } else { ?>
				<td><?=$kab->reg_data_diri_alamat_kota?></td>
				<td><?=$kab->jml?></td>
				<td colspan="3"></td>
				<?php } ?>
			</tr>
			<?php } ?>
			<?php $no=0; foreach ($dataKec as $kec)
					{ $no++;?>
			<tr>
				<?php if($no == 1){ ?>
				<td valign="top" rowspan="<?=$jmlDataKec?>">KECAMATAN</td>
				<td><?=$kec->reg_data_diri_alamat_kecamatan?></td>
				<td><?=$kec->jml?></td>
				<td colspan="3"></td>
				<?php } else { ?>
				<td><?=$kec->reg_data_diri_alamat_kecamatan?></td>
				<td><?=$kec->jml?></td>
				<td colspan="3"></td>
				<?php } ?>
			</tr>
			<?php } ?>
		</table>
		<table>
		<tr>
			<td colspan="7">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td>Mengetahui</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>Penyusun,</td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td>Ketua Pelaksana</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>Koordinator Data/Verifikasi</td>
		</tr>
		<tr>
			<td>&nbsp</td>
		</tr>
		<tr>
			<td>&nbsp</td>
		</tr>
		<tr>
			<td>&nbsp</td>
		</tr>
		<tr>
		<tr>
			<td>&nbsp</td>
			<td>Dr. Moh. Rif'an</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>Fajar Sadiq, M.Pd</td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td>NIP.</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>NIP.</td>
		</tr>
		</tr>
		</table>
	</body>
</html>
<?php } ?>