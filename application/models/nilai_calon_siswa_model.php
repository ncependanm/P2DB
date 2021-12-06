<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nilai_Calon_Siswa_Model extends CI_Model {

	var $table = 'tbl_reg_data_nilai_tes';
	var $column_order = array('reg_data_nilai_tes_id','reg_akun_no_reg','reg_akun_nisn','reg_akun_nama','reg_data_nilai_raport','reg_data_nilai_prestasi','reg_data_nilai_tes_baca_tulis_alquran','reg_data_nilai_tes_ahlaq','reg_data_nilai_tes_minat_bakat','reg_data_nilai_tes_bhs_inggris','reg_data_nilai_wawancara','reg_data_nilai_total',null); //set column field database for datatable orderable
	var $column_search = array('reg_akun_no_reg','reg_akun_nisn','reg_akun_nama','reg_data_nilai_raport','reg_data_nilai_prestasi','reg_data_nilai_tes_baca_tulis_alquran','reg_data_nilai_tes_ahlaq','reg_data_nilai_tes_minat_bakat','reg_data_nilai_tes_bhs_inggris','reg_data_nilai_wawancara','reg_data_nilai_total'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('reg_data_nilai_total' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query($ind)
	{
		
		$this->db->from($this->table);
		$this->db->join('tbl_reg_akun', 'tbl_reg_akun.reg_akun_id=tbl_reg_data_nilai_tes.reg_data_nilai_tes_reg_akun_id', 'left');
		if($ind == 'P'){
			$this->db->where('reg_akun_jalur_daftar',$ind);			
		} else {
			$indTmp = array('R','A');
			$this->db->where_in('reg_akun_jalur_daftar',$indTmp);
		}


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

	function get_datatables($ind)
	{
		$this->_get_datatables_query($ind);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($ind)
	{
		$this->_get_datatables_query($ind);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($ind)
	{
		$this->db->from($this->table);
		$this->db->join('tbl_reg_akun', 'tbl_reg_akun.reg_akun_id=tbl_reg_data_nilai_tes.reg_data_nilai_tes_reg_akun_id', 'left');
		
		if($ind == 'P'){
			$this->db->where('reg_akun_jalur_daftar',$ind);			
		} else {
			$indTmp = array('R','A');
			$this->db->where_in('reg_akun_jalur_daftar',$indTmp);
		}
		
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('reg_akun_id',$id);
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
		$this->db->where('reg_akun_id', $id);
		$this->db->delete($this->table);
	}

}
