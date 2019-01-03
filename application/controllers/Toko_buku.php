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
        $data['konten'] = 'crud_product';           //'konten' yg mau di load adalah crud_product
		$this->load->view('crud_message',$data);    //load view dari crud message
    }
    
    function add()
    {
        $submit = $this->input->post('submit');
        if(isset($submit))                          //jika add submit maka
        {
            unset($_POST['submit']);
            $this->M_tokobuku->add($this->input->post());
        }
        $data['konten']='input_data';
        $this->load->view('crud_message',$data);
    }

    function edit($id=null)
    {
        $submit = $this->input->post('submit');
        if(isset($submit))
        {
            unset($_POST['submit']);

            $sParams['description'] = $this->input->post('description');
            $sParams['name'] = $this->input->post('name');
            $sParams['price'] = $this->input->post('price');
            $sParams['product_id'] = $this->input->post('product_id');

            $this->M_tokobuku->add($sParams,$this->input->post('product_id'));

        }
        $arr=array('id'=>$id);
        $data['row']=$this->M_tokobuku->show($arr);

        $data['konten']='crud_edit';
        $this->load->view('crud_message',$data);
    }

    function delete($id)
    {
        $this->M_tokobuku->delete($id);
        redirect('toko_buku/index');
    }
}
