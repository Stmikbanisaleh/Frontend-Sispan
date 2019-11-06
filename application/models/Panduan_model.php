<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Panduan_model extends CI_Model
{
    public function getDokumen()
    {
        return $this->db->get('dokumen_panduan')->result_array();
    }
}
