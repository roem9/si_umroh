<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'customer';
    protected $primaryKey       = 'pk_id_customer';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_customer',
        'nama_customer',
        'no_wa',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota_kabupaten',
        'provinsi',
        'email',
        'fk_id_agent',
        'fk_id_leader_agent',
        'fk_id_produk',
        'jenis_produk',
        'fk_id_to_agent'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_customer' => 'required',
        'no_wa' => 'required|numeric',
        'email' => 'required|valid_email',
        'fk_id_produk' => 'required',
    ];

    protected $validationMessages   = [
        'nama_customer' => [
            'required' => 'Nama customer harus diisi.'
        ],
        'no_wa' => [
            'required' => 'No WA harus diisi.',
            'numeric' => 'No WA harus berupa angka.'
        ],
        'email' => [
            'required' => 'Email harus diisi.',
            'valid_email' => 'Email tidak valid.'
        ],
        'fk_id_produk' => [
            'required' => 'Produk harus diisi.'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ["generateID"];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function generateID($data){
        $db = db_connect();

        $lastId = $db->query("
            SELECT
                SUBSTRING(kode_customer, 7, 5) as last_id
            FROM customer
            ORDER BY SUBSTRING(kode_customer, 7, 5) desc
            LIMIT 1
        ")->getRowArray();

        $yearMonth = date('ym');
        if($lastId){
            $sequence = (int) $lastId['last_id'] + 1;
        } else {
            $sequence = 1;
        }
        $data['data']['kode_customer'] = sprintf('C-%s%05d', $yearMonth, $sequence);

        return $data;
    }
}
