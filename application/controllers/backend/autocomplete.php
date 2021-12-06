<?php
class autocomplete extends CI_Controller{
    
    
    function __construct() 
	{
        parent::__construct();
    }	
	
	function kelas()
    {
        $sql    =   "SELECT * WHERE tbl_kelas";
        $data = $this->db->query($sql)->result();
        echo json_encode($data);
    }
}