<?php
class Registration_Model extends CI_Model 
{

	function saverecords($name,$email,$mobile)
	{
	$query="insert into users values('','$name','$email','$mobile')";
	$this->db->query($query);
	}

	function fetchrecords($name,$email)
	{
		//ss$this->db->where('email','shanushah059@gmail.com');
		$where = "name='$name' AND email='$email'";
		$this->db->where($where);

		$query=$this->db->get('users');
		$result=$query->result();
		//print_r($result);
		if(empty($result))
		{
			print_r("Incorrect username and password");
		}
		else
		{
			print_r("you are logged in");
		}
	
	
	}
}

?>