<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\AgentModel;

class Aprofile extends BaseController
{
    public $agentModel;
    public $db;
    public $ses_pk_id_agent;

    public function __construct()
    {
        $this->agentModel = new AgentModel();
        $this->db = db_connect();

        $this->ses_pk_id_agent = session()->get('pk_id_agent');
    }

    public function index()
    {
        $data['sidebar'] = "profile";
        $data['title'] = "Profile";

        $data['profile'] = $this->agentModel->find($this->ses_pk_id_agent);

        if ($data['profile']['tipe_agent'] != 'leader agent') {
            if ($data['profile']['fk_id_leader_agent']) {
                $data['leader'] = $this->agentModel->find($data['profile']['fk_id_leader_agent']);
            }

            $data['penjualan_produk'] = $this->db->query("
                SELECT
                    COUNT(*) as closing,
                    SUM(harga_produk) as omset
                FROM penjualan_produk a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.fk_id_agent_closing = $this->ses_pk_id_agent
                AND a.status != 'pending'
            ")->getRowArray();

            $data['penjualan_produk_travel'] = $this->db->query("
                SELECT
                    COUNT(*) as closing,
                    SUM(harga_produk) as omset
                FROM penjualan_produk_travel a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.fk_id_agent_closing = $this->ses_pk_id_agent
                AND a.status != 'pending'
            ")->getRowArray();

            $data['komisi_penjualan_produk'] = $this->db->query("
                SELECT
                    SUM(nominal) as komisi
                FROM komisi_penjualan_produk a
                JOIN penjualan_produk b ON a.fk_id_penjualan_produk = b.pk_id_penjualan_produk
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.fk_id_agent = $this->ses_pk_id_agent
                AND b.status = 'lunas'
            ")->getRowArray();

            $data['komisi_penjualan_produk_travel'] = $this->db->query("
                SELECT
                    SUM(nominal) as komisi
                FROM komisi_penjualan_produk_travel a
                JOIN penjualan_produk_travel b ON a.fk_id_penjualan_produk_travel = b.pk_id_penjualan_produk_travel
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.fk_id_agent = $this->ses_pk_id_agent
                AND b.status = 'lunas'
            ")->getRowArray();

            $data['customer'] = $this->db->query("
                SELECT
                    COUNT(*) as total
                FROM customer 
                WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
                AND (fk_id_agent = $this->ses_pk_id_agent OR fk_id_leader_agent = $this->ses_pk_id_agent)
            ")->getRowArray();

            $data['closing'] = $data['penjualan_produk']['closing'] + $data['penjualan_produk_travel']['closing'];
            $data['komisi'] = $data['komisi_penjualan_produk']['komisi'] + $data['komisi_penjualan_produk_travel']['komisi'];
            $data['omset'] = $data['penjualan_produk']['omset'] + $data['penjualan_produk_travel']['omset'];
        } else {
            $data['penjualan_produk_agent'] = $this->db->query("
                SELECT
                    COUNT(*) as closing,
                    SUM(harga_produk) as omset
                FROM penjualan_produk a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND (a.fk_id_agent IS NOT NULL AND a.fk_id_leader_agent = $this->ses_pk_id_agent)
                AND a.status != 'pending'
            ")->getRowArray();

            $data['penjualan_produk_travel_agent'] = $this->db->query("
                SELECT
                    COUNT(*) as closing,
                    SUM(harga_produk) as omset
                FROM penjualan_produk_travel a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND (a.fk_id_agent IS NOT NULL AND a.fk_id_leader_agent = $this->ses_pk_id_agent)
                AND a.status != 'pending'
            ")->getRowArray();

            // $data['penjualan_produk_leader_agent'] = $this->db->query("
            //     SELECT
            //         COUNT(*) as closing,
            //         SUM(harga_produk) as omset
            //     FROM penjualan_produk a
            //     WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            //     AND (a.fk_id_agent_closing = $this->ses_pk_id_agent AND a.fk_id_agent IS NULL)
            //     AND a.status != 'pending'
            // ")->getRowArray();

            $data['penjualan_produk_leader_agent'] = $this->db->query("
                SELECT
                    COUNT(*) as closing,
                    SUM(harga_produk) as omset
                FROM penjualan_produk a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND (a.fk_id_agent_closing = $this->ses_pk_id_agent OR a.fk_id_agent = $this->ses_pk_id_agent)
                AND a.status != 'pending'
            ")->getRowArray();

            $data['penjualan_produk_travel_leader_agent'] = $this->db->query("
                SELECT
                    COUNT(*) as closing,
                    SUM(harga_produk) as omset
                FROM penjualan_produk_travel a
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND (a.fk_id_agent_closing = $this->ses_pk_id_agent AND a.fk_id_agent IS NULL)
                AND a.status != 'pending'
            ")->getRowArray();

            $data['komisi_penjualan_produk'] = $this->db->query("
                SELECT
                    SUM(nominal) as komisi
                FROM komisi_penjualan_produk a
                JOIN penjualan_produk b ON a.fk_id_penjualan_produk = b.pk_id_penjualan_produk
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.fk_id_agent = $this->ses_pk_id_agent
                AND a.keterangan != 'passive income leader agent'
                AND b.status = 'lunas'
            ")->getRowArray();

            $data['komisi_penjualan_produk_travel'] = $this->db->query("
                SELECT
                    SUM(nominal) as komisi
                FROM komisi_penjualan_produk_travel a
                JOIN penjualan_produk_travel b ON a.fk_id_penjualan_produk_travel = b.pk_id_penjualan_produk_travel
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.fk_id_agent = $this->ses_pk_id_agent
                AND a.keterangan != 'passive income leader agent'
                AND b.status = 'lunas'
            ")->getRowArray();

            $data['passive_income_penjualan_produk'] = $this->db->query("
                SELECT
                    SUM(nominal) as komisi
                FROM komisi_penjualan_produk a
                JOIN penjualan_produk b ON a.fk_id_penjualan_produk = b.pk_id_penjualan_produk
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.fk_id_agent = $this->ses_pk_id_agent
                AND a.keterangan = 'passive income leader agent'
                AND b.status = 'lunas'
            ")->getRowArray();

            $data['passive_income_penjualan_produk_travel'] = $this->db->query("
                SELECT
                    SUM(nominal) as komisi
                FROM komisi_penjualan_produk_travel a
                JOIN penjualan_produk_travel b ON a.fk_id_penjualan_produk_travel = b.pk_id_penjualan_produk_travel
                WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
                AND a.fk_id_agent = $this->ses_pk_id_agent
                AND a.keterangan = 'passive income leader agent'
                AND b.status = 'lunas'
            ")->getRowArray();

            $data['customer'] = $this->db->query("
                SELECT
                    COUNT(*) as total
                FROM customer 
                WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
                AND (fk_id_agent = $this->ses_pk_id_agent OR fk_id_leader_agent = $this->ses_pk_id_agent)
            ")->getRowArray();

            $data['agent'] = $this->db->query("
                SELECT
                    COUNT(*) as total
                FROM agent 
                WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
                AND fk_id_leader_agent = $this->ses_pk_id_agent
            ")->getRowArray();

            $data['closing_agent'] = $data['penjualan_produk_agent']['closing'] + $data['penjualan_produk_travel_agent']['closing'];
            $data['closing_leader_agent'] = $data['penjualan_produk_leader_agent']['closing'] + $data['penjualan_produk_travel_leader_agent']['closing'];
            $data['closing'] = $data['closing_agent'] + $data['closing_leader_agent'];
            $data['komisi'] = $data['komisi_penjualan_produk']['komisi'] + $data['komisi_penjualan_produk_travel']['komisi'];
            $data['passive_income'] = $data['passive_income_penjualan_produk']['komisi'] + $data['passive_income_penjualan_produk_travel']['komisi'];
            $data['omset'] = $data['penjualan_produk_agent']['omset'] + $data['penjualan_produk_travel_agent']['omset'] + $data['penjualan_produk_leader_agent']['omset'] + $data['penjualan_produk_travel_leader_agent']['omset'];
        }

        return view('agent_area/pages/profile', $data);
    }

    public function ubahPassword()
    {
        $db = db_connect();

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
        ];

        if ($password != '' || $confirm_password != '') {
            if ($password != $confirm_password) {
                $response['error'] = [
                    "password" => 'password tidak sama dengan konfirmasi password',
                    "confirm_password" => 'Konfirmasi password tidak sama dengan konfirmasi password',
                ];

                return json_encode($response);
            }

            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }


        $pk_id_agent = $this->ses_pk_id_agent;

        $searchAgent = $this->agentModel->find($pk_id_agent);
        if ($searchAgent) {

            $this->agentModel->setValidationRule('username', "required|regex_match[/^[a-z0-9]+$/]|is_unique[agent.username,pk_id_agent,$pk_id_agent]");
            $this->agentModel->setValidationMessage('username', [
                'required' => 'username harus diisi',
                'regex_match' => 'Username hanya boleh mengandung huruf kecil, angka, dan tidak boleh ada spasi.',
                'is_unique' => 'username telah digunakan, gunakan username yang lain',
            ]);

            if ($this->agentModel->update($pk_id_agent, $data) === true) {
                session()->set('username', $data['username']);

                $response = [
                    'status' => 'success',
                    'message' => 'berhasil mengubah data'
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
}
