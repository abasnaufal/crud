<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tokobuku extends CI_Model {

	function show($params=array()){     //menampilkan data
        $this->db->select('*');
        $this->db->from('products');

        if(!empty($params['id'])){      //jika tidak kosong maka
            $this->db->where('product_id', $params['id']);
            $query=$this->db->get()->row();     //menampilkan satu baris
        
        }else{
            $query=$this->db->get()->result();  //menampilkan semuanya
        }
        return $query;
    }

    function add($params=array(), $id=null)
    {
        if($id != null)             //jika tidak null maka
        {
            $this->db->where('product_id', $id);
            $query = $this->db->update('products', $params);    //kalo klik update, karena idnya ada
        }else{
            $query = $this->db->insert('products', $params);    //kalo klik add, karena idnya gaada
        }
        return $query;
    }

    function delete($id)
    {
        $this->db->where('product_id', $id);
        $query = $this->db->delete('products');

        return $query;
    }

/*public function index()
	{
		$this->load->view('welcome_message');
	} */
}