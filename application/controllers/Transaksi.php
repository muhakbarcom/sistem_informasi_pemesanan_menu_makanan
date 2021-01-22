<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('MTransaksi', 'Mmenu', 'MUser', 'MKategori'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi/index.html';
            $config['first_url'] = base_url() . 'transaksi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MTransaksi->total_rows($q);
        $transaksi = $this->MTransaksi->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_data' => $transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('transaksi/transaksi_list', $data);
        $data['page'] = 'transaksi/transaksi_list';
        $this->load->view('template', $data);
    }

    public function read($id)
    {
        $row = $this->MTransaksi->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'kode_menu' => $row->kode_menu,
                'username' => $row->username,
                'tanggal_trx' => $row->tanggal_trx,
                'status' => $row->status,
                'jumlah' => $row->jumlah,
            );
            // $this->load->view('transaksi/transaksi_read', $data);
            $data['page'] = 'transaksi/transaksi_read';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/create_action'),
            'id' => set_value('id'),
            'kode_menu' => set_value('kode_menu'),
            'username' => set_value('username'),
            'tanggal_trx' => set_value('tanggal_trx'),
            'jumlah' => set_value('jumlah'),
            'status' => set_value('status'),
        );
        $this->load->view('transaksi/transaksi_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kode_menu' => $this->input->post('kode_menu', TRUE),
                'username' => $this->input->post('username', TRUE),
                'jumlah' => $this->input->post('jumlah', TRUE),
                'tanggal_trx' => $this->input->post('tanggal_trx', TRUE),
                'status' => $this->input->post('status', TRUE),
            );

            $this->MTransaksi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }

    public function update($id)
    {
        $row = $this->MTransaksi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
                'id' => set_value('id', $row->id),
                'kode_menu' => set_value('kode_menu', $row->kode_menu),
                'username' => set_value('username', $row->username),
                'jumlah' => set_value('jumlah', $row->jumlah),
                'tanggal_trx' => set_value('tanggal_trx', $row->tanggal_trx),
                'status' => set_value('status', $row->status),
            );
            // $this->load->view('transaksi/transaksi_form', $data);

            $data['page'] = 'transaksi/transaksi_form';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'kode_menu' => $this->input->post('kode_menu', TRUE),
                'username' => $this->input->post('username', TRUE),
                'jumlah' => $this->input->post('jumlah', TRUE),
                'tanggal_trx' => $this->input->post('tanggal_trx', TRUE),
                'status' => $this->input->post('status', TRUE),
            );

            $this->MTransaksi->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }

    public function delete($id)
    {
        $row = $this->MTransaksi->get_by_id($id);

        if ($row) {
            $this->MTransaksi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_menu', 'kode menu', 'trim|required');
        $this->form_validation->set_rules('username', 'nomor anggota', 'trim|required');
        $this->form_validation->set_rules('tanggal_trx', 'tanggal pinjam', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "transaksi.xls";
        $judul = "transaksi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode menu");
        xlsWriteLabel($tablehead, $kolomhead++, "Nomor Anggota");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Trx");
        xlsWriteLabel($tablehead, $kolomhead++, "Status");

        foreach ($this->MTransaksi->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->kode_menu);
            xlsWriteLabel($tablebody, $kolombody++, $data->username);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_trx);
            xlsWriteLabel($tablebody, $kolombody++, $data->status);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function trx()
    {
        $submit = $this->input->post('submit', TRUE);
        if ($submit) {

            //tambah tanggal
            // $lama_pinjam = 7;
            $sekarang = date('Y-m-d H:i:s');
            //$tanggal_kembali = date('Y-m-d H-i-s', strtotime('+7 days'));
            $data = array(
                'kode_menu' => $this->input->post('kode_menu', TRUE),
                'username' => $this->input->post('username', TRUE),
                'jumlah' => $this->input->post('jumlah', TRUE),
                'tanggal_trx' => $sekarang,
            );

            $this->MTransaksi->insert($data);
            $this->session->set_flashdata('message', 'Pesanan Berhasil!');
            redirect(site_url('transaksi/trx'));
        }
        $data['list_trx'] = $this->MTransaksi->get_all();
        $data['list_menu'] = $this->Mmenu->get_all();
        $data['list_pembeli'] = $this->MUser->get_all();
        $data['list_kategori'] = $this->MKategori->get_all();
        $data['page'] = 'transaksi/transaksi_view';
        $this->load->view('template', $data);
    }
    // public function kembali($id_trx)
    // {
    //     if ($id_trx) {
    //         $data = array(

    //             'tanggal_kembali' => date('Y-m-d H-i-s'),
    //             'status' => 'Kembali',

    //         );

    //         $this->MTransaksi->update($id_trx, $data);
    //         $this->session->set_flashdata('message', 'Update Record Success');
    //         redirect(site_url('transaksi/pinjam'));
    //     }
    // }
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-23 16:29:48 */
/* http://harviacode.com */