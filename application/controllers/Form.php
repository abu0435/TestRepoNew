<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
		parent::__construct();
	}
	public function dashboard()
	{
		//$this->load->view('index');
		//$this->load->myview('views','welcome_message1', $data);
		//echo 'd';
		//$this->load->myview('views','welcome_message1');
		$this->load->myview('views','dashboard');
	}

	public function form()
	{
		$this->load->helper('form');
		if($_POST) {
				//print_r($_POST);
				$this->load->model("form_m");
				$dob=$this->input->post("dob");
				$dob=date('Y-m-d',strtotime($dob));
				$array = array(
					"firstName" => $this->input->post("firstName"),
					"lastName" => $this->input->post("lastName"),
					"gender" => $this->input->post("gender"),
					"dob" => $dob,
					"address" => $this->input->post("address"),
					"city" => $this->input->post("city"),
					"state" => $this->input->post("state"),
					"postcode" => $this->input->post("postcode"),
					"country" => $this->input->post("country"),
				);
				$result = $this->form_m->insert($array);
				if($result == 1)
				{
				$this->session->set_flashdata('success', '<div class="alert alert-success">Personal Info Saved Successfully. <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>');
				}
				else
				{
					$this->session->set_flashdata('error', '<div class="alert alert-danger"> Error. Try Again...! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
				}
				redirect(base_url("/form/form"));
		}
		else
		{
			
		$this->load->myview('views','form');	
		}
		
	}

	public function list()
	{
		$this->load->model("form_m");
		$this->data['datam'] = $this->form_m->getdata();
		$this->load->myview('views','formdatalist', $this->data);
	}
}
