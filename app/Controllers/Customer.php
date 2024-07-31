<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\CustomerModel;

class Customer extends BaseController
{
    public $customerModel;
    public $db;

    public function __construct(){
        $this->customerModel = new CustomerModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $data['sidebar'] = "customer";
        $data['title'] = "List Customer";
        $data['deskripsi'] = "List seluruh data customer";

        return view('admin/pages/customer', $data);
    }

    public function save()
    {
        $data = [
            'nama_customer' => $this->request->getPost('nama_customer'),
            'no_wa' => $this->request->getPost('no_wa'),
            'alamat' => $this->request->getPost('alamat'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kota_kabupaten' => $this->request->getPost('kota_kabupaten'),
            'provinsi' => $this->request->getPost('provinsi'),
            'email' => $this->request->getPost('email'),
            'fk_id_agent' => $this->request->getPost('fk_id_agent'),
            'fk_id_leader_agent' => $this->request->getPost('fk_id_leader_agent'),
        ];

        $pk_id_customer = $this->request->getPost('pk_id_customer');

        $searchCustomer = $this->customerModel->find($pk_id_customer);
        if ($searchCustomer) {
            if($this->customerModel->update($pk_id_customer, $data) === true){
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil mengubah data customer'
                ];
            } else {
                $response = [
                    "error" => $this->customerModel->errors()
                ];
            }
        } else {
            if($this->customerModel->save($data) === true){
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil menambah data customer'
                ];
            } else {
                $response = [
                    "error" => $this->customerModel->errors()
                ];
            }
        }

        return json_encode($response);
    }

    public function getData($pk_id_customer)
    {
        // $data = $this->customerModel->find($pk_id_customer);
        $data = $this->db->query("
            SELECT
                a.*,
                b.nama_agent as nama_agent,
                c.nama_agent as nama_leader_agent
            FROM customer a
            LEFT JOIN agent b ON a.fk_id_agent = b.pk_id_agent
            LEFT JOIN agent c ON a.fk_id_leader_agent = c.pk_id_agent
            WHERE a.pk_id_customer = $pk_id_customer
        ")->getRowArray();
        return json_encode($data);
    }

    public function getList()
    {
        $query = "
            CREATE TEMPORARY TABLE Listcustomer AS
            SELECT
                a.*,
                b.nama_agent as nama_agent,
                c.nama_agent as nama_leader_agent
            FROM customer a
            LEFT JOIN agent b ON a.fk_id_agent = b.pk_id_agent
            LEFT JOIN agent c ON a.fk_id_leader_agent = c.pk_id_agent
            WHERE a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL;
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('Listcustomer');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listcustomer");
        return DataTable::of($builder)->toJson(true);
    }

    public function delete($pk_id_customer)
    {
        if($this->customerModel->delete($pk_id_customer) === true){
            $response = [
                'status' => 'success',
                'message' => 'Berhasil menghapus data customer'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menghapus data customer'
            ];
        }

        return json_encode($response);
    }
}
