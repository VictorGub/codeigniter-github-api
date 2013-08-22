<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// If Useris Not Logged In, redirect back home
		if (!$this->github->get_access_token())
			redirect(base_url(), 'location');
	}

	public function index()
	{
        redirect(base_url(),'location');
	}

	//
	public function user_info($name)
	{
        $this->head['title']="GitHub API - User - ".$name;

        $user=$this->github->user();

        $this->data['user']=$this->github->get_user($name);
        $this->data['like'] = $this->db->from('users_like')
        ->where('id_user', $user->id)
        ->where('users_like_id',$this->data['user']->id)
        ->get();

        // Подключение отображений
        $this->load->view('templates/header', $this->head);
        $this->load->view('user_page', $this->data);
        $this->load->view('templates/footer');
	}
}
/* End of file user.php */
/* Location: ./application/controllers/user.php */