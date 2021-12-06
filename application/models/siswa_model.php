<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_Model extends CI_Model {

	var $table = 'tbl_siswa';
	var $column_order = array('siswa_id','siswa_nisn','siswa_nama','siswa_panggilan','kelas_nama','siswa_jenis_kelamin','siswa_tempat_lahir','siswa_tgl_lahir','agama_nama','siswa_alamat','kota_nama','propinsi_nama','siswa_no_telp',null); //set column field database for datatable orderable
	var $column_search = array('siswa_nisn','siswa_nama','siswa_panggilan','kelas_nama','siswa_jenis_kelamin','siswa_tempat_lahir','siswa_tgl_lahir','agama_nama','siswa_alamat','kota_nama','propinsi_nama','siswa_no_telp'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('agama_id' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		$this->db->join('tbl_agama', 'tbl_siswa.siswa_agama_id=tbl_agama.agama_id', 'left');
		$this->db->join('tbl_kota', 'tbl_siswa.siswa_alamat_kota_id=tbl_kota.kota_id', 'left');
		$this->db->join('tbl_propinsi', 'tbl_siswa.siswa_alamat_propinsi_id=tbl_propinsi.propinsi_id', 'left');
		$this->db->join('tbl_kelas', 'tbl_siswa.siswa_kelas_id=tbl_kelas.kelas_id', 'left');

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
		$this->db->where('siswa_id',$id);
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
		$this->db->where('siswa_id', $id);
		$this->db->delete($this->table);
	}

}
