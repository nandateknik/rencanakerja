<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('welcome_model');
	}

	public function danger($title, $text)
	{
		$data = '
        <script>
        swal({
            title: "' . $title . '",
            text: "' . $text . '",
            icon: "warning",
            dangerMode: true,
          })          
        </script>';
		$this->session->set_userdata('pesan', $data);
	}

	public function success($title, $text)
	{
		$data = '
        <script>
        swal({
            title: "' . $title . '",
            text: "' . $text . '!",
            icon: "success",
            button: "Confirm",
        });
        </script>';
		$this->session->set_userdata('pesan', $data);
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Username', 'required');

		if ($this->form_validation->run()) {
			$this->welcome_model->login();
			if ($this->session->userdata('login')) {
				redirect(base_url('dashboard'));
			}
			$this->danger('Gagal !', 'Kamu gagal login ! Silahkan cek kembali username dan password kamu.');
		}
		$this->load->view('welcome');
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url());
	}
}
