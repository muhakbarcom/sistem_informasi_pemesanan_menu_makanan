<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mmenu', 'MKategori'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'menu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menu/index.html';
            $config['first_url'] = base_url() . 'menu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mmenu->total_rows($q);
        $menu = $this->Mmenu->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menu_data' => $menu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'menu/menu_list';
        $this->load->view('template', $data);
        //$this->load->view('menu/menu_list', $data);
    }

    public function read($id)
    {
        $row = $this->Mmenu->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama' => $row->nama,
                'harga' => $row->harga,
                'kategori_id' => $row->kategori_id,
                'kode_menu' => $row->kode_menu,
            );
            $data['page'] = 'menu/menu_read';
            $this->load->view('template', $data);
            //$this->load->view('menu/menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
            'id' => set_value('id'),
            'nama' => set_value('nama'),
            'harga' => set_value('harga'),
            'kategori_id' => set_value('kategori_id'),
            'kode_menu' => set_value('kode_menu'),
        );
        //mengambil data kategori menu
        $data['list_kategori'] = $this->MKategori->get_all();
        $data['page'] = 'menu/menu_form';
        $this->load->view('template', $data);
        //$this->load->view('menu/menu_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'kategori_id' => $this->input->post('kategori_id', TRUE),
                'kode_menu' => $this->input->post('kode_menu', TRUE),
            );

            $this->Mmenu->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu'));
        }
    }

    public function update($id)
    {
        $row = $this->Mmenu->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
                'id' => set_value('id', $row->id),
                'nama' => set_value('nama', $row->nama),
                'harga' => set_value('harga', $row->harga),
                'kategori_id' => set_value('kategori_id', $row->kategori_id),
                'kode_menu' => set_value('kode_menu', $row->kode_menu),
            );
            $data['list_kategori'] = $this->MKategori->get_all();
            $data['page'] = 'menu/menu_form';
            $this->load->view('template', $data);
            //$this->load->view('menu/menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'harga' => $this->input->post('harga', TRUE),
                'kategori_id' => $this->input->post('kategori_id', TRUE),
                'kode_menu' => $this->input->post('kode_menu', TRUE),
            );

            $this->Mmenu->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mmenu->get_by_id($id);

        if ($row) {
            $this->Mmenu->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('kategori_id', 'kategori id', 'trim|required');
        $this->form_validation->set_rules('kode_menu', 'kode menu', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "menu.xls";
        $nama = "menu";
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
        xlsWriteLabel($tablehead, $kolomhead++, "nama");
        xlsWriteLabel($tablehead, $kolomhead++, "harga");
        xlsWriteLabel($tablehead, $kolomhead++, "Kategori Id");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode menu");

        foreach ($this->Mmenu->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->harga);
            xlsWriteNumber($tablebody, $kolombody++, $data->kategori_id);
            xlsWriteLabel($tablebody, $kolombody++, $data->kode_menu);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-23 16:29:13 */
/* http://harviacode.com */