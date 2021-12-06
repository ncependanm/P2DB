<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurusan_Model extends CI_Model {

	var $table = 'tbl_jurusan';
	var $column_order = array('jurusan_id','jurusan_nama',null); //set column field database for datatable orderable
	var $column_search = array('jurusan_nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('jurusan_id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{ 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('calon_siswa_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('calon_siswa_id', $id);
		$this->db->delete($this->table);
	}
	
	public function upload_data($filename){
        ini_set('memory_limit', '-1');
        $inputFileName = './assets/uploads/'.$filename;
        try {
		$objReader = new PHPExcel_Reader_Excel5();                        
		$objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
        die('Error loading file :' . $e->getMessage());
        }

        $worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $numRows = count($worksheet);
		$data = null;
		for ($i=1; $i < ($numRows+1) ; $i++) { 
			if($worksheet[$i]["A"] != 'Nama' ){
            $data = array(
					'nama' => $worksheet[$i]["A"],
					'tempat_lahir' => $worksheet[$i]["B"],
					'tanggal_lahir' => $worksheet[$i]["C"],
                   );				
            $this->db->insert($this->table, $data);
			}
        }
    }
	
	/* Pendaftaran */
	function pendaftaranCalonSiswa($data) 
	{
		$this->db->trans_start();
		$this->db->insert('tbl_calon_siswa',$data);		
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
    		echo "Error entry data";
		} 
	}
	
	function dapatkanIdCalonSiswa($nisn) {
		$q = $this->db->query("SELECT * FROM tbl_calon_siswa where calon_siswa_nisn='".$nisn."'");
		$hasil = 0;
		if($q->num_rows()>0)
		{
			$hasil = 1;
		}
		return $hasil;
	}
		/* Fungsi untuk cek NISN terdaftar [S] */
	public function cekNISN($data){		
		$this->db->from('tbl_calon_siswa');
		$this->db->where('calon_siswa_nisn',$data);

		return $this->db->count_all_results();
	}
	/* Fungsi untuk cek NISN terdaftar [E] */
	

}
