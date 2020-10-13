<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('admin/login', $data);
    }
    
    public function home()
    {
        $data['title'] = 'Home';
        $this->load->view('admin/home', $data);
    }

}
