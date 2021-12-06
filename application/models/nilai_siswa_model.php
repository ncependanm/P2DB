<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nilai_Siswa_Model extends CI_Model {

	var $table = 'tbl_nilai';
	var $column_order = array('nilai_id','semester_nama','mata_pelajaran_nama','guru_nama','nilai_tugas','nilai_kuis','nilai_uts','nilai_uas','nilai_praktek'); //set column field database for datatable orderable
	var $column_search = array('mata_pelajaran_nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('semester_nama' => 'asc', 'mata_pelajaran_nama' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query($idSiswa)
	{
		$this->db->from($this->table);
		$sqlOR = "siswa_id = ". $idSiswa ."";
		$this->db->where($sqlOR);
		$this->db->join('tbl_mata_pelajaran', 'tbl_nilai.nilai_mata_pelajaran_id=tbl_mata_pelajaran.mata_pelajaran_id', 'left');
		$this->db->join('tbl_guru', 'tbl_nilai.nilai_guru_id=tbl_guru.guru_id', 'left');
		$this->db->join('tbl_semester', 'tbl_nilai.nilai_semester_id=tbl_semester.semester_id', 'left');
		$this->db->join('tbl_kelas_siswa_tmp', 'tbl_nilai.nilai_kelas_siswa_tmp_id=tbl_kelas_siswa_tmp.kelas_siswa_tmp_id', 'left');
		$this->db->join('tbl_siswa', 'tbl_kelas_siswa_tmp.kelas_siswa_tmp_siswa_id=tbl_siswa.siswa_id', 'left');

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

	function get_datatables($idSiswa)
	{
		$this->_get_datatables_query($idSiswa);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($idSiswa)
	{
		$this->_get_datatables_query($idSiswa);
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
		$this->db->where('agama_id',$id);
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
		$this->db->where('agama_id', $id);
		$this->db->delete($this->table);
	}

}
