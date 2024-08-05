<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\PenjualanProdukModel;
use App\Models\PenjualanProdukTravelModel;
use App\Models\PembayaranPenjualanProdukModel;
use App\Models\PembayaranPenjualanProdukTravelModel;
use App\Models\TravelModel;
use App\Models\ProdukModel;
use App\Models\ProdukTravelModel;
use App\Models\CustomerModel;
use App\Models\AgentModel;
use App\Models\KomisiPenjualanProdukModel;
use App\Models\KomisiPenjualanProdukTravelModel;
use App\Libraries\Pdfgenerator;
use JsonException;

class Apenjualan extends BaseController
{
    public $penjualanProdukModel;
    public $penjualanProdukTravelModel;
    public $pembayaranPenjualanProdukModel;
    public $pembayaranPenjualanProdukTravelModel;
    public $travelModel;
    public $produkModel;
    public $produkTravelModel;
    public $customerModel;
    public $agentModel;
    public $komisiPenjualanProdukModel;
    public $komisiPenjualanProdukTravelModel;
    public $db;
    public $ses_pk_id_agent;

    public function __construct(){
        $this->penjualanProdukModel = new PenjualanProdukModel();
        $this->penjualanProdukTravelModel = new PenjualanProdukTravelModel();
        $this->pembayaranPenjualanProdukModel = new PembayaranPenjualanProdukModel();
        $this->pembayaranPenjualanProdukTravelModel = new PembayaranPenjualanProdukTravelModel();
        $this->travelModel = new TravelModel();
        $this->produkModel = new ProdukModel();
        $this->produkTravelModel = new ProdukTravelModel();
        $this->customerModel = new CustomerModel();
        $this->agentModel = new AgentModel();
        $this->komisiPenjualanProdukModel = new KomisiPenjualanProdukModel();
        $this->komisiPenjualanProdukTravelModel = new KomisiPenjualanProdukTravelModel();
        $this->db = db_connect();
        $this->ses_pk_id_agent = session()->get('pk_id_agent');
    }

    public function produk()
    {
        $data['sidebar'] = "penjualan";
        $data['title'] = "List Penjualan Produk";
        $data['collapse'] = "penjualan";
        $data['collapseItem'] = 'listPenjualanProduk';
        $data['deskripsi'] = "List seluruh penjualan produk";
        $data['travels'] = $this->travelModel->orderby('nama_travel', 'asc')->findAll();
        $data['produks'] = $this->produkModel->orderby('nama_produk', 'asc')->findAll();

        return view('agent_area/pages/penjualan-produk', $data);
    }

    public function travel()
    {
        $data['sidebar'] = "penjualan";
        $data['title'] = "List Penjualan Produk Travel";
        $data['collapse'] = "penjualan";
        $data['collapseItem'] = 'listPenjualanProdukTravel';
        $data['deskripsi'] = "List seluruh penjualan produk travel";
        $data['travels'] = $this->travelModel->findAll();

        return view('agent_area/pages/penjualan-produk-travel', $data);
    }

    public function kuitansiProduk($pk_id_pembayaran_penjualan_produk){
        $penjualan = $this->db->query("
            SELECT
                a.*,
                c.nama_customer,
                d.nama_produk
            FROM pembayaran_penjualan_produk a
            JOIN penjualan_produk b ON a.fk_id_penjualan_produk = b.pk_id_penjualan_produk
            JOIN customer c ON b.fk_id_customer = c.pk_id_customer
            JOIN produk d ON b.fk_id_produk = d.pk_id_produk
            WHERE pk_id_pembayaran_penjualan_produk = $pk_id_pembayaran_penjualan_produk
        ")->getRowArray();

        $Pdfgenerator = new Pdfgenerator();
        // filename dari pdf ketika didownload
        $file_pdf = "$penjualan[nama_customer] $penjualan[nominal]";
        // setting paper
        $paper = 'A5';
        //orientasi paper potrait / landscape
        $orientation = "potrait";

        $html = view('admin/pages/kuitansi_produk', $penjualan);

        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        exit();
    }

    public function kuitansiProdukTravel($pk_id_pembayaran_penjualan_produk_travel){
        $penjualan = $this->db->query("
            SELECT
                a.*,
                c.nama_customer,
                d.nama_produk
            FROM pembayaran_penjualan_produk_travel a
            JOIN penjualan_produk_travel b ON a.fk_id_penjualan_produk_travel = b.pk_id_penjualan_produk_travel
            JOIN customer c ON b.fk_id_customer = c.pk_id_customer
            JOIN produk_travel d ON b.fk_id_produk_travel = d.pk_id_produk_travel
            WHERE pk_id_pembayaran_penjualan_produk_travel = $pk_id_pembayaran_penjualan_produk_travel
        ")->getRowArray();

        $Pdfgenerator = new Pdfgenerator();
        // filename dari pdf ketika didownload
        $file_pdf = "$penjualan[nama_customer] $penjualan[nominal]";
        // setting paper
        $paper = 'A5';
        //orientasi paper potrait / landscape
        $orientation = "potrait";

        $html = view('admin/pages/kuitansi_produk', $penjualan);

        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        exit();
    }

    public function getDataPenjualanProduk($pk_id_penjualan_produk){
        $data = $this->db->query("
            SELECT
                a.pk_id_penjualan_produk,
                a.fk_id_customer,
                b.nama_customer,
                a.fk_id_produk,
                c.nama_produk,
                d.nama_agent as nama_agent,
                e.nama_agent as nama_leader_agent,
                c.harga_produk,
                COALESCE(NULLIF(a.fk_id_travel, 0), NULL) as fk_id_travel,
                a.tgl_closing,
                a.komisi_agent,
                a.komisi_leader_agent,
                a.passive_income_leader_agent,
                a.fk_id_agent_closing,
                f.nama_agent as nama_agent_closing
            FROM penjualan_produk a
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            JOIN produk c ON a.fk_id_produk = c.pk_id_produk
            LEFT JOIN agent d ON b.fk_id_agent = d.pk_id_agent
            LEFT JOIN agent e ON b.fk_id_leader_agent = e.pk_id_agent
            LEFT JOIN agent f ON a.fk_id_agent_closing = f.pk_id_agent
            WHERE pk_id_penjualan_produk = $pk_id_penjualan_produk
            AND (a.fk_id_agent = $this->ses_pk_id_agent OR a.fk_id_leader_agent = $this->ses_pk_id_agent)
        ")->getRowArray();
        return json_encode($data);
    }

    public function getListPenjualanProduk()
    {
        $agent = $this->db->query("
            SELECT
                *
            FROM agent
            WHERE pk_id_agent = $this->ses_pk_id_agent
        ")->getRowArray();

        if($agent['tipe_agent'] == 'leader agent'){
            $query = "
                CREATE TEMPORARY TABLE ListPenjualanProduk AS
                SELECT
                    pk_id_penjualan_produk,
                    a.tgl_closing,
                    b.nama_customer,
                    a.nama_produk,
                    e.nama_travel,
                    a.harga_produk,
                    c.nama_agent,
                    d.nama_agent as nama_leader_agent,
                    status,
                    b.kota_kabupaten,
                    CASE
                        WHEN b.fk_id_agent = $this->ses_pk_id_agent THEN b.no_wa
                        WHEN b.fk_id_agent IS NOT NULL THEN '-'
                        ELSE b.no_wa
                    END AS no_wa_customer
                FROM penjualan_produk a
                JOIN produk aa ON a.fk_id_produk = aa.pk_id_produk
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                LEFT JOIN agent c ON b.fk_id_agent = c.pk_id_agent
                LEFT JOIN agent d ON b.fk_id_leader_agent = d.pk_id_agent
                LEFT JOIN travel e ON a.fk_id_travel = e.pk_id_travel
                WHERE a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL
                AND (a.fk_id_agent = $this->ses_pk_id_agent OR a.fk_id_leader_agent = $this->ses_pk_id_agent);
            ";
        } else {
            $query = "
                CREATE TEMPORARY TABLE ListPenjualanProduk AS
                SELECT
                    pk_id_penjualan_produk,
                    a.tgl_closing,
                    b.nama_customer,
                    a.nama_produk,
                    e.nama_travel,
                    a.harga_produk,
                    c.nama_agent,
                    d.nama_agent as nama_leader_agent,
                    status,
                    b.kota_kabupaten,
                    b.no_wa AS no_wa_customer
                FROM penjualan_produk a
                JOIN produk aa ON a.fk_id_produk = aa.pk_id_produk
                JOIN customer b ON a.fk_id_customer = b.pk_id_customer
                LEFT JOIN agent c ON b.fk_id_agent = c.pk_id_agent
                LEFT JOIN agent d ON b.fk_id_leader_agent = d.pk_id_agent
                LEFT JOIN travel e ON a.fk_id_travel = e.pk_id_travel
                WHERE a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL
                AND (a.fk_id_agent = $this->ses_pk_id_agent OR a.fk_id_leader_agent = $this->ses_pk_id_agent);
            ";
        }

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('ListPenjualanProduk');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function historyPembayaran($pk_id_penjualan_produk){
        $data['pembayaran'] = $this->pembayaranPenjualanProdukModel->where('fk_id_penjualan_produk', $pk_id_penjualan_produk)->orderby('tgl_pembayaran', 'DESC')->findAll();

        $data['total_pembayaran'] = 0;

        foreach ($data['pembayaran'] as $pembayaran) {
            $data['total_pembayaran'] += $pembayaran['nominal'];
        }
        
        // $data['penjualan'] = $this->penjualanProdukModel->find($pk_id_penjualan_produk);
        $data['penjualan'] = $this->db->query("
            SELECT
                a.pk_id_penjualan_produk,
                a.fk_id_customer,
                b.nama_customer,
                a.fk_id_produk,
                c.nama_produk,
                d.nama_agent as nama_agent,
                e.nama_agent as nama_leader_agent,
                c.harga_produk,
                f.nama_travel,
                a.tgl_closing,
                a.komisi_agent,
                a.komisi_leader_agent,
                a.passive_income_leader_agent,
                a.status
            FROM penjualan_produk a
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            JOIN produk c ON a.fk_id_produk = c.pk_id_produk
            LEFT JOIN agent d ON b.fk_id_agent = d.pk_id_agent
            LEFT JOIN agent e ON b.fk_id_leader_agent = e.pk_id_agent
            LEFT JOIN travel f ON a.fk_id_travel = f.pk_id_travel
            WHERE pk_id_penjualan_produk = $pk_id_penjualan_produk
            AND (a.fk_id_agent = $this->ses_pk_id_agent OR a.fk_id_leader_agent = $this->ses_pk_id_agent)
        ")->getRowArray();

        return json_encode($data);
    }

    public function getDataPembayaranPenjualanProduk($pk_id_pembayaran_penjualan_produk){
        $data = $this->pembayaranPenjualanProdukModel->find($pk_id_pembayaran_penjualan_produk);

        return json_encode($data);
    }

    // penjualan produk travel 
    public function getDataPenjualanProdukTravel($pk_id_penjualan_produk_travel){
        $data['penjualan'] = $this->db->query("
            SELECT
                a.pk_id_penjualan_produk_travel,
                a.fk_id_customer,
                b.nama_customer,
                a.fk_id_produk_travel,
                c.nama_produk,
                d.nama_agent as nama_agent,
                e.nama_agent as nama_leader_agent,
                c.harga_produk,
                COALESCE(NULLIF(a.fk_id_travel, 0), NULL) as fk_id_travel,
                a.tgl_closing,
                a.komisi_agent,
                a.komisi_leader_agent,
                a.passive_income_leader_agent,
                a.fk_id_agent_closing,
                f.nama_agent as nama_agent_closing
            FROM penjualan_produk_travel a
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            JOIN produk_travel c ON a.fk_id_produk_travel = c.pk_id_produk_travel
            LEFT JOIN agent d ON b.fk_id_agent = d.pk_id_agent
            LEFT JOIN agent e ON b.fk_id_leader_agent = e.pk_id_agent
            LEFT JOIN agent f ON a.fk_id_agent_closing = f.pk_id_agent
            WHERE pk_id_penjualan_produk_travel = $pk_id_penjualan_produk_travel
            AND (a.fk_id_agent = $this->ses_pk_id_agent OR a.fk_id_leader_agent = $this->ses_pk_id_agent)
        ")->getRowArray();

        $data['produk'] = $this->produkTravelModel->where('fk_id_travel', $data['penjualan']['fk_id_travel'])->findAll();
        return json_encode($data);
    }

    public function getListPenjualanProdukTravel()
    {
        $query = "
            CREATE TEMPORARY TABLE ListPenjualanProduk AS
            SELECT
                pk_id_penjualan_produk_travel,
                a.tgl_closing,
                b.nama_customer,
                a.nama_produk,
                e.nama_travel,
                a.harga_produk,
                c.nama_agent,
                d.nama_agent as nama_leader_agent,
                status
            FROM penjualan_produk_travel a
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            LEFT JOIN agent c ON b.fk_id_agent = c.pk_id_agent
            LEFT JOIN agent d ON b.fk_id_leader_agent = d.pk_id_agent
            LEFT JOIN travel e ON a.fk_id_travel = e.pk_id_travel
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND (a.fk_id_agent = $this->ses_pk_id_agent OR a.fk_id_leader_agent = $this->ses_pk_id_agent);
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('ListPenjualanProduk');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listproduk");
        return DataTable::of($builder)->toJson(true);
    }

    public function historyPembayaranTravel($pk_id_penjualan_produk_travel){
        $data['pembayaran'] = $this->pembayaranPenjualanProdukTravelModel->where('fk_id_penjualan_produk_travel', $pk_id_penjualan_produk_travel)->orderby('tgl_pembayaran', 'DESC')->findAll();

        $data['total_pembayaran'] = 0;

        foreach ($data['pembayaran'] as $pembayaran) {
            $data['total_pembayaran'] += $pembayaran['nominal'];
        }
        
        // $data['penjualan'] = $this->penjualanProdukModel->find($pk_id_penjualan_produk_travel);
        $data['penjualan'] = $this->db->query("
            SELECT
                a.pk_id_penjualan_produk_travel,
                a.fk_id_customer,
                b.nama_customer,
                a.fk_id_produk_travel,
                c.nama_produk,
                d.nama_agent as nama_agent,
                e.nama_agent as nama_leader_agent,
                c.harga_produk,
                f.nama_travel,
                a.tgl_closing,
                a.komisi_agent,
                a.komisi_leader_agent,
                a.passive_income_leader_agent,
                a.status
            FROM penjualan_produk_travel a
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            JOIN produk_travel c ON a.fk_id_produk_travel = c.pk_id_produk_travel
            LEFT JOIN agent d ON b.fk_id_agent = d.pk_id_agent
            LEFT JOIN agent e ON b.fk_id_leader_agent = e.pk_id_agent
            LEFT JOIN travel f ON a.fk_id_travel = f.pk_id_travel
            WHERE pk_id_penjualan_produk_travel = $pk_id_penjualan_produk_travel
            AND (a.fk_id_agent = $this->ses_pk_id_agent OR a.fk_id_leader_agent = $this->ses_pk_id_agent)
        ")->getRowArray();

        return json_encode($data);
    }

    public function getDataPembayaranPenjualanProdukTravel($pk_id_pembayaran_penjualan_produk_travel){
        $data = $this->pembayaranPenjualanProdukTravelModel->find($pk_id_pembayaran_penjualan_produk_travel);

        return json_encode($data);
    }

    // input data penjualan 
    public function saveDataPenjualan()
    {
        $agent = $this->agentModel->find($this->ses_pk_id_agent);

        $confirm_data = $this->request->getPost('confirm_data');
        if ($confirm_data == 'false') {
            $response['error']['confirm_data'] = 'Checklist terlebih dahulu';
            
            $failed = true;
            return json_encode($response);
        }

        $this->db->transBegin();

        $failed = false;

        $dataCustomer = [
            'nama_customer' => $this->request->getPost('nama_customer'),
            'no_wa' => $this->request->getPost('no_wa'),
            'kota_kabupaten' => $this->request->getPost('kota_kabupaten'),
            'email' => $this->request->getPost('email'),
            'fk_id_produk' => $this->request->getPost('fk_id_produk'),
            'jenis_produk' => 'produk',
            'fk_id_agent' => $this->ses_pk_id_agent,
            'fk_id_leader_agent' => $agent['fk_id_leader_agent'],
        ];

        $is_send_wa = 0;
        $wa_message = '';

        if($this->customerModel->save($dataCustomer) === true){
            // cek data pembayaran
            $produk = $this->produkModel->find($dataCustomer['fk_id_produk']);
            $is_send_wa = $produk['send_wa_after_input_agent'];
            $wa_message = $produk['wa_message'];

            $fk_id_customer = $this->customerModel->getInsertID();
            
            $dataPenjualan = [
                'fk_id_customer' => $fk_id_customer,
                'fk_id_produk' => $dataCustomer['fk_id_produk'],
                'tgl_closing' => date('Y-m-d'),
                'fk_id_agent_closing' => $agent['pk_id_agent'],
                'status' => 'pending'
            ];

            // $this->penjualanProdukModel->skipValidation(true);
            // $this->penjualanProdukModel->allowCallbacks(false);
            
            if ($this->penjualanProdukModel->save($dataPenjualan) !== true) {
                $response = [
                    "error" => $this->penjualanProdukModel->errors()
                ];

                $failed = true;
            }
            
        } else {
            $response = [
                "error" => $this->customerModel->errors()
            ];

            $failed = true;
        }

        // Check transaction status

        if ($this->db->transStatus() === false || $failed) {
            $this->db->transRollback();

            if(!isset($response['error'])){
                $response = [
                    'status' => 'error',
                    'message' => 'Gagal menyetorkan data'
                ];
            }
        } else {
            $this->db->transCommit();

            if($is_send_wa){
                $messageData = $wa_message;
    
                $replace = [
                    '$nama_customer$' => $dataCustomer['nama_customer']
                ];
    
                // Replace placeholders with actual values
                $message = str_replace(array_keys($replace), array_values($replace), $messageData);
    
                send_wa($dataCustomer['no_wa'], $message);
            }

            $response = [
                'status' => 'success',
                'message' => 'Berhasil menyetorkan data'
            ];
        }

        return json_encode($response);
    }

    public function saveDataEditPenjualanProdukInternal(){
        $this->db->transBegin();
        $failed = false;

        $pk_id_penjualan_produk = $this->request->getPost('pk_id_penjualan_produk');
        $pk_id_customer = $this->request->getPost('pk_id_customer');
        
        $data = [
            'fk_id_produk'=> $this->request->getPost('fk_id_produk'),
            'fk_id_travel'=> $this->request->getPost('fk_id_travel'),
            'tgl_closing'=> $this->request->getPost('tgl_closing'),
            'fk_id_customer'=> $this->request->getPost('pk_id_customer')
        ];

        if (empty($data['tgl_closing'])) {
            $response['error']['tgl_closing'] = 'Tgl closing harus diisi';
            
            $failed = true;
            return json_encode($response);
        }

        $this->penjualanProdukModel->skipValidation(false);
        
        if($this->penjualanProdukModel->update($pk_id_penjualan_produk, $data) === true){
            $dataCustomer = [
                'nama_customer' => $this->request->getPost('nama_customer'),
                'no_wa' => $this->request->getPost('no_wa'),
                'email' => $this->request->getPost('email'),
                'kota_kabupaten' => $this->request->getPost('kota_kabupaten'),
            ];

            if(!$this->customerModel->update($pk_id_customer, $dataCustomer)){
                $response['error'] = $this->customerModel->errors();

                $failed = true;
            }

        } else {
            $response['error'] = $this->penjualanProdukModel->errors();

            $failed = true;
        }

        if ($this->db->transStatus() === false || $failed) {
            $this->db->transRollback();

            if(!isset($response['error'])){
                $response = [
                    'status' => 'error',
                    'message' => 'Gagal mengubah data penjualan'
                ];
            }
        } else {
            $this->db->transCommit();

            $response = [
                'status' => 'success',
                'message' => 'Berhasil mengubah data penjualan'
            ];
        }

        return json_encode($response);
    }
}
