<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgentModel;
use App\Models\StgAgentModel;
use App\Models\CustomerModel;
use App\Models\ProdukModel;
use App\Models\PenjualanProdukModel;
use App\Models\PembayaranPenjualanProdukModel;
use App\Models\ListSendWaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Exceptions\PageNotFoundException;
use DateTime;

class Import extends BaseController
{
    public $stgAgentModel;
    public $agentModel;
    public $produkModel;
    public $customerModel;
    public $penjualanProdukModel;
    public $pembayaranPenjualanProdukModel;
    public $listSendWaModel;
    public $db;
    public $ses_pk_id_agent;

    public function __construct(){
        $this->listSendWaModel = new ListSendWaModel();
        $this->stgAgentModel = new StgAgentModel();
        $this->agentModel = new AgentModel();
        $this->produkModel = new ProdukModel();
        $this->customerModel = new CustomerModel();
        $this->penjualanProdukModel = new PenjualanProdukModel();
        $this->pembayaranPenjualanProdukModel = new PembayaranPenjualanProdukModel();
        $this->db = db_connect();
        $this->ses_pk_id_agent = session()->get('pk_id_agent');
    }

    // public function fixAgent(){
        
    //     $this->db->transBegin();
    //     $failed = false;

    //     $listAgent = $this->db->query("
    //         SELECT
    //             *
    //         FROM edit_data_agent
    //     ")->getResultArray();

    //     foreach ($listAgent as $agent) {
    //         if($agent['agent_condition'] == 0){
    //             // seharusnya agent tidak memiliki leader
    //             // update terlebih dahulu fk_id_leader_agent = NULL data customernya
    //             $this->db->query("
    //                 UPDATE customer SET fk_id_leader_agent = NULL WHERE pk_id_customer = $agent[fk_id_customer]
    //             ");

    //             if ($this->db->error()['code'] != 0) {
    //                 // Menampilkan informasi error
    //                 echo 'Error Code: ' . $this->db->error()['code'];
    //                 echo 'Error Message: ' . $this->db->error()['message'];
    //                 $failed = true;

    //                 return;
    //             }

    //             // update terlebih dahulu fk_id_leader_agent = NULL data agentnya
    //             $this->db->query("
    //                 UPDATE agent SET fk_id_leader_agent = NULL WHERE pk_id_agent = $agent[fk_id_to_agent]
    //             ");
                
    //             if ($this->db->error()['code'] != 0) {
    //                 // Menampilkan informasi error
    //                 echo 'Error Code: ' . $this->db->error()['code'];
    //                 echo 'Error Message: ' . $this->db->error()['message'];
    //                 $failed = true;

    //                 return;
    //             }

    //             // update terlebih dahulu fk_id_leader_agent = NULL data penjualan agentnya
    //             $this->db->query("
    //                 UPDATE penjualan_produk SET fk_id_leader_agent = NULL WHERE fk_id_agent_closing = $agent[fk_id_to_agent]
    //             ");

    //             if ($this->db->error()['code'] != 0) {
    //                 // Menampilkan informasi error
    //                 echo 'Error Code: ' . $this->db->error()['code'];
    //                 echo 'Error Message: ' . $this->db->error()['message'];
    //                 $failed = true;

    //                 return;
    //             }

    //             // update terlebih dahulu fk_id_leader_agent = NULL data penjualan customernya
    //             $this->db->query("
    //                 UPDATE penjualan_produk SET fk_id_leader_agent = NULL WHERE fk_id_customer = $agent[fk_id_customer]
    //             ");

    //             if ($this->db->error()['code'] != 0) {
    //                 // Menampilkan informasi error
    //                 echo 'Error Code: ' . $this->db->error()['code'];
    //                 echo 'Error Message: ' . $this->db->error()['message'];
    //                 $failed = true;

    //                 return;
    //             }

    //             // update status
    //             $this->db->query("
    //                 UPDATE edit_data_agent SET status = 1 WHERE id = $agent[id]
    //             ");

    //             if ($this->db->error()['code'] != 0) {
    //                 // Menampilkan informasi error
    //                 echo 'Error Code: ' . $this->db->error()['code'];
    //                 echo 'Error Message: ' . $this->db->error()['message'];
    //                 $failed = true;

    //                 return;
    //             }
    //         } else if($agent['agent_condition'] == 2){
    //             // memiliki leader tapi sebelumnya leader adalah agent biasa
    //             // update terlebih dahulu fk_id_agent = fk_id_leader_agent, fk_id_leader_agent = NULL data customernya
    //             $this->db->query("
    //                 UPDATE customer SET fk_id_agent = fk_id_leader_agent, fk_id_leader_agent = NULL WHERE pk_id_customer = $agent[fk_id_customer]
    //             ");

    //             if ($this->db->error()['code'] != 0) {
    //                 // Menampilkan informasi error
    //                 echo 'Error Code: ' . $this->db->error()['code'];
    //                 echo 'Error Message: ' . $this->db->error()['message'];
    //                 $failed = true;

    //                 return;
    //             }

    //             // update terlebih dahulu fk_id_leader_agent = NULL data agentnya
    //             $this->db->query("
    //                 UPDATE agent SET fk_id_leader_agent = NULL WHERE pk_id_agent = $agent[fk_id_to_agent]
    //             ");

    //             if ($this->db->error()['code'] != 0) {
    //                 // Menampilkan informasi error
    //                 echo 'Error Code: ' . $this->db->error()['code'];
    //                 echo 'Error Message: ' . $this->db->error()['message'];
    //                 $failed = true;

    //                 return;
    //             }

    //             // update terlebih dahulu fk_id_agent = fk_id_leader_agent, fk_id_leader_agent = NULL data penjualan agentnya
    //             $this->db->query("
    //                 UPDATE penjualan_produk SET fk_id_agent = fk_id_leader_agent, fk_id_leader_agent = NULL WHERE fk_id_agent_closing = $agent[fk_id_to_agent]
    //             ");

    //             if ($this->db->error()['code'] != 0) {
    //                 // Menampilkan informasi error
    //                 echo 'Error Code: ' . $this->db->error()['code'];
    //                 echo 'Error Message: ' . $this->db->error()['message'];
    //                 $failed = true;

    //                 return;
    //             }

    //             // update terlebih dahulu fk_id_leader_agent = NULL data penjualan customernya
    //             $this->db->query("
    //                 UPDATE penjualan_produk SET fk_id_agent = fk_id_leader_agent, fk_id_leader_agent = NULL WHERE fk_id_customer = $agent[fk_id_customer]
    //             ");

    //             if ($this->db->error()['code'] != 0) {
    //                 // Menampilkan informasi error
    //                 echo 'Error Code: ' . $this->db->error()['code'];
    //                 echo 'Error Message: ' . $this->db->error()['message'];
    //                 $failed = true;

    //                 return;
    //             }

    //             // update status
    //             $this->db->query("
    //                 UPDATE edit_data_agent SET status = 1 WHERE id = $agent[id]
    //             ");

    //             if ($this->db->error()['code'] != 0) {
    //                 // Menampilkan informasi error
    //                 echo 'Error Code: ' . $this->db->error()['code'];
    //                 echo 'Error Message: ' . $this->db->error()['message'];
    //                 $failed = true;

    //                 return;
    //             }
    //         }
    //     }

    //     // update penjualan yang fk_id_agent_closing ada tapi fk_id_agent dan fk_id_leader_agent tidak ada 
    //     $this->db->query("
    //         update penjualan_produk 
    //         set fk_id_agent_closing = null 
    //         where fk_id_agent_closing is not null 
    //         and fk_id_agent is null 
    //         and fk_id_leader_agent is null
    //     ");

    //     if ($this->db->error()['code'] != 0) {
    //         // Menampilkan informasi error
    //         echo 'Error Code: ' . $this->db->error()['code'];
    //         echo 'Error Message: ' . $this->db->error()['message'];
    //         $failed = true;

    //         return;
    //     }

    //     // update status penjualan menjadi lunas untuk yang harga_produk = 0 dan status != 'lunas'
    //     $this->db->query("
    //         update penjualan_produk 
    //         set status = 'lunas' 
    //         where harga_produk = 0 
    //         and status != 'lunas'
    //     ");

    //     if ($this->db->error()['code'] != 0) {
    //         // Menampilkan informasi error
    //         echo 'Error Code: ' . $this->db->error()['code'];
    //         echo 'Error Message: ' . $this->db->error()['message'];
    //         $failed = true;

    //         return;
    //     }
        
    //     // update produk yang statusnya upgrade menjad lunas 
    //     $this->db->query("
    //         update penjualan_produk 
    //         set status = 'lunas' 
    //         where status = 'upgrade'
    //     ");

    //     if ($this->db->error()['code'] != 0) {
    //         // Menampilkan informasi error
    //         echo 'Error Code: ' . $this->db->error()['code'];
    //         echo 'Error Message: ' . $this->db->error()['message'];
    //         $failed = true;

    //         return;
    //     }

    //     if ($this->db->transStatus() === false || $failed) {
    //         $this->db->transRollback();

    //         if(!isset($response['error'])){
    //             $response = [
    //                 'status' => 'error',
    //                 'message' => 'Gagal import data'
    //             ];
    //         }
    //     } else {
    //         $this->db->transCommit();

    //         $response = [
    //             'status' => 'success',
    //             'message' => 'Berhasil import data'
    //         ];
    //     }

    //     var_dump($response);
    // }

    // public function agentSalah(){
    //     $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //     $reader->setReadDataOnly(true);
    //     $spreadsheet = $reader->load("public/Data Baru/Data Agent.xlsx");
    //     $agent = $spreadsheet->getActiveSheet()->toArray();

    //     $no = 1;

    //     $this->db->query("
    //         TRUNCATE TABLE data_agent_keliru
    //     ");

    //     // masukkan data sebagai customer
    //     foreach ($agent as $key => $value) {
    //         if($key <= 1){
    //             continue;
    //         }
            
    //         $agent_condition = 0;
    //         if($value[8] == 'Leader Agent'){
    //             $agent_condition = 1;
    //         } else if($value[8] != 'Leader Agent' && $value[8] !== NULL){
    //             $cekAgent = $this->db->query("
    //                 SELECT
    //                     *
    //                 FROM agent
    //                 WHERE no_wa LIKE '%$value[7]%'
    //             ")->getRowArray();

    //             if($cekAgent){
    //                 if($cekAgent['tipe_agent'] == 'leader agent'){
    //                     $agent_condition = 2;
    //                 }
    //             }
    //         }

    //         $data = [
    //             "nama_agent" => $value[1],
    //             "no_wa" => $value[2],
    //             "email" => $value[3],
    //             "tipe_agent" => $value[4],
    //             "status" => $value[9],
    //             "tgl_closing" => $value[13],
    //             "agent_condition" => $agent_condition
    //         ];

    //         // Load the query builder
    //         $builder = $this->db->table('data_agent_keliru');
            
    //         // Insert the data
    //         $builder->insert($data);
    //     }

    //     echo "cek";
    // }

    // public function agent_new(){
    //     $this->db->query("
    //         TRUNCATE TABLE agent
    //     ");

    //     $this->db->query("
    //         TRUNCATE TABLE customer
    //     ");

    //     $this->db->query("
    //         TRUNCATE TABLE penjualan_produk
    //     ");
        
    //     $this->db->query("
    //         TRUNCATE TABLE komisi_penjualan_produk
    //     ");

    //     $this->db->query("
    //         TRUNCATE TABLE pembayaran_penjualan_produk
    //     ");

    //     $this->db->query("
    //         TRUNCATE TABLE stg_agent
    //     ");

    //     $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //     $reader->setReadDataOnly(true);
    //     $spreadsheet = $reader->load("public/Data Baru/Data Agent.xlsx");
    //     $agent = $spreadsheet->getActiveSheet()->toArray();

    //     $no = 1;

    //     // masukkan data sebagai customer
    //     foreach ($agent as $key => $value) {
    //         if($key <= 1){
    //             continue;
    //         }

    //         // if($no == 5){
    //         //     break;
    //         // }
            

    //         if($value[4] == 'leader agent'){
    //             $produk = $this->db->query("
    //                 SELECT
    //                     *
    //                 FROM produk 
    //                 WHERE nama_produk = 'Upgrade Agent Ke Leader Agent'
    //             ")->getRowArray();
    //         } else if($value[4] == 'silver'){
    //             $produk = $this->db->query("
    //                 SELECT
    //                     *
    //                 FROM produk 
    //                 WHERE nama_produk = 'Agent Silver'
    //             ")->getRowArray();
    //         } else if($value[4] == 'gold'){
    //             $produk = $this->db->query("
    //                 SELECT
    //                     *
    //                 FROM produk 
    //                 WHERE nama_produk = 'Agent Gold'
    //             ")->getRowArray();
    //         } else {
    //             $produk['pk_id_produk'] = 1;
    //             $produk['fk_id_travel'] = 0;
    //         }

    //         $dataCustomer = [
    //             "nama_customer" => $value[1],
    //             "no_wa" => $value[2],
    //             "email" => $value[3],
    //             "fk_id_produk" => $produk['pk_id_produk'],
    //             'jenis_produk' => 'produk'
    //         ];

    //         if($value[7] != '' || $value[7] !== NULL){
    //             $dataAgent = $this->db->query("
    //                 SELECT
    //                     *
    //                 FROM agent
    //                 WHERE no_wa LIKE '%".$value[7]."%'
    //             ")->getRowArray();
    //         }

    //         $dataCustomer['fk_id_agent'] = NULL;
    //         $dataCustomer['fk_id_leader_agent'] = NULL;

    //         // jika ada data agent tentukan agent
    //         if(isset($dataAgent)){
    //             if($dataAgent['tipe_agent'] == 'leader agent'){
    //                 $dataCustomer['fk_id_leader_agent'] = $dataAgent['pk_id_agent'];

    //                 $fk_id_agent_closing = $dataAgent['pk_id_agent'];
    //             } else {
    //                 $dataCustomer['fk_id_agent'] = $dataAgent['pk_id_agent'];
    //                 // jika agent memiliki leader agent maka set leader agent leads seperti milik agent
    //                 if($dataAgent['fk_id_leader_agent'] != '' || $dataAgent['fk_id_leader_agent'] !== NULL){
    //                     $dataCustomer['fk_id_leader_agent'] = $dataAgent['fk_id_leader_agent'];
    //                 }

    //                 $fk_id_agent_closing = $dataAgent['pk_id_agent'];
    //             }
    //         }

    //         $query = '';
    //         if($dataCustomer['fk_id_agent'] === NULL){
    //             $query .= "AND fk_id_agent IS NULL ";
    //         } else {
    //             $query .= "AND fk_id_agent = $dataCustomer[fk_id_agent] ";
    //         }

    //         if($dataCustomer['fk_id_leader_agent'] === NULL){
    //             $query .= "AND fk_id_leader_agent IS NULL ";
    //         } else {
    //             $query .= "AND fk_id_leader_agent = $dataCustomer[fk_id_leader_agent] ";
    //         }
    //         // cek customer 
    //         $cekCustomer = $this->db->query("
    //             SELECT
    //                 *
    //             FROM customer WHERE no_wa = '$dataCustomer[no_wa]'
    //             $query
    //         ")->getRowArray();

    //         if(empty($cekCustomer)){
    //             // simpan data leads
    //             $this->customerModel->skipValidation(true);
    //             if($this->customerModel->save($dataCustomer) === true){
    //                 $fk_id_customer = $this->customerModel->getInsertID();
    
    //                 $dataPenjualan = [
    //                     'fk_id_customer' => $fk_id_customer,
    //                     'fk_id_produk' => $produk['pk_id_produk'],
    //                     'tgl_closing' => $this->convertToDate($value[13]),
    //                     'fk_id_travel' => $produk['fk_id_travel'],
    //                     'fk_id_agent_closing' => (isset($fk_id_agent_closing)) ? $fk_id_agent_closing : NULL,
    //                     'status' => $value[9],
    //                     'harga_produk' => $value[10],
    //                     'is_komisi' => $value[12]
    //                 ];
    
    //                 $this->penjualanProdukModel->skipValidation(true);
    //                 if ($this->penjualanProdukModel->save($dataPenjualan) !== true) {
    //                     $response = [
    //                         "error" => $this->penjualanProdukModel->errors()
    //                     ];
    
    //                     $failed = true;
    
    //                     break;
    //                 } else {
    //                     $fk_id_penjualan_produk = $this->penjualanProdukModel->getInsertID();
    
    //                     $dataPembayaran = [
    //                         'fk_id_penjualan_produk' => $fk_id_penjualan_produk,
    //                         'tgl_pembayaran' => $this->convertToDate($value[13]),
    //                         'nominal' => $value[11],
    //                         'keterangan' => '-'
    //                     ];
    
    //                     if ($this->pembayaranPenjualanProdukModel->save($dataPembayaran) !== true) {
    //                         $response = [
    //                             "error" => $this->pembayaranPenjualanProdukModel->errors()
    //                         ];
        
    //                         $failed = true;
        
    //                         break;
    //                     } else {
    //                         $data = [
    //                             "nama_agent" => $value[1],
    //                             "no_wa" => $value[2],
    //                             "email" => $value[3],
    //                             "tipe_agent" => $value[4],
    //                             "batch" => $value[5],
    //                             "confirmed_at" => date('Y-m-d')
    //                         ];
                
    //                         if($data['batch'] >= 16 || $data['tipe_agent'] == 'leader agent'){
    //                             $data['area_status'] = 1;
    //                         }
                
    //                         if($value[7] !== NULL){
    //                             $dataAgent = $this->db->query("
    //                                 SELECT
    //                                     *
    //                                 FROM agent
    //                                 WHERE no_wa LIKE '%".$value[7]."%'
    //                                 AND tipe_agent = 'leader agent'
    //                             ")->getRowArray();
                    
    //                             if(!empty($dataAgent)){
    //                                 $data['fk_id_leader_agent'] = $dataAgent['pk_id_agent'];
    //                                 $data['la_double'] = $dataAgent['pk_id_agent'];
    //                                 // echo $data['nama_agent'] . '' . $dataAgent['nama_agent'];
    //                             }
    //                         }
    
    //                         // cek apakah agent sudah terdaftar
    //                         $is_agent = $this->db->query("
    //                             SELECT
    //                                 *
    //                             FROM agent
    //                             WHERE no_wa LIKE '%$value[2]%'
    //                         ")->getRowArray();
    
    //                         if(empty($is_agent)){
    //                             $this->agentModel->skipValidation(true);
    //                             if($this->agentModel->save($data) !== true){
    //                                 $response = [
    //                                     "error" => $this->agentModel->errors()
    //                                 ];
                    
    //                                 $failed = true;
    //                                 break;
    //                             } else {
    //                                 $fk_id_agent = $this->agentModel->getInsertID();
        
    //                                 $this->db->query("
    //                                     UPDATE customer
    //                                     SET fk_id_to_agent = $fk_id_agent
    //                                     WHERE pk_id_customer = $fk_id_customer
    //                                 ");
    //                             }
    //                         } else {
    //                             // jika agent sudah terdaftar dan memiliki leader agent
    //                             if($is_agent['fk_id_leader_agent'] != NULL || $is_agent['fk_id_leader_agent'] != 0){
    //                                 if($value[7] != '' || $value[7] !== NULL){
    //                                     $dataAgent = $this->db->query("
    //                                         SELECT
    //                                             *
    //                                         FROM agent
    //                                         WHERE no_wa LIKE '%".$value[7]."%'
    //                                     ")->getRowArray();
    
    //                                     if($dataAgent['tipe_agent'] == 'leader agent'){
    //                                         $this->db->query("
    //                                             UPDATE agent
    //                                             SET la_double = CONCAT(la_double, ',', $dataAgent[pk_id_agent])
    //                                             WHERE pk_id_agent = $is_agent[pk_id_agent]
    //                                         ");
    //                                     }
    //                                 }
    //                             } else {
    //                                 // jika agent sudah terdaftar dan tidak memiliki leader agent
    //                                 if($value[7] != '' || $value[7] !== NULL){
    //                                     $dataAgent = $this->db->query("
    //                                         SELECT
    //                                             *
    //                                         FROM agent
    //                                         WHERE no_wa LIKE '%".$value[7]."%'
    //                                     ")->getRowArray();
    
    //                                     if($dataAgent['tipe_agent'] == 'leader agent'){
    //                                         $this->db->query("
    //                                             UPDATE agent
    //                                             SET 
    //                                             la_double = CASE
    //                                                 WHEN la_double = '' OR la_double IS NULL THEN CAST($dataAgent[pk_id_agent] AS CHAR)
    //                                                 ELSE CONCAT(la_double, ',', $dataAgent[pk_id_agent])
    //                                             END,
    //                                             fk_id_leader_agent = $dataAgent[pk_id_agent]
    //                                             WHERE pk_id_agent = $is_agent[pk_id_agent]
    //                                         ");
    //                                     }
    //                                 }
    //                             }
    
    
    //                         }
    //                     }
    //                 }
    //             }
    //         } else {
    //             $fk_id_customer = $cekCustomer['pk_id_customer'];
    
    //             $dataPenjualan = [
    //                 'fk_id_customer' => $fk_id_customer,
    //                 'fk_id_produk' => $produk['pk_id_produk'],
    //                 'tgl_closing' => $this->convertToDate($value[13]),
    //                 'fk_id_travel' => $produk['fk_id_travel'],
    //                 'fk_id_agent_closing' => (isset($fk_id_agent_closing)) ? $fk_id_agent_closing : NULL,
    //                 'status' => $value[9],
    //                 'harga_produk' => $value[10],
    //                 'is_komisi' => $value[12]
    //             ];

    //             $this->penjualanProdukModel->skipValidation(true);
    //             if ($this->penjualanProdukModel->save($dataPenjualan) !== true) {
    //                 $response = [
    //                     "error" => $this->penjualanProdukModel->errors()
    //                 ];

    //                 $failed = true;

    //                 break;
    //             } else {
    //                 $fk_id_penjualan_produk = $this->penjualanProdukModel->getInsertID();

    //                 $dataPembayaran = [
    //                     'fk_id_penjualan_produk' => $fk_id_penjualan_produk,
    //                     'tgl_pembayaran' => $this->convertToDate($value[13]),
    //                     'nominal' => $value[11],
    //                     'keterangan' => '-'
    //                 ];

    //                 if ($this->pembayaranPenjualanProdukModel->save($dataPembayaran) !== true) {
    //                     $response = [
    //                         "error" => $this->pembayaranPenjualanProdukModel->errors()
    //                     ];
    
    //                     $failed = true;
    
    //                     break;
    //                 } else {
    //                     $data = [
    //                         "nama_agent" => $value[1],
    //                         "no_wa" => $value[2],
    //                         "email" => $value[3],
    //                         "tipe_agent" => $value[4],
    //                         "batch" => $value[5],
    //                         "confirmed_at" => date('Y-m-d')
    //                     ];
            
    //                     if($data['batch'] >= 16 || $data['tipe_agent'] == 'leader agent'){
    //                         $data['area_status'] = 1;
    //                     }
            
    //                     if($value[7] !== NULL){
    //                         $dataAgent = $this->db->query("
    //                             SELECT
    //                                 *
    //                             FROM agent
    //                             WHERE no_wa LIKE '%".$value[7]."%'
    //                             AND tipe_agent = 'leader agent'
    //                         ")->getRowArray();
                
    //                         if(!empty($dataAgent)){
    //                             $data['fk_id_leader_agent'] = $dataAgent['pk_id_agent'];
    //                             $data['la_double'] = $dataAgent['pk_id_agent'];
    //                             // echo $data['nama_agent'] . '' . $dataAgent['nama_agent'];
    //                         }
    //                     }

    //                     // cek apakah agent sudah terdaftar
    //                     $is_agent = $this->db->query("
    //                         SELECT
    //                             *
    //                         FROM agent
    //                         WHERE no_wa LIKE '%$value[2]%'
    //                     ")->getRowArray();

    //                     if(empty($is_agent)){
    //                         $this->agentModel->skipValidation(true);
    //                         if($this->agentModel->save($data) !== true){
    //                             $response = [
    //                                 "error" => $this->agentModel->errors()
    //                             ];
                
    //                             $failed = true;
    //                             break;
    //                         } else {
    //                             $fk_id_agent = $this->agentModel->getInsertID();
    
    //                             $this->db->query("
    //                                 UPDATE customer
    //                                 SET fk_id_to_agent = $fk_id_agent
    //                                 WHERE pk_id_customer = $fk_id_customer
    //                             ");
    //                         }
    //                     } else {
    //                         // jika agent sudah terdaftar dan memiliki leader agent
    //                         if($is_agent['fk_id_leader_agent'] != NULL || $is_agent['fk_id_leader_agent'] != 0){
    //                             if($value[7] != '' || $value[7] !== NULL){
    //                                 $dataAgent = $this->db->query("
    //                                     SELECT
    //                                         *
    //                                     FROM agent
    //                                     WHERE no_wa LIKE '%".$value[7]."%'
    //                                 ")->getRowArray();

    //                                 if($dataAgent['tipe_agent'] == 'leader agent'){
    //                                     $this->db->query("
    //                                         UPDATE agent
    //                                         SET la_double = CONCAT(la_double, ',', $dataAgent[pk_id_agent])
    //                                         WHERE pk_id_agent = $is_agent[pk_id_agent]
    //                                     ");
    //                                 }
    //                             }
    //                         } else {
    //                             // jika agent sudah terdaftar dan tidak memiliki leader agent
    //                             if($value[7] != '' || $value[7] !== NULL){
    //                                 $dataAgent = $this->db->query("
    //                                     SELECT
    //                                         *
    //                                     FROM agent
    //                                     WHERE no_wa LIKE '%".$value[7]."%'
    //                                 ")->getRowArray();

    //                                 if($dataAgent['tipe_agent'] == 'leader agent'){
    //                                     $this->db->query("
    //                                         UPDATE agent
    //                                         SET 
    //                                         la_double = CASE
    //                                             WHEN la_double = '' OR la_double IS NULL THEN CAST($dataAgent[pk_id_agent] AS CHAR)
    //                                             ELSE CONCAT(la_double, ',', $dataAgent[pk_id_agent])
    //                                         END,
    //                                         fk_id_leader_agent = $dataAgent[pk_id_agent]
    //                                         WHERE pk_id_agent = $is_agent[pk_id_agent]
    //                                     ");
    //                                 }
    //                             }
    //                         }


    //                     }
    //                 }
    //             }
    //         }



    //         $no++;
    //     }

    //     $data = $this->db->query("
    //         SELECT pk_id_agent, nama_agent, la_double FROM agent WHERE la_double LIKE '%,%';
    //     ")->getResultArray();

    //     foreach ($data as $agent) {
    //         $id_id = explode(',', $agent['la_double']);
    //         if (!$this->allValuesAreSame($id_id)) {
    //             $this->db->query("
    //                 UPDATE agent 
    //                 SET fk_id_leader_agent = NULL
    //                 WHERE pk_id_agent = $agent[pk_id_agent]
    //             ");
    //         }
    //     }

    //     echo "selesai";
    // }

    public function allValuesAreSame($values) {
        $firstValue = $values[0];
        foreach ($values as $value) {
            if ($value !== $firstValue) {
                return false;
            }
        }
        return true;
    }

    // public function agent(){
    //     $this->db->query("
    //         TRUNCATE TABLE agent
    //     ");

    //     $this->db->query("
    //         TRUNCATE TABLE customer
    //     ");

    //     $this->db->query("
    //         TRUNCATE TABLE penjualan_produk
    //     ");
        
    //     $this->db->query("
    //         TRUNCATE TABLE komisi_penjualan_produk
    //     ");

    //     $this->db->query("
    //         TRUNCATE TABLE pembayaran_penjualan_produk
    //     ");

    //     $this->db->query("
    //         TRUNCATE TABLE stg_agent
    //     ");

    //     $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //     $reader->setReadDataOnly(true);
    //     $spreadsheet = $reader->load("public/Data Baru/Data Agent.xlsx");
    //     $agent = $spreadsheet->getActiveSheet()->toArray();

    //     $no = 1;

    //     // masukkan data sebagai customer
    //     foreach ($agent as $key => $value) {
    //         if($key <= 1){
    //             continue;
    //         }

    //         // if($no == 5){
    //         //     break;
    //         // }
            
    //         // cek apakah agent sudah terdaftar
    //         $is_agent = $this->db->query("
    //             SELECT
    //                 *
    //             FROM agent
    //             WHERE no_wa LIKE '%$value[2]%'
    //         ")->getRowArray();

    //         if($value[4] == 'leader agent'){
    //             $produk = $this->db->query("
    //                 SELECT
    //                     *
    //                 FROM produk 
    //                 WHERE nama_produk = 'Upgrade Agent Ke Leader Agent'
    //             ")->getRowArray();
    //         } else if($value[4] == 'silver'){
    //             $produk = $this->db->query("
    //                 SELECT
    //                     *
    //                 FROM produk 
    //                 WHERE nama_produk = 'Agent Silver'
    //             ")->getRowArray();
    //         } else if($value[4] == 'gold'){
    //             $produk = $this->db->query("
    //                 SELECT
    //                     *
    //                 FROM produk 
    //                 WHERE nama_produk = 'Agent Gold'
    //             ")->getRowArray();
    //         } else {
    //             $produk['pk_id_produk'] = 1;
    //             $produk['fk_id_travel'] = 0;
    //         }

    //         // jika agent belum terdaftar 
    //         if(empty($is_agent)){
    //             $dataCustomer = [
    //                 "nama_customer" => $value[1],
    //                 "no_wa" => $value[2],
    //                 "email" => $value[3],
    //                 "fk_id_produk" => $produk['pk_id_produk'],
    //                 'jenis_produk' => 'produk'
    //             ];
    
    //             if($value[7] != '' || $value[7] !== NULL){
    //                 $dataAgent = $this->db->query("
    //                     SELECT
    //                         *
    //                     FROM agent
    //                     WHERE no_wa LIKE '%".$value[7]."%'
    //                 ")->getRowArray();
    //             }
    
    //             // jika ada data agent tentukan agent
    //             if(isset($dataAgent)){
    //                 if($dataAgent['tipe_agent'] == 'leader agent'){
    //                     $dataCustomer['fk_id_leader_agent'] = $dataAgent['pk_id_agent'];
    
    //                     $fk_id_agent_closing = $dataAgent['pk_id_agent'];
    //                 } else {
    //                     $dataCustomer['fk_id_agent'] = $dataAgent['pk_id_agent'];
    //                     // jika agent memiliki leader agent maka set leader agent leads seperti milik agent
    //                     if($dataAgent['fk_id_leader_agent'] != '' || $dataAgent['fk_id_leader_agent'] !== NULL){
    //                         $dataCustomer['fk_id_leader_agent'] = $dataAgent['fk_id_leader_agent'];
    //                     }
    
    //                     $fk_id_agent_closing = $dataAgent['pk_id_agent'];
    //                 }
    //             }
    
    //             // simpan data leads
    //             $this->customerModel->skipValidation(true);
    //             if($this->customerModel->save($dataCustomer) === true){
    //                 $fk_id_customer = $this->customerModel->getInsertID();
    
    //                 $dataPenjualan = [
    //                     'fk_id_customer' => $fk_id_customer,
    //                     'fk_id_produk' => $produk['pk_id_produk'],
    //                     'tgl_closing' => $this->convertToDate($value[13]),
    //                     'fk_id_travel' => $produk['fk_id_travel'],
    //                     'fk_id_agent_closing' => (isset($fk_id_agent_closing)) ? $fk_id_agent_closing : NULL,
    //                     'status' => $value[9],
    //                     'harga_produk' => $value[10],
    //                     'is_komisi' => $value[12]
    //                 ];
    
    //                 $this->penjualanProdukModel->skipValidation(true);
    //                 if ($this->penjualanProdukModel->save($dataPenjualan) !== true) {
    //                     $response = [
    //                         "error" => $this->penjualanProdukModel->errors()
    //                     ];
    
    //                     $failed = true;
    
    //                     break;
    //                 } else {
    //                     $fk_id_penjualan_produk = $this->penjualanProdukModel->getInsertID();
    
    //                     $dataPembayaran = [
    //                         'fk_id_penjualan_produk' => $fk_id_penjualan_produk,
    //                         'tgl_pembayaran' => $this->convertToDate($value[13]),
    //                         'nominal' => $value[11],
    //                         'keterangan' => '-'
    //                     ];
    
    //                     if ($this->pembayaranPenjualanProdukModel->save($dataPembayaran) !== true) {
    //                         $response = [
    //                             "error" => $this->pembayaranPenjualanProdukModel->errors()
    //                         ];
        
    //                         $failed = true;
        
    //                         break;
    //                     } else {
    //                         $data = [
    //                             "nama_agent" => $value[1],
    //                             "no_wa" => $value[2],
    //                             "email" => $value[3],
    //                             "tipe_agent" => $value[4],
    //                             "batch" => $value[5],
    //                             "confirmed_at" => date('Y-m-d')
    //                         ];
                
    //                         if($data['batch'] >= 16 || $data['tipe_agent'] == 'leader agent'){
    //                             $data['area_status'] = 1;
    //                         }
                
    //                         if($value[7] !== NULL){
    //                             $dataAgent = $this->db->query("
    //                                 SELECT
    //                                     *
    //                                 FROM agent
    //                                 WHERE no_wa LIKE '%".$value[7]."%'
    //                                 AND tipe_agent = 'leader agent'
    //                             ")->getRowArray();
                    
    //                             if(!empty($dataAgent)){
    //                                 $data['fk_id_leader_agent'] = $dataAgent['pk_id_agent'];
                    
    //                                 // echo $data['nama_agent'] . '' . $dataAgent['nama_agent'];
    //                             }
    //                         }
                
    //                         $this->agentModel->skipValidation(true);
    //                         if($this->agentModel->save($data) !== true){
    //                             $response = [
    //                                 "error" => $this->agentModel->errors()
    //                             ];
                
    //                             $failed = true;
    //                             break;
    //                         } else {
    //                             $fk_id_agent = $this->agentModel->getInsertID();
    
    //                             $this->db->query("
    //                                 UPDATE customer
    //                                 SET fk_id_to_agent = $fk_id_agent
    //                                 WHERE pk_id_customer = $fk_id_customer
    //                             ");
    //                         }
    //                     }
    //                 }
    //             }
    //         } else {
    //             // jika agent sudah terdaftar

    //             $customer = $this->db->query("
    //                 SELECT
    //                     *
    //                 FROM customer
    //                 WHERE no_wa LIKE '%$value[2]%'
    //             ")->getRowArray();

    //             $fk_id_customer = $customer['pk_id_customer'];

    //             if($value[7] != '' || $value[7] !== NULL){
    //                 $dataAgent = $this->db->query("
    //                     SELECT
    //                         *
    //                     FROM agent
    //                     WHERE no_wa LIKE '%".$value[7]."%'
    //                 ")->getRowArray();
    //             }
    
    //             // jika ada data agent tentukan agent
    //             if(isset($dataAgent)){
    //                 if($dataAgent['tipe_agent'] == 'leader agent'){
    //                     $dataCustomer['fk_id_leader_agent'] = $dataAgent['pk_id_agent'];
    
    //                     $fk_id_agent_closing = $dataAgent['pk_id_agent'];
    //                 } else {
    //                     $dataCustomer['fk_id_agent'] = $dataAgent['pk_id_agent'];
    //                     // jika agent memiliki leader agent maka set leader agent leads seperti milik agent
    //                     if($dataAgent['fk_id_leader_agent'] != '' || $dataAgent['fk_id_leader_agent'] !== NULL){
    //                         $dataCustomer['fk_id_leader_agent'] = $dataAgent['fk_id_leader_agent'];
    //                     }
    
    //                     $fk_id_agent_closing = $dataAgent['pk_id_agent'];
    //                 }
    //             }
    
    //             $dataPenjualan = [
    //                 'fk_id_customer' => $fk_id_customer,
    //                 'fk_id_produk' => $produk['pk_id_produk'],
    //                 'tgl_closing' => $this->convertToDate($value[13]),
    //                 'fk_id_travel' => $produk['fk_id_travel'],
    //                 'fk_id_agent_closing' => (isset($fk_id_agent_closing)) ? $fk_id_agent_closing : NULL,
    //                 'status' => ($value[9] == 'upgrade') ? 'lunas' : $value[9],
    //                 'harga_produk' => $value[10],
    //                 'is_komisi' => $value[12]
    //             ];

    //             $this->penjualanProdukModel->skipValidation(true);
    //             if ($this->penjualanProdukModel->save($dataPenjualan) !== true) {
    //                 $response = [
    //                     "error" => $this->penjualanProdukModel->errors()
    //                 ];

    //                 $failed = true;

    //                 break;
    //             } else {
    //                 $fk_id_penjualan_produk = $this->penjualanProdukModel->getInsertID();

    //                 $dataPembayaran = [
    //                     'fk_id_penjualan_produk' => $fk_id_penjualan_produk,
    //                     'tgl_pembayaran' => $this->convertToDate($value[13]),
    //                     'nominal' => $value[11],
    //                     'keterangan' => '-'
    //                 ];

    //                 if ($this->pembayaranPenjualanProdukModel->save($dataPembayaran) !== true) {
    //                     $response = [
    //                         "error" => $this->pembayaranPenjualanProdukModel->errors()
    //                     ];
    
    //                     $failed = true;
    
    //                     break;
    //                 } else {
    //                     if($value[4] != 'leader agent' && $is_agent['tipe_agent'] != 'leader agent'){
    //                         $this->db->query("
    //                             UPDATE agent
    //                             SET tipe_agent = '$value[4]',
    //                             batch = $value[5]
    //                             WHERE pk_id_agent = $is_agent[pk_id_agent]
    //                         ");
    //                     }
    //                 }
    //             }
    //         }


    //         $no++;
    //     }

    //     echo "selesai";
    // }

    // public function index()
    // {
    //     // $this->db->transBegin();
    //     // $failed = false;

    //     $this->db->query("
    //         TRUNCATE TABLE agent
    //     ");

    //     $this->db->query("
    //         TRUNCATE TABLE customer
    //     ");

    //     $this->db->query("
    //         TRUNCATE TABLE penjualan_produk
    //     ");

    //     $this->db->query("
    //         TRUNCATE TABLE stg_agent
    //     ");

    //     $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //     $reader->setReadDataOnly(true);
    //     $spreadsheet = $reader->load("public/Data Agent.xlsx");
    //     $agent = $spreadsheet->getActiveSheet()->toArray();

    //     foreach ($agent as $key => $value) {
    //         if($key == 0){
    //             continue;
    //         }

    //         $data = [
    //             "nama_agent" => $value[1],
    //             "no_wa" => $value[2],
    //             "email" => $value[3],
    //             "tipe_agent" => $value[4],
    //             "batch" => $value[5],
    //             "confirmed_at" => date('Y-m-d')
    //         ];

    //         if($data['batch'] >= 16 || $data['tipe_agent'] == 'leader agent'){
    //             $data['area_status'] = 1;
    //         }

    //         if($value[7] !== NULL){
    //             $dataAgent = $this->db->query("
    //                 SELECT
    //                     *
    //                 FROM agent
    //                 WHERE no_wa LIKE '%".$value[7]."%'
    //                 AND tipe_agent = 'leader agent'
    //             ")->getRowArray();
    
    //             if(!empty($dataAgent)){
    //                 $data['fk_id_leader_agent'] = $dataAgent['pk_id_agent'];
    
    //                 // echo $data['nama_agent'] . '' . $dataAgent['nama_agent'];
    //             }
    //         }

    //         $this->agentModel->skipValidation(true);
    //         if($this->agentModel->save($data) !== true){
    //             $response = [
    //                 "error" => $this->agentModel->errors()
    //             ];

    //             $failed = true;
    //             break;
    //         }
    //     }

    //     // if ($this->db->transStatus() === false || $failed) {
    //     //     $this->db->transRollback();

    //     //     if(!isset($response['error'])){
    //     //         $response = [
    //     //             'status' => 'error',
    //     //             'message' => 'Gagal import data agent'
    //     //         ];
    //     //     }
    //     // } else {
    //     //     $this->db->transCommit();

    //     //     $response = [
    //     //         'status' => 'success',
    //     //         'message' => 'Berhasil import data agent'
    //     //     ];
    //     // }

    //     // var_dump($response);
    //     echo "selesai";
    // }

    // public function kelas_gratis(){
    //     ini_set("memory_limit","512M");

    //     // $this->db->query("
    //     //     TRUNCATE TABLE customer
    //     // ");

    //     // $this->db->query("
    //     //     TRUNCATE TABLE penjualan_produk
    //     // ");

    //     // $this->db->query("
    //     //     TRUNCATE TABLE komisi_penjualan_produk
    //     // ");

    //     $this->db->transBegin();
    //     $failed = false;

    //     $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //     $reader->setReadDataOnly(true);

    //     $files = [
    //         // [
    //         //     "file" => "public/Kelas 7 Hari Digital Marketing Umroh 1.xlsx",
    //         //     "produk" => "Kelas 7 Hari Digital Marketing Umroh"
    //         // ],
    //         // [
    //         //     "file" => "public/Kelas 7 Hari Digital Marketing Umroh 2.xlsx",
    //         //     "produk" => "Kelas 7 Hari Digital Marketing Umroh"
    //         // ],
    //         // [
    //         //     "file" => "public/Kelas 7 Hari Digital Marketing Umroh 3.xlsx",
    //         //     "produk" => "Kelas 7 Hari Digital Marketing Umroh"
    //         // ],
    //         // [
    //         //     "file" => "public/Kelas 7 Hari Digital Marketing Umroh 4.xlsx",
    //         //     "produk" => "Kelas 7 Hari Digital Marketing Umroh"
    //         // ],
    //         // [
    //         //     "file" => "public/Data Peminat Haji Tanpa Antri.xlsx",
    //         //     "produk" => "Webinar Haji Tanpa Antri"
    //         // ],
    //         // [
    //         //     "file" => "public/Data Peminat Umroh Mudah.xlsx",
    //         //     "produk" => "Webinar Umroh Mudah"
    //         // ],
    //         // [
    //         //     "file" => "public/Data Peminat Umroh Ramadhan.xlsx",
    //         //     "produk" => "Webinar Umroh Ramadhan"
    //         // ],
    //         // [
    //         //     "file" => "public/Data Peminat Webinar Umroh Edukasi.xlsx",
    //         //     "produk" => "Webinar Umroh Edukasi"
    //         // ],
    //         // [
    //         //     "file" => "public/Data Baru/Data Peminat Webinar Kelas 7 Hari Digital Marketing Tambahan.xlsx",
    //         //     "produk" => "Kelas 7 Hari Digital Marketing Umroh"
    //         // ],
    //         [
    //             "file" => "public/Data Baru/Data Peminat Webinar Umroh Edukasi Tambahan.xlsx",
    //             "produk" => "Webinar Umroh Edukasi"
    //         ],
    //     ];

    //     foreach ($files as $file) {
    //         $spreadsheet = $reader->load($file['file']);
    //         $leads = $spreadsheet->getActiveSheet()->toArray();
    
    //         $produk = $this->db->query("
    //             SELECT
    //                 *
    //             FROM produk
    //             WHERE nama_produk = '$file[produk]'
    //         ")->getRowArray();
    
    //         foreach ($leads as $key => $value) {
    //             if($key == 0 || $value[1] == "" || $value[1] == NULL){
    //                 continue;
    //             }
    
    //             $agent = $this->db->query("
    //                 SELECT
    //                     *
    //                 FROM agent
    //                 WHERE no_wa LIKE '%".$value[6]."%'
    //             ")->getRowArray();
    
    //             $data = [
    //                 'nama_customer' => $value[1],
    //                 'no_wa' => $value[2],
    //                 'email' => $value[3],
    //                 'kota_kabupaten' => $value[4],
    //                 'fk_id_produk' => $produk['pk_id_produk'],
    //                 'jenis_produk' => 'produk'
    //             ];
    
    //             // jika ada data agent tentukan agent
    //             if(isset($agent)){
    //                 $data['fk_id_agent'] = $agent['pk_id_agent'];
    //                 // jika agent memiliki leader agent maka set leader agent leads seperti milik agent
    //                 if($agent['fk_id_leader_agent'] != '' || $agent['fk_id_leader_agent'] !== NULL){
    //                     $data['fk_id_leader_agent'] = $agent['fk_id_leader_agent'];
    //                 }
    //             }
    
    //             // simpan data leads
    //             $this->customerModel->skipValidation(true);
    //             if($this->customerModel->save($data) === true){
    //                 $fk_id_customer = $this->customerModel->getInsertID();
    
    //                 $dataPenjualan = [
    //                     'fk_id_customer' => $fk_id_customer,
    //                     'fk_id_produk' => $produk['pk_id_produk'],
    //                     'tgl_closing' => date('Y-m-d'),
    //                     'fk_id_travel' => $produk['fk_id_travel'],
    //                     'fk_id_agent_closing' => (isset($data['fk_id_agent'])) ? $data['fk_id_agent'] : NULL,
    //                     'status' => 'lunas'
    //                 ];
    
    //                 $this->penjualanProdukModel->skipValidation(true);
    //                 if ($this->penjualanProdukModel->save($dataPenjualan) !== true) {
    //                     $response = [
    //                         "error" => $this->penjualanProdukModel->errors()
    //                     ];
    
    //                     $failed = true;
    
    //                     break;
    //                 }
    //             } else {
    //                 $response = [
    //                     "error" => $this->customerModel->errors()
    //                 ];
    
    //                 $failed = true;
    
    //                 break;
    //             }
    //         }
    //     }


    //     if ($this->db->transStatus() === false || $failed) {
    //         $this->db->transRollback();

    //         if(!isset($response['error'])){
    //             $response = [
    //                 'status' => 'error',
    //                 'message' => 'Gagal import data'
    //             ];
    //         }
    //     } else {
    //         $this->db->transCommit();

    //         $response = [
    //             'status' => 'success',
    //             'message' => 'Berhasil import data'
    //         ];
    //     }

    //     var_dump($response);
    // }

    // public function kelas_berbayar(){
    //     ini_set("memory_limit","512M");

    //     // $this->db->query("
    //     //     TRUNCATE TABLE customer
    //     // ");

    //     // $this->db->query("
    //     //     TRUNCATE TABLE penjualan_produk
    //     // ");

    //     // $this->db->query("
    //     //     TRUNCATE TABLE komisi_penjualan_produk
    //     // ");

    //     $this->db->transBegin();
    //     $failed = false;

    //     $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //     $reader->setReadDataOnly(true);

    //     $files = [
    //         // [
    //         //     "file" => "public/Data Baru/Data Closing Badal Haji 2024.xlsx",
    //         //     "produk" => "Badal Haji"
    //         // ],
    //         [
    //             "file" => "public/Data Baru/Data Closing Badal Umroh 2024.xlsx",
    //             "produk" => "Badal Umroh"
    //         ],
    //     ];

    //     foreach ($files as $file) {
    //         $spreadsheet = $reader->load($file['file']);
    //         $leads = $spreadsheet->getActiveSheet()->toArray();
    
    //         $produk = $this->db->query("
    //             SELECT
    //                 *
    //             FROM produk
    //             WHERE nama_produk = '$file[produk]'
    //         ")->getRowArray();
    
    //         $no = 1;
    //         $dataFile = $file;
    //         foreach ($leads as $key => $value) {
    //             if($key <= 0){
    //                 continue;

    //                 $no++;
    //             }

    //             $dataFile['value'] = $value;
    
    //             $agent = $this->db->query("
    //                 SELECT
    //                     *
    //                 FROM agent
    //                 WHERE no_wa LIKE '%".$value[6]."%'
    //             ")->getRowArray();
    
    //             $data = [
    //                 'nama_customer' => $value[1],
    //                 'no_wa' => $value[2],
    //                 'email' => $value[3],
    //                 'kota_kabupaten' => $value[4],
    //                 'fk_id_produk' => $produk['pk_id_produk'],
    //                 'jenis_produk' => 'produk'
    //             ];
    
    //             // jika ada data agent tentukan agent
    //             if(isset($agent)){
    //                 $data['fk_id_agent'] = $agent['pk_id_agent'];
    //                 // jika agent memiliki leader agent maka set leader agent leads seperti milik agent
    //                 if($agent['fk_id_leader_agent'] != '' || $agent['fk_id_leader_agent'] !== NULL){
    //                     $data['fk_id_leader_agent'] = $agent['fk_id_leader_agent'];
    //                 }
    //             }
    
    //             // simpan data leads
    //             $this->customerModel->skipValidation(true);
    //             if($this->customerModel->save($data) === true){
    //                 $fk_id_customer = $this->customerModel->getInsertID();
    
    //                 $dataPenjualan = [
    //                     'fk_id_customer' => $fk_id_customer,
    //                     'fk_id_produk' => $produk['pk_id_produk'],
    //                     'tgl_closing' => $this->convertToDate($value[8]),
    //                     'fk_id_travel' => $produk['fk_id_travel'],
    //                     'fk_id_agent_closing' => (isset($data['fk_id_agent'])) ? $data['fk_id_agent'] : NULL,
    //                     'status' => 'lunas'
    //                 ];
    
    //                 $this->penjualanProdukModel->skipValidation(true);
    //                 if ($this->penjualanProdukModel->save($dataPenjualan) !== true) {
    //                     $response = [
    //                         "error" => $this->penjualanProdukModel->errors()
    //                     ];

    //                     $response['message'] = '<p>Perhatikan kembali file yang Anda upload. Pastikan semua data berikut terisi dengan benar:</p>
    //                     <ul>
    //                         <li>Nama</li>
    //                         <li>No WA</li>
    //                         <li>Email</li>
    //                         <li>Produk</li>
    //                     </ul>
    //                     <p><b>Masalah ditemukan pada nomor ' . $value[0] . ':</b> Pastikan bahwa data pada baris nomor ' . $value[0] . ' telah diisi. Jika data pada baris tersebut tidak tersedia, silakan hapus baris nomor ' . $value[0] . ' dari file Anda dan coba upload kembali.</p>';
    
    //                     $failed = true;
    
    //                     break;
    //                 } else {
    //                     $fk_id_penjualan_produk = $this->penjualanProdukModel->getInsertID();

    //                     $dataPembayaran = [
    //                         'fk_id_penjualan_produk' => $fk_id_penjualan_produk,
    //                         'tgl_pembayaran' => $this->convertToDate($value[8]),
    //                         'nominal' => $value[7],
    //                         'keterangan' => '-'
    //                     ];

    //                     if ($this->pembayaranPenjualanProdukModel->save($dataPembayaran) !== true) {
    //                         $response = [
    //                             "error" => $this->pembayaranPenjualanProdukModel->errors()
    //                         ];

    //                         $response['message'] = '<p>Perhatikan kembali file yang Anda upload. Pastikan semua data berikut terisi dengan benar:</p>
    //                         <ul>
    //                             <li>Nama</li>
    //                             <li>No WA</li>
    //                             <li>Email</li>
    //                             <li>Produk</li>
    //                         </ul>
    //                         <p><b>Masalah ditemukan pada nomor ' . $value[0] . ':</b> Pastikan bahwa data pada baris nomor ' . $value[0] . ' telah diisi. Jika data pada baris tersebut tidak tersedia, silakan hapus baris nomor ' . $value[0] . ' dari file Anda dan coba upload kembali.</p>';
        
    //                         $failed = true;
        
    //                         break;
    //                     }
    //                 }
    //             } else {
    //                 $response = [
    //                     "error" => $this->customerModel->errors()
    //                 ];

    //                 $response['message'] = '<p>Perhatikan kembali file yang Anda upload. Pastikan semua data berikut terisi dengan benar:</p>
    //                 <ul>
    //                     <li>Nama</li>
    //                     <li>No WA</li>
    //                     <li>Email</li>
    //                     <li>Produk</li>
    //                 </ul>
    //                 <p><b>Masalah ditemukan pada nomor ' . $value[0] . ':</b> Pastikan bahwa data pada baris nomor ' . $value[0] . ' telah diisi. Jika data pada baris tersebut tidak tersedia, silakan hapus baris nomor ' . $value[0] . ' dari file Anda dan coba upload kembali.</p>';
    
    //                 $failed = true;
    
    //                 break;
    //             }
    //         }

    //         $no++;
    //     }


    //     if ($this->db->transStatus() === false || $failed) {
    //         $this->db->transRollback();

    //         if(!isset($response['error'])){
    //             $response = [
    //                 'status' => 'error',
    //                 'message' => 'Gagal import data'
    //             ];
    //         }

    //         $response['no'] = $no;
    //         $response['file'] = $dataFile;
    //     } else {
    //         $this->db->transCommit();

    //         $response = [
    //             'status' => 'success',
    //             'message' => 'Berhasil import data'
    //         ];
    //     }

    //     var_dump($response);
    // }

    // import penjualan kelas gratis dari admin 
    public function peminat_by_admin(){
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

            foreach ($leads as $key => $value) {
                if($key == 0){
                    continue;
                }

                // cek nama, no_wa, email, produk pastikan terisi 
                if($value[0] !== NULL && ($value[1] === NULL || $value[2] === NULL || $value[4] === NULL || $value[5] === NULL)){
                    $response['error'] = '<p>Perhatikan kembali file yang Anda upload. Pastikan semua data berikut terisi dengan benar:</p>
                    <ul>
                        <li>Nama</li>
                        <li>No WA</li>
                        <li>Email</li>
                        <li>Produk</li>
                        <li>Tgl Closing</li>
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

                if(!$produk){
                    $response['error'] = '<p>Perhatikan kembali file yang Anda upload.</p>
                    <p><b>Masalah ditemukan pada nomor ' . $value[0] . ':</b> Pastikan bahwa data produk pada baris nomor ' . $value[0] . ' valid.</p>';

                    $failed = true;

                    break;
                }

                $data = [
                    'nama_customer' => $value[1],
                    'no_wa' => $value[2],
                    'kota_kabupaten' => $value[3],
                    'email' => $value[4],
                    'fk_id_produk' => $produk['pk_id_produk'],
                    'jenis_produk' => 'produk',
                ];

                $fk_id_agent_closing = NULL;

                // jika no wa agent terisi maka lakukan pengecekan agent 
                if($value[7] != NULL){
                    $agent = $this->db->query("
                        SELECT
                            *
                        FROM agent
                        WHERE no_wa LIKE '%$value[7]%'
                    ")->getRowArray();

                    // jika agent ditemukan maka set fk id agent dari customer 
                    if($agent){
                        if($agent['tipe_agent'] == 'leader agent'){
                            $data['fk_id_agent'] = NULL;
                            $data['fk_id_leader_agent'] = $agent['pk_id_agent'];
                        } else {
                            $data['fk_id_agent'] = $agent['pk_id_agent'];
                            $data['fk_id_leader_agent'] = $agent['fk_id_leader_agent'];
                        }

                        $fk_id_agent_closing = $agent['pk_id_agent'];
                    }
                }

                $is_send_wa = 0;
                $wa_message = '';

                $this->customerModel->skipValidation(true);
                if($this->customerModel->save($data) === true){
                    $is_send_wa = $produk['send_wa_after_input_agent'];
                    $wa_message = $produk['wa_message'];

                    $fk_id_customer = $this->customerModel->getInsertID();

                    // konversi tanggal terlebih dahulu
                    $date = $this->convertToDate($value[8]); 
                    $timestamp = strtotime($date);

                    if (!$timestamp && date('Y-m-d', $timestamp) !== $date) {
                        $response['error'] = '<p>Perhatikan kembali file yang Anda upload.</p>
                        <p><b>Masalah ditemukan pada nomor ' . $value[0] . ':</b> Pastikan bahwa tgl closing pada baris nomor ' . $value[0] . ' berformat d/m/Y. ex : 1/1/2024</p>';
                    
                        $failed = true;
                        return json_encode($response);
                    }

                    $dataPenjualan = [
                        'fk_id_customer' => $fk_id_customer,
                        'fk_id_produk' => $produk['pk_id_produk'],
                        'tgl_closing' => $date,
                        'fk_id_travel' => $produk['fk_id_travel'],
                        'fk_id_agent_closing' => $fk_id_agent_closing,
                        'status' => ($produk['jenis_produk'] == 'free offer') ? 'lunas' : 'pending'
                    ];

                    $this->penjualanProdukModel->skipValidation(true);
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
                        <li>Tgl Closing</li>
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

    public function download_template_admin(){
        // Load the model to get the data (assuming you have a model for fetching products)
        $produk = $this->produkModel->where("is_active", 1)->find(); // Fetch all products

        // Load the existing Excel file
        $filePath = FCPATH . 'public/template setor peminat by admin.xlsx';
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
        $tempFilePath = WRITEPATH . 'temp/template setor peminat by admin.xlsx';
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
                    'jenis_produk' => 'produk'
                ];

                if($agent['tipe_agent'] == 'leader agent'){
                    $data['fk_id_agent'] = NULL;
                    $data['fk_id_leader_agent'] = $agent['pk_id_agent'];
                } else {
                    $data['fk_id_agent'] = $agent['pk_id_agent'];
                    $data['fk_id_leader_agent'] = $agent['fk_id_leader_agent'];
                }

                $is_send_wa = 0;
                $wa_message = '';

                if($this->customerModel->save($data) === true){
                    $is_send_wa = $produk['send_wa_after_input_agent'];
                    $wa_message = $produk['wa_message'];

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

                    if($is_send_wa){
                        $messageData = $wa_message;
            
                        $replace = [
                            '$nama_customer$' => $data['nama_customer']
                        ];
            
                        // Replace placeholders with actual values
                        $message = str_replace(array_keys($replace), array_values($replace), $messageData);
            
                        // send_wa($data['no_wa'], $message);
                        $dataPesan = [
                            'no_wa' => $data['no_wa'],
                            'text' => $message
                        ];

                        if($this->listSendWaModel->save($dataPesan) !== true){
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

    public function cronJobSendWa(){
        $data = $this->db->query("
            SELECT
                *
            FROM list_send_wa
            WHERE is_send = 0
        ")->getRowArray();

        if($data){
            send_wa($data['no_wa'], $data['text']);

            $this->db->query("
                UPDATE list_send_wa
                SET is_send = 1
                WHERE pk_id_list_send_wa = $data[pk_id_list_send_wa]
            ");
        }
    }

    function convertToDate($dateString) {
        $data = explode('/', trim($dateString));
        $day = "";
        $month = "";
        $year = "";

        if(count($data) == 3){

            if(intval($data[0]) < 10){
                $day = '0' . intval($data[0]);
            } else if (intval($data[0]) >= 10){
                $day = $data[0];
            } else {
                $day = '01';
            }
    
            if(intval($data[1]) < 10){
                $month = '0' . intval($data[1]);
            } else if (intval($data[1]) >= 10){
                $month = $data[1];
            } else {
                $month = '01';
            }
    
            $year = $data[2];
    
            return $year."-".$month."-".$day;
        } else {
            $baseDate = '1900-01-01';

            // Mengonversi angka serial ke timestamp Unix
            // Kurangkan 2 hari untuk mengoreksi perhitungan tahun kabisat Excel
            $timestamp = strtotime($baseDate . ' + ' . (intval($dateString) - 2) . ' days');

            return date('Y-d-m', $timestamp);
        }
    }
}
