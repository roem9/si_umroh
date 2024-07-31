<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\AgentModel;

class Aagent extends BaseController
{
    public $agentModel;
    public $ses_pk_id_agent;
    public $db;

    public function __construct(){
        $this->agentModel = new AgentModel();
        $this->db = db_connect();
        $this->ses_pk_id_agent = session()->get('pk_id_agent');
    }

    public function index()
    {
        $data['sidebar'] = "agent";
        $data['title'] = "List Agent";
        $data['deskripsi'] = "List Seluruh Agent";

        return view('agent_area/pages/agent', $data);
    }

    public function getList()
    {
        $query = "
            CREATE TEMPORARY TABLE ListData AS
            SELECT
                a.pk_id_agent,
                a.kode_agent,
                a.nama_agent,
                a.no_wa,
                a.tipe_agent,
                b.nama_agent as leader_agent
            FROM agent a
            LEFT JOIN agent b ON a.fk_id_leader_agent = b.pk_id_agent
            WHERE a.tipe_agent != 'leader agent'
            AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND a.confirmed_at IS NOT NULL
            AND a.fk_id_leader_agent = $this->ses_pk_id_agent;
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('ListData');
        return DataTable::of($builder)->toJson(true);
    }

    public function getData($pk_id_agent)
    {
        // $data = $this->agentModel->find($pk_id_agent);
        $data = $this->db->query("
            SELECT 
                a.pk_id_agent,
                a.kode_agent,
                a.nama_agent,
                a.gender,
                a.t4_lahir,
                a.tgl_lahir,
                a.no_wa,
                a.email,
                a.alamat,
                a.kelurahan,
                a.kecamatan,
                a.kota_kabupaten,
                a.provinsi,
                a.bank_rekening,
                a.no_rekening,
                a.tipe_agent,
                a.tgl_bergabung,
                b.nama_agent as leader_agent
            FROM agent a 
            LEFT JOIN agent b ON a.fk_id_leader_agent = b.pk_id_agent
            WHERE a.pk_id_agent = $pk_id_agent
        ")->getRowArray();
        return json_encode($data);
    }
}