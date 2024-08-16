<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\TravelModel;

class Atravel extends BaseController
{
    public $travelModel;
    public $db;

    public function __construct(){
        $this->travelModel = new TravelModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $data['sidebar'] = "travel";
        $data['title'] = "List Travel";
        $data['deskripsi'] = "List seluruh data travel";

        return view('agent_area/pages/travel', $data);
    }

    public function getData($pk_id_travel)
    {
        $data = $this->db->query("
            SELECT
                pk_id_travel,
                nama_travel,
                nama_perusahaan,
                nama_pemilik,
                unit,
                alamat,
                kelurahan,
                kecamatan,
                kota_kabupaten,
                provinsi,
                link_landing_page,
                tgl_bergabung,
                ppiu,
                pihk,
                bank_rekening,
                no_rekening
            FROM travel
            WHERE pk_id_travel = $pk_id_travel
        ")->getRowArray();
        return json_encode($data);
    }

    public function getList()
    {
        $query = "
            CREATE TEMPORARY TABLE Listtravel AS
            SELECT
                pk_id_travel,
                company_profile,
                tgl_bergabung,
                nama_travel,
                unit,
                kota_kabupaten,
                link_landing_page,
                nama_pemilik,
                DATE_FORMAT(tgl_bergabung, '%d-%m-%Y') as tgl_bergabung_formatted
            FROM travel a
            WHERE a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL;
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('Listtravel');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listtravel");
        return DataTable::of($builder)->toJson(true);
    }
}
