<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\InformasiModel;

class Ainformasi extends BaseController
{
    public $informasiModel;
    public $db;
    public $ses_tipe_agent;

    public function __construct(){
        $this->informasiModel = new InformasiModel();
        $this->db = db_connect();
        $this->ses_tipe_agent = session()->get('tipe_agent');
    }

    public function index(){
        $data['sidebar'] = "pengumuman";
        $data['title'] = "Pengumuman";

        return view('agent_area/pages/pengumuman', $data);
    }

    public function getAllInformasi()
    {
        $data = $this->informasiModel->orderby('urutan')->findAll();

        $data = $this->db->query("
            SELECT
            *
            FROM 
            informasi a
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND (akses_informasi = 'semua agent' OR akses_informasi LIKE '%$this->ses_tipe_agent%')
        ")->getResultArray();
        
        return json_encode($data);
    }
}