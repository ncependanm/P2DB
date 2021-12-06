<?php if($this->session->userdata('level')=='1') {?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start <?php if($menu=="beranda"){echo "active open";}?>">
                <a href="<?=base_url();?>backend/beranda" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Beranda</span>
					<span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item start <?php if($menu=="master"){echo "active open";}?>" >
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-folder"></i>
                    <span class="title">Master</span>
					<span class="arrow"></span>
                </a>
				<ul class="sub-menu">
                    <li class="nav-item start <?php if($subMenu=="user"){echo "active open";}?>">
                        <a href="<?=base_url();?>backend/user" class="nav-link ">
                            <span class="title">User</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if($subMenu=="sekolah"){echo "active open";}?>">
                        <a href="<?=base_url();?>backend/sekolah" class="nav-link ">
                            <span class="title">Daftar Sekolah</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if($subMenu=="agama"){echo "active open";}?>" style="display: none">
                        <a href="<?=base_url();?>backend/agama" class="nav-link ">
                            <span class="title">Agama</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if($subMenu=="golongan"){echo "active open";}?>" style="display: none">
                        <a href="<?=base_url();?>backend/golongan" class="nav-link ">
                            <span class="title">Golongan</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if($subMenu=="jabatan"){echo "active open";}?>" style="display: none">
                        <a href="<?=base_url();?>backend/jabatan" class="nav-link ">
                            <span class="title">Jabatan</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if($subMenu=="pekerjaan"){echo "active open";}?>" style="display: none">
                        <a href="<?=base_url();?>backend/pekerjaan" class="nav-link ">
                            <span class="title">Pekerjaan</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if($subMenu=="jurusan"){echo "active open";}?>" style="display: none">
                        <a href="<?=base_url();?>backend/jurusan" class="nav-link ">
                            <span class="title">Jurusan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start <?php if($menu=="daftarHadir"){echo "active open";}?>">
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Daftar Hadir</span>
					<span class="arrow"></span>
                </a>
				<ul class="sub-menu">
                    <li class="nav-item start <?php if($subMenu=="daftarPrestasi"){echo "active open";}?>">
                        <a href="<?=base_url();?>backend/daftarPrestasi" class="nav-link ">
                            <span class="title">Jalur Prestasi</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if($subMenu=="daftarReguler"){echo "active open";}?>">
                        <a href="<?=base_url();?>backend/daftarReguler" class="nav-link ">
                            <span class="title">Jalur Reguler</span>
                        </a>
                    </li>
				</ul>
            </li>
            <li class="nav-item start <?php if($menu=="infoPendaftaran"){echo "active open";}?>">
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Informasi Pendaftaran</span>
					<span class="arrow"></span>
                </a>
				<ul class="sub-menu">
                    <li class="nav-item start <?php if($subMenu=="infoPendaftaran"){echo "active open";}?>">
                        <a href="<?=base_url();?>backend/infoPendaftaran" class="nav-link ">
                            <span class="title">Jalur Prestasi</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if($subMenu=="infoPendaftaranReg"){echo "active open";}?>">
                        <a href="<?=base_url();?>backend/infoPendaftaranReg" class="nav-link ">
                            <span class="title">Jalur Reguler</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if($subMenu=="infoPendaftaranRegPrestasi"){echo "active open";}?>">
                        <a href="<?=base_url();?>backend/infoPendaftaranRegPrestasi" class="nav-link ">
                            <span class="title">Jalur Reguler (Prestasi)</span>
                        </a>
                    </li>
				</ul>
            </li>
            <li class="nav-item start <?php if($menu=="nilaiPendaftaran"){echo "active open";}?>">
                <a href="<?=base_url();?>backend/nilaiPendaftaran" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Nilai Pendaftaran</span>
					<span class="arrow"></span>
                </a>
				<ul class="sub-menu">
                    <li class="nav-item start <?php if($subMenu=="nilaiPendaftaran"){echo "active open";}?>">
                        <a href="<?=base_url();?>backend/nilaiPendaftaran" class="nav-link ">
                            <span class="title">Jalur Prestasi</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if($subMenu=="nilaiPendaftaranReg"){echo "active open";}?>">
                        <a href="<?=base_url();?>backend/nilaiPendaftaranReg" class="nav-link ">
                            <span class="title">Jalur Reguler</span>
                        </a>
                    </li>
				</ul>
            </li>
            <li class="nav-item start <?php if($menu=="kurikulum"){echo "active open";}?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">Kurikulum</span>
					<span class="arrow"></span>
                </a>
				<ul class="sub-menu">
                    <li class="nav-item start <?php if($subMenu=="tahunAjaran"){echo "active open";}?>">
                        <a href="<?=base_url();?>backend/tahunAjaran" class="nav-link ">
                            <span class="title">Tahun Ajaran</span>
                        </a>
                    </li>
					<li class="nav-item  <?php if($subMenu=="guru"){echo "active open";}?>" style="display: none">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Guru</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
							<li class="nav-item <?php if($subMenuB=="guru"){echo "active open";}?>" style="display: none">
								<a href="<?=base_url();?>backend/guru" class="nav-link " >Data Guru</a>
                            </li>
                            <li class="nav-item <?php if($subMenuB=="pengajar"){echo "active open";}?>">
								<a href="<?=base_url();?>backend/pengajar" class="nav-link " >Data Pengajar</a>
                            </li>
                        </ul>
                    </li>
					
                    <li class="nav-item start <?php if($subMenu=="siswa"){echo "active open";}?>" style="display: none">
                        <a href="<?=base_url();?>backend/siswa" class="nav-link ">
                            <span class="title">Siswa</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if($subMenu=="mataPelajaran"){echo "active open";}?>" style="display: none">
                        <a href="<?=base_url();?>backend/mataPelajaran" class="nav-link ">
                            <span class="title">Mata Pelajaran</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if($subMenu=="kelas"){echo "active open";}?>" style="display: none">
                        <a href="<?=base_url();?>backend/kelas" class="nav-link ">
                            <span class="title">Kelas</span>
                        </a>
                    </li>
				</ul>
			</li>
        </ul>
    </div>
</div>
<?php } 
if($this->session->userdata('level')=='2') {?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start <?php if($menu=="beranda"){echo "active open";}?>">
                <a href="<?=base_url();?>backend/beranda" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Beranda</span>
					<span class="arrow"></span>
                </a>
            </li>
			<li class="nav-item start <?php if($menu=="jadwal"){echo "active open";}?>">
                <a href="<?=base_url();?>backend/jadwalGuru" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Jadwal Mengajar</span>
					<span class="arrow"></span>
                </a>
            </li>
			<li class="nav-item start <?php if($menu=="nilai"){echo "active open";}?>">
                <a href="<?=base_url();?>backend/nilai" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Penilaian</span>
					<span class="arrow"></span>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php }
if($this->session->userdata('level')=='3') {?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start <?php if($menu=="beranda"){echo "active open";}?>">
                <a href="<?=base_url();?>backend/beranda" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
					<span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item start <?php if($menu=="dataDiri"){echo "active open";}?>">
                <a href="<?=base_url();?>backend/regSiswa" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">Data Diri</span>
					<span class="arrow"></span>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php } 
if($this->session->userdata('level')=='4') {?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start <?php if($menu=="beranda"){echo "active open";}?>">
                <a href="<?=base_url();?>backend/beranda" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
					<span class="arrow"></span>
                </a>
            </li>
						<li class="nav-item start <?php if($menu=="jadwal"){echo "active open";}?>">
                <a href="<?=base_url();?>backend/jadwalSiswa" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Jadwal Pelajaran</span>
					<span class="arrow"></span>
                </a>
            </li>
			<li class="nav-item start <?php if($menu=="nilai"){echo "active open";}?>">
                <a href="<?=base_url();?>backend/nilai" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Nilai</span>
					<span class="arrow"></span>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php } 
if($this->session->userdata('level')=='5') {?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
					<span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="#" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Calon Siswa</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<?php } ?>