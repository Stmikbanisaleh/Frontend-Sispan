<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Panduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'm_menu');
        $this->load->model('Footer_model', 'm_footer');
        $this->load->model('Panduan_model', 'm_panduan');
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->m_menu->getMenu();
        $data['submenu'] = $this->m_menu->getSubMenu();

        $data['dokpanduan'] = $this->m_panduan->getDokumen();

        $data['link'] = $this->m_footer->getLink();
        $data['akses'] = $this->m_footer->getAkses();

        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('panduan', $data);
        $this->load->view('template/footer', $data);
    }
}
