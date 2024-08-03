<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgentModel;
use App\Models\StgAgentModel;
use App\Models\CustomerModel;
use App\Models\ProdukModel;
use App\Models\PenjualanProdukModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Exceptions\PageNotFoundException;

class Import extends BaseController
{
    public $stgAgentModel;
    public $agentModel;
    public $produkModel;
    public $customerModel;
    public $penjualanProdukModel;
    public $db;
    public $ses_pk_id_agent;

    public function __construct(){
        $this->stgAgentModel = new StgAgentModel();
        $this->agentModel = new AgentModel();
        $this->produkModel = new ProdukModel();
        $this->customerModel = new CustomerModel();
        $this->penjualanProdukModel = new PenjualanProdukModel();
        $this->db = db_connect();
        $this->ses_pk_id_agent = session()->get('pk_id_agent');
    }

    public function index()
    {
        // $this->db->transBegin();
        // $failed = false;

        $this->db->query("
            TRUNCATE TABLE agent
        ");

        $this->db->query("
            TRUNCATE TABLE customer
        ");

        $this->db->query("
            TRUNCATE TABLE penjualan_produk
        ");

        $this->db->query("
            TRUNCATE TABLE stg_agent
        ");

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load("public/Data Agent.xlsx");
        $agent = $spreadsheet->getActiveSheet()->toArray();

        foreach ($agent as $key => $value) {
            if($key == 0){
                continue;
            }

            $data = [
                "nama_agent" => $value[1],
                "no_wa" => $value[2],
                "email" => $value[3],
                "tipe_agent" => $value[4],
                "batch" => $value[5],
                "confirmed_at" => date('Y-m-d')
            ];

            if($data['batch'] >= 16 || $data['tipe_agent'] == 'leader agent'){
                $data['area_status'] = 1;
            }

            if($value[7] !== NULL){
                $dataAgent = $this->db->query("
                    SELECT
                        *
                    FROM agent
                    WHERE no_wa LIKE '%".$value[7]."%'
                    AND tipe_agent = 'leader agent'
                ")->getRowArray();
    
                if(!empty($dataAgent)){
                    $data['fk_id_leader_agent'] = $dataAgent['pk_id_agent'];
    
                    // echo $data['nama_agent'] . '' . $dataAgent['nama_agent'];
                }
            }

            $this->agentModel->skipValidation(true);
            if($this->agentModel->save($data) !== true){
                $response = [
                    "error" => $this->agentModel->errors()
                ];

                $failed = true;
                break;
            }
        }

        // if ($this->db->transStatus() === false || $failed) {
        //     $this->db->transRollback();

        //     if(!isset($response['error'])){
        //         $response = [
        //             'status' => 'error',
        //             'message' => 'Gagal import data agent'
        //         ];
        //     }
        // } else {
        //     $this->db->transCommit();

        //     $response = [
        //         'status' => 'success',
        //         'message' => 'Berhasil import data agent'
        //     ];
        // }

        // var_dump($response);
        echo "selesai";
    }

    public function kelas_gratis(){
        ini_set("memory_limit","512M");

        // $this->db->query("
        //     TRUNCATE TABLE customer
        // ");

        // $this->db->query("
        //     TRUNCATE TABLE penjualan_produk
        // ");

        // $this->db->query("
        //     TRUNCATE TABLE komisi_penjualan_produk
        // ");

        $this->db->transBegin();
        $failed = false;

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);

        $files = [
            // [
            //     "file" => "public/Kelas 7 Hari Digital Marketing Umroh 1.xlsx",
            //     "produk" => "Kelas 7 Hari Digital Marketing Umroh"
            // ],
            // [
            //     "file" => "public/Kelas 7 Hari Digital Marketing Umroh 2.xlsx",
            //     "produk" => "Kelas 7 Hari Digital Marketing Umroh"
            // ],
            // [
            //     "file" => "public/Kelas 7 Hari Digital Marketing Umroh 3.xlsx",
            //     "produk" => "Kelas 7 Hari Digital Marketing Umroh"
            // ],
            // [
            //     "file" => "public/Kelas 7 Hari Digital Marketing Umroh 4.xlsx",
            //     "produk" => "Kelas 7 Hari Digital Marketing Umroh"
            // ],
            // [
            //     "file" => "public/Data Peminat Haji Tanpa Antri.xlsx",
            //     "produk" => "Webinar Haji Tanpa Antri"
            // ],
            // [
            //     "file" => "public/Data Peminat Umroh Mudah.xlsx",
            //     "produk" => "Webinar Umroh Mudah"
            // ],
            // [
            //     "file" => "public/Data Peminat Umroh Ramadhan.xlsx",
            //     "produk" => "Webinar Umroh Ramadhan"
            // ],
            [
                "file" => "public/Data Peminat Webinar Umroh Edukasi.xlsx",
                "produk" => "Webinar Umroh Edukasi"
            ],
        ];

        foreach ($files as $file) {
            $spreadsheet = $reader->load($file['file']);
            $leads = $spreadsheet->getActiveSheet()->toArray();
    
            $produk = $this->db->query("
                SELECT
                    *
                FROM produk
                WHERE nama_produk = '$file[produk]'
            ")->getRowArray();
    
            foreach ($leads as $key => $value) {
                if($key == 0 || $value[1] == "" || $value[1] == NULL){
                    continue;
                }
    
                $agent = $this->db->query("
                    SELECT
                        *
                    FROM agent
                    WHERE no_wa LIKE '%".$value[6]."%'
                ")->getRowArray();
    
                $data = [
                    'nama_customer' => $value[1],
                    'no_wa' => $value[2],
                    'email' => $value[3],
                    'kota_kabupaten' => $value[4],
                    'fk_id_produk' => $produk['pk_id_produk'],
                    'jenis_produk' => 'produk'
                ];
    
                // jika ada data agent tentukan agent
                if(isset($agent)){
                    $data['fk_id_agent'] = $agent['pk_id_agent'];
                    // jika agent memiliki leader agent maka set leader agent leads seperti milik agent
                    if($agent['fk_id_leader_agent'] != '' || $agent['fk_id_leader_agent'] !== NULL){
                        $data['fk_id_leader_agent'] = $agent['fk_id_leader_agent'];
                    }
                }
    
                // simpan data leads
                $this->customerModel->skipValidation(true);
                if($this->customerModel->save($data) === true){
                    $fk_id_customer = $this->customerModel->getInsertID();
    
                    $dataPenjualan = [
                        'fk_id_customer' => $fk_id_customer,
                        'fk_id_produk' => $produk['pk_id_produk'],
                        'tgl_closing' => date('Y-m-d'),
                        'fk_id_travel' => $produk['fk_id_travel'],
                        'fk_id_agent_closing' => (isset($data['fk_id_agent'])) ? $data['fk_id_agent'] : NULL,
                        'status' => 'lunas'
                    ];
    
                    $this->penjualanProdukModel->skipValidation(true);
                    if ($this->penjualanProdukModel->save($dataPenjualan) !== true) {
                        $response = [
                            "error" => $this->penjualanProdukModel->errors()
                        ];
    
                        $failed = true;
    
                        break;
                    }
                } else {
                    $response = [
                        "error" => $this->customerModel->errors()
                    ];
    
                    $failed = true;
    
                    break;
                }
            }
        }


        if ($this->db->transStatus() === false || $failed) {
            $this->db->transRollback();

            if(!isset($response['error'])){
                $response = [
                    'status' => 'error',
                    'message' => 'Gagal import data'
                ];
            }
        } else {
            $this->db->transCommit();

            $response = [
                'status' => 'success',
                'message' => 'Berhasil import data'
            ];
        }

        var_dump($response);
    }




    public function download_template(){
        // Load the model to get the data (assuming you have a model for fetching products)
        $produk = $this->produkModel->where("is_active", 1)->find(); // Fetch all products

        // Load the existing Excel file
        $filePath = FCPATH . 'public/template setor peminat.xlsx';
        if (!file_exists($filePath)) {
            throw new PageNotFoundException("File not found: $filePath");
        }

        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getSheetByName('List'); // Select the sheet by name

        // Write product data to column B
        $row = 1; // Start writing from the first row
        foreach ($produk as $product) {
            $sheet->setCellValue('B' . $row, $product['nama_produk']); // Adjust field name as needed
            $row++;
        }

        // Save the updated file to a temporary location
        $tempFilePath = WRITEPATH . 'temp/template setor peminat.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($tempFilePath);

        // Force download of the updated file
        return $this->response->download($tempFilePath, null)
        ->setContentType('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }

    public function peminat(){
        $this->db->transBegin();
        $failed = false;

        // Aturan validasi
        $rules = [
            'fileUpload' => [
                'rules' => 'uploaded[fileUpload]|max_size[fileUpload,1024]|ext_in[fileUpload,xlsx]',
                'errors' => [
                    'uploaded' => 'File harus diisi',
                    'max_size' => 'File terlalu besar (maksimal 1 MB)',
                    'ext_in' => 'File harus berupa xlsx'
                ]
            ]
        ];

        // Validasi
        if ($this->validate($rules)) {
            $file = $this->request->getFile('fileUpload');

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($file);
            $leads = $spreadsheet->getActiveSheet()->toArray();

            $agent = $this->db->query("
                SELECT
                    *
                FROM agent 
                WHERE pk_id_agent = $this->ses_pk_id_agent
            ")->getRowArray();

            foreach ($leads as $key => $value) {
                if($key == 0){
                    continue;
                }

                if($value[0] !== NULL && ($value[1] === NULL || $value[2] === NULL || $value[4] === NULL || $value[5] === NULL)){
                    $response['error'] = '<p>Perhatikan kembali file yang Anda upload. Pastikan semua data berikut terisi dengan benar:</p>
                    <ul>
                        <li>Nama</li>
                        <li>No WA</li>
                        <li>Email</li>
                        <li>Produk</li>
                    </ul>
                    <p><b>Masalah ditemukan pada nomor ' . $value[0] . ':</b> Pastikan bahwa data pada baris nomor ' . $value[0] . ' telah diisi. Jika data pada baris tersebut tidak tersedia, silakan hapus baris nomor ' . $value[0] . ' dari file Anda dan coba upload kembali.</p>';

                
                    $failed = true;
                    return json_encode($response);
                }

                $produk = $this->db->query("
                    SELECT
                        *
                    FROM produk
                    WHERE nama_produk = '$value[5]'
                ")->getRowArray();

                $data = [
                    'nama_customer' => $value[1],
                    'no_wa' => $value[2],
                    'kota_kabupaten' => $value[3],
                    'email' => $value[4],
                    'fk_id_produk' => $produk['pk_id_produk'],
                    'jenis_produk' => 'produk',
                    'fk_id_agent' => $agent['pk_id_agent'],
                    'fk_id_leader_agent' => $agent['fk_id_leader_agent']
                ];

                if($this->customerModel->save($data) === true){
                    $fk_id_customer = $this->customerModel->getInsertID();

                    $dataPenjualan = [
                        'fk_id_customer' => $fk_id_customer,
                        'fk_id_produk' => $produk['pk_id_produk'],
                        'tgl_closing' => date('Y-m-d'),
                        'fk_id_travel' => $produk['fk_id_travel'],
                        'fk_id_agent_closing' => $data['fk_id_agent'],
                        'status' => ($produk['jenis_produk'] == 'free offer') ? 'lunas' : 'pending'
                    ];

                    if ($this->penjualanProdukModel->save($dataPenjualan) !== true) {
                        // $response = [
                        //     "error" => $this->penjualanProdukModel->errors()
                        // ];

                        $response['error'] = '<p>Perhatikan kembali file yang Anda upload. Pastikan semua data berikut terisi dengan benar:</p>
                        <ul>
                            <li>Nama</li>
                            <li>No WA</li>
                            <li>Email</li>
                            <li>Produk</li>
                        </ul>
                        <p><b>Masalah ditemukan pada nomor ' . $value[0] . ':</b> Pastikan bahwa data pada baris nomor ' . $value[0] . ' telah diisi. Jika data pada baris tersebut tidak tersedia, silakan hapus baris nomor ' . $value[0] . ' dari file Anda dan coba upload kembali.</p>';

                        $failed = true;

                        break;
                    }
                } else {
                    // $response = [
                    //     "error" => $this->customerModel->errors()
                    // ];
                    $response['error'] = '<p>Perhatikan kembali file yang Anda upload. Pastikan semua data berikut terisi dengan benar:</p>
                    <ul>
                        <li>Nama</li>
                        <li>No WA</li>
                        <li>Email</li>
                        <li>Produk</li>
                    </ul>
                    <p><b>Masalah ditemukan pada nomor ' . $value[0] . ':</b> Pastikan bahwa data pada baris nomor ' . $value[0] . ' telah diisi. Jika data pada baris tersebut tidak tersedia, silakan hapus baris nomor ' . $value[0] . ' dari file Anda dan coba upload kembali.</p>';

                    $failed = true;

                    break;
                }
            }
        } else {
            $response = [
                "error" => $this->validator->getErrors()
            ];

            $failed = true;
        }
        
        if ($this->db->transStatus() === false || $failed) {
            $this->db->transRollback();

            if(!isset($response['error'])){
                $response = [
                    'status' => 'error',
                    'message' => 'Gagal import data'
                ];
            }
        } else {
            $this->db->transCommit();

            $response = [
                'status' => 'success',
                'message' => 'Berhasil import data'
            ];
        }

        return json_encode($response);
    }
}
