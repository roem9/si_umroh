<?php

namespace App\Models;

use CodeIgniter\Model;

class KnowledgeProdukModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'knowledge_produk';
    protected $primaryKey       = 'pk_id_knowledge_produk';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_id_produk',
        'item',
        'data',
        'urutan'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'item' => 'required',
        'data' => 'required',
        // 'urutan' => 'required',
    ];
    protected $validationMessages   = [
        'item' => [
            'required' => 'Tipe materi harus diisi'
        ],
        'data' => [
            'required' => 'Field ini harus diisi'
        ],
        // 'urutan' => [
        //     'required' => 'Urutan harus diisi'
        // ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [
        'generateUrutanMateri'
    ];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function generateUrutanMateri($data)
    {
        $urutan_terakhir = $this->where("fk_id_produk", $data['data']['fk_id_produk'])->orderBy("urutan", "DESC")->first();
        if ($urutan_terakhir) {
            $data['data']['urutan'] = $urutan_terakhir['urutan'] + 1;
        } else {
            $data['data']['urutan'] = 1;
        }

        return $data;
    }
}
