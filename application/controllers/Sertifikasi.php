<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Menu_model', 'm_menu');
        $this->load->model('Footer_model', 'm_footer');
        $this->load->model('Sertifikasi_model', 'm_sertifikasi');
    }

    public function index()
    {
        $data['menu'] = $this->m_menu->getMenu();
        $data['submenu'] = $this->m_menu->getSubMenu();

        $data['link'] = $this->m_footer->getLink();
        $data['akses'] = $this->m_footer->getAkses();

        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('template/footer', $data);
    }

    public function cek_sertifikasi()
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->m_menu->getMenu();
        $data['submenu'] = $this->m_menu->getSubMenu();

        $data['link'] = $this->m_footer->getLink();
        $data['akses'] = $this->m_footer->getAkses();

        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('cek_sertifikasi', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail_sertifikasi()
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('no_sertifikasi', 'Nomor Sertifikasi', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['menu'] = $this->m_menu->getMenu();
            $data['submenu'] = $this->m_menu->getSubMenu();

            $data['link'] = $this->m_footer->getLink();
            $data['akses'] = $this->m_footer->getAkses();

            $data['uri'] = $this->uri->segment(1);

            $this->load->view('template/header', $data);
            $this->load->view('cek_sertifikasi', $data);
            $this->load->view('template/footer', $data);
        } else {
            $data['menu'] = $this->m_menu->getMenu();
            $data['submenu'] = $this->m_menu->getSubMenu();

            $data['link'] = $this->m_footer->getLink();
            $data['akses'] = $this->m_footer->getAkses();

            $data['uri'] = $this->uri->segment(1);

            $no = $this->input->post('no_sertifikasi');
            $data['sertifikasi'] = $this->m_sertifikasi->getSertifikasi($no);

            $this->load->view('template/header', $data);
            $this->load->view('detail_sertifikasi', $data);
            $this->load->view('template/footer', $data);
        }
    }
}
