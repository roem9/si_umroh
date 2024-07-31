<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\AgentModel;

class Agent extends BaseController
{
    public $agentModel;
    public $db;

    public function __construct(){
        $this->agentModel = new AgentModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $data['sidebar'] = "agent";
        $data['collapse'] = "agent";
        $data['collapseItem'] = 'listAgent';
        $data['title'] = "List Agent";
        $data['deskripsi'] = "List Seluruh Agent";

        return view('admin/pages/agent', $data);
    }

    public function leaderAgent()
    {
        $data['sidebar'] = "agent";
        $data['collapse'] = "agent";
        $data['collapseItem'] = 'listLeaderAgent';
        $data['title'] = "List Leader Agent";
        $data['deskripsi'] = "List Seluruh Leader Agent";

        return view('admin/pages/leader-agent', $data);
    }

    public function konfirmasi()
    {
        $data['sidebar'] = "agent";
        $data['collapse'] = "agent";
        $data['collapseItem'] = 'listKonfirmasiAgent';
        $data['title'] = "List Konfirmasi Agent";
        $data['deskripsi'] = "List agent yang membutuhkan konfirmasi";

        return view('admin/pages/konfirmasi-agent', $data);
    }

    public function lengkapiDataAgent($pk_id_agent){
        $data['title'] = 'Lengkapi Data';
        $data['agent'] = $this->agentModel->where('MD5(pk_id_agent)', $pk_id_agent)->first();

        $data['message'] = $this->db->query("
            SELECT 
                *
            FROM system_parameter
            WHERE setting_name = 'message_success_agent'
        ")->getRowArray();

        if($data['agent']['username'] === null || $data['agent']['username'] === ''){
            return view('admin/pages/form-agent', $data);
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function area($pk_id_agent){
        $session = session();

        $data = $this->agentModel->find($pk_id_agent);

        $ses_data = [
            'pk_id_agent'       => $data['pk_id_agent'],
            'tipe_agent'       => $data['tipe_agent']
        ];
        $session->set($ses_data);

        return redirect()->to(base_url('/agentarea/home'));

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        // CURLOPT_URL => 'https://api.fonnte.com/send',
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => '',
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 0,
        // CURLOPT_FOLLOWLOCATION => true,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => 'POST',
        // CURLOPT_POSTFIELDS => array(
        // 'target' => '081222739243',
        // 'message' => 'https://mentoringumroh.com/jadi-agent/', 
        // // 'countryCode' => '62', //optional
        // ),
        // CURLOPT_HTTPHEADER => array(
        //     'Authorization: Fh5tkS-sfipZx@#nF+sE' //change TOKEN to your actual token
        // ),
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        // echo $response;
    }

    public function getList()
    {
        $query = "
            CREATE TEMPORARY TABLE ListData AS
            SELECT
                a.*,
                b.nama_agent as leader_agent
            FROM agent a
            LEFT JOIN agent b ON a.fk_id_leader_agent = b.pk_id_agent
            WHERE a.tipe_agent != 'leader agent'
            AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND a.confirmed_at IS NOT NULL;
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

    public function getListLeaderAgent()
    {
        $query = "
            CREATE TEMPORARY TABLE jumlahAgent AS
            SELECT 
                fk_id_leader_agent,
                SUM(CASE WHEN tipe_agent = 'silver' THEN 1 ELSE 0 END) AS agent_silver,
                SUM(CASE WHEN tipe_agent = 'gold' THEN 1 ELSE 0 END) AS agent_gold,
                COUNT(*) AS agent_total
            FROM agent
            WHERE fk_id_leader_agent IS NOT NULL
            AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            AND confirmed_at IS NOT NULL
            GROUP BY fk_id_leader_agent;

            CREATE TEMPORARY TABLE ListData AS
            SELECT
                a.*,
                COALESCE(b.agent_silver, 0) AS agent_silver,
                COALESCE(b.agent_gold, 0) AS agent_gold,
                COALESCE(b.agent_total, 0) AS agent_total
            FROM agent a
            LEFT JOIN jumlahAgent b ON a.pk_id_agent = b.fk_id_leader_agent
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND a.tipe_agent = 'leader agent'
            AND a.confirmed_at IS NOT NULL;
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

    public function getListKonfirmasi()
    {
        $query = "
            CREATE TEMPORARY TABLE ListData AS
            SELECT
                a.*,
                b.nama_agent as leader_agent
            FROM agent a
            LEFT JOIN agent b ON a.fk_id_leader_agent = b.pk_id_agent
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND a.confirmed_at IS NULL;
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

    public function save()
    {
        $data = [
            'kode_agent' => $this->request->getPost('kode_agent'),
            'tipe_agent' => $this->request->getPost('tipe_agent'),
            'nama_agent' => $this->request->getPost('nama_agent'),
            'gender' => $this->request->getPost('gender'),
            't4_lahir' => $this->request->getPost('t4_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'no_wa' => $this->request->getPost('no_wa'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kota_kabupaten' => $this->request->getPost('kota_kabupaten'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'bank_rekening' => $this->request->getPost('bank_rekening'),
            'no_rekening' => $this->request->getPost('no_rekening'),
            'username' => $this->request->getPost('username'),
            'batch' => $this->request->getPost('batch'),
        ];

        if($data['tipe_agent'] == 'leader agent') {
            $data['fk_id_leader_agent'] = NULL;
        }

        $pk_id_agent = $this->request->getPost('pk_id_agent');

        $searchAgent = $this->agentModel->find($pk_id_agent);
        if ($searchAgent) {

            $this->agentModel->setValidationRule('username', "required|regex_match[/^[a-z0-9]+$/]|is_unique[agent.username,pk_id_agent,$pk_id_agent]");
            $this->agentModel->setValidationMessage('username', [
                'required' => 'username harus diisi',
                'regex_match' => 'Username hanya boleh mengandung huruf kecil, angka, dan tidak boleh ada spasi.',
                'is_unique' => 'username telah digunakan, gunakan username yang lain',
            ]);


            if($this->agentModel->update($pk_id_agent, $data) === true){
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil mengubah data agent'
                ];
            } else {
                $response = [
                    "error" => $this->agentModel->errors()
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'terjadi kesalahan, silakan muat ulang halaman'
            ];
        }

        return json_encode($response);
    }

    public function getData($pk_id_agent)
    {
        // $data = $this->agentModel->find($pk_id_agent);
        $data = $this->db->query("
            SELECT 
                a.*,
                b.nama_agent as leader_agent
            FROM agent a 
            LEFT JOIN agent b ON a.fk_id_leader_agent = b.pk_id_agent
            WHERE a.pk_id_agent = $pk_id_agent
        ")->getRowArray();
        return json_encode($data);
    }

    public function delete($pk_id_agent)
    {
        if($this->agentModel->delete($pk_id_agent) === true){
            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data'
            ];
        }

        return json_encode($response);
    }

    public function konfirmasiAgent()
    {
        $pk_id_agent = $this->request->getPost('pk_id_agent');
        $data = [
            'confirmed_at' => date('Y-m-d')
        ];


        if($this->agentModel->update($pk_id_agent, $data) === true){
            $response = [
                'status' => 'success',
                'message' => 'Berhasil mengkonfirmasi agent'
            ];

            $agent = $this->agentModel->find($pk_id_agent);

            $messageData = $this->db->query("
                SELECT 
                    *
                FROM system_parameter
                WHERE setting_name = 'wa_message_konfirmasi_agent'
            ")->getRowArray();

            $replace = [
                '$nama_agent$' => $agent['nama_agent'],
                '$link_data$' => base_url()."/lengkapidataagent/".md5($agent['pk_id_agent'])
            ];

            $message = str_replace(array_keys($replace), array_values($replace), $messageData['setting_value']);

            send_wa($agent['no_wa'], $message);
            
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal mengkonfirmasi agent'
            ];
        }

        return json_encode($response);
    }

    public function confirmAll(){
        $data['confirmed_at'] = date('Y-m-d');

        if($this->agentModel->where([
            'confirmed_at' => NULL,
            'deleted_at' => NULL
        ])->set($data)->update() === true){
            $response = [
                'status' => 'success',
                'message' => 'Berhasil mengkonfirmasi seluruh agent'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal mengkonfirmasi seluruh agent'
            ];
        }

        return json_encode($response);
    }

    public function getAllLeaderAgent($leader_agent){

        $data = $this->agentModel->where('tipe_agent', 'leader agent')->like('nama_agent', $leader_agent)->orderby('nama_agent','asc')->find();

        echo json_encode($data);
    }

    public function saveChangeLeader(){
        // $this->agentModel->setValidationRule('fk_id_leader_agent', "required");
        // $this->agentModel->setValidationMessage('fk_id_leader_agent', [
        //     'fk_id_leader_agent' => 'Nama Leader Agent harus dipilih'
        // ]);

        $pk_id_agent = $this->request->getPost('pk_id_agent');
        $fk_id_leader_agent = $this->request->getPost('fk_id_leader_agent');

        $data = [
            'fk_id_leader_agent' => $fk_id_leader_agent
        ];

        if($this->agentModel->update($pk_id_agent, $data) === true){
            $response = [
                'status' => 'success',
                'message' => 'Berhasil mengubah leader dari agent'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal mengubah leader dari agent'
            ];
        }

        return json_encode($response);
    }

    public function saveData()
    {

        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');

        $data = [
            'nama_agent' => $this->request->getPost('nama_agent'),
            'gender' => $this->request->getPost('gender'),
            't4_lahir' => $this->request->getPost('t4_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'no_wa' => $this->request->getPost('no_wa'),
            'email' => $this->request->getPost('email'),
            'bank_rekening' => $this->request->getPost('bank_rekening'),
            'no_rekening' => $this->request->getPost('no_rekening'),
            'alamat' => $this->request->getPost('alamat'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kota_kabupaten' => $this->request->getPost('kota_kabupaten'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        if($password != $confirm_password){
            $response['error'] = [
                "password" => 'password tidak sama dengan konfirmasi password',
                "confirm_password" => 'Konfirmasi password tidak sama dengan konfirmasi password',
            ];

            return json_encode($response);
        }

        $pk_id_agent = $this->request->getPost('pk_id_agent');

        $searchAgent = $this->agentModel->find($pk_id_agent);
        if ($searchAgent) {

            $this->agentModel->setValidationRule('username', "required|regex_match[/^[a-z0-9]+$/]|is_unique[agent.username,pk_id_agent,$pk_id_agent]");
            $this->agentModel->setValidationMessage('username', [
                'required' => 'username harus diisi',
                'regex_match' => 'Username hanya boleh mengandung huruf kecil, angka, dan tidak boleh ada spasi.',
                'is_unique' => 'username telah digunakan, gunakan username yang lain',
            ]);

            $this->agentModel->setValidationRule('password', "required");
            $this->agentModel->setValidationMessage('password', [
                'required' => 'password harus diisi'
            ]);

            if($this->agentModel->update($pk_id_agent, $data) === true){
                // $response = [
                //     'status' => 'success',
                //     'message' => 'Berhasil mengubah data agent'
                // ];

                $messageData = $this->db->query("
                    SELECT 
                        *
                    FROM system_parameter
                    WHERE setting_name = 'wa_message_success_agent'
                ")->getRowArray();

                $replace = [
                    '$nama_agent$' => $this->request->getPost('nama_agent'),
                    '$link_agent$' => base_url('login'),
                    '$username$' => $this->request->getPost('username'),
                    '$password$' => $password
                ];

                // Replace placeholders with actual values
                $message = str_replace(array_keys($replace), array_values($replace), $messageData['setting_value']);

                $response = send_wa($this->request->getPost('no_wa'), $message);
            } else {
                $response = [
                    "error" => $this->agentModel->errors()
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'terjadi kesalahan, silakan muat ulang halaman'
            ];
        }

        return json_encode($response);
    }
}
