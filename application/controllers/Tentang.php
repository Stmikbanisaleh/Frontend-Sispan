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
        $this->load->view('tentang', $data);
        $this->load->view('template/footer', $data);
    }

    public function save_message()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Pesan', 'required');

        if ($this->form_validation->run($this) == false) {
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
            $this->load->view('tentang', $data);
            $this->load->view('template/footer', $data);
        } else {
            $data_input = [
                'token' => TOKEN,
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'subject' => htmlspecialchars($this->input->post('subject', true)),
                'message' => htmlspecialchars($this->input->post('message', true)),
                'date' => date('Y-m-d h:i:s')
            ];
            $input = $this->lapan_api_library->call('visitormessage/addmessage', $data_input);

            $this->m_tentang->saveMessage();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Pesan telah dikirim!</div>');
            redirect('tentang');
        }
    }
}
