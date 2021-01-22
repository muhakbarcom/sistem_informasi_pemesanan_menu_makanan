<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model(array('Mtransaksi', 'MUser', 'MMenu'));
  }
  public function index()
  {
    $data['page'] = 'dashboard_view';
    $data['sumTrx'] = $this->Mtransaksi->get_sum();
    $data['countTrx'] = $this->Mtransaksi->get_count();
    $data['countUsr'] = $this->MUser->get_count();
    $data['countMenu'] = $this->MMenu->get_count();
    $this->load->view('template', $data);
    //$this->load->view('dashboard_view');
  }
}
