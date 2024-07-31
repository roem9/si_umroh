<?php

namespace App\Models;

use CodeIgniter\Model;

class InformasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'informasi';
    protected $primaryKey       = 'pk_id_informasi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'item',
        'data',
        'urutan',
        'akses_informasi'
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
        'akses_informasi' => 'required',
    ];
    protected $validationMessages   = [
        'item' => [
            'required' => 'Tipe materi harus diisi'
        ],
        'data' => [
            'required' => 'Field ini harus diisi'
        ],
        'akses_informasi' => [
            'required' => 'Akses informasi harus diisi'
        ]
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
        $urutan_terakhir = $this->orderBy("urutan", "DESC")->first();
        if ($urutan_terakhir) {
            $data['data']['urutan'] = $urutan_terakhir['urutan'] + 1;
        } else {
            $data['data']['urutan'] = 1;
        }

        return $data;
    }
}
