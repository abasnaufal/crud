<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko_buku extends CI_Controller {
    public function __construct()   //buat ngeload model
    {
        parent::__construct();
        $this->load->model('M_tokobuku');
    }

	public function index() 
	{
        $data['query'] = $this->M_tokobuku->show();     //menampilkan data
        $data['konten'] = 'crud_product';
		$this->load->view('crud_message',$data);
    }
    
    function add()
    {
        $submit = $this->input->post('submit');
        if(isset($submit))
        {
            unset($_POST['submit']);
            $this->M_tokobuku->add($this->input->post());
        }
        $data['konten']='input_data';
        $this->load->view('crud_message',$data);
    }
}
