<?php
class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Muser');
  }

  public function index()
  {
    $this->load->view('login_view');
  }

  public function validasi()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if ($this->Muser->CheckUser($username, $password) == true) {
      $row = $this->Muser->get_all_by_username($username);
      // print_r($row);
      $data_user = array(
        'username' => $username,
        'nama_lengkap' => $row->nama_lengkap,
        'hak_akses' => $row->hak_akses,
        'is_login' => true
      );

      $this->session->set_userdata($data_user);
      redirect('Dashboard');
      exit;
    } else {
      $this->session->set_flashdata('pesan', 'Username atau Password Anda salah');
      redirect('Login');
    }
    exit;
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('Login');
  }
}
