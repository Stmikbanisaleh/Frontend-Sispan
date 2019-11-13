<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', 'm_home');
        $this->load->model('Menu_model', 'm_menu');
        $this->load->model('Footer_model', 'm_footer');
    }

    public function index()
    {

        $data['user'] = $this->lapan_api_library->call3('users/getuserbyemail', ['token' => TOKEN, $this->session->userdata('email')]);

        $hasil_listberita = $this->lapan_api_library->call('berita/getlistberita', ['token' => TOKEN]);
        $data['berita'] = $hasil_listberita['rows'];

        $hasil_listagenda = $this->lapan_api_library->call('agenda/getlistagendalimit3', ['token' => TOKEN]);
        $data['agenda'] = $hasil_listagenda['rows'];

         //=============================================================================================================================//

        $data['uri'] = $this->uri->segment(1);

        $getlistlink = $this->lapan_api_library->call('link/getlink', ['token' => TOKEN]);
        $data['link'] = $getlistlink['rows'];

        $getaksescepat = $this->lapan_api_library->call('aksescepat/getaksescepat', ['token' => TOKEN]);
        $data['akses'] = $getaksescepat['rows'];

        $data_menuwhere = [
            'token' => TOKEN,
            'id_parent' => '',
            'id_posisi' => 1
        ];
        $getmenuwhere = $this->lapan_api_library->call('menu/getmenuwhere', $data_menuwhere);
        $data['menu'] = $getmenuwhere['rows'];

        $getmenu = $this->lapan_api_library->call('menu/getmenu', ['token' => TOKEN]);
        $data['submenu'] = $getmenu['rows'];

        // $data['user'] = $this->db->get_where('msuser', ['email' =>
        // $this->session->userdata('email')])->row_array();

        // $data['berita'] = $this->m_home->getListBerita();
        // $data['agenda'] = $this->m_home->getListAgenda();
        $data['ksispan'] = $this->m_home->getKegiatanSispan();

        // $data['menu'] = $this->m_menu->getMenu();
        // $data['submenu'] = $this->m_menu->getSubMenu();

        // $data['link'] = $this->m_footer->getLink();
        // $data['akses'] = $this->m_footer->getAkses();

        // $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('home', $data);
        $this->load->view('template/footer', $data);
    }
}
