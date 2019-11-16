<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Panduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data['user'] = $this->lapan_api_library->call3('users/getuserbyemail', ['token' => TOKEN, $this->session->userdata('email')]);
        
        //=============================================================================================================================//

        $data['uri'] = $this->uri->segment(1);

        $getlistlink = $this->lapan_api_library->call('link/getlink', ['token' => TOKEN]);
        $data['link'] = $getlistlink['rows'];

        $getaksescepat = $this->lapan_api_library->call('aksescepat/getaksescepat', ['token' => TOKEN]);
        $data['akses'] = $getaksescepat['rows'];

        $getKegiatanSispan = $this->lapan_api_library->call('kegiatan/getkegiatansispan', ['token' => TOKEN]);
        $data['ksispan'] = $getKegiatanSispan['rows'][0];

        $data_menuwhere = [
            'token' => TOKEN,
            'id_parent' => '',
            'id_posisi' => 3
        ];
        $getmenuwhere = $this->lapan_api_library->call('menu/getmenuwhere', $data_menuwhere);
        $data['menu'] = $getmenuwhere['rows'];

        $getmenu = $this->lapan_api_library->call('menu/getmenu', ['token' => TOKEN]);
        $data['submenu'] = $getmenu['rows'];

        $get_dokumenpanduan = $this->lapan_api_library->call('panduan/getpanduan', ['token' => TOKEN]);
        $data['dokpanduan'] = $get_dokumenpanduan['rows'];

        $this->load->view('template/header', $data);
        $this->load->view('panduan', $data);
        $this->load->view('template/footer', $data);
    }
}
