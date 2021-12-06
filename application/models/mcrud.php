<?php
/**
 * Description of mcrud
 * class ini digunakan untuk melakukan manipulasi  data sederhana
 * dengan parameter yang dikirim dari controller.
 * @author nuris akbar
 */
class mcrud extends CI_Model{
   
    // Menampilkan data dari sebuah tabel dengan pagination.
    public function getList($tables,$limit,$page,$by,$sort){
        $this->db->order_by($by,$sort);
        $this->db->limit($limit,$page);
        return $this->db->get($tables);
    }
    
    // menampilkan semua data dari sebuah tabel.
    public function getAll($tables){
    
        return $this->db->get($tables);
    }
    
    // menghitun jumlah record dari sebuah tabel.
    public function countAll($tables){
        return $this->db->get($tables)->num_rows();
    }
    
    // menghitun jumlah record dari sebuah query.
    public function countQuery($query){
        return $this->db->get($query)->num_rows();
    }
    
    //enampilkan satu record brdasarkan parameter.
    public function kondisi($tables,$where)
    {
        $this->db->where($where);
        return $this->db->get($tables);
    }
    //menampilkan satu record brdasarkan parameter.
    public  function getByID($tables,$pk,$id){
        $this->db->where($pk,$id);
        return $this->db->get($tables);
    }
    
    // Menampilkan data dari sebuah query dengan pagination.
    public function queryList($query,$limit,$page){
       
        return $this->db->query($query." limit ".$page.",".$limit."");
    }
    
    public function queryBiasa($query,$by,$sort){
       // $this->db->order_by($by,$sort);
        return $this->db->query($query);
    }
    // memasukan data ke database.
    public function insert($tables,$data){
        $this->db->insert($tables,$data);
    }
    
    // update data kedalalam sebuah tabel
    public function update($tables,$data,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->update($tables,$data);
    }

	// update dengan array data kedalalam sebuah tabel
    public function updateArray($tables,$data,$array){
        $this->db->where($array);
        $this->db->update($tables,$data);
    }
	
    // menghapus data dari sebuah tabel
    public function delete($tables,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->delete($tables);
    }
    
    function login($username,$password)
    {
       return $this->db->get_where('users',array('username'=>$username,'password'=>$password));        
    }
	// digunakan untuk cek NISN ketika pendaftaran
	public function cekNISN($data){		
		$this->db->from('tbl_reg_akun');
		$this->db->where('reg_akun_nisn',$data);

		return $this->db->count_all_results();
	}
	
	public function cekNISNSiswa($data){		
		$this->db->from('tbl_siswa');
		$this->db->where('siswa_nisn',$data);

		return $this->db->count_all_results();
	}
	
	function sendMail($to_email, $subject, $message)
	{
		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'p2db.sman1simpang4@gmail.com', // change it to yours
		  'smtp_pass' => 'simpangempat', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);
		
        $this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('p2db.sman1simpang4@gmail.com', 'Admin P2DB SMAN 1 SIMPANG EMPAT'); // change it to yours
		$this->email->to($to_email);// change it to yours
		$this->email->subject($subject);
		$this->email->message($message);
		return $this->email->send();
	}
	//activate user account
    function resetPassword($id, $password)
    {
        $data = array('reg_akun_password' => $password );
        $this->db->where('reg_akun_id', $id);
        return $this->db->update('tbl_reg_akun', $data);
    }
}

?>
