<?php
$ada = false;
/* admin */
if($this->session->userdata('level')=='1')
{
	$ada = true;
}
/* guru */
if(!$ada){
	if($this->session->userdata('level')=='2')
	{
		$ada = true;
	}	
}
/* wali kelas */
if($ada){
	if($this->session->userdata('level')=='3')
	{
		$ada = true;
	}
}
/* siswa */
if($ada){
	if($this->session->userdata('level')=='4')
	{
		$ada = true;
	}
}
/* calon siswa */
if($ada){
	if($this->session->userdata('level')=='5')
	{
		$ada = true;
	}
}
if(!$ada){
	?>
<h2 style="font-weight: normal;">Tidak punya akses</h2>
<?php }else{ ?>
<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Data</li>
    </ol>
</div>
 
 <script src="<?php echo base_url()?>assets/js/jquery.min.js">
</script>

<script>
$(document).ready(function(){
          loadjurusan();    
  });
</script>

<script>
$(document).ready(function(){
  $("#prodi").change(function(){
      loadjurusan()
  });
});
</script>

<script>
$(document).ready(function(){
  $("#konsentrasi").change(function(){
      loadmahasiswa();
  });
});
</script>

<script>
$(document).ready(function(){
  $("#tahun_angkatan").change(function(){
      loadjurusan()
  });
});
</script>

<script type="text/javascript">
function loadmahasiswa()
{
    var konsentrasi=$("#konsentrasi").val();
    var tahun_angkatan=$("#tahun_angkatan").val();
    $.ajax({
    url:"<?php echo base_url();?>mahasiswa/tampilkanmahasiswa",
    data:"konsentrasi=" + konsentrasi + "&tahun_angkatan=" + tahun_angkatan ,
    success: function(html)
       {
          $("#mahasiswa").html(html);
       }
       });
}
</script>

<script type="text/javascript">


function loadjurusan()
{
    var prodi=$("#prodi").val();
    $.ajax({
	url:"<?php echo base_url();?>mahasiswa/tampilkankonsentrasi",
	data:"prodi=" + prodi ,
	success: function(html)
	{
            $("#konsentrasi").html(html);
            loadmahasiswa();
            
	}
	});
}
</script>


<script type="text/javascript">
function hapus(id)
{
    
    $.ajax({
	url:"<?php echo base_url();?>mahasiswa/delete",
	data:"id=" + id ,
	success: function(html)
	{
            $("#hide"+id).hide(300);   
	}
	});
   
}
</script>
<?php
if($this->session->userdata('level')==1)
{
    $param="";
}
else
{
    $param=array('prodi_id'=>$this->session->userdata('keterangan'));
}
?>
<div class="col-sm-3">
    
    <table class="table table-bordered">
    <tr><td>Prodi<?php echo buatcombo('prodi', 'akademik_prodi', '', 'nama_prodi', 'prodi_id', $param, array('id'=>'prodi'))?></td></tr>
    <tr><td>Konsentrasi<?php echo combodumy('konsentrasi', 'konsentrasi')?></td></tr>
    <tr><td>Tahun Angkatan
            <?php echo buatcombo('tahun_angkatan', 'student_angkatan', '', 'keterangan', 'angkatan_id', '', array('id'=>'tahun_angkatan'))?>
        </td></tr>
    <tr><td><?php echo anchor('mahasiswa/post','Input Data',array('class'=>'btn btn-primary  btn-sm'));?> <?php //echo anchor('','Cetak Data',array('class'=>'btn btn-primary  btn-sm'));?></td></tr>
</table>
</div>

<div class="col-sm-8">
    <table class="table table-bordered" id="mahasiswa">
        <tr><th width="5">No</th><th width="120">NIM</th><th>NAMA</th><th width="10">Operasi</th></tr>
    </table>
</div>

<?php } ?>