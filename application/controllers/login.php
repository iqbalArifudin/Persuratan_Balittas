
<?php
defined('BASEPATH') OR exit('No direct scipt access allowes');
/**
 * 
 */
class login extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model("login_model");
	}
	public function index(){
		$data ['title']='Login';
		$this->load->view('login/index', $data);
	}
	public function proses_login(){
		$this->load->model("login_model");
		$username=htmlspecialchars($this->input->post('username'));
		$password=htmlspecialchars($this->input->post('password'));
		$ceklogin=$this->login_model->login($username, $password);
		if ($ceklogin != false) {
			foreach ($ceklogin as $row) {
				$this->load->library('session');
				$this->session->set_userdata('id_user', $row->id_user);
				$this->session->set_userdata('username', $row->username);
				$this->session->set_userdata('jabatan', $row->jabatan);

				if($this->session->userdata('jabatan')=='Admin'){
					redirect('admin/home');
				}
				else if($this->session->userdata('jabatan')=='Agendaris Surat'){
					redirect('agendaris/home');
				}
				else if($this->session->userdata('jabatan')=='Sekretaris'){
					redirect('sekretaris/home');
				}
				else if($this->session->userdata('jabatan')=='Konseptor'){
					redirect('konsepsurat/home');
				}
			}
		}
		else{
				$this->load->view('login/index');
				$this->session->set_flashdata('pesan','Username dan Password Anda salah');
				redirect('login/login');
			}
	}
	
}
?>

