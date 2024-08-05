<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgentModel;

class Registrasiulangagent extends BaseController
{
    public $agentModel;
    public $db;

    public function __construct(){
        $this->agentModel = new AgentModel();
        $this->db = db_connect();
    }

    public function index(){
        $data['title'] = 'Registrasi Agent';

        $data['message'] = $this->db->query("
            SELECT 
                *
            FROM system_parameter
            WHERE setting_name = 'message_success_agent'
        ")->getRowArray();

        return view('admin/pages/form-registrasi-ulang-agent', $data);
    }

    public function searchAgent(){
        $no_wa = $this->request->getPost('no_wa');

        $agent = $this->db->query("
            SELECT
                *
            FROM agent
            WHERE no_wa = '$no_wa'
        ")->getRowArray();

        $data_peminat = $this->db->query("
            SELECT
                b.nama_customer,
                a.nama_produk
            FROM penjualan_produk a
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND (b.deleted_at = '0000-00-00 00:00:00' OR b.deleted_at IS NULL)
            AND (a.fk_id_agent = $agent[pk_id_agent] OR a.fk_id_leader_agent = $agent[pk_id_agent])
        ")->getResultArray();

        if($agent['username'] != ''){
            $response = [
                'status' => 'success',
                'message' => 'Data Anda telah diregistrasi ulang. Silakan hubungi admin',
                'data' => $agent,
            ];
        } else if($agent){
            $response = [
                'status' => 'success',
                'message' => 'Data Anda ditemukan',
                'data' => $agent,
                'agent_area' => $agent['area_status'],
                'data_peminat' => $data_peminat,
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Agent tidak ditemukan',
                'error' => 1
            ];
        }

        return json_encode($response);
    }
}
