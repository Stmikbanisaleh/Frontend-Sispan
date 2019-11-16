<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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

        $data_menuwhere = [
            'token' => TOKEN,
            'id_parent' => '',
            'id_posisi' => 3
        ];
        $getmenuwhere = $this->lapan_api_library->call('menu/getmenuwhere', $data_menuwhere);
        $data['menu'] = $getmenuwhere['rows'];

        $getmenu = $this->lapan_api_library->call('menu/getmenu', ['token' => TOKEN]);
        $data['submenu'] = $getmenu['rows'];

        $this->load->view('template/header', $data);
        $this->load->view('template/footer', $data);
    }

    public function cek_sertifikasi()
    {
        $data['user'] = $this->lapan_api_library->call3('users/getuserbyemail', ['token' => TOKEN, $this->session->userdata('email')]);

        //=============================================================================================================================//

        $data['uri'] = $this->uri->segment(1);

        $getlistlink = $this->lapan_api_library->call('link/getlink', ['token' => TOKEN]);
        $data['link'] = $getlistlink['rows'];

        $getaksescepat = $this->lapan_api_library->call('aksescepat/getaksescepat', ['token' => TOKEN]);
        $data['akses'] = $getaksescepat['rows'];

        $data_menuwhere = [
            'token' => TOKEN,
            'id_parent' => '',
            'id_posisi' => 3
        ];
        $getmenuwhere = $this->lapan_api_library->call('menu/getmenuwhere', $data_menuwhere);
        $data['menu'] = $getmenuwhere['rows'];

        $getmenu = $this->lapan_api_library->call('menu/getmenu', ['token' => TOKEN]);
        $data['submenu'] = $getmenu['rows'];

        $this->load->view('template/header', $data);
        $this->load->view('cek_sertifikasi', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail_sertifikasi()
    {
        $data['user'] = $this->lapan_api_library->call3('users/getuserbyemail', ['token' => TOKEN, $this->session->userdata('email')]);

        $this->form_validation->set_rules('no_sertifikasi', 'Nomor Sertifikasi', 'required');

        if ($this->form_validation->run($this) == false) {
            //=============================================================================================================================//

            $data['uri'] = $this->uri->segment(1);

            $getlistlink = $this->lapan_api_library->call('link/getlink', ['token' => TOKEN]);
            $data['link'] = $getlistlink['rows'];

            $getaksescepat = $this->lapan_api_library->call('aksescepat/getaksescepat', ['token' => TOKEN]);
            $data['akses'] = $getaksescepat['rows'];

            $data_menuwhere = [
                'token' => TOKEN,
                'id_parent' => '',
                'id_posisi' => 3
            ];
            $getmenuwhere = $this->lapan_api_library->call('menu/getmenuwhere', $data_menuwhere);
            $data['menu'] = $getmenuwhere['rows'];

            $getmenu = $this->lapan_api_library->call('menu/getmenu', ['token' => TOKEN]);
            $data['submenu'] = $getmenu['rows'];

            $this->load->view('template/header', $data);
            $this->load->view('cek_sertifikasi', $data);
            $this->load->view('template/footer', $data);
        } else {
            //=============================================================================================================================//

            $data['uri'] = $this->uri->segment(1);

            $getlistlink = $this->lapan_api_library->call('link/getlink', ['token' => TOKEN]);
            $data['link'] = $getlistlink['rows'];

            $getaksescepat = $this->lapan_api_library->call('aksescepat/getaksescepat', ['token' => TOKEN]);
            $data['akses'] = $getaksescepat['rows'];

            $data_menuwhere = [
                'token' => TOKEN,
                'id_parent' => '',
                'id_posisi' => 3
            ];
            $getmenuwhere = $this->lapan_api_library->call('menu/getmenuwhere', $data_menuwhere);
            $data['menu'] = $getmenuwhere['rows'];

            $getmenu = $this->lapan_api_library->call('menu/getmenu', ['token' => TOKEN]);
            $data['submenu'] = $getmenu['rows'];

            $no = $this->input->post('no_sertifikasi');
            $data['sertifikasi'] = $this->m_sertifikasi->getSertifikasi($no);

            $this->load->view('template/header', $data);
            $this->load->view('detail_sertifikasi', $data);
            $this->load->view('template/footer', $data);
        }
    }
}
