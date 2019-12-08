<?php
class Forms extends CI_Controller 
{
	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	$this->load->helper('url');

	//load database libray manually
	$this->load->database();
	
	//load Model
	$this->load->model('Registration_Model');
	}

	public function savedatas()
	{
		//load registration view form
		$this->load->view('registration');
	
		//Check submit button 
		if($this->input->post('save'))
		{
		//get form's data and store in local varable
		$n=$this->input->post('name');
		$e=$this->input->post('email');
		$m=$this->input->post('mobile');
		
//call saverecords method of Hello_Model and pass variables as parameter
		$this->Registration_Model->saverecords($n,$e,$m);		
		echo "Records Saved Successfully";
		redirect("Forms/thanks"); 
		}
	}

	public function thanks()
	{
		$this->load->view('thankyou.php');
	}

	public function login()
	{
		$this->load->view('login.php');
		if($this->input->post('login'))
		{
			$n=$this->input->post('name');
			$e=$this->input->post('email');
		$getresult = $this->Registration_Model->fetchrecords($n,$e);
		if(!empty($getresult))
		{
			//print_r($getresult);
			redirect("Forms/home");

		}
		// if(!empty($getresult))
		// {
		// 	redirect("Forms/Home");
		// }
			
		}
	}

	public function home()
	{
		$this->load->view('Home.php');
	}
}
?>