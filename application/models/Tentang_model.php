<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang_model extends CI_Model
{

    public function saveMessage()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'subject' => htmlspecialchars($this->input->post('subject', true)),
            'message' => htmlspecialchars($this->input->post('message', true)),
            'date' => date('Y-m-d h:i:s')
        ];
        $this->db->insert('visitor_message', $data);
    }
}
