<?php

defined('BASEPATH') or exit('No direct script access allowed!');

class Tentang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Menu_model', 'm_menu');
        $this->load->model('Footer_model', 'm_footer');
        $this->load->model('Tentang_model', 'm_tentang');
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->m_menu->getMenu();
        $data['submenu'] = $this->m_menu->getSubMenu();

        $data['link'] = $this->m_footer->getLink();
        $data['akses'] = $this->m_footer->getAkses();

        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('tentang', $data);
        $this->load->view('template/footer', $data);
    }

    public function save_message()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Pesan', 'required');

        if ($this->form_validation->run($this) == false) {
            $data['menu'] = $this->m_menu->getMenu();
            $data['submenu'] = $this->m_menu->getSubMenu();

            $data['link'] = $this->m_footer->getLink();
            $data['akses'] = $this->m_footer->getAkses();

            $data['uri'] = $this->uri->segment(1);

            $this->load->view('template/header', $data);
            $this->load->view('tentang', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->m_tentang->saveMessage();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Pesan telah dikirim!</div>');
            redirect('tentang');
        }
    }
}
