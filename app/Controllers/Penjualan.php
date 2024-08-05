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

class Penjualan extends BaseController
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

        return view('admin/pages/penjualan-produk', $data);
    }

    public function travel()
    {
        $data['sidebar'] = "penjualan";
        $data['title'] = "List Penjualan Produk Travel";
        $data['collapse'] = "penjualan";
        $data['collapseItem'] = 'listPenjualanProdukTravel';
        $data['deskripsi'] = "List seluruh penjualan produk travel";
        $data['travels'] = $this->travelModel->findAll();

        return view('admin/pages/penjualan-produk-travel', $data);
    }

    public function internalproduk()
    {
        $data['sidebar'] = "penjualan";
        $data['title'] = "List Penjualan Internal Produk";
        $data['collapse'] = "penjualan";
        $data['collapseItem'] = 'listPenjualanInternalProduk';
        $data['deskripsi'] = "List seluruh penjualan internal produk";
        $data['travels'] = $this->travelModel->findAll();
        $data['produks'] = $this->produkModel->orderby('nama_produk', 'asc')->findAll();

        return view('admin/pages/penjualan-internal-produk', $data);
    }

    public function internaltravel()
    {
        $data['sidebar'] = "penjualan";
        $data['title'] = "List Penjualan Internal Produk Travel";
        $data['collapse'] = "penjualan";
        $data['collapseItem'] = 'listPenjualanInternalProdukTravel';
        $data['deskripsi'] = "List seluruh penjualan internal produk travel";
        $data['travels'] = $this->travelModel->findAll();

        return view('admin/pages/penjualan-internal-produk-travel', $data);
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

    public function saveDataPenjualanProduk()
    {
        // Collect input data
        $data = [
            'fk_id_customer' => $this->request->getPost('fk_id_customer'),
            'fk_id_produk' => $this->request->getPost('fk_id_produk'),
            'tgl_closing' => $this->request->getPost('tgl_closing'),
            'fk_id_travel' => $this->request->getPost('fk_id_travel'),
            'fk_id_agent_closing' => $this->request->getPost('fk_id_agent_closing'),
        ];

        $customer = $this->customerModel->find($data['fk_id_customer']);
        $is_send_wa = 0;
        $wa_message = '';

        $pk_id_penjualan_produk = $this->request->getPost('pk_id_penjualan_produk');

        if (empty($data['fk_id_produk'])) {
            $response['error']['fk_id_produk'] = 'Produk harus diisi';
            return json_encode($response);
        }

        // cek data pembayaran
        $produk = $this->produkModel->find($data['fk_id_produk']);
        $is_send_wa = $produk['send_wa_after_input_admin'];
        $wa_message = $produk['wa_message'];

        $nominal = $this->request->getPost('nominal');

        if($nominal > $produk['harga_produk']){
            $response['error'] = [
                'nominal' => 'Nominal tidak boleh lebih besar dari harga produk'
            ];
        } else {
            if($nominal == $produk['harga_produk']){
                // $data['paid_komisi_agent'] = ($produk['jenis_komisi'] == 'fix') ? $produk['komisi_agent'] : $produk['harga_produk'] * $produk['komisi_agent'] / 100;
                // $data['paid_komisi_leader_agent'] = ($produk['jenis_komisi'] == 'fix') ? $produk['komisi_leader_agent'] : $produk['harga_produk'] * $produk['komisi_leader_agent'] / 100;
                // $data['paid_passive_income_leader_agent'] = ($produk['jenis_komisi'] == 'fix') ? $produk['passive_income_leader_agent'] : $produk['harga_produk'] * $produk['passive_income_leader_agent'] / 100;
                $data['status'] = 'lunas';
            } else {
                $data['status'] = 'cicil';
            }

            // Start transaction
            $this->db->transBegin();
            $failed = false;
    
            // Check if the sale record exists
            $searchPenjualan = $this->penjualanProdukModel->find($pk_id_penjualan_produk);
            if ($searchPenjualan) {
                // Update existing sale record
                if ($this->penjualanProdukModel->update($pk_id_penjualan_produk, $data)) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Berhasil mengubah data penjualan'
                    ];
                } else {
                    $response = [
                        "error" => $this->penjualanProdukModel->errors()
                    ];

                    $failed = true;
                }
            } else {
                // Save new sale record
                if ($this->penjualanProdukModel->save($data) === true) {
                    $fk_id_penjualan_produk = $this->penjualanProdukModel->getInsertID();
    
                    $dataPembayaran = [
                        'fk_id_penjualan_produk' => $fk_id_penjualan_produk,
                        'tgl_pembayaran' => $this->request->getPost('tgl_closing'),
                        'nominal' => $this->request->getPost('nominal'),
                        'keterangan' => $this->request->getPost('keterangan')
                    ];
    
                    $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');
    
                    if ($bukti_pembayaran) {
                        $rules = [
                            'bukti_pembayaran' => [
                                'rules' => 'max_size[bukti_pembayaran,1024]|ext_in[bukti_pembayaran,png,jpg,jpeg]',
                                'errors' => [
                                    'max_size' => 'Gambar terlalu besar (max 1mb)',
                                    'ext_in' => 'Gambar harus berupa png, jpg, atau jpeg'
                                ]
                            ]
                        ];
    
                        if ($this->validate($rules)) {
                            if ($bukti_pembayaran->isValid() && !$bukti_pembayaran->hasMoved()) {
                                $newName = $bukti_pembayaran->getRandomName();
                                if ($bukti_pembayaran->move('public/assets/bukti-pembayaran', $newName)) {
                                    $dataPembayaran['bukti_pembayaran'] = $newName;
    
                                    if ($this->pembayaranPenjualanProdukModel->save($dataPembayaran) === true) {
                                        $response = [
                                            'status' => 'success',
                                            'message' => 'Berhasil menambahkan pembayaran'
                                        ];
                                    } else {
                                        $response = [
                                            "error" => $this->pembayaranPenjualanProdukModel->errors()
                                        ];

                                        $failed = true;
                                    }
                                } else {
                                    $response = [
                                        "error" => $bukti_pembayaran->getErrorString()
                                    ];

                                    $failed = true;
                                }
                            }
                        } else {
                            $response = [
                                "error" => $this->validator->getErrors()
                            ];

                            $failed = true;
                        }
                    } else {
                        if ($this->pembayaranPenjualanProdukModel->save($dataPembayaran) === true) {
                            $response = [
                                'status' => 'success',
                                'message' => 'Berhasil menambahkan pembayaran'
                            ];
                        } else {
                            $response = [
                                "error" => $this->pembayaranPenjualanProdukModel->errors()
                            ];

                            $failed = true;
                        }
                    }
                } else {
                    $response = [
                        "error" => $this->penjualanProdukModel->errors()
                    ];

                    $failed = true;
                }
            }
    
            if ($this->db->transStatus() === false || $failed) {
                $this->db->transRollback();
    
                if(!isset($response['error'])){
                    $response = [
                        'status' => 'error',
                        'message' => 'Gagal menambahkan penjualan'
                    ];
                }
            } else {
                $this->db->transCommit();
    
                if($is_send_wa){
                    $messageData = $wa_message;
        
                    $replace = [
                        '$nama_customer$' => $customer['nama_customer']
                    ];
        
                    // Replace placeholders with actual values
                    $message = str_replace(array_keys($replace), array_values($replace), $messageData);
        
                    send_wa($customer['no_wa'], $message);
                }
    
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil menambahkan penjualan'
                ];
            }
        }

        return json_encode($response);
    }

    public function saveDataEditPenjualanProduk(){
        $pk_id_penjualan_produk = $this->request->getPost('pk_id_penjualan_produk');
        
        $data = [
            'fk_id_customer'=> $this->request->getPost('fk_id_customer'),
            'fk_id_produk'=> $this->request->getPost('fk_id_produk'),
            'fk_id_travel'=> $this->request->getPost('fk_id_travel'),
            'fk_id_agent_closing'=> $this->request->getPost('fk_id_agent_closing'),
            'tgl_closing'=> $this->request->getPost('tgl_closing')
        ];

        if($this->penjualanProdukModel->update($pk_id_penjualan_produk, $data) === true){
            $response = [
                'status' => 'success',
                'message' => 'Berhasil mengubah data penjualan produk'
            ];
        } else {
            $response['error'] = $this->penjualanProdukModel->errors();
        }

        return json_encode($response);
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
                COALESCE(a.komisi_agent, 0) AS komisi_agent,
                COALESCE(a.komisi_leader_agent, 0) AS komisi_leader_agent,
                COALESCE(a.passive_income_leader_agent, 0) AS passive_income_leader_agent,
                a.fk_id_agent_closing,
                f.nama_agent as nama_agent_closing,
                b.pk_id_customer,
                b.nama_customer,
                b.email,
                b.no_wa,
                b.kota_kabupaten
            FROM penjualan_produk a
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            JOIN produk c ON a.fk_id_produk = c.pk_id_produk
            LEFT JOIN agent d ON b.fk_id_agent = d.pk_id_agent
            LEFT JOIN agent e ON b.fk_id_leader_agent = e.pk_id_agent
            LEFT JOIN agent f ON a.fk_id_agent_closing = f.pk_id_agent
            WHERE pk_id_penjualan_produk = $pk_id_penjualan_produk
        ")->getRowArray();
        return json_encode($data);
    }

    public function getListPenjualanProduk()
    {
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
                b.no_wa,
                CASE 
                    WHEN b.fk_id_to_agent IS NULL THEN aa.to_agent
                    ELSE 0
                END AS to_agent,
                b.kota_kabupaten
            FROM penjualan_produk a
            JOIN produk aa ON a.fk_id_produk = aa.pk_id_produk
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            LEFT JOIN agent c ON b.fk_id_agent = c.pk_id_agent
            LEFT JOIN agent d ON b.fk_id_leader_agent = d.pk_id_agent
            LEFT JOIN travel e ON a.fk_id_travel = e.pk_id_travel
            WHERE a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL
            AND (a.fk_id_agent IS NOT NULL OR a.fk_id_leader_agent IS NOT NULL);
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

    public function deletePenjualanProduk($pk_id_penjualan_produk)
    {
        if($this->penjualanProdukModel->delete($pk_id_penjualan_produk) === true){

            $this->komisiPenjualanProdukModel->where("fk_id_penjualan_produk", $pk_id_penjualan_produk)->delete();
            $this->pembayaranPenjualanProdukModel->where("fk_id_penjualan_produk", $pk_id_penjualan_produk)->delete();

            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data penjualan'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data penjualan'
            ];
        }

        return json_encode($response);
    }

    public function getAllCustomer(){
        $nama_customer = $this->request->getPost('nama_customer');
        $fk_id_agent = $this->request->getPost('fk_id_agent');

        // $data = $this->customerModel->where('fk_id_agent', $fk_id_agent)->orWhere('fk_id_leader_agent',$fk_id_agent)->like('nama_customer', $nama_customer)->orderby('nama_customer','asc')->findAll();

        $data = $this->db->query("
            SELECT
                *
            FROM customer
            WHERE (fk_id_agent = $fk_id_agent OR fk_id_leader_agent = $fk_id_agent) AND (nama_customer LIKE '%$nama_customer%') AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
            ORDER BY nama_customer ASC
        ")->getResultArray();

        return json_encode($data);
    }

    public function generateDataCustomer($fk_id_customer){
        $data = $this->db->query("
            SELECT 
                b.nama_agent,
                c.nama_agent as nama_leader_agent
            FROM customer a
            LEFT JOIN agent b ON a.fk_id_agent = b.pk_id_agent
            LEFT JOIN agent c ON a.fk_id_leader_agent = c.pk_id_agent
            WHERE pk_id_customer = $fk_id_customer
        ")->getRowArray();

        return json_encode($data);
    }

    public function getAllProduk($nama_produk){
        $data = $this->produkModel->like('nama_produk', $nama_produk)->orderby('nama_produk','asc')->findAll();

        return json_encode($data);
    }

    public function getAllAgent($nama_agent){
        $data = $this->agentModel->like('nama_agent', $nama_agent)->orderby('nama_agent','asc')->findAll();

        return json_encode($data);
    }

    public function generateDataProduk($fk_id_produk){
        $data = $this->produkModel->find($fk_id_produk);

        return json_encode($data);
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
                COALESCE(a.komisi_agent, 0) AS komisi_agent,
                COALESCE(a.komisi_leader_agent, 0) AS komisi_leader_agent,
                COALESCE(a.passive_income_leader_agent, 0) AS passive_income_leader_agent,
                a.status
            FROM penjualan_produk a
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            JOIN produk c ON a.fk_id_produk = c.pk_id_produk
            LEFT JOIN agent d ON b.fk_id_agent = d.pk_id_agent
            LEFT JOIN agent e ON b.fk_id_leader_agent = e.pk_id_agent
            LEFT JOIN travel f ON a.fk_id_travel = f.pk_id_travel
            WHERE pk_id_penjualan_produk = $pk_id_penjualan_produk
        ")->getRowArray();

        return json_encode($data);
    }

    public function historyKomisi($pk_id_penjualan_produk){
        $data['komisi'] = $this->db->query("
            SELECT
                a.*,
                b.nama_agent
            FROM komisi_penjualan_produk a
            JOIN agent b ON a.fk_id_agent = b.pk_id_agent
            WHERE fk_id_penjualan_produk = $pk_id_penjualan_produk
            AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
        ")->getResultArray();
        
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
                a.status
            FROM penjualan_produk a
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            JOIN produk c ON a.fk_id_produk = c.pk_id_produk
            LEFT JOIN agent d ON b.fk_id_agent = d.pk_id_agent
            LEFT JOIN agent e ON b.fk_id_leader_agent = e.pk_id_agent
            LEFT JOIN travel f ON a.fk_id_travel = f.pk_id_travel
            WHERE pk_id_penjualan_produk = $pk_id_penjualan_produk
        ")->getRowArray();

        return json_encode($data);
    }

    public function getDataPembayaranPenjualanProduk($pk_id_pembayaran_penjualan_produk){
        $data = $this->pembayaranPenjualanProdukModel->find($pk_id_pembayaran_penjualan_produk);

        return json_encode($data);
    }

    public function saveDataPembayaranPenjualanProduk(){
        $pk_id_pembayaran_penjualan_produk = $this->request->getPost('pk_id_pembayaran_penjualan_produk');
        
        $data = [
            'fk_id_penjualan_produk' => $this->request->getPost('fk_id_penjualan_produk'),
            'tgl_pembayaran' => $this->request->getPost('tgl_pembayaran'),
            'nominal' => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $penjualan = $this->penjualanProdukModel->find($data['fk_id_penjualan_produk']);

        $nominal = 0;

        if($pk_id_pembayaran_penjualan_produk){
            $total_pembayaran = $this->db->query("
                SELECT
                    SUM(nominal) as total_pembayaran
                FROM pembayaran_penjualan_produk
                WHERE fk_id_penjualan_produk = $data[fk_id_penjualan_produk]
                AND pk_id_pembayaran_penjualan_produk != $pk_id_pembayaran_penjualan_produk
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
                GROUP BY fk_id_penjualan_produk
            ")->getRowArray();
        } else {
            $total_pembayaran = $this->db->query("
                SELECT
                    SUM(nominal) as total_pembayaran
                FROM pembayaran_penjualan_produk
                WHERE fk_id_penjualan_produk = $data[fk_id_penjualan_produk]
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
                GROUP BY fk_id_penjualan_produk
            ")->getRowArray();
        }

        if(!empty($total_pembayaran)){
            $nominal = $total_pembayaran['total_pembayaran'];
        }

        if((intval($nominal) + intval($data['nominal'])) > $penjualan['harga_produk']){
            $response['error'] = [
                "nominal" => "Nominal melebihi sisa pembayaran"
            ];
        } else {
            $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');
        
            if ($bukti_pembayaran) {
                $rules = [
                    'bukti_pembayaran' => [
                        'rules' => 'max_size[bukti_pembayaran,1024]|ext_in[bukti_pembayaran,png,jpg,jpeg]',
                        'errors' => [
                            'max_size' => 'Gambar terlalu besar (max 1mb)',
                            'ext_in' => 'Gambar harus berupa png, jpg, atau jpeg'
                        ]
                    ]
                ];
    
                if ($this->validate($rules)) {
                    if ($bukti_pembayaran->isValid() && !$bukti_pembayaran->hasMoved()) {
                        $newName = $bukti_pembayaran->getRandomName();
                        if ($bukti_pembayaran->move('public/assets/bukti-pembayaran', $newName)) {
                            $data['bukti_pembayaran'] = $newName;
                        } else {
                            $response = [
                                "error" => $bukti_pembayaran->getErrorString()
                            ];
                        }
                    }
                } else {
                    $response = [
                        "error" => $this->validator->getErrors()
                    ];
                }
            }
            
            $searchData = $this->pembayaranPenjualanProdukModel->find($pk_id_pembayaran_penjualan_produk);
            if($searchData){
                if($this->pembayaranPenjualanProdukModel->update($pk_id_pembayaran_penjualan_produk, $data)){

                    if((intval($nominal) + intval($data['nominal'])) == $penjualan['harga_produk']){
                        $this->penjualanProdukModel->allowCallbacks(false)->update($data['fk_id_penjualan_produk'], ["status" => "lunas"]);
                    } else {
                        $this->penjualanProdukModel->allowCallbacks(false)->update($data['fk_id_penjualan_produk'], ["status" => "cicil"]);
                    }

                    $response = [
                        'status' => 'success',
                        'message' => 'Berhasil mengubah data pembayaran'
                    ];
                } else {
                    $response = [
                        "error" => $this->pembayaranPenjualanProdukModel->errors()
                    ];
                }
            } else {
                if($this->pembayaranPenjualanProdukModel->save($data)){
                    if((intval($nominal) + intval($data['nominal'])) == $penjualan['harga_produk']){
                        $this->penjualanProdukModel->allowCallbacks(false)->update($data['fk_id_penjualan_produk'], ["status" => "lunas"]);
                    } else {
                        $this->penjualanProdukModel->allowCallbacks(false)->update($data['fk_id_penjualan_produk'], ["status" => "cicil"]);
                    }

                    $response = [
                        'status' => 'success',
                        'message' => 'Berhasil menambahkan data pembayaran'
                    ];
                } else {
                    $response = [
                        "error" => $this->pembayaranPenjualanProdukModel->errors()
                    ];
                }
            }
        }


        return json_encode($response);
    }

    public function hapusDataPembayaran($pk_id_pembayaran_penjualan_produk){
        $pembayaran = $this->pembayaranPenjualanProdukModel->find($pk_id_pembayaran_penjualan_produk);

        if($this->pembayaranPenjualanProdukModel->delete($pk_id_pembayaran_penjualan_produk) === true){
            $nominal = 0;
            $total_pembayaran = $this->db->query("
                SELECT
                    fk_id_penjualan_produk,
                    SUM(nominal) as total
                FROM pembayaran_penjualan_produk 
                WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
                AND fk_id_penjualan_produk = $pembayaran[fk_id_penjualan_produk]
                GROUP BY fk_id_penjualan_produk
            ")->getRowArray();

            if($total_pembayaran){
                $penjualan = $this->penjualanProdukModel->find($total_pembayaran['fk_id_penjualan_produk']);

                if($total_pembayaran['total'] < $penjualan['harga_produk']){
                    $data = [
                        'status' => 'cicil'
                    ];
                    $this->penjualanProdukModel->allowCallbacks(false)->update($pembayaran['fk_id_penjualan_produk'], $data);
                }
            } else {
                $data = [
                    'status' => 'cicil'
                ];
                $this->penjualanProdukModel->allowCallbacks(false)->update($pembayaran['fk_id_penjualan_produk'], $data);
            }

            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data pembayaran'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data pembayaran'
            ];
        }

        return json_encode($response);
    }


    // penjualan produk travel 
    public function saveDataPenjualanProdukTravel()
    {
        // Collect input data
        $data = [
            'fk_id_customer' => $this->request->getPost('fk_id_customer'),
            'fk_id_produk_travel' => $this->request->getPost('fk_id_produk_travel'),
            'tgl_closing' => $this->request->getPost('tgl_closing'),
            'fk_id_travel' => $this->request->getPost('fk_id_travel'),
            'fk_id_agent_closing' => $this->request->getPost('fk_id_agent_closing'),
        ];

        $customer = $this->customerModel->find($data['fk_id_customer']);
        $is_send_wa = 0;
        $wa_message = '';

        $pk_id_penjualan_produk_travel = $this->request->getPost('pk_id_penjualan_produk_travel');

        if (empty($data['fk_id_produk_travel'])) {
            $response['error']['fk_id_produk_travel'] = 'Produk travel harus diisi';
            return json_encode($response);
        }

        // cek data pembayaran
        $produk = $this->produkTravelModel->find($data['fk_id_produk_travel']);
        $is_send_wa = $produk['send_wa_after_input_admin'];
        $wa_message = $produk['wa_message'];

        $nominal = $this->request->getPost('nominal');

        if($nominal > $produk['harga_produk']){
            $response['error'] = [
                'nominal' => 'Nominal tidak boleh lebih besar dari harga produk'
            ];
        } else {
            if($nominal == $produk['harga_produk']){
                // $data['paid_komisi_agent'] = ($produk['jenis_komisi'] == 'fix') ? $produk['komisi_agent'] : $produk['harga_produk'] * $produk['komisi_agent'] / 100;
                // $data['paid_komisi_leader_agent'] = ($produk['jenis_komisi'] == 'fix') ? $produk['komisi_leader_agent'] : $produk['harga_produk'] * $produk['komisi_leader_agent'] / 100;
                // $data['paid_passive_income_leader_agent'] = ($produk['jenis_komisi'] == 'fix') ? $produk['passive_income_leader_agent'] : $produk['harga_produk'] * $produk['passive_income_leader_agent'] / 100;
                $data['status'] = 'lunas';
            } else {
                $data['status'] = 'cicil';
            }

            // Start transaction
            $this->db->transBegin();
            $failed = false;
    
            // Check if the sale record exists
            $searchPenjualan = $this->penjualanProdukTravelModel->find($pk_id_penjualan_produk_travel);
            if ($searchPenjualan) {
                // Update existing sale record
                if ($this->penjualanProdukTravelModel->update($pk_id_penjualan_produk_travel, $data)) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Berhasil mengubah data penjualan'
                    ];
                } else {
                    $response = [
                        "error" => $this->penjualanProdukTravelModel->errors()
                    ];

                    $failed = true;
                }
            } else {
                // Save new sale record
                if ($this->penjualanProdukTravelModel->save($data) === true) {
                    $fk_id_penjualan_produk_travel = $this->penjualanProdukTravelModel->getInsertID();
    
                    $dataPembayaran = [
                        'fk_id_penjualan_produk_travel' => $fk_id_penjualan_produk_travel,
                        'tgl_pembayaran' => $this->request->getPost('tgl_closing'),
                        'nominal' => $this->request->getPost('nominal'),
                        'keterangan' => $this->request->getPost('keterangan')
                    ];
    
                    $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');
    
                    if ($bukti_pembayaran) {
                        $rules = [
                            'bukti_pembayaran' => [
                                'rules' => 'max_size[bukti_pembayaran,1024]|ext_in[bukti_pembayaran,png,jpg,jpeg]',
                                'errors' => [
                                    'max_size' => 'Gambar terlalu besar (max 1mb)',
                                    'ext_in' => 'Gambar harus berupa png, jpg, atau jpeg'
                                ]
                            ]
                        ];
    
                        if ($this->validate($rules)) {
                            if ($bukti_pembayaran->isValid() && !$bukti_pembayaran->hasMoved()) {
                                $newName = $bukti_pembayaran->getRandomName();
                                if ($bukti_pembayaran->move('public/assets/bukti-pembayaran', $newName)) {
                                    $dataPembayaran['bukti_pembayaran'] = $newName;
    
                                    if ($this->pembayaranPenjualanProdukTravelModel->save($dataPembayaran) === true) {
                                        $response = [
                                            'status' => 'success',
                                            'message' => 'Berhasil menambahkan pembayaran'
                                        ];
                                    } else {
                                        $response = [
                                            "error" => $this->pembayaranPenjualanProdukTravelModel->errors()
                                        ];

                                        $failed = true;
                                    }
                                } else {
                                    $response = [
                                        "error" => $bukti_pembayaran->getErrorString()
                                    ];

                                    $failed = true;
                                }
                            }
                        } else {
                            $response = [
                                "error" => $this->validator->getErrors()
                            ];

                            $failed = true;
                        }
                    } else {
                        if ($this->pembayaranPenjualanProdukTravelModel->save($dataPembayaran) === true) {
                            $response = [
                                'status' => 'success',
                                'message' => 'Berhasil menambahkan pembayaran'
                            ];
                        } else {
                            $response = [
                                "error" => $this->pembayaranPenjualanProdukTravelModel->errors()
                            ];

                            $failed = true;
                        }
                    }
                } else {
                    $response = [
                        "error" => $this->penjualanProdukTravelModel->errors()
                    ];

                    $failed = true;
                }
            }
    
            if ($this->db->transStatus() === false || $failed) {
                $this->db->transRollback();
    
                if(!isset($response['error'])){
                    $response = [
                        'status' => 'error',
                        'message' => 'Gagal menambahkan penjualan'
                    ];
                }
            } else {
                $this->db->transCommit();
    
                if($is_send_wa){
                    $messageData = $wa_message;
        
                    $replace = [
                        '$nama_customer$' => $customer['nama_customer']
                    ];
        
                    // Replace placeholders with actual values
                    $message = str_replace(array_keys($replace), array_values($replace), $messageData);
        
                    send_wa($customer['no_wa'], $message);
                }
    
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil menambahkan penjualan'
                ];
            }
        }

        return json_encode($response);
    }

    public function saveDataEditPenjualanProdukTravel(){
        $pk_id_penjualan_produk_travel = $this->request->getPost('pk_id_penjualan_produk_travel');
        
        $data = [
            'fk_id_customer'=> $this->request->getPost('fk_id_customer'),
            'fk_id_produk_travel'=> $this->request->getPost('fk_id_produk_travel'),
            'fk_id_travel'=> $this->request->getPost('fk_id_travel'),
            'fk_id_agent_closing'=> $this->request->getPost('fk_id_agent_closing'),
            'tgl_closing'=> $this->request->getPost('tgl_closing')
        ];

        if($this->penjualanProdukTravelModel->update($pk_id_penjualan_produk_travel, $data) === true){
            $response = [
                'status' => 'success',
                'message' => 'Berhasil mengubah data penjualan produk'
            ];
        } else {
            $response['error'] = $this->penjualanProdukTravelModel->errors();
        }

        return json_encode($response);
    }

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
                COALESCE(c.harga_produk, 0) AS harga_produk,
                COALESCE(NULLIF(a.fk_id_travel, 0), NULL) as fk_id_travel,
                a.tgl_closing,
                COALESCE(a.komisi_agent, 0) AS komisi_agent,
                COALESCE(a.komisi_leader_agent, 0) AS komisi_leader_agent,
                COALESCE(a.passive_income_leader_agent, 0) AS passive_income_leader_agent,
                a.fk_id_agent_closing,
                f.nama_agent as nama_agent_closing,
                b.nama_customer,
                b.no_wa,
                b.email,
                b.kota_kabupaten,
                b.pk_id_customer
            FROM penjualan_produk_travel a
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            JOIN produk_travel c ON a.fk_id_produk_travel = c.pk_id_produk_travel
            LEFT JOIN agent d ON b.fk_id_agent = d.pk_id_agent
            LEFT JOIN agent e ON b.fk_id_leader_agent = e.pk_id_agent
            LEFT JOIN agent f ON a.fk_id_agent_closing = f.pk_id_agent
            WHERE pk_id_penjualan_produk_travel = $pk_id_penjualan_produk_travel
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
                status,
                b.no_wa,
                CASE 
                    WHEN b.fk_id_to_agent IS NULL aa.to_agent
                    ELSE 0
                END AS to_agent
            FROM penjualan_produk_travel a
            JOIN produk_travel aa ON a.fk_id_produk_travel = aa.pk_id_produk_travel
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            LEFT JOIN agent c ON b.fk_id_agent = c.pk_id_agent
            LEFT JOIN agent d ON b.fk_id_leader_agent = d.pk_id_agent
            LEFT JOIN travel e ON a.fk_id_travel = e.pk_id_travel
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND (a.fk_id_agent IS NOT NULL OR a.fk_id_leader_agent IS NOT NULL);
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

    public function deletePenjualanProdukTravel($pk_id_penjualan_produk_travel)
    {
        if($this->penjualanProdukTravelModel->delete($pk_id_penjualan_produk_travel) === true){
            
            $this->komisiPenjualanProdukTravelModel->where("fk_id_penjualan_produk_travel", $pk_id_penjualan_produk_travel)->delete();
            $this->pembayaranPenjualanProdukTravelModel->where("fk_id_penjualan_produk_travel", $pk_id_penjualan_produk_travel)->delete();

            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data penjualan'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data penjualan'
            ];
        }

        return json_encode($response);
    }

    public function getAllProdukTravel($fk_id_travel){
        $data = $this->produkTravelModel->like('fk_id_travel', $fk_id_travel)->orderby('nama_produk','asc')->findAll();

        return json_encode($data);
    }

    public function generateDataProdukTravel($fk_id_produk_travel){
        $data = $this->produkTravelModel->find($fk_id_produk_travel);

        return json_encode($data);
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
        ")->getRowArray();

        return json_encode($data);
    }

    public function getDataPembayaranPenjualanProdukTravel($pk_id_pembayaran_penjualan_produk_travel){
        $data = $this->pembayaranPenjualanProdukTravelModel->find($pk_id_pembayaran_penjualan_produk_travel);

        return json_encode($data);
    }

    public function saveDataPembayaranPenjualanProdukTravel(){
        $pk_id_pembayaran_penjualan_produk_travel = $this->request->getPost('pk_id_pembayaran_penjualan_produk_travel');
        
        $data = [
            'fk_id_penjualan_produk_travel' => $this->request->getPost('fk_id_penjualan_produk_travel'),
            'tgl_pembayaran' => $this->request->getPost('tgl_pembayaran'),
            'nominal' => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $penjualan = $this->penjualanProdukTravelModel->find($data['fk_id_penjualan_produk_travel']);

        $nominal = 0;

        if($pk_id_pembayaran_penjualan_produk_travel){
            $total_pembayaran = $this->db->query("
                SELECT
                    SUM(nominal) as total_pembayaran
                FROM pembayaran_penjualan_produk_travel
                WHERE fk_id_penjualan_produk_travel = $data[fk_id_penjualan_produk_travel]
                AND pk_id_pembayaran_penjualan_produk_travel != $pk_id_pembayaran_penjualan_produk_travel
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
                GROUP BY fk_id_penjualan_produk_travel
            ")->getRowArray();
        } else {
            $total_pembayaran = $this->db->query("
                SELECT
                    SUM(nominal) as total_pembayaran
                FROM pembayaran_penjualan_produk_travel
                WHERE fk_id_penjualan_produk_travel = $data[fk_id_penjualan_produk_travel]
                AND (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
                GROUP BY fk_id_penjualan_produk_travel
            ")->getRowArray();
        }

        
        if(!empty($total_pembayaran)){
            $nominal = $total_pembayaran['total_pembayaran'];
        }

        // var_dump(intval($nominal));
        // var_dump(intval($data['nominal']));
        // exit();

        if((intval($nominal) + intval($data['nominal'])) > $penjualan['harga_produk']){
            $response['error'] = [
                "nominal" => "Nominal melebihi sisa pembayaran"
            ];
        } else {
            $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');
        
            if ($bukti_pembayaran) {
                $rules = [
                    'bukti_pembayaran' => [
                        'rules' => 'max_size[bukti_pembayaran,1024]|ext_in[bukti_pembayaran,png,jpg,jpeg]',
                        'errors' => [
                            'max_size' => 'Gambar terlalu besar (max 1mb)',
                            'ext_in' => 'Gambar harus berupa png, jpg, atau jpeg'
                        ]
                    ]
                ];
    
                if ($this->validate($rules)) {
                    if ($bukti_pembayaran->isValid() && !$bukti_pembayaran->hasMoved()) {
                        $newName = $bukti_pembayaran->getRandomName();
                        if ($bukti_pembayaran->move('public/assets/bukti-pembayaran', $newName)) {
                            $data['bukti_pembayaran'] = $newName;
                        } else {
                            $response = [
                                "error" => $bukti_pembayaran->getErrorString()
                            ];
                        }
                    }
                } else {
                    $response = [
                        "error" => $this->validator->getErrors()
                    ];
                }
            }
            
            $searchData = $this->pembayaranPenjualanProdukTravelModel->find($pk_id_pembayaran_penjualan_produk_travel);
            if($searchData){
                if($this->pembayaranPenjualanProdukTravelModel->update($pk_id_pembayaran_penjualan_produk_travel, $data)){
                    if((intval($nominal) + intval($data['nominal'])) == $penjualan['harga_produk']){
                        $this->penjualanProdukTravelModel->allowCallbacks(false)->update($data['fk_id_penjualan_produk_travel'], ["status" => "lunas"]);
                    } else {
                        $this->penjualanProdukTravelModel->allowCallbacks(false)->update($data['fk_id_penjualan_produk_travel'], ["status" => "cicil"]);
                    }

                    $response = [
                        'status' => 'success',
                        'message' => 'Berhasil mengubah data pembayaran'
                    ];
                } else {
                    $response = [
                        "error" => $this->pembayaranPenjualanProdukTravelModel->errors()
                    ];
                }
            } else {
                if($this->pembayaranPenjualanProdukTravelModel->save($data)){
                    if((intval($nominal) + intval($data['nominal'])) == $penjualan['harga_produk']){
                        $this->penjualanProdukTravelModel->allowCallbacks(false)->update($data['fk_id_penjualan_produk_travel'], ["status" => "lunas"]);
                    } else {
                        $this->penjualanProdukTravelModel->allowCallbacks(false)->update($data['fk_id_penjualan_produk_travel'], ["status" => "cicil"]);
                    }

                    $response = [
                        'status' => 'success',
                        'message' => 'Berhasil menambahkan data pembayaran'
                    ];
                } else {
                    $response = [
                        "error" => $this->pembayaranPenjualanProdukTravelModel->errors()
                    ];
                }
            }
        }


        return json_encode($response);
    }

    public function hapusDataPembayaranTravel($pk_id_pembayaran_penjualan_produk_travel){
        $pembayaran = $this->pembayaranPenjualanProdukTravelModel->find($pk_id_pembayaran_penjualan_produk);

        if($this->pembayaranPenjualanProdukTravelModel->delete($pk_id_pembayaran_penjualan_produk) === true){
            $nominal = 0;
            $total_pembayaran = $this->db->query("
                SELECT
                    fk_id_penjualan_produk_travel,
                    SUM(nominal) as total
                FROM pembayaran_penjualan_produk _travel
                WHERE (deleted_at = '0000-00-00 00:00:00' OR deleted_at IS NULL)
                AND fk_id_penjualan_produk_travel = $pembayaran[fk_id_penjualan_produk_travel]
                GROUP BY fk_id_penjualan_produk_travel
            ")->getRowArray();

            if($total_pembayaran){
                $penjualan = $this->penjualanProdukTravelModel->find($total_pembayaran['fk_id_penjualan_produk']);

                if($total_pembayaran['total'] < $penjualan['harga_produk']){
                    $data = [
                        'status' => 'cicil'
                    ];
                    $this->penjualanProdukTravelModel->allowCallbacks(false)->update($pembayaran['fk_id_penjualan_produk'], $data);
                }
            } else {
                $data = [
                    'status' => 'cicil'
                ];
                $this->penjualanProdukModel->allowCallbacks(false)->update($pembayaran['fk_id_penjualan_produk'], $data);
            }

            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data pembayaran'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data pembayaran'
            ];
        }

        return json_encode($response);
    }

    // penjualan internal 
    public function getListPenjualanInternalProduk()
    {
        $query = "
            CREATE TEMPORARY TABLE ListPenjualanProduk AS
            SELECT
                pk_id_penjualan_produk,
                a.tgl_closing,
                b.nama_customer,
                a.nama_produk,
                e.nama_travel,
                a.harga_produk,
                status,
                b.no_wa,
                CASE 
                    WHEN b.fk_id_to_agent IS NULL THEN aa.to_agent
                    ELSE 0
                END AS to_agent,
                b.kota_kabupaten
            FROM penjualan_produk a
            JOIN produk aa ON a.fk_id_produk = aa.pk_id_produk
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            LEFT JOIN travel e ON a.fk_id_travel = e.pk_id_travel
            WHERE a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL
            AND a.fk_id_agent IS NULL 
            AND a.fk_id_leader_agent IS NULL;
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

    public function saveDataPenjualanProdukInternal()
    {
        $this->db->transBegin();

        $failed = false;

        $dataCustomer = [
            'nama_customer' => $this->request->getPost('nama_customer'),
            'no_wa' => $this->request->getPost('no_wa'),
            'kota_kabupaten' => $this->request->getPost('kota_kabupaten'),
            'email' => $this->request->getPost('email'),
            'fk_id_produk' => $this->request->getPost('fk_id_produk'),
            'jenis_produk' => 'produk',
        ];

        $is_send_wa = 0;
        $wa_message = '';

        if($this->customerModel->save($dataCustomer) === true){
            // cek data pembayaran
            $produk = $this->produkModel->find($dataCustomer['fk_id_produk']);
            $is_send_wa = $produk['send_wa_after_input_admin'];
            $wa_message = $produk['wa_message'];

            $nominal = $this->request->getPost('nominal');

            if($nominal > $produk['harga_produk']){
                $response['error'] = [
                    'nominal' => 'Nominal tidak boleh lebih besar dari harga produk'
                ];

                $failed = true;
            } else {

                $fk_id_customer = $this->customerModel->getInsertID();
                
                $dataPenjualan = [
                    'fk_id_customer' => $fk_id_customer,
                    'fk_id_produk' => $dataCustomer['fk_id_produk'],
                    'tgl_closing' => $this->request->getPost('tgl_closing'),
                    'fk_id_travel' => $this->request->getPost('fk_id_travel')
                ];

                if($nominal == $produk['harga_produk']){
                    $dataPenjualan['status'] = 'lunas';
                } else {
                    $dataPenjualan['status'] = 'cicil';
                }

                if (empty($dataPenjualan['tgl_closing'])) {
                    $response['error']['tgl_closing'] = 'Tgl closing harus diisi';
                    
                    $failed = true;
                    return json_encode($response);
                }

                $this->penjualanProdukModel->skipValidation(true);
                // $this->penjualanProdukModel->allowCallbacks(false);
                
                if ($this->penjualanProdukModel->save($dataPenjualan) === true) {
                    $fk_id_penjualan_produk = $this->penjualanProdukModel->getInsertID();

                    $dataPembayaran = [
                        'fk_id_penjualan_produk' => $fk_id_penjualan_produk,
                        'tgl_pembayaran' => $this->request->getPost('tgl_closing'),
                        'nominal' => $this->request->getPost('nominal'),
                        'keterangan' => $this->request->getPost('keterangan')
                    ];
    
                    $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');
    
                    if ($bukti_pembayaran) {
                        $rules = [
                            'bukti_pembayaran' => [
                                'rules' => 'max_size[bukti_pembayaran,1024]|ext_in[bukti_pembayaran,png,jpg,jpeg]',
                                'errors' => [
                                    'max_size' => 'Gambar terlalu besar (max 1mb)',
                                    'ext_in' => 'Gambar harus berupa png, jpg, atau jpeg'
                                ]
                            ]
                        ];
    
                        if ($this->validate($rules)) {
                            if ($bukti_pembayaran->isValid() && !$bukti_pembayaran->hasMoved()) {
                                $newName = $bukti_pembayaran->getRandomName();
                                if ($bukti_pembayaran->move('public/assets/bukti-pembayaran', $newName)) {
                                    $dataPembayaran['bukti_pembayaran'] = $newName;
    
                                    if ($this->pembayaranPenjualanProdukModel->save($dataPembayaran) === true) {
                                        $response = [
                                            'status' => 'success',
                                            'message' => 'Berhasil menambahkan pembayaran'
                                        ];
                                    } else {
                                        $response = [
                                            "error" => $this->pembayaranPenjualanProdukModel->errors()
                                        ];

                                        $failed = true;
                                    }
                                } else {
                                    $response = [
                                        "error" => $bukti_pembayaran->getErrorString()
                                    ];

                                    $failed = true;
                                }
                            }
                        } else {
                            $response = [
                                "error" => $this->validator->getErrors()
                            ];

                            $failed = true;
                        }
                    } else {
                        if ($this->pembayaranPenjualanProdukModel->save($dataPembayaran) === true) {
                            $response = [
                                'status' => 'success',
                                'message' => 'Berhasil menambahkan pembayaran'
                            ];
                        } else {
                            $response = [
                                "error" => $this->pembayaranPenjualanProdukModel->errors()
                            ];

                            $failed = true;
                        }
                    }
                } else {
                    $response = [
                        "error" => $this->penjualanProdukModel->errors()
                    ];

                    $failed = true;
                }
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
                    'message' => 'Gagal menambahkan penjualan'
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
                'message' => 'Berhasil menambahkan penjualan'
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

    // penjualan internal travel 
    public function getListPenjualanInternalProdukTravel()
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
                status,
                b.no_wa
            FROM penjualan_produk_travel a
            JOIN customer b ON a.fk_id_customer = b.pk_id_customer
            LEFT JOIN travel e ON a.fk_id_travel = e.pk_id_travel
            WHERE a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL
            AND a.fk_id_agent IS NULL 
            AND a.fk_id_leader_agent IS NULL;
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

    public function saveDataPenjualanProdukTravelInternal()
    {
        $this->db->transBegin();

        $failed = false;

        $dataCustomer = [
            'nama_customer' => $this->request->getPost('nama_customer'),
            'no_wa' => $this->request->getPost('no_wa'),
            'kota_kabupaten' => $this->request->getPost('kota_kabupaten'),
            'email' => $this->request->getPost('email'),
            'fk_id_produk' => $this->request->getPost('fk_id_produk'),
            'jenis_produk' => 'travel',
        ];

        if($this->customerModel->save($dataCustomer) === true){
            // cek data pembayaran
            $produk = $this->produkTravelModel->find($dataCustomer['fk_id_produk']);
            $nominal = $this->request->getPost('nominal');

            if($nominal > $produk['harga_produk']){
                $response['error'] = [
                    'nominal' => 'Nominal tidak boleh lebih besar dari harga produk'
                ];

                $failed = true;
            } else {

                $fk_id_customer = $this->customerModel->getInsertID();
                
                $dataPenjualan = [
                    'fk_id_customer' => $fk_id_customer,
                    'fk_id_produk_travel' => $dataCustomer['fk_id_produk'],
                    'tgl_closing' => $this->request->getPost('tgl_closing'),
                    'fk_id_travel' => $this->request->getPost('fk_id_travel')
                ];

                if($nominal == $produk['harga_produk']){
                    $dataPenjualan['status'] = 'lunas';
                } else {
                    $dataPenjualan['status'] = 'cicil';
                }

                if (empty($dataPenjualan['tgl_closing'])) {
                    $response['error']['tgl_closing'] = 'Tgl closing harus diisi';
                    
                    $failed = true;
                    return json_encode($response);
                }

                $this->penjualanProdukTravelModel->skipValidation(true);
                // $this->penjualanProdukTravelModel->allowCallbacks(false);
                
                if ($this->penjualanProdukTravelModel->save($dataPenjualan) === true) {
                    $fk_id_penjualan_produk_travel = $this->penjualanProdukTravelModel->getInsertID();

                    $dataPembayaran = [
                        'fk_id_penjualan_produk_travel' => $fk_id_penjualan_produk_travel,
                        'tgl_pembayaran' => $this->request->getPost('tgl_closing'),
                        'nominal' => $this->request->getPost('nominal'),
                        'keterangan' => $this->request->getPost('keterangan')
                    ];
    
                    $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');
    
                    if ($bukti_pembayaran) {
                        $rules = [
                            'bukti_pembayaran' => [
                                'rules' => 'max_size[bukti_pembayaran,1024]|ext_in[bukti_pembayaran,png,jpg,jpeg]',
                                'errors' => [
                                    'max_size' => 'Gambar terlalu besar (max 1mb)',
                                    'ext_in' => 'Gambar harus berupa png, jpg, atau jpeg'
                                ]
                            ]
                        ];
    
                        if ($this->validate($rules)) {
                            if ($bukti_pembayaran->isValid() && !$bukti_pembayaran->hasMoved()) {
                                $newName = $bukti_pembayaran->getRandomName();
                                if ($bukti_pembayaran->move('public/assets/bukti-pembayaran', $newName)) {
                                    $dataPembayaran['bukti_pembayaran'] = $newName;
    
                                    if ($this->pembayaranPenjualanProdukTravelModel->save($dataPembayaran) === true) {
                                        $response = [
                                            'status' => 'success',
                                            'message' => 'Berhasil menambahkan pembayaran'
                                        ];
                                    } else {
                                        $response = [
                                            "error" => $this->pembayaranPenjualanProdukTravelModel->errors()
                                        ];

                                        $failed = true;
                                    }
                                } else {
                                    $response = [
                                        "error" => $bukti_pembayaran->getErrorString()
                                    ];

                                    $failed = true;
                                }
                            }
                        } else {
                            $response = [
                                "error" => $this->validator->getErrors()
                            ];

                            $failed = true;
                        }
                    } else {
                        if ($this->pembayaranPenjualanProdukTravelModel->save($dataPembayaran) === true) {
                            $response = [
                                'status' => 'success',
                                'message' => 'Berhasil menambahkan pembayaran'
                            ];
                        } else {
                            $response = [
                                "error" => $this->pembayaranPenjualanProdukTravelModel->errors()
                            ];

                            $failed = true;
                        }
                    }
                } else {
                    $response = [
                        "error" => $this->penjualanProdukTravelModel->errors()
                    ];

                    $failed = true;
                }
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
                    'message' => 'Gagal menambahkan penjualan'
                ];
            }
        } else {
            $this->db->transCommit();

            $response = [
                'status' => 'success',
                'message' => 'Berhasil menambahkan penjualan'
            ];
        }

        return json_encode($response);
    }

    public function saveDataEditPenjualanProdukTravelInternal(){
        $this->db->transBegin();
        $failed = false;

        $pk_id_penjualan_produk_travel = $this->request->getPost('pk_id_penjualan_produk_travel');
        $pk_id_customer = $this->request->getPost('pk_id_customer');
        
        $data = [
            'fk_id_produk_travel'=> $this->request->getPost('fk_id_produk'),
            'fk_id_travel'=> $this->request->getPost('fk_id_travel'),
            'tgl_closing'=> $this->request->getPost('tgl_closing'),
            'fk_id_customer'=> $this->request->getPost('pk_id_customer')
        ];

        // var_dump($data);
        // exit();

        if (empty($data['tgl_closing'])) {
            $response['error']['tgl_closing'] = 'Tgl closing harus diisi';
            
            $failed = true;
            return json_encode($response);
        }

        $this->penjualanProdukTravelModel->skipValidation(false);
        
        if($this->penjualanProdukTravelModel->update($pk_id_penjualan_produk_travel, $data) === true){
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
            $response['error'] = $this->penjualanProdukTravelModel->errors();

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

    public function saveDuplikatDataPenjualanInternalProduk()
    {
        // Collect input data
        $data = [
            'fk_id_customer' => $this->request->getPost('fk_id_customer'),
            'fk_id_produk' => $this->request->getPost('fk_id_produk'),
            'tgl_closing' => $this->request->getPost('tgl_closing'),
            'fk_id_travel' => $this->request->getPost('fk_id_travel'),
            'fk_id_agent_closing' => $this->request->getPost('fk_id_agent_closing'),
        ];

        $customer = $this->customerModel->find($data['fk_id_customer']);
        $is_send_wa = 0;
        $wa_message = '';

        if (empty($data['fk_id_produk'])) {
            $response['error']['fk_id_produk'] = 'Produk harus diisi';
            return json_encode($response);
        }

        // cek data pembayaran
        $produk = $this->produkModel->find($data['fk_id_produk']);
        $is_send_wa = $produk['send_wa_after_input_admin'];
        $wa_message = $produk['wa_message'];

        $nominal = $this->request->getPost('nominal');

        if($nominal > $produk['harga_produk']){
            $response['error'] = [
                'nominal' => 'Nominal tidak boleh lebih besar dari harga produk'
            ];
        } else {
            if($nominal == $produk['harga_produk']){
                // $data['paid_komisi_agent'] = ($produk['jenis_komisi'] == 'fix') ? $produk['komisi_agent'] : $produk['harga_produk'] * $produk['komisi_agent'] / 100;
                // $data['paid_komisi_leader_agent'] = ($produk['jenis_komisi'] == 'fix') ? $produk['komisi_leader_agent'] : $produk['harga_produk'] * $produk['komisi_leader_agent'] / 100;
                // $data['paid_passive_income_leader_agent'] = ($produk['jenis_komisi'] == 'fix') ? $produk['passive_income_leader_agent'] : $produk['harga_produk'] * $produk['passive_income_leader_agent'] / 100;
                $data['status'] = 'lunas';
            } else {
                $data['status'] = 'cicil';
            }

            // Start transaction
            $this->db->transBegin();
            $failed = false;
    
            // Check if the sale record exists
            $this->penjualanProdukModel->skipValidation(true);

            // Save new sale record
            if ($this->penjualanProdukModel->save($data) === true) {
                $fk_id_penjualan_produk = $this->penjualanProdukModel->getInsertID();

                $dataPembayaran = [
                    'fk_id_penjualan_produk' => $fk_id_penjualan_produk,
                    'tgl_pembayaran' => $this->request->getPost('tgl_closing'),
                    'nominal' => $this->request->getPost('nominal'),
                    'keterangan' => $this->request->getPost('keterangan')
                ];

                $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');

                if ($bukti_pembayaran) {
                    $rules = [
                        'bukti_pembayaran' => [
                            'rules' => 'max_size[bukti_pembayaran,1024]|ext_in[bukti_pembayaran,png,jpg,jpeg]',
                            'errors' => [
                                'max_size' => 'Gambar terlalu besar (max 1mb)',
                                'ext_in' => 'Gambar harus berupa png, jpg, atau jpeg'
                            ]
                        ]
                    ];

                    if ($this->validate($rules)) {
                        if ($bukti_pembayaran->isValid() && !$bukti_pembayaran->hasMoved()) {
                            $newName = $bukti_pembayaran->getRandomName();
                            if ($bukti_pembayaran->move('public/assets/bukti-pembayaran', $newName)) {
                                $dataPembayaran['bukti_pembayaran'] = $newName;

                                if ($this->pembayaranPenjualanProdukModel->save($dataPembayaran) === true) {
                                    $response = [
                                        'status' => 'success',
                                        'message' => 'Berhasil menambahkan pembayaran'
                                    ];
                                } else {
                                    $response = [
                                        "error" => $this->pembayaranPenjualanProdukModel->errors()
                                    ];

                                    $failed = true;
                                }
                            } else {
                                $response = [
                                    "error" => $bukti_pembayaran->getErrorString()
                                ];

                                $failed = true;
                            }
                        }
                    } else {
                        $response = [
                            "error" => $this->validator->getErrors()
                        ];

                        $failed = true;
                    }
                } else {
                    if ($this->pembayaranPenjualanProdukModel->save($dataPembayaran) === true) {
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil menambahkan pembayaran'
                        ];
                    } else {
                        $response = [
                            "error" => $this->pembayaranPenjualanProdukModel->errors()
                        ];

                        $failed = true;
                    }
                }
            } else {
                $response = [
                    "error" => $this->penjualanProdukModel->errors()
                ];

                $failed = true;
            }
    
            if ($this->db->transStatus() === false || $failed) {
                $this->db->transRollback();
    
                if(!isset($response['error'])){
                    $response = [
                        'status' => 'error',
                        'message' => 'Gagal menambahkan penjualan'
                    ];
                }
            } else {
                $this->db->transCommit();
    
                if($is_send_wa){
                    $messageData = $wa_message;
        
                    $replace = [
                        '$nama_customer$' => $customer['nama_customer']
                    ];
        
                    // Replace placeholders with actual values
                    $message = str_replace(array_keys($replace), array_values($replace), $messageData);
        
                    send_wa($customer['no_wa'], $message);
                }
    
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil menambahkan penjualan'
                ];
            }
        }

        return json_encode($response);
    }

    public function toAgent($pk_id_penjualan_produk){
        $penjualan = $this->penjualanProdukModel->find($pk_id_penjualan_produk);
        $customer = $this->customerModel->find($penjualan['fk_id_customer']);
        $produk = $this->produkModel->find($penjualan['fk_id_produk']);
        $batch = $this->db->query("
            SELECT
                *
            FROM system_parameter
            WHERE setting_name = 'batch'
        ")->getRowArray();

        $agent = [
            "tgl_bergabung" => date('Y-m-d'),
            "nama_agent" => $customer['nama_customer'],
            "no_wa" => $customer['no_wa'],
            "email" => $customer['email'],
            "kota_kabupaten" => $customer['kota_kabupaten'],
            "tipe_agent" => $produk['tipe_agent'],
            "batch" => $batch['setting_value'],
            "area_status" => 1,
            'confirmed_at' => date('Y-m-d')
        ];

        if($penjualan['fk_id_agent_closing'] != NULL && $penjualan['fk_id_agent_closing'] != ''){
            $dataAgent = $this->agentModel->find($penjualan['fk_id_agent_closing']);
            if($dataAgent['tipe_agent'] == 'leader agent'){
                $agent['fk_id_leader_agent'] = $dataAgent['pk_id_agent'];
            }
        }


        // Start transaction
        $this->db->transBegin();
        $failed = false;

        $this->agentModel->skipValidation(true);
        if($this->agentModel->save($agent) === true){
            $pk_id_agent = $this->agentModel->getInsertID();

            $data = [
                'fk_id_to_agent' => $pk_id_agent
            ];

            if($this->customerModel->update($customer['pk_id_customer'], $data) !== true){
                $response = [
                    "error" => $this->customerModel->errors()
                ];
    
                $failed = true;
            }

        } else {
            $response = [
                "error" => $this->agentModel->errors()
            ];

            $failed = true;
        }

        if ($this->db->transStatus() === false || $failed) {
            $this->db->transRollback();

            if(!isset($response['error'])){
                $response = [
                    'status' => 'error',
                    'message' => 'Gagal mengubah customer menjadi agent'
                ];
            }
        } else {
            $this->db->transCommit();

            $messageData = $this->db->query("
                SELECT 
                    *
                FROM system_parameter
                WHERE setting_name = 'wa_message_konfirmasi_agent'
            ")->getRowArray();

            $replace = [
                '$nama_agent$' => $customer['nama_customer'],
                '$link_data$' => base_url()."/lengkapidataagent/".md5($pk_id_agent)
            ];

            $message = str_replace(array_keys($replace), array_values($replace), $messageData['setting_value']);

            send_wa($customer['no_wa'], $message);

            $response = [
                'status' => 'success',
                'message' => 'Berhasil mengubah customer menjadi agent'
            ];
        }

        return json_encode($response);
    }

    // komisi
    public function getDataKomisiPenjualanProduk($pk_id_komisi_penjualan_produk){
        $data = $this->db->query("
            SELECT
                a.*,
                b.nama_agent,
                b.pk_id_agent
            FROM komisi_penjualan_produk a
            JOIN agent b ON a.fk_id_agent = b.pk_id_agent
            WHERE pk_id_komisi_penjualan_produk = $pk_id_komisi_penjualan_produk
            AND (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
        ")->getRowArray();

        return json_encode($data);
    }

    public function saveDataKomisiPenjualanProduk(){
        $pk_id_komisi_penjualan_produk = $this->request->getPost('pk_id_komisi_penjualan_produk');
        
        $data = [
            'fk_id_penjualan_produk' => $this->request->getPost('fk_id_penjualan_produk'),
            'nominal' => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'catatan' => $this->request->getPost('catatan'),
            'fk_id_agent' => $this->request->getPost('fk_id_agent')
        ];

        $searchData = $this->komisiPenjualanProdukModel->find($pk_id_komisi_penjualan_produk);
        if($searchData){
            if($this->komisiPenjualanProdukModel->update($pk_id_komisi_penjualan_produk, $data)){

                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil mengubah data komisi'
                ];
            } else {
                $response = [
                    "error" => $this->komisiPenjualanProdukModel->errors()
                ];
            }
        } else {
            if($this->komisiPenjualanProdukModel->save($data)){

                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil menambahkan data komisi'
                ];
            } else {
                $response = [
                    "error" => $this->komisiPenjualanProdukModel->errors()
                ];
            }
        }


        return json_encode($response);
    }

    public function hapusDataKomisi($pk_id_komisi_penjualan_produk){
        $this->db->query("
            DELETE FROM komisi_penjualan_produk
            WHERE pk_id_komisi_penjualan_produk = $pk_id_komisi_penjualan_produk
        ");

        $response = [
            'status' => 'success',
            'message' => 'Berhasil menghapus data komisi'
        ];

        return json_encode($response);
    }
}
