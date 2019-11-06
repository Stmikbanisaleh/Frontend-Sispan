<?php

defined('BASEPATH') or exit('No direct script access allowed!');

class Sertifikasi_model extends CI_Model
{
    public function getSertifikasi($no)
    {
        return $this->db->get_where('sertifikasi', array('no_sertifikasi' => $no))->row_array();
    }
}
